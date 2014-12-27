<?php get_header(); ?>

<section id='topic' class='clearfix'>
    <div class='r'>
        <div class='colorful'></div>
        <h3>文章</h3>
        <?php if ( have_posts() ) : ?>
        <ul class='clearfix'>
            <?php while ( have_posts() ) : the_post(); ?>
            <li class='<?php odd_even(); ?>'>
                <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
    
    <aside class='l'>
        <div class='colorful'></div>
        <h3>专题</h3>
        <?php $terms = apply_filters( 'taxonomy-images-get-terms', '', array('taxonomy' => 'topic'));
          if ( ! empty( $terms ) ) {
            print '<ul>';
            foreach( (array) $terms as $term ) {
              print '<li class=\'item\'><a href="' . esc_url( get_term_link( $term, $term->anime-series) ) . '">' . wp_get_attachment_image( $term->image_id, 'topic' ) . '</li>';
            }
            print '</ul>';
        }?>
    </aside>
</section>

<?php get_footer(); ?>
