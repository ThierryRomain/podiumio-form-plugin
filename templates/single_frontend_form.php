<!doctype html>
<html <?php language_attributes(); ?> data-wf-page="5eb5a57b04449bcfb2df3441" >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php echo get_theme_mod('typoScript') ?>
	<?php
  acf_form_head();
  wp_head();
  ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
  <?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
        the_content();
			endwhile;
		endif;
		?>
    </div><!-- #page -->

    <?php wp_footer(); ?>

    </body>
    </html>
