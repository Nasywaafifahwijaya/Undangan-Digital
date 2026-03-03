<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Undangan Pernikahan</title>

    <meta name="description" content="Undangan Pernikahan Alya & Anas">
    <meta name="theme-color" content="#fdf6ec">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body
    x-data="{ opened: !!(window.location.hash || window.location.search) }"
    class="relative min-h-screen flex items-center justify-center bg-black font-[Poppins] text-gray-800 overflow-x-hidden">


    <!-- ================= 9:16 WRAPPER ================= -->
    <div class="relative w-full max-w-[430px] aspect-[9/16] bg-[#fdf6ec] shadow-2xl overflow-hidden">

        <!-- ================= BACKGROUND ================= -->
        <div class="absolute inset-0 z-0">
            <img src="/assets/images/bg/cover-fix.jpeg"
                class="w-full h-full object-cover object-center">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-[#fdf6ec]/20 z-10"></div>


        {{-- COVER --}}
        <div x-show="!opened"
            x-transition:leave="transition ease-[cubic-bezier(0.22,1,0.36,1)] duration-700"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-105"
            class="relative z-20">

            @include('sections.cover')
        </div>


        {{-- MAIN CONTENT --}}
        <div x-show="opened"
            x-transition:enter="transition ease-[cubic-bezier(0.22,1,0.36,1)] duration-900 delay-150"
            x-transition:enter-start="opacity-0 -translate-y-16 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-cloak
            class="relative z-20 h-full overflow-y-auto">

            @include('sections.detail-card')
            @include('sections.opening')
            @include('sections.bride-groom')
            @include('sections.countdown')
            @include('sections.akad')
            @include('sections.resepsi')
            @include('sections.wedding-gift')
            @include('sections.rsvp')
            @include('sections.footer')

        </div>
    </div>



    <!-- ================= BUNGA ATAS ================= -->
    <div x-show="opened"
        x-transition.opacity
        class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-[430px] pointer-events-none z-40">

        <img src="/assets/images/bg/bunga-atas.png"
            class="w-full h-auto">
    </div>


    <!-- ================= BUNGA BAWAH COVER ================= -->
    <div
        x-show="!opened"
        x-transition.opacity
        class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[430px] pointer-events-none z-40">

        <img src="/assets/images/bg/bunga-bawah.png"
            class="w-full h-auto">
    </div>


    <!-- ================= BUNGA BAWAH MAIN ================= -->
    <div
        x-show="opened"
        x-transition.opacity
        class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[430px] pointer-events-none z-40">

        <img src="/assets/images/bg/bunga-bawah3.png"
            class="w-full h-auto">
    </div>



    <!-- ================= COUNTDOWN SCRIPT ================= -->
    <script>
        const targetDate = new Date("2026-03-28T10:00:00+07:00").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance <= 0) return;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (window.cd_days) cd_days.innerHTML = days;
            if (window.cd_hours) cd_hours.innerHTML = hours;
            if (window.cd_minutes) cd_minutes.innerHTML = minutes;
            if (window.cd_seconds) cd_seconds.innerHTML = seconds;
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>



    <!-- ================= AUDIO ================= -->
    <audio id="bgm" loop preload="auto">
        <source src="/assets/audio/bermuara.mp3" type="audio/mpeg">
    </audio>

    <div x-data="musicPlayer()" x-init="init()" class="fixed bottom-6 right-6 z-50">

        <button @click="toggle()"
            class="w-14 h-14 rounded-full bg-[#5c3a3a] text-white shadow-xl flex items-center justify-center transition hover:scale-105">

            <svg x-show="playing" class="w-6 h-6 animate-spin-slow" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 3v18m9-9H3" />
            </svg>

            <svg x-show="!playing" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M5 3v18l15-9L5 3z" />
            </svg>

        </button>
    </div>

</body>

</html>