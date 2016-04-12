<!--component:pagination
data requirement: $pagination[type=>"type",count=>$how_many_pages,index=$current_page_index]-->
<div class="pagination">
	@if(!isset($pagination))
		{{$pagination['prevIndex']=$pagination['index']-1}}
		{{$pagination['nextIndex']=$pagination['index']+1}}

		<a class='pagenav prev' href={{$pagination['prevIndex']>0?'/'.$pagination['type'].'/list?page='.$pagination['prevIndex']:'#'}}>Prev</a>

		@for($i=1;$i<=$pagination['count'];$i++)
			<a class='pagenav' href={{'/'.$pagination['type'].'/list?page='.$i}}></a>
		@endfor

		<a class='pagenav next' href={{$pagination['nextIndex']<=$pagination['count']?'/'.$pagination['type'].'/list?page='.$pagination['nextIndex']:'#'}}>Next</a>

		<div class='pagePortal'>
			Goto.page:
			<input type='number' name='pageNo.'></input>
			<a href={{'/'.$pagination['type'].'/list?page='.$pagination['prevIndex']}}>Beam</a>
		</div>
	@else
		<!--test design example without data-->
		<a class='pagenav prev' href='#'}}>Prev</a>

		@for($i=1;$i<=5;$i++)
			<a class='pagenav' href={{'/'.$pagination['type'].'/list?page='.$i}}></a>
		@endfor

		<a class='pagenav next' href='#'}}>Next</a>

		<div class='pagePortal'>
			Goto.page:
			<input type='number' name='pageNo.'></input>
			<a href='#'>Beam</a>
		</div>

	@endif
</div>