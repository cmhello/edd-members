<?php
/**
 * Template for private message
 *
 * @package     EDDMembers\Templates
 * @since       1.0.0
 */


// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
?>
						
<div id="edd-members-private-message" class="edd-members-private-message">
	
	<?php if ( !is_user_logged_in() ) : ?>
								
		<?php $edd_members_settings_private_label_logged_out = edd_get_option( 'edd_members_settings_private_label_logged_out' ) ? edd_get_option( 'edd_members_settings_private_label_logged_out' ) : __( 'This content is for members only.', 'edd-members' ); ?>
		<?php echo apply_filters( 'edd_members_the_content', wp_kses_post( $edd_members_settings_private_label_logged_out ) ); ?>
		
		<?php
		// Show login form for logged out users if the setting have been enabled
		$edd_members_show_login_form = edd_get_option( 'edd_members_show_login_form' );
		
		// Do not show login form in bbPress content
		if( function_exists( 'is_bbpress' ) ) :
			$edd_members_is_bbpress = is_bbpress();
		endif;
		
		if ( $edd_members_show_login_form && ! $edd_members_is_bbpress ) : ?>
		
			<?php wp_login_form(); ?>
			
			<a href="<?php echo wp_lostpassword_url( esc_url( get_permalink() ) ); ?>"><?php _e( 'Lost password?', 'edd-members' ); ?></a>
		
		<?php endif; ?>
		
	<?php else : // For logged in users ?>
	
		<?php $edd_members_settings_private_label_logged_in = edd_get_option( 'edd_members_settings_private_label_logged_in' ) ? edd_get_option( 'edd_members_settings_private_label_logged_in' ) : __( 'This content is for members only. Your membership have probably expired.', 'edd-members' ); ?>
		<?php echo apply_filters( 'edd_members_the_content', wp_kses_post( $edd_members_settings_private_label_logged_in ) ); ?>
		
	<?php endif; ?>
	
</div><!-- .edd-members-private-message -->