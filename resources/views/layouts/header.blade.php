<header>
    <div id="nav">
        <a id='sidebar-toggle' onclick='toggleSidebar()'>
            <i class='fa fa-bars'></i>
        </a>
        <div class="logo-container no-boundry">
            <a class="logo" href='/'>
                <img src="/images/logo.normal.jpg">
            </a>
        </div>
        @include('layouts.mainMenu')
        <div class="login-container">
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
            <div class="direct-ops">
                <a class="login">登录</a>
                <span>|</span>
                <a class="signup">注册</a>
            </div>
        </div>
    </div>
</header>