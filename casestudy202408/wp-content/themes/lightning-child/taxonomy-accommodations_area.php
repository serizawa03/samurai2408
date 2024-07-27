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


<div class="page-header"><div class="page-header-inner container">
<h1 class="page-header-title"><?php single_term_title(); ?>のホテル一覧</h1></div></div>

<?php
$current_term = get_queried_object();
$current_term_slug = $current_term->slug;
$args = array(
    'post_type' => 'accommodations',
		'posts_per_page' => 1,
		'orderby' => 'rand',
    'tax_query' => array(
        array(
            'taxonomy' => 'accommodations_area',
            'field' => 'slug',
            'terms' => array( $current_term_slug )
        )
    )
);
$query = new WP_Query($args);
?>
<?php if ( $query->have_posts() ) : ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); 
		?>
<style>
.page-header {
  background-image: url(<?php the_post_thumbnail_url('full'); ?>);
}
</style>
<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>


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
	<div class="<?php lightning_the_class_name( 'site-body-container' ); ?> container">

		<div class="<?php lightning_the_class_name( 'main-section' ); ?>" id="main" role="main">
	
          <?php if ($wp_query->have_posts()) : ?>
            <div class="post-list  vk_posts-mainSection">
                <?php
                while ($wp_query->have_posts()) : $wp_query->the_post();
                ?>
                    <?php get_template_part('template-parts/loop-item-accommodations'); ?>
                <?php endwhile; ?>
            </div>
          <?php else : ?>
            <p class="text-center">条件に合う宿はありませんでした。</p>
            <a href="<?php echo esc_url( home_url() ); ?>" class="more">トップへ戻る</a>
          <?php endif; wp_reset_postdata(); ?>


          <?php
          the_posts_pagination(
            array(
                'mid_size'           => 1,
                'prev_text'          => '&laquo;',
                'next_text'          => '&raquo;',
                'type' => 'list',
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'lightning') . ' </span>',
            )
          );
          wp_reset_postdata(); ?>

		</div><!-- [ /.main-section ] -->

		<?php
		do_action( 'lightning_sub_section_before', 'lightning_sub_section_before' );
		if ( lightning_is_subsection() ) {
			if ( lightning_is_woo_page() ) {
				do_action( 'woocommerce_sidebar' );
			} else {
				lightning_get_template_part( 'sidebar', get_post_type() );
			}
		}
		do_action( 'lightning_sub_section_after', 'lightning_sub_section_after' );
		?>

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
