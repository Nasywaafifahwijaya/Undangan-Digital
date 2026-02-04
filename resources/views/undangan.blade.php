<!DOCTYPE html>
<html lang="id">

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
    x-data="{ opened: false }"
    :class="opened ? 'overflow-auto' : 'overflow-hidden'"
    class="m-0 p-0 w-full h-full
           bg-cover bg-center bg-no-repeat
           text-gray-800 font-[Poppins]">

    <div
        class="relative w-full
         bg-[length:100%_auto]
         bg-no-repeat
         bg-top
         md:bg-cover
         md:bg-center"
        style="background-image: url('/assets/images/bg/bg-cover.jpg');">

        @include('sections.cover')
        @include('sections.opening')
        @include('sections.bride-groom')
        @include('sections.countdown')
        @include('sections.akad')
        @include('sections.resepsi')
        @include('sections.rsvp')
        @include('sections.footer')

    </div>
</body>

</html>