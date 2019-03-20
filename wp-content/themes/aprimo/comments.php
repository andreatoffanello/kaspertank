<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aprimo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$is_comments = have_comments() ? 'have-comments' : 'no-comments';
?>

<div class="comment-area <?php echo esc_attr($is_comments); ?>">
        <?php
        if ( have_comments() ) : ?>
            <div class="comment-section">
                <h2> <?php comments_number( ' ', esc_html__('1 Comment', 'aprimo'), esc_html__('% Comments', 'aprimo') ); ?> </h2>
                <?php
                the_comments_navigation();
                wp_list_comments(array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'callback'	 => 'aprimo_comments',
                ));
                the_comments_navigation();
                ?>
            </div>
            <?php
        endif;
        ?>

        <div class="leave-comment">
            <h2> <?php esc_html_e('Leave a Comment', 'aprimo'); ?> </h2>
            <?php
            if(!is_user_logged_in()) { ?>
                <p> <?php esc_html_e('sing in to post your comment or sign-up if you don\'t have any account.', 'aprimo'); ?> </p>
                <?php
            }
            $commenter      = wp_get_current_commenter();
            $req            = get_option( 'require_name_email' );
            $aria_req       = ( $req ? " aria-required='true'" : '' );
            $fields =  array(
                'author' => '<div class="row"><div class="col-sm-6"><input type="text" name="author" id="name" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="'.esc_attr__('Name *', 'aprimo').'" '. $aria_req .'></div>',
                'email'	=> '<div class="col-sm-6"><input type="email" name="email" id="email" value="'.esc_attr($commenter['comment_author_email']).'" placeholder="'.esc_attr__('Email *', 'aprimo').'" '. $aria_req .'></div></div>',
            );
            $comments_args = array(
                'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
                'class_form'            => '',
                'submit_button'         => '<button class="theme-button"><span></span>'.esc_html__('Post Comment', 'aprimo').'</button>',
                'title_reply'           => '',
                'comment_notes_before'  => '',
                'comment_field'         => '<div class="row"><div class="col-xs-12"><textarea name="comment" placeholder="'.esc_attr__('Your Comment*', 'aprimo') .'" rows="5"></textarea></div></div>',
                'comment_notes_after'   => '',
            );
            comment_form($comments_args);
            ?>
        </div> <!-- /.leave-comment -->
</div>