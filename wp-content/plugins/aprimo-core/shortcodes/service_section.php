<?php
add_shortcode('faster_service_sec', function($atts, $content) {
    ob_start();

    $atts = shortcode_atts(array(
        'title' => 'What We Do',
        'btm_title' => 'Amazing features to convince you <br>to use our application',
        'top_title_color' => 'rgba(0,0,0,0.4)',
        'btm_title_color' => '#000',
        'desc_color' => 'rgba(0,0,0,0.6)',
    ),$atts);
    $services = vc_param_group_parse_atts($content);
    ?>

    <div class="what-we-do bg">
        <div class="theme-title-one text-center">
            <h6> <?php echo $atts['title']; ?> </h6>
            <h2> <?php echo $atts['btm_title']; ?> </h2>
        </div> <!-- /.theme-title-one -->

        <div class="row">
            <?php
            foreach($services as $service) {
                $image = wp_get_attachment_image_src($service['image'], 'full');
                $btn = vc_build_link($service['btn']);
                ?>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
                    <div class="single-block tran3s">
                        <img src="<?php echo $image[0]; ?>" alt="" class="tran4s">
                        <h6> <?php echo $service['title']; ?> </h6>
                        <p> <?php echo $service['subtitle']; ?> </p>
                        <a href="<?php echo $btn['url'] ?>" class="tran3s theme-button" <?php echo $btn['target']; ?>><span></span> <?php echo $btn['title']; ?> </a>
                    </div> <!-- /.single-block -->
                </div>
                <?php
            }
            ?>
        </div> <!-- /.row -->
    </div>

    <?php
    $html = ob_get_clean();

    return $html;
});



// VC Config
add_action( 'vc_before_init', function() {
    if( function_exists('vc_map') ) {
        vc_map(array(
                'name'              => esc_html__('Service Section', 'aprimo-core'),
                'description'       => esc_html__('Create service section with service list', 'aprimo-core'),
                'base'              => 'faster_service_sec',
                'category'          => esc_html__('Aprimo', 'aprimo-core'),
                'params'            => array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'title',
                        'value' => 'What We Do',
                        'heading' => esc_html__('Top Title', 'aprimo-core'),
                        'description' => esc_html__('Top Title is the small title.', 'aprimo-core'),
                        'holder' => 'h2',
                    ),
                    array(
                        'type' => 'textarea',
                        'param_name' => 'btm_title',
                        'value' => 'Amazing features to convince you <br>to use our application',
                        'heading' => esc_html__('Main title', 'aprimo-core'),
                    ),
                    array(
                        'type' => 'param_group',
                        'param_name' => 'content',
                        'heading' => esc_html__('Service items', 'aprimo-core'),
                        'params' => array(
                            array(
                                'type' => 'attach_image',
                                'param_name' => 'image',
                                'heading' => esc_html__('Service icon image', 'aprimo-core'),
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title',
                                'heading' => esc_html__('Title', 'aprimo-core'),
                                'value' => 'Random Cleaning',
                                'admin_label' => true
                            ),
                            array(
                                'type' => 'textarea',
                                'param_name' => 'subtitle',
                                'heading' => esc_html__('Subtitle', 'aprimo-core'),
                                'description' => esc_html__('Use <br> tag for line breaking.', 'aprimo-core'),
                                'value' => 'Fun also including in our app with messaging'
                            ),
                            array(
                                'type' => 'vc_link',
                                'param_name' => 'btn',
                                'heading' => esc_html__('Button', 'aprimo-core'),
                            ),
                        )
                    ),
                ),
            )
        );

    }
});
