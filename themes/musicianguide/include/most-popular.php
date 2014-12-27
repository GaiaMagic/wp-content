<dl class='dl' id='most-popular'>
    <?php
      $most_popular = new WP_Query( array(
                                          'showposts' => '5',
                                          'orderby' => 'meta_value',
                                          'meta_key' => 'views',
                                          ));
                                          
                                          while ( $most_popular->have_posts() ) : $most_popular->the_post();
    ?>
    <dd>
        <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
    </dd>

    <?php
      endwhile;
      wp_reset_postdata;
    ?>
</dl>
