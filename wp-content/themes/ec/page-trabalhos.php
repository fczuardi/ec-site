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
          // $ec_trabalho_grid_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'ec_trabalho_grids');
    ?>
      <div class="icon">
        <a href="#">
          <span><p><?php the_title()?></p></span>
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


  });
</script>

<?php
get_footer();
?>