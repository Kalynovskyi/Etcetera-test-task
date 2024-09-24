<?php get_header(); ?>

<main>

    <div class="flex-row">

        <div class="flex-col-8 flex-col-md-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="single-estate">

                        <h1><?php the_title(); ?></h1>
                        <?php if (get_field('estate_image')): ?>
                            <img src="<?php echo wp_get_attachment_url(get_field('estate_image', false, false)); ?>" alt="Room image">
                        <?php endif; ?>
                        <p><strong>Name:</strong> <?php the_field('estate_name'); ?></p>
                        <p><strong>Coordinates:</strong> <?php the_field('coordinates'); ?></p>
                        <p><strong>Floors:</strong> <?php the_field('floors'); ?></p>
                        <p><strong>Estate type:</strong> <?php the_field('estate_type'); ?></p>
                        <p><strong>Environmental friendliness:</strong> <?php the_field('environmental_friendliness'); ?></p>
                        <?php if (get_field('house_image')): ?>
                            <img src="<?php echo wp_get_attachment_url(get_field('house_image')); ?>" alt="Estate image">
                        <?php endif; ?>

                        <h2>Rooms:</h2>
                        <div>
                            <p><strong>Area:</strong> <?php the_field('area'); ?> square meter </p>
                            <p><strong>Amount of rooms:</strong> <?php the_field('amount_of_rooms'); ?></p>
                            <p><strong>Balcony:</strong> <?php the_field('balconies'); ?></p>
                            <p><strong>Bathroom:</strong> <?php the_field('bathroom'); ?></p>
                        </div>
                    </article>
            <?php endwhile;
            endif; ?>
        </div>

        <div class="flex-col-4 flex-col-md-12">
            <div id="secondary" class="sidebar-area">
                <?php get_sidebar(); // Include the sidebar 
                ?>
            </div>
        </div>

    </div>

</main>

<?php get_footer(); ?>