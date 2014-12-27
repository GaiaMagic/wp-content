<?php get_header(); ?>

<section id='links'>
    <?php $args = array(
    'orderby'          => 'rand',
    'order'            => 'ASC',
    'limit'            => -1,
    'title_before'     => '<h3 class=\'category-title box\'>',
    'title_after'      => '</h3>',
    'category_orderby' => 'id',
    'category_order'   => 'ASC',
    'class'            => 'item',
    'category_before'  => '<li id=%id class=%class>',
    'category_after'   => '</li>' ); ?>
    
    <ul class='clearfix'>
        <li class='page box item'>
            <article class='con'>
                <h2><?php the_title(); ?></h2>

                <div class='content'>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; ?>
                </div>
            </article>
        </li>
        <?php wp_list_bookmarks( $args ); ?>
    </ul>
</section>

<?php get_footer(); ?>
