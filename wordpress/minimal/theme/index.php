<?php get_header(); ?>

<div class="content">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <div class="post" id="post-<?php the_ID(); ?>">
                <div class="post-header">
                    <span class="post-header-title">
                        <a href="/"><?php bloginfo('name'); ?></a>:
                    </span>

                    <span class="post-header-subtitle">
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                    </span>
                </div>

                <div class="post-content"><?php the_content('Read more &raquo;'); ?></div>
            </div>
        <?php endwhile; ?>

        <?php wp_link_pages(array('before' => '<p>', 'after' => '</p>')); ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
