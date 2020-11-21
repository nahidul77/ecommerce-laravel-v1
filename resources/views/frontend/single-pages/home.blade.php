@extends('frontend.layouts.master')
@section('content')

    <!-- Slider-->
@include('frontend.layouts.slider')

<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					All Products
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
					Women
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
					Men
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
					Bag
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
					Shoes
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
					Watches
				</button>
			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
					<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
					<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					 Filter
				</div>

				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
			</div>
			
			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
				</div>	
			</div>

			<!-- Filter -->
			<div class="dis-none panel-filter w-full">
				<div class="wrap-filter flex-w w-full" style="background-color: #858585;">
					<div>
						<div style="padding: 20px; font-size: 25px; color: #fff">
							Brands
						</div>
						<div style="padding: 0px 20px 20px 20px;">
							<a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="" class="filter-link stext-106 trans-04" style="color: #fff">
								Bangladeshi
							</a>
							<a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="" class="filter-link stext-106 trans-04" style="color: #fff">
								Malayshian
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row isotope-grid">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-01.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Esprit Ruffle Shirt
							</a>

							<span class="stext-105 cl3">
								$16.64
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-02.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Herschel supply
							</a>

							<span class="stext-105 cl3">
								$35.31
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-03.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Only Check Trouser
							</a>

							<span class="stext-105 cl3">
								$25.50
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-04.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Classic Trench Coat
							</a>

							<span class="stext-105 cl3">
								$75.00
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-05.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Front Pocket Jumper
							</a>

							<span class="stext-105 cl3">
								$34.75
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item watches">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-06.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Vintage Inspired Classic 
							</a>

							<span class="stext-105 cl3">
								$93.20
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-07.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Shirt in Stretch Cotton
							</a>

							<span class="stext-105 cl3">
								$52.66
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-08.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Pieces Metallic Printed
							</a>

							<span class="stext-105 cl3">
								$18.96
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item shoes">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-09.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Converse All Star Hi Plimsolls
							</a>

							<span class="stext-105 cl3">
								$75.00
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-10.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Femme T-Shirt In Stripe
							</a>

							<span class="stext-105 cl3">
								$25.85
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-11.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Herschel supply 
							</a>

							<span class="stext-105 cl3">
								$63.16
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-12.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Herschel supply
							</a>

							<span class="stext-105 cl3">
								$63.15
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-13.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								T-Shirt with Sleeve
							</a>

							<span class="stext-105 cl3">
								$18.49
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-14.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Pretty Little Thing
							</a>

							<span class="stext-105 cl3">
								$54.79
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item watches">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-15.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Mini Silver Mesh Watch
							</a>

							<span class="stext-105 cl3">
								$86.85
							</span>
						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{asset('/frontend/')}}/images/product-16.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Add to Card
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								Square Neck Back
							</a>

							<span class="stext-105 cl3">
								$29.64
							</span>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
			
       
@endsection