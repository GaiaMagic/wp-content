<?php get_header(); ?>

<?php $terms = apply_filters( 'taxonomy-images-get-terms', '', array('taxonomy' => 'topic'));
if ( ! empty( $terms ) ) {
    print '<ul>';
    foreach( (array) $terms as $term ) {
        print '<li><a href="' . esc_url( get_term_link( $term, $term->anime-series) ) . '">' . wp_get_attachment_image( $term->image_id, 'detail' ) . '</li>';
    }
    print '</ul>';
}?>

<?php get_footer(); ?>






