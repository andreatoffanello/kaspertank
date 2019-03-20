<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package aprimo
 */

get_header();
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
?>

    <div class="our-blog blog-v3">
        <div class="container">
            <div class="col-md-<?php echo esc_html($blog_column); ?> blog-posts" id="blog-list">
                <div class="wrapper">
                    <?php
                    if ( have_posts() ) {
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content-default', get_post_format());
                        endwhile;
                        aprimo_pagination();
                    }else {
                        get_template_part( 'template-parts/content', 'none' );
                    }
                    ?>
                </div> <!-- /.wrapper -->
            </div>

            <?php get_sidebar(); ?>

        </div> <!-- /.container -->
    </div>

<?php
get_footer();