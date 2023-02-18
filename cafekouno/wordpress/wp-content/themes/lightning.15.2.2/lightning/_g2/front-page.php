<?php lightning_get_template_part( 'header' ); ?>

<?php
do_action( 'lightning_top_slide_before' );
if ( empty( $lightning_theme_options['top_slide_hide'] ) ) {
	if ( $bootstrap == '3' ) {
		$old_file_name[] = 'module_slide.php';
		if ( locate_template( $old_file_name, false, false ) ) {
			locate_template( $old_file_name, true, false );
		} else {
			get_template_part( 'template-parts/slide', 'bs3' );
		}
	} else {
		get_template_part( 'template-parts/slide', 'bs4' );
	}
}
do_action( 'lightning_top_slide_after' );
?>

<div class="<?php lightning_the_class_name( 'siteContent' ); ?>">
<?php do_action( 'lightning_siteContent_prepend' ); ?>
<div class="container">
<?php do_action( 'lightning_siteContent_container_prepend' ); ?>
<div class="row">

			<div class="<?php lightning_the_class_name( 'mainSection' ); ?>">

			<?php do_action( 'lightning_mainSection_prepend' ); ?>

			<?php do_action( 'lightning_home_content_top_widget_area_before' ); ?>

			<?php if ( is_active_sidebar( 'home-content-top-widget-area' ) ) : ?>
				<?php dynamic_sidebar( 'home-content-top-widget-area' ); ?>
			<?php endif; ?>

			<?php do_action( 'lightning_home_content_top_widget_area_after' ); ?>

			<?php if ( apply_filters( 'is_lightning_home_content_display', true ) ) : ?>

				<?php if ( have_posts() ) : ?>

					<?php if ( 'page' == get_option( 'show_on_front' ) ) : ?>

						<?php
						while ( have_posts() ) :
							the_post();
							?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'lightning_article_outer_class', '' ) ); ?>>
							<?php do_action( 'lightning_entry_body_before' ); ?>
						<div class="<?php lightning_the_class_name( 'entry-body' ); ?>">
							<?php the_content(); ?>
						</div>
							<?php do_action( 'lightning_entry_body_after' ); ?>
							<?php
							wp_link_pages(
								array(
									'before' => '<div class="page-link">' . 'Pages:',
									'after'  => '</div>',
								)
							);
							?>
						 </article><!-- [ /#post-<?php the_ID(); ?> ] -->

					<?php endwhile; ?>

				<?php else : ?>
					<?php do_action( 'lightning_loop_before' ); ?>

					<div class="<?php lightning_the_class_name( 'postList' ); ?>">

					<?php if ( apply_filters( 'is_lightning_extend_loop', false ) ) : ?>

						<?php do_action( 'lightning_extend_loop' ); ?>

					<?php else : ?>

						<?php
						/**
						 * Dealing with old files
						 * Actually, it's ok to only use get_template_part().
						 * It is measure for before version 7.0 that loaded module_loop_***.php.
						 */
						$postType        = lightning_get_post_type();
						$old_file_name[] = 'module_loop_' . $postType['slug'] . '.php';
						$old_file_name[] = 'module_loop_post.php';
						$require_once    = false;

						global $lightning_loop_item_count;
						$lightning_loop_item_count = 0;

						while ( have_posts() ) :
							the_post();

							if ( locate_template( $old_file_name, false, $require_once ) ) {
								locate_template( $old_file_name, true, $require_once );
							} else {
								get_template_part( 'template-parts/post/loop', $postType['slug'] );
							}

							$lightning_loop_item_count++;
							do_action( 'lightning_loop_item_after' );

						endwhile;
					endif;
					?>

					<?php
						the_posts_pagination(
							array(
								'mid_size'           => 1,
								'prev_text'          => '&laquo;',
								'next_text'          => '&raquo;',
								'type'               => 'list',
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lightning' ) . ' </span>',
							)
						);
					?>

					</div><!-- [ /.postList ] -->
					<?php do_action( 'lightning_loop_after' ); ?>

				<?php endif; // if ( 'page' == get_option('show_on_front') ) : ?>

			<?php else : ?>

				<div class="well"><p><?php _e( 'No posts.', 'lightning' ); ?></p></div>

			<?php endif; // have_post() ?>

			<?php endif; // if ( apply_filters( 'is_lightning_home_top_posts_display', true ) ) : ?>

			<?php do_action( 'lightning_mainSection_append' ); ?>
			</div><!-- [ /.mainSection ] -->

			<?php if ( lightning_is_subsection_display() ) : ?>
				<div class="<?php lightning_the_class_name( 'sideSection' ); ?>">
					<?php do_action( 'lightning_sideSection_prepend' ); ?>
					<?php 
					if ( is_front_page() ) {
						lightning_get_template_part( 'sidebar' );
					} else {
						lightning_get_template_part( 'sidebar', get_post_type() );
					}
					?>
					<?php do_action( 'lightning_sideSection_append' ); ?>
				</div><!-- [ /.subSection ] -->
			<?php endif; ?>

<?php do_action( 'lightning_additional_section' ); ?>

</div><!-- [ /.row ] -->
<?php do_action( 'lightning_siteContent_container_apepend' ); ?>
</div><!-- [ /.container ] -->
<?php do_action( 'lightning_siteContent_apepend' ); ?>
</div><!-- [ /.siteContent ] -->
<?php lightning_get_template_part( 'footer' ); ?>
