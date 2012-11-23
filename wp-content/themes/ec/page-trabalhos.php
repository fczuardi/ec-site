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
        <a class="iframe" href="<?php the_permalink(); ?>&iframe=1">
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
    $(".iframe").colorbox({
      iframe:true,
      width: "880px",
      height: "80%",
      transition: "none",
      opacity: 0.5
    });
  });
</script>

<?php
get_footer();
?>