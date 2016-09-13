<?php
/**
 * Single post template
 *
 * @package WordPress
 * @version 1.0
 */
get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
	<section class="post-area no-banner">
		<div class="content-contain">
			
			<div class="post-content">

				<?php if (get_field('answer')): ?>
					<h1 class="question"><strong>Question:</strong> <?php the_title(); ?></h1>
					<h3><strong>Answer:</strong></h3>
					<div class="answer"><?php the_field('answer'); ?></div>
				<?php else: ?>
					<h1 class="post-title"><?php the_title() ?></h1>
					<div class="authored-by">Posted by <?php echo get_the_author(); ?> on <?php the_date() ?></div>
					<div class="content">
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>" alt="">
						<?php the_content(); ?>
					</div>

                    <div class="comments-box">
                        <?php if (comments_open()) : ?>
							<div id="disqus_thread"></div>
							<script type="text/javascript">
							    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
							    var disqus_shortname = 'americanlibertyregional'; // Required - Replace example with your forum shortname

							    /* * * DON'T EDIT BELOW THIS LINE * * */
							    (function() {
							        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
							        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
							        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
							    })();
							</script>
							<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
							<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
							<?php endif; // comments_open ?>
	                </div>
				<?php endif; ?>

					

			</div>
	        <aside class="sidebar">
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
            </aside>
		</div>            
	</section>

<?php endwhile; endif; ?>

<?php get_footer();