<?php
////////////////////////////////////////
// SLIDER 
////////////////////////////////////////

/**
 * Variable             Default             Comment

 * $slides              false               If no slides present don't continue
 * 
 * 
 * 
 * Slide array possible values:
 * 
 * Key                  Default             Comment
 * 
 * title                false
 * excerpt              false
 * link                 false
 * link_text            'Find out more'     
 * active               false
 * image                false
 * slide_num            0
 * has_excerpt          false
 * htag                 'h2'
 * display_bc           false               Display Yoast breadcrumbs
 */

$slides = (array_key_exists('slides', $data)) ? $data['slides'] : array();
?>

<?php if($slides) : ?>
    <div class="section slider-block">
        <div class="slider-block__content">
            <?php
            foreach ($slides as $count => $slide) {
                load_module('slide', array(
                    'title' => $slide['slide_title'],
                    'excerpt' => wpautop($slide['slide_text']),
                    'link' => $slide['link'],
                    'link_text' => $slide['link_text'],
                    'active' => ($count == 0) ? true : false,
                    'image' => $slide['image'],
                    'slide_num' => $count,
                    'has_excerpt' => ($slide['slide_text']) ? false : true
                ));
            }
            ?>
        </div>
        <div class="slider-block__nav">
            <div class="two-column">
                <div class="single-col">&nbsp;</div>
                <div class="single-col">
                    <div class="slider-block__controls"></div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

