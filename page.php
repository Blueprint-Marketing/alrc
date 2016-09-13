<?php
/**
 * Single page template
 * 
 * @package WordPress
 * @version 1.0
 */
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>

<section class="page-banner">

	<div class="banner-content" style="background: url(<?php the_field('header_image') ?>) no-repeat;">
		<div class="slide">
			<div class="slide-content">
				<div class="content-contain">
					<h3 class="header"><?php the_field('main_heading') ?></h3>
				</div>
			</div>		
		</div>
	</div>

</section>

<?php if(get_field('sub_heading')): ?>
<section class="sub-heading">
	<div class="content-contain">
		<h3><?php the_field('sub_heading') ?></h3>
	</div>
</section>
<?php endif; ?>

<?php if($content = $post->post_content):?>
<section class="page-content">
	<div class="content-contain">
		<?php the_content(); ?>
	</div>
</section>
<?php else: ?>
	<section class="page-content" style="display:none;">
	</section>
<?php endif; ?>


<?php if (get_field('image_section')): ?>
<section class="image-section">
	<div class="content-contain">
		<img src="<?php the_field('image_section') ?>" alt="">
	</div>
</section>
<?php endif; ?>

<?php if( have_rows('benefits') ): ?>
<section class="benefit-section">
	<div class="content-contain">
		<h5>Benefits at a glance</h5>
		<ul class="benefits">
		<?php while( have_rows('benefits') ): the_row(); 
			$benefit = get_sub_field('benefit_description');
			?>
			<li><?php echo $benefit; ?></li>

		<?php endwhile; ?>
		</ul>
	</div>
</section>
<?php endif; ?>

<?php endwhile; endif; ?>


<?php if (get_field('regional_center_content')): ?>
<section class="regional-centers">
	<div class="content-contain" style="background: url(<?php the_field('regional_center_bg') ?>) no-repeat right top;">
		<div class="content">
			<?php the_field('regional_center_content') ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php get_footer();