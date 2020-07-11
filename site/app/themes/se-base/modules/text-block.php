<?php
$title = (array_key_exists('title', $data)) ? $data['title'] : false;
$content = (array_key_exists('content', $data)) ? $data['content'] : false;
?>

<div class="text-block">
    <?php echo ($title) ? '<h3 class="text-block__title">'.$title.'</h3>' : ''; ?>
    <div class="text-block__inner">
        <?php echo ($content) ? $content : ''; ?>
    </div>
</div>