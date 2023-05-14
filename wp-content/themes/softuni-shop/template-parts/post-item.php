POST-ITEM
<li class="product-card">
    <div class="product-primary">
        <h2 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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