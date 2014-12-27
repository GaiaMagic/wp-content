<?php
/*
Plugin Name: Collapsible Categories Tree
Plugin URI: http://www.magki.com/blog/2009/01/wp-collapsible-cats-plugin.html
Description: 可折叠式分类树插件
Version: 0.4 Beta
Author: Magki
Author URI: http://www.magki.com
*/

function collapsible_list_cats($args = '') {
	global $wpdb;
		
	$defaults = array(
		'show_option_all' => '', 'orderby' => 'name', 
		'order' => 'ASC', 'show_count' => 0,
		'sum' => 0, 'shrink' => '1',
		'hide_empty' => 1, 'use_desc_for_title' => 1, 
		'child_of' => 0, 'feed' => '', 
		'feed_image' => '', 'exclude' => '', 
		'title_li' => __('Categories')
	);

	$r = wp_parse_args( $args, $defaults );

	extract( $r );

	$categories = get_categories($r);
	
	//初始化一些参数
	$sum = 0; //父分类的子分类总日志数
	$branch = 0;   //子分类循环标记
	$branch_num = 0;  //子分类循环次数
	$current_branch = 0; //子分类循环序号
	$cate_num = 0; //总分类数
	$cate_count =0; //分类计数
	$parent_num = 0; //父级分类数
	$parent = 0; //父级分类计数
	$current_parent = 0; //循环中有子分类的父级分类的序号
	$first_parent = true; //判断是否是第一个父级分类

	foreach ( $categories as $cate ){ //分离主分类和子分类
		if ($cate->parent == 0){
			$parent_arr[$cate->cat_ID]=$cate;
		}else{
			$branch_arr[$cate->parent][]=$cate;
		}
	}

	unset($categories);

	foreach ($parent_arr as $p_arr){ //将父分类子分类按层级关系重新合并，并获取父级分类数、总分类数、子分类循环次数
		$categories[] = $p_arr;
		$parent_num++;
		$branch = 0;
		$cate_num++;

		if(!empty($branch_arr[$p_arr->cat_ID])){
			$branch_num++;

			foreach ($branch_arr[$p_arr->cat_ID] as $b_arr){
				$categories[] = $b_arr;
				$cate_num++;
			}
		}
	}
	
	$branch = 0;  //清空计数
	
	$catTree = "<div id=\"cateTree\">\n";
	
	if (!empty($r['title_li'])){
		$catTree .= "\t<div class=\"tree_title\">".$r['title_li']."</div>\n";
	}
	
	if (!empty($r['show_option_all'])){
		$catTree .= "\t<div class=\"top_text\"><img src=\"".get_bloginfo('wpurl')."/wp-content/plugins/wp-collapsible-cats/images/empty.gif\" class=\"empty_img\" alt=\"".$r['show_option_all']."\" /> <a href=\"".get_bloginfo('url')."\">".$r['show_option_all']."</a></div>\n";
	}
	
	if ($r['shrink'] == 1){
		$classSTR = "";
		$displayTYPE = "none";
	}else{
		$classSTR = "_s";
		$displayTYPE = "block";
	}
	
	foreach ( $categories as $cate ){
		
		if ($cate->parent == 0){
			//如果是父分类
			if ($branch == 1){ //如果之前有子分类
				$catTree .= "\t</div>\n";
				$branch = 0;//标记子分类循环结束
			}
			
			$parent_id['parent'] = $cate->term_id; //查询是否有子分类
			$parent_cats = get_terms('category', $parent_id);
			
			$parent++; //父级分类位置加 1
			
			if (!empty($parent_cats)){
				//如果是有子分类的父级分类
				$current_parent++; //有子分类的父级分类序号加 1
				$div_id = " id=\"parent_".$current_parent."\""; //给有子分类的父分类的 DIV 添加 ID
				$button = "<a href=\"javascript:Show_Child(".$current_parent.")\" onfocus=\"blur()\" class=\"branch_link\" ><img src=\"".get_bloginfo('wpurl')."/wp-content/plugins/wp-collapsible-cats/images/empty.gif\" class=\"empty_img\" alt=\"点击展开/收缩子分类\" /></a> ";
				
				if (empty($first_parent)){  //如果不是第一个父级分类
					$div_class= " class=\"parent".$classSTR."\"";
				}else{
					$div_class = " class=\"parent_first".$classSTR."\"";
					$first_parent = false;
				}
				
				if ($parent == $parent_num){ //如果是最后一个父级分类
					$div_class = " class=\"parent_last".$classSTR."\"";
				}
				
				if ($r['show_count'] == 1 && $r['sum'] == 1){
					$query = "SELECT count FROM $wpdb->term_taxonomy WHERE parent = '$cate->term_id'";
					$counts = $wpdb->get_col($query);

					foreach ( $counts as $count ){
						$sum = $sum + $count;
					}
				}
				
			}else{
				//如果是没有子分类的父级分类
				if (empty($first_parent)){  //如果不是第一个父级分类
					$div_class= " class=\"no_parent\"";
				}else{
					$div_class = " class=\"no_parent_first\"";
					$first_parent = false;
				}
				
				if ($parent == $parent_num){ //如果是最后一个父级分类
					$div_class = " class=\"no_parent_last\"";
				}
				
				$button = "<img src=\"".get_bloginfo('wpurl')."/wp-content/plugins/wp-collapsible-cats/images/empty.gif\" class=\"empty_img\" alt=\"\" /> ";
			}
			
		}else{
			//如果是子分类
			$div_id = "";
			$div_class = " class=\"branch_item\"";
			$button = "<img src=\"".get_bloginfo('wpurl')."/wp-content/plugins/wp-collapsible-cats/images/empty.gif\" class=\"empty_img\" alt=\"\" /> ";
			
			if ($branch == 0){ //如果为子分类循环第一条
				$current_branch++; //子分类循环次数加 1
				
				if ( ($current_branch == $branch_num)&&($parent == $parent_num) ){
					$catTree .= "\t<div id=\"branch_".$current_branch."\" class=\"branch_last\" style=\"display:".$displayTYPE.";\">\n\t";
				}else{
					$catTree .= "\t<div id=\"branch_".$current_branch."\" class=\"branch\" style=\"display:".$displayTYPE.";\">\n\t";
				}
				$branch = 1; //标记已开始子分类循环
			}else{
				$catTree .= "\t"; //为了工整添加的制表符，此行词句均为废物可以无视
			}
		}
		
		$cate_count++;
		if ($cate_count == $cate_num){
			$div_class = " class=\"last_cate\"";
		}
		
		$catTree .= "\t<div".$div_id.$div_class.">".$button."<a href=\"". get_category_link( $cate->term_id ) ."\" title=\"".sprintf(__( 'View all posts filed under %s' ), $cat_name)."\">".$cate->name."</a>";
		
		if ( (!empty($r['feed'])) && (!empty($r['feed_image'])) ){
			$catTree .= " <a href=\"". get_category_rss_link( false, $cate->term_id, $cate->slug ) ."\" title=\"".$r['feed']."\"><img src=\"".$r['feed_image']."\" alt=\"".$r['feed']."\" class=\"feed_img\" /></a>";
		}else if (!empty($r['feed_image'])){
			$catTree .= " <a href=\"". get_category_rss_link( false, $cate->term_id, $cate->slug ) ."\" title=\"".sprintf(__( 'Feed for all posts filed under %s' ), $cat_name )."\"><img src=\"".$r['feed_image']."\" alt=\"".sprintf(__( 'Feed for all posts filed under %s' ), $cate->name )."\" class=\"feed_img\" /></a>";
		}else if (!empty($r['feed'])){
			$catTree .= " [<a href=\"". get_category_rss_link( false, $cate->term_id, $cate->name ) ."\" title=\"".$r['feed']."\">".$r['feed']."</a>]";
		}
		
		if ($r['show_count'] == 1){
			if ($r['sum'] == 1 && $sum > 0){
				$sum = $sum + $cate->count;
				$catTree .= " [".$sum."]";
			}else{
				$catTree .= " [".$cate->count."]";
			}
		}
		
		$sum = 0;
		
		$catTree .= "</div>\n";
	}
	
	$catTree .= "</div>\n";
	
	echo $catTree;
}

function widget_collapsible_cate($args, $widget_args = 1) {
	extract($args, EXTR_SKIP);
	if ( is_numeric($widget_args) )
		$widget_args = array( 'number' => $widget_args );
	$widget_args = wp_parse_args( $widget_args, array( 'number' => -1 ) );
	extract($widget_args, EXTR_SKIP);

	$options = get_option('widget_collapsible_cate');
	if ( !isset($options[$number]) )
		return;

	$shrink = $options[$number]['shrink'] ? '0' : '1';
	$c = $options[$number]['count'] ? '1' : '0';
	$sumC = $options[$number]['sumCount'] ? '1' : '0';

	$title = empty($options[$number]['title']) ? __('Categories') : apply_filters('widget_title', $options[$number]['title']);

	echo $before_widget;
	echo $before_title . $title . $after_title;

	$cat_args = array('orderby' => 'name', 'show_count' => $c, 'sum' => $sumC, 'shrink' => $shrink);
	
	collapsible_list_cats($cat_args . '&title_li=');

	echo $after_widget;
}

function widget_collapsible_cate_control( $widget_args ) {
	global $wp_registered_widgets;
	static $updated = false;

	if ( is_numeric($widget_args) )
		$widget_args = array( 'number' => $widget_args );
	$widget_args = wp_parse_args( $widget_args, array( 'number' => -1 ) );
	extract($widget_args, EXTR_SKIP);

	$options = get_option('widget_collapsible_cate');

	if ( !is_array( $options ) )
		$options = array();

	if ( !$updated && !empty($_POST['sidebar']) ) {
		$sidebar = (string) $_POST['sidebar'];

		$sidebars_widgets = wp_get_sidebars_widgets();
		if ( isset($sidebars_widgets[$sidebar]) )
			$this_sidebar =& $sidebars_widgets[$sidebar];
		else
			$this_sidebar = array();

		foreach ( (array) $this_sidebar as $_widget_id ) {
			if ( 'widget_collapsible_cate' == $wp_registered_widgets[$_widget_id]['callback'] && isset($wp_registered_widgets[$_widget_id]['params'][0]['number']) ) {
				$widget_number = $wp_registered_widgets[$_widget_id]['params'][0]['number'];
				if ( !in_array( "collapsible-cate-$widget_number", $_POST['widget-id'] ) ) // the widget has been removed.
					unset($options[$widget_number]);
			}
		}

		foreach ( (array) $_POST['widget-collapsible-cate'] as $widget_number => $widget_cat ) {
			if ( !isset($widget_cat['title']) && isset($options[$widget_number]) ) // user clicked cancel
				continue;
			$title = trim(strip_tags(stripslashes($widget_cat['title'])));
			$shrink = isset($widget_cat['shrink']);
			$count = isset($widget_cat['count']);
			$sumCount = isset($widget_cat['sumCount']);
			$options[$widget_number] = compact( 'title', 'shrink', 'count', 'sumCount' );
		}

		update_option('widget_collapsible_cate', $options);
		$updated = true;
	}

	if ( -1 == $number ) {
		$title = '';
		$shrink = false;
		$count = false;
		$sumCount = false;
		$number = '%i%';
	} else {
		$title = attribute_escape( $options[$number]['title'] );
		$shrink = (bool) $options[$number]['shrink'];
		$count = (bool) $options[$number]['count'];
		$sumCount = (bool) $options[$number]['sumCount'];
	}
?>
			<p>
				<label for="collapsible-cate-title-<?php echo $number; ?>">
					<?php _e( 'Title:' ); ?>
					<input class="widefat" id="collapsible-cate-title-<?php echo $number; ?>" name="widget-collapsible-cate[<?php echo $number; ?>][title]" type="text" value="<?php echo $title; ?>" />
				</label>
			</p>
			
			<p>
				<label for="collapsible-cate-count-<?php echo $number; ?>">
					<input type="checkbox" class="checkbox" id="collapsible-cate-shrink-<?php echo $number; ?>" name="widget-collapsible-cate[<?php echo $number; ?>][shrink]"<?php checked( $shrink, true ); ?> /> 展开子分类
				</label>
				<br />
				<label for="collapsible-cate-count-<?php echo $number; ?>">
					<input type="checkbox" class="checkbox" id="collapsible-cate-count-<?php echo $number; ?>" name="widget-collapsible-cate[<?php echo $number; ?>][count]"<?php checked( $count, true ); ?> /> <?php _e( 'Show post counts' ); ?>
				</label>
				<br />
				<label for="collapsible-cate-count-<?php echo $number; ?>">
					<input type="checkbox" class="checkbox" id="collapsible-cate-sumCount-<?php echo $number; ?>" name="widget-collapsible-cate[<?php echo $number; ?>][sumCount]"<?php checked( $sumCount, true ); ?> /> 将子分类的日志数加到父分类日志数中
				</label>
			</p>

			<input type="hidden" name="widget-collapsible-cate[<?php echo $number; ?>][submit]" value="1" />
<?php
}

function widget_collapsible_cate_register() {
	if ( !$options = get_option( 'widget_collapsible_cate' ) )
		$options = array();

	if ( isset($options['title']) )
		$options = widget_collapsible_cate_upgrade();

	$widget_ops = array( 'classname' => 'widget-collapsible-cate', 'description' => '可折叠的树状分类' );

	$name = '树形分类';

	$id = false;
	foreach ( (array) array_keys($options) as $o ) {
		// Old widgets can have null values for some reason
		if ( !isset($options[$o]['title']) )
			continue;
		$id = "collapsible-cate-$o";
		wp_register_sidebar_widget( $id, $name, 'widget_collapsible_cate', $widget_ops, array( 'number' => $o ) );
		wp_register_widget_control( $id, $name, 'widget_collapsible_cate_control', array( 'id_base' => 'collapsible-cate' ), array( 'number' => $o ) );
	}

	// If there are none, we register the widget's existance with a generic template
	if ( !$id ) {
		wp_register_sidebar_widget( 'collapsible-cate-1', $name, 'widget_collapsible_cate', $widget_ops, array( 'number' => -1 ) );
		wp_register_widget_control( 'collapsible-cate-1', $name, 'widget_collapsible_cate_control', array( 'id_base' => 'collapsible-cate' ), array( 'number' => -1 ) );
	}
}

function widget_collapsible_cate_upgrade() {
	$options = get_option( 'widget_collapsible_cate' );

	if ( !isset( $options['title'] ) )
		return $options;

	$newoptions = array( 1 => $options );

	update_option( 'widget_collapsible_cate', $newoptions );

	$sidebars_widgets = get_option( 'sidebars_widgets' );
	if ( is_array( $sidebars_widgets ) ) {
		foreach ( $sidebars_widgets as $sidebar => $widgets ) {
			if ( is_array( $widgets ) ) {
				foreach ( $widgets as $widget )
					$new_widgets[$sidebar][] = ( $widget == 'collapsible-cate' ) ? 'collapsible-cate-1' : $widget;
			} else {
				$new_widgets[$sidebar] = $widgets;
			}
		}
		if ( $new_widgets != $sidebars_widgets )
			update_option( 'sidebars_widgets', $new_widgets );
	}

	return $newoptions;
}

function collapsible_cats_init(){
	widget_collapsible_cate_register();
}

function collapsible_cats_script() {
	echo "<link rel=\"stylesheet\" href=\"".get_bloginfo('wpurl')."/wp-content/plugins/wp-collapsible-cats/wp-collapsible-cats.css\" type=\"text/css\" media=\"screen\" />\n";
	echo "<script language=\"text/javascript\" type=\"text/javascript\" src=\"".get_bloginfo('wpurl')."/wp-content/plugins/wp-collapsible-cats/wp-collapsible-cats.js\"></script>\n";
}

add_action('wp_head', 'collapsible_cats_script');
add_action('widgets_init', 'collapsible_cats_init', 5);
?>