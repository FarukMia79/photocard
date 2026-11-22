<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'PhotoCard') }} - ফটো কার্ড মেকার</title>

        <!-- Web App Manifest (PWA) -->
        <link rel="manifest" href="/manifest.json">

        <!-- Theme Color & Mobile Settings -->
        <meta name="theme-color" content="#2B1B59">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta name="apple-mobile-web-app-title" content="PhotoCard">
        <meta name="application-name" content="PhotoCard">

        <!-- Favicons & Icons -->
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

        <!-- Preload Local Fonts -->
        <link rel="preload" href="/fonts/HindSiliguri-Bold.ttf" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="/fonts/HindSiliguri-SemiBold.ttf" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="/fonts/HindSiliguri-Regular.ttf" as="font" type="font/ttf" crossorigin>

        <!-- Local Fonts (Hind Siliguri Fixed By Fahim) -->
        <link rel="stylesheet" href="/fonts/fonts.css">
        <style>
            @font-face {
                font-family: 'Hind Siliguri';
                src: url('/fonts/HindSiliguri-Light.ttf') format('truetype');
                font-weight: 300;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'Hind Siliguri';
                src: url('/fonts/HindSiliguri-Regular.ttf') format('truetype');
                font-weight: 400;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'Hind Siliguri';
                src: url('/fonts/HindSiliguri-Medium.ttf') format('truetype');
                font-weight: 500;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'Hind Siliguri';
                src: url('/fonts/HindSiliguri-SemiBold.ttf') format('truetype');
                font-weight: 600;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'Hind Siliguri';
                src: url('/fonts/HindSiliguri-Bold.ttf') format('truetype');
                font-weight: 700;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'Hind Siliguri';
                src: url('/fonts/HindSiliguri-Bold.ttf') format('truetype');
                font-weight: 800;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'Hind Siliguri';
                src: url('/fonts/HindSiliguri-Bold.ttf') format('truetype');
                font-weight: 900;
                font-style: normal;
                font-display: swap;
            }

            @font-face {
                font-family: 'Hind Siliguri Fixed By Fahim';
                src: url('/fonts/HindSiliguri-Light.ttf') format('truetype');
                font-weight: 300;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'Hind Siliguri Fixed By Fahim';
                src: url('/fonts/HindSiliguri-Regular.ttf') format('truetype');
                font-weight: 400;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'Hind Siliguri Fixed By Fahim';
                src: url('/fonts/HindSiliguri-Medium.ttf') format('truetype');
                font-weight: 500;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'Hind Siliguri Fixed By Fahim';
                src: url('/fonts/HindSiliguri-SemiBold.ttf') format('truetype');
                font-weight: 600;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: 'Hind Siliguri Fixed By Fahim';
                src: url('/fonts/HindSiliguri-Bold.ttf') format('truetype');
                font-weight: 700 900;
                font-style: normal;
                font-display: swap;
            }
        </style>

        <!-- Google Fonts (Noto Serif Bengali for Design 4 only) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@400;700;900&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="bg-[#f2f2f2] " id="app"></div>

        <!-- Service Worker Registration for PWA / Mobile Install -->
        <script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', function() {
                    navigator.serviceWorker.register('/sw.js').catch(function(err) {
                        console.log('SW registration failed: ', err);
                    });
                });
            }
        </script>
    </body>
</html>
