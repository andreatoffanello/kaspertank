<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aprimo
 */

$is_map = function_exists('cs_get_option') ? cs_get_option('is_map') : '';
$is_mc_form = function_exists('cs_get_option') ? cs_get_option('is_mc_form') : '';
$form_title = function_exists('cs_get_option') ? cs_get_option('mc_form_title') : '';
$form_action = function_exists('cs_get_option') ? cs_get_option('mc_form_action') : '';
$form_btn_label = function_exists('cs_get_option') ? cs_get_option('mc_form_btn_label') : '';
$copyright_text = function_exists('cs_get_option') ? cs_get_option('copyright_text') : esc_html__('© 2018 CreativeGigs. All rights reserved', 'aprimo');
$footer_counter = function_exists('cs_get_option') ? cs_get_option('footer_counter') : '';
$logo = function_exists('cs_get_option') ? cs_get_option('aprimo_logo') : '';
$logo = !empty($logo) ? wp_get_attachment_image_src($logo, 'full') : '';
?>

<?php

if($is_map==1) { ?>
    <div class="google-map-area">
        <div class="map-canvas"></div>
    </div>
    <?php
}
?>

</div> <!-- /.html-top-content -->



<footer>
    <div class="container">
        <div class="footer-data-wrapper">
            <?php
            if($is_mc_form == 1) {
                ?>
                <form action="<?php echo esc_url($form_action); ?>" class="subscribe-form" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" >
                    <h2> <?php echo esc_html($form_title); ?> </h2>
                    <div class="input-wrapper">
                        <div class="row">
                            <div class="col-md-5 col-md-6 col-xs-12">
                                <input type="text" value="" name="FNAME" id="mce-FNAME" placeholder="<?php esc_attr_e('Full Name*', 'aprimo'); ?>">
                            </div>
                            <div class="col-md-5 col-md-6 col-xs-12">
                                <input type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="<?php esc_attr_e('Email Address*', 'aprimo'); ?>'">
                            </div>
                            <div class="col-md-2 col-xs-12">
                                <div class="theme-button">
                                    <span></span>
                                    <input type="submit" name="subscribe" id="mc-embedded-subscribe" value="<?php echo esc_attr($form_btn_label); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
            <div class="bottom-footer">
                <div class="row">
                    
                    <div class="col-lg-10 col-md-8 col-xs-12 footer-logo">
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php
                                if (!empty($logo)) { ?>
                                    <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name'); ?>">
                                <?php
                                } else {
                                    echo '<h3>' . get_bloginfo('name') . '</h3>';
                                }
                                ?>
                            </a>
                        </div>
                        <p><?php echo wp_kses_post($copyright_text); ?></p>
                    </div>

                    <div class="col-lg-2 col-md-4 col-xs-12 text-right pull-right">
                        <?php
                        if(has_nav_menu('footer_menu')) {
                            wp_nav_menu(array(
                                'menu' => 'footer_menu',
                                'theme_location' => 'footer_menu',
                                'container' => null,
                                'menu_class' => 'footer-menu',
                                'depth' => 1,
                                'fallback_cv' => 'aprimo_Nav_Navwalker::fallback'
                            ));
                        }
                        aprimo_social_links('social-icon');
                        ?>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.bottom-footer -->
        </div>
    </div> <!-- /.container -->
</footer>



<!-- Scroll Top Button -->
<button class="scroll-top tran3s color-one-bg">
    <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
</button>


</div> <!-- /.main-page-wrapper -->

<?php wp_footer(); ?>
</body>
</html>

