<?php get_header(); ?>
<section class='archives clearfix'>
    <section id='content'>
        <div class='colorful'></div>

        <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>

        <div class='separator'></div>

        <?php if ( have_posts() ) : ?>
        
        <section id='archives'>
            <?php while ( have_posts() ) : the_post(); ?>
            <article class='article clearfix'>
                <div class='main clearfix'>
                    <footer class='meta l'>
                        <div class='time'>
                            <time datetime='<?php echo date(DATE_W3C); ?>'><?php the_time('Y-m-d') ?></time>
                        </div>

                        <div class='separator'></div>

                        <p class='author'><?php the_author(); ?></p>
                    </footer>

                    <div class='content r'>
                        <header>
                            <h2 class='title'>
                                <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
                            </h2>
                        </header>

                        <div class='excerpt'>
                            <p><?php $excerpt = mb_substr(strip_tags($post->post_content), 0, 180); echo $excerpt; ?></p>
                        </div>
                    </div>
                </div>

                <a class='detail-link styled-btn r' href='<?php the_permalink(); ?>'>详细</a>
            </article>
            <?php endwhile; ?>
        </section>

        <div class='pagination clearfix'>
            <div class='pager clearfix'>
                <?php echo get_paginate_archive_page_links(); ?>
            </div>
        </div>
        <?php endif; ?>
    </section>

    <aside id='sidebar'>
        <?php include (TEMPLATEPATH . '/include/subscibe.php' ); ?>

        <?php get_search_form(); ?>

        <?php include (TEMPLATEPATH . '/include/banners.php' ); ?>

        <?php include (TEMPLATEPATH . '/include/authors.php' ); ?>

        <?php include (TEMPLATEPATH . '/include/tags.php' ); ?>

        <?php include (TEMPLATEPATH . '/include/calendar.php' ); ?>
    </aside>
</section>
<?php get_footer(); ?>
