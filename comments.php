<?php
if (post_password_required()) {
    return;
}

$commenter = wp_get_current_commenter();
?>

<div id="respond">
    <div class="title">
        <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/parett.png')); ?>" alt="">
        <h4 class="comment-reply-title">Comment</h4>
    </div>

    <?php
    $args = array(
        'title_reply' => '',
        'title_reply_before' => '',
        'title_reply_after'  => '',
        'logged_in_as' => '',
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'fields' => array(),
        'comment_field' =>
        '<label for="author">名前</label><input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '">
         <label for="comment">コメント <span class="required">必須</span></label><textarea id="comment" name="comment" rows="8" required></textarea>',
        'submit_button' =>
        '<div class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="送信"></div>',
    );

    comment_form($args);
    ?>
    <
        </div>