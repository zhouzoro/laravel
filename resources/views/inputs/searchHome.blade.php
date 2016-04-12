<div id="search-home">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
        <div class="search-container">
            <form class="search-home" action="/test" method='post'>
                {{ csrf_field() }}
                <div class="selections ui form">
                    <div class="inline fields">
                        @foreach($searchCategories as $index=>$item)
                            <div class="field">
                                <div class="ui radio checkbox">
                                    @if($index === 0)
                                        <input type="radio" name="search-category" value={{ $item['id'] }} checked="checked">
                                    @else
                                        <input type="radio" name="search-category" value={{ $item['id'] }}>
                                    @endif
                                    <label>{{$item['name']}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="search-bar">
                    <div class="ui input tansparent icon">
                        <input type="text" placeholder="Search anything...">
                        <i class="search icon"></i>
                    </div>
                </div>
                <input class="search-submit" type="submit"></input>
            </form>
        </div>
    </div>
</div>