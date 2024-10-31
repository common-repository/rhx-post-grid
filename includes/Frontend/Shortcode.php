<?php

/**
 * Shortcode handler class
 */
if (!class_exists('Rhxgrid_shortcode')){
class Rhxgrid_shortcode {

    /**
     * Initializes the class
     */
    function __construct() {
        add_shortcode( 'rhxpost-grid', [ $this, 'rhxgrid_render_shortcode' ] );

    }

    /**
     * Shortcode handler class
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function rhxgrid_render_shortcode( $atts, $content = '' ) {

        wp_enqueue_script( 'isotope-script' );
        wp_enqueue_script( 'rhxgrid-script' );
        wp_enqueue_style( 'rhxgrid-frontend-style' );
        wp_enqueue_style( 'bootstrap-min-css' );
        
        ?>
        <?php ob_start(); ?>
        <!--====== Grid Menu ======-->

        <div class="row">
            <div class="col-md-12">
                <div class="portfolio-menu">
                    <div class="button-group filters-button-group">  <button class="button is-checked" data-filter="*">show all</button>

                    <?php $categories = get_categories();
                     foreach ($categories as $category) {
                       /*if($category->name != 'Uncategorized'){*/?>
                        <button class="button" data-filter=".<?php echo esc_attr($category->slug);?>"><?php echo esc_html($category->name); ?></button>
                        
                     <?php /*}*/ } ?>
                    </div>
                </div>
                </div>
              </div>

       
                <div class="grid row">
                <?php

                //Get post data.
                $total_post = get_option('rhxgrid_number_post');
                $post_order = get_option('rhxgrid__order');
                if(!$total_post){$total_post=6;}
                // list post display here
                $args = array(
                   'post_type'      => 'post',
                   'post_status'    => 'publish',
                   'posts_per_page' => $total_post,
                   'order'          => $post_order
                );
                $my_result = new WP_Query($args);
                if($my_result-> have_posts()){
                   while($my_result->have_posts()) : $my_result -> the_post();
                      $termsString= '';

                      $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                      <?php $imgcats = get_the_category( get_the_ID());
                      if(!empty($imgcats)): foreach($imgcats as $imgcat):
                      $categoryname = '';
                      $termsString .= $imgcat->slug.' ';
                      $categoryname = $imgcat->name;
                      /*if($categoryname == 'Uncategorized'){ $name = $categoryname;  }*/
                      endforeach; endif;?>

                    <?php /*if($categoryname != 'Uncategorized'){ */?>
                     

                    <div class="col-md-4 col-sm-6 col-12  element-item <?php echo esc_attr($termsString); ?>">
                    <div class="portfolio-item">
                     <img src="<?php the_post_thumbnail_url('grid-thumb', array('class'=>'grid-imgclass')); ?>" alt="<?php echo 'Post Grid Image'; ?>" />
                    <h6 class="post-title"><?php echo wp_trim_words( get_the_title(), 5 ); ?></h6>
                    <div class="post-content p-3"><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?></div>
                    <div class="portfolio-item-hover">
                        <a class="image-link text-white fw-bold" href="<?php the_permalink(); ?>">
                            <span class="dashicons dashicons-admin-links"></span>
                        </a>
                    </div>
                   </div>
                  </div>
                    <?php /*}*/ endwhile;};?>
                    <?php wp_reset_query();?>
                </div>
           
        <!--====== Grid End ======-->
        <?php $post_grid = ob_get_clean();
        return $post_grid;
    }

}

}
