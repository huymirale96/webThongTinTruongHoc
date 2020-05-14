(function($) {

    $.fn.menumaker = function(options) {

        var cssmenu = $(this), settings = $.extend({
            title: "Menu",
            format: "dropdown",
            sticky: false
        }, options);

        return this.each(function() {
            cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
            $(this).find("#menu-button").on('click', function(){
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.hide().removeClass('open');
                }
                else {
                    mainmenu.show().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });

            cssmenu.find('li ul').parent().addClass('has-sub');

            multiTg = function() {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function() {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').hide();
                    }
                    else {
                        $(this).siblings('ul').addClass('open').show();
                    }
                });
            };

            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');

            if (settings.sticky === true) cssmenu.css('position', 'fixed');

            /*resizeFix = function() {
                if ($( window ).width() > 768) {
                    cssmenu.find('ul').show();
                }

                if ($(window).width() <= 768) {
                    cssmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);*/

        });
    };
})(jQuery);
$(document).ready(function(){

    $('#lastest .item').hover(function(){
        $('.top-news-left').html($(this).html());
        $('#lastest .item').removeClass("selected");
        $(this).addClass("selected")
    });

    $('.box-photo .item-right .item').hover(function(){
        $('.box-photo .first img').attr("src", $(this).find('a').data("img"));
        $('.box-photo .item-right .item').removeClass("selected");
        $(this).addClass("selected");
    });
    
    $.ajax({
            url: '/theme/school004/plugins/swiper/js/swiper.js',
            dataType: "script",
            cache: true
    }).done(function() {
        /* BIGIN  CHAY SLIDE ẢNH TRONG BAI VIET*/
        $("body").append('<div class="full-fit hide"><div class="swiper-container"><div class="swiper-wrapper"></div><div class="swiper-pagination swiper-pagination-white"></div><div class="swiper-button-prev hinh-button-prev"></div><div class="swiper-button-next hinh-button-next"></div><button class="btn btn-default full-fit-close" title="Đóng"></button></div></div>');
        $('.article .content img').each(function() {
            $(this).wrap('<a href="#" class="swipebox"></a>')
            $(this).addClass("img-galery").data("url", $(this).attr("src")).attr("style", "margin: 40px 0;");

            var s = $(this).attr('src');
            var l = '';
            var pp1 = "";
            if ($(this).attr('alt') != null && $(this).attr('alt').length > 0) { pp1 = '<div class="swiper-disc">' + $(this).attr('alt') + '</div>'; }

            var m = '<div class="swiper-slide"><div class="swiper-zoom-container"><img src="' + $(this).attr('src') + '" style="margin: 40px 0 5px 0; height:'+($( window ).height() - 100)+'px"/></div>' + pp1 + '</div>';
            $('.swiper-wrapper').append(m)
        })


        $('.article .content img').click(function() {
            $(".full-fit").show();
            var swiper = new Swiper('.swiper-container', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            $(document).keyup(function(e) {
                if (e.key === "Escape") { //escape key maps to keycode `27`
                    $(".full-fit").hide();
                }
            });
            $(".full-fit-close").click(function() { $(".full-fit").hide(); });
            return false ;
        })
        /* END CHAY SLIDE ẢNH TRONG BAI VIET*/

        if($('#box-top-photo-player').is("div")) {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 3,
                spaceBetween: 30,
                autoplay: {
                    delay: 5000,
                },
                pagination: {
                  el: '.swiper-pagination',
                  clickable: true,
                },
                navigation: {
                  nextEl: '.swiper-button-next',
                  prevEl: '.swiper-button-prev',
                },
            });
        }
    });

    $('.xemthem').click(function(){
        var limit = 1;
        var start = parseInt($(this).data("start"));
        var data = {};
        if($('.box-search').is('div')) {
            data = { start: start, 'key': $('.box-search #key').val(), 'limit': limit };
        }else {
            data = { start: start, 'category_id': $(this).data("id"), 'limit': limit };
        }
        $.getJSON( "/service/news/getList", data)
            .done(function( rs ) {
                if (rs.data.length > 0) {
                    for (i = 0 ; i < rs.data.length; i ++ ) {
                        var row = rs.data[i];
                        $url = '/tin-tuc/' + row["slug"] + '-' + row["id"] + '.html';
                        var item = '<div class="item">';
                        item += '<a href="' + $url + '" class="avatar">';
                        item += '<img src="' + row["image_url"] + '">';
                        item += '</a>';
                        item += '<h3><a class="title" href="' + $url + '">' + row["name"] + '</a></h3>';
                        item += '<div class="lead">' + row["description"] + '</div>';
                        item += '<div class="clear">.</div>';
                        item += '</div>';
                        $('.news-list').append(item);
                    }
                }
                if(rs.data.length != limit)  $('.xemthem').hide();
            })
            .fail(function( jqxhr, textStatus, error ) {
            });
        start = start + limit;
        $('.xemthem').data("start", start);
    });
});

document.write('<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4df5cb3a5beae9e7"></script>');