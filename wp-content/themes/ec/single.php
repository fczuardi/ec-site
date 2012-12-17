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

// simular o ambiente de produção no localhost
ini_set('display_errors', '1');

class Cliente{
	public $name = '';
}

class Campanha{
	public $name = '';
	public $term_id = null;
}
while ( have_posts() ) : the_post();
	$get_terms_cliente = get_the_terms($post->ID, 'cliente');
	$get_terms_campanha = get_the_terms($post->ID, 'campanha');
	$cliente = $get_terms_cliente ? array_shift($get_terms_cliente) : new Cliente;
	$campanha = $get_terms_campanha ? array_shift($get_terms_campanha): new Campanha;
?>


<div class="sidebar">
	<h1><?php echo $cliente->name; ?></h1>
	<h2><?php echo $campanha->name; ?></h2>
	<ul>
		<?php
		$args = array(
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'campanha',
					'field' => 'id',
					'terms' => $campanha->term_id
				)
			),
		'order' => 'ASC',
		'orderby' => 'date'
		);
		$posts = get_posts($args);
		foreach($posts as $post) :
		?>
			<li<?php echo (is_single($post->ID)) ? ' class="active"': ''?>><a href="<?php the_permalink(); ?>?iframe=1"><?php echo get_post_meta($post->ID, '_subtitulo', true); ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>

<div class="content">
	<?php the_content(); ?>
</div>
<div class="clearfloat"></div>

<?php endwhile;

get_footer(); ?>