<section
    x-data="{ open: false }"
    x-show="!opened"
    x-transition.opacity.duration.500ms
    class="relative w-full h-screen overflow-hidden">

    <!-- ARCH FULL SCREEN -->
    <img
        src="/assets/images/bg/arch.png"
        alt="Wedding Arch"
        class="absolute inset-0 w-full h-full object-cover z-10
               transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)]"
        :class="open
            ? 'opacity-0 scale-110'
            : 'opacity-100 scale-100'">

    <!-- Konten tengah -->
    <div
        class="relative z-20 h-full flex flex-col items-center justify-center
           px-6 text-center pt-24
           transition-all duration-700 ease-in-out"
        :class="open
        ? 'opacity-0 scale-95'
        : 'opacity-100 scale-100'">

        <!-- THE WEDDING OF -->
        <p class="text-sm md:text-base tracking-[0.10em]
          font-normal text-[#1e2a44]
          mb-4">
            THE WEDDING OF
        </p>

        <!-- NAMA -->
        <h1 class="text-5xl md:text-6xl
               font-[Playfair_Display] font-bold
               text-[#2f2f2f]
               drop-shadow-sm
               mb-10 leading-tight">
            Alya & Anas
        </h1>

        <!-- BUTTON -->
        <button
            @click="
            open = true;
            setTimeout(() => opened = true, 900);
            window.dispatchEvent(new Event('start-music'));
        "
            class="px-10 py-3 rounded-full bg-[#cfe5f7]
       text-[#1e2a44]
       text-sm font-semibold shadow-md
       hover:bg-[#bcdaf3]
       hover:scale-105 transition">
            Buka Undangan
        </button>

    </div>
</section>