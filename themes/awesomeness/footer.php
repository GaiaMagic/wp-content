    </div>

    <div class="footer-wrapper wrapper">
        <footer id="footer">
            <h2 id="logo" class="section">
                <a href="http://gaiamagic.com"></a>
            </h2>

            <article class="about section">
                <h3 class="title">关于我们</h3>

                <div class="content">音乐人攻略专注服务音乐行业，提供前沿行业动态，研究音乐类行销、演出、网络等领域。是音乐人、从业人员和音乐爱好者获得最有营养的资讯和攻略必看的网络媒体。</div>
            </article>

            <dl id="findus" class="section clearfix">
                <dt>
                    <h3 class="title">找到我们</h3>
                </dt>

                <dd>
                    <a href="http://weibo.com/musicianguidecn" class="weibo"></a>
                </dd>

                <dd>
                    <a href="http://feed.feedsky.com/musicianguide" class="rss"></a>
                </dd>
            </dl>
        </footer>

        <?php wp_footer() ?>
    </div>

    <div id="overlay" class="box">
        <a href="" id="fullpageview" class="view" target="_blank"></a>
        <div class="con"></div>
    </div>

    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/javascripts/jquery-1.7.2.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/javascripts/jquery.tools.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/javascripts/jquery.masonry.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/javascripts/jquery.placeholder.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/javascripts/jquery.imagesloaded.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/javascripts/jquery.infinitescroll.min.js"></script>
    <?php if ( function_exists( 'ot_get_option' ) ) {
        $slideshow = ot_get_option( 'slideshow', array() );

        if ( ! empty( $slideshow ) ) { ?>
            <script type="text/javascript">
                ;(function($) {
                    $('.slidetabs').tabs('.images > li', {
                        rotate: true,
                        effect: 'fade',
                        fadeOutSpeed: 'slow'
                    }).slideshow({
                        autoplay: true,
                        clickable: false
                    });
                })(jQuery)
            </script>
    <?php } } ?>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/javascripts/script.js"></script>
</body>
</html>