<?php
/*
Template Name: Pessoas
*/
get_header();

$args=array(
  'post_type' => 'ec_pessoa',
  'posts_per_page' => $posts_per_page,
  'orderby'=> 'date'
);

$wp_query = new WP_Query($args);

$biografias = array();

?>
<div id="names_sidebar">
  <ol>
    <?php
      if( have_posts() ) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
          $ec_pessoa_foto_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'ec_pessoa_foto');
          $biografias[get_the_ID()] = get_post_meta($post->ID, '_biografia', true);
    ?>
      <li id="name-<?php echo the_ID(); ?>">
        <a href="#" data-bgimage="<?php echo $ec_pessoa_foto_url[0]?>"><?php the_title()?></a>
        <p class="fullname"><?php echo get_post_meta($post->ID, '_nomecompleto', true);?></p>
        <p class="position"><?php echo get_post_meta($post->ID, '_cargo', true);?></p>
        <span class="email"><a href="mailto:<?php echo get_post_meta($post->ID, '_email', true);?>"><?php echo get_post_meta($post->ID, '_email', true);?></a></span>
      </li>
    <?php
        endwhile;
      endif;
    ?>

  </ol>
</div>
<div id="bio">
  <?php
    foreach ($biografias as $biografia => $conteudo) {
      ?>
        <div id="bio-<?php echo $biografia; ?>">
          <?php echo $conteudo; ?>
        </div>
      <?php
    }
  ?>
</div>
<div class="clearfloat"></div>
 <!-- <br style="clear:both;float:none;" /> -->

<script>
  jQuery(document).ready(function ($) {
    // Exibe primeira pessoa (nav, bio, fundo)
    $('#names_sidebar li:first-child').addClass('active');
    $('#bio > div:first-child').addClass('active');
    var first_bg_image = $('#names_sidebar li:first-child a').data('bgimage');
    $('.slug-pessoas #main').css('background-image', 'url('+first_bg_image+')');

    // Cada clique muda o menu, a biografia e a foto de fundo
    $('#names_sidebar li > a').click(function(index) {
      $('#names_sidebar li').removeClass('active');
      $(this).parent().addClass('active');

      $('#bio > div').removeClass('active');
      var name_id = $(this).parent().attr('id').substr(5);
      $('#bio-'+name_id).addClass('active');

      var bg_image = $(this).data('bgimage');
      $('.slug-pessoas #main').css('background-image', 'url('+bg_image+')');
    });



  });
</script>

<?php
get_footer();
?>