<dl class='dl' id='most-commented'>
    <?php
      $most_commented = new WP_Query( array(
                                            'showposts' => '5',
                                            'orderby' => 'comment_count',
                                            ));
                                            
                                            while ( $most_commented->have_posts() ) : $most_commented->the_post();
    ?>
    <dd>
        <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
    </dd>

    <?php
      endwhile;
      wp_reset_postdata;
    ?>
</dl>
