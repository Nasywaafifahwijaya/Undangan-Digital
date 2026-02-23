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
        opened: window.location.hash === '#open' || window.location.hash === '#rsvp'
    }"
    :class="opened ? 'overflow-auto' : 'overflow-hidden'"
    class="min-h-full w-full text-gray-800 font-[Poppins]">

    <div
        class="relative w-full min-h-screen bg-no-repeat bg-top"
        style="
        background-image: url('/assets/images/bg/cover-fix.jpeg');
        background-size: cover;
        background-position: center top;
">

        <!-- WRAPPER TENGAH -->
        <div class="max-w-[480px] mx-auto">

            @include('sections.cover')

            <div x-show="opened" x-transition.opacity.duration.500ms>
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

            <!-- bunga bawah FIXED -->
            <div class="fixed bottom-0 left-0 w-full pointer-events-none z-50 flex justify-center">

                <img src="/assets/images/bg/bunga-bawah.png"
                    class="w-full max-w-[480px]">

            </div>

        </div>

        <!-- ========================= -->
        <!-- COUNTDOWN SCRIPT -->
        <!-- ========================= -->
        <script>
            const targetDate = new Date("2026-03-28T10:00:00+07:00").getTime();


            function updateCountdown() {

                const now = new Date().getTime();
                const distance = targetDate - now;

                if (distance < 0) return;

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

            setInterval(updateCountdown, 1000);
            updateCountdown();


            function addToCalendar() {

                const title = "Wedding Alya & Anas";
                const location = "Lokasi Pernikahan";
                const details = "Undangan Pernikahan Alya & Anas";

                const start = "20260328T020000Z";
                const end = "20260328T060000Z";

                const url =
                    "https://www.google.com/calendar/render?action=TEMPLATE" +
                    "&text=" + encodeURIComponent(title) +
                    "&dates=" + start + "/" + end +
                    "&details=" + encodeURIComponent(details) +
                    "&location=" + encodeURIComponent(location);

                window.open(url, "_blank");

            }
        </script>

        <script>
            function copyRekening(id) {

                const text = document.getElementById(id).innerText.replace(/\s/g, '');
                navigator.clipboard.writeText(text);

                alert("Nomor rekening berhasil disalin");

            }
        </script>



</body>


</html>