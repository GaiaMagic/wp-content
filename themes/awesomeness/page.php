<?php get_header(); ?>

<div id="content" role="main" class="box">

    <?php while ( have_posts() ) : the_post(); ?>
        <article class="article">
            <header class="header">
                <h1><?php the_title() ?></h1>
            </header>

            <hr>

            <div class="content"><?php the_content() ?></div>
        </article>
    <?php endwhile; ?>

</div>

<?php get_footer(); ?>