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
            $query_var_type = $load_trigger.attr('data-query-var-type'),
            $query_var_tax = $load_trigger.attr('data-query-var-tax'),
            $query_var_name = $load_trigger.attr('data-query-var-name'),
            $offset_val = parseInt($load_trigger.attr('data-offset')),
            $offset_current = $offset_val,
            $load_stop = parseInt($load_trigger.attr('data-load_stop'));

        //console.log($loadtarget);
        //console.log($load_trigger);
        console.log($query_var_type);
        console.log($query_var_tax);
        console.log($query_var_name);
        //console.log($offset_val);
        //console.log($offset_current);
        //console.log($load_stop);

        $load_trigger.bind('tap', function(){
            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                data: {
                    action: 'postloader_setup',
                    query_var_type: $query_var_type,
                    query_var_tax: $query_var_tax,
                    query_var_name: $query_var_name,
                    offset: $offset_current
                },
                success: function (data) {
                    console.log('succsee');

                    $loadtarget.append(data);
                    //easein_item('.mis_img');
                    $offset_current = ($offset_current + $offset_val);
                    if($offset_current == $load_stop){
                        $load_trigger.remove();
                    }
                },
                error: function (MLHttpRequest, textStatus, errorThrown) {
                    $load_trigger.removeAttr('id');
                    console.log(data);
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