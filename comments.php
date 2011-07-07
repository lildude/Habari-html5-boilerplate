<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>

		<div id="comments">
			<h2><?php echo $post->comments->moderated->count; ?> <?php _e('Responses to'); ?> <?php echo $post->title; ?></h2>

<?php
if ( $post->comments->moderated->count ) {
    foreach ( $post->comments->comments->moderated as $comment ) :
        $comment_url = ( $comment->url_out == '' ) ? $comment->name_out : '<a href="' . $comment->url_out . '">' . $comment->name_out . '</a>'; ?>
			
			<article id="comment-<?php echo $comment->id; ?>">
				<header>
					<h3 class="comment_author">Comment by <?php echo $comment_url; ?></h3>
					<time datetime="<?php echo $post->pubdate->text_format('{c}'); ?>" class="comment_time"> <?php echo $comment->date->out(); ?></time>
					<?php if ( $comment->status == Comment::STATUS_UNAPPROVED ) : ?><p class="notice"><em><strong><?php _e( 'Your comment is awaiting moderation.' ); ?></strong></em></p><?php endif; ?>
				</header>
				<div class="comment_content">
					<?php echo $comment->content_out; ?>
				</div>
			</article>

<?php
    endforeach;
} 
else { ?>
			<p><?php _e( 'There are currently no comments.' ); ?></p>
<?php } ?>

<?php 	if ( ! $post->info->comments_disabled ) { ?>
			<h2 id="respond" class="reply"><?php _e( 'Leave a Reply' ); ?></h2>
<?php	if ( Session::has_messages() ) {
		Session::messages_out();
	}

	$post->comment_form()->out();
} ?>
		</div>



