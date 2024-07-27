<?php
/**
 * Singular entry template
 *
 * @package lightning
 */

if ( is_page() ) {
	$entry_tag = 'div';
} else {
	$entry_tag = 'article';
}
?>
<<?php echo esc_attr( $entry_tag ); ?> id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'lightning_article_outer_class', 'entry entry-full' ) ); ?>>

	<?php
	// check single or loop that true.
	$is_entry_header_display = false; // is_page() and so on .
	if ( is_single() || is_archive() ) {
		$is_entry_header_display = apply_filters( 'lightning_is_entry_header', true );
	}
	?>

	<?php if ( $is_entry_header_display ) : ?>

		<header class="<?php lightning_the_class_name( 'entry-header' ); ?>">
			<h1 class="entry-title">
				<?php if ( is_single() ) : ?>
					<?php the_title(); ?>
				<?php else : ?>
					<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
					</a>
				<?php endif; ?>
			</h1>
			<?php lightning_the_entry_meta(); ?>
		</header>

	<?php endif; ?>

	<?php do_action( 'lightning_entry_body_before' ); ?>

	<div class="<?php lightning_the_class_name( 'entry-body' ); ?>">
		<?php do_action( 'lightning_entry_body_prepend' ); ?>
		<?php the_content(); ?>
<div class="row">
	<div class="col-md-4">
	<?php the_post_thumbnail('full'); ?>
	</div>
	<div class="col-md-8">
		<table>
			<tr>
				<th>所在地</th>
				<td><?php the_field('fac1'); ?></td>
			</tr>
			<tr>
				<th>TEL</th>
				<td><?php the_field('fac2'); ?></td>
			</tr>
			<tr>
				<th>営業時間</th>
				<td><?php the_field('fac3'); ?></td>
			</tr>
			<tr>
				<th>ジャンル</th>
				<td><?php
							$terms = get_the_terms($post->ID, 'facility_type');
							if ( $terms ) {
								foreach ( $terms as $term ) {
									$term_link = get_term_link( $term );
									echo '<a href="'.esc_url( $term_link ).'">'.$term->name.'</a>';
								}
							}
							?></td>
			</tr>
			<tr>
				<th>利用可能な設備・条件</th>
				<td><?php
							$terms = get_the_terms($post->ID, 'facility_tag');
							if ( $terms ) {
								foreach ( $terms as $term ) {
									$term_link = get_term_link( $term );
									echo '<a href="'.esc_url( $term_link ).'">'.$term->name.'</a>';
								}
							}
							?></td>
			</tr>
		</table>
	</div>
</div>
<div class="appeal">
		<h2>おすすめポイント</h2>
		<?php the_field('fac4'); ?>
		</div>

		<?php do_action( 'lightning_entry_body_apppend' ); ?>
	</div>

	<?php do_action( 'lightning_entry_body_after' ); ?>



	<?php do_action( 'lightning_entry_footer_before' ); ?>

	<?php if ( apply_filters( 'lightning_is_entry_footer', true ) ) : ?>

		<?php
			/**********************************************
			 * Category and tax data
			 */
			$args           = array(
				// translators: taxonomy name.
				'template'      => __( '<dl><dt>%s</dt><dd>%l</dd></dl>', 'lightning' ), // phpcs:ignore
				'term_template' => '<a href="%1$s">%2$s</a>',
			);
			$taxonomies     = VK_Helpers::get_display_taxonomies( get_the_ID(), $args );
			$taxnomies_html = '';

			if ( $taxonomies ) :
				?>

				<div class="<?php lightning_the_class_name( 'entry-footer' ); ?>">

					<?php
					foreach ( $taxonomies as $key => $value ) {
						$taxnomies_html .= '<div class="entry-meta-data-list entry-meta-data-list--' . $key . '">' . $value . '</div>';
					} // foreach

					$taxnomies_html = apply_filters( 'lightning_taxnomiesHtml', $taxnomies_html ); // phpcs:ignore
					echo wp_kses_post( $taxnomies_html );

					// tag list.
					$tags_list = get_the_tag_list();
					if ( $tags_list ) {
						?>
						<div class="entry-meta-data-list entry-meta-data-list--post_tag">
							<dl>
							<dt><?php esc_html_e( 'Tags', 'lightning' ); ?></dt>
							<dd class="tagcloud"><?php echo wp_kses_post( $tags_list ); ?></dd>
							</dl>
						</div><!-- [ /.entry-tag ] -->
					<?php } ?>

				</div><!-- [ /.entry-footer ] -->

		<?php endif; ?>

	<?php endif; ?>

</<?php echo esc_attr( $entry_tag ); ?>><!-- [ /#post-<?php the_ID(); ?> ] -->


<?php get_template_part('filter-search'); ?>