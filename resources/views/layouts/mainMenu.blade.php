<div class="menu">
    @foreach($menuItems as $item)
        <div class="menu-item">
            <a class="item" href={{ "/".$item["id"] }}>{{ $item["name"] }}</a>
            @if(array_key_exists('sub', $item))
                <div class="sub-menu">
                    @foreach($item["sub"] as $subItem)
                        <a class="item-sub" href={{ "/".$item["id"]."/".$subItem["id"] }}>{{ $subItem["name"] }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
</div>