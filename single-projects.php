<?php get_header(); ?>

<?php if (have_posts()): ?>
    <section class="section-post-projects">
        <div class="post-content-projects">
            <h2>
                <?php the_title() ?>
            </h2>
            <?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto;']) ?>
            <div class="post-description">
                <div class="single-projects-description">Catégorie :
                    <?php taxonomy_get_the_terms('categorie'); ?>
                </div>
                <div class="single-projects-description">Description :
                    <?= get_field('description_rapide'); ?>
                </div>
                <div class="single-projects-description">Année :
                <?= get_field('date'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>