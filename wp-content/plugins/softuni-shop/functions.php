<?php

/**
 * Jobs enqueue JavaScript
 */
function softuni_enqueue_scripts() {
	wp_enqueue_script( 'softuni-script', plugins_url( 'scripts\scripts.js', __FILE__ ), array( 'jquery' ), 1.1 );
	wp_localize_script( 'softuni-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
 }
add_action( 'wp_enqueue_scripts', 'softuni_enqueue_scripts' );

/**
 * Function take care of like Product
 *
 * @return void
 */
function softuni_job_like() {
	$job_id = esc_attr( $_POST['job_id'] );
	$like_number = get_post_meta( $job_id, 'likes', true );

    if (empty( $like_number )) {
        update_post_meta( $job_id, 'likes', 1 ); // това 1 е xардкоднато, защото при празни лайк нъмбър, да започне вече с 1
    } else {
        $like_number = $like_number +1;
        update_post_meta( $job_id, 'likes', $like_number );
    }
    // var_dump($like_number);
	// update_post_meta( $job_id, 'votes', $upvote_number + 1 );

    // добра практика е да се слага wp_die() за да прекрати изпълнението на ajax тук, за да може логиката да си продължи. 
    wp_die();
}

add_action( 'wp_ajax_nopriv_softuni_job_like', 'softuni_job_like' );
add_action( 'wp_ajax_softuni_job_like', 'softuni_job_like' );



/**
 * This function change  title of post
 *
 * @param [type] $title
 * @return void
 */
function change_title_of_post($title)
{
    
    return $title . ' - Title of product.';
}

add_filter('the_title', 'change_title_of_post', 6);

/**
 * This function manipulating the post content 
 *
 * @param [type] $content
 * @return void
 */ 
function change_my_content($content)
{
    
    // $post_title = get_the_title(get_the_ID());
    // $tweeter = '<a class="twitter-share-button" href="https://twitter.com/intent/tweet"> '.$post_title.'</a>';

    // $content .= '<div>' . $tweeter . '</div>';
    $content .= '<h4>Add plugin manipulating content</h4>';

    return $content;
}

add_filter('the_content', 'change_my_content');


/**
 * Display a single post term
 *
 * @param integer $post_id
 * @param [type] $taxonomy
 * @return void
 */
function softuni_display_single_term( $post_id, $taxonomy) {
    if ( empty( $post_id) || empty( $taxonomy)) {
        return;
    }
    $terms = get_the_terms( $post_id, $taxonomy);
        $output = '';
        if ( ! empty( $terms ) && is_array( $terms )) {
            foreach ( $terms as $term ) {
                $output .= $term->name;
            }
        }
        return $output;
}


/**
 * function for update visit count
 *
 * @return void
 */
function softuni_update_product_visit_count( $post_id = 0 ){
    if( empty($post_id) ){
        return;
    }

    $visit_count = get_post_meta( $post_id, 'visits_count', true);
    // var_dump( $visit_count ); die();
    
    if( ! empty( $visit_count )) {
        $visit_count ++;
        update_post_meta( $post_id, 'visits_count', $visit_count );
    } else {
        update_post_meta( $post_id, 'visits_count', 1 );

    }
    
}


/**
 * Display other products from their company
 *
 * @param [type] $post
 * @return void
 */
function softuni_display_other_product( $products_id ){
    
    if ( empty( $products_id ) ){
        return;
    }
    
    $products_args = array(
        'post_type'         => 'shop',
        'orderby'           => 'name',
        'post_status'       => 'publish',
        'posts_per_page'    => 2,
    );

    
    $products_query = new WP_Query( $products_args );
    
    // var_dump( $products_query );
    if (! empty( $products_query )) {
        ?>
            <ul class="products-listing">
                <?php foreach( $products_query->posts as $product ) {?>
                    <?php //var_dump( $product); ?>
                    <li class="product-card">
                <div class="product-primary">
                    <h2 class="job-title"><a href="#"><?php echo $product->post_title; ?></a></h2>
                            
                            <div class="product-meta">
                        <a class="meta-shockcode" href="#">Code: 650204111</a>
                        <span class="meta-price">$ 179.99</span>
                    </div>

                    <div class="product-details product-details-table">
                        <span>Type</span><span>Washing machine</span>	
                        <span>Brand</span><span>HAIER</span>
                        <span>Model</span><span>HW80-B14939-S</span>
                    </div>
                </div>
                    <div class="product-logo">
                        <div class="product-logo-box">
                            <?php
                                if ( has_post_thumbnail()){
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="https://tweakers.net/i/59O1Ax8hVb5A9n84eopzib9jb6I=/i/2005419044.jpeg" alt="default image thumbnail">';			
                                }
                            ?>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        <?php
    }
}


/**
 * Shortcode Display current username if user logged in
 *
 * @return void
 */
function softuni_display_username() {
    // is logged user
    $output = '';

    if ( is_user_logged_in() == true ) {
        $current_user = wp_get_current_user();
        $user_display_name = $current_user->data->display_name;
        // var_dump( $user_display_name ); 
        $output = ' Hello, '. $user_display_name . ', enjoy the article </br>';
    } else {
        $output = ' Please, logged in </br>' ;
    }
    return $output;
}
add_shortcode( 'display_username', 'softuni_display_username' );


/**
 * Shortcode  display the product details (name, image, and URL)
 *
 * @return void
 */
function softuni_display_product_details() {
       
    $output = get_template_part( 'template-parts/shortcode-display-info', 'item' );
  
    return $output;

}
add_shortcode( 'display_product_details', 'softuni_display_product_details' );


/**
 * Display other jobs from their company
 *
 * @param [type] $post
 * @return void
 */
function softuni_display_all_product( $products_id ){
    
    if ( empty( $products_id ) ){
        return;
    }
    
    $products_args = array(
        'post_type'         => 'shop',
        'orderby'           => 'name',
        'post_status'       => 'publish',
    );

    
    $products_query = new WP_Query( $products_args );
    
    // var_dump( $products_query );
    if (! empty( $products_query )) {
        ?>
            <ul class="products-listing">
                <?php foreach( $products_query->posts as $product ) {?>
                    <?php //var_dump( $product); ?>
                    <li class="product-card">
                <div class="product-primary">
                    <h2 class="job-title"><a href="#"><?php echo $product->post_title; ?></a></h2>
                            
                            <div class="product-meta">
                        <a class="meta-shockcode" href="#">Code: 650204111</a>
                        <span class="meta-price">$ 179.99</span>
                    </div>

                    <div class="product-details product-details-table">
                        <span>Type</span><span>Washing machine</span>	
                        <span>Brand</span><span>HAIER</span>
                        <span>Model</span><span>HW80-B14939-S</span>
                    </div>
                </div>
                    <div class="product-logo">
                        <div class="product-logo-box">
                            <?php
                                if ( has_post_thumbnail()){
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="https://tweakers.net/i/59O1Ax8hVb5A9n84eopzib9jb6I=/i/2005419044.jpeg" alt="default image thumbnail">';			
                                }
                            ?>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        <?php
    }
}