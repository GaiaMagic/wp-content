<?php get_header(); ?>

<div id="ultimate">
  <div class="intro box section">
    <h2 class="title"><?php the_title(); ?></h2>
  </div>

  <ul class="banners section clearfix">
    <li class="item">
      <a href="http://musicianguide.cn/mg/?utm_source=mg&utm_medium=selectedbanner&utm_campaign=mg"><img src="http://musicianguide.cn/wp-content/themes/awesomeness/assets/images/selected/banner-1.jpg"/></a>
      <div class="desc">邀请各路“大牛”解答以一问一答的形式解答包括音乐节、演出等实际问题，教你如何从零开始成为专业音乐人。</div>
    </li>

    <li class="item">
      <a href="http://musicianguide.cn/heavy-the-big-run-of-the-2011-music-of-the-survival-status-of-research/?utm_source=mg&utm_medium=selectedbanner&utm_campaign=mg"><img src="http://musicianguide.cn/wp-content/themes/awesomeness/assets/images/selected/banner-2.jpg"/></a>
      <div class="desc">中国的音乐人各项细则调研，曲风、城市、收入、需要的帮助等结果全面解析中国音乐人生存现状。</div>
    </li>
    
    <li class="item">
      <a href="http://musicianguide.cn/performance-current-market-conditions-a-large-deconstruction-2011-china-performed-research/?utm_source=mg&utm_medium=selectedbanner&utm_campaign=mg"><img src="http://musicianguide.cn/wp-content/themes/awesomeness/assets/images/selected/banner-3.jpg"/></a>
      <div class="desc">要办好一场演出需要考虑多方面的因素，看中国音乐演出市场调研，一张信息图，助你分析听众喜好。</div>
    </li>
    
    <li class="item last">
      <a href="http://hepaimusic.com/dream?utm_source=mg&utm_medium=selectedbanner&utm_campaign=mg"><img src="http://musicianguide.cn/wp-content/themes/awesomeness/assets/images/selected/banner-4.jpg"/></a>
      <div class="desc">众多音乐项目，没有行业关系也能从最基础的志愿者、网站编辑、实习生等基础项目做起，建立起自己的行业履历，发展更长远的目标。</div>
    </li>
  </ul>

  <div class="collections section">
    <div class="collection box">
      <?php $tag = get_term_by('slug', '成为音乐人', 'post_tag'); ?>
      <h3 class="title"><?php echo $tag->name; ?></h3>
      <div class="desc"><?php echo $tag->description; ?></div>
      <ul class="posts">
        <?php query_posts('nopaging=true&tag=' . $tag->slug); while ( have_posts() ) : the_post(); ?>
        <li class="clearfix">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <span class="meta">by <?php the_author(); ?></span>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>

    <div class="collection box">
      <?php $tag = get_term_by('slug', '建立品牌', 'post_tag'); ?>
      <h3 class="title"><?php echo $tag->name; ?></h3>
      <div class="desc"><?php echo $tag->description; ?></div>
      <ul class="posts">
        <?php query_posts('nopaging=true&tag=' . $tag->slug); while ( have_posts() ) : the_post(); ?>
        <li class="clearfix">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <span class="meta">by <?php the_author(); ?></span>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>

    <div class="collection box">
      <?php $tag = get_term_by('slug', '推广自己', 'post_tag'); ?>
      <h3 class="title"><?php echo $tag->name; ?></h3>
      <div class="desc"><?php echo $tag->description; ?></div>
      <ul class="posts">
        <?php query_posts('nopaging=true&tag=' . $tag->slug); while ( have_posts() ) : the_post(); ?>
        <li class="clearfix">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <span class="meta">by <?php the_author(); ?></span>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>

    <div class="collection box">
      <?php $tag = get_term_by('slug', '演出要注意的问题', 'post_tag'); ?>
      <h3 class="title"><?php echo $tag->name; ?></h3>
      <div class="desc"><?php echo $tag->description; ?></div>
      <ul class="posts">
        <?php query_posts('nopaging=true&tag=' . $tag->slug); while ( have_posts() ) : the_post(); ?>
        <li class="clearfix">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <span class="meta">by <?php the_author(); ?></span>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>

    <div class="collection box">
      <?php $tag = get_term_by('slug', '专业音乐人', 'post_tag'); ?>
      <h3 class="title"><?php echo $tag->name; ?></h3>
      <div class="desc"><?php echo $tag->description; ?></div>
      <ul class="posts">
        <?php query_posts('nopaging=true&tag=' . $tag->slug); while ( have_posts() ) : the_post(); ?>
        <li class="clearfix">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <span class="meta">by <?php the_author(); ?></span>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>

    <div class="collection box">
      <?php $tag = get_term_by('slug', '想出专辑？', 'post_tag'); ?>
      <h3 class="title"><?php echo $tag->name; ?></h3>
      <div class="desc"><?php echo $tag->description; ?></div>
      <ul class="posts">
        <?php query_posts('nopaging=true&tag=' . $tag->slug); while ( have_posts() ) : the_post(); ?>
        <li class="clearfix">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <span class="meta">by <?php the_author(); ?></span>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>

    <div class="collection box">
      <?php $tag = get_term_by('slug', 'MG推荐', 'post_tag'); ?>
      <h3 class="title"><?php echo $tag->name; ?></h3>
      <div class="desc"><?php echo $tag->description; ?></div>
      <ul class="posts">
        <?php query_posts('nopaging=true&tag=' . $tag->slug); while ( have_posts() ) : the_post(); ?>
        <li class="clearfix">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <span class="meta">by <?php the_author(); ?></span>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>

    <div class="collection box">
      <?php $tag = get_term_by('slug', '案例分析', 'post_tag'); ?>
      <h3 class="title"><?php echo $tag->name; ?></h3>
      <div class="desc"><?php echo $tag->description; ?></div>
      <ul class="posts">
        <?php query_posts('nopaging=true&tag=' . $tag->slug); while ( have_posts() ) : the_post(); ?>
        <li class="clearfix">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <span class="meta">by <?php the_author(); ?></span>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>

    <div class="collection box">
      <?php $tag = get_term_by('slug', '行业评论', 'post_tag'); ?>
      <h3 class="title"><?php echo $tag->name; ?></h3>
      <div class="desc"><?php echo $tag->description; ?></div>
      <ul class="posts">
        <?php query_posts('nopaging=true&tag=' . $tag->slug); while ( have_posts() ) : the_post(); ?>
        <li class="clearfix">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <span class="meta">by <?php the_author(); ?></span>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>
  </div>

  <div class="findus section">
    <h3 class="title">除了阅读以上文章，还可以</h3>
    
    <div class="desc">到这些地方发问、讨论：</div>

    <div class="items clearfix">
      <a href="http://e.weibo.com/musicianguidecn" class="sina">新浪微博</a>
      <a href="http://site.douban.com/111914/" class="douban">豆瓣</a>
      <a href="http://t.qq.com/musicianguidecn" class="tencent">腾讯微博</a>
      <a href="http://zhan.renren.com/musicianguide" class="renren">人人小站</a>
      <a href="http://musicianguide.lofter.com/" class="lofter">Lofter</a>
      <a href="http://musicianguidecn.com/" class="diandian">点点网</a>
      <a href="http://www.zhihu.com/topic/%E9%9F%B3%E4%B9%90%E4%BA%BA%E6%94%BB%E7%95%A5" class="zhihu">知乎</a>
    </div>
  </div>

  <div class="joinus section">
      <h3 class="title">向我们提供更多高质量的内容</h3>

      <div class="desc">成为音乐人攻略志愿编辑，详情参见 <a href="http://hepaimusic.com/posts/50403c348f0e7b5ac50000f2?utm_source=mg&utm_medium=hepaiarticle&utm_campaign=mg">音乐人攻略志愿者招募</a>。</div>
  </div>
</div>

<?php include (TEMPLATEPATH . '/includes/share.php' ); ?>

<!-- footer start here -->
    </div>

    <div class="footer-wrapper wrapper">
      <div id="footer" class="container clearfix">
        <div class="section">
            <div class="title">分享给其他朋友</div>

            <div class="content">
              <p>不错吧？欢迎分享我们的文章给自己身边的朋友。进入感兴趣文章链接，点击左边圆形按钮即可一键分享。</p>
              <p>感谢一路以来支持我们，帮助我们的志愿者们（排名不分先后）：</p>
              <p class="contributors">
                <a href="http://weibo.com/u/2143208242">会长</a>
                <a href="http://weibo.com/172510969">sheila</a>
                <a href="http://weibo.com/ccici">Cee Chan</a>
                <a href="http://weibo.com/fuckeachother">江川</a>
                <a href="http://weibo.com/missthee">W</a>
                <a href="http://weibo.com/oliviato">杉菜</a>
                <a href="http://weibo.com/u/1930915313">Echo</a>
                <a href="http://weibo.com/natsui">葫芦</a>
                <a href="http://weibo.com/518043123">sugar</a>
                <a href="http://weibo.com/syd413">Syd</a>
                <a href="http://weibo.com/tracyping0707">Tracy</a>
                <a href="http://weibo.com/u/1833806752">小若</a>
                <a href="http://e.weibo.com/91022388">蒋云倩</a>
                <a href="http://weibo.com/roxana621">豆豆</a>
                <a href="http://weibo.com/u/1016953692">Krist</a>
                <a href="http://weibo.com/qqleeme">李俏</a>
                <a href="http://weibo.com/deppvivian">depp</a></p>
            </div>
        </div>
      </div>
    </div>
<?php wp_footer() ?>
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/javascripts/jquery-1.7.2.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/javascripts/jquery.masonry.min.js"></script>
<script type="text/javascript">
$('.collections').masonry({
  gutterWidth: 15,
  columnWidth: 465,
  itemSelector: '.collection'
});
</script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/javascripts/script.js"></script>
</body>
</html>
