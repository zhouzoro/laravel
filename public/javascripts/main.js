$(document).ready(function() {

    $('#sidebar-hidden').find('.item.nav-link').click(function() {
        $('.sidebar').sidebar('hide');
    });
    setReplistNav();
    setInfoNav();
    changeToolBarPosition();
});

function setReplistNav() {
    if (!$('.report-intro-list-nav')[0]) return;

    var $list = $('.report-intro-list');
    var listPos = function() {
        var listLen = $('.report-intro-list .item').length;
        var currentPos = 1;
        return {
            up: function() {
                if (currentPos > 2) {
                    currentPos = currentPos - 2;
                } else {
                    currentPos = 1;
                }
                $list.css('transform', 'translateY(' + (1 - currentPos) * 108 + 'px)');
            },

            down: function() {
                if (listLen - currentPos > 2) {
                    currentPos = currentPos + 2;
                } else {
                    currentPos = listLen - 1;
                }
                $list.css('transform', 'translateY(' + (1 - currentPos) * 108 + 'px)');
            }
        }
    }();
    var $up = $('.report-intro-list-nav.up').click(listPos.up);
    var $down = $('.report-intro-list-nav.down').click(listPos.down);
}

function setInfoNav() {
    if (!$('.info-center')[0]) return;
    var $list = $('.info-content-list');
    $('.service-menu .item').click(function() {
        var width = $('.info-content').height();
        console.log(width);
        console.log($(this));
        $list.css('transform', 'translateY(' + ($(this).data('index')-1) * -258.2 + 'px)');
    })

};
// changeHeaderOrNot();
$(document).scroll(function() {
    changeToolBarPosition();
});
var scrollStatus = {
    scrollRecord: [0, 0],
    init: function init() {
        scrollStatus.setPosition();
    },
    setPosition: function setPosition() {
        scrollStatus.position = $(window).scrollTop();
    },
    recordScroll: function recordScroll() {
        scrollStatus.scrollRecord[1] = scrollStatus.scrollRecord[0];
        scrollStatus.scrollRecord[0] = $(window).scrollTop() > scrollStatus.position ? -1 : 1;
        scrollStatus.position = $(window).scrollTop();
        scrollStatus.direction = scrollStatus.scrollRecord[0] === -1 ? 'down' : 'up';
        scrollStatus.continuous = scrollStatus.scrollRecord[0] === scrollStatus.scrollRecord[1];
    },
    adaptResize: function adaptResize() {
        scrollStatus.init();
    }
};

$(document).ready(scrollStatus.init);
$(window).resize(scrollStatus.adaptResize);


function toggleSidebar() {
    $('.sidebar').sidebar('toggle');
}

function ScrollTop() {
    var body = $("html, body");
    body.stop().animate({
        scrollTop: 0
    }, '500');
}

function showScrollTop() {
    if (!checkVisible($('#top-indicator'))) {
        $('#vertical-nv').removeClass("normal").addClass("pinned");
        $('#scroll-top').removeClass("out").addClass("in");
    } else {
        $('#vertical-nv').removeClass("pinned").addClass("normal");
        $('#scroll-top').removeClass("in").addClass("out");
    }
}

function changeToolBarPosition() {
    var $mceToolbar = $('.mce-toolbar-grp.mce-container.mce-panel.mce-stack-layout-item.mce-first');
    var $editorOps = $('#ops');
    if ($mceToolbar[0]) {
        if (!checkVisible($('.mce-top-indicator'))) {
            $mceToolbar.addClass("pinned");
        } else {
            $mceToolbar.removeClass("pinned");
        }
    }
    if ($editorOps[0]) {
        if (!checkVisible($('footer'))) {
            $editorOps.addClass("pinned");
        } else {
            $editorOps.removeClass("pinned");
        }
    }
}

function checkVisible(elm, evalType) {
    evalType = evalType || 'visible';

    var vpH = $(window).height(),


        // Viewport Height
        st = $(window).scrollTop(),


        // Scroll Top
        y = $(elm).offset().top,
        elementHeight = $(elm).height();

    if (evalType === 'visible') return y < vpH + st && y > st - elementHeight;
    if (evalType === 'above') return y < vpH + st;
}

function scrollTo(eleId) {
    var body = $("html, body");
    body.stop().animate({
        scrollTop: $(eleId).offset().top
    }, '500');
}

function initMce(selector, docId) {
    var inline = false;
    if (docId) inline = true;
    tinymce.init({
        selector: selector,
        skin: 'mxc1',
        language: 'zh_CN',
        //content_css: '/stylesheets/mce.min.css',
        //inline: inline,
        plugins: 'table autoresize paste image imagetools preview',
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
        toolbar: 'formatselect fontsizeselect bold italic underline strikethrough alignleft aligncenter alignright alignfull advlist lists link image preview',
        image_caption: true,
        paste_data_images: true,
        //block_formats: 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3',
        fontsize_formats: '8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt',
        //plugins: "contextmenu",
        //contextmenu: "formatselect bold italic link image inserttable | cell row column deletetable",
        menubar: false,
        images_upload_url: '/images',
        statusbar: false,
        min_height: 480
    });
}

$('.add-btn').click(function() {
    var transloader = $('<div>').attr('class', 'expand-transition');
    $(this).append(transloader);
    var targetUrl = $(this).data('url');
    var uploadType = $(this).data('type');
    $.get(targetUrl, function(res) {
        $('#modal-cust').find('.container').html(res);
        $('#btn-cancel').click(function() {
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
    }).change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
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

            fileUploadReq.onload = function() {
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

function computProgress(oEvent) {
    var percentComplete = Math.ceil(1000 * oEvent.loaded / oEvent.total) / 10 + '%';
    return percentComplete;
}

/*function initUploadOf(type, docId) {
    initMce('#input-body', docId);
    if (type === 'people') {
        console.log('uploading type of ' + type);
        $('#btn-upload').click(function() {
            $('#loader').modal('show');
            var people = $('#upload-people');
            var data = {
                name: people.find('#input-name').val(),
                picture: people.find('#profile-pic').find('img').attr('src'),
                title: people.find('#input-title').val(),
                degree: people.find('#input-degree').val(),
                office: people.find('#input-office').val(),
                email: people.find('#input-email').val(),
                phone: people.find('#input-phone').val(),
                details: tinymce.activeEditor.save()
            };
            if (docId) data.id = docId;
            $.post('/add_people', data, function(res) {
                if (docId) document.location.reload(true);
                else window.location = res.url;
            });
        })
    } else {
        var attManager = initManeger();
        var vue = new Vue({
            el: '#app',
            data: {
                atts: []
            },
            methods: {
                remove: function remove(att) {
                    att.abort();
                    this.atts.$remove(att);
                }
            }
        });
        $('#btn-img').click(function() {
            var tempImgInput = $('<input>').attr({
                'type': 'file',
                'class': 'temp-input'
            }).css({
                'display': 'none',
                'position': 'absolute'
            }).change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        tinymce.activeEditor.execCommand('insertHTML', false, '<img class="inline-img" src="' + e.target.result + '" width="80%" >');

                        tinymce.activeEditor.uploadImages();
                    };
                    reader.readAsDataURL(this.files[0]);
                }

                $('.temp-input').remove();
            });
            $('body').append(tempImgInput);
            tempImgInput.click();
        });

        $('#input-date').val(GetCurrentDate());
        $('#btn-att').click(function() {
            vue.atts.push(attManager.addAtt());
        });
        $('#btn-upload').click(function() {
            $('#loader').modal('show');
            var loader = $('#loader').find('.loader');
            loader.text('uploading Images');
            tinymce.activeEditor.uploadImages(function(success) {
                loader.text('wrapping together');
                var attHtml = attManager.wrapUp(vue.atts);
                data = {
                    title: $('#input-title').val(),
                    date: $('#input-date').val(),
                    source: $('#input-source').val(),
                    cover: $(tinymce.activeEditor.save()).find('img').attr('src'),
                    quote: getQuoteText(tinymce.activeEditor.save()),
                    body: tinymce.activeEditor.save() + attHtml,
                    att: attHtml
                };
                if (docId) data.id = docId;
                loader.text('uploading');
                var posturl = '/add_' + type;
                $.post(posturl, data, function(res) {
                    $('#loader').modal('hide');
                    if (docId) document.location.reload(true);
                    else window.location = res.url;
                });
            });
        });
    }

}*/

function GetCurrentDate() {
    var cdate = new Date();
    var month = cdate.getMonth() < 9 ? '0' + (cdate.getMonth() + 1) : cdate.getMonth() + 1;
    var currentDate = cdate.getFullYear() + "-" + month + "-" + cdate.getDate();
    return currentDate;
}

function getQuoteText(htmlStr) {
    var p = '';
    $(htmlStr).find('*').each(function() {
        if ($(this).text().length > 32) {
            p = $(this).text();
            return false;
        }
    });
    return p;
}
