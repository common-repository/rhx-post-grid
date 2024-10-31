<?php function rhx_griddynamic_css()
{ ?>
<style type="text/css">
.portfolio-item-hover {
    background: <?php $rhxgrid_hover_color = get_option('rhxgrid_hover_color');
    if(!empty($rhxgrid_hover_color)) {
    echo esc_html($rhxgrid_hover_color);
    }
    else {
    echo esc_html__("#ff000087");
    }
    ?>;
}

.button:active,
.button.is-checked {
color:<?php $rhxgrid_button_activecolor = get_option('rhxgrid_button_activecolor');
if(!empty($rhxgrid_button_activecolor)) {
echo esc_html($rhxgrid_button_activecolor);
}
else {
echo esc_html__("#ff0000");
}
?>;
}

.portfolio-menu button:hover {
color:<?php $rhxgrid_button_hovercolor = get_option('rhxgrid_button_hovercolor');
if(!empty($rhxgrid_button_hovercolor)) {
echo esc_html($rhxgrid_button_hovercolor);
}
else {
echo esc_html__("#ff0000");
}?>;
}

.post-title {
  color:<?php $rhxgrid_post_titlecolor = get_option('rhxgrid_post_titlecolor');
  if(!empty($rhxgrid_post_titlecolor)) {echo esc_html($rhxgrid_post_titlecolor);} else {echo esc_html__("#FFF");}?>;
}

.post-content {
  color:<?php $post_description_color = get_option('post_description_color');
    if(!empty($post_description_color)) {echo esc_html($post_description_color);} else {echo esc_html__("#a4afb7");}?>;
}

</style>
<?php
}
add_action('wp_footer','rhx_griddynamic_css', 100);
?>
