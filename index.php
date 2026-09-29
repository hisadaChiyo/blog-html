<?php get_header(); ?>

<main>
    <div class="meinvisual">
        <div class="container">
            <div class="headline">
                <div class="visuallyHidden">Hisada Blog</div>
                <div class="text" aria-hidden="true">
                    <span class="char" style="--char-index: 0">H</span>
                    <span class="char" style="--char-index: 1">i</span>
                    <span class="char" style="--char-index: 2">s</span>
                    <span class="char" style="--char-index: 3">a</span>
                    <span class="char" style="--char-index: 4">d</span>
                    <span class="char" style="--char-index: 5">a</span>
                    <span class="whitespace">&nbsp;</span>
                    <span class="char" style="--char-index: 6">B</span>
                    <span class="char" style="--char-index: 7">l</span>
                    <span class="char" style="--char-index: 8">o</span>
                    <span class="char" style="--char-index: 9">g</span>
                </div>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="inner">
            <section>
                <div class="title">
                    <h1 id="menu1">Blog</h1>
                    <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/matuge1 1.png')); ?>" alt="">
                </div>

                <div class="post">
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                    ?>
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
                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                    </a>
                                </div>
                                <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                    <p><?php the_time('Y/m/d'); ?></p>
                                </time>
                                <a href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?> </h2>
                                </a>
                            </article>
                    <?php
                        endwhile;
                    endif;
                    ?>

                </div>

                <div class="pagination">
                    <?php the_posts_pagination(
                        array(
                            'prev_text' => '<',
                            'next_text' => '>',
                            'type' => 'list',
                            'mid_size' => 1
                        )
                    ); ?>
                </div>
            </section>
            <div class="search">
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

    <div class="Categories" id="categories">
        <div class="inner">
            <div class="title">
                <h1 id="menu2">Categories</h1>
                <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/blog_masukara.png')); ?>" alt="">
            </div>
            <div class="tags">
                <?php
                $cats = get_categories(array(
                    'hide_empty' => true,
                ));

                foreach ($cats as $cat) :
                ?>
                    <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
                        <?php echo esc_html($cat->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="Profile">
        <div class="inner">
            <div class="title">
                <h1>profile</h1>
                <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/blog_burasi.png')); ?>" alt="">
            </div>
            <p class="name">久田千代</p>
            <p>トライデントコンピュータ専門学校</p>
            <p>Webデザイン学科</p>
            <div class="sixyumi">
                <p>♡趣味♡</p>
            </div>
            <p>ネイルチップ作り</p>
            <p>ガチャガチャ巡り</p>
            <ul class="sns-btn">
                <li>
                    <a href="https://instagram.com/chiyo_0502" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/Instagram_Glyph_Gradient.png')); ?>" alt="Instagram">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</main>
<?php get_footer(); ?>

<script>
    const btn = document.querySelector('.hamburger-btn');
    const menu = document.querySelector('header ul');

    btn.addEventListener('click', function() {
        btn.classList.toggle('open');
        menu.classList.toggle('open');
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.2.0/js/all.min.js"
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>