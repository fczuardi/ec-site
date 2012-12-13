<?php

get_header();

$args=array(
  'post_type' => 'post',
  'posts_per_page' => -1,
  'orderby'=> 'rand'
);

$wp_query = new WP_Query($args);

?>
<div class="grid">
  <?php
      if( have_posts() ) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
          $campanha = array_shift(array_values(get_the_terms($post->ID, 'campanha')));
          $cliente = array_shift(array_values(get_the_terms($post->ID, 'cliente')));
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
        endwhile;
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
        minHeight: 320,
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