<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aprimo
 */

get_header();
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
?>
    <div class="our-blog">
        <div class="container">
            <div class="col-md-<?php echo esc_html($blog_column); ?> col-xs-12 blog-posts" id="blog-list">
                    <?php
                    while(have_posts()) : the_post();
                        get_template_part( 'template-parts/content-default', get_post_format() );
                    endwhile;
                    ?>
                    <?php aprimo_pagination(); ?>
            </div> <!-- /.wrapper -->

            <?php get_sidebar(); ?>

        </div> <!-- /.container -->
    </div>

<?php
get_footer();