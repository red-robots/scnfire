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
            itemWidth: 210,
            itemMargin: 5,
            asNavFor: '#slider'
        });
        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
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
                gutter: 15
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
    $('li.menu-item-has-children').each(function () {
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

});// END #####################################    END