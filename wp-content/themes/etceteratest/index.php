<?php get_header(); ?>

<main>
    <h1>Posts</h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_excerpt(); ?></p>
            </article>
    <?php endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>