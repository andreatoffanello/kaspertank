<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aprimo
 */

get_header();
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
?>

    <div class="blog-details our-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-<?php echo esc_html($blog_column); ?> col-xs-12">
                    <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/single', get_post_format() );
                    endwhile;

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>
                </div>

                <?php get_sidebar(); ?>

            </div>
        </div> <!-- /.container -->

    </div>

<?php
get_footer();