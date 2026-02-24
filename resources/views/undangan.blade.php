<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan</title>

    <meta name="description" content="Undangan Pernikahan Alya & Anas">
    <meta name="theme-color" content="#fdf6ec">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
</head>


<body
    x-data="{
        opened: !!(window.location.hash || window.location.search)
    }"
    :class="opened ? 'overflow-auto' : 'overflow-hidden'"
    class="relative min-h-screen w-full text-gray-800 font-[Poppins] overflow-x-hidden bg-transparent">

    <!-- ================= BACKGROUND ================= -->

    <!-- blur layer -->
    <div
        class="fixed inset-0 -z-50"
        style="
        background-image: url('/assets/images/bg/cover-fix.jpeg');
        background-size: cover;
        background-position: center bottom;
        background-repeat: no-repeat;
        background-attachment: fixed;
    ">
    </div>


    <!-- main background -->
    <!-- ================= BACKGROUND ================= -->



    <!-- overlay -->
    <div class="fixed inset-0 -z-40 bg-[#fdf6ec]/20"></div>

    <!-- ================= CONTENT ================= -->

    <div class="relative w-full flex justify-center">
        <div class="w-full max-w-[480px] md:max-w-[560px]">

            {{-- COVER --}}
            <div x-show="!opened"
                x-transition:leave="transition ease-[cubic-bezier(0.22,1,0.36,1)] duration-700"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-105">
                @include('sections.cover')
            </div>

            {{-- MAIN CONTENT --}}
            <div x-show="opened"
                x-transition:enter="transition ease-[cubic-bezier(0.22,1,0.36,1)] duration-900 delay-150"
                x-transition:enter-start="opacity-0 -translate-y-16 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-cloak>


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
    </div>

    <!-- ================= BUNGA ATAS FIXED ================= -->
    <div
        x-show="opened"
        x-transition.opacity
        class="fixed top-0 left-0 w-full pointer-events-none z-40 flex justify-center">

        <img src="/assets/images/bg/bunga-atas.png"
            class="w-full max-w-[480px] md:max-w-[560px]">
    </div>

    <!-- ================= BUNGA BAWAH ================= -->

    <div class="fixed bottom-0 left-0 w-full pointer-events-none z-50 flex justify-center">
        <img src="/assets/images/bg/bunga-bawah.png"
            class="w-full max-w-[480px] bunga-animasi">
    </div>




    <!-- ================= COUNTDOWN ================= -->

    <script>
        const targetDate = new Date("2026-03-28T10:00:00+07:00").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance <= 0) {
                document.getElementById("cd_days") && (cd_days.innerHTML = 0);
                document.getElementById("cd_hours") && (cd_hours.innerHTML = 0);
                document.getElementById("cd_minutes") && (cd_minutes.innerHTML = 0);
                document.getElementById("cd_seconds") && (cd_seconds.innerHTML = 0);
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            const d = document.getElementById("cd_days");
            const h = document.getElementById("cd_hours");
            const m = document.getElementById("cd_minutes");
            const s = document.getElementById("cd_seconds");

            if (d) d.innerHTML = days;
            if (h) h.innerHTML = hours;
            if (m) m.innerHTML = minutes;
            if (s) s.innerHTML = seconds;
        }
        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>

    <!-- ================= FLOWER ANIMATION ================= -->

    <style>
        [x-cloak] {
            display: none !important;
        }

        @keyframes bungaAngin {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-0.5deg);
            }

            50% {
                transform: rotate(0.5deg);
            }

            75% {
                transform: rotate(-0.3deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .bunga-animasi {
            animation: bungaAngin 8s ease-in-out infinite;
            transform-origin: bottom center;
        }

        @keyframes spinSlow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spinSlow 6s linear infinite;
        }
    </style>

    <audio id="bgm" loop preload="auto">
        <source src="/assets/audio/bermuara.mp3" type="audio/mpeg">
    </audio>

    <div
        x-data="musicPlayer()"
        x-init="init()"
        class="fixed bottom-6 right-6 z-50">
        <button
            @click="toggle()"
            class="w-14 h-14 rounded-full bg-[#5c3a3a] text-white shadow-xl flex items-center justify-center transition hover:scale-105">
            <svg
                x-show="playing"
                class="w-6 h-6 animate-spin-slow"
                fill="currentColor"
                viewBox="0 0 24 24">
                <path d="M12 3v18m9-9H3" />
            </svg>

            <svg
                x-show="!playing"
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 24 24">
                <path d="M5 3v18l15-9L5 3z" />
            </svg>
        </button>
    </div>

    <script>
        function musicPlayer() {
            return {
                playing: false,
                audio: null,

                init() {
                    this.audio = document.getElementById('bgm');
                    this.audio.volume = 0;

                    window.addEventListener('start-music', () => {
                        this.playWithFade();
                    });
                },

                playWithFade() {
                    if (!this.audio.paused) return;

                    const startTime = 118; // 01:58

                    const startPlayback = () => {
                        this.audio.currentTime = startTime;

                        this.audio.play().then(() => {
                            this.playing = true;

                            let volume = 0;
                            const fade = setInterval(() => {
                                if (volume < 0.25) {
                                    volume += 0.02;
                                    this.audio.volume = volume;
                                } else {
                                    clearInterval(fade);
                                }
                            }, 200);
                        }).catch(err => {
                            console.log('Playback error:', err);
                        });

                        this.audio.removeEventListener('canplay', startPlayback);
                    };

                    // Kalau metadata sudah siap
                    if (this.audio.readyState >= 3) {
                        startPlayback();
                    } else {
                        this.audio.addEventListener('canplay', startPlayback);
                        this.audio.load();
                    }
                },

                toggle() {
                    if (this.audio.paused) {
                        this.playWithFade();
                    } else {
                        this.audio.pause();
                        this.playing = false;
                    }
                }
            }
        }
    </script>

</body>

</html>