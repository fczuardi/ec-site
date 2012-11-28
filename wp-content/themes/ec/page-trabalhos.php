<?php

get_header();

$args=array(
  'post_type' => 'post',
  'posts_per_page' => $posts_per_page,
  'orderby'=> 'date'
);

$wp_query = new WP_Query($args);

?>
<div class="grid">
  <?php
      if( have_posts() ) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
    ?>
      <div class="icon">
        <a class="fancybox" data-fancybox-type="iframe" href="<?php the_permalink(); ?>?iframe=1">
          <span><p><?php the_title()?></p></span>
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
        width: 880,
        height: 'auto',
        minHeight: 400,
        helpers : {
          overlay : {
            css : {
              'background' : 'rgba(255, 255, 255, 0.5)'
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