</div>
<footer id='footer' class='clearfix'>
    <a href='//gaiamagic.com' id='gaiamagic'>Gaia Magic</a>
    <a href='http://www.miibeian.gov.cn/' id='wtf'>粤ICP备11056069号-1</a>
</footer>
<?php wp_footer(); ?>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_option(home); ?>/javascripts/jquery-1.7.1.min.js"><\/script>')</script>
<script src='<?php echo get_option("home"); ?>/javascripts/script.js'></script>
<?php if (is_single): ?>
<script src='<?php echo get_option("home"); ?>/javascripts/jquery.idTabs.js'></script>
<?php if (is_page('musicwall') ) { ?>
<script src='<?php echo get_option("home"); ?>/javascripts/jquery.masonry.min.js'></script>
<script type='text/javascript'>
$('#links').children('ul').masonry({
    itemSelector: '.item',
    columnWidth: 310
});
</script>
<?php } endif; ?>
<script type='text/javascript'>
//<![CDATA[
(function($){
    $("#featured").find("li:first-child").css("margin-left","0")
})(jQuery);
//]]>
</script>
</body>
</html>
