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
function softuni_update_visit_count( $post_id = 0){
    if( empty($post_id) ){
        return;
    }
    // взима постмета данните, подаваме постайди на метата 'visit_count' 
    $visit_count = get_post_meta( $post_id, 'visits_count', true);
    
    if( ! empty( $visit_count )) {
        $visit_count ++;
        
        // обновяваме постметата
        update_post_meta( $post_id, 'visits_count', $visit_count );
    } else {
        update_post_meta( $post_id, 'visits_count', 1 );

    }
    var_dump($visit_count);
}