<?php
/*
Template Name: Clientes
*/
get_header();


$clients = get_terms( 'cliente', 'orderby=count&hide_empty=0' );
var_dump($clients);

foreach ($clients as $client) {
  echo "<hr>";
  $image_src = s8_get_taxonomy_image_src($client, 'full');
  var_dump($image_src);
  // apply_filters('taxonomy_image_plugin_get_term_info', $client->term_id);
  // var_dump(taxonomy_image_plugin_get_term_info(intval($client->term_id)));
  // var_dump(apply_filters( 'taxonomy_image_plugin_get_term_info', $client['id']);
}

get_footer();
?>