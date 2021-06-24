<?php


add_action('woocommerce_composite_before_components','composite_addon_load_template_before_step',9999);
add_action('woocommerce_composite_after_components','composite_addon_load_template_after_step',9999);

function composite_addon_load_template_before_step(){
  ?>
    <div class="composite_addon_step_template">
      <div class="composite_addon-template-left">
          <?php composite_load_template('composite-siderbar-left');  ?>
      </div>
      <div class="composite_addon-template-center">
  <?php
}

function composite_addon_load_template_after_step(){
  ?>
      </div>
      <div class="composite_addon-template-right">
          <?php composite_load_template('composite-siderbar-right');  ?>
      </div>
  </div>
  <?php
}

 ?>
