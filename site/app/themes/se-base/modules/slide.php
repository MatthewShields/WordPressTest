<?php
////////////////////////////////////////
// SLIDE 
////////////////////////////////////////

/**
 * Variable         Default             Comment
 * 
 * $title           false               Dont include if not provided
 * $excerpt         false               Dont include if not provided
 * $active          false               No active class added unless true
 * $link            false               No link added if not provided
 * $link_text       'Find out more'     If custom link not added fall back to 'Find out more'
 * $image           false               Don't include if not provided
 * $slide_num       0                   Use to target slide from nav
 * $has_excerpt     false               Use to customise if no excerpt provided (optional)
 * $htag            h2                  Overwrite htag if neccessary
 * $display_bc      false               If breadcrumbs are to be displayed (e.g. hero slider)
 */

$title = (array_key_exists('title', $data)) ? $data['title'] : false;
$excerpt = (array_key_exists('excerpt', $data)) ? $data['excerpt'] : false;
$active = (array_key_exists('active', $data)) ? $data['active'] : false;
$link = (array_key_exists('link', $data)) ? $data['link'] : false;
$link_text = (array_key_exists('link_text', $data)) ? $data['link_text'] : 'Find out more';
$image = (array_key_exists('image', $data)) ? $data['image'] : false;
$slide_num = (array_key_exists('slide_num', $data)) ? $data['slide_num'] : 0;
$has_excerpt = (array_key_exists('has_excerpt', $data)) ? $data['has_excerpt'] : false;
$htag = (array_key_exists('htag', $data)) ? $data['htag'] : 'h2';
$display_bc = (array_key_exists('display_bc', $data)) ? $data['display_bc'] : false;
?>

<div class="slider-block__single <?php echo ($active) ? 'slider-block__single--active' : ''; ?>" <?php echo ($slide_num !== false) ? 'data-slide="'.$slide_num.'"' : ''; ?>>
    <div class="two-column-block">
        <div class="slider-block__columns two-column">
            <div class="single-col slider-block__text">
                
                <?php if($display_bc) : ?>
                    <?php if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<div class="breadcrumb">','</div>');
                    } ?>
                <?php endif; ?>
                
                <?php if($title) : ?>
                    <<?php echo $htag; ?> class="slider-block__title"><?php echo $title; ?></<?php echo $htag; ?>>
                <?php endif; ?>

                <?php echo ($excerpt) ? $excerpt : ''; ?>

                <?php if($link && $link_text) : ?>
                    <a href="<?php echo $link; ?>" class="btn"><?php echo $link_text; ?></a>
                <?php endif; ?>
            </div>

            <?php if($image) : ?>
                <div class="single-col slider-block__image">
                    <div class="image-block image-block--right">
                        <img src="<?php echo $image; ?>" alt="">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>