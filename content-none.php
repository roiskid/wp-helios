<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */
?>
        <!-- Banner -->
        <section id="banner">
            <header>
                <h2><?php _e( 'Nothing Found', 'wphelios' ); ?></h2>
            </header>
        </section>

        <!-- Main -->
        <div class="wrapper style2">
            <div class="container">

                <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wphelios' ), admin_url( 'post-new.php' ) ); ?></p>

                <?php elseif ( is_search() ) : ?>

                <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wphelios' ); ?></p>

                <?php else : ?>

                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wphelios' ); ?></p>

                <?php endif; ?>

<?php get_footer(); ?>