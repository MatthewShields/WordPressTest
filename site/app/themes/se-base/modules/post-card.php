<?php
////////////////////////////////////////
// SLIDE 
////////////////////////////////////////

/**
 * Variable         Default             Comment
 * 
 * $image           false               Dont include if not provided
 * $icon            false               Dont include if not provided
 * $meta            false               Any meta such as post date
 * $category        false               Dont include if not provided
 * $title           false               No link added if not provided
 * $link            'Find out more'     If custom link not added fall back to 'Find out more'
 * $content         false               Don't include if not provided
 */

$image = (array_key_exists('image', $data)) ? $data['image'] : false;
$icon = (array_key_exists('icon', $data)) ? $data['icon'] : false;
$meta = (array_key_exists('meta', $data)) ? $data['meta'] : false;
$category = (array_key_exists('category', $data)) ? $data['category'] : false;
$title = (array_key_exists('title', $data)) ? $data['title'] : false;
$link = (array_key_exists('link', $data)) ? $data['link'] : false;
$content = (array_key_exists('content', $data)) ? $data['content'] : false;
$style = (array_key_exists('style', $data)) ? $data['style'] : 'medium';

if($style === 'large') {
    $class_list = 'col col-xs-1-1 col-sm-1-2 col-xl-1-3';
}
elseif($style === 'medium') {
    $class_list = 'col col-xs-1-1 col-sm-1-2 col-lg-1-3 col-xl-1-4';
}
elseif($style === 'small') {
    $class_list = 'col col-xs-1-1 col-sm-1-3 col-lg-1-4 col-xl-1-6';
}
?>

<article class="post-card <?php echo $class_list; ?>">
    <div class="post-card__header">
        
        <?php echo ($image) ? '<img src="'.$image.'" alt="" class="post-card__image">' : ''; ?>

        <?php if($icon) : ?>
            <span class="post-card__icon-wrapper">
                <span class="post-card__icon" <?php echo 'style="background-image:url('.$icon.')"'; ?>></span>
            </span>
        <?php endif; ?>
    </div>
    <div class="post-card__inner">
    
        <?php echo ($category) ? '<header class="post-card__category"><p>'.$category.'</p></header>' : ''; ?>

        <?php if($title) : ?>
            <h3 class="post-card__title">
                <?php echo ($link) ? '<a href="'.$link.'" class="post-card__link">' : ''; ?>
                    <?php echo $title; ?>
                <?php echo ($link) ? '</a>' : ''; ?>
            </h3>
        <?php endif; ?>

        <?php echo ($content) ? $content : ''; ?>

        <div class="post-card__sharing">
            <ul class="post-card__socials">
                <?php
    
                ?>
                <li><a href="javascript:void(0)" class="share-icon share-icon--facebook">Share on XXXX</a></li>
                <li><a href="javascript:void(0)" class="share-icon share-icon--google-plus">Share on XXXX</a></li>
                <li><a href="javascript:void(0)" class="share-icon share-icon--linkedin">Share on XXXX</a></li>
                <li><a href="javascript:void(0)" class="share-icon share-icon--pinterest">Share on XXXX</a></li>
                <li><a href="javascript:void(0)" class="share-icon share-icon--twitter">Share on XXXX</a></li>
                <li><a href="javascript:void(0)" class="share-icon share-icon--whatsapp">Share on XXXX</a></li>
                <li><a href="javascript:void(0)" class="share-icon share-icon--mail">Share on XXXX</a></li>
            </ul> 
        </div>

        <?php echo ($meta) ? '<footer class="post-card__meta">'.$meta.'</footer>' : ''; ?>

    </div>
</article>