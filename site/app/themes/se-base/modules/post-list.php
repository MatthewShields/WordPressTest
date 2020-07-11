<?php
$pp_row = (array_key_exists('pp_row', $data)) ? $data['pp_row'] : 3;
$post_list_title = (array_key_exists('post_list_title', $data)) ? $data['post_list_title'] : false;
$post_list_type = (array_key_exists('post_list_type', $data)) ? $data['post_list_type'] : false;
$manual_post_list = (array_key_exists('manual_post_list', $data)) ? $data['manual_post_list'] : false;
$post_type_select = (array_key_exists('post_type_select', $data)) ? $data['post_type_select'] : false;
$category_filter = (array_key_exists('category_filter', $data)) ? $data['category_filter'] : false;
$display_category_select = (array_key_exists('display_category_select', $data)) ? $data['display_category_select'] : false;
?>

<?php if($post_list_type === 'manual') : ?>

        <?php if(count($manual_post_list) > 0) : ?>
            <div class="section post-list__section">
                <div class="post-list__header">
                    <?php echo ($post_list_title) ? '<h2 class="post-list__title">'.$post_list_title.'</h2>' : ''; ?>
                </div>
                <div class="post-list" pp-row="<?php echo $pp_row; ?>">
                    <?php 
                    foreach ($manual_post_list as $key => $post) {
                        $post = $post['post'];
                        load_module('post-card', array(
                            'image' => get_the_post_thumbnail_url($post->ID, 'post-thumb'),
                            'meta' => get_the_date(DATE_FORMAT, $post->ID),
                            'category' => get_post_cat_name($post->ID),
                            'title' => $post->post_title,
                            'link' => get_permalink($post->ID),
                            'content' => wpautop($post->post_excerpt)
                        ));
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>

<?php elseif($post_list_type === 'feed') : ?>


    <?php
    $args = array(
        'post_type' => $post_type_select,
        'posts_per_page' => POSTS_PER_PAGE
    );

    if($category_filter) {
        $args['cat'] = $category_filter;
    }
    
    $feed_query = new WP_Query( $args );
    $posts = $feed_query->posts;
    ?>

    <?php if(count($posts) > 0) : ?>
    
        <div class="section post-list__section <?php echo($display_category_select) ? 'post-list__section--filterable' : ''; ?>" data-post-type="<?php echo $post_type_select; ?>" data-cat="<?php echo $category_filter; ?>">

            <div class="post-list__header">
                <?php echo ($post_list_title) ? '<h2 class="post-list__title">'.$post_list_title.'</h2>' : ''; ?>

                <?php if($display_category_select) : ?>
                    <nav class="filter-list">
                        Filter: 
                        <a href="#" class="filter-list__selected">
                            <?php
                            if($category_filter) {
                                $cat_name = get_cat_name($category_filter);
                                if($cat_name === 'Uncategorized') {
                                    $cat_name = 'Show all';
                                }
                            } else {
                                $cat_name = 'Show all';
                            }
                            echo $cat_name;
                            ?>
                        </a>
                        <ul class="filter-list__list">
                            <?php
                            wp_list_categories_for_post_type($post_type_select, array(
                                'title_li' => ''
                            ));
                            ?>
                            <li class=""><a href="#">Show all</a></li>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>

            <div class="post-list" pp-row="<?php echo $pp_row; ?>">
                <?php
                foreach ($posts as $key => $post) {
                    load_module('post-card', array(
                        'image' => get_the_post_thumbnail_url($post->ID, 'post-thumb'),
                        'meta' => get_the_date(DATE_FORMAT, $post->ID),
                        'category' => get_post_cat_name($post->ID),
                        'title' => $post->post_title,
                        'link' => get_permalink($post->ID),
                        'content' => wpautop($post->post_excerpt)
                    ));
                }
                ?>
            </div>

            <?php if($feed_query->max_num_pages > 1) : ?>
                <div class="post-list__footer">
                    <a href="javascript:void(0)" class="btn post-list__load">Load More</a>
                </div>
            <?php endif; ?>
        </div>
    
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>