<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan</title>

    {{-- SEO --}}
    <meta name="description" content="Undangan Pernikahan Alya & Anas">
    <meta name="theme-color" content="#fdf6ec">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body class="m-0 p-0 w-full h-full bg-[#fdf6ec] text-gray-800 font-[Poppins] overflow-x-hidden">

<!-- ===================== -->
<!-- HERO / COVER -->
<!-- ===================== -->
<section
    x-data="{ open: false }"
    id="cover"
    class="relative w-full h-screen overflow-hidden
           flex items-center justify-center text-center
           bg-cover bg-center bg-no-repeat"
    style="background-image: url('/assets/images/bg/bg-cover.jpg');"
>

    <!-- overlay lembut -->
    <div class="absolute inset-0 bg-white/60 z-0"></div>

    <!-- Tirai kiri -->
    <img src="/assets/images/tirai-left.png"
        class="absolute left-0 top-0 h-full w-auto z-10 transition-all duration-1000 ease-in-out"
        :class="open ? '-translate-x-full opacity-0' : 'translate-x-0 opacity-100'"
        alt="Tirai kiri">

    <!-- Tirai kanan -->
    <img src="/assets/images/tirai-right.png"
        class="absolute right-0 top-0 h-full w-auto z-10 transition-all duration-1000 ease-in-out"
        :class="open ? 'translate-x-full opacity-0' : 'translate-x-0 opacity-100'"
        alt="Tirai kanan">

    <!-- Konten tengah -->
    <div
        class="relative z-20 px-6 transition-all duration-700 ease-in-out"
        :class="open ? 'opacity-0 scale-95' : 'opacity-100 scale-100'"
    >
        <h1 class="text-4xl font-[Playfair_Display] mb-4">
            Alya & Anas
        </h1>

        <p class="mb-8 text-sm tracking-widest">
            THE WEDDING OF
        </p>

        <button
            @click="
                open = true;
                setTimeout(() => {
                    document.getElementById('opening').scrollIntoView({ behavior: 'smooth' });
                }, 900);
            "
            class="px-8 py-3 rounded-full bg-[#e7cbb1] text-sm font-medium shadow-md">
            Buka Undangan
        </button>
    </div>

    <!-- Bunga bawah -->
    <img src="/assets/images/bunga-bawah.png"
        class="absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-md z-10 pointer-events-none"
        alt="Bunga bawah">
</section>

<!-- ===================== -->
<!-- OPENING GREETING -->
<!-- ===================== -->
<section id="opening" class="py-24 px-6 text-center bg-[#fdf6ec]">
    <h2 class="text-xl font-[Playfair_Display] mb-6">
        Assalamualaikum Wr. Wb.
    </h2>

    <p class="max-w-xl mx-auto text-sm leading-relaxed">
        Dengan mengucap syukur dan memohon ridha Allah SWT,
        kami mengundang Bapak/Ibu/Saudara/i untuk hadir
        pada acara pernikahan kami.
    </p>
</section>

<!-- ===================== -->
<!-- BRIDE & GROOM -->
<!-- ===================== -->
<section class="py-24 px-6 text-center bg-white/40">
    <h2 class="text-2xl font-[Playfair_Display] mb-12">
        Bride & Groom
    </h2>

    <div class="space-y-16">
        <div>
            <h3 class="text-xl font-semibold">Alya Silvina Wijaya, S.M</h3>
            <p class="text-sm mt-2">
                Putri dari Bapak Harli Wijaya & Ibu Sari Ramadhani
            </p>
        </div>

        <div>
            <h3 class="text-xl font-semibold">Anas Dary Arianto, S.T</h3>
            <p class="text-sm mt-2">
                Putra dari Bapak Suharwanto & Ibu Rina Aswita
            </p>
        </div>
    </div>
</section>

<!-- ===================== -->
<!-- COUNTDOWN (STATIS) -->
<!-- ===================== -->
<section class="py-24 px-6 text-center bg-[#fdf6ec]">
    <h2 class="text-xl font-[Playfair_Display] mb-10">
        Wedding Event
    </h2>

    <div class="flex justify-center gap-6 text-sm">
        <div><div class="text-2xl font-semibold">56</div><span>Hari</span></div>
        <div><div class="text-2xl font-semibold">12</div><span>Jam</span></div>
        <div><div class="text-2xl font-semibold">45</div><span>Menit</span></div>
        <div><div class="text-2xl font-semibold">33</div><span>Detik</span></div>
    </div>
</section>

<!-- ===================== -->
<!-- AKAD -->
<!-- ===================== -->
<section class="py-24 px-6 text-center bg-white/40">
    <h2 class="text-2xl font-[Playfair_Display] mb-8">
        Akad Nikah
    </h2>

    <p class="text-sm mb-2">Jum’at, 27 Maret 2026</p>
    <p class="text-sm mb-6">Pukul 08.00 WIB - Selesai</p>

    <p class="text-sm max-w-md mx-auto mb-6">
        Masjid<br>
        Jl. Maharani VI Komplek PDK, Medan Marelan
    </p>

    <a href="#"
        class="inline-block px-6 py-3 rounded-full bg-[#e7cbb1] text-sm font-medium shadow">
        Google Maps
    </a>
</section>

<!-- ===================== -->
<!-- RESEPSI -->
<!-- ===================== -->
<section class="py-24 px-6 text-center bg-[#fdf6ec]">
    <h2 class="text-2xl font-[Playfair_Display] mb-8">
        Resepsi
    </h2>

    <p class="text-sm mb-2">Sabtu, 28 Maret 2026</p>
    <p class="text-sm mb-6">
        Gedung Islamic Center Muhammadiyah
    </p>

    <p class="text-sm max-w-md mx-auto mb-6">
        Glugur Darat I, Kec. Medan Timur<br>
        Kota Medan
    </p>

    <a href="#"
        class="inline-block px-6 py-3 rounded-full bg-[#e7cbb1] text-sm font-medium shadow">
        Google Maps
    </a>
</section>

<!-- ===================== -->
<!-- RSVP (STATIC) -->
<!-- ===================== -->
<section class="py-24 px-6 bg-white/40">
    <h2 class="text-center text-xl font-[Playfair_Display] mb-10">
        Konfirmasi Kehadiran
    </h2>

    <div class="max-w-md mx-auto space-y-4">
        <input type="text" placeholder="Nama"
            class="w-full rounded-lg border px-4 py-3 text-sm">

        <select class="w-full rounded-lg border px-4 py-3 text-sm">
            <option>Hadir</option>
            <option>Tidak Hadir</option>
            <option>Ragu-ragu</option>
        </select>

        <button
            class="w-full py-3 rounded-full bg-[#e7cbb1] font-medium">
            Konfirmasi
        </button>
    </div>
</section>

<!-- ===================== -->
<!-- FOOTER -->
<!-- ===================== -->
<footer class="py-24 px-6 text-center bg-[#fdf6ec]">
    <p class="text-sm mb-4">
        Merupakan suatu kehormatan bagi kami
        apabila Bapak/Ibu/Saudara/i berkenan hadir.
    </p>

    <h3 class="font-[Playfair_Display] text-xl mt-6">
        Alya & Anas
    </h3>
</footer>

</body>
</html>
