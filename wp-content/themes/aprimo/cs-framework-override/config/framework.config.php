<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => esc_html__( 'Theme Settings', 'aprimo'),
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'aprimo-options',
  'menu_position'   => 58,
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => esc_html__( 'Aprimo Theme Settings', 'aprimo' ) . ' <small>' . esc_html__( 'by CreativeGigs', 'aprimo' ) . '</small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// Header options
require get_template_directory().'/cs-framework-override/config/opt/opt_general.php';

// Header options
require get_template_directory().'/cs-framework-override/config/opt/opt_header.php';

// Footer options
require get_template_directory().'/cs-framework-override/config/opt/opt_footer.php';

// Color options
require get_template_directory().'/cs-framework-override/config/opt/opt_colors.php';

// Typography options
// require get_template_directory().'/cs-framework-override/config/opt/opt_typo.php';

// Blog Options
require get_template_directory().'/cs-framework-override/config/opt/opt_blog.php';

// Social Links
require get_template_directory().'/cs-framework-override/config/opt/opt_social_links.php';



// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => esc_html__('Backup', 'aprimo'),
  'icon'     => 'fa fa-shield',
  'fields'   => array(
    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'aprimo')
    ),
    array(
      'type'    => 'backup',
    ),
  )
);


CSFramework::instance( $settings, $options );
