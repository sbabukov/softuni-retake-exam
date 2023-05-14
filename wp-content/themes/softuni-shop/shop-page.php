<?php
/**
 * Template Name: Products Page From The Theme
 */
?>
 
 <?php get_header(); ?>

<h2>Page of All Products</h2>

<ul class="products-listing">
<?php the_content(); ?>
<?php echo softuni_display_all_product( get_the_ID() ); ?>

</ul>
	
<?php get_footer(); ?>
