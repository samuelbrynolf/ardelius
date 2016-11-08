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

        menu_trigger.bind('tap', function(){
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



    // --------------------------



    function easein_item(elem){
        var arr_elem = $(elem);

        arr_elem.each(function(i){
            var $this = $(this);

            setTimeout(function(){
                $this.addClass('s-faded-is-visible');
            }, i*150);
        });
    }



    // --------------------------



    function post_loader(){

        $.ajaxSetup({
            cache: false
        });

        var loadtarget = document.querySelector('#js-post_loader_target'),
            $load_trigger = $('#js-postloader_trigger'),
            $query_var_type = $load_trigger.attr('data-query-var-type'),
            $query_var_tax = $load_trigger.attr('data-query-var-tax'),
            $query_var_name = $load_trigger.attr('data-query-var-name'),
            $layout_cols = $(loadtarget).attr('data-columns'),
            $offset_val = parseInt($load_trigger.attr('data-offset')),
            $offset_current = $offset_val,
            $pagin_count = parseInt($load_trigger.attr('data-load_stop'));

        $load_trigger.bind('tap', function(){

            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                data: {
                    action: 'postloader_setup',
                    query_var_type: $query_var_type,
                    query_var_tax: $query_var_tax,
                    query_var_name: $query_var_name,
                    layout_cols: $layout_cols,
                    offset: $offset_current
                },

                success: function (data) { // https://gist.github.com/rnmp/bf6c5d8db9487862aba1

                    var hentries_html = $.parseHTML(data),
                        hentries = [];

                    $.each(hentries_html, function(i, el){
                        hentries.push(el);
                        salvattore.appendElements(loadtarget, hentries);

                        var $el = $(el),
                        $el_img = $el.find('img.mis_popup');

                        if($el_img.hasClass('mis_popup') && $.fn.mis_popup){

                            $el_img.each(function(){
                                 var $this = $(this),
                                     $popped_id = $this.attr('data-misid');

                                $this.clone()
                                     .addClass('mis_is-cloned')
                                     .attr('sizes', '100vw')
                                     .attr('id', $popped_id).appendTo('body');
                            });
                        }
                    });

                    easein_item('.mis_img');
                    $offset_current = ($offset_current + $offset_val);

                    if($offset_current > ($pagin_count * $offset_val) -1){
                        $load_trigger.remove();
                    }
                },
                error: function (MLHttpRequest, textStatus, errorThrown) {
                    $load_trigger.removeAttr('id');
                }
            });
            return false;
        });
    }



    // --------------------------

    function scroll_to_footer(){
        var $scroll_trigger = $('.js-scroll-trigger__footer a');

        $scroll_trigger.bind('tap', function(e){
            $('html, body').animate({
                scrollTop: $('#js-footer').offset().top
            }, 1000);

            e.preventDefault();
        });
    }
	

	
//==============================================================================================================

// 2. EXECUTE

// ==============================================================================================================



    easein_item('.mis_img');
    nav_toggler();
    post_loader();
    scroll_to_footer();


	
//==============================================================================================================	

// 3 EXECUTE PLUGINS

// ==============================================================================================================


	
})(jQuery); // End self-invoking function