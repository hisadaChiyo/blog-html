<?php get_header(); ?>
<main>

    <div class="inner">
        <div class="comment">
            <div class="error">404</div>
            <div class="errortext">
                <p>全力でお探ししたのですが、大変残念ながらお探しのページが見つけれませんでした。</p>
                <p>再度目的のサイトをお探ししていただけたら幸いです。</p>
            </div>
            <div class="meikutati">
                <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/404burasi.png')); ?>" alt=""> <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/404rippu_1.png')); ?>" alt="">
            </div>
            <div class="pagination2">
                <ul>
                    <li><?php previous_post_link('%link', '<'); ?></li>
                    <li class="back"><a href="<?php echo esc_url(home_url('/')); ?>">topへ戻る</a></li>
                    <li><?php next_post_link('%link', '>'); ?></li>
                </ul>
            </div>
        </div>

    </div>

</main>
<?php get_footer(); ?>