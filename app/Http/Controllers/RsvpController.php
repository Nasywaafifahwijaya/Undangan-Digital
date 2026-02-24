<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvp;

class RsvpController extends Controller
{
    public function index()
    {
        $rsvps = Rsvp::latest()->paginate(4);
        return view('undangan', compact('rsvps'));
    }

    public function store(Request $request)
    {
        // Honeypot check
        if ($request->filled('website')) {
            // Kalau honeypot terisi → anggap bot → diam saja
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

        return redirect('/#rsvp')
            ->with('success', 'Terima kasih atas konfirmasinya');
    }

    public function admin(Request $request)
    {
        $query = Rsvp::query();

        // Filter
        if ($request->filled('filter') && in_array($request->filter, ['Hadir', 'Tidak Hadir', 'Ragu-ragu'])) {
            $query->where('kehadiran', $request->filter);
        }

        // Default sort terbaru → terlama
        $rsvps = $query->latest()->get();

        // Statistik global (bukan hasil filter)
        $hadir = Rsvp::where('kehadiran', 'Hadir')->count();
        $tidak = Rsvp::where('kehadiran', 'Tidak Hadir')->count();
        $ragu = Rsvp::where('kehadiran', 'Ragu-ragu')->count();

        return view('admin.rsvpresult', compact('rsvps', 'hadir', 'tidak', 'ragu'));
    }
}
