<?php get_header(); ?>

<section id='links' class="box">
    <?php $blogroll = array(
    'orderby'          => 'rand',
    'title_before'     => '<h3 class=\'category-title boxes\'>',
    'title_after'      => '</h3>',
    'category_name'    => '友情链接',
    'class'            => 'item',
    'category_before'  => '<li id=%id class=%class>',
    'category_after'   => '</li>' );
    
    $args = array(
    'orderby'          => 'rand',
    'exclude_category' => '26',
    'title_before'     => '<h3 class=\'category-title boxes\'>',
    'title_after'      => '</h3>',
    'category_orderby' => 'id',
    'class'            => 'item',
    'category_before'  => '<li id=%id class=%class>',
    'category_after'   => '</li>' ); ?>

    <header>
        <h1 class="title">链接</h1>
    </header>

    <hr>
    
    <ul class='clearfix'>
        <li class='page boxes item'>
            <article class='con'>
                <h2><?php the_title(); ?></h2>

                <div class='content'>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                </div>
            </article>
        </li>
        <?php wp_list_bookmarks( $blogroll ); ?>
        <?php wp_list_bookmarks( $args ); ?>
    </ul>
</section>

<?php get_footer(); ?>
