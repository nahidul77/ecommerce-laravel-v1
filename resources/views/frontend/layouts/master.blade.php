<!DOCTYPE html>
<html lang="en">
<head>
	<title>Popularsoft E-Commerce</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{asset('/frontend/')}}/images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/frontend/')}}/css/main.css">
	<script src="{{asset('/frontend/')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
	<style>
		.notifyjs-corner{
		  z-index: 10000 !important;
		}
	  </style>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
</head>
<body class="animsition">
    
    <!-- Header -->
	@include('frontend.layouts.header')

	<!-- Cart -->
	@include('frontend.layouts.cart')


	@yield('content')


	<!-- Footer -->
	@include('frontend.layouts.footer')

    <!-- Modal -->
    @include('frontend.layouts.modal')

	<script src="{{asset('/frontend/')}}/vendor/animsition/js/animsition.min.js"></script>
	<script src="{{asset('/frontend/')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('/frontend/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{asset('/frontend/')}}/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<script src="{{asset('/frontend/')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{asset('/frontend/')}}/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="{{asset('/frontend/')}}/vendor/slick/slick.min.js"></script>
	<script src="{{asset('/frontend/')}}/js/slick-custom.js"></script>
	<script src="{{asset('/frontend/')}}/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
	<script src="{{asset('/frontend/')}}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
	<script src="{{asset('/frontend/')}}/vendor/isotope/isotope.pkgd.min.js"></script>
	<script src="{{asset('/frontend/')}}/vendor/sweetalert/sweetalert.min.js"></script>
	<!-- jquery-validation -->
	<script src="{{asset('/')}}backend/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="{{asset('/')}}backend/plugins/jquery-validation/additional-methods.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
	<script src="{{asset('/frontend/')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
	<script src="{{asset('/frontend/')}}/js/main.js"></script>
	@if(session()->has('success'))
      <script>
        $(function(){
          $.notify("{{session()->get('success')}}", {globalPosition:'top right', className:'success'});
        });  
      </script>        
    @endif
    @if(session()->has('error'))
      <script>
        $(function(){
          $.notify("{{session()->get('error')}}", {globalPosition:'top right', className:'error'});
        });  
      </script>        
    @endif

</body>
</html>