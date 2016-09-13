<?php
/*
Template Name: Blog Page Template
*/

get_header();
?>

<section class="blog-posts no-banner">
	<div class="content-contain">
		<div class="post-list">
				<?php 
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			);
		$loop = new WP_Query($args);
		?>	
		<?php while ($loop->have_posts()): $loop->the_post(); if (get_field('featured')): ?>
		<div class="sticky-post">
			<div class="featured-img">
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>" alt="">
			</div>

			<div class="sticky-content">
				<h2 class="title"><?php the_title() ?></h2>
				<ul class="social-share">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					<li><a href="#"><i class="fa fa-youtube"></i></a></li>
				</ul>
				<div class="excerpt">
					<?php the_excerpt() ?>
				</div>
				<div class="read-more">
					<a href="<?php the_permalink() ?>">Read more</a>
				</div>
			</div>		
		</div>
		<?php endif; endwhile; wp_reset_query(); ?>

		<ol class="recent-posts">
		<?php 		
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 5,
				);
			$loop = new WP_Query($args);
			while ($loop->have_posts()): $loop->the_post(); if (!get_field('featured')):
			?>	
			<li>
				<?php if (wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) )): ?>
				<div class="featured-img">
					<a href="<?php echo the_permalink();?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>" alt=""></a>
				</div>
				<?php endif; ?>
				<div class="post-content">
					<h3 class="title"><?php the_title(); ?></h3>
					<div class="excerpt">
						<p><?php echo substr(get_the_excerpt(), 0, 100); ?></p>
					</div>
					<div class="read-more">
						<a href="<?php the_permalink(); ?>">Read more</a>
					</div>
				</div>
			</li>
			<?php endif; endwhile; wp_reset_query(); ?>
		</ol>

		</div>
		<aside class="sidebar">
            <?php dynamic_sidebar( 'right-sidebar' ); ?>
		</aside>

	</div>
</section>



<?php 
get_footer();