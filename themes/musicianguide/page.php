<?php get_header(); ?>

<section id='page'>
    <div class='colorful'></div>
    
    <article class='page clearfix'>
        <header class='title l'>
            <h2><?php the_title(); ?></h2>
            <div class='separator'></div>
        </header>
        <div class='content'>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </article>
</section>

<?php get_footer(); ?>
