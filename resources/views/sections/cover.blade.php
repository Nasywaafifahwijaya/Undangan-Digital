<section
    x-data="{ open: false }"
    x-show="!opened"
    x-transition.opacity.duration.500ms
    class="relative w-full h-screen overflow-hidden">

    <!-- ARCH FULL SCREEN -->
    <img
        src="/assets/images/bg/arch2hd.png"
        alt="Wedding Arch"
        class="absolute inset-0 w-full h-full object-contain scale-200 object-center z-10
               transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)]"
        :class="open
            ? 'opacity-0'
            : 'opacity-100'">

    <!-- Konten tengah - ADJUSTED POSITIONING -->
    <div
        class="relative z-20 h-full flex flex-col items-center justify-center
           px-6 text-center
           pt-8 md:pt-12 lg:pt-16
           transition-all duration-700 ease-in-out"
        :class="open
        ? 'opacity-0 scale-95'
        : 'opacity-100 scale-100'">

        <!-- CONTENT dengan BALANCED SPACING -->
        <div class="max-w-md w-full">

            <!-- THE WEDDING OF -->
            <p class="text-xs md:text-sm tracking-[0.20em]
              font-light text-[#8B7355]
              mb-6
              drop-shadow-[0_2px_10px_rgba(255,255,255,0.95)]
              [text-shadow:_0_2px_14px_rgb(255_255_255_/_95%),_0_1px_6px_rgb(255_255_255_/_85%)]">
                THE WEDDING OF
            </p>

            <!-- NAMA - REFINED SIZE -->
            <h1 class="text-[2.75rem] md:text-5xl
                   font-[Playfair_Display] font-bold
                   text-[#6B5744]
                   leading-tight
                   mb-10
                   drop-shadow-[0_4px_14px_rgba(255,255,255,0.96)]
                   [text-shadow:_0_4px_18px_rgb(255_255_255_/_96%),_0_2px_10px_rgb(255_255_255_/_88%)]">
                Alya & Anas
            </h1>

            <!-- BUTTON - REFINED -->
            <button
                @click="
                open = true;
                setTimeout(() => opened = true, 900);
                window.dispatchEvent(new Event('start-music'));
            "
                class="px-8 py-2.5 md:px-10 md:py-3
           rounded-full bg-[#8B7355]
           text-white
           text-xs md:text-sm font-semibold 
           shadow-[0_6px_22px_rgba(139,115,85,0.38)]
           hover:bg-[#6B5744]
           hover:shadow-[0_8px_30px_rgba(107,87,68,0.48)]
           hover:scale-105 transition-all duration-300
           mx-auto
           border border-white/20">
                Buka Undangan
            </button>

        </div>

    </div>
</section>