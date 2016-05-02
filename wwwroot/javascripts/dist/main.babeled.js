'use strict';

$(document).ready(function () {
    setLogin();
    setReplistNav();
    setInfoNav();
    changeToolBarPosition();
    $('#carousel-slide > .carousel-inner > .item > img').scroll(function () {
        console.log('scrolled');
        scrollTo('#home-info-center');
    });

    $('carousel-home').hover(function () {
        console.log('hovered');
        scrollTo('#home-info-center');
    });
    $('.user-button.button').popup({
        popup: $('.user-ops-popup.popup'),
        position: 'bottom right',
        on: 'click'
    });
});

function setLogin() {
    if (Cookies.get('id')) {
        console.log(Cookies.get('id'));
        $('a.logout').click(function () {
            Cookies.remove('id');
            window.location = '/';
        });
        $('.user-access-btn').addClass('disabled');
    } else {
        if ($('form#signup')[0]) {
            $('.signup-btn').click(function () {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/signup');

                xhr.onload = function () {

                    var res = JSON.parse(xhr.responseText);
                    console.log(res);
                    if (res.status == '200 OK') {
                        $('p.tip-message').text('注册成功').css({
                            'background': 'rgba(55,222,88,0.4)',
                            'color': 'green',
                            'border': '2px solid green'
                        });
                        console.log(res);
                        console.log(res.id);
                        Cookies.set('id', res.id, { expires: 7 });
                    } else {
                        $('p.tip-message').text('注册失败').css({
                            'background': 'rgba(222,55,88,0.4)',
                            'color': 'red',
                            'border': '2px solid red'
                        });
                    }
                };
                var formData = new FormData($('form#signup')[0]);
                xhr.send(formData);
            });
        }
    }
}

function setReplistNav() {
    if (!$('.report-intro-list-nav')[0]) return;

    var $list = $('.report-intro-list');
    var listPos = function () {
        var listLen = $('.report-intro-list .item').length;
        var currentPos = 1;
        return {
            up: function up() {
                if (currentPos > 2) {
                    currentPos = currentPos - 2;
                } else {
                    currentPos = 1;
                }
                $list.css('transform', 'translateY(' + (1 - currentPos) * 108 + 'px)');
            },

            down: function down() {
                if (listLen - currentPos > 2) {
                    currentPos = currentPos + 2;
                } else {
                    currentPos = listLen - 1;
                }
                $list.css('transform', 'translateY(' + (1 - currentPos) * 108 + 'px)');
            }
        };
    }();
    var $up = $('.report-intro-list-nav.up').click(listPos.up);
    var $down = $('.report-intro-list-nav.down').click(listPos.down);
}

function setInfoNav() {
    if (!$('.info-center')[0]) return;
    var $list = $('.info-content-list');
    $('.service-menu .item').click(function () {
        var width = $('.info-content').height();
        console.log(width);
        console.log($(this));
        $list.css('transform', 'translateY(' + ($(this).data('index') - 1) * -255 + 'px)');
    });
};

// changeHeaderOrNot();
$(document).scroll(function () {
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