<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aprimo
 */

?>

<div <?php post_class('blog-main-post single-blog-post'); ?>>
    <?php if(has_post_thumbnail()) { ?>
        <div class="image-box">
            <?php the_post_thumbnail('aprimo_770x400'); ?>
            <div class="date"> <?php aprimo_first_category(); ?> </div>
        </div>
    <?php } ?>
    <h4 class="title"> <?php the_title(); ?> </h4>
    <div class="post-meta">
        <div class="post-author"><?php esc_html_e('Posted by', 'aprimo'); ?>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('nickname')); ?>"> <?php echo get_the_author_meta('display_name') ?> </a>
        </div>
        &nbsp; | &nbsp;
        <div class="post-date"><?php esc_html_e('On', 'aprimo'); ?>
            <a href="#"> <?php the_time(get_option('date_format')); ?> </a>
        </div>
    </div>
    <?php
    the_content();
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aprimo' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'aprimo' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ));
    ?>
</div> <!-- /.blog-main-post -->

<div class="tag-option clearfix">
    <?php the_tags('<ul class="float-left"> <li>'.esc_html__('Tags:', 'aprimo').'</li> <li>', '</li>, <li>', '</li></ul>'); ?>
    <?php
    if(function_exists('aprimo_social_share')) {
        aprimo_social_share('float-right');
    }
    ?>
</div>