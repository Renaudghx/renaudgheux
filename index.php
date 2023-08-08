<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div <?php generate_do_attr('content'); ?>>
	<main <?php generate_do_attr('main'); ?>>
		<?php $loop = new WP_Query(
			array(
				'post_type' => 'projects',
				'post_per_page' => 12,
				'orderby' => 'date',
				'order' => 'DESC',
			)
		);
		if ($loop->have_posts()): ?>
			<div class="projects_content">
				<?php while ($loop->have_posts()):
					$loop->the_post(); ?>
					<article class="card-project">
						<div class="card-img">
							<?php the_post_thumbnail('large', [
								'class' => 'card-img-top',
								'style' => 'height: 350px; width: 100%; object-fit:cover; border-radius: 20px 20px 0 0;'
							]);
							?>
						</div>
						<div class="card-body">
							<h2 class="card-title"><?php the_title() ?></h2>
							<div class="card-categorie">
								<?php taxonomy_get_the_terms('categorie'); ?>
							</div>
						</div>
						<div class="card-body-a">
							<a href="<?php the_permalink() ?>" class="card-link">Voir le pojet</a>
							<a href="<?= get_field('github') ?>" class="card-github" target="_blank"><img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/github.png" alt="github"></a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif;
		wp_reset_postdata(); ?>
	</main>
</div>

<?php
/**
 * generate_after_primary_content_area hook.
 *
 * @since 2.0
 */
do_action('generate_after_primary_content_area');

generate_construct_sidebars();

get_footer();