<!DOCTYPE html>
<html lang="id" class="h-full">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    <title>Undangan Digital Anas & Alya</title>

    <meta name="description" content="Undangan Pernikahan Alya & Anas">
    <meta name="theme-color" content="#fdf6ec">

    <link rel="icon" type="image/png" href="/assets/images/icon/favicon2.png">
    <link rel="apple-touch-icon" href="/assets/images/icon/favicon2.png">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

</head>


@php
$guest = request('to') ?? 'Tamu Undangan';
@endphp


<body
    x-data="{ opened: !!window.location.hash }"
    class="relative h-dvh overflow-hidden flex items-center justify-center bg-[#fdf6ec] font-[Poppins] text-gray-800">



    <!-- ================= FRAME ================= -->

    <div class="main-wrapper relative w-full
max-w-[430px] md:max-w-[576px] lg:max-w-[640px]
h-dvh
bg-[#fdf6ec] shadow-2xl overflow-hidden">



        <!-- ================= BACKGROUND ================= -->

        <div class="absolute inset-0 z-0">

            <img
                src="/assets/images/bg/cover-fix.jpeg"
                class="w-full h-full object-cover object-center">

        </div>



        <!-- ================= OVERLAY ================= -->

        <div class="absolute inset-0 bg-[#fdf6ec]/20 z-10"></div>




        {{-- ================= COVER ================= --}}

        <div
            x-show="!opened"

            x-transition:leave="transition ease-[cubic-bezier(0.22,1,0.36,1)] duration-700"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-105"

            class="cover-section relative h-full z-20 overflow-hidden">

            @include('sections.cover')

        </div>




        {{-- ================= CONTENT ================= --}}

        <div
            x-show="opened"

            x-transition:enter="transition ease-[cubic-bezier(0.22,1,0.36,1)] duration-900 delay-150"
            x-transition:enter-start="opacity-0 -translate-y-16 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"

            x-cloak

            class="content-wrapper relative z-20 h-full overflow-y-auto"
            style="-webkit-overflow-scrolling: touch;">



            <div class="reveal">
                @include('sections.detail-card')
            </div>

            <div class="reveal">
                @include('sections.opening')
            </div>

            <div class="reveal">
                @include('sections.bride-groom')
            </div>

            <div class="reveal">
                @include('sections.countdown')
            </div>

            <div class="reveal">
                @include('sections.akad')
            </div>

            <div class="reveal">
                @include('sections.resepsi')
            </div>

            @if($showGift ?? false)

            <div class="reveal">
                @include('sections.wedding-gift')
            </div>

            @endif

            <div class="reveal">
                @include('sections.rsvp')
            </div>

            <div class="reveal">
                @include('sections.footer')
            </div>


        </div>



        <!-- ================= BUNGA ================= -->

        <div
            x-show="opened"
            x-transition.opacity
            class="absolute top-0 left-0 w-full pointer-events-none z-40">

            <!-- Bunga Atas -->
            <img src="/assets/images/bg/bunga-atas.png"
                class="w-full h-auto object-cover object-top bunga-animasi"
                style="max-height: clamp(180px, 30vh, 300px)">

        </div>



        <div
            x-show="!opened"
            x-transition.opacity
            class="absolute -bottom-10 left-0 w-full pointer-events-none z-40">

            {{-- <!-- gradient mask -->
<div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-transparent to-[#fdf6ec]"></div> --}}

            <img src="/assets/images/bg/bunga-bawah.png"
                class="w-full h-auto object-cover object-bottom bunga-animasi"
                style="max-height: clamp(180px, 30vh, 300px)">

        </div>



        <div
            x-show="opened"
            x-transition.opacity
            class="absolute bottom-0 left-0 w-full pointer-events-none z-40">

            <img src="/assets/images/bg/bunga-bawah3.png"
                class="w-full h-auto object-cover object-bottom bunga-animasi"
                style="max-height: clamp(220px, 35vh, 350px)">

        </div>




    </div>




    <!-- ================= COUNTDOWN ================= -->

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




    <!-- ================= SCROLL REVEAL ================= -->

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const reveals = document.querySelectorAll(".reveal");

            const observer = new IntersectionObserver((entries) => {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        entry.target.classList.add("show");

                    }

                });

            }, {
                threshold: 0.15
            });

            reveals.forEach(el => observer.observe(el));

        });
    </script>




    <!-- ================= STYLE ================= -->

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Apple style reveal */

        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 1s cubic-bezier(.22, 1, .36, 1);
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }



        /* bunga animasi */

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

        /* ================= NEST HUB FIX ================= */

        @media (min-width:1024px) and (max-height:650px) and (orientation:landscape) {

            /* frame tetap portrait */
            .main-wrapper {
                max-width: 420px;
                height: 110vh;
            }

            /* cover lebih compact */
            .cover-section {
                padding-top: 20px;
                padding-bottom: 20px;
            }

            /* section spacing diperkecil */
            .content-wrapper section {
                padding-top: 40px !important;
                padding-bottom: 40px !important;
            }

            /* detail card lebih kecil */
            #detail-card>div {

                padding-top: 40px !important;
                padding-bottom: 40px !important;

                max-width: 360px;

            }

            /* title lebih kecil */
            #detail-card h1 {
                font-size: 2rem !important;
            }

            /* text lebih compact */
            #detail-card p {
                font-size: 0.8rem !important;
            }

            /* tanggal spacing */
            #detail-card .mb-3 {
                margin-bottom: 0.5rem !important;
            }

            #detail-card .mb-6 {
                margin-bottom: 0.8rem !important;
            }

        }
    </style>




    <!-- ================= AUDIO ================= -->

    <audio id="bgm" loop preload="auto">

        <source src="/assets/audio/bermuara.mp3" type="audio/mpeg">

    </audio>



    <div x-data="musicPlayer()" x-init="init()" class="fixed bottom-6 right-6 z-50">

        <button
            @click="toggle()"
            class="w-14 h-14 rounded-full bg-[#5c3a3a] text-white shadow-xl flex items-center justify-center transition hover:scale-105">

            <svg x-show="playing" class="w-6 h-6 animate-spin-slow" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 3v18m9-9H3" />
            </svg>

            <svg x-show="!playing" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
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

                    if (!this.audio) return;

                    this.audio.volume = 0;

                    window.addEventListener('start-music', () => {

                        this.playWithFade();

                    });

                },

                playWithFade() {

                    if (!this.audio || !this.audio.paused) return;

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

                    });

                },

                toggle() {

                    if (!this.audio) return;

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