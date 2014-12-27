<div class="share">
  <div id="ckepop">
    <a class="jiathis_button_tsina"></a>
    <a class="jiathis_button_tqq"></a>
    <a class="jiathis_button_douban"></a>
  </div>
</div>
<script type="text/javascript" >
var jiathis_config={
  data_track_clickback:true,
                 <?php if (has_post_thumbnail()) { ?>
                 pic: '<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>',
                 <?php } ?>
                 title:'<?php the_title(); ?> @音乐人攻略 <?php
$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
    echo " #" . $tag->name . "#"; 
  }
}
?>',
                 summary:"",
                 appkey:{
                   "tsina":"1620491747"
                 },
                 ralateuid:{
                   "tsina":"音乐人攻略"
                 },
                 hideMore:true
}
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1544380" charset="utf-8"></script>
