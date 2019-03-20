<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header();
?>

    <div class="container">
        <div class="wrapper">
            <h1><?php echo esc_html__('404 ERROR', 'aprimo'); ?></h1>
            <h4><?php echo esc_html__('The page you were looking for does not exist.', 'aprimo'); ?></h4>
            <div class="theme-button">
                <span></span>
                <a href="<?php echo esc_url(home_url('/')); ?>"> <?php echo esc_html__('Go back our HomePage', 'aprimo'); ?></a>
            </div>
        </div> <!-- /.wrapper -->
    </div> <!-- /.container -->

<?php
get_footer();
