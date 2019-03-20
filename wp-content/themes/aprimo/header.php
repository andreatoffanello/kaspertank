<?php

$logo = function_exists('cs_get_option') ? cs_get_option('aprimo_logo') : '';
$logo = !empty($logo) ? wp_get_attachment_image_src($logo, 'full') : '';

$page_metaboxes = get_post_meta(get_the_ID(), 'page_metaboxes', true);
$is_titlebar = isset($page_metaboxes['is_titlebar']) ? $page_metaboxes['is_titlebar'] : 1;

$accent_color = function_exists('cs_get_option') ? cs_get_option('accent_color') : '#0aebb3';

if($accent_color=='blue') {
    $color_class = 'home-page-three';
}elseif($accent_color=='red') {
    $color_class = 'home-page-two';
}else {
    $color_class = 'home-page-one';
}

$is_preloader = function_exists('cs_get_option') ? cs_get_option('is_preloader') : '';
$is_sticky_menu = function_exists('cs_get_option') ? cs_get_option('is_sticky_menu') : '';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="main-page-wrapper <?php echo esc_attr($color_class); ?>">

<?php
if($is_preloader==1) {
    ?>
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
<?php
}
?>


    <div class="html-top-content">
    <!--
    =============================================
        Theme Header
    ==============================================
    -->
    <header class="theme-main-header <?php echo ($is_sticky_menu=='1') ? 'sticky_menu' : ''; ?>">
        <div class="container">
            <div class="menu-wrapper clearfix">
				<div id="toggle-menu-button" class="float-right">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
                <div class="logo float-left">
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
                <?php
                if(has_nav_menu('main_menu')) {
                    wp_nav_menu(array(
                        'menu' => 'main_menu',
                        'theme_location' => 'main_menu',
                        'container' => null,
                        'menu_class' => 'button-group float-right',
                        'menu_id' => 'menu-home',
                        'depth' => 1,
                        'fallback_cv' => 'aprimo_Nav_Navwalker::fallback'
                    ));
                }
                ?>
            </div> <!-- /.menu-wrapper -->
        </div> <!-- /.container -->
    </header> <!-- /.theme-main-header -->

    <?php
    if($is_titlebar==1 & !is_404()) {
    ?>
        <div class="inner-page-banner">
            <div class="opacity">
                <h1>
                    <?php
                    if(is_home() || is_single()) {
                        $blog_title = function_exists('cs_get_option') ? cs_get_option('blog_title') : '';
                        $blog_title = !empty($blog_title) ? $blog_title : esc_html__('Blog', 'aprimo');
                        echo esc_html($blog_title);
                    }
                    elseif(is_search()) {
                        echo esc_html__('Search result for : ', 'aprimo').get_search_query();
                    }elseif(is_archive()) {
                        the_archive_title();
                    }
                    else {
                        the_title();
                    }
                    ?>
                </h1>
            </div>
        </div>
        <?php
    }