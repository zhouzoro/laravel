<form class='user-access' id="signup" action="/signup" method="post">
    {{ csrf_field() }}
    <p class="tip-message"></p>
    <div class="ui input email">
        <input type="text" name="email" placeholder="邮箱" />
    </div>
    <div class="ui input password">
        <input type="password" name="password" placeholder="密码" />
    </div>
    <div class="ui input repassword">
        <input type="password" name="repassword" placeholder="确认密码" />
    </div>
    <a class='ui button green signup-btn user-access-btn' data-redirect={{isset($redirect)? $redirect : '/'}} onclick='signup()'>注册</a>
</form>