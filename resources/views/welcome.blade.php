<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Untitled Document</title>
    <link href="{{asset('/css/style.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('/css/bootstrap.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('/css/font-awesome.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('OwlCarousel2-2.2.1/OwlCarousel2-2.2.1/docs/assets/owlcarousel/assets/owl.carousel.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('OwlCarousel2-2.2.1/OwlCarousel2-2.2.1/docs/assets/owlcarousel/assets/owl.carousel.min.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('OwlCarousel2-2.2.1/OwlCarousel2-2.2.1/docs/assets/owlcarousel/assets/owl.theme.default.css')}}" type="text/css" rel="stylesheet" />

</head>
<body>
@include('topnav')

@yield('content')

@include('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('OwlCarousel2-2.2.1/OwlCarousel2-2.2.1/docs/assets/owlcarousel/owl.carousel.js')}}"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('.owl-carousel').owlCarousel();
    });
</script>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop:false,
            margin:0,
            nav:false,
            lazyLoad:true,
            responsiveClass:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:false,
            margin:10,
            stagePadding:40,
            smartSpeed:450,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:true
                },
                1000:{
                    items:4,
                    nav:true,
                    loop:true
                }
            }

        })
    });
</script>
</body>
