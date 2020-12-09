<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            @foreach($sliders as $slider)
            <div class="item-slick1" style="background-image: url({{asset('upload/slider_images/'.$slider->image)}}); background-size: 100% 100%;">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                {{$slider->short_title}}
                            </span>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                {{$slider->long_title}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>