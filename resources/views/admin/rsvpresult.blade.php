<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin RSVP - Alya & Anas 2026</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        @media print {
            .no-print { display: none !important; }
            body { background: white; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#f3ede3] to-[#f8f6f1] min-h-screen p-4 sm:p-6 lg:p-10">

    <div class="max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl sm:text-4xl font-[Playfair_Display] text-[#5c3a3a]">
                    Admin Dashboard
                </h1>
                <p class="text-sm text-gray-600 mt-1">
                    Data RSVP Alya & Anas - 28 Maret 2026
                </p>
            </div>
            <div class="flex gap-2">
                <a href="/001" 
                   class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">
                    ← Kembali
                </a>
                <button onclick="exportCSV()" 
                        class="px-4 py-2 bg-[#5c3a3a] text-white rounded-lg text-sm hover:bg-[#4a2e2e] transition">
                    📥 Export CSV
                </button>
                <button onclick="window.print()" 
                        class="px-4 py-2 bg-gray-700 text-white rounded-lg text-sm hover:bg-gray-800 transition">
                    🖨️ Print
                </button>
            </div>
        </div>

        <!-- STATISTICS -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white shadow-lg rounded-2xl p-5 border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Total RSVP</p>
                <p class="text-2xl sm:text-3xl font-semibold text-[#5c3a3a] mt-2">
                    {{ $hadir + $tidak + $ragu }}
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-2xl p-5 border border-green-100">
                <p class="text-xs sm:text-sm text-gray-500">Hadir</p>
                <p class="text-2xl sm:text-3xl font-semibold text-green-600 mt-2">
                    {{ $hadir }}
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-2xl p-5 border border-red-100">
                <p class="text-xs sm:text-sm text-gray-500">Tidak Hadir</p>
                <p class="text-2xl sm:text-3xl font-semibold text-red-500 mt-2">
                    {{ $tidak }}
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-2xl p-5 border border-yellow-100">
                <p class="text-xs sm:text-sm text-gray-500">Ragu-ragu</p>
                <p class="text-2xl sm:text-3xl font-semibold text-yellow-500 mt-2">
                    {{ $ragu }}
                </p>
            </div>
        </div>

        <!-- SEARCH & FILTER -->
        <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 mb-6">
            <div class="flex flex-col sm:flex-row gap-4">
                <!-- SEARCH -->
                <div class="flex-1">
                    <input type="text" 
                           id="searchInput" 
                           placeholder="🔍 Cari nama tamu..." 
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#5c3a3a] focus:border-transparent"
                           onkeyup="searchTable()">
                </div>
                
                <!-- FILTER BUTTONS -->
                <div class="flex flex-wrap gap-2">
                    <a href="{{ url()->current() }}"
                       class="px-4 py-2.5 rounded-lg text-sm font-medium transition
                       {{ !request('filter') ? 'bg-[#5c3a3a] text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Semua ({{ $hadir + $tidak + $ragu }})
                    </a>
                    <a href="{{ url()->current() }}?filter=Hadir"
                       class="px-4 py-2.5 rounded-lg text-sm font-medium transition
                       {{ request('filter') == 'Hadir' ? 'bg-green-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Hadir ({{ $hadir }})
                    </a>
                    <a href="{{ url()->current() }}?filter=Tidak Hadir"
                       class="px-4 py-2.5 rounded-lg text-sm font-medium transition
                       {{ request('filter') == 'Tidak Hadir' ? 'bg-red-500 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Tidak ({{ $tidak }})
                    </a>
                    <a href="{{ url()->current() }}?filter=Ragu-ragu"
                       class="px-4 py-2.5 rounded-lg text-sm font-medium transition
                       {{ request('filter') == 'Ragu-ragu' ? 'bg-yellow-500 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Ragu ({{ $ragu }})
                    </a>
                </div>
            </div>
        </div>

        <!-- TABLE -->
        @if($rsvps->count() > 0)
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm" id="rsvpTable">
                        <thead class="bg-[#5c3a3a] text-white">
                            <tr>
                                <th class="px-4 sm:px-6 py-4 text-left font-semibold cursor-pointer hover:bg-[#4a2e2e]" onclick="sortTable(0)">
                                    Nama ↕
                                </th>
                                <th class="px-4 sm:px-6 py-4 text-left font-semibold hidden md:table-cell">
                                    Ucapan
                                </th>
                                <th class="px-4 sm:px-6 py-4 text-left font-semibold cursor-pointer hover:bg-[#4a2e2e]" onclick="sortTable(2)">
                                    Status ↕
                                </th>
                                <th class="px-4 sm:px-6 py-4 text-left font-semibold cursor-pointer hover:bg-[#4a2e2e]" onclick="sortTable(3)">
                                    Waktu ↕
                                </th>
                                <th class="px-4 sm:px-6 py-4 text-center font-semibold no-print">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($rsvps as $rsvp)
                                <tr class="hover:bg-gray-50 transition" data-id="{{ $rsvp->id }}">
                                    <td class="px-4 sm:px-6 py-4 font-medium text-gray-800">
                                        {{ $rsvp->nama }}
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 text-gray-600 max-w-xs hidden md:table-cell">
                                        <div class="line-clamp-2" title="{{ $rsvp->ucapan }}">
                                            {{ $rsvp->ucapan ?: '-' }}
                                        </div>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4">
                                        @if($rsvp->kehadiran == 'Hadir')
                                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                ✓ Hadir
                                            </span>
                                        @elseif($rsvp->kehadiran == 'Tidak Hadir')
                                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-600">
                                                ✗ Tidak
                                            </span>
                                        @else
                                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                                ? Ragu
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 text-gray-500 text-xs sm:text-sm">
                                        <div class="flex flex-col">
                                            <span class="font-medium">{{ $rsvp->created_at->diffForHumans() }}</span>
                                            <span class="text-gray-400 text-xs">{{ $rsvp->created_at->format('d M Y, H:i') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 text-center no-print">
                                        <button onclick="deleteRSVP({{ $rsvp->id }}, '{{ $rsvp->nama }}')"
                                                class="text-red-500 hover:text-red-700 font-medium text-sm">
                                            🗑️
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <!-- EMPTY STATE -->
            <div class="bg-white shadow-xl rounded-2xl p-12 text-center border border-gray-100">
                <div class="text-6xl mb-4">📭</div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Data</h3>
                <p class="text-gray-500">
                    @if(request('filter'))
                        Tidak ada tamu dengan status "{{ request('filter') }}"
                    @else
                        Belum ada konfirmasi kehadiran masuk
                    @endif
                </p>
            </div>
        @endif

    </div>

    <!-- SCRIPTS -->
    <script>
        // SEARCH FUNCTION
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('rsvpTable');
            const tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName('td')[0];
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
                }
            }
        }

        // SORT TABLE
        let sortDirection = {};
        function sortTable(columnIndex) {
            const table = document.getElementById('rsvpTable');
            const rows = Array.from(table.rows).slice(1);
            const dir = sortDirection[columnIndex] === 'asc' ? 'desc' : 'asc';
            sortDirection[columnIndex] = dir;

            rows.sort((a, b) => {
                const aVal = a.cells[columnIndex].textContent.trim();
                const bVal = b.cells[columnIndex].textContent.trim();
                
                if (dir === 'asc') {
                    return aVal.localeCompare(bVal);
                } else {
                    return bVal.localeCompare(aVal);
                }
            });

            rows.forEach(row => table.tBodies[0].appendChild(row));
        }

        // EXPORT CSV
        function exportCSV() {
            const table = document.getElementById('rsvpTable');
            let csv = 'Nama,Ucapan,Kehadiran,Waktu\n';
            
            for (let i = 1; i < table.rows.length; i++) {
                const row = table.rows[i];
                const nama = row.cells[0].textContent.trim();
                const ucapan = row.cells[1].textContent.trim().replace(/,/g, ';');
                const kehadiran = row.cells[2].textContent.trim();
                const waktu = row.cells[3].textContent.trim().split('\n')[1] || '';
                
                csv += `"${nama}","${ucapan}","${kehadiran}","${waktu}"\n`;
            }

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            const url = URL.createObjectURL(blob);
            
            link.setAttribute('href', url);
            link.setAttribute('download', 'rsvp_alya_anas_' + new Date().getTime() + '.csv');
            link.style.visibility = 'hidden';
            
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // DELETE RSVP (needs route)
        function deleteRSVP(id, nama) {
            if (!confirm(`Hapus RSVP dari "${nama}"?`)) return;
            
            fetch(`/admin-rsvp/delete/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`tr[data-id="${id}"]`).remove();
                    location.reload();
                } else {
                    alert('Gagal menghapus data');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan');
            });
        }
    </script>

</body>
</html>