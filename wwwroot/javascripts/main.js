$(document).ready(function() {
    setLogin();
    $('.carousel').carousel({
        interval: 8000
    })

    $('#toc').each(getTOC);
    setReplistNav();
    setInfoNav();

    $('.user-button.button').popup({
        popup: $('.user-ops-popup.popup'),
        position: 'bottom right',
        on: 'click'
    });

    if ($('#login').length) {
        console.log(1);
        var loginCtrl = new Vue({
            el: '#login',
            data: {
                issignup: 0,
                name: ['登录',
                    '注册'
                ],
                submitFuncs: [login, signup]
            },
            methods: {
                switchPage: function() {
                    this.issignup = 1 - this.issignup;

                },
                submit: function() {
                    this.submitFuncs[this.issignup]();
                }
            }
        })
    }
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
    scrollStatus.init
    changeToolBarPosition();
    $(window).resize(scrollStatus.adaptResize);

    // changeHeaderOrNot();
    $(document).scroll(function() {
        changeToolBarPosition();
    });
});

function addTocItem($item) {
    var tocContainer = $(this);
    var newItem = $('<a>').attr({ 'href': $item.attr('id'), 'class': 'toc-item ' + $item.prop("tagName") });
    tocContainer.append(newItem);
}

function getTOC() {
    console.log('adding toc')
    var tocContainer = $(this);
    tocContainer.addTocItem = addTocItem;
    var tocTarget = $(tocContainer.data('target'));
    var h2count = 0;
    tocTarget.find('h2').each(function() {
        $(this).attr('id', 'h2' + '-' + h2count);
        tocContainer.addTocItem($(this));
        var h3count = 0;
        $(this).find('h3').each(function() {
            $(this).attr('id', 'h3' + '-' + h2count);
            tocContainer.addTocItem($(this));
        })
    })
}

function goBack() {
    if (document.referrer.indexOf(window.location.host) !== -1) {
        history.back();
    }
}

function logOut() {
    //remove cookies and redirect to root page
    Cookies.remove('email');
    Cookies.remove('username');
    window.location = '/';
}

function login() {
    if (!validateInputs()) return 0;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/login');

    xhr.onload = function() {
        var res = JSON.parse(xhr.responseText);
        console.log(res);
        if (res.status == '200') {
            goBack();
            showTipMsg('登录成功', 1);
            Cookies.set('username', res.username, { expires: 7 });
            Cookies.set('email', res.email, { expires: 7 });
        } else if (res.status == '504') {
            showTipMsg('登录失败: ' + res.msg, 0);
            showInputValidation("email", 0);
        }
    };

    var formData = new FormData($('form#login')[0]);
    xhr.send(formData);
}

function signup() {
    if (!validateInputs(1)) return 0;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/signup');

    xhr.onload = function() {
        var res = JSON.parse(xhr.responseText);
        if (res.status == '200') {
            goBack();
            showTipMsg('注册成功', 1);
            Cookies.set('email', res.email, { expires: 7 });
            Cookies.set('username', res.username, { expires: 7 });
        } else if (res.status == '504') {
            showTipMsg('注册失败: ' + res.msg, 0);
            showInputValidation("email", 0);
        }
    };

    var formData = new FormData($('form#login')[0]);
    xhr.send(formData);
}

function setLogin() {
    if (Cookies.get('email')) {
        /**
         * if logged in, do:
         * 1. show user pic instead of login options
         * 2. set login cookies
         */
        $('.login-ops').addClass('hidden');
        $('.user-ops').removeClass('hidden');
        $('label.username').text(Cookies.get('username'));
        $('.user-access-btn').addClass('disabled');

        Cookies.set('email', Cookies.get('email'), { expires: 7 });
        Cookies.set('username', Cookies.get('username'), { expires: 7 });
    }
}


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
        $list.css('transform', 'translateY(' + ($(this).data('index') - 1) * -255 + 'px)');
    })

};

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

    var vpH = $(window).height();
    // Viewport Height
    var st = $(window).scrollTop();

    // Scroll Top
    var y = $(elm).offset().top;
    var elementHeight = $(elm).height();

    if (evalType === 'visible') return y < vpH + st && y > st - elementHeight;
    if (evalType === 'above') return y < vpH + st;
}

function scrollTo(eleId) {
    var body = $("html, body");
    body.stop().animate({
        scrollTop: $(eleId).offset().top
    }, '500');
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function showTipMsg(txt, isok) {
    var color = isok ? 'green' : 'red';
    $('p.tip-message').text(txt).css({
        'background': isok ? 'rgba(55,222,88,0.3)' : 'rgba(222,55,88,0.3)',
        'color': color,
        'border': '1px solid ' + color
    });
}

function showInputValidation(inputName, isok) {
    var $input = $('input[name="' + inputName + '"]');
    var $inputContainer = $('.input.' + inputName);
    if (!isok) {
        $inputContainer.addClass('error');
        $input.focus();
        $input.change(() => {
            $inputContainer.removeClass('error');
            validateInput($input);
        });
    }
    return isok;
}

function validateInput($input) {
    var inputName = $input.attr('name');
    if (inputName == 'email') {
        return showInputValidation(inputName, validateEmail($input.val()));
    };

    if (inputName == 'password') {
        return showInputValidation(inputName, validatePwd($input.val()));
    };

    if (inputName == 'repassword') {
        return $input.val() === $('input[name="password"]').val();
    };
}

function validateInputs(issignup) {
    if (!showInputValidation('email', validateEmail($('input[name="email"]').val()))) {
        showTipMsg('邮件格式不正确', 0);
        return 0;
    }
    if (issignup) {
        if (!showInputValidation('password', validatePwd($('input[name="password"]').val()))) {
            showTipMsg('密码至少6位，并同时包含数字和字母', 0);
            return 0;
        };

        if (!showInputValidation('repassword', $('input[name="repassword"]').val() === $('input[name="password"]').val())) {
            showTipMsg('两次密码输入不相符', 0);
            return 0;
        };
    }
    return 1;
}

function validatePwd(password) {
    var regx = /^(?=.*\d)(?=.*\w)[\d\w]{6,}$/;
    return regx.test(password);
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
