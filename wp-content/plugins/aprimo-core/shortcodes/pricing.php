<?php
add_shortcode('faster_pricing', function($atts, $content) {
    ob_start();

    $atts = shortcode_atts(array(
        'title' => 'Not any hidden charge, Choose you pricing plan',
        'small_title' => 'Our pricing',
        'desc' => 'We have differe type of pricing table to choose with your need with resonable price.',
        'tab_items' => ''
    ),$atts);
    $tab_items = vc_param_group_parse_atts($atts['tab_items']);
    $tab_contents = vc_param_group_parse_atts($content);
    ?>

    <div class="pricing-plan-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 wow fadeInLeft">
                    <div class="theme-title-one">
                        <h6> <?php echo $atts['small_title']; ?> </h6>
                        <h2> <?php echo $atts['title']; ?> </h2>
                        <p> <?php echo $atts['desc']; ?> </p>
                    </div> <!-- /.theme-title -->
                    <ul class="nav nav-tabs">
                        <?php
                        $i = 0;
                        foreach($tab_items as $tab_item) {
                            $active = $i==0 ? 'class="active"' : '';
                            echo '<li '.$active.'><a data-toggle="tab" href="#'.aprimo_get_words_slug($tab_item['name']).'">'.$tab_item['name'].'</a></li>';
                            $i ++;
                        }
                        ?>
                    </ul>
                </div> <!-- /.col- -->

                <div class="col-md-6 col-xs-12 wow fadeInRight">
                    <div class="tab-content">
                        <div class="table-content">
                            <?php
                            unset($i);
                            $i = 0;
                            foreach($tab_contents as $tab_content) {
                                $active = $i==0 ? 'in active' : '';
                                $price  = str_split($tab_content['price']);
                                $dot    = isset($price[3]) ? $price[3] : '';
                                $last1  = isset($price[4]) ? $price[4] : '';
                                $last2  = isset($price[5]) ? $price[5] : '';
                                $btn = vc_build_link($tab_content['btn']);
                                ?>
                                <div id="<?php echo aprimo_get_words_slug($tab_content['name']); ?>" class="tab-pane price-table <?php echo $active; ?>">
                                    <div class="col-inner">
                                        <h6> <?php echo $tab_content['title']; ?> </h6>
                                        <p><?php echo $tab_content['name']; ?></p>
                                        <strong><?php echo $price[0].$price[1].$price[2]; ?><sup><?php echo $dot.$last1.$last2; ?></sup></strong>
                                        <?php echo $tab_content['tab_content']; ?>
                                        <a href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target'] ?>" class="tran3s theme-button"><span></span> <?php echo $btn['title']; ?> </a>
                                    </div>
                                </div>
                                <?php
                                $i++;
                            }
                            ?>
                        </div> <!-- /.table-content -->
                    </div> <!-- /.tab-content -->
                </div>
            </div> <!-- /.row -->
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
                'name'              => esc_html__('Pricing Tabs', 'aprimo-core'),
                'description'       => esc_html__('Create & display pricing. Full width Section', 'aprimo-core'),
                'base'              => 'faster_pricing',
                'category'          => esc_html__('Aprimo', 'aprimo-core'),
                'params'            => array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'title',
                        'heading' => esc_html__('Title', 'aprimo-core'),
                        'value' => 'Not any hidden charge, Choose you pricing plan'
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'small_title',
                        'heading' => esc_html__('Small title', 'aprimo-core'),
                        'value' => 'OUR PRICING',
                        'holder' => 'h2'
                    ),
                    array(
                        'type' => 'textarea',
                        'param_name' => 'desc',
                        'heading' => esc_html__('Description', 'aprimo-core'),
                        'value' => 'We have differe type of pricing table to choose with your need with resonable price.',
                    ),
                    array(
                        'type' => 'param_group',
                        'value' => '',
                        'param_name' => 'tab_items',
                        'heading' => esc_html__('Tab items', 'aprimo-core'),
                        'params' => array(
                            array(
                                'type' => 'textfield',
                                'param_name' => 'name',
                                'heading' => esc_html__('Tab Name', 'aprimo-core'),
                                'value' => 'Monthly'
                            ),
                        )
                    ),
                    array(
                        'type' => 'param_group',
                        'value' => '',
                        'param_name' => 'content',
                        'heading' => esc_html__('Tab Contents', 'aprimo-core'),
                        'params' => array(
                            array(
                                'type' => 'textfield',
                                'param_name' => 'name',
                                'heading' => esc_html__('Tab Name', 'aprimo-core'),
                                'value' => 'Monthly'
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title',
                                'heading' => esc_html__('Tab Title', 'aprimo-core'),
                                'value' => 'business'
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'price',
                                'heading' => esc_html__('Plan price', 'aprimo-core'),
                                'value' => '$96.99'
                            ),
                            array(
                                'type' => 'vc_link',
                                'param_name' => 'btn',
                                'heading' => esc_html__('Button', 'aprimo-core'),
                            ),
                            array(
                                'type' => 'textarea',
                                'param_name' => 'tab_content',
                                'heading' => esc_html__('Tab Content', 'aprimo-core'),
                                'description' => esc_html__('Put some contents about the plan. (HTML Supported).', 'aprimo-core'),
                            ),
                        )
                    )
                ),
            )
        );

    }
});
