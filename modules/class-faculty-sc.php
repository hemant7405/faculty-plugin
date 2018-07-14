<?php

class Faculty_SC
{

	public function __construct(){

		add_shortcode( 'teacher', array( $this, 'faculty_shortcode' ) );
		add_action( 'wp_enqueue_scripts', array ($this, 'load_plugin_style' ) );
	}

	 function load_plugin_style() {
       wp_enqueue_style( 'custom_plugin_style', WPHK_PLUGIN_URL . '/style.css' );
         wp_enqueue_style( 'my-icon',"https://use.fontawesome.com/releases/v5.0.7/css/all.css" );
   }
			function faculty_shortcode( $atts ) {
			    ob_start();
			    $query = new WP_Query( array(
			        'post_type' => 'Teacher',
			        'posts_per_page' => -1,
			        'order' => 'ASC',
			        'orderby' => 'title',
			    ) );
			    if ( $query->have_posts() ) { ?>
			            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
			           <section class="faculty_post_type">
			                        <div class="faculty_post_type-details">
			                            <!--It is used to display the image from custom post-->
			                                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			                                      <?php the_post_thumbnail(); ?>
			                                  </a>
			                              
			                            <h5 class=".faculty_post_type-title">
			                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			                                    <?php echo get_the_title(); ?>
			                                </a></h5>
			                                <hr>
			                                <div class="designation">
			                                <?php echo get_post_meta( get_the_ID(), 'Designation',true);?>
			                                </div>
			                            <hr>
			                            <div>
			                                  <?php echo get_post_meta( get_the_ID(),'Contact',true);?>
			                            </div>
			                            <div class="overlay">
			                              <div class="text">
			                                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			                                     <?php echo get_post_meta( get_the_ID(),'Designation',true);?></a>
			                                   </div>
			                                <div class="social">
			                                        <!--Facebook Url-->
			                                          <?php if( ! empty (get_post_meta( get_the_ID(), 'Facebook', true))) : ?>
			                                          <div class="social_wrap">
			                                           <a href="<?php echo get_post_meta( get_the_ID(), 'Facebook',true);?>" target="_blank">
			                                          <i class="fab fa-facebook-square"></i></a>
			                                         </div>
			                                         <?php endif; ?>
			                                            <!--Twitter Url-->
			                                            <?php if( ! empty (get_post_meta( get_the_ID(), 'Twitter', true))) : ?>
			                                           <div class="social_wrap">
			                                           <a href="<?php echo get_post_meta( get_the_ID(), 'Twitter',true);?>" target="_blank">
			                                          <i class="fab fa-twitter-square"></i></a>
			                                         </div>
			                                         <?php endif; ?>
			                                            <!--Instagram Url-->
			                                            <?php if( ! empty (get_post_meta( get_the_ID(), 'Instagram', true))) : ?>
			                                         <div class="social_wrap">
			                                           <a href="<?php echo get_post_meta( get_the_ID(), 'Instagram',true);?>" target="_blank">
			                                          <i class="fab fa-instagram"></i></a>
			                                         </div>
			                                       <?php endif; ?>
			                              </div>
			                            </div> 
			                        </div>

			                    </section>
			                    <?php endwhile;
			                        wp_reset_postdata(); ?>
			               

			    <?php $myvariable = ob_get_clean();
			    return $myvariable;
			    }
			}
}

$sc=new Faculty_SC();