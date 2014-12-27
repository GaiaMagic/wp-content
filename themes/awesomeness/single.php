<?php get_header(); ?>

<div id="page" class='clearfix'>
    <div id='content' class='box'>
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>

        <hr class="before-title">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id='article' <?php post_class(); ?>>
            <header class='header'>
                <h1 class='title'><?php the_title(); ?></h1>
                <div class="meta">
                    <span>By <span class='author'><?php the_author(); ?></span></span>
                    <time datetime='<?php echo date(DATE_W3C); ?>'><?php the_time('Y-m-d') ?></time>
                    <span class="tags"><?php the_tags(); ?></span>
                </div>
            </header>

            <hr>

            <div class='content'>
                <?php the_content(); ?>
            </div>
            <?php endwhile; endif; ?>

        </article>

        <div id='author' class='clearfix'>
          <div id='avatar'>
            <a href='<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>' class='avatar'><?php echo get_avatar( get_the_author_meta('ID'), 120 ); ?></a>
<script type='text/javascript'>
var weibo_id = "<?php the_author_meta('weibo'); ?>";
</script>
          </div>
          
          <div class='detail'>
<header class='name'><strong><?php the_author_meta('display_name'); ?></strong></header>
<div class='introduction'><?php the_author_meta('description'); ?></div>

<hr>

<footer class='links'>
  <a class='url' href='<?php the_author_meta('url'); ?>'>网站</a>
  <a class='posts' href='<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>'>更多 <?php the_author_meta('display_name'); ?> 发表的文章 »</a>
</footer>
          </div>

          <span class='clearfix'></span>
          
          <div id='follow'></div>
        </div>

        <div class="jiathis_style"><span class="jiathis_txt">分享到：</span>
          <a class="jiathis_button_qzone"></a>
          <a class="jiathis_button_tsina"></a>
          <a class="jiathis_button_tqq"></a>
          <a class="jiathis_button_renren"></a>
          <a class="jiathis_button_kaixin001"></a>
          <a class="jiathis_button_douban"></a>
          <a class="jiathis_button_tsohu"></a>
          <a class="jiathis_button_t163"></a>
          <a class="jiathis_button_fanfou"></a>
          <a class="jiathis_counter_style"></a>
        </div>

        <?php include (TEMPLATEPATH . '/includes/share.php') ?>

        <?php comments_template('', true); ?>
    </div>

    <aside id='sidebar'>
        <?php include (TEMPLATEPATH . '/includes/quicklinks.php') ?>

        <?php get_search_form(); ?>

        <?php include (TEMPLATEPATH . '/includes/ads.php' ); ?>

        <?php include (TEMPLATEPATH . '/includes/tags.php' ); ?>

        <?php include (TEMPLATEPATH . '/includes/calendar.php' ); ?>

        <?php include (TEMPLATEPATH . '/includes/authors.php' ); ?>
    </aside>
</div>

<?php get_footer(); ?>