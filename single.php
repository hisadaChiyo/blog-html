<?php get_header(); ?>
<main>
    <div class="singlepe_ji">
        <div class="inner">
            <section>
                <div class="Preface">
                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                        <p><?php the_time('Y/m/d'); ?></p>
                    </time>
                    <h1><?php the_title(); ?> </h1>
                    <?php the_post_thumbnail('large') ?>
                    <div class="Prefaces">
                        <div class="post-contents">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

                <article class="sintixyan">
                    <!-- <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/sintixyan2.png')); ?>" alt="クレヨンしんちゃん公式サイトのトップページ"> -->
                </article>

                <article class="koimikuji">
                    <!-- <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/koimikuji.png')); ?>" alt="恋みくじサイトのトップページ"> -->
                </article>

            </section>

            <div class="comment">
                <div class="pagination2">
                    <ul>
                        <li><?php previous_post_link('%link', '<'); ?></li>
                        <li class="back"><a href="<?php echo esc_url(home_url('/')); ?>">一覧に戻る</a></li>
                        <li><?php next_post_link('%link', '>'); ?></li>
                    </ul>
                </div>
                <?php
                // コメントが開いているか、コメントが1件以上ある場合に表示
                if (comments_open() || get_comments_number()):
                    comments_template();
                endif;
                ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>