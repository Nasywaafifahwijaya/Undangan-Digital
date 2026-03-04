<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvp;

class RsvpController extends Controller
{
    // Tamu TANPA wedding gift
    public function index()
    {
        $rsvps = Rsvp::latest()->paginate(4);
        return view('undangan', compact('rsvps'))->with('showGift', false);
    }

    // Tamu DENGAN wedding gift (VIP)
    public function indexVip()
    {
        $rsvps = Rsvp::latest()->paginate(4);
        return view('undangan', compact('rsvps'))->with('showGift', true);
    }

    public function store(Request $request)
    {
        // Honeypot check
        if ($request->filled('website')) {
            return redirect()->back();
        }

        $request->validate([
            'nama' => 'required|string|max:70',
            'ucapan' => 'nullable|string|max:300',
            'kehadiran' => 'required|in:Hadir,Tidak Hadir,Ragu-ragu'
        ]);

        Rsvp::create([
            'nama' => $request->nama,
            'ucapan' => $request->ucapan,
            'kehadiran' => $request->kehadiran,
        ]);

        return redirect()->back()
            ->with('success', 'Terima kasih atas konfirmasinya')
            ->withFragment('rsvp');
    }

    public function admin(Request $request)
    {
        $query = Rsvp::query();

        if ($request->filled('filter') && in_array($request->filter, ['Hadir', 'Tidak Hadir', 'Ragu-ragu'])) {
            $query->where('kehadiran', $request->filter);
        }

        $rsvps = $query->latest()->get();

        $hadir = Rsvp::where('kehadiran', 'Hadir')->count();
        $tidak = Rsvp::where('kehadiran', 'Tidak Hadir')->count();
        $ragu = Rsvp::where('kehadiran', 'Ragu-ragu')->count();

        return view('admin.rsvpresult', compact('rsvps', 'hadir', 'tidak', 'ragu'));
    }

    public function destroy($id)
    {
        try {
            $rsvp = Rsvp::findOrFail($id);
            $rsvp->delete();

            return response()->json([
                'success' => true,
                'message' => 'RSVP berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus RSVP'
            ], 500);
        }
    }
}
