<?php

class aboutOptions {
 
	function getOptions() {
		$options = get_option('about_options');
		if (!is_array($options)) {
		$options['malong_txt'] = '';
		$options['malong_img'] = '';
		$options['malong1_img'] = '';
		$options['malong2_img'] = '';
		$options['malong3_img'] = '';
		$options['malong4_img'] = '';
		$options['malong5_img'] = '';
		$options['malong6_img'] = '';
		$options['malong7_img'] = '';
		$options['jingjing_txt'] = '';
		$options['jingjing_img'] = '';
		$options['jingjing1_img'] = '';
		$options['jingjing2_img'] = '';
		$options['jingjing3_img'] = '';
		$options['jingjing4_img'] = '';
		$options['jingjing5_img'] = '';
		$options['jingjing6_img'] = '';
		$options['jingjing7_img'] = '';
		update_option('about_options', $options);
		}
		return $options;
	}
 
	function init() {
		if(isset($_POST['about_save'])) {
			$options = aboutOptions::getOptions();
			$options['malong_txt'] = stripslashes($_POST['malong_txt']);
			$options['malong_img'] = stripslashes($_POST['malong_img']);
			$options['malong1_img'] = stripslashes($_POST['malong1_img']);
			$options['malong2_img'] = stripslashes($_POST['malong2_img']);
			$options['malong3_img'] = stripslashes($_POST['malong3_img']);
			$options['malong4_img'] = stripslashes($_POST['malong4_img']);
			$options['malong5_img'] = stripslashes($_POST['malong5_img']);
			$options['malong6_img'] = stripslashes($_POST['malong6_img']);
			$options['malong7_img'] = stripslashes($_POST['malong7_img']);
			$options['jingjing_txt'] = stripslashes($_POST['jingjing_txt']);
			$options['jingjing_img'] = stripslashes($_POST['jingjing_img']);
			$options['jingjing1_img'] = stripslashes($_POST['jingjing1_img']);
			$options['jingjing2_img'] = stripslashes($_POST['jingjing2_img']);
			$options['jingjing3_img'] = stripslashes($_POST['jingjing3_img']);
			$options['jingjing4_img'] = stripslashes($_POST['jingjing4_img']);
			$options['jingjing5_img'] = stripslashes($_POST['jingjing5_img']);
			$options['jingjing6_img'] = stripslashes($_POST['jingjing6_img']);
			$options['jingjing7_img'] = stripslashes($_POST['jingjing7_img']);
			update_option('about_options', $options);

		} else {
			aboutOptions::getOptions();
		}

		add_theme_page("about Options", "about Options", 'edit_themes', basename(__FILE__), array('aboutOptions', 'display'));
	}

	function display() {
		$options = aboutOptions::getOptions();
?>
 
<form action="#" method="post" enctype="multipart/form-data" name="about_form" id="about_form">
	<div class="wrap">
		<h2>马龙</h2>
		<div class="form-table">
					<p>简介<label><input type="text" name="malong_txt" id="malong_txt" value="<?php echo esc_attr($options['malong_txt']); ?>" size="60"/></label></p>
					<p>形象图片<label><input type="text" name="malong_img" id="malong_img" value="<?php echo esc_attr($options['malong_img']); ?>" size="60"/></label></p>
					<p>轮换图片1<label><input type="text" name="malong1_img" id="malong1_img" value="<?php echo esc_attr($options['malong1_img']); ?>" size="60"/></label></p>
					<p>轮换图片2<label><input type="text" name="malong2_img" id="malong2_img" value="<?php echo esc_attr($options['malong2_img']); ?>" size="60"/></label></p>
					<p>轮换图片3<label><input type="text" name="malong3_img" id="malong3_img" value="<?php echo esc_attr($options['malong3_img']); ?>" size="60"/></label></p>
					<p>轮换图片4<label><input type="text" name="malong4_img" id="malong4_img" value="<?php echo esc_attr($options['malong4_img']); ?>" size="60"/></label></p>
					<p>轮换图片5<label><input type="text" name="malong5_img" id="malong5_img" value="<?php echo esc_attr($options['malong5_img']); ?>" size="60"/></label></p>
					<p>轮换图片6<label><input type="text" name="malong6_img" id="malong6_img" value="<?php echo esc_attr($options['malong6_img']); ?>" size="60"/></label></p>
					<p>轮换图片7<label><input type="text" name="malong7_img" id="malong7_img" value="<?php echo esc_attr($options['malong7_img']); ?>" size="60"/></label></p>					
               </div>
		<h2>晶晶</h2>
		<div class="form-table">
		            <p>简介<label><input type="text" name="jingjing_txt" id="jingjing_txt" value="<?php echo esc_attr($options['jingjing_txt']); ?>" size="60"/></label></p>
					<p>形象图片<label><input type="text" name="jingjing_img" id="jingjing_img" value="<?php echo esc_attr($options['jingjing_img']); ?>" size="60"/></label></p>
					<p>轮换图片1<label><input type="text" name="jingjing1_img" id="jingjing1_img" value="<?php echo esc_attr($options['jingjing1_img']); ?>" size="60"/></label></p>
					<p>轮换图片2<label><input type="text" name="jingjing2_img" id="jingjing2_img" value="<?php echo esc_attr($options['jingjing2_img']); ?>" size="60"/></label></p>
					<p>轮换图片3<label><input type="text" name="jingjing3_img" id="jingjing3_img" value="<?php echo esc_attr($options['jingjing3_img']); ?>" size="60"/></label></p>
					<p>轮换图片4<label><input type="text" name="jingjing4_img" id="jingjing4_img" value="<?php echo esc_attr($options['jingjing4_img']); ?>" size="60"/></label></p>
					<p>轮换图片5<label><input type="text" name="jingjing5_img" id="jingjing5_img" value="<?php echo esc_attr($options['jingjing5_img']); ?>" size="60"/></label></p>
					<p>轮换图片6<label><input type="text" name="jingjing6_img" id="jingjing6_img" value="<?php echo esc_attr($options['jingjing6_img']); ?>" size="60"/></label></p>
					<p>轮换图片7<label><input type="text" name="jingjing7_img" id="jingjing7_img" value="<?php echo esc_attr($options['jingjing7_img']); ?>" size="60"/></label></p>
               </div>
		<p class="submit">
			<input type="submit" name="about_save" value="Update Options" />
		</p>
	</div>
 
</form>
 
<?php
	}
}

add_action('admin_menu', array('aboutOptions', 'init'));

?>