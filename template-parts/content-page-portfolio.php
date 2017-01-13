<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bogatiy_Pavel_portfolio
 */

?>

<?php 

function get_portfolio_works($cats){
	// функция выводит запрошенные работы

	// vardump($cat);
	$query = new WP_Query(  array(
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'portfolio_tag',
				'field'    => 'slug',
				'terms'    => $cats,
				)
			)
		) 
	);
	echo "<p><strong>Найдено постов по запросу: </strong>" . $query -> post_count . "</p>";
	// echo "<p><strong>Найдено постов по запросу: </strong>" . $query -> post_count . "</p>";	
	foreach ($query -> posts as $key => $post) {
		echo get_the_post_thumbnail( $post -> ID , 'thumbnail' );
		?>
		<a href=" <?php echo get_post_permalink($post->ID) ?>">View
			<span><?php echo $post -> post_title ?></span>
			<span>
				<?php 
				$work_cats = get_the_terms($post , 'portfolio_tag');
				foreach ( $work_cats as $key => $category) {
					echo $category -> name;
					if (next($work_cats)==true) echo ", ";
				}
				?>
			</span>
		</a>
		
		

		<?php
	}

	wp_reset_postdata();
}




	<?php
// Вилка: какие работы выводить на странице 
	if (!empty($_POST["work-type"])){
		// Обработка запроса полученного из формы
		echo "<div class='portfolio-content' style='margin: 5rem 0 5rem 0; float: right; width: 80%'><h3>Отфильтрованая информация</h3>";
		$cats = $_POST['work-type']; // отправляю перечень запрошенных категорий
		get_portfolio_works($cats);
		echo "</strong></p></div>";
	} 
	else if (empty($_POST["show-all-works"])){
		// тут может понадобиться дополнительная таксономия, если я захочу выводить какие-то особые работы из категорий!!!
		echo "выводим стандартный контент (все категории или те категории которые я захочу вывести";
	} 	
	else if (!empty($_POST["show-all-works"])){
		// Обработка кнопки показать все работы
		echo "<div class='portfolio-content' style='margin: 5rem 0 5rem 0; float: right; width: 80%'><h4>Обработка кнопки 'Показать все работы'</h4>";
		// $cats = $_POST['work-type']; // запрашиваю все работы
		// get_portfolio_works($cats);
		//формируем список всех категорий			 	
		$all_cats = array();
		foreach ($categories as $key => $cats) {
			$all_cats[] = $cats -> slug;
		}	
		get_portfolio_works($all_cats);
		echo "</strong></p></div>";
	}

	?>