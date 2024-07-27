<?php if ( is_search() ) : ?>
	<?php $post_type = get_post_type( $post ); ?>
	<div class="fac-item <?php echo  $post_type ;?>">
	<h2><?php the_title(); ?></h2>
	<div class="fac-text">
		<div class="row">
			<div class="col-md-4">
				<?php the_post_thumbnail('full'); ?>
				<a href="<?php the_permalink(); ?>" class="more">
				詳細を見る
				</a>
			</div>
			<div class="col-md-8">
				<?php the_field('fac4'); ?>
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
					</table>
					<?php
									$terms = get_the_terms($post->ID, 'facility_type');
									if ( $terms ) {
										foreach ( $terms as $term ) {
											$term_link = get_term_link( $term );
											echo '<a class="tag_link" href="'.esc_url( $term_link ).'">'.$term->name.'</a>';
										}
									}
									?>
			</div>
		</div>
	</div>
</div>

<? else : ?>
<?php
/**
 * For Archive page loop post item template
 *
 * @package lightning
 */

$options = array(
	// card, card-noborder, card-intext, card-horizontal , media, postListText.
	'layout'                     => 'media',
	'display_image'              => true,
	'display_image_overlay_term' => true,
	'display_excerpt'            => true,
	'display_date'               => true,
	'display_new'                => true,
	'display_taxonomies'         => false,
	'display_btn'                => true,
	'image_default_url'          => false,
	'overlay'                    => false,
	'btn_text'                   => __( 'Read more', 'lightning' ),
	'btn_align'                  => 'text-right',
	'new_text'                   => __( 'New!!', 'lightning' ),
	'new_date'                   => 7,
	'class_outer'                => 'vk_post-col-xs-12 vk_post-col-sm-12 vk_post-col-lg-12',
	'class_title'                => '',
	'body_prepend'               => '',
	'body_append'                => '',
);
VK_Component_Posts::the_view( $post, $options );

endif;
