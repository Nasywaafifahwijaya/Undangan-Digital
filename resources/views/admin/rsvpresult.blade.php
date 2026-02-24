<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data RSVP Alya & Anas 2026</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN (Admin Only) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#f3ede3] to-[#f8f6f1] min-h-screen p-10">

    <div class="max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="mb-10">
            <h1 class="text-4xl font-[Playfair_Display] text-[#5c3a3a]">
                Data RSVP Alya & Anas 2026
            </h1>
            <p class="text-sm text-gray-600 mt-2">
                Dashboard konfirmasi kehadiran tamu undangan
            </p>
        </div>

        <!-- STATISTICS -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

            <div class="bg-white shadow-md rounded-2xl p-6 border border-gray-100">
                <p class="text-sm text-gray-500">Total RSVP</p>
                <p class="text-3xl font-semibold text-[#5c3a3a] mt-2">
                    {{ $rsvps->count() }}
                </p>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6 border border-gray-100">
                <p class="text-sm text-gray-500">Hadir</p>
                <p class="text-3xl font-semibold text-green-600 mt-2">
                    {{ $hadir }}
                </p>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6 border border-gray-100">
                <p class="text-sm text-gray-500">Tidak Hadir</p>
                <p class="text-3xl font-semibold text-red-500 mt-2">
                    {{ $tidak }}
                </p>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6 border border-gray-100">
                <p class="text-sm text-gray-500">Ragu-ragu</p>
                <p class="text-3xl font-semibold text-yellow-500 mt-2">
                    {{ $ragu }}
                </p>
            </div>

        </div>


        <div class="mb-6 flex flex-wrap gap-3">

    <a href="{{ url()->current() }}"
       class="px-4 py-2 rounded-full text-sm border 
       {{ !request('filter') ? 'bg-[#5c3a3a] text-white' : 'bg-white text-gray-700' }}">
        Semua
    </a>

    <a href="{{ url()->current() }}?filter=Hadir"
       class="px-4 py-2 rounded-full text-sm border 
       {{ request('filter') == 'Hadir' ? 'bg-green-600 text-white' : 'bg-white text-gray-700' }}">
        Hadir
    </a>

    <a href="{{ url()->current() }}?filter=Tidak Hadir"
       class="px-4 py-2 rounded-full text-sm border 
       {{ request('filter') == 'Tidak Hadir' ? 'bg-red-500 text-white' : 'bg-white text-gray-700' }}">
        Tidak Hadir
    </a>

    <a href="{{ url()->current() }}?filter=Ragu-ragu"
       class="px-4 py-2 rounded-full text-sm border 
       {{ request('filter') == 'Ragu-ragu' ? 'bg-yellow-500 text-white' : 'bg-white text-gray-700' }}">
        Ragu-ragu
    </a>

</div>


        <!-- TABLE -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">

            <div class="overflow-x-auto">

                <table class="min-w-full text-sm">

                    <thead class="bg-[#5c3a3a] text-white">
                        <tr>
                            <th class="px-6 py-4 text-left font-medium">Nama</th>
                            <th class="px-6 py-4 text-left font-medium">Ucapan</th>
                            <th class="px-6 py-4 text-left font-medium">Kehadiran</th>
                            <th class="px-6 py-4 text-left font-medium">Waktu</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @foreach($rsvps as $rsvp)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $rsvp->nama }}
                                </td>

                                <td class="px-6 py-4 text-gray-600 max-w-md break-words">
                                    {{ $rsvp->ucapan }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($rsvp->kehadiran == 'Hadir')
                                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                            Hadir
                                        </span>
                                    @elseif($rsvp->kehadiran == 'Tidak Hadir')
                                        <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-600">
                                            Tidak Hadir
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                            Ragu-ragu
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-gray-500">
                                    {{ $rsvp->created_at->format('d M Y - H:i') }}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>
</html>