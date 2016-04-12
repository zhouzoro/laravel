<div id="articles-container">
    @include('components.articleMenu')
    <div id="articles-list">
	    @if(isset($articles))
		    @foreach($articles as $article)
			    @include('contents.postsMediumStyle',['previewItem'=>$article])
		    @endforeach
	    @else
		    @for($i=0;$i<6;$i++)
			    @include('contents.postsMediumStyle')
		    @endfor
	    @endif
    </div>
    @include('components.articleMenu')
</div>