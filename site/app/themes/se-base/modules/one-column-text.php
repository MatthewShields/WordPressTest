<?php

enqueue_component_styles('two-column-text');

$block_style = (array_key_exists('block_style', $data)) ? $data['block_style'] : false;

$class_list = '';

if($block_style == 'border') {
    $class_list = 'two-column-block--border';
}
elseif($block_style == 'bg-image') {
    $class_list = 'two-column-block--border';
}

$title = (array_key_exists('title', $data)) ? $data['title'] : false;
$description = (array_key_exists('content', $data)) ? $data['description'] : false;
$content = (array_key_exists('content', $data)) ? $data['content'] : false;
$background_image = (array_key_exists('background_image', $data)) ? $data['background_image'] : false;

$title_class = '';
?>

<div class="section standalone-text-block">
    <?php if($background_image) : ?>
        <span class="two-column-block__background" style="background-image: url(<?php echo $background_image; ?>)"></span>
    <?php endif; ?>
    <div class="two-column-block <?php echo $class_list; ?>">
        <div class="two-column-block__inner">
            <div class="notch"></div>
            <div class="two-column-block__content">
                <header class="section__header">
                    <?php echo ($title) ? '<h2 class="section-title '.$title_class.'">'.$title.'</h2>' : ''; ?>
                    <?php echo ($description) ? $description : ''; ?>
                </header>
                <div class="one-column">
                    <?php if($content) : ?>
                        <div class="single-col">
                            <?php echo $content; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>