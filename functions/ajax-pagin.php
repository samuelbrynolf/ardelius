<?php // FILTER NEXT_POSTS_LINK() AND SET JS-HOOKS FOR AJAX PAGIN ------------------------------------------------------------------

function bap_posts_link_attributes() {
	global $wp_query;
	return 'id="js-nextPostsLink" class="a-btn" data-role="#js-pagin_target" data-id="nextPosts" data-stop="'.$wp_query->max_num_pages.'" data-loadingText="Laddar fler..." data-loopeditem="js-hentryitem"';
}
add_filter('next_posts_link_attributes', 'bap_posts_link_attributes');

//function bap_next_posts_link(){
//	global $wp_query;
//	next_posts_link('Visa fler', $wp_query->max_num_pages);
//	//next_posts_link('Visa fler', $wp_query->max_num_pages);
//}