<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', __('Print')) | {{ __('Yanina Yakusheva Perfumes - Made in France') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300&family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/64a2dc4faa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- SLICK -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/avgrund.css') }}">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">

    <script>
        localStorage.setItem('lang', '{{ \Illuminate\Support\Facades\App::getLocale() }}');
    </script>

    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased" style="background: #fff !important;">
<div>
    <div class="print-area pb-[200px]" id="print-area">
        @yield('content')
    </div>

    <div class="w-full bg-white fixed bottom-0 l-0 sm:h-[90px] h-[60px] border-t flex items-center" id="bottom-area">
        <div class="lg:w-2/4 w-2/3 mx-auto sm:h-[85px] h-[55px] flex justify-between items-center">
            <div class="sm:flex hidden flex-col w-1/3 justify-space-between">
                <label for="" class="text-sm mb-1">Address</label>
                <input type="text" class="border px-2 h-[40px]" value="{{ url()->full() }}">
            </div>
            <div class="flex sm:w-fit w-full justify-between">
                <div class="sm:flex hidden flex-col justify-space-between">
                    <label for="" class="text-sm mb-1">Send to email</label>
                    <div class="flex">
                        <input type="text" class="border px-2 h-[40px]" value="" placeholder="Type Email address">
                        <button class="bg-cyan-700 px-4 text-white hover:bg-cyan-600 active:bg-cyan-800 active:outline
                                active:outline-offset-[-2px] active:outline-1 outline-white">
                            Send
                        </button>
                    </div>
                </div>
                <div class="flex flex-col sm:w-fit w-full justify-center ml-4">
                    <label for="" class="text-sm sm:block hidden mb-1">Other</label>
                    <div class="flex">
                        <button class="h-[40px] bg-cyan-700 px-7 text-white hover:bg-cyan-600 active:bg-cyan-800 active:outline
                                active:outline-offset-[-2px] active:outline-1 outline-white sm:w-auto w-full" id="print-btn">
                            Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/avgrund.js') }}"></script>

    <script>
        // MODALS OPEN SCRIPT
        $('.modal-open').on('click', function () {
            let modal = $(this).attr('data-modal');
            Avgrund.show("#" + modal);
        });

        function closeDialog() {
            Avgrund.hide();
        }

        $('#print-btn').on('click', function () {
            var printContent = document.getElementById('print-area').innerHTML;
            var originalContent = document.body.innerHTML;

            $('#bottom-area').hide();

            // document.body.innerHTML = printContent;

            window.print();

            // document.body.innerHTML = originalContent;


            $('#bottom-area').show();
        });
    </script>

    @stack('scripts')

    <script src="{{ asset('js/cart.js') }}"></script>
</div>
@include('components.modals')

</body>
</html>
