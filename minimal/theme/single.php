<?php get_header(); ?>

<div class="content">
    <div class="post" id="post-<?php the_ID(); ?>">
        <div class="post-header">
            <span class="post-header-title">
                <a href="/"><?php bloginfo('name'); ?></a>:
            </span>

            <span class="post-header-subtitle">
                <?php the_title(); ?>
            </span>
        </div>

        <div class="post-content">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <?php the_content('Read more &raquo;'); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php wp_link_pages(array('before' => '<p>', 'after' => '</p>')); ?>
</div>

<?php get_footer(); ?>
