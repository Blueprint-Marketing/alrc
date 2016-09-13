<?php
/**
 * Search Results Template
 *
 * @package WordPress
 * @version 1.0
 */

get_header();
?>
<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = $query_split[1];
} // foreach

$search = new WP_Query($search_query);
?>
<?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="blog-posts no-banner">
	<div style="width:100%; display:block; clear:both;">
		<h1 style="text-align:center">Search Results</h1>
		</div>
	<div class="content-contain">		
		<div class="block" style="width:100%;">
			<?php if ( have_posts() ) : ?>                
	 
				<?php while ( have_posts() ) : the_post() ?>
						<h2 class="search-title" style="display:block; font-size:16px; border-bottom:1px solid #e0e0e0; padding:15px 0;"><a href="<?php echo the_permalink(); ?>"><?php the_title() ?></a></h2>										
				<?php endwhile; ?>
	 		<?php else: ?>
	 			<h2 style="display:block; width:100%; text-align:center; padding:50px 0;">We're sorry, no posts match your search query.</h2>
			<?php endif; ?>
 
			
		</div>
	</div>
</section>
<?php//endwhile; endif; ?>

<?php get_footer();