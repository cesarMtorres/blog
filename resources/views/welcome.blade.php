<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
        <script type="text/javascript" src="https://unpkg.com/vue-router@2.0.0/dist/vue.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
      
    </head>
    <body>
     <x-card class="mb-4">
        <x-slot name="title">
            <h2 class="text-xl">titulo de la tarjeta</h2>
        </x-slot>

     Datadog collects and monitors your PHP app metrics and distributed traces in real-time with application performance monitoring. Decrease downtime and performance issues with Datadog APM by tracing requests across service boundaries and drilling into individual traces end-to-end with flame graphs. Start your 14-day trial for free today.
     <a class="underline" href="#">Link</a>        
     </x-card>
          <x-card class="mb-4" :tags="['tag','tag2']">
        <x-slot name="title">
            <h2 class="text-xl">titulo de la tarjeta 2</h2>
        </x-slot>

     Datadog collects and monitors your PHP app metrics and distributed traces in real-time with application performance monitoring. Decrease downtime and performance issues with Datadog APM by tracing requests across service boundaries and drilling into individual traces end-to-end with flame graphs. Start your 14-day trial for free today.
     <a class="underline" href="#">Link</a>        
     </x-card>

    
    </body>
</html>
