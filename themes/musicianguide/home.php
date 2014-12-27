<?php get_header(); ?>
<section id='featured'>
    <ul class='clearfix'>
        <li class='yellow'>
            <div class='colorful'></div>
            <dl class='dl dl'>
                <dt>快讯</dt>
                <?php
                  $featured_yellow = new WP_Query( array(
                                                         'category_name' => 'news',
                                                         'showposts' => 5,
                  ));

                  while ( $featured_yellow->have_posts() ) : $featured_yellow->the_post();
                ?>
                <dd>
                    <div class='con'>
                        <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>
                            <span><?php the_title(); ?> -</span>
                            <span class='author'><?php the_author(); ?></span>
                        </a>
                    </div>
                </dd>
                <?php
                  endwhile;
                  wp_reset_postdata();
                ?>
            </dl>
        </li>

        <li class='red'>
            <div class='colorful'></div>
            <dl class='dl'>
                <dt>观点</dt>
                <?php
                  $featured_red = new WP_Query( array(
                                                         'category_name' => 'features',
                                                         'showposts' => 5,
                  ));

                  while ( $featured_red->have_posts() ) : $featured_red->the_post();
                ?>
                <dd>
                    <div class='con'>
                        <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>
                            <span><?php the_title(); ?> -</span>
                            <span class='author'><?php the_author(); ?></span>
                        </a>
                    </div>
                </dd>
                <?php
                  endwhile;
                  wp_reset_postdata();
                ?>
            </dl>
        </li>

        <li class='blue'>
            <div class='colorful'></div>
            <dl class='dl'>
                <dt>推荐</dt>
                <?php
                  $featured_blue = new WP_Query( array(
                                                         'category_name' => 'recommend',
                                                         'showposts' => 5,
                  ));

                  while ( $featured_blue->have_posts() ) : $featured_blue->the_post();
                ?>
                <dd>
                    <div class='con'>
                        <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>
                            <span><?php the_title(); ?> -</span>
                            <span class='author'><?php the_author(); ?></span>
                        </a>
                    </div>
                </dd>
                <?php
                  endwhile;
                  wp_reset_postdata();
                ?>
            </dl>
        </li>

        <li class='green'>
            <div class='colorful'></div>
            <dl class='dl'>
                <dt>其他</dt>
                <?php
                  $featured_green = new WP_Query( array(
                                                         'category_name' => 'related',
                                                         'showposts' => 5,
                  ));

                  while ( $featured_green->have_posts() ) : $featured_green->the_post();
                ?>
                <dd>
                    <div class='con'>
                        <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>
                            <span><?php the_title(); ?> -</span>
                            <span class='author'><?php the_author(); ?></span>
                        </a>
                    </div>
                </dd>
                <?php
                  endwhile;
                  wp_reset_postdata();
                ?>
            </dl>
        </li>
    </ul>
</section>

<section class='clearfix' id='homepage'>
    <section id='content'>
        <aside class='clearfix' id='banner'>
            <h3 class='l'>
                <a href='/heavy-the-big-run-of-the-2011-music-of-the-survival-status-of-research/'>
                    <img class='box' src='/images/banner-research.jpg' />
                </a>
            </h3>
            <h3 class='r'>
                <a href='http://youyanchu.com'>
                    <img class='box' src='/images/banner-youyanchu.jpg' />
                </a>
            </h3>
        </aside>

        <section class='category yellow'>
            <div class='colorful'></div>
            <h2>快讯</h2>
            <div class='articles clearfix'>
                  
                <?php
                  $sticky = get_option( 'sticky_posts' );
                  $category_yellow_featured = new WP_Query( array(
                                                                  'category_name' => 'news',
                                                                  'showposts' => 1,
                                                                  'post__in'  => get_option( 'sticky_posts' ),
                                                                  'ignore_sticky_posts' => 1
                  ));
                  
                  while ( $category_yellow_featured->have_posts() ) : $category_yellow_featured->the_post();
                  ?>
                <article class='first l'>
                    <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>
                        <?php if(has_post_thumbnail()):
                                 the_post_thumbnail('category-featured');
                        else: ?>
                        <img src='<?php home_url(); ?>/images/category-featured.png' title='<?php the_title(); ?>' />
                        <?php endif; ?>
                  </a>
                  <header>
                    <a class='title' href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
                  </header>
<div class='excerpt'><?php $excerpt = mb_substr(strip_tags($post->post_content), 0, 90); echo $excerpt; ?></div>
                </article>
                <?php
                  endwhile;
                  wp_reset_postdata();
                ?>
                  
                <div class='list r'>
                <?php
                  function filter_where( $where = '' ) {
                    $where .= " AND post_date > '" . date('Y-m-d', strtotime('-90 days')) . "'";
                    return $where;
                  }
                  
                  add_filter( 'posts_where', 'filter_where' );
                  $category_yellow = new WP_Query( array(
                                                         'category_name' => 'news',
                                                         'showposts' => 5,
                                                         'orderby' => 'meta_value',
                                                         'meta_key' => 'views',
                  ));
                  remove_filter( 'posts_where', 'filter_where' );
                  
                  while ( $category_yellow->have_posts() ) : $category_yellow->the_post();
                  ?>
                  <article class='clearfix'>
                    <div class='meta l'>
                      <div class='author'><?php the_author(); ?></div>
                      <time class='time'><?php the_time('y-m-d') ?></time>
                    </div>
                    <a class='title l' href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
<a class='comment-count r' href='<?php the_permalink(); ?>#comments'><?php comments_number(0, 1, '%'); ?></a>
                  </article>
                  <?php
                    endwhile;
                    wp_reset_postdata();
                  ?>
                </div>
            </div>
        </section>

        <section class='category red'>
            <div class='colorful'></div>
            <h2>观点</h2>
            <div class='articles clearfix'>
                  
                <?php
                  $sticky = get_option( 'sticky_posts' );
                  $category_red_featured = new WP_Query( array(
                                                                  'category_name' => 'features',
                                                                  'showposts' => 1,
                                                                  'post__in'  => get_option( 'sticky_posts' ),
                                                                  'ignore_sticky_posts' => 1
                  ));
                  
                  while ( $category_red_featured->have_posts() ) : $category_red_featured->the_post();
                  ?>
                <article class='first l'>
                    <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>
                        <?php if(has_post_thumbnail()):
                                 the_post_thumbnail('category-featured');
                        else: ?>
                        <img src='<?php home_url(); ?>/images/category-featured.png' title='<?php the_title(); ?>' />
                        <?php endif; ?>
                  </a>
                  <header>
                    <a class='title' href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
                  </header>
<div class='excerpt'><?php $excerpt = mb_substr(strip_tags($post->post_content), 0, 90); echo $excerpt; ?></div>
                </article>
                <?php
                  endwhile;
                  wp_reset_postdata();
                ?>
                  
                <div class='list r'>
                <?php
                  add_filter( 'posts_where', 'filter_where' );
                  $category_red = new WP_Query( array(
                                                         'category_name' => 'features',
                                                         'showposts' => 5,
                                                         'orderby' => 'meta_value',
                                                         'meta_key' => 'views',
                  ));
                  remove_filter( 'posts_where', 'filter_where' );
                  
                  while ( $category_red->have_posts() ) : $category_red->the_post();
                  ?>
                  <article class='clearfix'>
                    <div class='meta l'>
                      <div class='author'><?php the_author(); ?></div>
                      <time class='time'><?php the_time('y-m-d') ?></time>
                    </div>
                    <a class='title l' href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
<a class='comment-count r' href='<?php the_permalink(); ?>#comments'><?php comments_number(0, 1, '%'); ?></a>
                  </article>
                  <?php
                    endwhile;
                    wp_reset_postdata();
                  ?>
                </div>
            </div>
        </section>

        <section class='category blue'>
            <div class='colorful'></div>
            <h2>推荐</h2>
            <div class='articles clearfix'>
                  
                <?php
                  $sticky = get_option( 'sticky_posts' );
                  $category_blue_featured = new WP_Query( array(
                                                                  'category_name' => 'recommend',
                                                                  'showposts' => 1,
                                                                  'post__in'  => get_option( 'sticky_posts' ),
                                                                  'ignore_sticky_posts' => 1
                  ));
                  
                  while ( $category_blue_featured->have_posts() ) : $category_blue_featured->the_post();
                  ?>
                <article class='first l'>
                    <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>
                        <?php if(has_post_thumbnail()):
                                 the_post_thumbnail('category-featured');
                        else: ?>
                        <img src='<?php home_url(); ?>/images/category-featured.png' title='<?php the_title(); ?>' />
                        <?php endif; ?>
                  </a>
                  <header>
                    <a class='title' href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
                  </header>
<div class='excerpt'><?php $excerpt = mb_substr(strip_tags($post->post_content), 0, 90); echo $excerpt; ?></div>
                </article>
                <?php
                  endwhile;
                  wp_reset_postdata();
                ?>
                  
                <div class='list r'>
                <?php
                  add_filter( 'posts_where', 'filter_where' );
                  $category_blue = new WP_Query( array(
                                                         'category_name' => 'recommend',
                                                         'showposts' => 5,
                                                         'orderby' => 'meta_value',
                                                         'meta_key' => 'views',
                  ));
                  remove_filter( 'posts_where', 'filter_where' );
                  
                  while ( $category_blue->have_posts() ) : $category_blue->the_post();
                  ?>
                  <article class='clearfix'>
                    <div class='meta l'>
                      <div class='author'><?php the_author(); ?></div>
                      <time class='time'><?php the_time('y-m-d') ?></time>
                    </div>
                    <a class='title l' href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
<a class='comment-count r' href='<?php the_permalink(); ?>#comments'><?php comments_number(0, 1, '%'); ?></a>
                  </article>
                  <?php
                    endwhile;
                    wp_reset_postdata();
                  ?>
                </div>
            </div>
        </section>

        <section class='category green'>
            <div class='colorful'></div>
            <h2>其他</h2>
            <div class='articles clearfix'>
                  
                <?php
                  $sticky = get_option( 'sticky_posts' );
                  $category_green_featured = new WP_Query( array(
                                                                  'category_name' => 'related',
                                                                  'showposts' => 1,
                                                                  'post__in'  => get_option( 'sticky_posts' ),
                                                                  'ignore_sticky_posts' => 1
                  ));
                  
                  while ( $category_green_featured->have_posts() ) : $category_green_featured->the_post();
                  ?>
                <article class='first l'>
                    <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>
                        <?php if(has_post_thumbnail()):
                                 the_post_thumbnail('category-featured');
                        else: ?>
                        <img src='<?php home_url(); ?>/images/category-featured.png' title='<?php the_title(); ?>' />
                        <?php endif; ?>
                  </a>
                  <header>
                    <a class='title' href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
                  </header>
<div class='excerpt'><?php $excerpt = mb_substr(strip_tags($post->post_content), 0, 90); echo $excerpt; ?></div>
                </article>
                <?php
                  endwhile;
                  wp_reset_postdata();
                ?>
                  
                <div class='list r'>
                <?php
                  add_filter( 'posts_where', 'filter_where' );
                  $category_green = new WP_Query( array(
                                                         'category_name' => 'related',
                                                         'showposts' => 5,
                                                         'orderby' => 'meta_value',
                                                         'meta_key' => 'views',
                  ));
                  remove_filter( 'posts_where', 'filter_where' );
                  
                  while ( $category_green->have_posts() ) : $category_green->the_post();
                  ?>
                  <article class='clearfix'>
                    <div class='meta l'>
                      <div class='author'><?php the_author(); ?></div>
                      <time class='time'><?php the_time('y-m-d') ?></time>
                    </div>
                    <a class='title l' href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
<a class='comment-count r' href='<?php the_permalink(); ?>#comments'><?php comments_number(0, 1, '%'); ?></a>
                  </article>
                  <?php
                    endwhile;
                    wp_reset_postdata();
                  ?>
                </div>
            </div>
        </section>

    </section>

    <aside id='sidebar'>
        <?php include (TEMPLATEPATH . '/include/subscibe.php' ); ?>

        <?php include (TEMPLATEPATH . '/include/findus.php' ); ?>

        <?php get_search_form(); ?>

        <?php include (TEMPLATEPATH . '/include/banners.php' ); ?>

        <embed src=" http://tjs.sjs.sinajs.cn/t3/miniblog/static/swf/miniblogwidget.swf" wmode="transparent" quality="high" width="240" height="500" align="L" scale="noborder" flashvars="width=230&height=500&uid=1791950544&skin=skin1" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed>

        <div class='separator'></div>

        <?php include (TEMPLATEPATH . '/include/tags.php' ); ?>

        <?php include (TEMPLATEPATH . '/include/calendar.php' ); ?>

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
    </aside>
</section>
<?php get_footer(); ?>
