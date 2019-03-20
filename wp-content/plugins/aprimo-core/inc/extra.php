<?php

// Post social share options
function Aprimo_social_share($class='') { ?>
    <ul class="<?php echo $class; ?>">
        <li> <?php esc_html_e('Share:', 'faster'); ?> </li>
        <li><a href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="_blank" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" target="_blank" class="tran3s"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
        <li><a href="https://plus.google.com/share?url=<?php the_permalink() ?>" target="_blank" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
    </ul>
<?php
}


add_action( 'wp_enqueue_scripts', function() {
    if(is_home() || is_single()) {
        wp_deregister_script( 'particles');
        wp_deregister_script( 'particles-stats');
        wp_deregister_script( 'particles-app');
    }
});