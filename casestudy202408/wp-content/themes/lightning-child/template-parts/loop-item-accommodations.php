<div class="fac-item">
	<h3><?php the_title(); ?></h3>
	<div class="fac-text">
		<div class="row">
			<div class="col-md-4">
			<?php the_post_thumbnail('full'); ?>
			<?php
									$terms = get_the_terms($post->ID, 'accommodations_area');
									if ( $terms ) {
										foreach ( $terms as $term ) {
											$term_link = get_term_link( $term );
											echo '<a class="tag_link" href="'.esc_url( $term_link ).'">'.$term->name.'</a>';
										}
									}
									?>
			</div>
			<div class="col-md-8">
				<?php the_field('fac4'); ?>
				<table>
						<tr>
							<th>住所</th>
							<td><?php the_field('ci_acf1'); ?></td>
						</tr>
						<tr>
							<th>電話番号</th>
							<td><?php the_field('ci_acf1_1'); ?></td>
						</tr>
						<tr>
							<th>総部屋数</th>
							<td><?php the_field('ci_acf2'); ?>室</td>
						</tr>
					</table>
					<a href="<?php the_permalink(); ?>" class="more">more</a>
			</div>
		</div>
	</div>
</div>