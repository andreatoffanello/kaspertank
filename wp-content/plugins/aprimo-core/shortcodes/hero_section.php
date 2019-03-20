<?php
add_shortcode('faster_hero_sec', function($atts, $content) {
    ob_start();

    $atts = shortcode_atts(array(
        // Background
        'bg_type' => 'image',
        'bg_image' => '',
        'bg_gradient1' => 'rgb(92,57,236)',
        'bg_gradient2' => 'rgb(132,112,255)',
        'bg_gradient_angle' => '131deg',
        'bg_solid' => '',
        'is_particles' => '',
        'select_particle' => 'particle1',
        // Content
        'title' => '#1 Cleaning App',
        'btm_title' => 'Great Features with <br>Best Cleaner.',
        'desc' => 'No need for a  Wi-Fi network or mobile data plan. The <br> choice of OVER 1 billion users.',
        'top_title_color' => 'rgba(0,0,0,0.4)',
        'btm_title_color' => '#000',
        'desc_color' => 'rgba(0,0,0,0.6)',
        // Featured image
        'slide_image' => '',
        'fi_top' => '-155px',
        'fi_right' => '-140px',
        'fi_bottom' => '',
        'fi_left' => '',
        'fi_width' => '',
    ),$atts);
    $bg_image = wp_get_attachment_image_src($atts['bg_image'], 'full');
    if($atts['bg_type']=='gradient' || $atts['bg_type']=='solid') {
        $background_image = plugins_url('/images/slide-transparent.png', __FILE__);
    }else {
        $background_image = $bg_image[0];
    }
    $buttons = vc_param_group_parse_atts($content);
    $featured_image = wp_get_attachment_image_src($atts['slide_image'], 'full');
    ?>

    <?php
    if($atts['is_particles']=='true') {
        $particle_chosen = '';
        $particle_id = '';
        switch ($atts['select_particle']) {
            case 'particle1':
                $particle_chosen = 'one';
                $particle_id = '';
                break;
            case 'particle2':
                $particle_chosen = 'two';
                $particle_id = '-two';
                break;
            case 'particle3':
                $particle_chosen = 'three';
                $particle_id = '-three';
                break;
        }
        ?>
        <div class="partical-bg-wrapper partical-gradient-<?php echo $particle_chosen; ?>" style="background: linear-gradient( <?php echo $atts['bg_gradient_angle'] ?>, <?php echo $atts['bg_gradient1'] ?> 0%, <?php echo $atts['bg_gradient2'] ?> 100%) !important;">
        <div class="count-particles">
            <span class="js-count-particles">--</span>
        </div>
        <div id="particles-js<?php echo $particle_id ?>"></div>
            <?php
    }

        if($atts['is_particles']!='true') {
            wp_deregister_script( 'particles');
            wp_deregister_script( 'particles-stats');
            wp_deregister_script( 'particles-app');
        }
        if($atts['bg_type']=='gradient' & $atts['is_particles']!='true') {
            ?>
            <style>
                #theme-main-banner .camera_overlayer {
                    background: linear-gradient( <?php echo $atts['bg_gradient_angle'] ?>, <?php echo $atts['bg_gradient1'] ?> 0%, <?php echo $atts['bg_gradient2'] ?> 100%) !important;
                }
            </style>
        <?php
        }elseif($atts['bg_type']=='solid') { ?>
            <style>
                #theme-main-banner .camera_overlayer {
                    background:  <?php echo $atts['bg_solid'] ?> !important;
                }
            </style>
        <?php
        }
        ?>
            <div id="theme-main-banner" class="banner-one">
                <div data-src="<?php echo $background_image; ?>">
                    <div class="camera_caption">
                        <div class="main-container">
                            <div class="container">
                                <h5 class="wow fadeInUp animated" style="color: <?php echo $atts['top_title_color']; ?>;"> <?php echo $atts['title']; ?> </h5>
                                <h1 class="wow fadeInUp animated" style="color: <?php echo $atts['btm_title_color']; ?>;"> <?php echo $atts['btm_title']; ?> </h1>
                                <p class="wow fadeInUp animated" style="color: <?php echo $atts['desc_color']; ?>;"> <?php echo $atts['desc'] ?> </p>
                                <?php
                                if(is_array($buttons)) {
                                    $i = 1;
                                    foreach($buttons as $button) {
                                        $btn = vc_build_link($button['btn']);
                                        $btn_css = "style='background: {$button['btn_bg_color']}; color: {$button['btn_color']}; border-color: {$button['border_color']};'";
                                        $btn_hover = ".home-page-one #theme-main-banner .camera_caption .container a.btn$i:hover {
                                                            background: {$button['hover_color']};
                                                            border-color: {$button['hover_color']};
                                                          }";
                                        $btn_icon_font = isset($button['btn_icon']) ? $button['btn_icon'] : '';
                                        $btn_icon_image = isset($button['btn_icon_image']) ? $button['btn_icon_image'] : '';
                                        $btn_icon_image = wp_get_attachment_image_src($btn_icon_image, 'full');
                                        $button_icon = $button['btn_type']=='fontawesome' ? "<i class='$btn_icon_font' aria-hidden='true'></i>" : "<img src='$btn_icon_image[0]' alt=''>";
                                        ?>
                                        <a href="<?php echo $btn['url']; ?>" class="btn<?php echo $i; ?> tran3s wow fadeInLeft animated button-one" <?php echo $btn_css; ?>
                                           data-wow-delay="0.499s" target="<?php echo $btn['target']; ?>">
                                            <?php echo $button_icon . $btn['title']; ?>
                                        </a>
                                        <?php
                                        $i++;
                                    }
                                }
                                $top = !empty($atts['fi_top']) ? $atts['fi_top'] : '';
                                $right = !empty($atts['fi_right']) ? $atts['fi_right'] : '';
                                $bottom = !empty($atts['fi_bottom']) ? $atts['fi_bottom'] : '';
                                $left = !empty($atts['fi_left']) ? $atts['fi_left'] : '';
                                $fi_width = !empty($atts['fi_width']) ? $atts['fi_width'] : '';
                                ?>
                                <div class="image-wrapper wow fadeInUp animated" data-wow-delay="0.75s"
                                     style="width: <?php echo $fi_width; ?>; top: <?php echo $top ?>; right: <?php echo $right ?>; bottom: <?php echo $bottom; ?>; left: <?php echo $left; ?>;">
                                    <img src="<?php echo $featured_image[0]; ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- </div> --> <?php echo $atts['is_particles']=='true' ? '</div>' : '' ?>

    <?php
    $html = ob_get_clean();
    return $html;
});



// VC Config
add_action( 'vc_before_init', function() {
    if( function_exists('vc_map') ) {
        vc_map(array(
                'name'              => esc_html__('Hero Section', 'aprimo-core'),
                'description'       => esc_html__('Create Hero Section', 'aprimo-core'),
                'base'              => 'faster_hero_sec',
                'category'          => esc_html__('Aprimo', 'aprimo-core'),
                'params'            => array(
                    // Content
                    array(
                        'type' => 'textfield',
                        'param_name' => 'title',
                        'value' => '#1 Cleaning App',
                        'heading' => esc_html__('Top Title', 'aprimo-core'),
                        'description' => esc_html__('Top Title is the small title.', 'aprimo-core'),
                        'holder' => 'h2',
                        'group' => 'Content'
                    ),
                    array(
                        'type' => 'textarea',
                        'param_name' => 'btm_title',
                        'value' => 'Great Features with <br>Best Cleaner.',
                        'heading' => esc_html__('Main title', 'aprimo-core'),
                        'group' => 'Content'
                    ),
                    array(
                        'type' => 'textarea',
                        'param_name' => 'desc',
                        'value' => 'No need for a  Wi-Fi network or mobile data plan. The <br> choice of OVER 1 billion users.',
                        'heading' => esc_html__('Description text', 'aprimo-core'),
                        'group' => 'Content'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'top_title_color',
                        'heading' => esc_html__('Top title color', 'aprimo-core'),
                        'value' => 'rgba(0,0,0,0.4)',
                        'group' => 'Content'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'btm_title_color',
                        'heading' => esc_html__('Main title color', 'aprimo-core'),
                        'value' => '#000',
                        'group' => 'Content'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'desc_color',
                        'heading' => esc_html__('Description text color', 'aprimo-core'),
                        'value' => 'rgba(0,0,0,0.6)',
                        'group' => 'Content',
                    ),
                    // Background
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'bg_type',
                        'heading' => esc_html__('Background type', 'aprimo-core'),
                        'value' => array(
                            'Gradient color' => 'gradient',
                            'Solid color' => 'solid',
                            'Background image' => 'image'
                        ),
                        'std' => 'image',
                        'group' => 'Background'
                    ),
                    array(
                        'type' => 'attach_image',
                        'param_name' => 'bg_image',
                        'heading' => esc_html__('Background Image', 'aprimo-core'),
                        'dependency' => array(
                            'element' => 'bg_type',
                            'value' => 'image'
                        ),
                        'group' => 'Background'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'bg_gradient1',
                        'heading' => esc_html__('Gradient color 01', 'aprimo-core'),
                        'value' => 'rgb(92,57,236)',
                        'dependency' => array(
                            'element' => 'bg_type',
                            'value' => 'gradient'
                        ),
                        'group' => 'Background'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'bg_gradient2',
                        'heading' => esc_html__('Gradient color 02', 'aprimo-core'),
                        'value' => 'rgb(132,112,255)',
                        'dependency' => array(
                            'element' => 'bg_type',
                            'value' => 'gradient'
                        ),
                        'group' => 'Background'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'bg_gradient_angle',
                        'heading' => esc_html__('Gradient color angle', 'aprimo-core'),
                        'description' => esc_html__('Input it in degree (deg)', 'aprimo-core'),
                        'dependency' => array(
                            'element' => 'bg_type',
                            'value' => 'gradient'
                        ),
                        'value' => '131deg',
                        'group' => 'Background'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'param_name' => 'bg_solid',
                        'heading' => esc_html__('Background color', 'aprimo-core'),
                        'dependency' => array(
                            'element' => 'bg_type',
                            'value' => 'solid'
                        ),
                        'group' => 'Background'
                    ),
                    array(
                        'type' => 'checkbox',
                        'param_name' => 'is_particles',
                        'heading' => esc_html__('Use particles in background.', 'aprimo-core'),
                        'group' => 'Background'
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'select_particle',
                        'heading' => esc_html__('Select a particle style', 'aprimo-core'),
                        'value' => array(
                            'Particle style one' => 'particle1',
                            'Particle style two' => 'particle2',
                            'Particle style three' => 'particle3',
                        ),
                        'dependency' => array(
                            'element' => 'is_particles',
                            'value' => 'true'
                        ),
                        'group' => 'Background'
                    ),

                    // Featured image
                    array(
                        'type' => 'attach_image',
                        'param_name' => 'slide_image',
                        'heading' => esc_html__('Upload Featured Image', 'aprimo-core'),
                        'group' => 'Featured Image'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'fi_top',
                        'value' => '-155px',
                        'heading' => esc_html__('Position from top', 'aprimo-core'),
                        'description' => esc_html__('Leave this field empty or "auto" if you use the Position from bottom', 'aprimo-core'),
                        'group' => 'Featured Image'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'fi_right',
                        'value' => '-140px',
                        'heading' => esc_html__('Position from right', 'aprimo-core'),
                        'description' => esc_html__('Leave this field empty or "auto" if you use the Position from left', 'aprimo-core'),
                        'group' => 'Featured Image'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'fi_bottom',
                        'heading' => esc_html__('Position from bottom', 'aprimo-core'),
                        'description' => esc_html__('Leave this field empty or "auto" if you use the Position from top', 'aprimo-core'),
                        'group' => 'Featured Image'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'fi_left',
                        'heading' => esc_html__('Position from left', 'aprimo-core'),
                        'description' => esc_html__('Leave this field empty or "auto" if you use the Position from right', 'aprimo-core'),
                        'group' => 'Featured Image'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'fi_width',
                        'heading' => esc_html__('Featured image width', 'aprimo-core'),
                        'description' => esc_html__('You can set the width of the featured image in pixel or percent (%)', 'aprimo-core'),
                        'group' => 'Featured Image'
                    ),
                    array(
                        'type' => 'param_group',
                        'param_name' => 'content',
                        'heading' => esc_html__('Create Buttons', 'aprimo-core'),
                        'group' => 'Buttons',
                        'params' => array(
                            array(
                                'type' => 'vc_link',
                                'param_name' => 'btn',
                                'heading' => esc_html__('Button', 'aprimo-core')
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'btn_bg_color',
                                'heading' => esc_html__('Button background color', 'aprimo-core'),
                                'value' => '#252525',
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'btn_color',
                                'heading' => esc_html__('Button text color', 'aprimo-core'),
                                'value' => '#fff'
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'border_color',
                                'heading' => esc_html__('Button border color', 'aprimo-core'),
                                'value' => '#252525'
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'hover_color',
                                'heading' => esc_html__('Button hover color', 'aprimo-core'),
                                'value' => '#fd3f38'
                            ),
                            array(
                                'type' => 'dropdown',
                                'param_name' => 'btn_type',
                                'heading' => esc_html__('Button icon type', 'aprimo-core'),
                                'admin_label' => true,
                                'value' => array(
                                    'Fontawesome icon' => 'fontawesome',
                                    'Image icon' => 'image_icon'
                                ),
                            ),
                            array(
                                'type' => 'iconpicker',
                                'param_name' => 'btn_icon',
                                'heading' => esc_html__('Button icon', 'aprimo-core'),
                                'settings' => array(
                                    'type' => 'fontawesome',
                                    'iconsPerPage' => 200,
                                    'emptyIcon' => false
                                ),
                                'dependency' => array(
                                    'element' => 'btn_type',
                                    'value' => 'fontawesome'
                                ),
                                'value' => 'fa fa-apple'
                            ),
                            array(
                                'type' => 'attach_image',
                                'param_name' => 'btn_icon_image',
                                'heading' => esc_html__('Button icon image', 'aprimo-core'),
                                'dependency' => array(
                                    'element' => 'btn_type',
                                    'value' => 'image_icon'
                                ),
                            ),
                        )
                    ),
                ),
            )
        );

    }
});
