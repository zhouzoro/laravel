<form class='user-access' id="login" action="/login" method="post">
	{{ csrf_field() }}
    <p class="tip-message"></p>
    <div class="ui input">
        <input type="text" name="email" />
    </div>
    <div class="ui input">
        <input type="text" name="password" />
    </div>
    <div class='ui button green login-btn user-access-btn'>登录</div>
</form>