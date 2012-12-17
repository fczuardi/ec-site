<?php
// simular o ambiente de produção no localhost
ini_set('display_errors', '1');

get_header();

function cmp($a, $b) {
  if ($a->show_position == $b->show_position) {
    return 0;
  }
  return ($a->show_position < $b->show_position) ? -1 : 1;
}

$args = array(
  'post_type' => 'post',
  'posts_per_page' => -1,
  'meta_key' => '_destaque',
  'order' => 'ASC',
  'meta_value' => 'exibir',
  'orderby' => 'rand'
);

$todos_posts = get_posts( $args );
$posts_com_posicao = array();

$numeros_ocupados = array();
$numeros_livres = range(1, count($todos_posts));

foreach ($todos_posts as $key => $post) {
  if ( get_post_meta($post->ID, '_ordem', true) != '' ) {
    $temp_nos = (int)get_post_meta($post->ID, '_ordem', true);
    array_push($numeros_ocupados, $temp_nos);
    $post->show_position = $temp_nos;
  }
}

foreach($numeros_livres as $key => $numero) {
  foreach ($numeros_ocupados as $value) {
    if ($value == $numero) {
       unset($numeros_livres[$key]);
     }
  }
}

foreach ($todos_posts as $key => $post) {
  if ( get_post_meta($post->ID, '_ordem', true) == '' ) {
    $post->show_position = array_pop($numeros_livres);;
  }
}

usort($todos_posts, "cmp");

?>
<div class="grid">
  <?php
class Cliente{
  public $name = '';
}

class Campanha{
  public $name = '';
  public $term_id = null;
}
      if( have_posts() ) :
        foreach ( $todos_posts as $post ):
          $get_terms_cliente = get_the_terms($post->ID, 'cliente');
          $get_terms_campanha = get_the_terms($post->ID, 'campanha');
          $cliente = $get_terms_cliente ? array_shift($get_terms_cliente) : new Cliente;
          $campanha = $get_terms_campanha ? array_shift($get_terms_campanha): new Campanha;
    ?>
      <div class="icon">
        <a class="fancybox" data-fancybox-type="iframe" href="<?php the_permalink(); ?>?iframe=1">
          <span><p><?php echo $cliente->name; ?><br /><?php echo $campanha->name; ?></p></span>
          <?php if( 'video' == get_post_meta($post->ID, '_tipo', true)): ?>
          <img class="play" src="<?php echo get_template_directory_uri(); ?>/img/play.png">
          <?php endif; ?>
          <?php the_post_thumbnail('ec_trabalho_grid'); ?>
        </a>
      </div>
    <?php
        endforeach;
      endif;
    ?>
</div>

<div class="clearfloat"></div>
 <!-- <br style="clear:both;float:none;" /> -->

<script>
  jQuery(document).ready(function ($) {
    $(document).ready(function() {
      $(".fancybox").fancybox({
        padding: 0,
        'titleShow': false,
        'type': 'iframe',
        'autoDimensions' : false,
        width: 880,
        height: 'auto',
        // minHeight: 320,
        // minHeight: 320,
        'scrolling': 'no',
        helpers : {
          overlay : {
            css : {
              'background' : 'rgba(255, 255, 255, 0.5)',
              'overflow' : 'hidden'
            }
          }
    }
      });
    });
  });
</script>

<?php
get_footer();
?>