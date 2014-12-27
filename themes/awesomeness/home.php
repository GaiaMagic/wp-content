<?php get_header(); ?>

<div id="banners" class="clearfix">
	<div id="slideshow" class="banner">
		<ul class="images">
			<?php if ( function_exists( 'ot_get_option' ) ) {
				$slideshow = ot_get_option( 'slideshow', array() );

				if ( ! empty( $slideshow ) ) {
					foreach( $slideshow as $slide ) {
						echo '
							<li>
								<a href="' . $slide['link'] . '"><img src="' . $slide['image'] . '" alt="' . $slide['title'] . '" /></a>
								<p class="title">'. $slide['title'] .'</p>
							</li>
						';
					}
				}
			} ?>
		</ul>

		<div class="slidetabs">
			<?php if ( function_exists( 'ot_get_option' ) ) {
				$slideshow = ot_get_option( 'slideshow', array() );

				if ( ! empty( $slideshow ) ) {
					foreach( $slideshow as $slide ) {
						echo '
							<a href="#"></a>
						';
					}
				}
			} ?>
		</div>
	</div>

	<div id="banner" class="banner">
		<?php if ( function_exists( 'ot_get_option' ) ) {
			$banner_link = ot_get_option( 'banner_link' );
			$banner_image = ot_get_option( 'banner_image' );
			echo '
				<a href="'. $banner_link .'"><img src="'. $banner_image .'"></a>
			';
		} ?>
	</div>

	<?php include (TEMPLATEPATH . '/includes/quicklinks.php') ?>
</div>

<div id="featured" class="tabs-wrapper">
	<?php get_search_form(); ?>

	<ul class="tabs clearfix">
		<li>
			<a href="#newest" class="box">最新文章</a>
		</li>
		<li>
			<a href="#monthly-most-commented">本月热评</a>
		</li>
		<li>
			<a href="#most-visited">最多浏览</a>
		</li>
	</ul>

	<ul id="newest" class="box tab-item">
		<?php 
			query_posts( array( 'posts_per_page' => '10', 'paged'  => get_query_var('paged'), 'ignore_sticky_posts' => 1 ) );
			while ( have_posts() ) : the_post();
		?>

		<li <?php post_class('clearfix') ?>>
			<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank">
				<?php echo mb_strimwidth(get_the_title(), 0, 40, '...'); ?>
			</a>
			<a href="<?php the_author_url() ?>" title="<?php the_author() ?>" class="author">by <?php the_author() ?></a>
		</li>

		<?php endwhile; wp_reset_query(); ?>
	</ul>

	<ul id="monthly-most-commented" class="box tab-item">
		<?php 
			function filter_where( $where = '' ) {
				// posts in the last 30 days
				$where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
				return $where;
			}

			add_filter( 'posts_where', 'filter_where' );
			query_posts( array( 
				'posts_per_page' => '10',
				'paged'  => get_query_var('paged'),
				'ignore_sticky_posts' => 1,
				'orderby' => 'comment_count'
			) );
			remove_filter( 'posts_where', 'filter_where' );
			while ( have_posts() ) : the_post();
		?>

		<li <?php post_class('clearfix') ?>>
			<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank">
				<?php echo mb_strimwidth(get_the_title(), 0, 40, '...'); ?>
			</a>
			<a href="<?php the_author_url() ?>" title="<?php the_author() ?>" class="author">by <?php the_author() ?></a>
		</li>

		<?php endwhile; wp_reset_query(); ?>
	</ul>

	<ul id="most-visited" class="box tab-item">
		<?php 
			query_posts( array(
				'posts_per_page' => '10',
				'paged'  => get_query_var('paged'),
				'ignore_sticky_posts' => 1,
				'orderby' => 'meta_value',
				'meta_key' => 'views'
				) );
			while ( have_posts() ) : the_post();
		?>

		<li <?php post_class('clearfix') ?>>
			<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank">
				<?php echo mb_strimwidth(get_the_title(), 0, 40, '...'); ?>
			</a>
			<a href="<?php the_author_url() ?>" title="<?php the_author() ?>" class="author">by <?php the_author() ?></a>
		</li>

		<?php endwhile; wp_reset_query(); ?>
	</ul>
</div>

<div id="articles">
	<div id="posts" class="tab-item clearfix">
		<?php 
			$loop = 1;
			while ( have_posts() ) : the_post();
			$each = ot_get_option( 'ads_each' );
			$ads = ot_get_option( 'ads', array() );
			$ads_count = count($ads);
			$multiple = $loop % $each; ?>
		
		<?php 
			include (TEMPLATEPATH . '/includes/post-box.php' );
			if (is_home() && !is_paged()) {
			if (!$multiple && ($loop <= ($each * $ads_count))) {
				$number = $loop / $each - 1;
				echo '
					<article class="ad post box"><a href="'. $ads[$number]['link'] .'"><img src="'. $ads[$number]['image'] .'"></a></article>
				';
			}} ?>

		<?php $loop++; endwhile; ?>
	</div>

	<div id="loading"></div>
	<!--<?php next_posts_link(); ?>-->
</div>

<div class="pagination"><?php wp_pagenavi() ?></div>

<?php get_footer() ?>