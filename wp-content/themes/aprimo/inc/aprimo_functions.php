<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package aprimo
 */


// Image sizes
add_image_size('aprimo_770x400', 770, 400, true);
add_image_size('aprimo_900x460', 900, 460, true);
add_image_size('aprimo_900x450', 900, 450, true);
add_image_size('aprimo_433x382', 433, 382, true);


// Pagination
function aprimo_pagination() {
    the_posts_pagination(array(
        'screen_reader_text' => ' ',
        'prev_text'          => esc_html__('Previous', 'aprimo'),
        'next_text'          => esc_html__('Next', 'aprimo')
    ));
}


// Comment list
function aprimo_comments($comment, $args, $depth){
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    $no_avatar = !get_avatar($comment) ? 'no-comment-avatar' : '';
    ?>
    <div class="single-comment clearfix <?php echo esc_attr($no_avatar); ?>">
        <?php
        if(get_avatar($comment)) {
            echo get_avatar($comment, 80, null, null, array('class'=> 'float-left'));
        }
        ?>
        <div class="comment float-left">
            <h6> <?php comment_author(); ?> </h6>
            <span> <?php echo get_comment_date() ?> <?php esc_html_e('At', 'aprimo'); ?> <?php echo get_comment_time(); ?> </span>
            <?php comment_text(); ?>
            <?php comment_reply_link(array_merge( $args, array('reply_text'=>'<button class="tran3s">'.esc_html__('Reply', 'aprimo').'</button>', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
        </div>
    </div>
<?php
}


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function aprimo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'aprimo_pingback_header' );


// Move the comment field to bottom
add_filter( 'comment_form_fields', function ( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
});


// Social Links
function aprimo_social_links($class="") {
    $dribbble       = function_exists('cs_get_option') ? cs_get_option('dribbble') : '';
    $facebook       = function_exists('cs_get_option') ? cs_get_option('facebook') : '';
    $twitter        = function_exists('cs_get_option') ? cs_get_option('twitter') : '';
    $youtube        = function_exists('cs_get_option') ? cs_get_option('youtube') : '';
    $lnkedin        = function_exists('cs_get_option') ? cs_get_option('lnkedin') : '';
    $googleplus     = function_exists('cs_get_option') ? cs_get_option('googleplus') : '';
    $social_links   = function_exists('cs_get_option') ? cs_get_option('social_links') : '';
    ?>
    <ul class="<?php echo esc_attr($class); ?>">
        <?php if(!empty($facebook)) { ?>
            <li><a href="<?php echo esc_url($facebook); ?>" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <?php } ?>
        <?php if(!empty($twitter)) { ?>
            <li><a href="<?php echo esc_url($twitter); ?>" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <?php } ?>
        <?php if(!empty($dribbble)) { ?>
            <li><a href="<?php echo esc_url($dribbble); ?>" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
        <?php } ?>
        <?php if(!empty($youtube)) { ?>
            <li><a href="<?php echo esc_url($youtube); ?>" class="tran3s"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
        <?php } ?>
        <?php if(!empty($lnkedin)) { ?>
            <li><a href="<?php echo esc_url($lnkedin); ?>" class="tran3s"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <?php } ?>
        <?php if(!empty($googleplus)) { ?>
            <li><a href="<?php echo esc_url($googleplus); ?>" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <?php } ?>
        <?php
        if(is_array($social_links)) {
            foreach($social_links as $social_link) {
                echo '<li><a href="'.esc_url($social_link['social_link']).'" class="tran3s"><i class="'.esc_attr($social_link['social_icon']).'" aria-hidden="true"></i></a></li>';
            }
        }
        ?>
    </ul>
<?php
}


function aprimo_check_for_shortcode($posts) {
    if ( empty($posts) )
        return $posts;

    $flag = false;

    foreach ($posts as $post) {
        if ( stripos($post->post_content, '[aprimo_hero_sec') )
            $flag = true;
        break;
    }

    if ($flag){
        $btn_hover = ".home-page-one #theme-main-banner .camera_caption .container a.btn:hover {
                        background: ;
                        border-color: ;
                      }";
        wp_enqueue_style('aprimo_ex', APRIMO_DIR_CSS.'/responsive.css');
        wp_add_inline_style('aprimo_ex', $btn_hover);
    }
    return $posts;
}
add_action('the_posts', 'aprimo_check_for_shortcode');


// Get slug of words
function aprimo_get_words_slug($text) {
    return str_replace(' ', '-', strtolower($text));
}


// Get the 1st category name
function aprimo_first_category() {
    $cats = get_the_terms(get_the_ID(), 'category');
    $cat  = is_array($cats) ? $cats[0]->name : '';
    echo esc_html($cat);
}
// Get the 1st category link
function aprimo_first_category_link() {
    $cats = get_the_terms(get_the_ID(), 'category');
    $cat  = is_array($cats) ? get_category_link($cats[0]->term_id) : '';
    echo esc_url($cat);
}


// Add body classes
add_filter('body_classes', function($classes) {
    if(is_user_logged_in()) {
        $classes[] = '';
    }
});


// Day link to archive page
function aprimo_day_link() {
    $archive_year   = get_the_time('Y');
    $archive_month  = get_the_time('m');
    $archive_day    = get_the_time('d');
    echo get_day_link( $archive_year, $archive_month, $archive_day);
}
