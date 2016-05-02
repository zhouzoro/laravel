<header>
    <div id="nav">
        <a id='sidebar-toggle' onclick='toggleSidebar()'>
            <i class='fa fa-bars'></i>
        </a>
        <div class="logo-container no-boundry">
            <a class="logo" href='/'>
                <img src="/images/logo/normal.jpg">
            </a>
        </div>
        @include('layouts.mainMenu')
        <div class="header-right">
            <div class="login-ops">

                <div class="out-links">
                    <div class="out-link qq">
                        <i class="fa fa-qq"></i>
                    </div>
                    <div class="out-link weixin">
                        <i class="fa fa-weixin"></i>
                    </div>
                    <div class="out-link weibo">
                        <i class="fa fa-weibo"></i>
                    </div>
                </div>

                <a class="login" href='/login'>登录</a>
                <span>|</span>
                <a class="signup" href='/signup'>注册</a>

            </div>

            <div class="user-ops">
                <div class="user-button ui button data-position='bottom center'">
                    <img src="/images/user/007.jpg" />
                </div>
                <div class="user-ops-popup ui popup bottom right transition hidden">
                    <div class="popup-content">
                        <label class='username'>User007</label>
                        <div class="divider border-top"><a href="">View Profile</a></div>
                        <div class="divider border-top"><a href="">Settings</a><a href="#" class='logout'>Log out</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>