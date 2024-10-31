<?php

/**
 * Setting Handler class
 */

if (!class_exists('Rhxgrid_setting'))
{
    class Rhxgrid_setting
    {
        /**
         * Handles the settings page
         *
         * @return void
         */
        public function settings_page()
        {
        echo '<div class="rhxgrid_warp">';
        echo '<h1>Post Grid Settings</h1>';
?>

<div id="rhxgrid_left">
  <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <div class="inside">
      <h3><?php echo esc_attr(__('Insert your text & background color')); ?></h3>
      <table class="form-table">
        <tr>
          <th><label for="rhxgrid_number_post"><?php echo esc_attr(__('Number of Post')); ?></label></th>
          <td><input type="text" name="rhxgrid_number_post" value="<?php $rhxgrid_number_post = get_option('rhxgrid_number_post'); if(!empty($rhxgrid_number_post)) {echo esc_attr($rhxgrid_number_post);} else {echo esc_attr("6");}?>"></td>
        </tr>
        <tr>
        <tr>
          <th><label for="rhxgrid__order"><?php echo esc_attr(__('Post Display Order')); ?></label></th>
          <td><select name="rhxgrid__order" id="rhxgrid__order">
              <option value="DESC" <?php if( get_option('rhxgrid__order') == 'DESC'){ echo esc_html__('selected="selected"'); } ?>>Descending</option>
              <option value="ASC" <?php if( get_option('rhxgrid__order') == 'ASC'){ echo esc_html__('selected="selected"'); } ?>>Ascending</option>
            </select></td>
        </tr>
        </tr>

        <tr>
          <th><label for="rhxgrid_hover_color"><?php echo esc_attr(__('Post Hover Color')); ?></label></th>
          <td><input type="text" name="rhxgrid_hover_color" id="scrollbar_color" value="<?php $rhxgrid_hover_color = get_option('rhxgrid_hover_color'); if(!empty($rhxgrid_hover_color)) {echo esc_html($rhxgrid_hover_color);} else {echo esc_html__("#ff000087");}?>" class="color-picker rhxgrid_hover_color" /></td>
        </tr>
        <tr>
          <th><label for="rhxgrid_button_activecolor"><?php echo esc_attr(__('Button Active Color')); ?></label></th>
          <td><input type="text" name="rhxgrid_button_activecolor" id="scrollbar_color" value="<?php $rhxgrid_button_activecolor = get_option('rhxgrid_button_activecolor'); if(!empty($rhxgrid_button_activecolor)) {echo esc_html($rhxgrid_button_activecolor);} else {echo esc_html__("#ff0000");}?>" class="color-picker rhxgrid_button_activecolor" /></td>
        </tr>
        <tr>
          <th><label for="rhxgrid_button_hovercolor"><?php echo esc_attr(__('Button Hover Color')); ?></label></th>
          <td><input type="text" name="rhxgrid_button_hovercolor" id="scrollbar_color" value="<?php $rhxgrid_button_hovercolor = get_option('rhxgrid_button_hovercolor'); if(!empty($rhxgrid_button_hovercolor)) {echo esc_html($rhxgrid_button_hovercolor);} else {echo esc_html__("#ff0000");}?>" class="color-picker rhxgrid_button_hovercolor" /></td>
        </tr>
        <tr>
          <th><label for="rhxgrid_post_titlecolor"><?php echo esc_attr(__('Post Title Color')); ?></label></th>
          <td><input type="text" name="rhxgrid_post_titlecolor" id="scrollbar_color" value="<?php $rhxgrid_post_titlecolor = get_option('rhxgrid_post_titlecolor'); if(!empty($rhxgrid_post_titlecolor)) {echo esc_html($rhxgrid_post_titlecolor);} else {echo esc_html__("#FFF");}?>" class="color-picker rhxgrid_post_titlecolor" /></td>
        </tr>
        <tr>
          <th><label for="post_description_color"><?php echo esc_attr(__('Post Description Color')); ?></label></th>
          <td><input type="text" name="post_description_color" id="scrollbar_color" value="<?php $wpnhtp_label_color = get_option('post_description_color'); if(!empty($post_description_color)) {echo esc_html($post_description_color);} else {echo esc_html__("#a4afb7");}?>" class="color-picker post_description_color" /></td>
        </tr>
      </table>
      <input type="hidden" name="action" value="update" />
      <input type="hidden" name="page_options" value="rhxgrid_number_post, rhxgrid__order, post_description_color, rhxgrid_post_titlecolor, rhxgrid_hover_color, rhxgrid_button_activecolor, rhxgrid_button_hovercolor" />
      <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" class="button button-primary" />
      </p>
    </div>
  </form>
</div>
<div id="nhtRight">
  <div class="nhtWidget">
    <h3>
      <?php _e('Donate and support the development.','nht') ?>
    </h3>
    <p>
      <?php _e('With your help I can make Simple Fields even better! $5, $10, $100 – any amount is fine! :)','nht') ?>
    </p>
    <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="82C6LTLMFLUFW">
      <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
    </form> -->
  </div>
  <div class="nhtWidget">
    <h3><?php echo esc_attr(__('About the Plugin')); ?></h3>
    <p>You can make my day by submitting a positive review on <a href="https://wordpress.org/support/view/plugin-reviews/rhx-post-grid/" target="_blank"><strong>WordPress.org!</strong> <img src="<?php bloginfo('url' ); echo"/wp-content/plugins/wp-news-headline-ticker/img/review.png"; ?>" alt="review" class="review"/></a></p>
    <div class="clrFix"></div>
  </div>
  <div class="nhtWidget">
    <div class="clrFix"></div>
    <h3>About the Author</h3>
    <p>I am a Web Developer, Expert WordPress Developer. I am available for interesting freelance projects. If you ever need my help, do not hesitate to get in touch <a href="https://www.facebook.com/rihan.zihad/" target="_blank">me</a>.<br />
      <strong>Skype:</strong> live:.cid.91dd04c23d43ff47<br />
      <strong>Email:</strong> zihad0008@gmail.com<br />
      <strong>Web:</strong> <a href="https://www.facebook.com/rihan.zihad/" target="_blank">Rihan Habib</a><br />
      <!-- <strong>Hire Me on:</strong> <a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">UpWork</a><br /> -->
    <div class="clrFix"></div>
  </div>
</div>
<div class="clrFix"></div>
<?php
    echo '</div>';


        }


    }
}
