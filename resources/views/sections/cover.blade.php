<section
    x-data="{ open: false }"
    x-show="!opened"
    x-transition.opacity.duration.500ms
    class="relative w-full h-screen flex items-center justify-center text-center overflow-hidden">

    {{-- <!-- Overlay lembut agar teks terbaca -->
    <div class="absolute inset-0 bg-[#fdf6ec]/70 z-0"></div> --}}

    {{-- <!-- Tirai kiri -->
    <img
        src="/assets/images/tirai-left.png"
        alt="Tirai kiri"
        class="absolute left-0 top-0 h-full w-auto z-10
               transition-transform transition-opacity duration-1000 ease-in-out"
        :class="open
            ? '-translate-x-full opacity-0'
            : 'translate-x-0 opacity-100'"> --}}

    {{-- <!-- Tirai kanan -->
    <img
        src="/assets/images/tirai-right.png"
        alt="Tirai kanan"
        class="absolute right-0 top-0 h-full w-auto z-10
               transition-transform transition-opacity duration-1000 ease-in-out"
        :class="open
            ? 'translate-x-full opacity-0'
            : 'translate-x-0 opacity-100'"> --}}

    <!-- Konten tengah -->
    <div
        class="relative z-20 px-6 text-center
               transition-all duration-700 ease-in-out"
        :class="open
            ? 'opacity-0 scale-95'
            : 'opacity-100 scale-100'">
        <h1 class="text-4xl font-[Playfair_Display] mb-4">
            Alya & Anas
        </h1>

        <p class="mb-8 text-sm tracking-widest">
            THE WEDDING OF
        </p>

        <button
        @click="
            opened = true;
            window.dispatchEvent(new Event('start-music'))
        "
        class="px-8 py-3 rounded-full bg-[#e7cbb1]
            text-sm font-medium shadow-md">
        Buka Undangan
        </button>

    </div>

    <!-- Bunga bawah -->
    <img
        src="/assets/images/bunga-bawah.png"
        alt="Bunga bawah"
        class="absolute bottom-0 left-1/2 -translate-x-1/2
               w-full max-w-md z-10 pointer-events-none">
</section>