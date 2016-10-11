(function($) {
    function init_AjaxPagin(){

        var nextPostsLink = $('#js-nextPostsLink');
        var loadTarget = $(nextPostsLink.attr('data-role'));

        if(!nextPostsLink.length || !loadTarget.length){
            return;
        }

        var link_href;
        var regex = /(\/page\/)(\d*\/?)(\?s=[a-z0-9]+)?/;
        var origin_link_href = nextPostsLink.attr('href').toString().split(regex);
        var totalPages = nextPostsLink.attr('data-stop');
        var loopedItem = nextPostsLink.attr('data-loopedItem');
        var lastPagin = 0;
        var buttonText = nextPostsLink.text();
        var buttonLoadingText = nextPostsLink.attr('data-loadingText');
        var loadingClass = 's-is-loading';
        var loadingDone = 's-is-loaded';
        var nested_elType;

        if(loadTarget.is('ol')){
            nested_elType = 'ol';
        } else if(loadTarget.is('ul')) {
            nested_elType = 'ul';
        }

        // if relative paths...
        if(origin_link_href.length < 3){

            var locationSplit = window.location.href.toString().split(regex);

            // and if relative paths includes just a number as '../3'
            if(locationSplit.length == 1){
                nextPostsLink.attr('href', locationSplit[0]+origin_link_href[0]);
            } else if(locationSplit.length > 1){
                var linkedPage = origin_link_href[0].match(/(\d+)/g).toString();
                nextPostsLink.attr('href', locationSplit[0]+locationSplit[1]+linkedPage);
            }
        }

        function sequensedShow(sequensedElem, pageID){

            var sequensedElemObj = $('#' + pageID + ' .' + sequensedElem);

            sequensedElemObj.each(function(i){
                var $this = $(this);

                setTimeout(function(){
                    $this.css({
                        'opacity' : '1'
                    });
                }, i*150);
            });
        }

        function loadContent(state) {
            var content_path = state.url;
            var pushedPagin = state.pagesNum;
            var pageID = 'page-'+pushedPagin;
            var popParent;
            var popTarget;

            if(nested_elType){
                popParent = document.createElement('li');
            } else {
                popParent = document.createElement('div');
            }

            var $popParent = $(popParent);

            $popParent.attr('id', pageID).addClass('js-added-HTML');

            if(nested_elType){
                var nested_list = document.createElement(nested_elType);
                var $nested_list = $(nested_list);
                $popParent.append(nested_list);
                popTarget = $nested_list;
            } else {
                popTarget = $popParent;
            }

            function pageAdder() {
                loadTarget.append($popParent);
                popTarget.load(content_path, function(response, status){
                    if ( status == 'error' ) {
                        nextPostsLink.removeClass(loadingClass);
                        nextPostsLink.off('click');
                    } else {
                        nextPostsLink.removeClass(loadingClass);
                        $('#'+pageID).addClass(loadingDone);
                        if(loopedItem.length){
                            sequensedShow(loopedItem, pageID);
                        }
                        nextPostsLink.text(buttonText);
                    }
                });
            }

            if(pushedPagin == totalPages){
                nextPostsLink.fadeOut();
            } else if(pushedPagin < totalPages && nextPostsLink.is(':hidden')){
                nextPostsLink.fadeIn();
            }

            if(pushedPagin > lastPagin){
                pageAdder();
            } else {
                $('#page-'+lastPagin).remove();
            }

            lastPagin = pushedPagin;
            pushedPagin++;
            nextPostsLink.attr('href', link_href[0] + link_href[1] + pushedPagin);
        }

        History.Adapter.bind(window, 'statechange', function() {
            var state = History.getState().data;
            if (typeof state.url === 'undefined') {
                state.url = window.location.href + ' ' + nextPostsLink.attr('data-role') + ' > * ';
                state.caller = nextPostsLink.attr('data-id');
                state.pagesNum = 1;
            }
            loadContent(state);
        });

        nextPostsLink.on('click', function(){
            var $this = $(this);
            link_href = $this.attr('href').toString().split(regex);

            if(link_href.length > 3){

                var paginCount = parseInt(link_href[2]);
                var loadUrl = $this.attr('href') + ' ' + $this.attr('data-role') + ' > *';
                var state = {
                    url: loadUrl,
                    caller: $this.attr('data-id'),
                    pagesNum: paginCount
                };

                History.pushState(state, $this.text(), $this.attr('href'));
                nextPostsLink.addClass(loadingClass);
                nextPostsLink.text(buttonLoadingText);
            }
            return false;
        });
    }

    init_AjaxPagin();

})(jQuery); // End self-invoking function