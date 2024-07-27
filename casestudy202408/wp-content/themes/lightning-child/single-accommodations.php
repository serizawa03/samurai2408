<?php
/**
 * Lightning G3 index.php common template-file
 *
 * @package vektor-inc/lightning
 */

use VektorInc\VK_Breadcrumb\VkBreadcrumb;

?><?php lightning_get_template_part( 'header' ); ?>

<?php
do_action( 'lightning_site_header_before', 'lightning_site_header_before' );
if ( apply_filters( 'lightning_is_site_header', true, 'site_header' ) ) {
	lightning_get_template_part( 'template-parts/site-header' );
}
do_action( 'lightning_site_header_after', 'lightning_site_header_after' );
?>


<?php
	do_action( 'lightning_breadcrumb_before', 'lightning_breadcrumb_before' );
	if ( apply_filters( 'lightning_is_breadcrumb_position_normal', true, 'breadcrumb_position_normal' ) ) {
		if ( apply_filters( 'lightning_is_breadcrumb', true, 'breadcrumb' ) ) {
			$vk_breadcrumb      = new VkBreadcrumb();
			$breadcrumb_options = array(
				'id_outer'        => 'breadcrumb',
				'class_outer'     => 'breadcrumb',
				'class_inner'     => 'container',
				'class_list'      => 'breadcrumb-list',
				'class_list_item' => 'breadcrumb-list__item',
			);
			$vk_breadcrumb->the_breadcrumb( $breadcrumb_options );
		}
	}
	do_action( 'lightning_breadcrumb_after', 'lightning_breadcrumb_after' );
?>

<?php do_action( 'lightning_site_body_before', 'lightning_site_body_before' ); ?>

<div class="<?php lightning_the_class_name( 'site-body' ); ?>">
	<?php do_action( 'lightning_site_body_prepend', 'lightning_site_body_prepend' ); ?>
	<div class="mv">
		<img src="<?php the_post_thumbnail_url('full'); ?>" />
	</div>
	<div class="<?php lightning_the_class_name( 'site-body-container' ); ?> container">

		<div class="<?php lightning_the_class_name( 'main-section' ); ?>" id="main" role="main">
			<?php do_action( 'lightning_main_section_prepend', 'lightning_main_section_prepend' ); ?>

			<div class="sec_info">
				<span class="area">
					<?php
						$terms = get_the_terms($post->ID,'accommodations_area');
						if($terms){
							foreach( $terms as $term ) {
							echo $term->name;
							}
						}
						?>
				</span>
				<h1><?php the_title(); ?></h1>
				<p class="addr"><?php the_field('ci_acf1'); ?></p>
				<div class="mb-4">
					<?php $field = get_field('ci_acf7'); if ($field): ?>
						<ul class="features">
						<?php foreach( $field as $value ): ?>
							<li><?php echo $value; ?></li>
						<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="recommend"><?php the_field('ci_acf7_1'); ?></div>
			</div>

			<div class="sec_date">
			<h2>Facilities<span class="ja">施設・サービス</span></h2>
				<h3>基本情報</h3>
				<table class="date_table">
          <tbody>
            <tr>
              <th>施設名</th>
              <td>ザ・レイクスイート 湖の栖</td>
            </tr>
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
            <tr>
              <th>クレジットカード</th>
              
              <td><?php the_field('ci_acf3'); ?></td>
            </tr>
            <tr>
              <th>チェックイン</th>
              <td>
							<?php the_field('ci_acf4'); ?><br>
                <span class="small">※宿泊プランにより異なる場合がございます。</span>
              </td>
            </tr>
						<tr>
              <th>チェックアウト</th>
              <td>
							<?php the_field('ci_acf5'); ?><br>
                <span class="small">※宿泊プランにより異なる場合がございます。</span>
              </td>
            </tr>
          </tbody>
        </table>
				<h3>設備・アメニティ</h3>
				<?php $field = get_field('ci_acf6'); if ($field): ?>
					<ul class="amenities">
					<?php foreach( $field as $value ): ?>
						<li><?php echo $value; ?></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="sec_access">
			<h2>Access<span class="ja">アクセス</span></h2>
			<iframe src="<?php the_field('ci_acf10'); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

				<h3>お車でお越しの方へ</h3>
				<?php the_field('ci_acf9'); ?>
				<h3>公共交通機関でお越しの方へ</h3>
				<?php the_field('ci_acf8'); ?>
			</div>
			<div class="sec_reserve">
				<div class="container">
				<h2>Reserve<span class="ja">ご予約</span></h2>
					<?php the_content(); ?>
				</div>
			</div>

			<div class="sec_history">
			<h2>Browsing<span class="ja">閲覧履歴</span></h2>
			<?php
				//閲覧履歴　表示
				global $rireki;
				if (!empty($rireki)) :
				?>
				<ul>
				<?php
				$args = array(
				'post_type' => 'accommodations',
				'posts_per_page' => -1,
				'post__in' => $rireki,
				'orderby' => 'post__in',
				);
				$the_query = new WP_Query($args);

				if ($the_query->have_posts()) :
				while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<li>
						<a href="<?php echo get_permalink(); ?>">
						<figure>
						<?php echo get_the_post_thumbnail(); ?>
						</figure>
						<div><?php echo get_the_title(); ?></div>
						</a>
					</li>
				<?php endwhile;endif;wp_reset_postdata(); ?>
				</ul>
				<?php else: ?><?php endif; ?>
				</div>

			<?php do_action( 'lightning_main_section_append', 'lightning_main_section_append' ); ?>
		</div><!-- [ /.main-section ] -->



	</div><!-- [ /.site-body-container ] -->

	<?php do_action( 'lightning_site_body_append', 'lightning_site_body_append' ); ?>

</div><!-- [ /.site-body ] -->

<?php if ( is_active_sidebar( 'footer-before-widget' ) ) : ?>
<div class="site-body-bottom">
	<div class="container">
		<?php dynamic_sidebar( 'footer-before-widget' ); ?>
	</div>
</div>
<?php endif; ?>

<?php
do_action( 'lightning_site_footer_before', 'lightning_site_footer_before' );
if ( apply_filters( 'lightning_is_site_footer', true, 'site_footer' ) ) {
	lightning_get_template_part( 'template-parts/site-footer' );
}
do_action( 'lightning_site_footer_after', 'lightning_site_footer_after' );
?>

<?php lightning_get_template_part( 'footer' ); ?>
