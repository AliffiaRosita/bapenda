<link href="{{ asset('img/logo.png') }}" rel="icon" />
<!--  Fonts ==
    -->
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;display=swap"
    rel="stylesheet" />
<!--  Stylesheets==
    -->
<link href="{{ asset('guest/assets/css/vendor.min.css') }}" rel="stylesheet" />
<link href="{{ asset('guest/assets/css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('guest/assets/css/vendor/flip.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('guest/assets/css/customStyle.css') }}">
<style>
    .tick {
        font-size: 1.6em;
    }

    /* rounder corners */
    #my-flip {
        /* increase border radius */
        border-radius: .3125em;

        /* increase spacing between letters */
        letter-spacing: .5em;
        text-indent: .5em;
    }

    /* black on white colors */
    #my-flip .tick-flip-panel {
        color: #555;
        background-color: #fafafa;
    }
</style>
@stack('css')
