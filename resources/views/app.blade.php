<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="app-name" content="{{ ENV('APP_NAME') }}">
    <meta name="app-key" content="{{ ENV('APP_KEY') }}">
    <!-- <meta name="description" content="{{ ENV('APP_DESC') }}"> -->
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="client-id" content="{{ ENV('PASSPORT_CLIENT_ID') }}">
    <meta name="client-secret" content="{{ ENV('PASSPORT_CLIENT_SECRET') }}">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ENV('APP_NAME')}}</title>

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"> -->

    <!-- Styles -->
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url("/fonts/Poppins/Poppins-Regular.ttf");
        }

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body>
    <div id="app"></div>
    @vite('resources/js/app.js')
</body>

</html>
