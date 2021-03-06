<?php
/**
 * The home template file
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */

$wphelios_theme_options = get_option( 'wphelios_theme_options' );

get_header(); ?>

        <!-- Banner -->
            <section id="banner">
                <header>
	                <?php if (!empty($wphelios_theme_options['home-logo'])) : ?>
		                <div id="home_logo"><img src="<?php echo $wphelios_theme_options['home-logo']; ?>" alt="<?php bloginfo( 'name' ); ?> logo" <?php if (!empty($wphelios_theme_options['logo-width'])) : ?> style="width:<?php echo $wphelios_theme_options['logo-width']; ?>px;"<?php endif; ?>/></div>
	                <?php else: ?>
		                <h2><?php bloginfo( 'name' ); ?></h2>
                    <?php endif; ?>
                    <p><?php bloginfo( 'description' ); ?></p>
                </header>
            </section>

        <!-- Carousel -->
            <section class="carousel">
                <div class="reel" style="overflow: visible; transform: translate(0px, 0px);">
                    <?php
                    if (is_array($wphelios_theme_options['carousel-category'])) {
	                    $cats_selected = implode(',', $wphelios_theme_options['carousel-category']);
                    } else {
	                    $cats_selected = 0;
                    }
                    $args = array(
                    'cat' => $cats_selected,
                    'post_type' => array( 'post', 'page' ),
                    'orderby' => 'menu_order',
                    'order' => 'asc',
                    'posts_per_page' => -1);
                    query_posts( $args );

                    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php
                        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                        $feat_image_title = get_post(get_post_thumbnail_id($post->ID))->post_title;
                        $subheading = get_post_meta( get_the_ID(), 'subheading', true );
                        ?>
                        <article class="">
                            <a href="<?php the_permalink() ?>"><div class="post_thumbnail"><img src="<?=$feat_image?>" alt="<?=$feat_image_title?>"></div></a>
                            <header>
                                <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                            </header>
                            <p><?=$subheading?></p>
                        </article>
                    <?php endwhile; endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
                <span class="forward" style="display: inline;"></span>
                <span class="backward" style="display: inline;"></span>
            </section>

		<!-- Main -->
			<div class="wrapper style2">
                <div class="container">

                <?php
                // Start the Loop.
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'content', get_post_format() );
                    endwhile;
                endif;
                ?>

<?php get_footer(); ?>
