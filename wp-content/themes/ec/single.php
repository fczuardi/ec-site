<?php
/**
 * The Template for displaying all single posts.
 *
 * @package ec
 * @since ec 1.0
 */
get_header();

global $post;

if ($_GET["iframe"]) {
	echo '<style>#masthead {display: none;}</style>';
}

while ( have_posts() ) : the_post();
	$cliente = array_shift(array_values(get_the_terms($post->ID, 'cliente')));
	$campanha = array_shift(array_values(get_the_terms($post->ID, 'campanha')));
	// var_dump($cliente);

?>


<div class="sidebar">
	<h1><?php echo $cliente->name; ?></h1>
	<h2><?php echo $campanha->name; ?></h2>
	<ul>
		<?php
		$args = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'campanha',
					'field' => 'slug',
					'terms' => $campanha->name
				)
			)
		);
		$posts = get_posts($args);
		foreach($posts as $post) :
		?>
			<li<?php echo (is_single($post->ID)) ? ' class="active"': ''?>><a href="<?php the_permalink(); ?>?iframe=1"><?php the_title(); ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>

<div class="content">
	<?php the_content(); ?>
</div>
<div class="clearfloat"></div>

<?php endwhile;

get_footer(); ?>