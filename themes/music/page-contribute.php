<?php 
/**
 * Template Name:投稿
 * @author:fushengqian@yeah.net
 * @qq:540335306
 * @date:2011-06-19
 */ 
?>
<?php 
if(!empty($_POST['post_title'])&&!empty($_POST['post_content'])){
    global $wpdb;
    $last_post = $wpdb->get_var("select post_date from $wpdb->posts where post_type = 'post' ORDER BY post_date DESC LIMIT 1");
    //投稿不能太频繁，间隔120秒
    if(current_time('timestamp')-strtotime($last_post) < 120){
    	print_r(json_encode(array('code'=>201,'msg'=>'您投稿也太勤快了吧，先歇会儿！')));die;
    }
    
    //文章数据
    $postData = array(
        'post_real_author' => $_POST['post_real_author'],
        'post_title' => $_POST['post_title'],
        'post_content' => $_POST['post_content'].'<font color="red" size="15"><br>（原作者：'.$_POST['post_real_author'].'<br>原作者邮箱：'.$_POST['post_email'].'）</font>',
        'post_email'=> $_POST['post_email'],
        'guid' => $_POST['guid'],
    	'post_status' => 'pending',//待审
        'post_category' => array(0)
    );
  

    // 将文章插入数据库
    $status = wp_insert_post($postData);
    if ($status != 0) { 
    	print_r(json_encode(array('code'=>200,'msg'=>'恭喜，投稿成功！稿子正在审理中..')));die;
    }else{
    	print_r(json_encode(array('code'=>200,'msg'=>'抱歉，投稿失败！')));die;
    }
    
}
?>
<?php get_header(); ?>
<div class="con">
      <div class="dy_Box about_Box">
        <div class="combox_3">
          <div class="centetn_Bg">
            <div class="kdiv"></div>
            <div class="bgdiv"></div>
            <div class="article">
              <div class="dTitle"><span class="fb">发表文章</span> <a href="#" class="cor1">帮助</a> <a href="#" class="cor2">招聘信息投递规则</a></div>
              <div class="dtable">
                <table border="0" cellspacing="0" cellpadding="0">
                <form action="" method="post">
                  <tr>
                    <td align="right" width="90">作者<span class="cor">*</span></td>
                    <td><label class="la1">
                      <input name="post_real_author" id="post_real_author" type="text" class="input1" />
                      </label></td>
                  </tr>
                  <tr>
                    <td align="right">标题<span class="cor">*</span></td>
                    <td><label class="la1 la2">
                      <input name="post_title" id="post_title" type="text" class="input1 input2" />
                      </label></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top"><p class="pd_t10">文章内容<span class="cor">*</span></p></td>
                    <td valign="top"><div class="dtext" id='post_content'></div></td>
                  </tr>
                  <tr>
                    <td align="right">文章原地址&nbsp;&nbsp;</td>
                    <td><label class="la1 la2">
                      <input name="guid" id="guid" type="text" class="input1 input2" />
                      </label>
                      &nbsp;&nbsp;
                      <input name="use_guid" type="checkbox" value="" />
                      链接至文章源地址</td>
                  </tr>
                  <tr>
                    <td align="right">发布者姓名 <span class="cor">*</span></td>
                    <td><label class="la1">
                      <input name="post_author" id="post_author" type="text" class="input1" />
                      </label></td>
                  </tr>
                  <tr>
                    <td align="right">联系邮箱 <span class="cor">*</span></td>
                    <td><label class="la1">
                      <input name="post_email" id="post_email" type="text" class="input1" />
                      </label></td>
                  </tr>
                  <tr>
                    <td align="right">验证码 <span class="cor">*</span></td>
                    <td><label class="la1 la3">
                      <input name="code" id="code" type="text" class="input1 input3" />
                      </label>
                      &nbsp;&nbsp;<span style="background-color:#888877" id="code_input"><?php echo rand(1000,9999);?></span></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><div class="btn"><img id="post_form" src="<?php bloginfo('template_url'); ?>/image/img_420_55.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_420_56.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_420_55.jpg'"  /></div></td>
                  </tr>
                  </form>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bgFoot"></div>
</div>
<script src="<?php get_bloginfo('home');?>/wp-includes/js/tinymce/tiny_mce.js" type="text/javascript"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "exact",
        elements: "post_content",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location : 'bottom',
        theme_advanced_resizing : true,
        theme_advanced_resize_horizontal : false,
        entities : '38,amp,60,lt,62,gt',
        tabfocus_elements : 'major-publishing-actions',
        apply_source_formatting : false,
        paste_strip_class_attributes : 'all',
        relative_urls : false,
		paste_remove_styles : true,
		paste_remove_spans : true,
        dialog_type : 'modal',
        height:'300px',
        width : '600px',
        skin: "o2k7",
        skin_variant : 'silver',
        language: false,
        theme : "advanced",
        wpeditimage_disable_captions :false,
        plugins :  'table,contextmenu,paste,-externalplugin'
    });
</script>
<script>
$('#post_form').click(function(){
	if($('#post_real_author').val()==''){
		alert('作者不能为空！');
		$('#post_real_author').focus();
		return false;
	}
	if($('#post_title').val()==''){
		alert('标题不能为空！');
		$('#post_title').focus();
		return false;
	}
    var content = tinyMCE.get('post_content').getContent();
	
	if(content==''){
		alert('内容不能为空！');
		$('#post_content').focus();
		return false;
	}
	if($('#post_author').val()==''){
		alert('发布者姓名不能为空！');
		$('#post_author').focus();
		return false;
	}
	if($('#post_email').val()==''){
		alert('联系邮箱不能为空！');
		$('#post_email').focus();
		return false;
	}
	if($('#code').val()==''){
		alert('验证码不能为空！');
		$('#code').focus();
		return false;
	}
	if($('#code').val()!==$('#code_input').html()){
		alert('验证码不正确！');
		$('#code').focus();
		return false;
	}
	//ajax提交
	$.post("/submission", { 
		post_real_author :  $('#post_real_author').val(),
		post_title :  $('#post_title').val(),
		post_content :  tinyMCE.get('post_content').getContent(),
		post_author :  $('#post_author').val(),
		post_email : $('#post_email').val(),
		guid : $('#guid').val(),
		use_guid : $('#use_guid').val()
	}, function (data, textStatus){		
		if(data.code=='200'){
			alert('恭喜，投稿成功！稿子正在审理中..');
			window.location.reload();
		}else{
			alert(data.msg);
		}
	},"json");
});
</script>
<?php get_footer(); ?>