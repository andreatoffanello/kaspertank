<?php
add_shortcode('faster_testimonial', function($atts, $content) {
    ob_start();
    $atts = shortcode_atts(array(
        'title' => 'Check what people say <br>About us!',
        'small_title' => 'Testimonials',
        'video_title' => 'Intro Video',
        'video_subtitle' => 'Watch',
        'video_url' => 'https://www.youtube.com/embed/r-AuLm7S3XE?rel=0&amshowinfo=0',
        'video_bg' => '',
    ),$atts);
    $video_bg = wp_get_attachment_image_src($atts['video_bg'], 'full');
    $quotes = vc_param_group_parse_atts($content);
    ?>

    <div class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12 float-right wow fadeInUp">
                    <div class="theme-title-one">
                        <?php if(!empty($atts['small_title'])) : ?>
                            <h6> <?php echo wp_kses_post($atts['small_title']); ?> </h6>
                        <?php endif; ?>
                        <?php if(!empty($atts['title'])) : ?>
                            <h2> <?php echo wp_kses_post($atts['title']); ?> </h2>
                        <?php endif; ?>
                    </div> <!-- /.theme-title-one -->
                </div> <!-- /.col- -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
        <div class="main-bg-wrapper" style="background: url(<?php echo $video_bg[0]; ?>) no-repeat center;">
            <div class="overlay">
                <div id="watch-video">
                    <?php if(!empty($atts['video_title'])) : ?>
                        <h6> <?php echo esc_html($atts['video_title']); ?> </h6>
                    <?php endif; ?>
                    <?php if(!empty($atts['video_subtitle'])) : ?>
                        <h4> <?php echo $atts['video_subtitle']; ?> </h4>
                    <?php endif; ?>
                    <?php if(!empty($atts['video_url'])) : ?>
                        <a data-fancybox href="<?php echo esc_url($atts['video_url']) ?>" class="tran3s theme-button"><i class="fa fa-play" aria-hidden="true"><span></span></i></a>
                    <?php endif; ?>
                </div>
                <div class="main-slider-wrapper">
                    <div class="testimonial-slider">
                        <?php
                        foreach($quotes as $quote) {
                            $author_image = wp_get_attachment_image_src($quote['author_image'], 'gullu_50x50');
                            ?>
                            <div class="item">
                                <?php if(!empty($quote['quote'])) : ?>
                                    <i class="flaticon-straight-quotes"></i>
                                    <?php echo wpautop($quote['quote']); ?>
                                <?php endif; ?>
                                <div class="clearfix">
                                    <img src="<?php echo $author_image[0]; ?>" alt="<?php echo $quote['author_name']; ?>" class="float-left">
                                    <div class="name float-left">
                                        <?php if(!empty($quote['author_name'])) : ?>
                                            <h6> <?php echo $quote['author_name']; ?> </h6>
                                        <?php endif; ?>
                                        <?php if(!empty($quote['author_designation'])) : ?>
                                            <span> <?php echo $quote['author_designation']; ?> </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div> <!-- /.testimonial-slider -->
                </div> <!-- /.main-slider-wrapper -->
            </div>
        </div> <!-- /.main-bg-wrapper -->
    </div>

    <?php
    $html = ob_get_clean();
    return $html;
});



// VC Config
add_action( 'vc_before_init', function() {
    if( function_exists('vc_map') ) {
        vc_map(array(
                'name'              => esc_html__('Testimonial', 'aprimo-core'),
                'description'       => esc_html__('Full width testimonial section with video.', 'aprimo-core'),
                'base'              => 'faster_testimonial',
                'category'          => esc_html__('Aprimo', 'aprimo-core'),
                'params'            => array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'title',
                        'heading' => esc_html__('Title', 'aprimo-core'),
                        'description' => esc_html__('Use br tag (<br>) for line breaking.', 'aprimo-core'),
                        'value' => 'Check what people say <br>About us!'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'small_title',
                        'heading' => esc_html__('Small title', 'aprimo-core'),
                        'value' => 'Testimonials',
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'video_title',
                        'heading' => esc_html__('Video Title', 'aprimo-core'),
                        'value' => 'Intro Video'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'video_subtitle',
                        'heading' => esc_html__('Video Subtitle', 'aprimo-core'),
                        'value' => 'Watch'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'video_url',
                        'heading' => esc_html__('Video URL', 'aprimo-core'),
                        'value' => 'https://www.youtube.com/embed/r-AuLm7S3XE?rel=0&amshowinfo=0'
                    ),
                    array(
                        'type' => 'attach_image',
                        'param_name' => 'video_bg',
                        'heading' => esc_html__('Video section background image', 'aprimo-core'),
                    ),
                    array(
                        'type' => 'param_group',
                        'param_name' => 'content',
                        'heading' => esc_html__('Testimonials', 'aprimo-core'),
                        'params' => array(
                            array(
                                'type' => 'textarea',
                                'param_name' => 'quote',
                                'heading' => esc_html__('Quote Text', 'aprimo-core'),
                            ),
                            array(
                                'type' => 'attach_image',
                                'param_name' => 'author_image',
                                'heading' => esc_html__('Quote Author image', 'aprimo-core'),
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'author_name',
                                'heading' => esc_html__('Author Name', 'aprimo-core'),
                                'admin_label'=> true
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'author_designation',
                                'heading' => esc_html__('Author Designation', 'aprimo-core'),
                                'admin_label'=> true
                            ),
                        )
                    )
                ),
            )
        );

    }
});
