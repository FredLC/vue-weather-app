<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Any Weather</title>
        <link rel="stylesheet" href="/css/main.css" />
        <script
            src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"
            defer
        ></script>
        <script src="/js/app.js" defer></script>
    </head>
    <body>
        <video
            src="videos/sky.mp4"
            class="video-background"
            loop
            muted
            autoplay
        ></video>
        <div id="app" class="flex justify-center pt-16">
            <weather-app></weather-app>
        </div>
    </body>
</html>
