<!-- Optional JavaScript -->
<script type="text/javascript">
    $(document).on('ready', function() {
        $('.regular').slick({
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });

</script>
<script type="text/javascript">
    $(document).on('ready', function() {
        $('.regulartrailer').slick({
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });

</script>

<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/wow.min.js')}}"></script>

@if(\Illuminate\Support\Facades\Route::current()->getName() === 'readbook' || \Illuminate\Support\Facades\Route::current()->getName() === 'readchapter')
	<script type="text/javascript" src="{{asset('js/readpag.js')}}"></script>
	<script>
        jQuery(window).load(function() {
            $('#content').MyPagination({height: 800, fadeSpeed: 400});
        });
	</script>
@endif


<script>
    new WOW().init();
    // Инициализация
    // Инициализация при загрузке страницы

</script>
<script>
    jQuery('ul.navbar-nav li.dropdown-auto').hover(function() {
        jQuery(this).find('.dropdown-menu-auto').stop(true, true).delay(1).fadeIn();
    }, function() {
        jQuery(this).find('.dropdown-menu-auto').stop(true, true).delay(100).fadeOut();
    });
</script>




<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

@if(Route::currentRouteName() == 'addchapter' || Route::currentRouteName() == 'editbook')
    <script>
        CKEDITOR.replaceAll();
    </script>
@endif