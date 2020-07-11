<?php if (have_rows('page_content_loop')) : ?>
  <?php
  $block_count = 0;
  while (have_rows('page_content_loop')) : $block_count++; the_row();
  ?>

    <?php if (get_row_layout() == 'slider') : ?>

		<?php
		load_module('slider', array(
			'slides' => get_sub_field('slides')
		));
		?>

	<?php elseif (get_row_layout() == 'post_list') : ?>

		<?php
		load_module('post-list', array(
			'post_list_title' => get_sub_field('post_list_title'),
			'post_list_type' => get_sub_field('post_list_type'),
			'manual_post_list' => get_sub_field('manual_post_list'),
			'post_type_select' => get_sub_field('post_type_select'),
			'category_filter' => get_sub_field('category_filter'),
			'display_category_select' => get_sub_field('display_category_select'),
		));
		?>

	<?php elseif (get_row_layout() == 'two_column_text') : ?>

		<?php
		load_module('two-column-text', array(
			'title' => get_sub_field('section_title'),
			'description' => get_sub_field('section_description'),
			'block_style' => get_sub_field('block_style'),
			'left_column_title' => get_sub_field('left_column_title'),
			'left_content' => get_sub_field('left_content'),
			'right_column_title' => get_sub_field('right_column_title'),
			'right_content' => get_sub_field('right_content'),
			'background_image' => get_sub_field('background_image')
		));
		?>

	<?php elseif (get_row_layout() == 'one_column_text') : ?>

		<?php
		load_module('one-column-text', array(
			'title' => get_sub_field('section_title'),
			'description' => get_sub_field('section_description'),
			'block_style' => get_sub_field('block_style'),
			'content' => get_sub_field('content'),
			'background_image' => get_sub_field('background_image')
		));
		?>

	<?php elseif (get_row_layout() == 'divider') : ?>

		<hr>

	<?php elseif (get_row_layout() == 'text_blocks') : ?>

		<?php
		load_module('text-blocks', array(
			'title' => get_sub_field('title'),
			'title_red' => get_sub_field('title_red'),
			'description' => get_sub_field('description'),
			'blocks' => get_sub_field('blocks')
		));
		?>

	<?php elseif (get_row_layout() == 'wistia_video') : ?>

		<?php
		load_module('video-block', array(
			'title' => get_sub_field('title'),
			'title_red' => get_sub_field('title_red'),
			'description' => get_sub_field('description'),
			'video_id' => get_sub_field('wistia_video_id')
		));
		?>

	<?php elseif (get_row_layout() == 'accordion') : ?>

		<?php
		load_module('accordion', [
      'block_id' => $block_count,
			'title' => get_sub_field('title'),
			'description' => get_sub_field('description'),
			'accordion' => get_sub_field('accordion'),
			'open_first_accordion' => get_sub_field('open_first_accordion')
		]);
		?>

	<?php endif; ?>

  <?php endwhile; ?>


<?php endif; ?>