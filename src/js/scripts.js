//==============================================================================================================
										
// 1. FUNCTIONS
// 2. EXECUTE   
// 3. EXECUTE PLUGINS

	
(function($) {


//==============================================================================================================

// 1. FUNCTIONS

// ==============================================================================================================

    function nav_toggler(){
        var viewPort = $(window),
            resizeTimeoutId = 0,
            menu_trigger = $('#js-global-nav-toggler'),
            target = $('#js-global-nav');

        menu_trigger.on('click', function(){
            target.toggleClass('s-is-active');
            menu_trigger.toggleClass('s-is-active');
        });

        viewPort.on('resize', function(){
            clearTimeout(resizeTimeoutId);
            resizeTimeoutId = setTimeout(function(){
                target.removeClass('s-is-active');
                menu_trigger.removeClass('s-is-active');
            },300);
        });
    }

    function easein_item(elem){
        var arr_elem = $(elem);

        arr_elem.each(function(i){
            var $this = $(this);

            setTimeout(function(){
                $this.addClass('s-faded-is-visible');
            }, i*150);
        });
    }

    function scroll_to_content(){
        var scroll_trigger = $('#js-scroll_to_gallery'),
            text_content = $('#js-gallery');

        scroll_trigger.on('click', function(){
            $('html, body').animate({
                scrollTop: text_content.offset().top + -96
            }, 1500);
        });
    }
	

	
//==============================================================================================================

// 2. EXECUTE

// ==============================================================================================================



    easein_item('.mis_img');
    nav_toggler();
    scroll_to_content();

    $('#js-nextPostsLink').on('click', function(){
        easein_item('.mis_img');
    });


	
//==============================================================================================================	

// 3 EXECUTE PLUGINS

// ==============================================================================================================


	
})(jQuery); // End self-invoking function