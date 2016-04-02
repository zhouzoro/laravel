<div id="carousel-thumbnail">
	@if(isset($carouselItems))
    	@foreach($carouselItems as $index=>$item)
	        <div data-target="#carousel-slide" data-slide-to={{ $index }} class={{ $index===0?"thumbnail active":"thumbnail" }}><img src={{$item['cover']}}></div>
        @endforeach
    @else
	    <div data-target="#carousel-slide" data-slide-to='0' class="active thumbnail"><img src="https://placem.at/places?w=1400&amp;random=1"></div>
	    <div data-target="#carousel-slide" data-slide-to='1' class="thumbnail"><img src="https://placem.at/places?w=1400&amp;random=2"></div>
	    <div data-target="#carousel-slide" data-slide-to='2' class="thumbnail"><img src="https://placem.at/places?w=1400&amp;random=3"></div>
	    <div data-target="#carousel-slide" data-slide-to='3' class="thumbnail"><img src="https://placem.at/places?w=1400&amp;random=4"></div>
    @endif
</div>