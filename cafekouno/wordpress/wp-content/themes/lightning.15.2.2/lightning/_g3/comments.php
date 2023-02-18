<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package _s
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<?php if ( post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<?php 
	global $post;
	if ( comments_open( $post->ID ) || have_comments() ) : ?>
	<div id="comments" class="comments-area">
	<?php endif; ?>

		<?php // You can start editing here -- including this comment! ?>

		<?php if ( have_comments() ) : ?>
			<h2 class="comments-title">
				<?php
					printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'lightning' ),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>
			</h2>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'lightning' ); ?></h2>
					<div class="nav-links">

						<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'lightning' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'lightning' ) ); ?></div>

					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-above -->
			<?php endif; // check for comment navigation ?>

			<ol class="comment-list">
				<?php
					wp_list_comments(
						array(
							'style'      => 'ol',
							'short_ping' => true,
						)
					);
				?>
			</ol><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'lightning' ); ?></h2>
					<div class="nav-links">

						<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'lightning' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'lightning' ) ); ?></div>

					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-below -->
			<?php endif; // check for comment navigation ?>

		<?php endif; // have_comments() ?>

		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() ) :
		?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'lightning' ); ?></p>

		<?php endif; ?>

		<?php comment_form(); ?>

	<?php if ( comments_open( $post->ID ) || have_comments() ) : ?>
	</div><!-- #comments -->
	<?php endif; ?>

<?php endif; ?>