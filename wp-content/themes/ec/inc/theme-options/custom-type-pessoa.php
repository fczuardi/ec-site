<?php
add_action( 'init', 'ec_create_type_pessoa' );

function ec_create_type_pessoa() {
    $labels = array(
        'name' => 'Pessoas',
        'singular_name' => 'Pessoa',
        'add_new' => 'Adicionar nova',
        'add_new_item' => 'Adicionar nova pessoa',
        'edit_item' => 'Editar Pessoa',
        'new_item' => 'Nova Pessoa',
        'view_item' => 'Ver Pessoa',
        'search_items' => 'Procurar Pessoa',
        'not_found' =>  'Nenhuma Pessoa encontrada',
        'not_found_in_trash' => 'Nenhuma Pessoa encontrada na lixeira',
        'parent_item_colon' => ''
        );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 3,
        'show_in_nav_menus' => false,
        'supports' => array('title','thumbnail', 'page-attributes', 'revisions')
        );

    register_post_type('ec_pessoa',$args);
}

add_action( 'add_meta_boxes', 'ec_type_pessoa_properties', 10, 2 );

function ec_type_pessoa_properties() {
  add_meta_box(
    'ec_pessoa_nomecompleto',
    __( 'Nome completo', 'ec'),
    'ec_admin_meta_pessoa_nomecompleto',
    'ec_pessoa'
  );
  add_meta_box(
    'ec_pessoa_cargo',
    __( 'Cargo', 'ec'),
    'ec_admin_meta_pessoa_cargo',
    'ec_pessoa'
  );
  add_meta_box(
    'ec_pessoa_email',
    __( 'Email', 'ec'),
    'ec_admin_meta_pessoa_email',
    'ec_pessoa'
  );
  add_meta_box(
    'ec_pessoa_biografia',
    __( 'Biografia', 'ec'),
    'ec_admin_meta_pessoa_biografia',
    'ec_pessoa'
  );
}

function ec_admin_meta_pessoa_nomecompleto( $post ) {
  $nomecompleto = get_post_meta($post->ID, '_nomecompleto', true);
  echo '<table class="form-table">';
  echo '<input type="text" name="_nomecompleto" placeholder="Seu nome completo" value="', $nomecompleto ? $nomecompleto : '','" size="30" style="width:75%; margin-right: 20px; float:left;" />';
  echo '</table>';
}

function ec_admin_meta_pessoa_cargo( $post ) {
  $cargo = get_post_meta($post->ID, '_cargo', true);
  echo '<table class="form-table">';
  echo '<input type="text" name="_cargo" placeholder="Seu cargo" value="', $cargo ? $cargo : '','" size="30" style="width:75%; margin-right: 20px; float:left;" />';
  echo '</table>';
}

function ec_admin_meta_pessoa_email( $post ) {
  $email = get_post_meta($post->ID, '_email', true);
  echo '<table class="form-table">';
  echo '<input type="text" name="_email" placeholder="Seu email" value="', $email ? $email : '','" size="30" style="width:75%; margin-right: 20px; float:left;" />';
  echo '</table>';
}

function ec_admin_meta_pessoa_biografia( $post ) {
  $biografia = get_post_meta($post->ID, '_biografia', true);
  echo '<table class="form-table">';
  echo '<textarea name="_biografia" placeholder="Sua biografia" size="30" style="width:75%; height:250px; margin-right: 20px; float:left;">', $biografia ? $biografia : '','</textarea>';
  echo '</table>';
}

add_action( 'save_post', 'ec_pessoa_save_postdata' );
function ec_pessoa_save_postdata( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;

  $pessoa_nomecompleto = $_POST['_nomecompleto'];
  $pessoa_cargo = $_POST['_cargo'];
  $pessoa_email = $_POST['_email'];
  $pessoa_biografia = $_POST['_biografia'];

  add_post_meta($post_id, '_nomecompleto', $pessoa_nomecompleto, true) or update_post_meta($post_id, '_nomecompleto', $pessoa_nomecompleto);
  add_post_meta($post_id, '_cargo', $pessoa_cargo, true) or update_post_meta($post_id, '_cargo', $pessoa_cargo);
  add_post_meta($post_id, '_email', $pessoa_email, true) or update_post_meta($post_id, '_email', $pessoa_email);
  add_post_meta($post_id, '_biografia', $pessoa_biografia, true) or update_post_meta($post_id, '_biografia', $pessoa_biografia);

}

?>