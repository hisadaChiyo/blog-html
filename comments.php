<?php
if (post_password_required()) {
    return;
}

$commenter = wp_get_current_commenter();
?>

<div id="respond">
    <div class="title">
        <h2 class="comment-reply-title">Comment</h2>
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
        '<label for="author">名前</label>
        <input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '">

        <label for="comment">コメント <span class="required">必須</span></label>
        <textarea id="comment" name="comment" rows="8" required></textarea>',
        'submit_button' =>
        '<div class="form-submit">
            <input name="submit" type="submit" id="submit" class="submit" value="送信">
        </div>',
    );

    comment_form($args);
    ?>

    <?php if (have_comments()) : ?>


        <ol class="form-item">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 0,
                'callback'    => 'my_comment_template',
            ));
            ?>
        </ol>

    <?php endif; ?>

</div>