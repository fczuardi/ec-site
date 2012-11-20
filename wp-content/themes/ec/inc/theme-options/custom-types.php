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
        'supports' => array('title','thumbnail')
        );

    register_post_type('ec_pessoa',$args);
}

add_action( 'add_meta_boxes', 'ec_type_pessoa_properties', 10, 2 );

function ec_type_pessoa_properties() {
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


?>