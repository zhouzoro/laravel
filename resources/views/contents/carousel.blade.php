<div id="carousel-slide" data-ride="carousel" data-pause="false" class="carousel slide carousel-fade">
    <div role="listbox" class="carousel-inner">
	    @if(isset($carouselItems))
	    	@foreach($carouselItems as $index=>$item)
		        <div class={{$index===0?"item active":"item"}}><img src={{$item['cover']}} alt="slider image" class="slr-img cursor-pointer">
		            <div class="carousel-caption">
		                <h2 href={{"/".$item['type']."/".$item['id']}}>{{$item['title']}}</h2>
		                <label class="slabelextra">
		                    <label class="slabeldate">{{$item['updated_at']}}</label>
		                    <label class="slabelsource">{{$item['athor_name']}}</label>
		                </label>
		            </div>
		        </div>
	        @endforeach
	    @else
	        <div class="item active"><img src="https://placem.at/places?w=1400&amp;random=1" alt="slider image" class="slr-img cursor-pointer">
	            <div class="carousel-caption">
	                <h2 href="">全国首家邮轮分享与点评平台</h2>
	                <label class="slabelextra">
	                    <label class="slabeldate">2016</label>
	                    <label class="slabelsource">漫行邮轮</label>
	                </label>
	            </div>
	        </div>
	        <div class="item"><img src="https://placem.at/places?w=1400&amp;random=2" alt="slider image" class="slr-img cursor-pointer">
	            <div class="carousel-caption">
	                <h2 href="">全国首家邮轮分享与点评平台</h2>
	                <label class="slabelextra">
	                    <label class="slabeldate">2016</label>
	                    <label class="slabelsource">漫行邮轮</label>
	                </label>
	            </div>
	        </div>
	        <div class="item"><img src="https://placem.at/places?w=1400&amp;random=3" alt="slider image" class="slr-img cursor-pointer">
	            <div class="carousel-caption">
	                <h2 href="">全国首家邮轮分享与点评平台</h2>
	                <label class="slabelextra">
	                    <label class="slabeldate">2016</label>
	                    <label class="slabelsource">漫行邮轮</label>
	                </label>
	            </div>
	        </div>
	        <div class="item"><img src="https://placem.at/places?w=1400&amp;random=4" alt="slider image" class="slr-img cursor-pointer">
	            <div class="carousel-caption">
	                <h2 href="">全国首家邮轮分享与点评平台</h2>
	                <label class="slabelextra">
	                    <label class="slabeldate">2016</label>
	                    <label class="slabelsource">漫行邮轮</label>
	                </label>
	            </div>
	        </div>
	    @endif
    </div>
</div>
