<?php get_header() ?>
	<?php if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>

	<div id="articles">
		<div id="posts">
			<?php while ( have_posts() ) : the_post(); ?>
			<?php include (TEMPLATEPATH . '/includes/post-box.php' ) ?>
			<?php endwhile ?>
		</div>

		<div id="loading"></div>

		<div class="pagination"><?php wp_pagenavi() ?></div>
	</div>
<?php get_footer() ?>