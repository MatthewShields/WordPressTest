<?php
$block_style = (array_key_exists('block_style', $data)) ? $data['block_style'] : false;

$class_list = '';

if($block_style == 'border') {
    $class_list = 'two-column-block--border';
}
elseif($block_style == 'bg-image') {
    $class_list = 'two-column-block--border';
}

$title = (array_key_exists('title', $data)) ? $data['title'] : false;
$description = (array_key_exists('description', $data)) ? $data['description'] : false;
$left_column_title = (array_key_exists('left_column_title', $data)) ? $data['left_column_title'] : false;
$left_content = (array_key_exists('left_content', $data)) ? $data['left_content'] : false;
$right_column_title = (array_key_exists('right_column_title', $data)) ? $data['right_column_title'] : false;
$right_content = (array_key_exists('right_content', $data)) ? $data['right_content'] : false;
$background_image = (array_key_exists('background_image', $data)) ? $data['background_image'] : false;

$title_class = '';
?>

<div class="section">
    <?php if($background_image) : ?>
        <span class="two-column-block__background" style="background-image: url(<?php echo $background_image; ?>)"></span>
    <?php endif; ?>
    <div class="two-column-block <?php echo $class_list; ?>">
        <div class="two-column-block__inner">
            <div class="two-column-block__content">
                <header class="section__header">
                    <?php echo ($title) ? '<h2 class="two-column-block__title section-title '.$title_class.'">'.$title.'</h2>' : ''; ?>
                    <?php echo ($description) ? $description : ''; ?>
                </header>
                <div class="two-column">
                    <?php if($left_content) : ?>
                        <div class="single-col">
                            <?php echo ($left_column_title) ? '<h3>'.$left_column_title.'</h3>' : ''; ?>
                            <?php echo $left_content; ?>
                        </div>
                    <?php endif; ?>
                    <?php if($right_content) : ?>
                        <div class="single-col">
                            <?php echo ($right_column_title) ? '<h3>'.$right_column_title.'</h3>' : ''; ?>
                            <?php echo $right_content; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>