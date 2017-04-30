<?php
$onepress_counter_id       = get_theme_mod( 'onepress_counter_id', esc_html__('counter', 'onepress') );
$onepress_counter_disable  = get_theme_mod( 'onepress_counter_disable' ) == 1 ? true : false;
$onepress_counter_title    = get_theme_mod( 'onepress_counter_title', esc_html__('Our Numbers', 'onepress' ));
$onepress_counter_subtitle = get_theme_mod( 'onepress_counter_subtitle', esc_html__('Section subtitle', 'onepress' ));

// Get counter data
$boxes = onepress_get_section_counter_data();
if ( ! empty ( $boxes ) ) {
    ?>
<script type='text/javascript' src='/wp-content/themes/onepress/assets/js/Chart.min.js?ver=1.0.1'></script>
    <script>
                    Chart.defaults.global = {
                        // Boolean - Whether to animate the chart
                        animation: true,

                        // Number - Number of animation steps
                        animationSteps: 60,

                        // String - Animation easing effect
                        // Possible effects are:
                        // [easeInOutQuart, linear, easeOutBounce, easeInBack, easeInOutQuad,
                        //  easeOutQuart, easeOutQuad, easeInOutBounce, easeOutSine, easeInOutCubic,
                        //  easeInExpo, easeInOutBack, easeInCirc, easeInOutElastic, easeOutBack,
                        //  easeInQuad, easeInOutExpo, easeInQuart, easeOutQuint, easeInOutCirc,
                        //  easeInSine, easeOutExpo, easeOutCirc, easeOutCubic, easeInQuint,
                        //  easeInElastic, easeInOutSine, easeInOutQuint, easeInBounce,
                        //  easeOutElastic, easeInCubic]
                        animationEasing: "easeOutQuart",

                        // Boolean - If we should show the scale at all
                        showScale: true,

                        // Boolean - If we want to override with a hard coded scale
                        scaleOverride: false,

                        // ** Required if scaleOverride is true **
                        // Number - The number of steps in a hard coded scale
                        scaleSteps: null,
                        // Number - The value jump in the hard coded scale
                        scaleStepWidth: null,
                        // Number - The scale starting value
                        scaleStartValue: null,

                        // String - Colour of the scale line
                        scaleLineColor: "rgba(0,0,0,.1)",

                        // Number - Pixel width of the scale line
                        scaleLineWidth: 1,

                        // Boolean - Whether to show labels on the scale
                        scaleShowLabels: true,

                        // Interpolated JS string - can access value
                        scaleLabel: "<%=value%>",

                        // Boolean - Whether the scale should stick to integers, not floats even if drawing space is there
                        scaleIntegersOnly: true,

                        // Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                        scaleBeginAtZero: false,

                        // String - Scale label font declaration for the scale label
                        scaleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

                        // Number - Scale label font size in pixels
                        scaleFontSize: 12,

                        // String - Scale label font weight style
                        scaleFontStyle: "normal",

                        // String - Scale label font colour
                        scaleFontColor: "#666",

                        // Boolean - whether or not the chart should be responsive and resize when the browser does.
                        responsive: false,

                        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                        maintainAspectRatio: true,

                        // Boolean - Determines whether to draw tooltips on the canvas or not
                        showTooltips: true,

                        // Function - Determines whether to execute the customTooltips function instead of drawing the built in tooltips (See [Advanced - External Tooltips](#advanced-usage-custom-tooltips))
                        customTooltips: false,

                        // Array - Array of string names to attach tooltip events
                        tooltipEvents: ["mousemove", "touchstart", "touchmove"],

                        // String - Tooltip background colour
                        tooltipFillColor: "rgba(0,0,0,0.8)",

                        // String - Tooltip label font declaration for the scale label
                        tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

                        // Number - Tooltip label font size in pixels
                        tooltipFontSize: 14,

                        // String - Tooltip font weight style
                        tooltipFontStyle: "normal",

                        // String - Tooltip label font colour
                        tooltipFontColor: "#fff",

                        // String - Tooltip title font declaration for the scale label
                        tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

                        // Number - Tooltip title font size in pixels
                        tooltipTitleFontSize: 14,

                        // String - Tooltip title font weight style
                        tooltipTitleFontStyle: "bold",

                        // String - Tooltip title font colour
                        tooltipTitleFontColor: "#fff",

                        // Number - pixel width of padding around tooltip text
                        tooltipYPadding: 6,

                        // Number - pixel width of padding around tooltip text
                        tooltipXPadding: 6,

                        // Number - Size of the caret on the tooltip
                        tooltipCaretSize: 8,

                        // Number - Pixel radius of the tooltip border
                        tooltipCornerRadius: 6,

                        // Number - Pixel offset from point x to tooltip edge
                        tooltipXOffset: 10,

                        // String - Template string for single tooltips
                        //tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",

                        // String - Template string for multiple tooltips
                        multiTooltipTemplate: "<%= value %>",

                        // Function - Will fire on animation progression.
                        onAnimationProgress: function(){},

                        // Function - Will fire on animation completion.
                        onAnimationComplete: function(){}
                    };
                            var options = {
                                        //Boolean - Whether we should show a stroke on each segment
                                        segmentShowStroke : false,

                                        //String - The colour of each segment stroke
                                        segmentStrokeColor : "#fff",

                                        //Number - The width of each segment stroke
                                        segmentStrokeWidth : 2,

                                        //Number - The percentage of the chart that we cut out of the middle
                                        percentageInnerCutout : 80, // This is 0 for Pie charts

                                        //Number - Amount of animation steps
                                        animationSteps : 200,

                                        //String - Animation easing effect
                                        animationEasing : "easeOutBounce",

                                        //Boolean - Whether we animate the rotation of the Doughnut
                                        animateRotate : false,

                                        //Boolean - Whether we animate scaling the Doughnut from the centre
                                        animateScale : false

                                        //String - A legend template
                                        //legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

                                    };
                                                    var data = [
                                                        {
                                                            value: 0,
                                                            color: "#5aafe6",
                                                            highlight: "#5aafe6",
                                                            label: ""
                                                        },
                                                        {
                                                            value: 100,
                                                            color: "#ffcb00",
                                                            highlight: "#ffcb00",
                                                            label: ""
                                                        }
                                                    ];

                            function chartUpdate(myDoughnutChart, value){
                                                myDoughnutChart.segments[1].value = 100-value;
                                                myDoughnutChart.segments[0].value = value;
                                                myDoughnutChart.update();
                                            }


        </script>
    <?php if ($onepress_counter_disable != '1') : ?>
        <section id="<?php if ($onepress_counter_id != '') echo $onepress_counter_id; ?>" <?php do_action('onepress_section_atts', 'counter'); ?>
                 class="<?php echo esc_attr(apply_filters('onepress_section_class', 'section-counter onepage-section', 'counter')); ?>">
            <?php do_action('onepress_section_before_inner', 'counter'); ?>
            <div class="container">

                <div class="section-title-area">
                    <?php if ($onepress_counter_subtitle != '') echo '<h5 class="section-subtitle">' . esc_html($onepress_counter_subtitle) . '</h5>'; ?>
                    <?php if ($onepress_counter_title != '') echo '<h2 class="section-title">' . esc_html($onepress_counter_title) . '</h2>'; ?>
                    <?php if ( $desc = get_theme_mod( 'onepress_counter_desc' ) ) {
                        echo '<div class="section-desc">' . wp_kses_post( $desc ) . '</div>';
                    } ?>
                </div>

                <div class="row">
                    <?php
                    $col = 3;
                    $num_col = 4;
                    $n = count( $boxes );
                    if ( $n < 4 ) {
                        switch ($n) {
                            case 3:
                                $col = 4;
                                $num_col = 3;
                                break;
                            case 2:
                                $col = 6;
                                $num_col = 2;
                                break;
                            default:
                                $col = 12;
                                $num_col = 1;
                        }
                    }
                    $j = 0;
                    foreach ($boxes as $i => $box) {
                        $box = wp_parse_args($box,
                            array(
                                'title' => '',
                                'number' => '',
                                'unit_before' => '',
                                'unit_after' => '',
                            )
                        );

                        $class = 'col-sm-6 col-md-' . $col;
                        if ($j >= $num_col) {
                            $j = 1;
                            $class .= ' clearleft';
                        } else {
                            $j++;
                        }
                        ?>

                        <div class="<?php echo esc_attr($class); ?>">
                            <div class="counter_item" style="position:relative;">
                                <canvas id="myChart-<?php echo $j;?>" width="150" height="150"></canvas>
                                <div class="counter__number" style="width:100%;position:absolute;left:0px;top:50px;">
                                    <?php if ($box['unit_before']) { ?>
                                        <span class="n-b"><?php echo esc_html($box['unit_before']); ?></span>
                                    <?php } ?>
                                    <span class="n counter"><?php echo esc_html($box['number']); ?></span>
                                    <?php if ($box['unit_after']) { ?>
                                        <span class="n-a"><?php echo esc_html($box['unit_after']); ?></span>
                                    <?php } ?>
                                </div>
                                <div class="counter_title"><?php echo esc_html($box['title']); ?></div>
                            </div>
                        </div>
                        <script >
                            var ctx<?php echo $j;?> = document.getElementById("myChart-<?php echo $j;?>").getContext("2d");
                            var myDoughnutChart<?php echo $j;?> = new Chart(ctx<?php echo $j;?>).Doughnut(data,options);
                            setTimeout(function(){chartUpdate(myDoughnutChart<?php echo $j;?>, <?php echo esc_html($box['number']); ?>)}, 3000);

                        </script>

                        <?php
                    } // end foreach

                    ?>
                </div>
            </div>
            <?php do_action('onepress_section_after_inner', 'counter'); ?>
        </section>
    <?php endif;
}
