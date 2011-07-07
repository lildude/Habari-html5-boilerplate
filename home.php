<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } 
$theme->display( 'header' ); 

foreach ( $posts as $post ) : ?>
			<article>
				<header>
					<h1><a href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title_out; ?></a></h1>
					<div class="entry-meta">
						<time datetime="<?php echo $post->pubdate->text_format('{c}'); ?>" pubdate="yes"><?php $post->pubdate->out(); ?></time><span class="post_author"> by <?php echo $post->author->displayname; ?></span>
						<span class="entry-tags">Tags: <?php echo ( count( $post->tags ) > 0 ) ? $post->tags_out : " - None - "; ?></span>
						<span class="entry-commentslink"><a href="<?php echo $post->permalink; ?>#comments" title="Comments on this post'"><?php echo $post->comments->approved->count . _n( ' Comment', ' Comments', $post->comments->approved->count ); ?></a></span>
					</div>
				</header>
				<div class="entry-content">
					<?php echo $post->content_out; ?>
				</div>
			</article>
		<?php if ( $request->display_entry === true ) { $theme->display( 'comments' ); } // Display comment form if viewing a single entry ?>
<?php endforeach; ?>
		
		</div> <!-- close #main -->
		
<?php $theme->display( 'footer' ); ?>