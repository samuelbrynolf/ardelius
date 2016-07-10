<?php // Index is used as archive-, category-, tag- and home-template.

get_header();

	if (is_front_page() && is_home()) {

		echo '<section id="" class="o-section">';
			get_template_part('partials/start/start-hero');
		echo '</section>'; ?>

		<section class="o-section">
			<h2 class="l-gutter a-title-M">Reportage</h2>
			<ul class="l-container">
				<li class="l-span-C6">
					<?php makeitSrcset(5574, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
				<li class="l-span-C6">
					<?php makeitSrcset(5573, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
			</ul>
		</section>

		<section class="l-gutter o-section">
			<h2 class="a-title-M">Porträtt</h2>
			<ul class="js-salvattore" data-columns>
				<li>
					<?php makeitSrcset(5572, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
				<li>
					<?php makeitSrcset(5571, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
				<li>
					<?php makeitSrcset(5570, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
				<li>
					<?php makeitSrcset(5569, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
				<li>
					<?php makeitSrcset(5568, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
			</ul>
		</section>

		<section class="l-gutter">
			[BILD]
			<h2 class="a-title-M">Blogg-titel</h2>
			<p>Ingress + länk</p>
		</section>

		<section class="l-gutter o-section">
			<h2 class="a-title-M">Singlar</h2>
			<ul class="js-salvattore-test" data-columns>
				<li>
					<?php makeitSrcset(5572, null, null, null, null, null, 'm-prf ratio-16-9', null, 'true'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
				<li>
					<?php makeitSrcset(5571, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
				<li>
					<?php makeitSrcset(5570, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
				<li>
					<?php makeitSrcset(5569, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
				<li>
					<?php makeitSrcset(5568, null, null, null, null, null, 'm-prf ratio-16-9'); ?>
					<h3 class="a-title-s"><a href="#">Reportage titel</a></h3>
					<p class="a-fineprint">Meta information</p>
				</li>
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