<?php get_header(); ?>

<main class="main" role="main">
    <section class="section">
        <div class="container">
            <div class="col col-xs-1-1">
                <?php get_search_form(); ?>
                <hr>
            </div>
        </div>
        <?php if(have_posts()) : ?>
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
        <?php elseif(get_search_query() !== '') : ?>
            <?php
            load_module('one-column-text', array(
                'title' => 'No results found',
                'block_style' => 'default',
                'content' => false
            ));
            ?>
        <?php endif; ?>
        </section>
</main>

<?php get_footer(); ?>
