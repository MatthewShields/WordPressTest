<?php
$title = (array_key_exists('title', $data)) ? $data['title'] : false;
$description = (array_key_exists('description', $data)) ? $data['description'] : false;
$blocks = (array_key_exists('blocks', $data)) ? $data['blocks'] : array();

$title_class = '';
?>

<div class="section">
    <div class="text-blocks">
        <header class="section__header">
            <?php echo ($title) ? '<h2 class="section-title '.$title_class.'">'.$title.'</h2>' : ''; ?>
            <?php echo ($description) ? $description : ''; ?>
        </header>
        <div class="text-blocks__list">
            <?php
            foreach ($blocks as $block) {
                load_module('text-block', array(
                    'title' => $block['title'],
                    'content' => $block['content']
                ));
            }
            ?>
        </div>
    </div>
</div>