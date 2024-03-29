<?php

if(isset($_SERVER['SCRIPT_FILENAME'])&&basename($_SERVER['SCRIPT_FILENAME'])==="comments") {
    die('Please do not load this page directly. Thanks!');
}

if(post_password_required()) {
    echo "This post is password protected. Enter the password to view comments.";
    return;
}
?>

<section class="comments">
    <div class="row">
        <?php if(have_comments()) { ?>
        <h2><?php comments_number('No Responses', 'One Response', '% Responses' ); ?></h2>
        <?php get_template_part("components/comments/nav"); ?>
        <ol>
            <?php wp_list_comments(); ?>
        </ol>
        <?php get_template_part("components/comments/nav"); ?>
        <?php } else if(!comments_open()) { ?>
         <p>Comments are closed.</p>
        <?php } ?>
    </div>
    <div class="row">
        <div id="respond">
            <h2><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h2>
            <div class="cancel-comment-reply">
                <?php cancel_comment_reply_link(); ?>
            </div>
            <?php if(get_option('comment_registration') && !is_user_logged_in()) { ?>
            <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
            <?php } else { ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <?php if(is_user_logged_in()) { ?>
                <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
                <?php } else { ?>
                <div>
                    <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                    <label for="author">Name <?php if ($req) echo "(required)"; ?></label>
                </div>
                <div>
                    <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                    <label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label>
                </div>
                <div>
                    <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                    <label for="url">Website</label>
                </div>
                <?php } ?>
                <div>
                    <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
                </div>
                <div>
                    <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
                    <?php comment_id_fields(); ?>
                </div>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
            <?php } ?>
        </div>
    </div>
</section>
<?php