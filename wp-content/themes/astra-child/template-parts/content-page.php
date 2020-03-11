<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

?>

<?php astra_entry_before(); ?>

<article 
	<?php
		echo astra_attr(
			'article-page',
			array(
				'id'    => 'post-' . get_the_id(),
				'class' => join( ' ', get_post_class() ),
			)
		);
		?>
>

	<?php astra_entry_top(); ?>

	<header class="entry-header <?php astra_entry_header_class(); ?>">

		<?php astra_get_post_thumbnail(); ?>

		<?php
		astra_the_title(
			'<h1 class="entry-title" ' . astra_attr(
				'article-title-content-page',
				array(
					'class' => '',
				)
			) . '>',
			'</h1>'
		);
		?>
	</header><!-- .entry-header -->

	<div class="entry-content clear" 
		<?php
				echo astra_attr(
					'article-entry-content-page',
					array(
						'class' => '',
					)
				);
				?>
	>

		<?php astra_entry_content_before(); ?>

		<?php the_content(); 
			if(get_field('home_banner')) {
				$FirstImage = get_field('home_banner');
				$SecondImage = get_field('second_image');
				echo'	<img class="mainImage" src="'.esc_url($FirstImage['url']).'"/>
						<img class="secondImage" src="'.esc_url($SecondImage['url']).'"/>
						<h1>'
							.get_field('title').'</h1>
						<h4 class="shortdesc">'
							.get_field('short_description').'</h4>
						<p class="slogan">							
							'.get_field('slogan').'</p>';
			}
			if(get_field('video')){
				echo'<div style="display:flex; flex-direction: row; float: left; width:56%;">';
				echo the_field('video');
				echo'
				<style>
					iframe{
						float:left;
					}
					.embed-container { 
						position: relative; 
						padding-bottom: 56.25%;
						overflow: hidden;
						max-width: 100%;
						height: auto;
					} 

					.embed-container iframe,
					.embed-container object,
					.embed-container embed { 
						float:left;
						position: absolute;
						top: 0;
						left: 0;
						width: 100%;
						height: 100%;
					}
				</style>';
			}
			if (get_field('customer_message')){
				echo '<div style="clear: both;text-align: center; padding: 0 20px; width: 50%;">';
				echo the_field('customer_message');
				echo '</div>';
			}
			echo '</div>';
			// Check value exists.
			if( have_rows('page_layouts') ):

				// Loop through rows.
				while ( have_rows('page_layouts') ) : the_row();

					// Case: Paragraph layout.
					// if( get_row_layout() == 'ribbon_link_section' ):
						$text = get_sub_field('section_heading');
						echo '<section class="services"><h2 class="pttitle">'.$text.'</h2>';
						$asset = get_sub_field('asset_selection');

						if( have_rows('asset_selection') ): 
 
							echo'<div class="list">';
						 
							while( have_rows('asset_selection') ): the_row(); 
								$sub_field_3 = get_sub_field('link_image'); 
								echo '
										<div class="card" 
											style="background-image: url('.esc_url($sub_field_3['url']).');">
											<a class="ptlink" href="'.get_sub_field('link_url').'" >
												<div class="ptservices">
														'.get_sub_field('link_title').'
												</div>
												<p>
												'.get_sub_field('description').'
												</p>
											</a>
										</div>';
							endwhile;
						 
							echo'</div>';
						endif;
						// Do something...
						echo'</section>';						
					// endif;

				// End loop.
				endwhile;

				// Do something...
			endif;	
		?>

		<?php 
			if(get_field('banner')) {
						$Banner = get_field('banner');
						echo'<div class="banner"
						style="background-image: url('.esc_url($Banner['url']).');">
								<div style="
								font-weight: 700;
								clear: inherit;
								text-align: center;
								padding: 11% 0px;"></div>		
						</div>
						<h1 style="text-align:center; clear:both; padding: 10px 0 20px 0; font-weight:700;">'.get_field('title').'</h1>';
			}
			if (get_field('images_list')){
				$images = get_field('images_list');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
				if( $images ): ?>
					<div class="gallery">
							<?php foreach( $images as $image ): 
								$content = '<div class="image-overlay-container zoom-on-hover">';
									$content .= '<a class="gallery_image" href="'. $image['url'] .'">';
									$content .= '<img class="attachment-medium" src="'. $image['url'].'" alt="'. $image['alt'] .'" />';
									$content .= '<div class="image-overlay" style="">
										<div class="image-overlay-text" style="">
										<span class="fas fa-expand-alt" style="color: white"></span>
										</div>
										</div>
										</a>';
								$content .= '</div>';
								if ( function_exists('slb_activate') ){
						$content = slb_activate($content);
						}
						
					echo $content;?>
							<?php endforeach; ?>
					</div>
					<?php endif;
			}
			if (have_rows('pdf_collection')){
				// loop through the rows of data
				
				$repeater = get_field('pdf_collection');
				$order = array();
				
				echo '	<div class="gallery">
						<form name="form1" method="post" action="'.$PHP_SELF.'">
						<label for="categorySelection"> </label>
						<select name="categorySelection">
							<option value="">--- All ---</option>
							<option value="Inclinometers">Inclinometers</option>
							<option value="Accelerometers">Accelerometers</option>
							<option value="Load Cells">Load Cells</option>
							<option value="Catalogues/Brochures">Catalogues/Brochures</option>
						</select>
						<input class="button" type="submit" name="submit" value="Select"><br>
						</form>
						</div>
						';
				if(isset($_POST['submit'])) 
					{ 
						$category = $_POST['categorySelection'];
						foreach( $repeater as $i => $row ) {
							$file = $row['pdf_file'];
							$pdf_image = $row['pdf_image'];
							$content = $row['pdf_title'];
							$size = 'medium';
							$thumb = $pdf_image['sizes'][ $size ];
							$order[ $i ] = $row['id'];
							if($category == ""){
								if( $file ){
									echo'	<div class="gallery">
											<div style="text-align:center; padding:10px;" class="image-overlay-container zoom-on-hover">
											<a class="gallery_image" href="'.$file['url'].'" target="_blank">
													<img style=""src="'.esc_url($thumb).'" />
													
													<div class="image-overlay" style="">
													<div class="image-overlay-text" style="">
													<span class="fas fa-file-pdf" style="color: white; font-size:3em;"></span>
													</div>
													</div>
											</a>
											</div><div><p style="padding: 10px 0 0 0">'.$content.'</p><p><a  href="'.$file['url'].'" download> <i class="fas fa-download"></i></a></p></div>';
											
									}
							}
							else if($row['category'] == $category ){
								if( $file ){
									echo'	<div class="gallery">
											<div style="text-align:center; padding:10px;" class="image-overlay-container zoom-on-hover">
											<a class="gallery_image" href="'.$file['url'].'" target="_blank">
													<img style=""src="'.esc_url($thumb).'" />
													
													<div class="image-overlay" style="">
													<div class="image-overlay-text" style="">
													<span class="fas fa-file-pdf" style="color: white; font-size:3em;"></span>
													</div>
													</div>
											</a>
											</div><div><p style="padding: 10px 0 0 0">'.$content.'</p><p><a  href="'.$file['url'].'" download> <i class="fas fa-download"></i></a></p></div>';
											
									}
							}
						}
						echo '</div>';
					}
				else {
					echo '<div class="gallery">';
						while ( have_rows('pdf_collection') ) : the_row();
							// display a sub field value
							$file = get_sub_field('pdf_file');
							$pdf_image = get_sub_field('pdf_image');
							$content = get_sub_field('pdf_title');
							$size = 'medium';
							$thumb = $pdf_image['sizes'][ $size ];
							if( $file ){
							echo'
									<div style="text-align:center; padding:10px;" class="image-overlay-container zoom-on-hover">
									<a class="gallery_image" href="'.$file['url'].'" target="_blank">
											<img style=""src="'.esc_url($thumb).'" />
											<div class="image-overlay" style="">
											<div class="image-overlay-text" style="">
											<span class="fas fa-file-pdf" style="color: white; font-size:3em;"></span>
											</div>
											</div>
									</a>
									</div><div><p style="padding: 10px 0 0 0">'.$content.'</p><p><a  href="'.$file['url'].'" download> <i class="fas fa-download"></i></a></p></div>';
							}
						endwhile;
						echo '</div>';
					}
				
				/*
				array_multisort( $order, SORT_DESC, $repeater );

				if( $repeater ){

					echo '<ul>';
				
					foreach( $repeater as $i => $row ){
						echo '<li>'.$row['id'].'/'.$row['pdf_title'].'</li>';
					}
					echo '</ul>';
				
				}
				*/
				// echo '<div class="gallery">';
				// while ( have_rows('pdf_collection') ) : the_row();
				// 	// display a sub field value
				// 	$file = get_sub_field('pdf_file');
				// 	$pdf_image = get_sub_field('pdf_image');
				// 	$content = get_sub_field('pdf_title');
				// 	$size = 'medium';
				// 	$thumb = $pdf_image['sizes'][ $size ];
				// 	if( $file ){
				// 	echo'
				// 			<div style="text-align:center; padding:10px;" class="image-overlay-container zoom-on-hover">
				// 			<a class="gallery_image" href="'.$file['url'].'">
				// 					<img style=""src="'.esc_url($thumb).'" />
									
				// 					<div class="image-overlay" style="">
				// 					<div class="image-overlay-text" style="">
				// 					<span class="fas fa-file-pdf" style="color: white; font-size:3em;"></span>
				// 					</div>
				// 					</div>
				// 			</a>
				// 			</div><br>'.$content.'<br><a  href="'.$file['url'].'" download> download</a>';
				// 	}
				// endwhile;
				// echo '</div>';
			// no rows found
	   }
		 ?>
		<?php

			

		?>

		<?php astra_entry_content_after(); 
				
		?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . esc_html( astra_default_strings( 'string-single-page-links-before', false ) ),
					'after'       => '</div>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>',
				)
			);
			?>

	</div><!-- .entry-content .clear -->

	<?php
		astra_edit_post_link(
			sprintf(
				/* translators: %s: Name of current post
							<?php // loop through content_blocks, loading templates as appropriate
			  if( have_rows('page_layouts') ): ?>
				  <div class="layout-container">
				    <?php 
				    while ( have_rows('page_layouts') ) : the_row();
				      	get_template_part( 'nova-layouts/page_layouts', get_row_layout() );
				    endwhile; ?>
				  </div>
			  <?php endif; ?>
				*/
				esc_html__( 'Edit %s', 'astra' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
		?>

	<?php astra_entry_bottom(); ?>

</article><!-- #post-## -->

<?php astra_entry_after(); ?>
