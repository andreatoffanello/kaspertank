<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aprimo
 */

?>

<div <?php post_class('single-blog-post'); ?>>
    <?php
    if(is_sticky()) {
        echo "<div class='featured-post'>".esc_html__('Featured', 'aprimo').'</div>';
    }
    ?>
    <?php if(has_post_thumbnail()) { ?>
    <div class="image-box">
        <?php the_post_thumbnail('aprimo_770x400'); ?>
        <div class="date"> <?php aprimo_first_category(); ?> </div>
    </div>
    <?php } ?>
    <div class="text-meta">
        <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <div class="post-meta">
            <div class="post-author"><?php esc_html_e('Posted by', 'aprimo'); ?>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('nickname')); ?>"> <?php echo get_the_author_meta('display_name') ?> </a>
            </div>
            &nbsp; | &nbsp;
            <div class="post-date"><?php esc_html_e('On', 'aprimo'); ?>
                <a href="<?php aprimo_day_link() ?>"> <?php the_time(get_option('date_format')); ?> </a>
            </div>
        </div>
        <p> <?php echo wp_trim_words(get_the_content(), 50, ''); ?> </p>
        <a href="<?php the_permalink(); ?>" class="read-more"><span></span> <?php esc_html_e('read more', 'aprimo'); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
    </div>
</div>