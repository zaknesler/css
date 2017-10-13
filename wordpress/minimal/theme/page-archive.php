<?php
/**
 * @package WordPress
 * @subpackage Minimal
 */
/*
Template Name: archive
*/
?>

<?php get_header(); ?>

<div class="content">
    <div class="post" id="post-<?php the_ID(); ?>">
        <div class="post-header">
            <span class="post-header-title">
                <a href="/"><?php bloginfo('name'); ?></a>:
            </span>

            <span class="post-header-subtitle">
                archive
            </span>
        </div>

        <div class="post-content">
            <table class="archive">
                <?php
                    $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) as `month`, DAYOFMONTH(post_date) as `dayofmonth`, ID, post_name, post_title FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC";

                    $key = md5($query);

                    $cache = wp_cache_get('mp_archives', 'general');

                    if (!isset($cache[$key])) {
                        $arcresults = $wpdb->get_results($query);
                        $cache[$key] = $arcresults;
                        wp_cache_add('mp_archives', $cache, 'general');
                    } else {
                        $arcresults = $cache[$key];
                    }

                    if ($arcresults):
                        $last_year = 0;
                        $last_month = 0;

                        foreach ($arcresults as $arcresult):
                            $year = $arcresult->year;
                            $month = $arcresult->month;

                            if ($year != $last_year):
                                $last_year = $year;
                                $last_month = 0;

                                ?><tr class="archive-year">
                                    <th>
                                        <?php echo $arcresult->year; ?>
                                    </th>
                                </tr><?php
                            endif;

                            if ($month != $last_month):
                                $last_month = $month;

                                ?><tr class="archive-month">
                                    <th>
                                        <?php echo $wp_locale->get_month($arcresult->month); ?>
                                    </th>
                                    <td></td>
                                </tr><?php
                            endif;

                            ?><tr class="archive-day">
                                <th>
                                    <?php echo $arcresult->dayofmonth; ?>
                                </th>

                                <td>
                                    <a href="/<?php echo $arcresult->post_name; ?>">
                                        <?php echo strip_tags(apply_filters('the_title', $arcresult->post_title)); ?>
                                    </a>
                                </td>
                            </tr><?php
                        endforeach;
                    endif;
                ?>
            </table>
        </div>
    </div>

    <?php wp_link_pages(array('before' => '<p>', 'after' => '</p>')); ?>
</div>

<?php get_footer(); ?>
