<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php 
    $standard_content = get_the_content();
    ?>

    <main class="main container" role="main" id="main-content">
        <div class="section col col-xs-1-1 col-md-2-3">
            <div class="main-content">
                <?php the_content(); ?>

                <?php if($references = get_field('references')) : ?>
                    <aside class="references">
                        <?php echo $references; ?>
                    </aside>
                <?php endif; ?>
            </div>
        </div>
        <aside class="section sidebar sidebar--fixed col col-md-1-4 push-md-1-12">
            <div class="sidebar__inner">
            <?php if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-posts' ); ?>
            <?php endif; ?>
            </div>
        </aside>
    </main>
<?php endwhile; ?>

<?php get_footer(); ?>