<?php
add_shortcode('gullu_btn', function($atts, $content) {
    ob_start();

    $atts = shortcode_atts(array(
        'btn'           => '',
        'btn_bg_color'  => '#0dda8f',
        'btn_font_color'=> '#ffffff',
        'btn_width'     => '200px',
        'btn_txt_align' => 'center',
    ),$atts);

    $btn = vc_build_link($atts['btn']);
    $css = "background: {$atts['btn_bg_color']}; color: {$atts['btn_font_color']}; width: {$atts['btn_width']}; text-align: {$atts['btn_txt_align']};"
    ?>

    <a style="<?php echo $css; ?>" href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target']; ?>" class="gullu-btn hvr-trim-two"> <?php echo $btn['title']; ?> </a>

    <?php
    $html = ob_get_clean();
    return $html;
});



// VC Config
add_action( 'vc_before_init', function() {
    if( function_exists('vc_map') ) {
        vc_map(array(
                'name'              => esc_html__('Gullu Button', 'aprimo-core'),
                'description'       => esc_html__('Create Gullu Style Button.', 'aprimo-core'),
                'base'              => 'gullu_btn',
                'category'          => esc_html__('Gullu', 'aprimo-core'),
                'params'            => array(
                    array(
                        'type' => 'vc_link',
                        'param_name' => 'btn',
                        'heading' => esc_html__('Button', 'aprimo-core'),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'btn_bg_color',
                        'heading' => esc_html__('Button background Color', 'aprimo-core'),
                        'value' => '#0dda8f'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'btn_font_color',
                        'heading' => esc_html__('Button font Color', 'aprimo-core'),
                        'value' => '#ffffff'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'btn_width',
                        'heading' => esc_html__('Button width', 'aprimo-core'),
                        'value' => '200px'
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'btn_txt_align',
                        'heading' => esc_html__('Button text align', 'aprimo-core'),
                        'value' => array(
                            'Center' => 'center',
                            'Left'   => 'left',
                            'Right'  => 'right'
                        )
                    ),
                ),
            )
        );

    }
});
