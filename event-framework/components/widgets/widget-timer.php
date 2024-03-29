<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register the Event Timer Widget
 * 
 * @package Event Framework
 * @since 1.0.0
 */

/**
 * Ef_Event_Timer_Widget Widget Class.
 * 
 * 
 * @package Event Framework
 * @since 1.0.0
 */
class Ef_Event_Timer_Widget extends WP_Widget {

	/**
	 * Contact Widget setup.
	 * 
	 * @package Event Framework
	 * @since 1.0.0
	 */
	function Ef_Event_Timer_Widget() {
		
		$widget_name = EF_Framework_Helper::get_widget_name();
		
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'ef_event_timer', 'description' => __( 'Shows text columns organized in columns', 'dxef' ) );
		
		/* Create the widget. */
		$this->WP_Widget( 'ef_event_timer', $widget_name . __( ' Event Timer', 'dxef' ), $widget_ops );
		
	}
	/**
	 * Output of Widget Content
	 * 
	 * Handle to outputs the
	 * content of the widget
	 * 
	 * @package Event Framework
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
	
	$timertitle		= isset( $instance['timertitle'] ) ? $instance['timertitle'] : '';
	$timerdatestr	= isset( $instance['timerdatestr'] ) ? $instance['timerdatestr'] : '';
	$timerdate		= isset( $instance['timerdate'] ) ? $instance['timerdate'] : '';
    // Load countdown.js from framework assets folder
    wp_enqueue_script( 'ef-countdown', EF_ASSETS_URL . '/js/countdown.js', array( 'jquery' ), false, true );

    echo stripslashes($args['before_widget']);
    ?>
    <!-- TIME COUNTER -->
    <div id="tile_timer" class="container widget">
        <div class="timecounter">
            <div>
                <span class="title"><?php echo stripslashes($timertitle); ?></span>
                <div class="time">
                    <?php if (!empty($timerdate)) { ?>
                    	<?php 
                    	$countdown_expiration = $timerdate;
                    	?>
                    	<script type="text/javascript">
                    		var countdown_expiration = <?php echo $countdown_expiration; ?>;
                    	</script>
                        <input type="hidden" id="countdown_hidden" />
                        <span class="days">0 <span><?php _e('Days', 'dxef'); ?></span></span>
                        <span class="hours">0 <span><?php _e('Hours', 'dxef'); ?></span></span>
                        <span class="minutes">0 <span><?php _e('Minutes', 'dxef'); ?></span></span>
                        <span class="seconds">0 <span><?php _e('Seconds', 'dxef'); ?></span></span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo stripslashes($args['after_widget']);
	}
	/**
	 * Update Widget Setting
	 * 
	 * Handle to updates the widget control options
	 * for the particular instance of the widget
	 * 
	 * @package Event Framework
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Set the instance to the new instance. */
		$instance = $new_instance;
		
		/* Input fields */
		$instance['timertitle']		= strip_tags( $new_instance['timertitle'] );
		$instance['timerdatestr']	= strip_tags( $new_instance['timerdatestr'] );
		$instance['timerdate']		= strtotime( $new_instance['timerdate'] );
		
		return $instance;
	}
	
	/**
	 * Display Widget Form
	 * 
	 * Displays the widget
	 * form in the admin panel
	 * 
	 * @package Event Framework
	 * @since 1.0.0
	 */
	function form( $instance ) {
		
		$timertitle		= isset( $instance['timertitle'] ) ? $instance['timertitle'] : '';
		$timerdatestr	= isset( $instance['timerdatestr'] ) ? $instance['timerdatestr'] : '';
		$timerdate		= isset( $instance['timerdate'] ) ? $instance['timerdate'] : '';?>
		
	    <script type='text/javascript'>
	        jQuery(document).ready(function($) {
	            $('#widgets-right').on('focusin', '.timerdatestr', function(){
	 	            jQuery(this).datepicker({
		                changeMonth:true,
		                changeYear: true,
		                altField: '.timerdate',
		                altFormat: 'yy-mm-dd'
		            });
	        	});
	        });  
	    </script>
	    <em><?php _e('Title:', 'dxef'); ?></em><br />
	    <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'timertitle' ); ?>" value="<?php echo stripslashes($timertitle); ?>" />
	    <br /><br />
	    <em><?php _e('Countdown Date:', 'dxef'); ?></em><br />
	    <input type="text" class="timerdatestr" name="<?php echo $this->get_field_name( 'timerdatestr' ); ?>" value="<?php echo $timerdate ? date('m/d/Y', $timerdate) : ''; ?>"/>
	    <input type="hidden" class="timerdate" name="<?php echo $this->get_field_name( 'timerdate' ); ?>" value="<?php echo $timerdate ? date('Y-m-d', $timerdate) : ''; ?>"/>
	    <br /><br />
	    <input type="hidden" name="submitted" value="1" /><?php
	}
}

// Enqueue datepicker Js/Css
add_action('load-widgets.php', 'load_widget_timer');

/**
 * Enqueue JS/CSS File
 *  
 * Handle to enqueue js/css file for datepicker
 * 
 * @package Event Framework
 * @since 1.0.0
 */
function load_widget_timer() {
	
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_style('jquery-ui-datepicker', get_template_directory_uri() . '/css/admin/smoothness/jquery-ui-1.10.3.custom.min.css');
}

// Register Widget
register_widget( 'Ef_Event_Timer_Widget' );