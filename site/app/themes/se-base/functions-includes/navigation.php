<?php

////////////////////////////////////////
// PAGINATION FUNCTIONS
////////////////////////////////////////

/**
 * Remove /page/1/ from the first page link created by Wordpress
 * SEO Recommendation to avoid abundance of redirects detected
 */
add_filter( 'paginate_links', function( $link ) {
    return str_replace("/page/1/", "/", $link);
});



function custom_pagination($pages = '', $range = 2, $query = false) {  
	$showitems = ($range * 2)+1;  

	global $paged;
	if(empty($paged)) $paged = 1;

	if($query == false) {
		global $wp_query;
		$query = $wp_query;
	}

	if($pages == '') {
		$pages = $query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}   

	if(1 != $pages) {
		echo "<div class='loop-pagination'>";

			echo "<div class='loop-pagination--button'>";
				if($paged > 1) { 
						echo "<a href='".get_pagenum_link($paged - 1)."' data-page='" . ($paged - 1) . "' class='btn'>Previous</a>";
				} else {
					echo '&nbsp;';
				}
			echo "</div>";

			echo "<div class='loop-pagination--numbers'>";
			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' data-page='" . ($i) . "' class='inactive' >".$i."</a>";
				}
			}
			echo "</div>";

			echo "<div class='loop-pagination--button'>";
				if($paged < $pages) { 
					echo "<a href='".get_pagenum_link($paged + 1)."' data-page='" . ($paged - 1) . "' class='btn'>Next</a>";
				} else {
					echo '&nbsp;';
				}
			echo "</div>";
		
		echo "</div>\n";
	}
}