'use strict';

$(document).ready(function () {
    initMce('#input-body');

    $('#btn-img').click(function () {
        var tempImgInput = $('<input>').attr({
            'type': 'file',
            'class': 'temp-input'
        }).css({
            'display': 'none',
            'position': 'absolute'
        }).change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    tinymce.activeEditor.execCommand('insertHTML', false, '<img class="inline-img" src="' + e.target.result + '" width="100%" >');

                    tinymce.activeEditor.uploadImages();
                };
                reader.readAsDataURL(this.files[0]);
            }

            $('.temp-input').remove();
        });
        $('body').append(tempImgInput);
        tempImgInput.click();
    });
});