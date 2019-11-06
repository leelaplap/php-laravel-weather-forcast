<html lang="en"><head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}</style>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
    <link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">
    <title>CodePen - CSS-only Weather App Concept</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);
        @font-face {
            font-family: 'weathericons';
            src: url("//cdnjs.cloudflare.com/ajax/libs/weather-icons/1.2/fonts/weathericons-regular-webfont.eot");
            src: url("//cdnjs.cloudflare.com/ajax/libs/weather-icons/1.2/fonts/weathericons-regular-webfont.eot?#iefix") format("embedded-opentype"), url("//cdnjs.cloudflare.com/ajax/libs/weather-icons/1.2/fonts/weathericons-regular-webfont.woff") format("woff"), url("//cdnjs.cloudflare.com/ajax/libs/weather-icons/1.2/fonts/weathericons-regular-webfont.ttf") format("truetype"), url("//cdnjs.cloudflare.com/ajax/libs/weather-icons/1.2/fonts/weathericons-regular-webfont.svg") format("svg");
            font-weight: normal;
            font-style: normal;
        }
        * {
            box-sizing: border-box;
            position: relative;
        }

        html, body {
            background-color: #5F7462;
            width: 100%;
            height: 100%;
        }

        aside, main {
            width: 50%;
            height: 100%;
            float: left;
            padding: 2rem;
        }

        .meta {
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            font-size: 1.2rem;
        }
        .meta p, .meta a {
            color: rgba(255, 255, 255, 0.4);
        }
        .meta h1 {
            font-size: 3rem;
            font-weight: 300;
            color: white;
        }
        .meta p {
            line-height: 1.4;
        }
        .meta a:hover {
            color: rgba(255, 255, 255, 0.7);
        }

        .device {
            position: absolute;
            /*   top: calc(50% - 408px); */
            right: 2rem;
            /*   display: none; */
            height: 816px;
            width: 396px;
            padding: 90px 10px;
            border: 5px solid #2f2f2f;
            border-radius: 60px;
            background-color: #171717;
            box-shadow: 0 0 50px 10px rgba(0, 0, 0, 0.4);
        }
        .device:before, .device:after {
            content: '';
            position: absolute;
            z-index: 2;
        }
        .device:before {
            width: 20%;
            height: 10px;
            top: 40px;
            left: 40%;
            border-radius: 10px;
            background-color: #2f2f2f;
        }
        .device:after {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: solid 5px #2f2f2f;
            left: calc(50% - 25px);
            bottom: 20px;
        }
        .device section {
            height: calc(100% - 50px);
            width: 100%;
            overflow: hidden;
            background-color: #644749;
        }
        .device header, .device footer {
            height: 40px;
            background-color: #8ba892;
        }

        .weather {
            height: 16.66667%;
            overflow: hidden;
        }
        .weather:hover, .device section:not(:hover) .weather:first-child {
            height: 50%;
        }
        .weather:hover .icon, .device section:not(:hover) .weather:first-child .icon {
            -webkit-transform: translateY(0);
            transform: translateY(0);
            z-index: 1;
        }
        .weather:hover + .weather .icon, .device section:not(:hover) .weather:first-child + .weather .icon {
            -webkit-transform: translateY(-408px);
            transform: translateY(-408px);
        }
        .weather:hover ~ .weather .icon, .device section:not(:hover) .weather:first-child ~ .weather .icon {
            z-index: -1;
        }
        .weather:hover:not(:first-child) .data, .device section:not(:hover) .weather:first-child:not(:first-child) .data {
            -webkit-animation-name: slide-up;
            animation-name: slide-up;
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
            -webkit-animation-duration: 0.5s;
            animation-duration: 0.5s;
            -webkit-animation-fill-mode: backwards;
            animation-fill-mode: backwards;
            -webkit-animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
            animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
        }
        .weather .content {
            right: 0;
            width: 40%;
            position: absolute;
            color: white;
        }
        .meta, .weather .content {
            font-family: 'Lato', sans-serif;
        }
        .weather h3 {
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.4);
            margin-bottom: 0;
            font-weight: 700;
        }
        .weather h2 {
            font-size: 1.75rem;
            margin-bottom: 1rem;
            font-weight: 400;
        }
        .weather .degrees {
            font-size: 2.7rem;
            font-weight: 300;
            color: white;
            line-height: 1;
        }
        .weather .degrees:after {
            content: '\00b0';
        }

        .icon {
            z-index: -1;
            font-family: 'weathericons';
            position: absolute;
            top: 1rem;
            left: 1rem;
            width: 50%;
            height: 50px;
            -webkit-transform: translateY(136px);
            transform: translateY(136px);
        }
        .icon i {
            font-style: normal;
            position: absolute;
        }

        .cloud {
            right: 0;
            top: 70px;
            width: 75%;
            height: 60px;
            background: black;
            border-radius: 50px;
        }
        .cloud:before, .cloud:after {
            content: '';
            position: absolute;
            border-radius: 50%;
        }
        .cloud:before {
            width: 80px;
            height: 80px;
            background: black;
            bottom: 20px;
            right: 20px;
        }
        .cloud:after {
            width: 50px;
            height: 50px;
            background: black;
            bottom: 30px;
            left: 30px;
        }

        .sun {
            -webkit-animation-name: rotate;
            animation-name: rotate;
            -webkit-animation-duration: 2s;
            animation-duration: 2s;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
        }
        .moon, .sun {
            left: 5px;
            font-size: 6rem;
        }
        .sun:before {
            content: "\f00d";
        }

        .moon:before {
            content: "\f07b";
        }

        .sprinkles {
            -webkit-transform: skewX(-20deg);
            transform: skewX(-20deg);
            right: 30px;
            top: 100px;
            z-index: -1;
            -webkit-animation-name: sprinkle;
            animation-name: sprinkle;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
            color: #e3bb88;
        }
        .sprinkles + .sprinkles {
            -webkit-animation-delay: 0.25s;
            animation-delay: 0.25s;
        }
        .sprinkles + .sprinkles + .sprinkles {
            -webkit-animation-delay: 0.5s;
            animation-delay: 0.5s;
        }
        .sprinkles + .sprinkles + .sprinkles + .sprinkles {
            -webkit-animation-delay: 0.75s;
            animation-delay: 0.75s;
        }
        .sprinkles:before {
            font-size: 3rem;
            content: "\f04e \f04e \f04e \f04e \f04e";
        }

        .snowflakes {
            position: absolute;
            top: 70px;
            width: 70%;
            right: 0;
            -webkit-animation: snowflakes 3s linear infinite;
            animation: snowflakes 3s linear infinite;
        }
        .snowflakes .snowflake {
            position: relative;
            display: inline-block;
        }

        .snowflake {
            color: #d89864;
        }
        .snowflake:nth-child(1) {
            -webkit-animation: snowflake 3.1s ease-in-out infinite;
            animation: snowflake 3.1s ease-in-out infinite;
        }
        .snowflake:nth-child(2) {
            animation: snowflake 3.1s 0.2s ease-in-out infinite reverse;
            top: -20px;
        }
        .snowflake:nth-child(3) {
            -webkit-animation: snowflake 3.1s 0.2s ease-in-out infinite;
            animation: snowflake 3.1s 0.2s ease-in-out infinite;
            top: 10px;
        }
        .snowflake:nth-child(4) {
            animation: snowflake 3.1s 0.4s ease-in-out infinite reverse;
            top: -30px;
        }
        .snowflake:before {
            font-size: 3rem;
            content: "\f076";
        }

        .time-morning {
            background-color: #e3bb88;
        }
        .time-morning .sun {
            color: #d89864;
        }
        .time-day {
            background-color: #d89864;
        }
        .time-day .sun {
            color: #b1695a;
        }
        .time-day .cloud, .time-day .cloud:before, .time-day .cloud:after {
            background-color: #644749;
        }
        .time-evening {
            background-color: #b1695a;
        }
        .time-evening .sun {
            color: #644749;
        }
        .time-evening .cloud, .time-evening .cloud:before, .time-evening .cloud:after {
            background-color: #e3bb88;
        }
        .time-night {
            background-color: #644749;
        }
        .time-night .moon {
            color: #e3bb88;
        }
        .time-night .cloud, .time-night .cloud:before, .time-night .cloud:after {
            background-color: #d89864;
        }

        .weather, .icon {
            transition: all 0.7s ease-in-out;
        }

        @-webkit-keyframes slide-up {
            from {
                -webkit-transform: translateY(150%);
                transform: translateY(150%);
            }
            to {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }

        @keyframes slide-up {
            from {
                -webkit-transform: translateY(150%);
                transform: translateY(150%);
            }
            to {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }
        @-webkit-keyframes rotate {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes rotate {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-webkit-keyframes sprinkle {
            from {
                -webkit-transform: translateX(0) translateY(0) skewX(-10deg);
                transform: translateX(0) translateY(0) skewX(-10deg);
                opacity: 1;
            }
            to {
                -webkit-transform: translateX(-70px) translateY(150px) skewX(-10deg);
                transform: translateX(-70px) translateY(150px) skewX(-10deg);
                opacity: 0;
            }
        }
        @keyframes sprinkle {
            from {
                -webkit-transform: translateX(0) translateY(0) skewX(-10deg);
                transform: translateX(0) translateY(0) skewX(-10deg);
                opacity: 1;
            }
            to {
                -webkit-transform: translateX(-70px) translateY(150px) skewX(-10deg);
                transform: translateX(-70px) translateY(150px) skewX(-10deg);
                opacity: 0;
            }
        }
        @-webkit-keyframes snowflakes {
            from {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1;
            }
            50% {
                opacity: 1;
            }
            to {
                -webkit-transform: translateY(200px);
                transform: translateY(200px);
                opacity: 0;
            }
        }
        @keyframes snowflakes {
            from {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1;
            }
            50% {
                opacity: 1;
            }
            to {
                -webkit-transform: translateY(200px);
                transform: translateY(200px);
                opacity: 0;
            }
        }
        @-webkit-keyframes snowflake {
            0% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
            25% {
                -webkit-transform: translateX(50px);
                transform: translateX(50px);
            }
            50% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
                opacity: 1;
            }
            75% {
                -webkit-transform: translateX(30px);
                transform: translateX(30px);
            }
            100% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
        }
        @keyframes snowflake {
            0% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
            25% {
                -webkit-transform: translateX(50px);
                transform: translateX(50px);
            }
            50% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
                opacity: 1;
            }
            75% {
                -webkit-transform: translateX(30px);
                transform: translateX(30px);
            }
            100% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
        }
    </style>
    <script>
        window.console = window.console || function(t) {};
    </script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
</head>
<body translate="no">
<main>
    <div class="device">
        <header></header>
        <section>
            <div class="weather time-morning active">
                <div class="icon">
                    <i class="sun"></i>
                </div>
                <div class="content">
                    <h3>Morning</h3>
                    <div class="degrees">- 1</div>
                    <div class="data">
                        <h2>Sunny</h2>
                        <div>Wind: E 7 mph</div>
                        <div>Humidity: 91%</div>
                    </div>
                </div>
            </div>
            <div class="weather time-day">
                <div class="icon">
                    <i class="sun"></i>
                    <i class="cloud windy"></i>
                </div>
                <div class="content">
                    <h3>Day</h3>
                    <div class="degrees">+ 3</div>
                    <div class="data">
                        <h2>Mostly Sunny</h2>
                        <div>Wind: N 5 mph</div>
                        <div>Humidity: 45%</div>
                    </div>
                </div>
            </div>
            <div class="weather time-evening">
                <div class="icon">
                    <i class="sun"></i>
                    <i class="cloud"></i>
                    <i class="sprinkles"></i>
                    <i class="sprinkles"></i>
                    <i class="sprinkles"></i>
                    <i class="sprinkles"></i>
                </div>
                <div class="content">
                    <h3>Evening</h3>
                    <div class="degrees">0</div>
                    <div class="data">
                        <h2>Rainy</h2>
                        <div>Wind: W 12 mph</div>
                        <div>Humidity: 91%</div>
                    </div>
                </div>
            </div>
            <div class="weather time-night">
                <div class="icon">
                    <i class="moon"></i>
                    <i class="cloud"></i>
                    <div class="snowflakes">
                        <i class="snowflake"></i>
                        <i class="snowflake"></i>
                        <i class="snowflake"></i>
                        <i class="snowflake"></i>
                    </div>
                </div>
                <div class="content">
                    <h3>Night</h3>
                    <div class="degrees">- 2</div>
                    <div class="data">
                        <h2>Cloudy</h2>
                        <div>Wind: N 2 mph</div>
                        <div>Humidity: 47%</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<aside>
    <div class="meta">
        <h1>CSS-only Weather<br>App Concept</h1>
        <p>
            Dribbble Rework<br>
            Original shot by <a href="https://dribbble.com/shots/1824088-GIF-for-the-Weather-App">Sergey Valiukh</a>
        </p>
        <p>
            Hover over each filter to see the effect.<br>
            Works best in Chrome.
        </p>
    </div>
</aside>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>
<script id="rendered-js">
    // Nothing to see here.
    // Twitter: @davidkpiano
    //# sourceURL=pen.js
</script>


</body></html>
