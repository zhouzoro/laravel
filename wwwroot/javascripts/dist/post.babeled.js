'use strict';

$(document).ready(function () {
    if (!Cookies.get('new_post')) {
        Cookies.set('new_post', {});
    }
    initMce('#input-body');
    $('form#frm').find('input').change(cachePostInput);

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

    ///////geonames
    function showNames() {
        var _this = this;
        var resList = $(_this).next('.result');
        $.get('http://api.geonames.org/searchJSON?lang=ZH&username=zhouzoro&maxRows=10&q=' + $(_this).val(), function (res) {
            resList.empty();
            if (res.geonames.length === 0) {
                resList.append('No Results Found');
            }
            var _iteratorNormalCompletion = true;
            var _didIteratorError = false;
            var _iteratorError = undefined;

            try {
                for (var _iterator = res.geonames[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                    var geoname = _step.value;

                    var listItem = $('<li>').attr('class', 'geoname-resultlist-item');
                    var listLink = $('<a>').attr('data-id', geoname.geonameId).append($('<span>').attr('class', 'name').text(geoname.name)).append($('<span>').attr('class', 'toponymName').text('(' + geoname.toponymName + ')'));
                    if (geoname.countryName && geoname.countryName !== '') {
                        listLink.append($('<span>').attr('class', 'countryName').text(', ' + geoname.countryName)).append($('<span>').attr('class', 'toponymName').text('(' + geoname.toponymName + ')'));
                    }
                    resList.append(listItem.append(listLink));
                }
            } catch (err) {
                _didIteratorError = true;
                _iteratorError = err;
            } finally {
                try {
                    if (!_iteratorNormalCompletion && _iterator.return) {
                        _iterator.return();
                    }
                } finally {
                    if (_didIteratorError) {
                        throw _iteratorError;
                    }
                }
            }
        });
    }
    $('.geosearch').keyup(showNames).change(showNames);
});

function cachePostInput() {
    var $input = $(this);
    var cachedInputs = JSON.parse(Cookies.get('new_post'));
    cachedInputs[$input.attr('name')] = $input.val();
    Cookies.set('new_post', cachedInputs, { expires: 7 });
}

function readInputCache() {
    var cachedInputs = JSON.parse(Cookies.get('new_post'));
    for (var key in cachedInputs) {
        $('input[name="' + key + '"').val(cachedInputs[key]);
        if (key === "hero-img") {
            $('.post-hero').css({ 'background': 'url("http://' + window.location.host + cachedInputs[key] + '")', 'background-size': 'cover' });
        }
        if (key === "content") {
            tinymce.activeEditor.setContent(cachedInputs[key]);
        }
    }
}

function removeInputCache() {
    Cookies.remove('new_post');
}

function uploadPost() {
    tinymce.activeEditor.uploadImages(function (success) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/cruiser_reports');

        xhr.onload = function () {
            var res = JSON.parse(xhr.responseText);
            if (res.status == '200') {
                removeInputCache();
                window.location = res.url;
            } else if (res.status == '504') {
                showTipMsg('上传失败: ' + res.msg, 0);
            }
        };

        var contentHtml = tinymce.activeEditor.save();
        var quote = getQuoteText(contentHtml);
        $('input[name=content]').val(contentHtml);
        $('input[name=quote]').val(quote);
        var formData = new FormData($('form#frm')[0]);
        formData.append('username', Cookies.get('username'));
        formData.append('email', Cookies.get('email'));
        xhr.send(formData);
        console.log(9);
    });
}

function initMce(selector, docId) {
    var inline = docId ? true : false;
    tinymce.init({
        selector: selector,
        skin: 'mxc1',
        language: 'zh_CN',
        content_css: '/stylesheets/dist/travelogue.min.css',
        body_class: 'travelogue',
        //inline: inline,
        plugins: ["autoresize", "advlist", "autolink", "lists", "link", "image", "charmap", "print", "preview", "anchor", "searchreplace", "visualblocks", "code", "fullscreen", "insertdatetime", "media", "table", "paste", "imagetools"],
        // plugins: 'table autoresize paste image imagetools preview',
        /*style_formats: [{ title: 'H1', block: 'h1' }, { title: 'H2', block: 'h2' }, { title: 'H3', block: 'h3' }, { title: 'Bold text', inline: 'strong' }, { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } }, { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } }, { title: 'Badge', inline: 'span', styles: { display: 'inline-block', border: '1px solid #2276d2', 'border-radius': '5px', padding: '2px 5px', margin: '0 2px', color: '#2276d2' } }, { title: 'Table row 1', selector: 'tr', classes: 'tablerow1' }],
        formats: {
            alignleft: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'left' },
            aligncenter: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'center' },
            alignright: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'right' },
            alignfull: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'full' },
            bold: { inline: 'span', 'classes': 'bold' },
            italic: { inline: 'span', 'classes': 'italic' },
            underline: { inline: 'span', 'classes': 'underline', exact: true },
            strikethrough: { inline: 'del' },
            customformat: { inline: 'span', styles: { color: '#00ff00', fontSize: '20px' }, attributes: { title: 'My custom format' }, classes: 'example1' }
        },*/
        //content_css: '/stylesheets/person.min.css',
        //plugins: "advlist lists link anchor contextmenu paste image autoresize preview imagetools lists",
        toolbar: 'undo redo styleselect fontsizeselect bold italic underline alignleft aligncenter alignright alignfull advlist lists link',
        image_caption: true,
        paste_data_images: true,
        //block_formats: 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3',
        fontsize_formats: '8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt',
        //plugins: "contextmenu",
        //contextmenu: "formatselect bold italic link image inserttable | cell row column deletetable",
        menubar: false,
        images_upload_url: '/upload/images',
        statusbar: false,
        min_height: 480,

        setup: function setup(ed) {
            ed.on('change', function (e) {
                var contentHtml = ed.save();
                $('input[name=content]').val(contentHtml).change();
            });
            ed.on('init', function (e) {
                readInputCache();
            });
        }
    });
}

$('.add-btn').click(function () {
    var transloader = $('<div>').attr('class', 'expand-transition');
    $(this).append(transloader);
    var targetUrl = $(this).data('url');
    var uploadType = $(this).data('type');
    $.get(targetUrl, function (res) {
        $('#modal-cust').find('.container').html(res);
        $('#btn-cancel').click(function () {
            $('#body').show();
            $('#modal-cust').hide('fast');
            $('#modal-cust').find('.container').html('');
        });
        $('#modal-cust').show('slow');
        $('#body').hide('slow');
        initUploadOf(uploadType);
        transloader.remove();
        $('#edit-pic').click(uploadPic);
    });
});

function uploadPic() {
    var img = $(this).next('img');
    var loader = $(this).find('#pic-loader');
    var label = $(this).find('label');
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
                img.attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
            label.removeClass('btn').addClass('pct');
            var updateProgress = function updateProgress(oEvent) {
                var pct = Math.ceil(100 * oEvent.loaded / oEvent.total);
                var height = 100 - pct;
                loader.css({ 'height': height + 'px' });
                label.text(pct + '%');
            };
            var fileUploadReq = new XMLHttpRequest();
            fileUploadReq.withCredentials = false;
            fileUploadReq.open('POST', '/images');

            fileUploadReq.onload = function () {
                var json = JSON.parse(fileUploadReq.responseText);
                console.log(json.location);
                img.attr('src', json.location);
                label.removeClass('pct').addClass('btn').text('change');
                $('.temp-input').remove();
            };
            fileUploadReq.upload.addEventListener("progress", updateProgress, false);
            var formData = new FormData();
            formData.append('image', this.files[0], this.files[0].name);
            fileUploadReq.send(formData);
        }
    });
    $('body').append(tempImgInput);
    tempImgInput.click();
}

function uploadHero() {
    var hero = $('.post-hero');
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
                hero.css({ 'background': 'url("' + e.target.result + '")', 'background-size': 'cover' });
            };
            reader.readAsDataURL(this.files[0]);
            /*label.removeClass('btn').addClass('pct');
            var updateProgress = function updateProgress(oEvent) {
                var pct = Math.ceil(100 * oEvent.loaded / oEvent.total);
                var height = 100 - pct;
                loader.css({ 'height': height + 'px' });
                label.text(pct + '%');
            };*/
            var fileUploadReq = new XMLHttpRequest();
            fileUploadReq.withCredentials = false;
            fileUploadReq.open('POST', '/upload/images');

            fileUploadReq.onload = function () {
                var json = JSON.parse(fileUploadReq.responseText);
                hero.css({ 'background': 'url("http://' + window.location.host + json.location + '")', 'background-size': 'cover' });
                $('.input-hero-img').val(json.location).change();
                //label.removeClass('pct').addClass('btn').text('change');
                $('.temp-input').remove();
            };
            //fileUploadReq.upload.addEventListener("progress", updateProgress, false);
            var formData = new FormData();
            formData.append('image', this.files[0], this.files[0].name);
            fileUploadReq.send(formData);
        }
    });
    $('body').append(tempImgInput);
    tempImgInput.click();
}

function computProgress(oEvent) {
    var percentComplete = Math.ceil(1000 * oEvent.loaded / oEvent.total) / 10 + '%';
    return percentComplete;
}

function GetCurrentDate() {
    var cdate = new Date();
    var month = cdate.getMonth() < 9 ? '0' + (cdate.getMonth() + 1) : cdate.getMonth() + 1;
    var currentDate = cdate.getFullYear() + "-" + month + "-" + cdate.getDate();
    return currentDate;
}

function getQuoteText(htmlStr) {
    var p = '';
    $(htmlStr).find('*').each(function () {
        if ($(this).text().length > 32) {
            p = $(this).text();
            return false;
        }
    });
    return p;
}