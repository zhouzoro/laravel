<form id="frm" method="post" data-type="evt" action="/tinymce" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="ul_title">
        <div class="title ui input">
            <input id="input-title" name="title" rows="1" autofocus="autofocus" required="required" placeholder="标题" class="title" />
        </div>
    </div>
    <div class='mce-top-indicator'></div>
    <div id="frm-body">
        <div class="mymce-container">
            <div id="input-body">
                <br>
            </div>
        </div>
    </div>
    <div class="hidden">
        <input class='input-content' type="text" name="content" />
        <input class='input-quote' type="text" name="quote" />
        <input class='input-hero-img' type="text" name="hero-img" />
    </div>
</form>
<div id="ops">
    <div id="btn-upload" class="ui labeled icon button basic teal small" onclick='uploadPost()'>发布<i class="icon send outline"></i></div>
    <div id="btn-img" class="ui labeled icon button basic orange small">图片<i class="icon file image outline"></i></div>
    <div id="btn-cancel" class="ui labeled icon button basic teal small">预览<i class="icon eye"></i></div>
</div>
