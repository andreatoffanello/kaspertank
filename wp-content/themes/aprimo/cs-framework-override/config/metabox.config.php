<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

// -----------------------------------------
// Metabox Options                    -
// -----------------------------------------
require get_template_directory() . '/cs-framework-override/config/opt/metabox_global.php';

require get_template_directory() . '/cs-framework-override/config/opt/metabox_post.php';

require get_template_directory() . '/cs-framework-override/config/opt/metabox_page.php';

require get_template_directory() . '/cs-framework-override/config/opt/metabox_portfolio.php';

require get_template_directory() . '/cs-framework-override/config/opt/metabox_product.php';


CSFramework_Metabox::instance( $options );
