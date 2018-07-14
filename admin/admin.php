<?php
class wphk_admin{

	function __construct()
	{
		add_filter( 'plugin_action_links', array( $this, 'wphk_plugin_action_links'),10,2);
		add_action('admin_menu', array( $this,'wphk_admin_menu' ) );
	}
		function wphk_plugin_action_links( $links, $file ) 
		{
			if ( $file != WPHK_PLUGIN_BASENAME ) {
				return $links;
			}

			$settings_link = sprintf( '<a href="%1$s">%2$s</a>',
				menu_page_url( 'admin', true ),
				esc_html( __( 'Settings', 'hemant-plugin' ) ) );
				array_unshift( $links, $settings_link );
			return $links;
		}

		function wphk_admin_menu() 
		{
            add_menu_page('faculty-staff',
	            'teacher',
	            'read', 'admin',
	            array($this,'wphk_admin_page')
	            );
		    
		  }
		function wphk_admin_page()
		{?>

			<div class="hk_admin">
                <h1 class="wp-heading-inline"><?php
                    echo esc_html('Faculty');?> 
                </h1>
        </div>
        <table class="form-table">
                <tr>
                    <th><label><?php _e("Short Code");?></label></th>
                    <td> <input type="text" value="[teacher]" readonly style="background-color:#fff"/>
                        <p> This Short Code will help you For displaying the all Teacher staff</p>
                    </td>
                </tr>
                <tr>
                	<th><label><?php _e("Enter Custom Post Type");?></label></th>
                	<form method="post" action="">
                	<th> <input type="text" value="" name="cpt"></th>
                	<th><input type="submit" value="Submit"></th></form>
                </tr>

        </table>
        <?php
							
							if(! empty($_POST['cpt']) )
								update_option('post_type',$_POST['cpt']);
							else
							  update_option('post_type','Teacher');
					   
        } 
		


}

$admin=new wphk_admin();