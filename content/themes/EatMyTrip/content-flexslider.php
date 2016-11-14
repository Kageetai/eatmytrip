	<div class="flex-container">
		<div class="flexslider">
			<ul class="slides">
				<?php 
					$the_query = new WP_Query(array(
						'category_name' => 'featured', 'posts_per_page' => 6
					));
				?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
				<li>
					<?php the_post_thumbnail(); ?>
					<div class="caption_wrap">
						<div class="flex-caption">
							<div class="flex-caption-title">
								<h3><?php the_title(); ?></h3>
							</div>
						</div>
					</div>
				</li>
				<?php
				endwhile;
				?>
			</ul>
		</div>
	</div>