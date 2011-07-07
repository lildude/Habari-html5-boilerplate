<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } 
$theme->display( 'header' ); 

foreach ( $posts as $post ) : ?>
			<article>
				<header>
					<h1><a href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title_out; ?></a></h1>
					<div class="entry-meta">
						<time datetime="<?php echo $post->pubdate_iso; ?>" pubdate="yes"><?php echo $post->pubdate->text_format('{d} {F} {Y}'); ?></time><span class="post_author"> by <a href="http://colinseymour.co.uk" target="_blank" rel="author"><?php echo $post->author->displayname; ?></a></span>
						<span class="entry-tags">Tags: <?php echo ( count( $post->tags ) > 0 ) ? $post->tags_out : " - None - "; ?></span>
						<span class="entry-commentslink"><a href="<?php echo $post->permalink; ?>#comments" title="Comments on this post'"><?php printf( '%d Comment', '%d Comments', $post->comments->approved->count, $post->comments->approved->count ); ?></a></span>
					</div>
				</header>
				<div class="entry-content">
					<?php echo $post->content_out; ?>
				</div>
			</article>
<?php endforeach; ?>

		</div> <!-- close #main -->
<?php 
$theme->display( 'sidebar' );
$theme->display( 'footer' ); ?>