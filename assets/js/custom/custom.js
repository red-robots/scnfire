/**
 *    Custom jQuery Scripts
 *
 *    Developed by: Austin Crane
 *    Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {

    /*
     *
     *	Current Page Active
     *
     ------------------------------------*/
    $("[href]").each(function () {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });

    /*
     *
     *	Flexslider
     *
     ------------------------------------*/
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 70,
            itemMargin: 5,
            asNavFor: '#flexslider'
        });
        $('#flexslider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            smoothHeight: true,
            sync: "#carousel"
        });
    $('.slider.wrapper >.flex-next').click(function (e) {
        e.preventDefault();
        $('.flex-direction-nav .flex-next').click();
    });
    $('.slider.wrapper >.flex-prev').click(function (e) {
        e.preventDefault();
        $('.flex-direction-nav .flex-prev').click();
    });
    $('.slider.wrapper .overlay .plus-icon').click(function(){
        $('.slider.wrapper .overlay .info').css({
            "display":"flex"
        });
    });
    $('.slider.wrapper .overlay .close-icon').click(function(){
        $('.slider.wrapper .overlay .info').css({
            "display":"none"
        });
    });
    /*
     *
     *	Colorbox
     *
     ------------------------------------*/
    $('a.gallery').colorbox({
        rel: 'gal',
        width: '80%',
        height: '80%'
    });

    /*
     *
     *	Isotope with Images Loaded
     *
     ------------------------------------*/
    var $container = $('.is-container').imagesLoaded(function () {
        $container.isotope({
            // options
            itemSelector: '.is-item',
            masonry: {
                gutter: 5
            }
        });
    });

    /*
     *
     *	Smooth Scroll to Anchor
     *
     ------------------------------------*/
    /*$('a').click(function(){
     $('html, body').animate({
     scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
     }, 500);
     return false;
     });
     */

    /*
     *
     *	Equal Heights Divs
     *
     ------------------------------------*/
    $('.js-blocks').matchHeight();

    /*
     *
     *	Wow Animation
     *
     ------------------------------------*/
    new WOW().init();

    /*custom menu */
    $('#main-sidebar li.menu-item-has-children, #home-navigation li.menu-item-has-children').each(function () {
        var $this = $(this);
        var $sub_menu = $this.children('.sub-menu');
        if ($sub_menu.find("a.active").length > 0) {
            $sub_menu.show();
            $this.css({
                paddingBottom: "0px",
            });
        }
        $this.click(function (e) {
            if ($this.children('a').is(e.target)) {
                e.preventDefault();
                if ($sub_menu.css("display") === "block") {
                    $sub_menu.hide();
                    $this.css({
                        paddingBottom: "",
                    });
                } else {
                    $sub_menu.show();
                    $this.css({
                        paddingBottom: "0px",
                    });
                }
            }
        });
    });

    $('#main-sidebar .hamburger').click(function(){
       if($('#main-sidebar >.wrapper >.wrapper').hasClass("toggled-on")){
           $('#main-sidebar >.wrapper >.wrapper').removeClass("toggled-on");
           $('#colophon').removeClass("toggled-on");
       } else {
           $('#main-sidebar >.wrapper >.wrapper').addClass("toggled-on");
           $('#colophon').addClass("toggled-on");
       }
    });

});// END #####################################    END