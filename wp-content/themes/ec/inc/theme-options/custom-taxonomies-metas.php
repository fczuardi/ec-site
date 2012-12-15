<?php

// Metas de Post

add_action( 'add_meta_boxes', 'ec_type_post_properties', 10, 2 );

function ec_type_post_properties() {
  add_meta_box(
    'ec_post_ordem',
    __( 'Posição de exibição no grid', 'ec'),
    'ec_admin_meta_post_ordem',
    'post'
  );
  add_meta_box(
    'ec_post_tipo',
    __( 'Tipo', 'ec'),
    'ec_admin_meta_post_tipo',
    'post'
  );
  add_meta_box(
    'ec_post_subtitulo',
    __( 'Subtítulo', 'ec'),
    'ec_admin_meta_post_subtitulo',
    'post'
  );
  add_meta_box(
    'ec_post_destaque',
    __( 'Destaque', 'ec'),
    'ec_admin_meta_post_destaque',
    'post'
  );
}

function ec_admin_meta_post_ordem( $post ) {
  $ordem = get_post_meta($post->ID, '_ordem', true);
  echo '<table class="form-table">';
  echo '<input type="text" name="_ordem" placeholder="" value="', $ordem ? $ordem : '','" size="3" style="width:25px; margin-right: 10px; float:left;" />';
  echo '<p style="display:block;">Posição opcional no grid Trabalhos</p>';
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

function ec_admin_meta_post_subtitulo( $post ) {
  $subtitulo = get_post_meta($post->ID, '_subtitulo', true);
  echo '<table class="form-table">';
  echo '<input type="text" name="_subtitulo" placeholder="Impresso 1" value="', $subtitulo ? $subtitulo : '','" size="30" style="width:75%; margin-right: 20px; float:left;" />';
  echo '</table>';
}

function ec_admin_meta_post_destaque( $post ) {
  $destaque = get_post_meta($post->ID, '_destaque', true);
  echo '<table class="form-table">';
  echo '<label class="selectit"><input value="exibir" type="checkbox" name="_destaque" ', ($destaque == 'exibir') ? 'checked="checked"' : '', '> Exibir na Página de Trabalhos</label>';
  echo '</table>';
}

add_action( 'save_post', 'ec_post_save_postdata' );
function ec_post_save_postdata( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;

  $post_ordem = $_POST['_ordem'];
  $post_tipo = $_POST['_tipo'];
  $post_subtitulo = $_POST['_subtitulo'];
  $post_destaque = $_POST['_destaque'];

  add_post_meta($post_id, '_ordem', $post_ordem, true) or update_post_meta($post_id, '_ordem', $post_ordem);
  add_post_meta($post_id, '_tipo', $post_tipo, true) or update_post_meta($post_id, '_tipo', $post_tipo);
  add_post_meta($post_id, '_subtitulo', $post_subtitulo, true) or update_post_meta($post_id, '_subtitulo', $post_subtitulo);
  add_post_meta($post_id, '_destaque', $post_destaque, true) or update_post_meta($post_id, '_destaque', $post_destaque);

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