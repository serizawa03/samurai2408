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

<?php do_action( 'lightning_site_body_before', 'lightning_site_body_before' ); ?>

<div class="slide-wrap">
	<div id="mv" class="slide">
		<?php
		$args = array(
		'post_type' => 'accommodations',
		'posts_per_page' => 5,
		'orderby' => 'rand',
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) :
		?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="slide_item">
			<img src="<?php the_post_thumbnail_url('full'); ?>" />
			<a href="<?php the_permalink(); ?>">この宿を見る</a>
			</div>
		<?php endwhile; ?>
		<?php endif; wp_reset_postdata(); ?>
	</div>
	<div class="slide-text">
		<p class="mincho">デザイナーズホテルで<br class="pc-none">非日常を楽しみませんか</p>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png">
	</div>
</div>

<div class="<?php lightning_the_class_name( 'site-body' ); ?>">
	<?php do_action( 'lightning_site_body_prepend', 'lightning_site_body_prepend' ); ?>
	<div class="<?php lightning_the_class_name( 'site-body-container' ); ?> container">
		<div class="<?php lightning_the_class_name( 'main-section' ); ?>" id="main" role="main">
			<?php do_action( 'lightning_main_section_prepend', 'lightning_main_section_prepend' ); ?>
			
			<?php $popular_cf2 = get_field('popular_cf2');
						$popular_cf3 = get_field('popular_cf3');
						$popular_cf4 = get_field('popular_cf4');
						$popular_cf2_2 = get_field('popular_cf2_2');
						$popular_cf3_2 = get_field('popular_cf3_2');
						$popular_cf4_2 = get_field('popular_cf4_2');?>
			<section id="feature"class="container">
				<h2>今月の特集</h2>
				<div class="feature_wrap">
					<h3><?php the_field('popular_cf0');?></h3>
					<p><?php the_field('popular_cf1');?></p>
					<div class="d-flex flex-wrap justify-content-between">
						<?php
							if( $popular_cf2 ): 
						?>
						<div class="feature_item">
							<a href="<?php echo get_permalink($popular_cf2); ?>">
								<img src="<?php echo get_the_post_thumbnail_url($popular_cf2,'full');?>">
							<?php echo get_the_title($popular_cf2); ?>
							</a>
						</div>
						<?php endif; ?>
						<?php
							if( $popular_cf3 ): 
						?>
						<div class="feature_item">
							<a href="<?php echo get_permalink($popular_cf3); ?>">
								<img src="<?php echo get_the_post_thumbnail_url($popular_cf3,'full');?>">
							<?php echo get_the_title($popular_cf3); ?>
							</a>
						</div>
						<?php endif; ?>
						<?php
							if( $popular_cf4 ): 
						?>
						<div class="feature_item">
							<a href="<?php echo get_permalink($popular_cf4); ?>">
								<img src="<?php echo get_the_post_thumbnail_url($popular_cf4,'full');?>">
							<?php echo get_the_title($popular_cf4); ?>
							</a>
						</div>
						<?php endif; ?>
						
					</div>
				</div>
			</section>

			<section id="area"class="container">
				<h2>人気のエリアから探す<span>Area</span></h2>
				<div class="area_wrap">
				<?php
						$terms = get_terms( 'accommodations_area');
						foreach ( $terms as $term ){ ?>
					<a href="<?php echo get_term_link($term->slug, 'accommodations_area');?>" class="area_item">
					<?php $image = get_field('area_img', $term); if( !empty($image) ): ?>
					<img src="<?php echo $image?>"/>
					<span><?php echo $term->name ;?></span>
					<?php endif; ?>
					</a>
					<?php } ?>

					</div>
			</section>

			<section id="journal"class="container">
				<h2>読み物<span>Journal</span></h2>
				<?php
					$args = array(
							'post_type' => 'post',
							'posts_per_page' => 4
					);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) :
					?>
					<ol class="column-list row">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li class="col-md-6">
								<a href="<?php echo get_permalink(); ?>">
									<?php the_post_thumbnail(array( 150, 150 )); ?>
								</a>
									<div class="ttl"><span class="date"><?php echo get_the_date('Y.m.d'); ?></span><span class="cat"><?php the_category(' '); ?></span>
									<a href="<?php echo get_permalink(); ?>"><h3><?php the_title(); ?></h3></a></div>
								</a>
							</li>
							<?php endwhile; ?>
					</ol>
				<?php endif; wp_reset_postdata(); ?>
			</section>

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
