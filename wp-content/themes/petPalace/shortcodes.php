<?php

//Sök-ruta!!
function custom_product_search_form_shortcode() {
    ob_start(); ?>

    <form role="search" method="get" id="product-search-form" class="custom-search-form-homepage" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label class="screen-reader-text" for="s"><?php _e( 'Sök efter produkt:', 'woocommerce' ); ?></label>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Sök efter produkt', 'woocommerce' ); ?>" />
        <button type="submit" value="<?php echo esc_attr__( 'Search', 'woocommerce' ); ?>">
            <svg class="search-icon-listing" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                <path fill="black" d="m19.485 20.154l-6.262-6.262q-.75.639-1.725.989t-1.96.35q-2.402 0-4.066-1.663T3.808 9.503T5.47 5.436t4.064-1.667t4.068 1.664T15.268 9.5q0 1.042-.369 2.017t-.97 1.668l6.262 6.261zM9.539 14.23q1.99 0 3.36-1.37t1.37-3.361t-1.37-3.36t-3.36-1.37t-3.361 1.37t-1.37 3.36t1.37 3.36t3.36 1.37"/>
            </svg>
        </button>
        <input type="hidden" name="post_type" value="product" />
    </form>

    <?php
    return ob_get_clean();
}
add_shortcode( 'product_search_form', 'custom_product_search_form_shortcode' );


//Sale-banner!!
function display_sale_banner_shortcode() {
    // Hämta värdet för checkboxen för andra bannern
    $display_second_banner = get_option('display_home_banner');
    
    // Om checkboxen är markerad, visas meddelandet
    if ($display_second_banner) {
        $second_banner_message = get_option('second_banner_message'); // Uppdaterad variabel för meddelandet i andra bannern
        if (!empty($second_banner_message)) {
            ob_start(); ?>
            <div class="second-banner-div-homepage"> <!-- Uppdaterad klass för andra bannern -->
                <div class="banner-text-homepage"><?php echo $second_banner_message; ?></div>
                <div class="second-banner-homepage-img-wrapper"> <!-- Uppdaterad klass för bildvyn av andra bannern -->
                    <img src="<?php echo get_template_directory_uri(); ?>/resources/images/second-banner-image.png" class="second-banner-homepage-img"> <!-- Uppdaterad sökväg till bild för andra bannern -->
                </div>
            </div>
            <?php
            return ob_get_clean();
        } 
    }
}
add_shortcode('second_banner', 'display_sale_banner_shortcode'); 



//Ikonerna!!
function display_icons_filter_shortcode() {
    ob_start(); // Starta output bufferten
    ?>
    <div class="icons-filter-div">

    <div class="icon-div"> 
        <img class="icon-animals dog-icon" data-tag="hund" src="<?php echo get_template_directory_uri(); ?>/resources/images/dog-icon.png"> 
        <p class="icon-text">Hund</p> 
    </div>

    <div class="icon-div"> 
        <img class="icon-animals cat-icon" data-tag="katt" src="<?php echo get_template_directory_uri(); ?>/resources/images/cat-icon.png"> 
        <p class="icon-text">Katt</p>  
    </div>

    <div class="icon-div"> 
        <img class="icon-animals rabbit-icon" data-tag="gnagare" src="<?php echo get_template_directory_uri(); ?>/resources/images/rabbit-icon.png"> 
        <p class="icon-text">Gnagare</p> 
    </div>
    
    <div class="icon-div"> 
        <img class="icon-animals bird-icon" data-tag="bird" src="<?php echo get_template_directory_uri(); ?>/resources/images/bird-icon.png">
        <p class="icon-text">Fåglar</p>  
    </div>

    </div>
    <?php
    return ob_get_clean(); // Returnera innehållet från output bufferten och stäng bufferten
}

// Registrera shortcode
add_shortcode('display_icons', 'display_icons_filter_shortcode');


//Populära märken
function display_brands_shortcode(){
    ob_start(); // Starta output bufferten
    ?>
    <div class="brand-container-homepage">
        <div>
            <h3 class="popular-brands-text">Utvalda varumärken</h3>
        </div>
        <div class="div-wrapper-homepage">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/lazy-kitten.png" alt="Lazy Kitten">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/pawking.png" alt="Pawking">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/oh-my-dog.png" alt="Oh My Dog">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/canary-bird.png" alt="Canary Bird">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/bunny-brand.png" alt="Bunny Brand">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/purrfect.png" alt="Purrfect">
           
        </div>
    </div>
    <?php
    return ob_get_clean(); // Returnera innehållet från output bufferten och stäng bufferten
}

// Registrera shortcode
add_shortcode('display_brands', 'display_brands_shortcode');





