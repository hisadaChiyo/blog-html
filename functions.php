<?php
#初期設定(命令の名前は被らないようにする「例：mytheme_...」）
function mytheme_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('title-tag'); // <title>タグの出力をWordPressに任せる（必須）
    add_theme_support('automatic-feed-links'); // RSSフィードのリンクを自動出力（必須）
    add_theme_support('wp-block-styles'); // ブロックエディタの基本スタイルをテーマに適用（Gutenberg対応）
    add_theme_support('responsive-embeds'); // YouTubeなどの埋め込み動画をレスポンシブ対応にする

    // HTML5準拠のマークアップを有効化（現代のテーマ開発で必須）
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // 絵文字のスクリプトとスタイルを削除（読み込み速度向上）
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // セキュリティ強化
    remove_action('wp_head', 'wp_generator'); // WordPressのバージョン情報を削除
    remove_action('wp_head', 'rsd_link'); // EditURI（RSD）のリンクを削除
    remove_action('wp_head', 'wlwmanifest_link'); // wlwmanifest（Windows Live Writer）のリンクを削除

}


/**
 * タイトルの区切り文字を変更
 */
function mytheme_change_title_separator($sep)
{
    return ' | ';
}


/**
 * 抜粋の文字数を指定
 */
function mytheme_custom_excerpt_length($length)
{
    return 10; // 10文字に変更
}
// 第3引数の「999」は実行の優先順位（他の設定より確実に優先させるため）
add_filter('excerpt_length', 'mytheme_custom_excerpt_length', 999);

/**
 * 抜粋の文末文字を指定
 */
function mytheme_custom_excerpt_more($more)
{
    return ' ... 続く'; // [...] から変更
}

/**
 * CSSとJavaScriptの読み込み
 */
function mytheme_enqueue_scripts()
{
    // ここに読み込ませたいファイル(CSS・JS)を指定する
    wp_enqueue_style('reset-css', 'https://cdn.jsdelivr.net/npm/destyle.css/destyle.min.css');

    wp_enqueue_style('my-style', get_stylesheet_uri(), array('reset-css'), filemtime(get_theme_file_path('/style.css')));

    wp_enqueue_script('my-script', get_theme_file_uri('/script.js'), array('jquery'), filemtime(get_theme_file_path('/script.js')), true);
}

add_action('pre_get_posts', function ($query) {
    if ($query->is_search() && $query->is_main_query()) {
        $query->set('post_type', 'page');
    }

    // 管理画面以外かつメインクエリの検索時のみ実行
    if (!is_admin() && $query->is_search() && $query->is_main_query()) {
        // 投稿（post）を検索対象に指定
        $query->set('post_type', 'post');
    }
});
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
add_filter('excerpt_more', 'mytheme_custom_excerpt_more');
add_filter('document_title_separator', 'mytheme_change_title_separator');
add_action('after_setup_theme', 'mytheme_setup');

add_filter('comment_form_default_fields', function ($fields) {
    $commenter = wp_get_current_commenter();

    $fields['author'] =
        '<label for="author">名前</label><input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '">';

    return $fields;
});



add_filter('comment_form_logged_in', '__return_empty_string');
add_filter('comment_form_field_cookies', '__return_empty_string');
