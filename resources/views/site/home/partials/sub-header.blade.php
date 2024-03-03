@php use App\Helpers\Image; @endphp
<div class="sub-header" id="scroll-0">
    <div class="main-container">
        <div class="owl-carousel owl-theme" id="slider-news">
            @forelse($sliders as $slider)
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="item">
                            <div class="img-slider-header">
                                <img src="{{ Image::getImage('/uploads/sliders/',$slider->image) }}" alt="">
                            </div>
                            <div class="icon-slider">
                                <img src="{{ Image::getImage('/uploads/sliders/',$slider->icon) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-slider-header">
                            <h1>{{ $slider->title }}</h1>
                            <p>{{ $slider->content }}</p>
                        </div>
                        <div class="btn-header">
                            <a href="#scroll-6" class=" scroll-1 ctm-btn"> تواصل معنا <i
                                    class="bi bi-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="w-100 text-center">There are no sliders. </p>
            @endforelse
        </div>
    </div>
</div>

