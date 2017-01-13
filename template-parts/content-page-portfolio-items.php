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



	// Запрашиваем категории таксономии "теги" типа поста "портфолио"
$categories = get_categories( array(
	'type'         => 'portfolio',
	'child_of'     => 0,
	'parent'       => '',
	'orderby'      => 'name',
	'order'        => 'ASC',
	'hide_empty'   => 1,
	'hierarchical' => 1,
	'exclude'      => '',
	'include'      => '',
	'number'       => 0,
	'taxonomy'     => 'portfolio_tag',
	'pad_counts'   => false,
		// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
	));



function get_cats_checked_status($cat, $selected_cats){
	// $selected_cats — содержимое переменной пост 

	if (!empty($selected_cats)){				
		foreach ($selected_cats as $key => $queried_cat_slug) {
			if($cat -> slug == $queried_cat_slug){
				echo 'checked="checked"';
			}
		}
	}
}

function get_portfolio_filter($cats, $selected_cats){
	?>
	<section class="page-portfolio__filter portfolio-filter">
		<section class="portfolio-filter__heading">
			Categories
		</section>

		<section class="portfolio-filter__controls">

			<span class='portfolio-filter__label'>Filter by:</span>
			<!-- ВЫВОДИМ СПИСОК КАТЕГОРИЙ -->
			<form  class="portfolio-filter__categories"  method="get" action="<?php the_permalink(); ?>">
				<?php
				foreach( $cats as $cat ){
					?>

					<input id="<?php echo $cat -> name ?>" type="checkbox" name="work-type[]" <?php get_cats_checked_status($cat, $selected_cats) ?> value="<?php echo $cat -> slug ?>" />
					<label class="portfolio-filter__checkbox" for="<?php 			
					echo $cat -> name ?>"><?php 
					if(!next($cats)) {
						echo "<span class='portfolio-filter__mark'></span>";
					}
					echo $cat -> name ?>:</label> 
					<br>
					<?php 
				}
				?>
				<button style="display: none" type="submit" >Фильтруй</button>
			</form>
			<!-- КНОПКА ВЫВОДА ВСЕХ РАБОТ -->
			<form method="post">
				<input type="hidden" name="show-all-works" value="true">
				<button class='portfolio-filter__show-all' type='submit'>Show all works</button>
			</form>
		</section>
	</section>
	<?php
}

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
	// echo "<p><strong>Найдено постов по запросу: </strong>" . $query -> post_count . "</p>";
	// echo "<p><strong>Найдено постов по запросу: </strong>" . $query -> post_count . "</p>";	
	echo '<section class="page-portfolio__works portfolio-works">';
	foreach ($query -> posts as $key => $post) {?>
		<div class='portfolio-works__item portfolio-item'>
			<div class="portfolio-item__bg-img" style='background-image:url(
				<?php echo get_the_post_thumbnail_url( $post -> ID , 'large' )?>)'>
		</div>
		<a class="portfolio-item__link" href=" <?php echo get_post_permalink($post->ID) ?>">

			<span class="portfolio-item__btn">View</span>
			<ul class="portfolio-item__desc">	
				<li class="portfolio-item__name"><?php echo $post -> post_title ?></li>	
				<li class="portfolio-item__tags">
					<?php 
					$work_cats = get_the_terms($post , 'portfolio_tag');
					foreach ( $work_cats as $key => $category) {
						echo "" . $category -> name;
						if (next($work_cats)==true){echo ", ";} 				
					}
					?>
				</li>
			</ul>
		</a>
	</div>


	<?php
}
echo '</section>';
wp_reset_postdata();
}

function select_portfolio_works_list($cats){
	// Вилка: какие работы выводить на странице 
	if (!empty($_GET["work-type"])){
		// Обработка запроса полученного из формы
		// echo "<h3>Отфильтрованая информация</h3>";
		$cats_post = $_GET['work-type']; // отправляю перечень запрошенных категориф

		get_portfolio_filter($cats, $cats_post);
		get_portfolio_works($cats_post);
	} 
	else if (empty($_GET["show-all-works"])){
		// тут может понадобиться дополнительная таксономия, если я захочу выводить какие-то особые работы из категорий!!!
		echo "выводим стандартный контент (все категории или те категории которые я захочу вывести";
		get_portfolio_filter($cats, $all_cats);
	} 	
	else if (!empty($_GET["show-all-works"])){
		// Обработка кнопки показать все работы
		// echo "<h4>Обработка кнопки 'Показать все работы'</h4>";

		// $cats_post = $_POST['work-type']; // запрашиваю все работы
		// get_portfolio_works($cats_post);
		//формируем список всех категорий			 	
		$all_cats = array();
		foreach ($cats as $key => $cat) {
			$all_cats[] = $cat -> slug;
		}
		get_portfolio_filter($cats, $all_cats);
		get_portfolio_works($all_cats);
	}
}






/*Раздел  вью*/

// var_dump($categories);
// get_portfolio_filter($categories);



select_portfolio_works_list($categories);




?>