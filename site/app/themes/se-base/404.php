<?php 
get_header();
?>

<main class="main container" role="main" id="main-content">
    <div class="section col col-xs-1-1">
        <div class="main-content">
            <?php echo get_field('404_text', 'option'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>