<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aprimo
 */

if ( ! is_active_sidebar( 'sidebar_widgets' ) ) {
	return;
}
?>

<div class="col-md-4 col-sm-6 col-xs-12 sidebar">
	<?php dynamic_sidebar( 'sidebar_widgets' ); ?>
</div>
