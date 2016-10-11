<?php if(function_exists("register_field_group")) {
	register_field_group(array (
		'id' => 'acf_toppyta',
		'title' => 'Toppyta',
		'fields' => array (
			array (
				'key' => 'field_57e66c265877a',
				'label' => 'Bild',
				'name' => 'acf_hero_img',
				'type' => 'image',
				'instructions' => 'Toppytan innefattar en stor utfallande bild i toppen på den här sidan. Du har möjlighet att lägga till rubrik och underrubrik, samt länka ytan till någon annan del i portfolion. Du måste inte använda toppytan alls, men om du gör det är det egentligen bara krav på att lägga dit bilden—rubrikerna och länken gör du som du vill med.',
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_57e66c7a5877b',
				'label' => 'Rubrik',
				'name' => 'acf_hero_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57e66d5d5877d',
				'label' => 'Länka toppytan',
				'name' => 'acf_hero_url',
				'type' => 'page_link',
				'instructions' => 'Vart ska länken gå?',
				'post_type' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-sectionbuild.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_bildformat-for-featured-image',
		'title' => 'Bildformat för Featured Image',
		'fields' => array (
			array (
				'key' => 'field_57f01895ad3d6',
				'label' => 'Är bilden liggande?',
				'name' => 'acf-featured-img-ratio',
				'type' => 'true_false',
				'instructions' => 'Sätt "Ja" om <strong>Featured Image</strong> är i liggande format.',
				'message' => '<strong>Ja</strong> — bilden är i liggande format.',
				'default_value' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '!=',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_summering',
		'title' => 'Summering',
		'fields' => array (
			array (
				'key' => 'field_57dd8b73d5ab3',
				'label' => 'Summering',
				'name' => 'acf_text-summary',
				'type' => 'wysiwyg',
				'instructions' => 'Skriv en summering för bilden / reportaget / blogginlägget. Texten kommer att användas primärt på listningssidor, men ger också Google lite info att jobba med — även för singlar / portrtätten.',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '!=',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 3,
	));
	register_field_group(array (
		'id' => 'acf_bildgalleri',
		'title' => 'Bildgalleri',
		'fields' => array (
			array (
				'key' => 'field_57dd94dbac1be',
				'label' => 'Skapa ett bildgalleri',
				'name' => 'acf_img-gallery',
				'type' => 'repeater',
				'instructions' => 'Lägg till de bilder som ska associeras med reportaget / bloggposten.',
				'sub_fields' => array (
					array (
						'key' => 'field_57dd9542ac1bf',
						'label' => 'Bildgalleri',
						'name' => 'acf_img-gallery_img',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'medium',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Ny bild',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'reportage',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 4,
	));
	register_field_group(array (
		'id' => 'acf_sektionsbyggare',
		'title' => 'Sektionsbyggare',
		'fields' => array (
			array (
				'key' => 'field_57e671cd2e077',
				'label' => 'Sektioner',
				'name' => 'acf_sectionbuilder',
				'type' => 'flexible_content',
				'layouts' => array (
					array (
						'label' => 'Sektion med listat innehåll',
						'name' => '',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_57e6cf560fd8b',
								'label' => 'Sektionsrubrik',
								'name' => 'acf_section_cpt-loop_title',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_57e672ef35a59',
								'label' => 'Vad vill du lista?',
								'name' => 'acf_section_post-type_slug',
								'type' => 'select',
								'column_width' => '',
								'choices' => array (
									'post' => 'Blogginlägg',
									'reportage' => 'Reportage',
									'portratt' => 'Portträtt',
									'singlar' => 'Singlar',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_57e674451ac59',
								'label' => 'Hur många ska visas?',
								'name' => 'acf_section_post-type_count',
								'type' => 'text',
								'instructions' => 'Du måste ange antalet i siffor',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_57e674be9e700',
								'label' => 'Hur många kolumner ska användas i större skärmar?',
								'name' => 'acf_section_post-type_layout',
								'type' => 'radio',
								'column_width' => '',
								'choices' => array (
									1 => 1,
									2 => 2,
									3 => 3,
									4 => 4,
								),
								'other_choice' => 0,
								'save_other_choice' => 0,
								'default_value' => '',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_57e6756afbb95',
								'label' => 'Sektionen avslutas med en textlänk där man ser allt av samma typ. Vad ska det stå?',
								'name' => 'acf_section_cta-text',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => 't. ex "Visa alla"',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
					),
					array (
						'label' => 'Sektion med en eller två unika innehållsposter',
						'name' => 'sektion_med_en_eller_tva_unika_innehallsposter',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_57e6cfcdea22b',
								'label' => 'Sektionsrubrik',
								'name' => 'acf_section_twocol_title',
								'type' => 'text',
								'column_width' => 100,
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_57e6cfe7ea22c',
								'label' => 'Innehåll, vänsterkolumn',
								'name' => 'acf_section_twocol_postobj_one',
								'type' => 'post_object',
								'column_width' => 50,
								'post_type' => array (
									0 => 'all',
								),
								'taxonomy' => array (
									0 => 'all',
								),
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_57e6d091ea22d',
								'label' => 'Innehåll, högerkolumn',
								'name' => 'acf_section_twocol_postobj_two',
								'type' => 'post_object',
								'column_width' => 50,
								'post_type' => array (
									0 => 'all',
								),
								'taxonomy' => array (
									0 => 'all',
								),
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_57e6d18b35428',
								'label' => 'Avsluta sektionen med en länk (Frivilligt)',
								'name' => 'acf_section_twocol_cta-url',
								'type' => 'text',
								'column_width' => 100,
								'default_value' => '',
								'placeholder' => 'http://',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_57e6d2899d2f1',
								'label' => 'Länktext',
								'name' => 'acf_section_twocol_cta-text',
								'type' => 'text',
								'column_width' => 100,
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
					),
				),
				'button_label' => 'Lägg till ny sektion',
				'min' => '',
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-sectionbuild.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 5,
	));
	register_field_group(array (
		'id' => 'acf_visitkort',
		'title' => 'Visitkort',
		'fields' => array (
			array (
				'key' => 'field_57eaba3d26884',
				'label' => 'Passkort',
				'name' => 'acf_avatar',
				'type' => 'image',
				'instructions' => 'Måste vara i ratio 1:1 annars keffar skiten ur och det ser ut som en farmor-ram som hänger.',
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_57eaba9c26885',
				'label' => 'Titel för biografidel',
				'name' => 'acf_biografi_title',
				'type' => 'text',
				'instructions' => 'Bör vara endast för-/efternamn, eller kort tagline som innefattar dessa.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57eabb0826886',
				'label' => 'Krigsförklaring',
				'name' => 'acf_biografi',
				'type' => 'wysiwyg',
				'instructions' => 'En mkt kort resumé av höjdpunkterna i karriären, vad du brinner för och hur jag som kund når dig bäst. Tips är att avsluta med ett gäng länkar, där din epost och linkedIn är givna delar. Instagram också? You get the drill.',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 6,
	));
	register_field_group(array (
		'id' => 'acf_typsnitt-via-typekit',
		'title' => 'Typsnitt via Typekit',
		'fields' => array (
			array (
				'key' => 'field_57eac7ce6bbf0',
				'label' => 'Typekit-ID',
				'name' => 'acf_typekit_id',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 7,
	));
}