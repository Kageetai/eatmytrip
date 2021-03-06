<?php
/*
 * Template Name: Custom Home Page
 * Description: A home page with slider and widgets.
 *
 * @package brasserie
 * @since brasserie 1.0
 */
get_header();?>
     
	
    <?php 
	    // Only display if this section is marked for display in customizer	
	    if(!get_theme_mod('hide_slider_section')):
			
			 // if slider options changed
			 if(get_theme_mod( 'brasserie_slider' )) :
			 	if(get_theme_mod( 'brasserie_slider' ) == 'flexslider'):
			 		 // include felxslider html
			 		 get_template_part( 'content', 'flexslider');
			 	endif;
			 		
			 endif;
			 
		endif; ?>
<?php  	
	// Only display if this section is marked for display in customizer		
	if(!get_theme_mod('hide_feature_text_boxes')): 
	
		$list_featureboxes = array(
			'1'     => __('slideInLeft', 'brasserie'),
			'2'     => __('fadeInUp', 'brasserie'),
			'3'     => __('slideInRight', 'brasserie'),
			'4'     => __('slideInLeft', 'brasserie'),
			'5'     => __('fadeInUp', 'brasserie'),
			'6'     => __('slideInRight', 'brasserie'),
			'7'     => __('slideInLeft', 'brasserie'),
			'8'     => __('fadeInUp', 'brasserie'),
			'9'     => __('slideInRight', 'brasserie'),
		);
?>
	<?php  	// Only display if this section is marked for display in customizer.
		if(!get_theme_mod('hide_promo_bar')):  ?>
	<div class="featuretext_container">
		<div class="featuretext_top">
			<h3><?= esc_html(get_theme_mod( 'featured_textbox' ) ); ?></h3>
			<?php if ( get_theme_mod( 'featured_button_url' ) ) : ?>
				<div class="featuretext_button animated" data-fx="slideInRight">
					<a href="<?= esc_url( get_theme_mod( 'featured_button_url' ) ); ?>" >
                        <?php if(get_theme_mod('featured_btn_textbox')): echo(get_theme_mod('featured_btn_textbox')); else: echo __('Find out more', 'brasserie'); endif;?>
                    </a>
				</div>
			<?php endif; ?>
		</div>
	</div>
    <?php endif; ?>
    
	<div class="featuretext_middle">
		<div class="section group">
			<?php foreach($list_featureboxes as $key => $value){ ?>
				<div class="col span_1_of_3  box-<?= $key; ?> animated" data-fx="<?php echo($value); ?>">         
					<div class="featuretext">
						<?php if ( get_theme_mod( 'header-'.$key.'-file-upload' ) ) : ?>
							<?php $image_id = get_image_id(get_theme_mod( 'header-'.$key.'-file-upload' )); ?>
<!--							<a href="--><?php //echo esc_url( get_theme_mod( 'header_'.$key.'_url' ) ); ?><!--">-->
                            <img src="<?= wp_get_attachment_image_src( $image_id, 'large' )[0]; ?>"
                                 alt="<?= esc_html( get_theme_mod( 'featured_textbox_header_' . $key ) ) ?>">
<!--                            </a>-->
						<?php else : ?>
							<?= '<p>' . __('Insert Image', 'brasserie') . '</p>'; ?>
						<?php endif; ?>
						<h2>
<!--                            <a href="--><?php //echo esc_url( get_theme_mod( 'header_'.$key.'_url' ) ); ?><!--">-->
                                <?= esc_html(get_theme_mod( 'featured_textbox_header_'.$key ) ); ?>
<!--                            </a>-->
                        </h2>
<!--						<p>--><?//= esc_html(get_theme_mod( 'featured_textbox_text_'.$key ) ); ?><!--</p>-->
					</div>
				</div>
			<?php } ?>		
		</div><!-- /.section group -->
	</div><!-- /.featuretext_middle -->

	<?php  	// Only display if this section is marked for display in customizer.
	if(!get_theme_mod('hide_promo_bar')): ?>
		<div class="featuretext_container">
			<div class="featuretext_top">
				<h3><?= esc_html(get_theme_mod( 'featured_textbox_2' ) ); ?></h3>
				<?php if ( get_theme_mod( 'featured_button_url_2' ) ) : ?>
					<div class="featuretext_button animated" data-fx="slideInRight">
						<a href="<?= esc_url( get_theme_mod( 'featured_button_url_2' ) ); ?>" ><?php if(get_theme_mod('featured_btn_textbox_2')): echo(get_theme_mod('featured_btn_textbox_2')); else: echo __('Find out more', 'brasserie'); endif;?></a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

    <div class="featuretext-panorama" style="background-image: url(<?= content_url(); ?>/uploads/2016/11/photo-10.jpg);">
        <div class="flex-caption">
            <div class="flex-caption-title"><h3>Build your own epic cake!</h3></div>
        </div>
    </div>

<?php endif; ?>
        
<?php  	// Only display if this section is marked for display in customizer.
		if(!get_theme_mod('hide_recent_posts')): ?>
	
			<div class="section_thumbnails group">
				<?= '<h3>' . __('From the blog', 'brasserie') . '</h3>'; ?>
				<?php $the_query = new WP_Query(array(
					'showposts' => 4,
					'post__not_in' => get_option("sticky_posts"),
					));
				?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
					<div class="col span_1_of_4">
						<article class="recent animated" data-fx="fadeInUp">
							<a href="<?php the_permalink(); ?>">
								<?php
									if ( has_post_thumbnail() ) {
										$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'recent' );
										echo '<img alt="post" class="imagerct_home" src="' . $image_src[0] . '">';
									}
								?> 
								<div class="recent_title">
									<h2><?php the_title(); ?></h2>
                                    <p><?= brasserie_get_recentposts_excerpt(); ?>...</p>
								</div>
							</a>
						</article>
					</div>	
				<?php endwhile; ?>
			</div><!-- END section_thumbnails -->
		
<?php endif; ?>
<?php  	
	// Only display if this section is marked for display in customizer.
	if(!get_theme_mod('hide_partner_logos')):
?>   
	<div class="section_clients group">
		<div class="client animated" data-fx="fadeInUp">
		
			<h3> <?php if(get_theme_mod('brasserie_partner_txt')): 
							echo(get_theme_mod('brasserie_partner_txt')); 
						else: 
							echo __('Todays Specials', 'brasserie'); 
						endif;?>
			</h3>
			<div class="col span_1_of_4">
				<div class="client_recent">
					<?php if ( get_theme_mod( 'brasserie_one_logo_upload' ) ) : ?>
						<a href="<?= esc_url( get_theme_mod( 'brasserie_one_company_url' ) ); ?>"><img src="<?= esc_url( get_theme_mod( 'brasserie_one_logo_upload' ) ); ?>"  alt="<?= __('special one', 'brasserie')?>"></a>
					<?php else : ?>
						<?= '<h4>' . __('Insert Image', 'brasserie') . '</h4>'; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col span_1_of_4">
				<div class="client_recent">
					<?php if ( get_theme_mod( 'brasserie_two_logo_upload' ) ) : ?>
						<a href="<?= esc_url( get_theme_mod( 'brasserie_two_company_url' ) ); ?>"><img src="<?= esc_url( get_theme_mod( 'brasserie_two_logo_upload' ) ); ?>"  alt="<?= __('special two', 'brasserie')?>"></a>
					<?php else : ?>
						<?= '<h4>' . __('Insert Image', 'brasserie') . '</h4>'; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col span_1_of_4">
				<div class="client_recent">
					<?php if ( get_theme_mod( 'brasserie_three_logo_upload' ) ) : ?>
						<a href="<?= esc_url( get_theme_mod( 'brasserie_three_company_url' ) ); ?>"><img src="<?= esc_url( get_theme_mod( 'brasserie_three_logo_upload' ) ); ?>"  alt="<?= __('special three', 'brasserie')?>"></a>
					<?php else : ?>
						<?= '<h4>' . __('Insert Image', 'brasserie') . '</h4>'; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col span_1_of_4">
				<div class="client_recent">
					<?php if ( get_theme_mod( 'brasserie_four_logo_upload' ) ) : ?>
						<a href="<?= esc_url( get_theme_mod( 'brasserie_four_company_url' ) ); ?>"><img src="<?= esc_url( get_theme_mod( 'brasserie_four_logo_upload' ) ); ?>"  alt="<?= __('special four', 'brasserie')?>"></a>
					<?php else : ?>
						<?= '<h4>' . __('Insert Image', 'brasserie') . '</h4>'; ?>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- .client -->
	</div><!-- .section_clients -->
<?php endif; ?>
<?php get_footer(); ?>
