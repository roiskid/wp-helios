<?php
/**
 * The template used for displaying post content
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */
?>

<hr />

<?php if ( !is_single() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('special'); ?>>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php endif; ?>
    <header>
        <?php
        if ( is_single() ) :
            the_title( '<h2 class="entry-title">', '</h2>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
        ?>
    </header>
	<div class="entry-content">
        <?php if (!is_home() && has_post_thumbnail()) :
            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            $feat_image_title = get_post(get_post_thumbnail_id($post->ID))->post_title;
        ?>
            <div class="post_thumbnail"><img src="<?=$feat_image?>" alt="<?=$feat_image_title?>"></div>
        <?php endif; ?>

        <?php
        if ( is_home() ) :
            if (has_excerpt($post->ID)) {
                the_excerpt();
            } else {
                the_content();
            }
        else :
            the_content();
        endif;
        ?>

<?php if (!is_home()) : ?>
        <span class="byline"><?php _e( 'Posted by', 'wphelios' ); ?> <?php echo get_the_author_link(); ?> on <?php the_date(); ?>
        <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?> in <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'wphelios' ) ); ?></span>
        <?php endif; ?>
<?php endif; ?>

<?php if( has_tag() ): ?>
	<div class="post-meta">
		<?php the_tags( 'Tagged with: ' ); ?>
	</div>  <!-- .post-meta -->
<?php endif; ?>

<footer><?php if ( !is_single() ) : ?><a class="button" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Continue Reading', 'wphelios' ); ?></a><?php endif; ?></footer>

<?php
wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wphelios' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
) );

edit_post_link( __( 'Edit', 'wphelios' ), '<span class="edit-link">', '</span>' );
?>
	</div>  <!-- .entry-content -->
</article>  <!-- #post-post-<?php the_ID(); ?> -->