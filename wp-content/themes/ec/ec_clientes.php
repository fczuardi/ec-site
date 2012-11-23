<?php
/*
Template Name: Clientes
*/
get_header();


// $clients = get_terms( 'cliente', 'orderby=count&hide_empty=0' );
$clients = get_terms( 'cliente', 'orderby=id&order=DESC&hide_empty=0' );
?>

<div class="grid">
<?php
foreach ($clients as $client) {
  $image_src = s8_get_taxonomy_image_src($client, 'full');
  ?>
      <div class="icon">
        <img class="attachment-ec_trabalho_grid wp-post-image" src="<?php echo $image_src['src'];?>"/>
      </div>
  <?php
}
?>
</div>

<div class="clearfloat"></div>

<?php
get_footer();
?>