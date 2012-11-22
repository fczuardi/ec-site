<?php

// Metas de Post

add_action( 'add_meta_boxes', 'ec_type_post_properties', 10, 2 );

function ec_type_post_properties() {
  add_meta_box(
    'ec_post_ordem',
    __( 'Ordem de exibição', 'ec'),
    'ec_admin_meta_post_ordem',
    'post'
  );
  add_meta_box(
    'ec_post_tipo',
    __( 'Tipo', 'ec'),
    'ec_admin_meta_post_tipo',
    'post'
  );
}

function ec_admin_meta_post_ordem( $post ) {
  $ordem = get_post_meta($post->ID, '_ordem', true);
  echo '<table class="form-table">';
  echo '<input type="text" name="_ordem" placeholder="" value="', $ordem ? $ordem : '','" size="30" style="width:75%; margin-right: 20px; float:left;" />';
  echo '</table>';
}

function ec_admin_meta_post_tipo( $post ) {
  $tipo = get_post_meta($post->ID, '_tipo', true);
  echo '<table class="form-table">';
  echo '<select name="_tipo">';
  echo '<option value="imagem" ', ($tipo == 'imagem') ? 'selected' : '', '>Imagem</option>';
  echo '<option value="video" ', ($tipo == 'video') ? 'selected' : '', '>Vídeo</option>';
  echo '</select>';
  echo '</table>';
}


add_action( 'save_post', 'ec_post_save_postdata' );
function ec_post_save_postdata( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;

  $pessoa_ordem = $_POST['_ordem'];
  $pessoa_tipo = $_POST['_tipo'];

  add_post_meta($post_id, '_ordem', $pessoa_ordem, true) or update_post_meta($post_id, '_ordem', $pessoa_ordem);
  add_post_meta($post_id, '_tipo', $pessoa_tipo, true) or update_post_meta($post_id, '_tipo', $pessoa_tipo);

}


// Taxonomias de Post

function post_taxonomies_init() {
  register_taxonomy(
    'cliente',
    'post',
    array(
      'label' => __( 'Clientes' ),
      'rewrite' => false,
      'hierarchical' => true
    )
  );

  register_taxonomy(
    'campanha',
    'post',
    array(
      'label' => __( 'Campanhas' ),
      'rewrite' => false,
      'hierarchical' => true
    )
  );
}

add_action( 'init', 'post_taxonomies_init' );



?>