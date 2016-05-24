<form class='user-access' id="login" action="/login" method="post">
	{{ csrf_field() }}
    <p class="tip-message"></p>
    <div class="ui input">
        <input type="text" name="email" placeholder="邮箱/用户名" />
    </div>

    <div class="ui input">
        <input type="password" name="password" placeholder="密码" />
    </div>

    <div v-bind:class="{'hidden': !issignup}" class="ui input repassword signup-only">
        <input type="password" name="repassword" placeholder="确认密码" />
    </div>

    <a class='ui button green login-btn user-access-btn' data-redirect={{isset($redirect)? $redirect : '/'}} v-on:click="submit()">@{{ name[issignup] }}</a>
    <a class='ui blue basic signup-btn user-access-btn' data-redirect={{isset($redirect)? $redirect : '/'}} v-on:click="switchPage()">@{{ name[1 - issignup] }}</a>
</form>