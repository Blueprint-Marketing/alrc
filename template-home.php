<?php
/*
Template Name: Home Page Template
*/

get_header();
?>

<section class="page-banner">

	<div class="banner-content">
		<div class="slide">
			<div class="slide-content">
				<div class="content-contain">
					<h3 class="box-header">Changing The Lives of Families Throughout The World with <strong>EB-5 Investment Visa Opportunities</strong></h3>
				</div>
			</div>		
		</div>
	</div>

</section>


<?php if( have_rows('callout_boxes') ): ?>
<section class="callouts">
	<ul class="callout-items content-contain">
	<?php while( have_rows('callout_boxes') ): the_row(); 
		$icon = get_sub_field('icon');
		$title = get_sub_field('title');
		$content = get_sub_field('content');
		$link = get_sub_field('link'); ?>
		<li>
			<div class="image">
				<img src="<?php echo $icon ?>" alt="">
			</div>
			<div class="box">
				<div class="head">
					<h3><?php echo $title; ?></h3>
				</div>
				<div class="content">
					<?php echo $content ?>
				</div>
			</div>
			<a href="<?php echo $link ?>" class="learn-more">Learn More</a>
		</li>
		<?php endwhile; ?>
	</ul>
</section>
<?php endif; ?>

<section class="info-section">
	<div class="content-contain">
		<h2 class="title"><?php the_field('block_title') ?></h2>
		<?php the_field('block_content') ?>
		<div class="button-right">
			<a href="<?php the_field('link_address') ?>" class="more-info"><?php the_field('link_text') ?></a>
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

<?php if (get_field('image_section')): ?>
<section class="image-section">
	<div class="content-contain">
		<img src="<?php the_field('image_section') ?>" alt="">
	</div>
</section>
<?php endif; ?>

<section class="quote-section">
	<div class="content-contain">
		<div class="image">
			<img src="<?php the_field('author_image') ?>" alt="">
		</div>
		<div class="quote">
			<blockquote><?php the_field('quote') ?></blockquote>
			<div class="quote-by">
				<h5 class="author">- <?php the_field('author_name') ?></h5>
				<address><?php the_field('author_address') ?></address>
			</div>
		</div>
	</div>
</section>

<section class="graph image-section">
	<div class="content-contain">
		<img src="<?php echo get_template_directory_uri() ?>/assets/images/graph.jpg" alt="">
	</div>
</section>

<?php 
get_footer();