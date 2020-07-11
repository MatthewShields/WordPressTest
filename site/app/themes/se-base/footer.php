			<footer id="footer" class="footer" role="contentinfo">
				<!-- <div class="container">
					<div class="footer__section footer__top">
						<div class="footer__logo">
						<?php if(get_field('footer_logo', 'options'))
								$footerLogo = get_field('footer_logo', 'options')['url'];
							else
								$footerLogo = get_template_directory_uri().'/assets/images/brand-logo-white.svg'; ?>
							<img src="<?=$footerLogo?>" alt="">
						</div>
						<div class="footer__menu">
							<?php if(has_nav_menu('footer-nav')) wp_nav_menu(['theme_location' => 'footer-nav', 'menu_class' => 'nav-sec']); ?>
						</div>
					</div>
				</div> -->
				<div class="container">
					<div class="col col-xs-1-1 col-md-1-6">
						<div class="brand">
							<?php
							$logoURL = get_field('footer_logo', 'options');
							$logoURL = $logoURL ? $logoURL : get_template_directory_uri().'/assets/images/brand-logo.svg'; ?>
							<a href="<?=home_url()?>" class="brand__logo">
								<img src="<?=$logoURL?>" alt="">
							</a>
						</div>
					</div>
					<nav role="navigation" class="footer__nav col col-xs-1-1 col-md-5-6">
							<?php if(has_nav_menu('footer-nav')) wp_nav_menu(['theme_location' => 'footer-nav', 'menu_class' => 'nav-sec']); ?>
					</nav>
				</div>
			</footer>
		</div>
        <div id="mobile-test"></div>
    <?php output_enqueued_component_styles(); ?>
    <?php output_enqueued_component_scripts(); ?>

    <?php

  global $enqued_scripts;
  var_dump($enqued_scripts); ?>
		<?php wp_footer(); ?>
        <script>
        WebFontConfig = {
            google: { families: ['Montserrat:400,500,700'] },
            active: function() {
                // menu();
            }
        };

        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
		</script>

	<?php // HAving issues with the cookie banner locally, so...
		if($_SERVER['HTTP_HOST'] != 'hiveu.localhost:8000') { ?>
			<?=get_field('cookie_consent_embed_code', 'options')?>
	<?php } ?>
	</body>
</html>