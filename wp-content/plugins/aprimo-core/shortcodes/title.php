<?php
add_shortcode('faster_title', function($atts, $content) {
    ob_start();

    $atts = shortcode_atts(array(
        'title' => 'Advance features give you full control!',
        'subtitle' => 'No need for a  Wi-Fi network or mobile data plan. The choice of OVER 1 billion users.',
        'desc' => '',
    ),$atts);
    ?>

    <div class="feature-text">
        <div class="theme-title-two">
            <h2> <?php echo $atts['title']; ?> </h2>
            <p> <?php echo $atts['subtitle']; ?> </p>
        </div> <!-- /.theme-title-two -->
        <?php
        if(!empty($atts['desc'])) { ?>
            <p> <?php echo $atts['desc']; ?> </p>
            <?php
        }
        ?>
    </div>

    <?php
    $html = ob_get_clean();

    return $html;
});



// VC Config
add_action( 'vc_before_init', function() {
    if( function_exists('vc_map') ) {
        vc_map(array(
                'name'              => esc_html__('Aprimo Title', 'aprimo-core'),
                'description'       => esc_html__('Create title with subtitle and description text.', 'aprimo-core'),
                'base'              => 'faster_title',
                'category'          => esc_html__('Aprimo', 'aprimo-core'),
                'params'            => array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'title',
                        'value' => 'Boost up your phone in just one click!',
                        'heading' => esc_html__('Title', 'aprimo-core'),
                        'holder' => 'h2',
                    ),
                    array(
                        'type' => 'textarea',
                        'param_name' => 'subtitle',
                        'value' => 'No need for a  Wi-Fi network or mobile data plan. The choice of OVER 1 billion users.',
                        'heading' => esc_html__('Subtitle', 'aprimo-core'),
                    ),
                    array(
                        'type' => 'textarea',
                        'param_name' => 'desc',
                        'heading' => esc_html__('Description text', 'aprimo-core'),
                    ),
                ),
            )
        );

    }
});
