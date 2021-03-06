<?php

/**
 * Merge Topic
 *
 * @package IdeaBoard
 * @subpackage Theme
 */

?>

<div id="ideaboard-forums">

	<?php ideaboard_breadcrumb(); ?>

	<?php if ( is_user_logged_in() && current_user_can( 'edit_topic', ideaboard_get_topic_id() ) ) : ?>

		<div id="merge-topic-<?php ideaboard_topic_id(); ?>" class="ideaboard-topic-merge">

			<form id="merge_topic" name="merge_topic" method="post" action="<?php the_permalink(); ?>">

				<fieldset class="ideaboard-form">

					<legend><?php printf( __( 'Merge topic "%s"', 'ideaboard' ), ideaboard_get_topic_title() ); ?></legend>

					<div>

						<div class="ideaboard-template-notice info">
							<p><?php _e( 'Select the topic to merge this one into. The destination topic will remain the lead topic, and this one will change into a reply.', 'ideaboard' ); ?></p>
							<p><?php _e( 'To keep this topic as the lead, go to the other topic and use the merge tool from there instead.', 'ideaboard' ); ?></p>
						</div>

						<div class="ideaboard-template-notice">
							<p><?php _e( 'All replies within both topics will be merged chronologically. The order of the merged replies is based on the time and date they were posted. If the destination topic was created after this one, it\'s post date will be updated to second earlier than this one.', 'ideaboard' ); ?></p>
						</div>

						<fieldset class="ideaboard-form">
							<legend><?php _e( 'Destination', 'ideaboard' ); ?></legend>
							<div>
								<?php if ( ideaboard_has_topics( array( 'show_stickies' => false, 'post_parent' => ideaboard_get_topic_forum_id( ideaboard_get_topic_id() ), 'post__not_in' => array( ideaboard_get_topic_id() ) ) ) ) : ?>

									<label for="ideaboard_destination_topic"><?php _e( 'Merge with this topic:', 'ideaboard' ); ?></label>

									<?php
										ideaboard_dropdown( array(
											'post_type'   => ideaboard_get_topic_post_type(),
											'post_parent' => ideaboard_get_topic_forum_id( ideaboard_get_topic_id() ),
											'selected'    => -1,
											'exclude'     => ideaboard_get_topic_id(),
											'select_id'   => 'ideaboard_destination_topic'
										) );
									?>

								<?php else : ?>

									<label><?php _e( 'There are no other topics in this forum to merge with.', 'ideaboard' ); ?></label>

								<?php endif; ?>

							</div>
						</fieldset>

						<fieldset class="ideaboard-form">
							<legend><?php _e( 'Topic Extras', 'ideaboard' ); ?></legend>

							<div>

								<?php if ( ideaboard_is_subscriptions_active() ) : ?>

									<input name="ideaboard_topic_subscribers" id="ideaboard_topic_subscribers" type="checkbox" value="1" checked="checked" tabindex="<?php ideaboard_tab_index(); ?>" />
									<label for="ideaboard_topic_subscribers"><?php _e( 'Merge topic subscribers', 'ideaboard' ); ?></label><br />

								<?php endif; ?>

								<input name="ideaboard_topic_favoriters" id="ideaboard_topic_favoriters" type="checkbox" value="1" checked="checked" tabindex="<?php ideaboard_tab_index(); ?>" />
								<label for="ideaboard_topic_favoriters"><?php _e( 'Merge topic favoriters', 'ideaboard' ); ?></label><br />

								<?php if ( ideaboard_allow_topic_tags() ) : ?>

									<input name="ideaboard_topic_tags" id="ideaboard_topic_tags" type="checkbox" value="1" checked="checked" tabindex="<?php ideaboard_tab_index(); ?>" />
									<label for="ideaboard_topic_tags"><?php _e( 'Merge topic tags', 'ideaboard' ); ?></label><br />

								<?php endif; ?>

							</div>
						</fieldset>

						<div class="ideaboard-template-notice error">
							<p><?php _e( '<strong>WARNING:</strong> This process cannot be undone.', 'ideaboard' ); ?></p>
						</div>

						<div class="ideaboard-submit-wrapper">
							<button type="submit" tabindex="<?php ideaboard_tab_index(); ?>" id="ideaboard_merge_topic_submit" name="ideaboard_merge_topic_submit" class="button submit"><?php _e( 'Submit', 'ideaboard' ); ?></button>
						</div>
					</div>

					<?php ideaboard_merge_topic_form_fields(); ?>

				</fieldset>
			</form>
		</div>

	<?php else : ?>

		<div id="no-topic-<?php ideaboard_topic_id(); ?>" class="ideaboard-no-topic">
			<div class="entry-content"><?php is_user_logged_in() ? _e( 'You do not have the permissions to edit this topic!', 'ideaboard' ) : _e( 'You cannot edit this topic.', 'ideaboard' ); ?></div>
		</div>

	<?php endif; ?>

</div>
