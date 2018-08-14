<!DOCTYPE html>
<!-- Based on HTML5 Bones | http://html5bones.com -->
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php get_header(); ?>
	<title><?php get_the_title(); ?></title>

	<!-- Mobile-friendly viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Style sheet link -->
	<link href="css/main.css" rel="stylesheet" media="all">

	<?php wp_head(); ?>
</head>
<body>
	<?php
		$args = array(
				'post_type'		=> 'post',
				'paged'			=> $paged
		);

		$post_query = new WP_Query( $args );
		$posts = $post_query->posts;

		foreach( $posts as $post ) {
			echo '<article>';
				
				echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>'; ?>

				<div class="content">
					<?php echo $post->post_content; ?>
				</div>

			<?php echo '</article>'; ?>

			<hr />

		<?php } 

		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => __( 'Previous Page', 'textdomain' ),
			'next_text' => __( 'Next Page', 'textdomain' ),
		) ); ?>

	<?php
		get_sidebar();
		wp_footer();
	?>
</body>
</html>