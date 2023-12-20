<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name', 'BISU-TTG') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('welcome_assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('welcome_assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('welcome_assets/css/Features-Blue.css')}}">
    <link rel="stylesheet" href="{{asset('welcome_assets/css/Highlight-Phone.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('welcome_assets/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('welcome_assets/css/Navigation-Clean.css')}}">
    <link rel="stylesheet" href="{{asset('welcome_assets/css/Navigation-with-Button.css')}}">
    <link rel="stylesheet" href="{{asset('welcome_assets/css/styles.css')}}">

    <style>
        /* Add this CSS to your stylesheet */

@keyframes swayAnimation {
  0% {
    transform: translateX(0);
  }
  50% {
    transform: translateX(10px); /* Adjust the sway distance as needed */
  }
  100% {
    transform: translateX(0);
  }
}

#phone {
  animation: swayAnimation 2s ease-in-out infinite; /* Adjust the duration as needed */
}


    </style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><img class="d-xl-flex justify-content-xl-center align-items-xl-center" src="welcome_assets/img/screen-content-phone.png" style="width: 3em;height: 3em;margin-right: 10px;text-align: center;">
        <a class="navbar-brand nav-title" href="#">BISU BALILIHAN<span class="navbar-brand-span">&nbsp;TIME TABLE GENERATOR</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" id="navcol-1">
                <ul class="navbar-nav d-xxl-flex ms-auto justify-content-xxl-center align-items-xxl-center">
                    <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-light);">Tutorial</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about" style="color: var(--bs-light);">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><button class="btn btn-primary border-white shadow buttons button-top" data-bss-hover-animate="pulse" type="button">Log in</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="highlight-phone">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="intro">
                        <h2>Faster Schedule Making</h2>
                        <p>This time table generator uses generative algorithms to make class schedules a lot easier and faster.</p>
                        <a class="btn btn-primary buttons" role="button" href="{{route('dashboard')}}">Start making timetables</a>
                    </div>
                </div>
                <div class="col-sm-4" id="phone">
                    <div class="d-none d-md-block phone-mockup"><img class="device" src="{{asset('welcome_assets/img/phone.svg')}}">
                        <div class="screen-back"></div>
                        <div class="screen"><audio id="myAudio" controls loop style="margin-top:20px; margin-left:20px; width:200px; height:20px;">
            <source src="{{ asset('audio/copacabana-180485.mp3') }}" type="audio/mp3">
            Your browser does not support the audio element.
        </audio></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="features-blue">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Features</h2>
                <p class="text-center">This system uses artificially intellegent algorithns to generate class schedules. </p>
            </div>
            <div class="row features" style="margin-bottom: 40px;">
                <div class="col-sm-6 col-md-4 item"><i class="fa fa-map-marker icon"></i>
                    <h3 class="name">Works everywhere</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                </div>
                <div class="col-sm-6 col-md-4 item"><i class="fa fa-clock-o icon"></i>
                    <h3 class="name">Always available</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                </div>
                <div class="col-sm-6 col-md-4 item" ><i class="fa fa-list-alt icon"></i>
                    <h3 class="name">Customizable</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                </div>
            </div>
        </div>

        

    </section>

    <script>
        window.onload = function() {
            // Get the audio element
            var audio = document.getElementById("myAudio");

            // Set the volume to 10%
            audio.volume = 0.1;

            // Play the audio
            audio.play();
            
            // Gradually increase the volume to 10 over 3 seconds (3000 milliseconds)
            var fadeInDuration = 3000;
            var targetVolume = 0.1; // Adjust this to set the desired fade-in volume

            var volumeInterval = setInterval(function() {
            if (audio.volume < targetVolume) {
                audio.volume += targetVolume / (fadeInDuration / 100); // Adjust the step as needed for a smoother fade-in
            } else {
                clearInterval(volumeInterval);
            }
            }, fadeInDuration / 100);

            // Set a timeout to initiate fade-out 3 seconds before the end of the audio
            var fadeOutStartTime = audio.duration - 3; // Start fading out 3 seconds before the end
            setTimeout(function() {
            // Gradually decrease the volume to 0 over 3 seconds (3000 milliseconds)
            var fadeOutDuration = 3000;

            var volumeInterval = setInterval(function() {
                if (audio.currentTime < fadeOutStartTime) {
                clearInterval(volumeInterval);
                } else if (audio.volume > 0) {
                audio.volume -= targetVolume / (fadeOutDuration / 100); // Adjust the step as needed for a smoother fade-out
                } else {
                clearInterval(volumeInterval);
                audio.pause(); // Pause the audio when the volume is 0
                }
            }, fadeOutDuration / 100);
            }, (audio.duration - fadeOutStartTime - 3) * 1000);
        };
    </script>
    <script src="{{asset('welcome_assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('welcome_assets/js/bs-init.js')}}"></script>
</body>

</html>