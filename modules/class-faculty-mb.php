<?php


class Faculty_MB{

		public function __construct()
		{
			
			add_action( 'admin_init', array( $this, 'faculty_register_meta_boxes' ) );
			add_action( 'save_post', array( $this, 'wpdocs_save_meta_box' ) );

		}

			/**
			 * Register meta box(es).
			 */
			function faculty_register_meta_boxes() {
			    add_meta_box('','Faculty Information', array( $this,'faculty_my_display_callback'), 'Teacher');
			}
		
			 
			/**
			 * Meta box display callback.
			 *
			 * @param WP_Post $post Current post object.
			 */
			function faculty_my_display_callback( $post ) {
			    // Display code/markup goes here. Don't forget to include nonces!
			 // global $post;
			    //$values = get_post_custom( $post->id );
			   // print_r($post);
			    //print_r($post->ID);
			    ?>
			  
				    <table>
			            <tr>
				       <td> <label for="Designation">Designation:</label></td>
				        <td><input type="text" name="Designation" value= <?php echo get_post_meta( get_the_ID(), 'Designation',true);?> ></td></tr>
			            <tr>
				         <td><label for="facebook">Facebook :</label></td>
				        <td><input type="text" name="Facebook" value=  <?php echo get_post_meta( get_the_ID(), 'Facebook',true);?> ></td> </tr>
			            <tr>
				        <td><label for="Twitter">Twitter:</label></td>
				        <td><input type="text" name="Twitter" value=  <?php echo get_post_meta( get_the_ID(), 'Twitter',true);?> ></td> </tr>
			            <tr>
				        <td><label for="Instagram">Instagram :</label></td>
				        <td><input type="text" name="Instagram"value=  <?php echo get_post_meta( get_the_ID(), 'Instagram',true);?> ></td></tr>
			            <tr>
				        <td><label for="Contact">Contact :</label></td>
				        <td><input type="text" name="Contact" value=  <?php echo get_post_meta( get_the_ID(), 'Contact',true);?> ></td> </tr>
				        <tr><td><input type="submit" name="submit" value="Add Custom fileds"  ></td></tr>
				    </table>

			<?php } 
			 
			/**
			 * Save meta box content.
			 *
			 * @param int $post_id Post ID
			 */
			//add_action( 'save_post', 'wpdocs_save_meta_box' );
			function wpdocs_save_meta_box( $post_id ) {

			    if( isset( $_POST['submit'] ) )
			    {
			    	if( !( ($_POST['Designation']) ==NULL))
						update_post_meta( $post_id,'Designation', wp_strip_all_tags($_POST['Designation']));
					if( !( ($_POST['Facebook']) ==NULL))
						update_post_meta( $post_id,'Facebook', wp_strip_all_tags($_POST['Facebook']));
					if( !( ($_POST['Twitter']) ==NULL))
						update_post_meta( $post_id,'Twitter',  wp_strip_all_tags($_POST['Twitter']));
					if( !( ($_POST['Instagram']) ==NULL))
						update_post_meta( $post_id,'Instagram',  wp_strip_all_tags($_POST['Instagram']));
					if( !( ($_POST['Contact']) ==NULL))
						update_post_meta( $post_id,'Contact', wp_strip_all_tags($_POST['Contact']));
				}
			    

			}
}

$mb= new Faculty_MB();
