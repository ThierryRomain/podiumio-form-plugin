<?php
  	acf_form_head();
?>
<!-- start header -->
<!doctype html>
<html <?php language_attributes(); ?> data-wf-page="5eb5a57b04449bcfb2df3441" >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php echo get_theme_mod('typoScript') ?>
<?php
  	wp_head();
?>
	<style>
		/* .os-form-section-sidebar{
			background: #fafafb;
		    border-right: #ebebeb solid 1px;
			width: 32%;
		    margin-right: 20px;
		    padding: 15px;
		} */
		.os-frontend-form-flex-container {
		    display: -ms-flexbox;
		    display: -webkit-flex;
		    display: flex;
		    -webkit-flex-direction: row;
		    -ms-flex-direction: row;
		    flex-direction: row;
		    -webkit-flex-wrap: nowrap;
		    -ms-flex-wrap: nowrap;
		    flex-wrap: nowrap;
		    -webkit-justify-content: flex-start;
		    -ms-flex-pack: start;
		    justify-content: flex-start;
		    -webkit-align-content: stretch;
		    -ms-flex-line-pack: stretch;
		    align-content: stretch;
		    -webkit-align-items: stretch;
		    -ms-flex-align: stretch;
		    align-items: stretch;
			min-height: 60vh;
		}

        .acf-repeater .acf-row-handle.order+td{
            border-bottom: 2px solid #fdaa40;
        }

        .acf-repeater .acf-row-handle.order{
            font-weight:600;
            color:black;
        }

		.acf-actions .acf-button.button-primary {
			border: 2px solid #3797a4;
			background-color: transparent;
			color: #3797a4;
			border-radius: 5px;
			padding-left: 10px;
			padding-right: 10px;
			padding-top: 4px;
			font-size: 15px;
		}

		.acf-actions .acf-button.button-primary:hover {
			background-color: #3797a4;
			color: #fff;
		}

		.wp-picker-container button.button.wp-color-result {
			border: 1px solid #555;
		}
		.wp-picker-container.wp-picker-active .wp-picker-input-wrap .button.button-small.wp-picker-clear{
			padding-bottom: 8px;
			margin-left: 7px;
		}


		.acf-form-submit .acf-button.button.button-primary.button-large{
			border: 2px solid #fdaa40;
			background-color: #fdaa40;
			border-radius: 5px;
			color: #fff;
			padding-left: 10px;
			padding-right: 10px;
			font-size: 15px;
			cursor: pointer;
		}

		.acf-tab-wrap .acf-hl.acf-tab-group li .acf-tab-button {
			font-size: 16px;
			border-top-left-radius: 3px;
			border-top-right-radius: 3px;
		}

		.acf-tab-wrap .acf-hl.acf-tab-group li.active .acf-tab-button {
			font-weight: bold;
		}

		.acf-label {
			font-size: 16px;
		}

		.acf-th {
			font-size: 16px;
		}

		.acf-table .ui-sortable .acf-field.acf-field-text .acf-label label {
			font-size: 14px;
		}

		.acf-accordion-content .acf-fields .acf-field .acf-label label {
			font-size: 14px;
		}

		.acf-label.acf-accordion-title label {
			font-size: 16px;
		}

		.link-wrap {
			font-size: 15px;
		}

		.validation_field{
			visibility: hidden;
		}

		#frontend-form-menu ul{
			list-style-type: none;
			padding-left:10px;
		}

        #form-preloader{
            position:fixed;
            z-index: 999;
            top:0;
            bottom:0;
            right:0;
            left:0;
            background-color:#669efc;
        }

        .sk-cube-grid {
          width: 40px;
          height: 40px;
          margin:auto;
          margin-top:49vh;
        }

        .sk-cube-grid .sk-cube {
          width: 33%;
          height: 33%;
          background-color: white;
          float: left;
          -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
                  animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
        }
        .sk-cube-grid .sk-cube1 {
          -webkit-animation-delay: 0.2s;
                  animation-delay: 0.2s; }
        .sk-cube-grid .sk-cube2 {
          -webkit-animation-delay: 0.3s;
                  animation-delay: 0.3s; }
        .sk-cube-grid .sk-cube3 {
          -webkit-animation-delay: 0.4s;
                  animation-delay: 0.4s; }
        .sk-cube-grid .sk-cube4 {
          -webkit-animation-delay: 0.1s;
                  animation-delay: 0.1s; }
        .sk-cube-grid .sk-cube5 {
          -webkit-animation-delay: 0.2s;
                  animation-delay: 0.2s; }
        .sk-cube-grid .sk-cube6 {
          -webkit-animation-delay: 0.3s;
                  animation-delay: 0.3s; }
        .sk-cube-grid .sk-cube7 {
          -webkit-animation-delay: 0s;
                  animation-delay: 0s; }
        .sk-cube-grid .sk-cube8 {
          -webkit-animation-delay: 0.1s;
                  animation-delay: 0.1s; }
        .sk-cube-grid .sk-cube9 {
          -webkit-animation-delay: 0.2s;
                  animation-delay: 0.2s; }

        @-webkit-keyframes sk-cubeGridScaleDelay {
          0%, 70%, 100% {
            -webkit-transform: scale3D(1, 1, 1);
                    transform: scale3D(1, 1, 1);
          } 35% {
            -webkit-transform: scale3D(0, 0, 1);
                    transform: scale3D(0, 0, 1);
          }
        }

        @keyframes sk-cubeGridScaleDelay {
          0%, 70%, 100% {
            -webkit-transform: scale3D(1, 1, 1);
                    transform: scale3D(1, 1, 1);
          } 35% {
            -webkit-transform: scale3D(0, 0, 1);
                    transform: scale3D(0, 0, 1);
          }
        }

		@media screen and (max-width: 867px) {
			.os-frontend-form-flex-container{
				-webkit-flex-wrap: wrap;
			    -ms-flex-wrap: wrap;
			    flex-wrap: wrap;
			}
			/* .os-form-section-sidebar{
				width:100%;
				border-right:none;
				margin-right:0px;
			} */
		}
	</style>
</head>
	<body <?php body_class(); ?>>
        <div id="form-preloader">
            <div class="sk-cube-grid">
              <div class="sk-cube sk-cube1"></div>
              <div class="sk-cube sk-cube2"></div>
              <div class="sk-cube sk-cube3"></div>
              <div class="sk-cube sk-cube4"></div>
              <div class="sk-cube sk-cube5"></div>
              <div class="sk-cube sk-cube6"></div>
              <div class="sk-cube sk-cube7"></div>
              <div class="sk-cube sk-cube8"></div>
              <div class="sk-cube sk-cube9"></div>
            </div>
        </div>
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
					<?php the_field('before_form'); ?>
				</div>
				<div class="os-frontend-form-flex-container">
					<!-- <div class="os-form-section-sidebar">
						<h3>Form navigation</h3>
						<div id="frontend-form-menu"></div>
					</div> -->
					<div style="width:100%">
						<?php the_content(); ?>
					</div>
				</div>
				<?php
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
