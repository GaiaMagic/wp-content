<div id='calendar' class="box">
	<ol>
	<?php
		global $wpdb;
		$limit = 0;
		$year_prev = null;
		$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month, YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
		foreach($months as $month) :
			$year_current = $month->year;
			if ($year_current != $year_prev) {
				if ($year_prev != null){?>
				<?php } ?>
					<div class="clearfix"></div>

					<li><a class="year" href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/"><?php echo $month->year; ?></a></li>

					<div class="clearfix"></div>

					<hr>
				<?php } ?>
        				<li><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>"><?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?></a></li>
				<?php $year_prev = $year_current;
					if(++$limit >= 18) { break; }
				endforeach; ?>
		<div class='clearfix'></div>
	</ol>
</div>