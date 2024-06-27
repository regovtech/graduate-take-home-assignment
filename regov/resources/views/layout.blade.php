<!DOCTYPE html>
<html class="h-full bg-white">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- tailwind css folder -->
        @vite('resources/css/app.css')

        <!-- vue.js folder-->
        @vite(['resources/js/app.js'])

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body class="h-full">
    <div id="app">
        <!-- Vue Component -->
        <app-component></app-component>

    </div>
    </body>
</html>
