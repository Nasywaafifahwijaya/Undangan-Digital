<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        Rsvp::create([
            'nama' => $request->nama,
            'ucapan' => $request->ucapan,
            'kehadiran' => $request->kehadiran
        ]);

        return redirect('/#rsvp');
    }
}
