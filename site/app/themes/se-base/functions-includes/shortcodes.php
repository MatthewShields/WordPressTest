<?php

////////////////////////////////////////
// SITEMAP FUNCTIONS
////////////////////////////////////////

/**
 * List Page Sitemap
 * Output a <ul> list of all pages in Wordpress
 *
 * @return string
 */
function seed_sc_sitemap() {
    return '<ul>' . wp_list_pages( array( 'title_li' => '', 'echo' => 0 ) ) . '</ul>';
}
add_shortcode( 'sitemap', 'seed_sc_sitemap' );







////////////////////////////////////////
// PAGE SHORTCODES
////////////////////////////////////////

/**
 * List Sub-page Sitemap
 * Output a <ul> list of all child-pages of current page in Wordpress
 *
 * @return string
 */

function wpb_list_child_pages() {
	global $post;

	$childpages = wp_list_pages( 'sort_column=post_title&title_li=&depth=1&child_of=' . $post->ID . '&echo=0' );

	if (!$childpages && is_page() && $post->post_parent )
		$childpages = wp_list_pages( 'sort_column=post_title&title_li=&depth=1&child_of=' . $post->post_parent . '&echo=0' );

	if ( $childpages ) {
		$string = '<ul class="child-pages">' . $childpages . '</ul>';
	}

	return $string;
}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');






////////////////////////////////////////
// TEST SHORTCODE
////////////////////////////////////////

/**
 * Test styling content including various HTML elements
 *
 * @return string
 */
function seed_sc_htmltest() {
	return '
	<h1>Header One</h1>

	<p>Lorem ipsum <em>emphasised text</em> dolor sit amet, <strong>strong text</strong> consectetur adipisicing elit, <abbr title="">abbreviated text</abbr> sed do eiusmod tempor <acronym title="">acronym text</acronym> incididunt ut labore et dolore magna aliqua. Ut <q>quoted text</q> enim ad minim veniam, quis nostrud exercitation <a href="/">link text</a> ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute <del>deleted text</del> <ins>inserted text</ins> irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat <code>code text</code> cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	<blockquote>
	<p>Blockquote. Velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
	</blockquote>

	<h2>Header 2</h2>

	<p>Extended paragraph. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	<ol>
	<li>Ordered list</li>
	<li>Item 2 Consectetur adipisicing elit</li>
	<li>Item 3 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</li>
	<li>Item 4</li>
	<li>Item 5</li>
	</ol>

	<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	<h3>Header 3</h3>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

	<ul>
	<li>Unordered list</li>
	<li>Consectetur adipisicing elit</li>
	<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</li>
	<li>Item</li>
	<li>Item</li>
	<li>Item</li>
	</ul>

	<p>Lorem ipsum dolor sit amet,consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

	<pre><code>pre and code pair {
    margin: $sp-unit 0;
    padding: $sp-unit;
    background: $bg-alt;
    overflow-x: auto;
}</code></pre>

	<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<iframe width="560" height="315" src="https://www.youtube.com/embed/TnzFRV1LwIo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At culpa nulla veritatis beatae ullam quas repellendus praesentium corporis deserunt ab porro alias debitis voluptatum, dignissimos adipisci, dolor laborum minus hic!</p>

	<h4>Header 4</h4>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

	<dl>
	<dt>Definition list</dt>
	<dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
	commodo consequat.</dd>
	<dt>Lorem ipsum dolor sit amet</dt>
	<dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</dd>
	<dt>Lorem ipsum dolor sit amet</dt>
	<dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</dd>
	<dt>Lorem ipsum dolor sit amet</dt>
	<dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</dd>
	</dl>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

	<table summary="Table summary">
		<thead>
			<tr>
				<th>Header</th><th>Header</th><th>Header</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Content</td><td>1</td><td>a</td>
			</tr>
			<tr>
				<td>Content</td><td>2</td><td>b</td>
			</tr>
			<tr>
				<td>Content</td><td>3</td><td>c</td>
			</tr>
			<tr>
				<td>Content</td><td>4</td><td>d</td>
			</tr>
			<tr>
				<td>Content</td><td>5</td><td>e</td>
			</tr>
			<tr>
				<td>Content</td><td>6</td><td>f</td>
			</tr>
		</tbody>
	</table>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At culpa nulla veritatis beatae ullam quas repellendus praesentium corporis deserunt ab porro alias debitis voluptatum, dignissimos adipisci, dolor laborum minus hic!</p>

	<table summary="Table summary">
		<thead>
			<tr>
				<th>Header</th><th>Header</th><th>Header</th><th>Header</th><th>Header</th><th>Header</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Wide Content</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
			</tr>
			<tr>
				<td>Wide Content</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
			</tr>
			<tr>
				<td>Wide Content</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
			</tr>
			<tr>
				<td>Wide Content</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td><td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
			</tr>
		</tbody>
	</table>';
	
}
add_shortcode( 'htmlelements', 'seed_sc_htmltest' );