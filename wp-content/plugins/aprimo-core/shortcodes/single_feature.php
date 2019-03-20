<?php
add_shortcode('faster_feature_item', function($atts, $content) {
    ob_start();

    $atts = shortcode_atts(array(
        'title' => 'User Friendly',
        'subtitle' => 'Sed ut perspic unde omnis iste natus error volu. ',
        'icon' => 'flaticon-diamond',
        'fontawesome_icon' => 'fa fa-right',
        'bg_type' => 'gradient',
        'bg_color' => '',
        'gradient_color_1' => 'rgb(65,174,220)',
        'gradient_color_2' => 'rgb(6,240,243)',
        'choose_icon' => 'flaticon',
    ),$atts);

    $bg_color = $atts['bg_type']=='gradient' ? "background-image: linear-gradient( 51deg, {$atts['gradient_color_1']} 0%, {$atts['gradient_color_2']});" : "background: {$atts['bg_color']}";
    $icon = $atts['choose_icon']=='flaticon' ? $atts['icon'] : $atts['fontawesome_icon'];
    ?>

    <div class="single-feature js-tilt" style="<?php echo $bg_color; ?>">
        <i class="<?php echo $icon; ?>"></i>
        <h5> <?php echo $atts['title']; ?> </h5>
        <p> <?php echo $atts['subtitle']; ?> </p>
    </div>

    <?php
    $html = ob_get_clean();
    return $html;
});



// VC Config
add_action( 'vc_before_init', function() {
    if( function_exists('vc_map') ) {
        vc_map(array(
                'name'            => esc_html__('Feature item', 'aprimo-core'),
                'description'     => esc_html__('Display your app feature with interactive mode.', 'aprimo-core'),
                'base'            => 'faster_feature_item',
                'category'        => esc_html__('Aprimo', 'aprimo-core'),
                'params'          => array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'title',
                        'value' => 'User Friendly',
                        'heading' => esc_html__('Title', 'aprimo-core'),
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textarea',
                        'param_name' => 'subtitle',
                        'value' => 'Sed ut perspic unde omnis iste natus error volu. ',
                        'heading' => esc_html__('Subtitle', 'aprimo-core'),
                    ),

                    array(
                        'type' => 'dropdown',
                        'param_name' => 'choose_icon',
                        'heading' => esc_html__('Choose icon', 'aprimo-core'),
                        'value' => array(
                            'Flaticon' => 'flaticon',
                            'Font Awesome' => 'fontawesome',
                        ),
                        'std' => 'flaticon'
                    ),
                    array(
                        'type' => 'iconpicker',
                        'param_name' => 'btn_icon',
                        'heading' => esc_html__('Flat-icon', 'aprimo-core'),
                        'value' => 'flaticon-diamond',
                        'settings' => array(
                            'type' => 'flaticon',
                            'iconsPerPage' => 200,
                            'emptyIcon' => false
                        ),
                        'dependency' => array(
                            'element' => 'choose_icon',
                            'value' => 'flaticon'
                        )
                    ),
                    array(
                        'type' => 'iconpicker',
                        'param_name' => 'fontawesome_icon',
                        'heading' => esc_html__('Font-awesome icon', 'aprimo-core'),
                        'value' => 'fa fa-arrow-left',
                        'settings' => array(
                            'type' => 'fontawesome',
                            'iconsPerPage' => 200,
                            'emptyIcon' => false
                        ),
                        'dependency' => array(
                            'element' => 'choose_icon',
                            'value' => 'fontawesome'
                        )
                    ),

                    // Background
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'bg_type',
                        'value' => array(
                            'Solid color' => 'solid',
                            'Gradient color' => 'gradient'
                        ),
                        'heading' => esc_html__('Background color type', 'aprimo-core'),
                        'std' => 'gradient',
                        'group' => 'Background'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'bg_color',
                        'heading' => esc_html__('Background color', 'aprimo-core'),
                        'dependency' => array(
                            'element' => 'bg_type',
                            'value' => 'solid'
                        ),
                        'group' => 'Background'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'gradient_color_1',
                        'edit_field_class' => 'vc_col-sm-6',
                        'value' => 'rgb(65,174,220)',
                        'heading' => esc_html__('Gradient color 01', 'aprimo-core'),
                        'description' => esc_html__('Color 01 will be mixed up with color 02', 'aprimo-core'),
                        'dependency' => array(
                            'element' => 'bg_type',
                            'value' => 'gradient'
                        ),
                        'group' => 'Background'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'gradient_color_2',
                        'edit_field_class' => 'vc_col-sm-6',
                        'value' => 'rgb(6,240,243)',
                        'heading' => esc_html__('Gradient color 02', 'aprimo-core'),
                        'description' => esc_html__('Color 02 will be mixed up with color 01', 'aprimo-core'),
                        'dependency' => array(
                            'element' => 'bg_type',
                            'value' => 'gradient'
                        ),
                        'group' => 'Background'
                    ),
                ),
            )
        );

    }
});
