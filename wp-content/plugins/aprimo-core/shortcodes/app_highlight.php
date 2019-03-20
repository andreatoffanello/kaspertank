<?php
add_shortcode('faster_app_features', function($atts, $content) {
    ob_start();

    $atts = shortcode_atts(array(
        'title' => 'Boost up your phone in just one click!',
        'subtitle' => 'No need for a  Wi-Fi network or mobile data plan. The choice of OVER 1 billion users.',
        'desc' => '',
        'image' => '',
        'bg_img' => '',
    ),$atts);
    $features = vc_param_group_parse_atts($content);
    $image = wp_get_attachment_image_src($atts['image'], 'full');
    $bg_image = wp_get_attachment_image_src($atts['bg_img'], 'full');
    $bg_image_src = isset($bg_image[0]) ? "url({$bg_image[0]}) no-repeat center center" : '';
    ?>

    <div class="boost-your-phone">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xs-12 float-right  wow fadeInRight">
                    <div class="text">
                        <div class="theme-title-two">
                            <h2> <?php echo $atts['title']; ?> </h2>
                            <p> <?php echo $atts['subtitle']; ?> </p>
                        </div> <!-- /.theme-title-two -->
                        <ul>
                            <?php
                            foreach($features as $feature) {
                                $choose_icon = !empty($feature['choose_icon']) ? $feature['choose_icon'] : '';
                                $icon = $choose_icon == 'fontawesome' ? $feature['btn_fontawesome_icon'] : $feature['btn_icon'];
                                echo "<li><i class='{$icon}'></i> {$feature['feature_name']} </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="boster-image-wrapper  wow fadeInLeft" style="background: <?php echo $bg_image_src; ?>">
                <img src="<?php echo plugins_url('images/try.png', __FILE__); ?>" alt="" class="try">
                <input type="checkbox" id="ao-toggle" class="ao-toggle" name="ao-toggle">
                <img src="<?php echo $image[0]; ?>" alt="">
                <div class="ao-annotations">
                    <?php
                    foreach($features as $feature) {
                        $h_position = $feature['h_position'] == 'left' ? "left:{$feature['left_position']};" : "right:{$feature['right_position']};";
                        $v_position = $feature['v_position'] == 'top' ? "top:{$feature['top_position']};" : "bottom:{$feature['bottom_position']};";
                        echo "<span style='$v_position $h_position'>{$feature['feature_name']}</span>";
                    }
                    ?>
                </div>
            </div> <!-- /.boster-image-wrapper -->
        </div> <!-- /.container -->
    </div>

    <?php
    $html = ob_get_clean();

    return $html;
});



// VC Config
add_action( 'vc_before_init', function() {
    if( function_exists('vc_map') ) {
        vc_map(array(
                'name'              => esc_html__('App highlight', 'aprimo-core'),
                'description'       => esc_html__('Highlight your app features with screenshot.', 'aprimo-core'),
                'base'              => 'faster_app_features',
                'category'          => esc_html__('Aprimo', 'aprimo-core'),
                'params'            => array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'title',
                        'value' => 'Boost up your phone in just one click!',
                        'heading' => esc_html__('Title', 'aprimo-core'),
                        'holder' => 'h2',
                        'group' => 'Title section',
                    ),
                    array(
                        'type' => 'textarea',
                        'param_name' => 'subtitle',
                        'value' => 'No need for a  Wi-Fi network or mobile data plan. The choice of OVER 1 billion users.',
                        'heading' => esc_html__('Subtitle', 'aprimo-core'),
                        'group' => 'Title section',
                    ),
                    array(
                        'type' => 'attach_image',
                        'param_name' => 'image',
                        'heading' => esc_html__('App screenshot', 'aprimo-core'),
                        'group' => 'App Screenshot',
                        'description' => esc_html__('Attach here your App screenshot and it will show on the left side of the section.', 'aprimo-core'),
                    ),
                    array(
                        'type' => 'attach_image',
                        'param_name' => 'bg_img',
                        'group' => 'App Screenshot',
                        'heading' => esc_html__('App screenshot background', 'aprimo-core'),
                    ),
                    array(
                        'type' => 'param_group',
                        'param_name' => 'content',
                        'heading' => esc_html__('Features list', 'aprimo-core'),
                        'group' => 'Features',
                        'params' => array(
                            array(
                                'type' => 'textfield',
                                'param_name' => 'feature_name',
                                'heading' => esc_html__('Feature name', 'aprimo-core'),
                                'value' => 'Auto clean mood with super minimize option',
                                'admin_label' => true
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
                                'heading' => esc_html__('Feature list icon', 'aprimo-core'),
                                'value' => 'flaticon-tick',
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
                                'param_name' => 'btn_fontawesome_icon',
                                'heading' => esc_html__('Font-awesome icon', 'aprimo-core'),
                                'value' => 'fa fa-right',
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
                            array(
                                'type' => 'dropdown',
                                'param_name' => 'v_position',
                                'heading' => esc_html__('Vertical position from', 'aprimo-core'),
                                'value' => array(
                                    'Top' => 'top',
                                    'Bottom' => 'bottom'
                                )
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'top_position',
                                'heading' => esc_html__('Top position', 'aprimo-core'),
                                'description' => esc_html__('How far space will move from the top position of the image.', 'aprimo-core'),
                                'value' => '37%',
                                'dependency' => array(
                                    'element' => 'v_position',
                                    'value' => 'top'
                                )
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'bottom_position',
                                'heading' => esc_html__('Bottom position', 'aprimo-core'),
                                'description' => esc_html__('How far space will move from the bottom position of the image.', 'aprimo-core'),
                                'value' => '30%',
                                'dependency' => array(
                                    'element' => 'v_position',
                                    'value' => 'bottom'
                                )
                            ),
                            array(
                                'type' => 'dropdown',
                                'param_name' => 'h_position',
                                'heading' => esc_html__('Horizontal position from', 'aprimo-core'),
                                'value' => array(
                                    'Left' => 'left',
                                    'Right' => 'right'
                                )
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'left_position',
                                'heading' => esc_html__('Left position', 'aprimo-core'),
                                'description' => esc_html__('How far space will move from the left position of the image.', 'aprimo-core'),
                                'value' => '0%',
                                'dependency' => array(
                                    'element' => 'h_position',
                                    'value' => 'left'
                                )
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'right_position',
                                'heading' => esc_html__('Right position', 'aprimo-core'),
                                'description' => esc_html__('How far space will move from the right position of the image.', 'aprimo-core'),
                                'value' => '-19%',
                                'dependency' => array(
                                    'element' => 'h_position',
                                    'value' => 'right'
                                )
                            ),
                        )
                    ),
                ),
            )
        );

    }
});
