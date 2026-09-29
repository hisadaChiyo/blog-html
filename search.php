<?php get_header(); ?>

<div class="inner">
    <div class="kensaku">
        <?php if (is_search()) : ?>
            <p>「<?php echo get_search_query(); ?>」の検索結果</p>
        <?php endif; ?>
    </div>

    <div class="blog">

        <section>
            <?php if (have_posts()) : ?>
                <div class="title">
                    <h1 id="menu1">Blog</h1>
                    <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/matuge1 1.png')); ?>" alt="">
                </div>

                <div class="post">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="posts">
                            <div class="imgs">
                                <a href="<?php the_permalink(); ?>" class="category-tag">
                                    <span>
                                        <?php
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            echo esc_html($categories[0]->name);
                                        }
                                        ?>
                                    </span>
                                </a>
                                <a href="<?php the_permalink(); ?>" class="thumbnail-link">
                                    <div class="thumbnail">
                                        <?php
                                        if (has_post_thumbnail()):
                                            the_post_thumbnail('large');
                                        else:
                                        ?>
                                            <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/blog_img.png')); ?>" alt="" class="default-thumbnail">
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                <p><?php the_time('Y/m/d'); ?></p>
                            </time>
                            <a href="<?php the_permalink(); ?>">
                                <h2><?php the_title(); ?></h2>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>
                <div class="pagination">
                    <?php the_posts_pagination(
                        array(
                            'prev_text' => '<',
                            'next_text' => '>',
                            'type'      => 'list',
                            'mid_size'  => 1,
                        )
                    ); ?>
                </div>
            <?php else : ?>
                <?php get_template_part('template-parts/loop', 'not'); ?>
            <?php endif; ?>
        </section>

        <div class="search<?php echo is_search() ? ' is-searched' : ''; ?>">
            <div class="inner">
                <aside class="side-search">
                    <div class="title">
                        <h1 class="side-title">Search</h1>
                        <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/parett.png')); ?>" alt="">
                    </div>
                    <div class="sagasu">
                        <?php get_search_form(); ?>
                    </div>
                </aside>
            </div>
        </div>

    </div>
</div>
</div>
<?php get_footer(); ?>