<?php get_header(); ?>
<h1><?php the_archive_title(); ?></h1>

<?php if( category_description()) {?>
    <div><?php echo category_description(); ?></div>
<?php } ?>

<?php if ( have_posts() ) : ?>
	<ul class="products-listing">
		<?php while ( have_posts() ) : ?> 
			
			<?php the_post(); ?> 
			
            <?php get_template_part( 'template-parts/content', 'archive' )?>

			
		<?php endwhile; ?>
	</ul>
    <!-- ако няма постове да ни се показва -->
    <?php else: ?>
        <!-- интернационализационна функция -->
        <?php _e( 'Not found posts', 'softuni'); ?>
 <?php endif; ?> 

	
<?php get_footer(); ?>