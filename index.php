<?php // Index is used as archive-, category-, tag- and home-template.

get_header();

	if (is_front_page() && is_home()) {

		echo '<section id="" class="">';
			get_template_part('partials/start/start-hero');
		echo '</section>'; ?>

		<section>
			<h2 class="l-gutter a-title-M">Reportage</h2>
			<ul class="l-container">
				<li class="l-span-C4">[BILD] Repo-1</li>
				<li class="l-span-C4">[BILD] Repo-2</li>
				<li class="l-span-C4">[BILD] Repo-3</li>
			</ul>
		</section>

		<section>
			<h2 class="l-gutter a-title-M">Porträtt</h2>
			<ul class="l-container">
				<li class="l-span-C4">[BILD] Port-1</li>
				<li class="l-span-C4">[BILD] Port-2</li>
				<li class="l-span-C4">[BILD] Port-3</li>
			</ul>
		</section>

		<section class="l-gutter">
			[BILD]
			<h2 class="a-title-M">Blogg-titel</h2>
			<p>Ingress + länk</p>
		</section>

		<section>
			<h2 class="l-gutter a-title-M">Singlar</h2>
			<ul class="l-container">
				<li class="l-span-C3">[BILD] Singel-1</li>
				<li class="l-span-C3">[BILD] Singel-2</li>
				<li class="l-span-C3">[BILD] Singel-3</li>
				<li class="l-span-C3">[BILD] Singel-4</li>
			</ul>
		</section>

	<?php } else {
		echo '<header class="">';
			//get_template_part('partials/globals/global-archiveheader');
		echo '</header>';
	}

	if ( have_posts() ) {
		//get_template_part('partials/listitems/listitems-loop');
	} ?>

<?php get_footer();