<?php

/**
 * User Details
 *
 * @package IdeaBoard
 * @subpackage Theme
 */

?>

	<?php do_action( 'ideaboard_template_before_user_details' ); ?>

	<div id="ideaboard-single-user-details">
		<div id="ideaboard-user-avatar">

			<span class='vcard'>
				<a class="url fn n" href="<?php ideaboard_user_profile_url(); ?>" title="<?php ideaboard_displayed_user_field( 'display_name' ); ?>" rel="me">
					<?php echo get_avatar( ideaboard_get_displayed_user_field( 'user_email', 'raw' ), apply_filters( 'ideaboard_single_user_details_avatar_size', 150 ) ); ?>
				</a>
			</span>

		</div><!-- #author-avatar -->

		<div id="ideaboard-user-navigation">
			<ul>
				<li class="<?php if ( ideaboard_is_single_user_profile() ) :?>current<?php endif; ?>">
					<span class="vcard ideaboard-user-profile-link">
						<a class="url fn n" href="<?php ideaboard_user_profile_url(); ?>" title="<?php printf( esc_attr__( "%s's Profile", 'ideaboard' ), ideaboard_get_displayed_user_field( 'display_name' ) ); ?>" rel="me"><?php _e( 'Profile', 'ideaboard' ); ?></a>
					</span>
				</li>

				<li class="<?php if ( ideaboard_is_single_user_topics() ) :?>current<?php endif; ?>">
					<span class='ideaboard-user-topics-created-link'>
						<a href="<?php ideaboard_user_topics_created_url(); ?>" title="<?php printf( esc_attr__( "%s's Topics Started", 'ideaboard' ), ideaboard_get_displayed_user_field( 'display_name' ) ); ?>"><?php _e( 'Topics Started', 'ideaboard' ); ?></a>
					</span>
				</li>

				<li class="<?php if ( ideaboard_is_single_user_replies() ) :?>current<?php endif; ?>">
					<span class='ideaboard-user-replies-created-link'>
						<a href="<?php ideaboard_user_replies_created_url(); ?>" title="<?php printf( esc_attr__( "%s's Replies Created", 'ideaboard' ), ideaboard_get_displayed_user_field( 'display_name' ) ); ?>"><?php _e( 'Replies Created', 'ideaboard' ); ?></a>
					</span>
				</li>

				<?php if ( ideaboard_is_favorites_active() ) : ?>
					<li class="<?php if ( ideaboard_is_favorites() ) :?>current<?php endif; ?>">
						<span class="ideaboard-user-favorites-link">
							<a href="<?php ideaboard_favorites_permalink(); ?>" title="<?php printf( esc_attr__( "%s's Favorites", 'ideaboard' ), ideaboard_get_displayed_user_field( 'display_name' ) ); ?>"><?php _e( 'Favorites', 'ideaboard' ); ?></a>
						</span>
					</li>
				<?php endif; ?>

				<?php if ( ideaboard_is_user_home() || current_user_can( 'edit_users' ) ) : ?>

					<?php if ( ideaboard_is_subscriptions_active() ) : ?>
						<li class="<?php if ( ideaboard_is_subscriptions() ) :?>current<?php endif; ?>">
							<span class="ideaboard-user-subscriptions-link">
								<a href="<?php ideaboard_subscriptions_permalink(); ?>" title="<?php printf( esc_attr__( "%s's Subscriptions", 'ideaboard' ), ideaboard_get_displayed_user_field( 'display_name' ) ); ?>"><?php _e( 'Subscriptions', 'ideaboard' ); ?></a>
							</span>
						</li>
					<?php endif; ?>

					<li class="<?php if ( ideaboard_is_single_user_edit() ) :?>current<?php endif; ?>">
						<span class="ideaboard-user-edit-link">
							<a href="<?php ideaboard_user_profile_edit_url(); ?>" title="<?php printf( esc_attr__( "Edit %s's Profile", 'ideaboard' ), ideaboard_get_displayed_user_field( 'display_name' ) ); ?>"><?php _e( 'Edit', 'ideaboard' ); ?></a>
						</span>
					</li>

				<?php endif; ?>

			</ul>
		</div><!-- #ideaboard-user-navigation -->
	</div><!-- #ideaboard-single-user-details -->

	<?php do_action( 'ideaboard_template_after_user_details' ); ?>
