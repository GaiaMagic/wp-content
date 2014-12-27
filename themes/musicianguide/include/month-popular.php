<dl class='dl' id='month-popular'>
    <?php
      $today = getdate();
      $month_popular = new WP_Query('year='.$today["year"].'&monthnum='.$today["mon"].'&showposts=5&orderby=meta_value&meta_key=views');
      
      while ( $month_popular->have_posts() ) : $month_popular->the_post();
    ?>
    <dd>
        <a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a>
    </dd>
    <?php
      endwhile;
      wp_reset_postdata;
    ?>
</dl>
