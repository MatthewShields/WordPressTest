<?php
get_header(); 
?>

<main class="main" role="main">
	
	<div class="section">
		<div class="">
			<div class="post-list container">
				<?php 
				$post_count = 0;
				$totalPosts = $wp_query->post_count; 
				while (have_posts()) : the_post(); $post_count++; ?>

					<?php
					load_module('post-card', array(
						'image' => get_the_post_thumbnail_url(get_the_ID()),
						'meta' => get_the_date(),
						'category' => 'Test Category',
						'title' => get_the_title(),
						'link' => get_permalink(),
						'content' => wpautop(get_the_excerpt())
					));
					?>

				<?php endwhile; ?>
			</div>
			<?php if($post_count == $totalPosts) : ?>
				<div class="static-nav-container">
					<?php custom_pagination(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
