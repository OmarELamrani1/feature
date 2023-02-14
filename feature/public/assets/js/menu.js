$(function() {
    var pathname = window.location.pathname;
    var seleLast = pathname.replace("/", "");
    if (seleLast == "index.asp" || seleLast == "") { $("li#index").addClass("menuHover"); } else {};
    if (seleLast.match('congress')) { $("li#congress").addClass("menuHover"); } else {}; //只要檔名包含press就抓出來
	if (seleLast.match('speakers')) { $("li#speakers").addClass("menuHover"); } else {};
    if (seleLast.match('program')) { $("li#program").addClass("menuHover"); } else {};
    if (seleLast.match('reg')) { $("li#reg").addClass("menuHover"); } else {};
    if (seleLast.match('abstracts')) { $("li#abstracts").addClass("menuHover"); } else {};
    if (seleLast.match('sponsor')) { $("li#sponsor").addClass("menuHover"); } else {};
    if (seleLast.match('social')) { $("li#social").addClass("menuHover"); } else {};
    if (seleLast.match('travel')) { $("li#travel").addClass("menuHover"); } else {};
});
// to top
if ($(window).width() > 801) {
	$(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 500) {
                $('#toTop, #regBtn').fadeIn(300);
            } else {
                $('#toTop, #regBtn').fadeOut(200);
            }
        });

        $("#toTop").click(function() {
            $('html, body').animate({
                scrollTop: ($("body").offset().top) - 50
            }, 1000);
        });
    });
} else {
    $('#toTop').hide();
}

//index news height
if ($(window).width() > 801) {
    $(function() {
        var one = $(".indexNews dd:first-child").height();
        var two = $(".indexNews dd:nth-child(2)").height();
        var three = $(".indexNews dd:nth-child(3)").height();
        var a = [one, two, three];
        console.log(Math.max.apply(null, a)); //取最大值。
        $(".indexNews dd:first-child, .indexNews dd:nth-child(2), .indexNews dd:nth-child(3)").height(Math.max.apply(null, a));
    });
}

if ($(window).width() > 801) {
    $(function() {
        var H = $("#right").height();
		//alert(H);
		if(H>600){
			$("#left").addClass("leftFixed");
		}else{
			$("#left").addClass("leftFloat");
		}
    });
}

    $(function() {
        var H = $(window).height();
		//alert(H);
		$(".bgWrapper").height(H);

    });

//menu 效果
$(function() {
    $('#menu li').hover(function() {
        $(this).addClass('menuHover').children('ul').slideDown(200);;
        if ($(this).children('ul').is(":animated")) return;
    }, function() {
        $(this).removeClass('menuHover').children('ul').stop().slideUp(200);
    });
});
//menu for mobile
$(function() {
    window.scrollTo(0, 1);
    var menu = $("h4.openMenu");
    var submenu = $("ul#menu");
    var win = $(window);
    var content = $("footer, header, article");

    menu.bind("click", open);

    function open() {
        submenu.toggle(200);
        content.bind("click", close);
        menu.toggleClass("changColor");
        //win.bind("scroll",close);
    }

    function close() {
        submenu.fadeOut(200);
        content.unbind("click");
        menu.removeClass("changColor");
        //win.unbind("scroll");
    }
});
//解決 imgcorp 瞬間跳大圖
$(function() {
    $("div.squareThumb, div.recThumb").animate({ opacity: 1 }, 700);
});
//頁面自動高度
$(function() {
    if ($(window).width() > 801) {
        var winHeight = $(window).height();
        var headH = $("#track").outerHeight();
        var footerH = $("footer").outerHeight();
        var menuH = $("#menuWrapper").outerHeight();
        var getHeight = winHeight - headH - footerH - menuH;
        $("article").css('min-height', getHeight);
    }
});
//sub menu
$(function() {
    window.scrollTo(0, 1);
    var menu = $("#left h4");
    var submenu = $("#left ul");
    var win = $(window);
    var content = $("#right,h1");

    menu.bind("click", open);

    function open() {
        submenu.toggle(200);
        content.bind("click", close);
        menu.toggleClass("gray");
        win.bind("scroll", close);
    }

    function close() {
        submenu.fadeOut(200);
        content.unbind("click");
        menu.removeClass("gray");
        win.unbind("scroll");
    }
});
//call fancybox window
// $(".iframe").fancybox({
//     iframe: {
//         css: {
//             width: '600px'
//         }
//     }
// });
