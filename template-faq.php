<?php
/*
Template Name: FAQ Page Template
*/

get_header();
?>

<section class="page-banner">
	<div class="banner-content" style="background: url(<?php the_field('header_image') ?>) no-repeat;">
		<div class="slide">
			<div class="slide-content">
				<div class="content-contain">
					<h3><?php the_field('main_heading') ?></h3>
					<div class="search">
						<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
							<input type="hidden" name="post_type" value="faqs" />
					         <input type="search" id="s" name="s" placeholder="Enter keywords" required />
					         <input type="submit" value="Search">
						</form>
						<?php // echo do_shortcode('[acps id="238"]'); ?>
					</div>
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

<section class="faq-section">
	<h3>Frequently Asked Questions</h3>
	<ul class="faqs">
		<?php
			$cat_count = 0;
			$terms = get_terms( 'question_category', array(
			    'orderby'    => 'count',
			    'hide_empty' => 0
			) );
			foreach( $terms as $term ):
			 
			    $args = array(
			        'post_type' => 'faqs',
			        'question_category' => $term->slug
			    );
			    $query = new WP_Query( $args );

			    if ($query->have_posts()):
			?>
		<li <?php if ($cat_count === 0): ?>class="open" <?php endif; ?>>
			<div class="heading">
				<span class="arrow arrow-right"><i class="fa fa-angle-right"></i></span>
				<span class="arrow arrow-down"><i class="fa fa-angle-down"></i></span>
				<?php echo $term->name ?>				
			</div>
			<div class="drop-content content-contain">
				<ul class="item-list">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?> 
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div>
		</li>
		<?php $cat_count++; endif; endforeach; ?>
	</ul>
</section>


<?php 
get_footer();