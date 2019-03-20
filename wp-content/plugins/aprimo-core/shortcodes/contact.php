<?php
add_shortcode('faster_contact', function($atts, $content) {
    ob_start();

    $atts = shortcode_atts(array(
        'title' => 'Contact us',
        'subtitle' => "Don’t Hesitate to contact with us for any kind of information",
        'send_btn_txt' => 'SEND MESSAGE',
        'to' => ''
    ),$atts);

    ?>

    <div class="contact-us-section">
        <div class="row">
            <div class="col-md-5 col-xs-12 pull-right">
                <address class="contact-address">
                    <div class="theme-title-one">
                        <h6> <?php echo $atts['title']; ?> </h6>
                        <h2> <?php echo $atts['subtitle']; ?> </h2>
                    </div> <!-- /.theme-title -->
                    <?php echo wp_kses_post($content); ?>
                </address> <!-- /.contact-address -->
            </div>
            <div id="contact-form" class="col-md-7 col-xs-12">
                <form action="#contact-form" method="post" class="contact-us-form form-validation" auto-complete="off">
                    <input type="email" placeholder="<?php esc_html_e('Email Address*', 'aprimo-core'); ?>" name="email">
                    <input type="text" placeholder="<?php esc_html_e('Subject*', 'aprimo-core'); ?>" name="sub">
                    <textarea placeholder="<?php esc_html_e('Your Message*', 'aprimo-core'); ?>" name="message"></textarea>
                    <div class="theme-button">
                        <span></span>
                        <input type="submit" name="contact_submit" value="<?php echo $atts['send_btn_txt']; ?>">
                    </div>
                </form>
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div>

    <?php
    $html = ob_get_clean();

    if(isset($_POST['contact_submit'])) {
        $to = !empty($atts['to']) ? $atts['to'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $sub = isset($_POST['sub']) ? $_POST['sub'] : '';
        $message = isset($_POST['message']) ? $_POST['message'] : '';
        $body = "<b>".esc_html__("Email: ", "aprimo-core")."</b>".$email."<br>
                <b>".esc_html__("Subject: ", "aprimo-core")."</b>".$sub."<br>
                <b>".esc_html__("Message: ", "aprimo-core")."</b>".$message."<br>";
        $headers = array("Content-Type: text/html; charset=UTF-8");
        wp_mail($to, $sub, $body, $headers);
        if (@wp_mail($to, $sub, $body, $headers)) {
            echo "<br> <br>" . esc_html__("Your message has sent successfully", "aprimo-core");
        } else {
            echo "<br> <br>" . esc_html__("An error occurred. Please fill the form again and submit.", "aprimo-core");
        }
    }

    return $html;
});



// VC Config
add_action( 'vc_before_init', function() {
    if( function_exists('vc_map') ) {
        vc_map(array(
                'name'              => esc_html__('Contact section', 'aprimo-core'),
                'description'       => esc_html__('Place the contact form.', 'aprimo-core'),
                'base'              => 'faster_contact',
                'category'          => esc_html__('Aprimo', 'aprimo-core'),
                'params'            => array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'title',
                        'value' => 'Contact us',
                        'heading' => esc_html__('Title', 'aprimo-core'),
                        'holder' => 'h2',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'subtitle',
                        'value' => 'Subtitle',
                        'heading' => esc_html__("Don’t Hesitate to contact with us for any kind of information", 'aprimo-core'),
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'send_btn_txt',
                        'value' => 'SEND MESSAGE',
                        'heading' => esc_html__('Submit button label', 'aprimo-core'),
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'to',
                        'heading' => esc_html__('Email to', 'aprimo-core'),
                        'description' => esc_html__('Enter the mail receiver email address', 'aprimo-core'),
                    ),
                    array(
                        'type' => 'textarea',
                        'param_name' => 'content',
                        'heading' => esc_html__('Content', 'aprimo-core'),
                        'description' => esc_html__('HTML supported', 'aprimo-core'),
                    ),
                ),
            )
        );

    }
});
