<?php get_header(); ?>

<h1>Achive page for <?php the_archive_title(); ?></h1>
<div class="author-bio"><?php echo the_author_meta( 'user_description'); ?></div>

    <ul class="products-listing">
		
		<?php if (have_posts()): ?>
			<?php while (have_posts()): the_post(); ?>
			<!-- content -->
			
			<!-- call template-part job-item, 'template-parts/job', 'item', template-parts is name of folder -->
			<?php get_template_part( 'template-parts/post', 'item' )?>

			<?php endwhile; ?>

			<?php posts_nav_link(); ?>
		<?php endif; ?>	

	</ul>

<?php get_footer(); ?>