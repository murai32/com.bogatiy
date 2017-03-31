<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bogatiy_Pavel_portfolio
 */


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
	// расставляем галочки в чекбоксах, там где необходимо
	if (!empty($selected_cats)){				
		foreach ($selected_cats as $key => $queried_cat_slug) {
			if($cat -> slug == $queried_cat_slug){
				echo 'checked="checked"';
			}
		}
	}
}

function get_portfolio_filter($cats, $selected_cats){
	// выводим фильтр портфолийных работ по категориям
	?>
	<section class="page-portfolio__filter portfolio-filter">
		<div class="portfolio-filter__heading">
			Works
		</div>

		<div class="portfolio-filter__controls">

			<span class='portfolio-filter__label'>Filter by categories:</span>
			<!-- ВЫВОДИМ СПИСОК КАТЕГОРИЙ -->
			<form class="portfolio-filter__categories"  method="get" action="<?php the_permalink(); ?>">
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
				<button style="display: none" type="submit" >Filter</button>
			</form>
			<!-- КНОПКА ВЫВОДА ВСЕХ РАБОТ -->
			<form class="portfolio-filter__categories" method="get" action="<?php the_permalink(); ?>">
				<input type="hidden" name="show-all-works" value="true">
				<button class='portfolio-filter__show-all' type='submit'>Show all works</button>
			</form>
		</div>
	</section>
	<?php
}

function get_portfolio_works($taxonomy = 'portfolio_tag', $cats = 'main_works'){
	// функция выводит запрошенные работы
	$query = new WP_Query(  array(
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'slug',
				'terms'    => $cats,
				)
			)
		) 
	);

	echo '<section class="page-portfolio__works portfolio-works">';
	foreach ($query -> posts as $key => $post) {?>
		<div class='portfolio-works__item portfolio-works__item_hide portfolio-item'>
			<div class="portfolio-item__bg-img" style='background-image:url(
				<?php echo get_the_post_thumbnail_url( $post -> ID , 'large' )?>)'></div>
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

function portfolio_page_init($cats){
	echo "<section class='page-portfolio'>";
	// Вилка: какие работы выводить на странице 
	if (!empty($_GET["work-type"])){
		// Вывод работ по запросу из формы категорий 
		$cats_post = $_GET['work-type']; // получаем перечень запрошенных категорий

		get_portfolio_filter($cats, $cats_post); // выводим фоорму категорий с расстоновкой нужных галочек
		get_portfolio_works('portfolio_tag', $cats_post); // вывод запрошенных работ
	} 
	else if (empty($_GET["show-all-works"])){
		// Вывод работ по дефолту
		// Вывод из категории по умолчанию!!!
		$default_cat = array("recent-works");

		get_portfolio_filter($cats, $default_cat);
		get_portfolio_works('portfolio_tag', $default_cat);
	} 	
	else if (!empty($_GET["show-all-works"])){
		// Обработка кнопки показать все работы
		//формируем список всех категорий		
		$all_cats = array();
		foreach ($cats as $key => $cat) {
			$all_cats[] = $cat -> slug;
		}
		get_portfolio_filter($cats, $all_cats);
		get_portfolio_works('portfolio_tag', $all_cats);
	}
	echo "</section>";
}

// инициализация


portfolio_page_init($categories);

?>