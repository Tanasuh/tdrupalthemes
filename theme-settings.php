<?php 


function tanasuh_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['facebook'] = array(
  '#type' => 'textfield', 
  '#title' => t('Facebook'), 
  '#default_value' => theme_get_setting('facebook'), 
  '#size' => 60, 
  '#maxlength' => 128, 
  );

   $form['twitter'] = array(
  '#type' => 'textfield', 
  '#title' => t('twitter'), 
  '#default_value' => theme_get_setting('twitter'), 
  '#size' => 60, 
  '#maxlength' => 128, 
  );
  
    $form['youtube'] = array(
  '#type' => 'textfield', 
  '#title' => t('youtube'), 
  '#default_value' => theme_get_setting('youtube'), 
  '#size' => 60, 
  '#maxlength' => 128, 
  );


}



?>



