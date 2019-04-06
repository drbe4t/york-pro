<?php
/**
 * The template for displaying the portfolio loop.
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

/**
 * Check to see if a featured image is uploaded.
 * There's no point showing an article link, if there's no image.
 */
if ( has_post_thumbnail() ) :
	/**
	 * Check if there's a secondary thumbnail uploaded. If so, we'll
	 * add the '.project--has-second' class to the article.
	 */
	$size_class = get_post_meta( $post->ID, '_bean_portfolio_grid_size', true );

	printf( '<article id="project-%1s" class="project %2s" >', esc_attr( get_the_ID() ), esc_attr( $size_class ) );

		echo '<div class="project-inner">';

			york_video_lightbox();

			do_action( 'portfolio_professional_pinterest' );

			echo '<div class="overlay">';

				echo '<div class="center">';

					the_title( '<h3 class="entry-title">', '</h3>' );

				echo '</div>';

			echo '</div>';

			echo '<figure>';

				/*
				 * Let's check if there's an external url included on the back end.
				 * If there is, that will be assigned as the $portfolio_url variable, if not,
				 * the post permalink will be assigned.
				 */
				$external_url         = get_post_meta( $post->ID, '_bean_portfolio_external_url', true );
				$portfolio_url        = ( $external_url ) ? $external_url : get_the_permalink();
				$portfolio_url_class  = ( $external_url ) ? 'class=project-link project-link_external' : '';
				$portfolio_url_target = ( $external_url ) ? '_blank' : '_self';

				printf(
					'<a href="%1s" data-id="%2$s" %3$s target="%4$s" class="project-link"></a>',
					esc_url( $portfolio_url ),
					esc_html( get_the_ID() ),
					esc_html( $portfolio_url_class ),
					esc_html( $portfolio_url_target )
				);

			   the_post_thumbnail( 'york-featured-image' );

			echo '</figure>';

		echo '</div>';

	echo '</article>';

endif;
