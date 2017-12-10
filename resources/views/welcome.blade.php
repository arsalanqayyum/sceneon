
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
<div id="site_messages" style="display: none;">
    <a href="javascript:void('0')">
        <i class="fa fa-close"></i>
        <span class="site_message"></span>
    </a>
</div>
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

        });

        jQuery(".shop-now a").on("click", function(e){
            e.preventDefault();
            if( jQuery(this).attr("href") != "" ){
                jQuery.ajax({
                    global: false,
                    data: "",
                    dataType: 'html',
                    context: this,
                    type: "GET",
                    url: jQuery(this).attr("href"),
                    success: function( response ) {
                        response = jQuery.parseJSON(response);
                        jQuery("#topnav span.badge").html(response.totalQty);
                        jQuery(this).append('<div class="added_msg">Successfully added...</div>').show("slow", function(){
                            setTimeout(function() {
                                jQuery(".added_msg").hide("slow", function () {
                                });
                            }, 3000);
                        });
                    }
                });
            }
        });
        jQuery("#cartEmpty").on("click", function(){
            jQuery.ajax({
                global: false,
                data: "",
                dataType: 'html',
                context: this,
                type: "GET",
                url: 'shoppingcart/cartempty',
                success: function( response ) {
                    response = jQuery.parseJSON(response);
                    jQuery(response.msg_container).html(response.msg);
                    jQuery("#topnav span.badge").html(response.total_qty);
                    jQuery(".total").hide();
                }
            });
        });
    });
</script>
</body>
