<div id="ads">
        <?php if ( function_exists( 'ot_get_option' ) ) {
                $banners = ot_get_option( 'post_sidebar_banners', array() );

                if ( ! empty( $banners ) ) {
                        foreach( $banners as $banner ) {
                                echo '<a href="' . $banner['link'] . '" title="' . $banner['title'] . '" class="' . $banner['title'] . '"><img src="' . $banner['image'] . '" alt="' . $banner['title'] . '" /><span>' . $banner['description'] . '</span></a>';
                        }
                }
        } ?>
</div>