<?php
add_shortcode('faster_screenhost', function($atts, $content) {
    ob_start();

    $atts = shortcode_atts(array(
        'mockup' => '',
        'title' => 'App Screenshot',
    ),$atts);
    $mockup = wp_get_attachment_image_src($atts['mockup'], 'full');
    $mockup_src = isset($mockup[0]) ? $mockup[0] : plugins_url('/images/mobile-mockup.png', __FILE__);
    $images = explode(',', $content);
    ?>

    <div class="app-screenshot">
        <h2> <?php echo $atts['title']; ?> </h2>
        <div class="screenshot-container">
            <div class="phone-mockup">
                <img src="<?php echo $mockup_src; ?>" alt="" class="">
            </div>
            <div class="slider-row">
                <div class="screenshoot-slider">
                    <?php
                    foreach($images as $image) {
                        $image_src = wp_get_attachment_image_src($image, 'full'); ?>
                        <div class="item"><img src="<?php echo $image_src[0]; ?>" alt=""></div>
                        <?php
                    }
                    ?>
                </div> <!-- /.screenshoot-slider -->
            </div> <!-- /.row -->
        </div> <!-- /.screenshot-container -->
    </div>

    <?php
    $html = ob_get_clean();
    return $html;
});



// VC Config
add_action( 'vc_before_init', function() {
    if( function_exists('vc_map') ) {
        vc_map(array(
                'name'              => esc_html__('App Screenshots', 'aprimo-core'),
                'description'       => esc_html__("Display your app screenshots with mobile mockup", 'aprimo-core'),
                'base'              => 'faster_screenhost',
                'category'          => esc_html__('Aprimo', 'aprimo-core'),
                'params'            => array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'title',
                        'value' => 'App Screenshot',
                        'heading' => esc_html__('Title', 'aprimo-core'),
                        'holder' => 'h2',
                    ),
                    array(
                        'type' => 'attach_image',
                        'param_name' => 'mockup',
                        'heading' => esc_html__('Mobile mockup image', 'aprimo-core'),
                        'description' => esc_html__('Leave it blank to use the default mockup.', 'aprimo-core'),
                    ),
                    array(
                        'type' => 'attach_images',
                        'param_name' => 'content',
                        'heading' => esc_html__('Screenshots', 'aprimo-core'),
                    ),
                ),
            )
        );

    }
});
