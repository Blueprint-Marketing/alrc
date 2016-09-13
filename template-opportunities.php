<?php
/*
Template Name: Opportunities Template
*/

get_header();
?>
<section class="page-banner" style="height:20vw;">

	<div class="banner-content" style="background: url(<?php the_field('header_image') ?>) no-repeat; background-position:center center !important;">
		<div class="slide">
			<div class="slide-content">
				<div class="content-contain">
					<h3 style="background-color:#6492a6; padding:5px 1%;" class="header"><?php the_field('main_heading') ?></h3>
				</div>
			</div>		
		</div>
	</div>

</section>


<?php if (have_rows('opportunities') ): ?>
<section class="current-opportunities">

	<h2>Current Investment Opportunities</h2>

	<div class="opportunities">

		<?php while( have_rows('opportunities') ): the_row(); ?>

		<?php 
		$opportunity_logo = get_sub_field('logo'); 
		$opportunity_paragraph = get_sub_field('paragraph'); 
		$opportunity_title = get_sub_field('title'); 
		$opportunity_link = get_sub_field('link'); 
		$brochure_dl = get_sub_field('brochure');
		$full_details = get_sub_field('full_details');
		$details_photo = get_sub_field('details_photo');
		?>

			<div class="block">

				<div class="details-pop-over">

					<div class="details-container">

						<div class="close">
							<a href="" onclick="return false" id="close-content">Close</a>
						</div>

						<div class="the-content">

							<!-- <div class="photo">
								<?php // echo $details_photo ?>
							</div> -->

							<div class="info">				
								<h2><?php echo $opportunity_title ?></h2>			
								<br />
								<?php echo $full_details ?>
							</div>

						</div>

					</div>

				</div>	

				<div class="content-contain">
					
					<div class="logo">
						<img src="<?php echo $opportunity_logo ?>">
					</div>

					<div class="content">

						<div class="title">
							<h2><?php echo $opportunity_title ?></h2>
						</div>
						<div class="paragraph">
							
								<?php echo $opportunity_paragraph ?>

						</div>

						<div class="button"  style="margin-right:1%; width:190px;">
							<a id="opportunities-learn" onclick="return false" href="<?php echo $opportunity_link; ?>">Learn More</a>
						</div>
						<?php
						$brochure_dl = get_sub_field('brochure');
						$brochure_url = $brochure_dl['url'];
						// $title = get_the_title( $attachment_id );

						// var_dump($brochure_url);
						
						if(get_sub_field('brochure')): ?>
							<div class="button" style="margin-right:1%; width:190px;">
								<a target="_blank" href="<?php echo $brochure_url; ?>">Download The Brochure</a>
							</div>
						<?php endif; ?>

					</div>

				</div>

			</div>

		<?php endwhile; ?>

	</div>

</section>
<?php endif; ?>


<section class="graph image-section">
	<div class="content-contain">
		<img src="<?php echo get_template_directory_uri() ?>/assets/images/graph.jpg" alt="">
	</div>
</section>

<?php 
get_footer();