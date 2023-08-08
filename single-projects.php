<?php get_header(); ?>

<?php if (have_posts()): ?>
    <section class="section-post-projects">
        <div class="post-content-projects">
            <?php the_post_thumbnail('full', ['style' => 'width: 100%; height: auto;']) ?>
            <h2>
                <?php the_title() ?>
            </h2>
            <div class="post-description">
                    <div class="single-term">
                        <?php taxonomy_get_the_terms('categorie'); ?>
                    </div>
                <div class="single-projects-description">
                    <?= get_field('description_rapide'); ?>
                </div>
                <div class="single-projects-description">Date du projet :
                    <?= get_field('date'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>