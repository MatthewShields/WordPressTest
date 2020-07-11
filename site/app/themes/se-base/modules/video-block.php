<?php
$title = (array_key_exists('title', $data)) ? $data['title'] : false;
$description = (array_key_exists('description', $data)) ? $data['description'] : false;
$video_id = (array_key_exists('video_id', $data)) ? $data['video_id'] : false;

$title_class = '';
?>

<div class="section">
    <div class="video-block">
        <div class="video-block__inner">
            <div class="video-block__content">
                <?php echo ($title_text) ? '<h2 class="section-title">'.$title_text.'</h2>' : ''; ?>
                <?php echo ($description) ? $description : ''; ?>
                <div class="video-block__video">
                    <?php if($video_id) : ?>
                        <script src="//fast.wistia.com/embed/medias/<?php echo $video_id; ?>.jsonp" async></script>
                        <script src="//fast.wistia.com/assets/external/E-v1.js" async></script>
                        <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                        <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                        <div class="wistia_embed wistia_async_<?php echo $video_id; ?> seo=false videoFoam=true" style="height:100%;width:100%">&nbsp;</div></div></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>