<!-- start header -->
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
	wp_enqueue_script( 'frontend-form-js', PODIO_RELATIVE_PLUGIN_DIR  . '/' . PODIO_FORM_NAME . '/src/js/frontend-form.js', array('jquery'), '1.0' );
?>
</head>
	<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
		<div id="page" class="site w-container">
		<!-- end header -->

		<!-- start page -->
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<div style="width:100%;text-align:center;padding-top:30px;padding-bottom:30px;">
					<h1><?php the_title(); ?></h1>
				</div>

				<?php
	    		the_content();

			endwhile;
		endif;
		?>
		<!-- end page -->

		<!-- start footer -->
		</div><!-- #page -->
	<?php wp_footer(); ?>
	</body>
</html>
<!-- end footer -->
