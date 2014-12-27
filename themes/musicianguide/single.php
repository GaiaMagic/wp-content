<?php get_header(); ?>

<section class='article clearfix'>
    <section id='content'>
        <div class='colorful'></div>

        <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>

        <div class='separator'></div>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id='article' <?php post_class(); ?>>
            <header class='meta'>
                <h2 class='title'><?php the_title(); ?></h2>
                
                <span>By <span class='author'><?php the_author(); ?></span></span>
                <time datetime='<?php echo date(DATE_W3C); ?>'><?php the_time('Y-m-d') ?></time>
            </header>

            <div class='separator'></div>

            <div class='content'>
                <?php the_content(); ?>
            </div>
            <?php endwhile; endif; ?>

            <div class='separator'></div>

            <section id='author' class='clearfix'>
                <div class='l' id='avatar'>
                    <a href='<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>' class='avatar'><?php echo get_avatar( get_the_author_meta('ID'), 120 ); ?></a>
                    <script type='text/javascript'>
                      var weibo_id = "<?php the_author_meta('weibo'); ?>";
                    </script>
                </div>
                
                <div class='detail'>
                    <header class='name'><strong><?php the_author_meta('display_name'); ?></strong></header>
                    <div class='introduction'><?php the_author_meta('description'); ?></div>
                    <div class='separator'></div>
                    
                    <footer class='links'>
                        <a class='url' href='<?php the_author_meta('url'); ?>'>网站</a>
                        <a class='posts' href='<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>'>更多 <?php the_author_meta('display_name'); ?> 发表的文章 »</a>
                    </footer>
                </div>

                <span class='clearfix'></span>
                
                <div id='follow'></div>
            </section>
            
            <div class='separator'></div>

            <footer class='utilities'>
                <dl class='clearfix' id='tag'>
                    <dt>TAGS</dt>
                    <?php the_tags('<dd>', '</dd><dd>', '</dd>'); ?>
                </dl>

                <dl class='clearfix' id='socialshare'>
                    <dt>分享到</dt>
                    <dd>
                        <a class='db' href='//www.douban.com/recommend/?url=<?php the_permalink();?>&title=<?php the_title(); ?>'></a>
                    </dd>
                    <dd>
                        <a class='wb' href='//v.t.sina.com.cn/share/share.php?title=<?php the_title(); ?>&url=<?php the_permalink();?>'></a>
                    </dd>
                    <dd>
                        <a class='rr' href='//share.renren.com/share/buttonshare?link=<?php the_permalink();?>&title=<?php the_title(); ?>'></a>
                    </dd>
                    <dd>
                        <a class='tw' href='//twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>'></a>
                    </dd>
                    <dd>
                        <a class='fb' href='//www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>'></a>
                    </dd>
                    <dd>
                        <a class='de' href='//del.icio.us/post?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>'></a>
                    </dd>
                    <dd>
                        <a class='dg' href='//digg.com/remote-submit?phase=2&url=<?php the_permalink();?>&title=<?php the_title(); ?>'></a>
                    </dd>
                    <dd>
                        <a class='su' href='//www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>'></a>
                    </dd>
                </dl>
            </footer>

            <div class='separator'></div>

            <?php comments_template( '', true ); ?>

        </article>
    </section>

    <aside id='sidebar'>
        <?php include (TEMPLATEPATH . '/include/subscibe.php' ); ?>

        <?php get_search_form(); ?>

        <?php include (TEMPLATEPATH . '/include/banners.php' ); ?>

        <div id='popular'>
            <ul class='idTabs clearfix'>
                <li>
                    <a href='#month-popular'>本月热门</a>
                </li>
                <li>
                    <a href='#most-popular'>历史热门</a>
                </li>
                <li>
                    <a href='#most-commented'>最近热评</a>
                </li>
            </ul>

            <?php include (TEMPLATEPATH . '/include/month-popular.php' ); ?>

            <?php include (TEMPLATEPATH . '/include/most-popular.php' ); ?>

            <?php include (TEMPLATEPATH . '/include/most-commented.php' ); ?>

        </div>

        <?php include (TEMPLATEPATH . '/include/tags.php' ); ?>

        <?php include (TEMPLATEPATH . '/include/calendar.php' ); ?>
        </div>
    </aside>
</section>

<?php get_footer(); ?>
