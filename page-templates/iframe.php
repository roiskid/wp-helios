<?php
/**
 * Template Name: iFrame Page
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */

get_header(); ?>

    <!-- Main -->
    <div class="wrapper style1">
        <div class="container">

            <?php
            // Start the Loop.
            while ( have_posts() ) : the_post();
                // Include the page content template.
                get_template_part( 'content', 'iframe' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            endwhile;
            ?>

<?php get_footer(); ?>