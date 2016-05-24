<ol class="carousel-indicators" id="carousel-thumb">
	@if(isset($carouselItems))
    	@foreach($carouselItems as $index=>$item)
	        <li data-target="#carousel-slide" data-slide-to={{ $index }} class={{ $index===0?"thumb active":"thumb" }} style='background-image: url({{$item->cover}})'></li>
        @endforeach
    @else
	    <li data-target="#carousel-slide" data-slide-to='0' class="active thumb" style='background-image: url("https://placem.at/places?w=1400&amp;random=1")'></li>
	    <li data-target="#carousel-slide" data-slide-to='1' class="thumb" style='background-image: url("https://placem.at/places?w=1400&amp;random=2")'></li>
	    <li data-target="#carousel-slide" data-slide-to='2' class="thumb" style='background-image: url("https://placem.at/places?w=1400&amp;random=3")'></li>
	    <li data-target="#carousel-slide" data-slide-to='3' class="thumb" style='background-image: url("https://placem.at/places?w=1400&amp;random=4")'></li>
    @endif
</ol>