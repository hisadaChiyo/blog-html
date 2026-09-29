<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?php bloginfo('description') ?>">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap">
    <?php wp_head(); ?>
</head>

<body class="top" <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div class="inner">
            <a href="<?php echo is_front_page() ? '#' : esc_url(home_url('/')); ?>" class="logo-link">
                <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/blog_rippu_1.png')); ?>" alt="ホームへ戻る">
            </a>
            <!-- 💡ハンバーガーボタン -->
            <div class="hamburger-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul class="gnav">
                <li><a href="<?php echo esc_url(home_url('/#menu1')); ?>">Blog</a></li>
                <li><a href="<?php echo esc_url(home_url('/#menu2')); ?>">Categories</a></li>
            </ul>
        </div>
    </header>