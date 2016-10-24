(function( $, document ) {
    $.fn.mis_popup = function(options) {
        var settings = $.extend({
            body : $('body'),
            overlay_ID : 'mis_overlay',
            imgcloned_class : 'mis_is-cloned',
            show_class : 's-is-visible',
            pop_sizes : '100vw'
        }, options );

        var popup_src = this;

        if(popup_src.length){
            var fragment = document.createDocumentFragment();
            var overlay = $('<div />', {
                id: settings.overlay_ID
            }).appendTo(fragment);

            // Create popup-clones
            popup_src.each(function(){
                var $this = $(this);
                var popped_id = $this.attr('data-misid');

                $this.clone()
                    .addClass(settings.imgcloned_class)
                    .attr('sizes', settings.pop_sizes)
                    .attr('id', popped_id).appendTo(fragment);
            });

            settings.body.append(fragment);
            var popup_elems = $('.' + settings.imgcloned_class).add(overlay);

            popup_src.bind('tap', function(e){
                var $this = $(this);
                var thisclone = $('#'+ $this.attr('data-misid'));
                var thisclone_width = thisclone.width();
                var thisclone_height = thisclone.height();
                var viewport_height = $(window).height();

                if(thisclone_height > thisclone_width || thisclone_height > viewport_height){
                    thisclone.css({
                        'width' : 'auto',
                        'max-height' : (viewport_height - 100) + 'px'
                    });
                }

                overlay.addClass(settings.show_class);
                thisclone.addClass(settings.show_class);

                settings.body.one('keyup', function(e){
                    if (e.keyCode == 27) {
                        popup_elems.removeClass(settings.show_class);
                        e.preventDefault(e);
                    }
                });

                e.stopPropagation(e);
                e.preventDefault(e);
            });

            popup_elems.bind('tap', function(e){
                popup_elems.removeClass(settings.show_class);
                e.preventDefault();
            });
            return this;
        }
    };

    if($.fn.mis_popup) {
        var popup_src = $('.mis_popup');
        if(popup_src.length){
            popup_src.mis_popup(); // TODO ACTIVATE AND MAKE CUSTOM ENQUEUE FOR PLUGIN
        }
    }
}( jQuery, document ));