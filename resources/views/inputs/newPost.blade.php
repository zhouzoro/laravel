<form id="frm" method="post" data-type="evt" action="/tinymce" enctype="multipart/form-data">
    <div id="ul_title">
        <div class="title ui transparent input">
            <input id="input-title" name="title" rows="1" autofocus="autofocus" required="required" placeholder="标题" class="title" />
        </div>
    </div>
    <div id="date_src">
        <div class="ui transparent input">Date:
            <input id="input-date" type="date" name="date" value="2016-01-01" />
        </div>
        <div class="ui transparent input">
            <input id="input-source" type="text" name="source" placeholder="文章/资料来源" required="required" />
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
</form>
<div id="ops">
    <div id="btn-upload" class="ui labeled icon button basic teal small">提交<i class="icon send outline"></i></div>
    <div id="btn-img" class="ui labeled icon button basic orange small">图片<i class="icon file image outline"></i></div>
    <div id="btn-cancel" class="ui labeled icon button basic teal small">取消<i class="icon remove"></i></div>
</div>
