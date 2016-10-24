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

    function easein_item(elem){
        var arr_elem = $(elem);

        arr_elem.each(function(i){
            var $this = $(this);

            setTimeout(function(){
                $this.addClass('s-faded-is-visible');
            }, i*150);
        });
    }

    function post_loader(){

        $.ajaxSetup({
            cache: false
        });

        var $loadtarget = $('#js-post_loader_target'),
            $load_trigger = $('#js-postloader_trigger'),
            $query_is_hierarchial = $load_trigger.attr('data-queried_hierarchical'), // TODO WILL BUG - ANOTHER HOOK NEEDED
            $query_name = $load_trigger.attr('data-queried_name'),
            $offset_val = parseInt($load_trigger.attr('data-offset')),
            $offset_current = $offset_val,
            $load_stop = parseInt($load_trigger.attr('data-load_stop'));

        $load_trigger.bind('tap', function(){
            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                data: {
                    action: 'postloader_setup',
                    query_is_hierarchial: $query_is_hierarchial,
                    query_name: $query_name,
                    offset: $offset_current
                },
                success: function (data) {
                    $loadtarget.append(data);
                    easein_item('.mis_img');
                    $offset_current = ($offset_current + $offset_val);
                    if($offset_current == $load_stop){
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
	

	
//==============================================================================================================

// 2. EXECUTE

// ==============================================================================================================



    easein_item('.mis_img');
    nav_toggler();
    post_loader();


	
//==============================================================================================================	

// 3 EXECUTE PLUGINS

// ==============================================================================================================


	
})(jQuery); // End self-invoking function