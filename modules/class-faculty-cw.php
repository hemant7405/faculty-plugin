<?php


class Faculty_CW extends WP_Widget
{
	public function __construct()
	{
		add_action( 'widgets_init', array( $this, 'wpb_load_widgett' ) );
		parent::__construct(
			 
			// Base ID of your widget
			'Faculty_CW', 
			 
			// Widget name will appear in UI
			__('Recent Teacher', 'Faculty_CW_domain'), 
			 
			// Widget description
			array( 'description' => __( 'It will display the recent Teacher', 'Faculty_CW_domain' ), ) 
			);

	}

			// Register and load the widget

			function wpb_load_widgett() {
			    register_widget( 'Faculty_CW' );
			}

			    /**  
			     * Front-end display of widget.
			     *
			     * @param array $args     Widget arguments.
			     * @param array $instance Saved values from database.
			     */
			    public function widget( $args, $instance ) { 
			        //extract( $args );
			         
			        $title = apply_filters( 'widget_title', $instance['title'] );
			        $range = apply_filters( 'posts', $instance['range'] );?>
			         
			        
			            <h5> <?php echo $title;?></h5>
			            <?php
			            $args = array( 'post_type' => 'Teacher',
			             'numberposts' => $range );
			            $recent_posts = wp_get_recent_posts( $args );
			            foreach( $recent_posts as $key ){
			            echo '<p><a href="' . get_permalink($key["ID"]).'">'. $key["post_title"].'</a> </p> ';
			        }
			        wp_reset_query();
			         
			    }
			    /**
			      * Back-end widget form.
			      *
			      * @see WP_Widget::form()
			      *
			      * @param array $instance Previously saved values from database.
			      */
			    // Widget Backend 
			        public function form( $instance ) {
			            if (! empty( $instance[ 'title' ] ) ) {
			                $title = $instance[ 'title' ];
			            }
			            else {
			                $title = __('Add-new-title', 'Faculty_CW_domain' );
			            }
			            if ( isset( $instance[ 'range' ] ) ) {
			                $range = $instance[ 'range' ];
			            }
			            else {
			                $range = __( '', 'Faculty_CW_domain' );
			            }?>      
			        
			            <p>
			                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			                <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			            </p>
			             <p>
			                    <label for="<?php echo $this->get_field_id( 'range' ); ?>"><?php _e( 'range:' ); ?></label> 
			                    <input class="widefat" id="<?php echo $this->get_field_id( 'range' ); ?>" name="<?php echo $this->get_field_name( 'range' ); ?>" type="text" value="<?php echo esc_attr( $range ); ?>" />
			                    </p>
			            <?php 
			        }
			             
			        // Updating widget replacing old instances with new
			        public function update( $new_instance, $old_instance ) {
			        $instance = array();
			        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

			        $instance['range'] = ( ! empty( $new_instance['range'] ) ) ? strip_tags( $new_instance['range'] ) : '';
			        return $instance;
			        }
}
$wc=new Faculty_CW();
 
