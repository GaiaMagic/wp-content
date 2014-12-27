<?php
/**
 * 首页图片数据
 * */
class ClassicOptions {
     //获取数据
	function getOptions() {
		$options = get_option('classic_options');
		if (!is_array($options)) {
		$options['home_img'] = '';
		$options['home_link'] = '';
		$options['home_title'] = '';
		$options['home_txt'] = '';
		$options['home1_img'] = '';
		$options['home1_link'] = '';
		$options['home1_title'] = '';
		$options['home1_txt'] = '';
		$options['home2_img'] = '';
		$options['home2_link'] = '';
		$options['home2_title'] = '';
		$options['home2_txt'] = '';
		$options['home3_img'] = '';
		$options['home3_link'] = '';
		$options['home3_title'] = '';
		$options['home3_txt'] = '';
		$options['tj_img'] = '';
		$options['tj_link'] = '';
		$options['tj_txt'] = '';
		$options['tj1_img'] = '';
		$options['tj1_link'] = '';
		$options['tj1_title'] = '';
		$options['tj2_img'] = '';
		$options['tj2_link'] = '';
		$options['tj2_title'] = '';
		$options['tj3_img'] = '';
		$options['tj3_link'] = '';
		$options['tj3_title'] = '';
		update_option('classic_options', $options);
		}
		return $options;
	}
 
	function init() {
		//保存表单数据
		if(isset($_POST['classic_save'])) {
			$options = ClassicOptions::getOptions();
			$options['home_ad_pic1'] = stripslashes($_POST['home_ad_pic1']);
			$options['home_ad_pic1_url'] = stripslashes($_POST['home_ad_pic1_url']);
			$options['home_ad_pic2'] = stripslashes($_POST['home_ad_pic2']);
			$options['home_ad_pic2_url'] = stripslashes($_POST['home_ad_pic2_url']);
			$options['musician'] = stripslashes($_POST['musician']);
			$options['musician_title'] = stripslashes($_POST['musician_title']);
			$options['musician_content'] = stripslashes($_POST['musician_content']);
			$options['musician_url'] = stripslashes($_POST['musician_url']);
			$options['industry'] = stripslashes($_POST['industry']);
			$options['industry_title'] = stripslashes($_POST['industry_title']);
			$options['industry_content'] = stripslashes($_POST['industry_content']);
			$options['industry_url'] = stripslashes($_POST['industry_url']);
			$options['recommend'] = stripslashes($_POST['recommend']);
			$options['recommend_title'] = stripslashes($_POST['recommend_title']);
			$options['recommend_content'] = stripslashes($_POST['recommend_content']);
			$options['recommend_url'] = stripslashes($_POST['recommend_url']);
			$options['other'] = stripslashes($_POST['other']);
			$options['other_title'] = stripslashes($_POST['other_title']);
			$options['other_content'] = stripslashes($_POST['other_content']);
			$options['other_url'] = stripslashes($_POST['other_url']);
			$options['home2_link'] = stripslashes($_POST['home2_link']);
			$options['home2_title'] = stripslashes($_POST['home2_title']);
			$options['home2_txt'] = stripslashes($_POST['home2_txt']);
 			$options['home3_img'] = stripslashes($_POST['home3_img']);
			$options['home3_link'] = stripslashes($_POST['home3_link']);
			$options['home3_title'] = stripslashes($_POST['home3_title']);
			$options['home3_txt'] = stripslashes($_POST['home3_txt']);
			$options['tj_img'] = stripslashes($_POST['tj_img']);
			$options['tj_link'] = stripslashes($_POST['tj_link']);
			$options['tj_txt'] = stripslashes($_POST['tj_txt']);
			$options['tj1_img'] = stripslashes($_POST['tj1_img']);
			$options['tj1_link'] = stripslashes($_POST['tj1_link']);
			$options['tj1_title'] = stripslashes($_POST['tj1_title']);
			$options['tj2_img'] = stripslashes($_POST['tj2_img']);
			$options['tj2_link'] = stripslashes($_POST['tj2_link']);
			$options['tj2_title'] = stripslashes($_POST['tj2_title']);
			$options['tj3_img'] = stripslashes($_POST['tj3_img']);
			$options['tj3_link'] = stripslashes($_POST['tj3_link']);
			$options['tj3_title'] = stripslashes($_POST['tj3_title']);
			update_option('classic_options', $options);

		} else {
			ClassicOptions::getOptions();
		}

		add_theme_page("Home Options", "Home Options", 'edit_themes', basename(__FILE__), array('ClassicOptions', 'display'));
	}

	function display() {
		$options = ClassicOptions::getOptions();
?>
 
<form action="#" method="post" enctype="multipart/form-data" name="classic_form" id="classic_form">
	<div class="wrap">
		<h2>首页设置</h2>
		<div class="form-table">
		            <!--广告图-->
		            <p>广告图片一地址：<label><input type="text" name="home_ad_pic1" id="home_ad_pic1" value="<?php echo esc_attr($options['home_ad_pic1']); ?>" size="100"/>&nbsp;&nbsp;链接到：<input type="text" name="home_ad_pic1_url" id="home_ad_pic1_url" value="<?php echo esc_attr($options['home_ad_pic1_url']); ?>" size="60"/></label></p>
		            <p>广告图片二地址：<label><input type="text" name="home_ad_pic2" id="home_ad_pic2" value="<?php echo esc_attr($options['home_ad_pic2']); ?>" size="100"/>&nbsp;&nbsp;链接到：<input type="text" name="home_ad_pic2_url" id="home_ad_pic2_url" value="<?php echo esc_attr($options['home_ad_pic2_url']); ?>" size="60"/></label></p>
		            <!--"音乐人"大图-->
		            <p>音乐人模块大图地址：<label><input type="text" name="musician" id="musician" value="<?php echo esc_attr($options['musician']); ?>" size="80"/>&nbsp;&nbsp;链接到：<input type="text" name="musician_url" id="musician_url" value="<?php echo esc_attr($options['musician_url']); ?>" size="60"/></label></p>
		            <p>音乐人模块标题：<label><input type="text" name="musician_title" id="musician_title" value="<?php echo esc_attr($options['musician_title']); ?>" size="80"/></label></p>
		            <p>音乐人模块内容：<label><input type="text" name="musician_content" id="musician_content" value="<?php echo esc_attr($options['musician_content']); ?>" size="80"/></label></p>
		            <!--"音乐产业"大图-->
		            <p>音乐产业模块大图地址：<label><input type="text" name="industry" id="industry" value="<?php echo esc_attr($options['industry']); ?>" size="80"/>&nbsp;&nbsp;链接到：<input type="text" name="industry_url" id="industry_url" value="<?php echo esc_attr($options['industry_url']); ?>" size="60"/></label></p>
		            <p>音乐产业模块标题：<label><input type="text" name="industry_title" id="industry_title" value="<?php echo esc_attr($options['industry_title']); ?>" size="80"/></label></p>
		            <p>音乐产业模块内容：<label><input type="text" name="industry_content" id="industry_content" value="<?php echo esc_attr($options['industry_content']); ?>" size="80"/></label></p>
		            <!--"推荐"大图-->
		            <p>推荐模块大图地址：<label><input type="text" name="recommend" id="recommend" value="<?php echo esc_attr($options['recommend']); ?>" size="80"/>&nbsp;&nbsp;链接到：<input type="text" name="recommend_url" id="recommend_url" value="<?php echo esc_attr($options['recommend_url']); ?>" size="60"/></label></p>
		            <p>推荐模块标题：<label><input type="text" name="recommend_title" id="recommend_title" value="<?php echo esc_attr($options['recommend_title']); ?>" size="80"/></label></p>
		            <p>推荐模块内容：<label><input type="text" name="recommend_content" id="recommend_content" value="<?php echo esc_attr($options['recommend_content']); ?>" size="80"/></label></p>
		            <!--"其他"大图-->
		             <p>其他模块大图地址：<label><input type="text" name="other" id="other" value="<?php echo esc_attr($options['other']); ?>" size="80"/>&nbsp;&nbsp;链接到：<input type="text" name="other_url" id="other_url" value="<?php echo esc_attr($options['other_url']); ?>" size="60"/></label></p>
		             <p>其他模块标题：<label><input type="text" name="other_title" id="other_title" value="<?php echo esc_attr($options['other_title']); ?>" size="80"/></label></p>
		            <p>其他模块内容：<label><input type="text" name="other_content" id="other_content" value="<?php echo esc_attr($options['other_content']); ?>" size="80"/></label></p>
					<!--<p>大图图片地址<label><input type="text" name="home_img" id="home_img" value="<?php echo esc_attr($options['home_img']); ?>" size="60"/></label></p>
					<p>大图文章链接<label><input type="text" name="home_link" id="home_link" value="<?php echo esc_attr($options['home_link']); ?>" size="60"/></label></p>
					<p>大图文章标题<label><input type="text" name="home_title" id="home_title" value="<?php echo esc_attr($options['home_title']); ?>" size="60"/></label></p>
					<p>大图文章摘要<label><input type="text" name="home_txt" id="home_txt" value="<?php echo esc_attr($options['home_txt']); ?>" size="60"/></label></p>
					<p>音乐人大图<label><input type="text" name="home1_img" id="home1_img" value="<?php echo esc_attr($options['home1_img']); ?>" size="60"/></label></p>
					<p>链接<label><input type="text" name="home1_link" id="home1_link" value="<?php echo esc_attr($options['home1_link']); ?>" size="60"/></label></p>
					<p>标题<label><input type="text" name="home1_title" id="home1_title" value="<?php echo esc_attr($options['home1_title']); ?>" size="60"/></label></p>
					<p>摘要<label><input type="text" name="home1_txt" id="home1_txt" value="<?php echo esc_attr($options['home1_txt']); ?>" size="60"/></label></p>
					<p>音乐产业大图<label><input type="text" name="home2_img" id="home2_img" value="<?php echo esc_attr($options['home2_img']); ?>" size="60"/></label></p>
					<p>链接<label><input type="text" name="home2_link" id="home2_link" value="<?php echo esc_attr($options['home2_link']); ?>" size="60"/></label></p>
					<p>标题<label><input type="text" name="home2_title" id="home2_title" value="<?php echo esc_attr($options['home2_title']); ?>" size="60"/></label></p>
					<p>摘要<label><input type="text" name="home2_txt" id="home2_txt" value="<?php echo esc_attr($options['home2_txt']); ?>" size="60"/></label></p>
					<p>其他大图<label><input type="text" name="home3_img" id="home3_img" value="<?php echo esc_attr($options['home3_img']); ?>" size="60"/></label></p>
					<p>链接<label><input type="text" name="home3_link" id="home3_link" value="<?php echo esc_attr($options['home3_link']); ?>" size="60"/></label></p>
					<p>标题<label><input type="text" name="home3_title" id="home3_title" value="<?php echo esc_attr($options['home3_title']); ?>" size="60"/></label></p>
					<p>摘要<label><input type="text" name="home3_txt" id="home3_txt" value="<?php echo esc_attr($options['home3_txt']); ?>" size="60"/></label></p>-->					
               </div>
		<h2>右侧推荐文章</h2>
		<div class="form-table">
					<!--<p>图片<label><input type="text" name="tj_img" id="tj_img" value="<?php echo esc_attr($options['tj_img']); ?>" size="60"/></label></p>
					<p>摘要<label><input type="text" name="tj_txt" id="tj_txt" value="<?php echo esc_attr($options['tj_txt']); ?>" size="60"/></label></p>
					<p>链接<label><input type="text" name="tj_link" id="tj_link" value="<?php echo esc_attr($options['tj_link']); ?>" size="60"/></label></p>
					<p>文章一图<label><input type="text" name="tj1_img" id="tj1_img" value="<?php echo esc_attr($options['tj1_img']); ?>" size="60"/></label></p>
					<p>链接<label><input type="text" name="tj1_link" id="tj1_link" value="<?php echo esc_attr($options['tj1_link']); ?>" size="60"/></label></p>
					<p>标题<label><input type="text" name="tj1_title" id="tj1_title" value="<?php echo esc_attr($options['tj1_title']); ?>" size="60"/></label></p>
					<p>文章二图<label><input type="text" name="tj2_img" id="tj2_img" value="<?php echo esc_attr($options['tj2_img']); ?>" size="60"/></label></p>
					<p>链接<label><input type="text" name="tj2_link" id="tj2_link" value="<?php echo esc_attr($options['tj2_link']); ?>" size="60"/></label></p>
					<p>标题<label><input type="text" name="tj2_title" id="tj2_title" value="<?php echo esc_attr($options['tj2_title']); ?>" size="60"/></label></p>
					<p>文章三图<label><input type="text" name="tj3_img" id="tj3_img" value="<?php echo esc_attr($options['tj3_img']); ?>" size="60"/></label></p>
					<p>链接<label><input type="text" name="tj3_link" id="tj3_link" value="<?php echo esc_attr($options['tj3_link']); ?>" size="60"/></label></p>
					<p>标题<label><input type="text" name="tj3_title" id="tj3_title" value="<?php echo esc_attr($options['tj3_title']); ?>" size="60"/></label></p>-->				
               </div>
		<p class="submit">
			<input type="submit" name="classic_save" value="提交" />
		</p>
	</div>
 
</form>
 
<?php
	}
}

add_action('admin_menu', array('ClassicOptions', 'init'));

?>