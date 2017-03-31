document.addEventListener("DOMContentLoaded", function(){
	// Прокручиваем страницу сразу после загрузки основных скриптов
	if (Cookies.get('scrollTop')){
		$(document)[0].body.scrollTop = Cookies.get('scrollTop');
		console.log('scrolled!');
	}
});

$( document ).ready(function() {

	/*Обработчик фильтра категорий портфолийных работ*/
	if ($('.portfolio-filter__categories').length > 0 ){

		$('.portfolio-filter__categories').on('submit',  function(e){
			//Отлавливаем сабмит для полчения данных скрола по клику на "show all works"
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;			
			//Тут неплохо бы отправить данные о скроле и названии предыдущей страницы
			Cookies.set('scrollTop', scrollTop, {
				expires: 1.5/86400 // жизнь куки 1.5 секунда
			})
		})

		$('.portfolio-filter__categories').on('change',  function(e){
			// отлавливаем измерения состояния формы
			$(this).submit();
		})
	}

	/*Filler wipe effect*/
// полное ощущение что это какой-то дурацкий костыль.
// Эффект необходимо передалть с упором на больший смысл 

	if ($('.page-heading').length > 0){
		$('.page-heading__filler').toggleClass('page-heading__filler_disabled');
		$('.page-heading__heading').toggleClass('page-heading__heading_visible');	
	}

	if ($('.portfolio-works').length > 0){
		setTimeout(function() { 
			$('.portfolio-works__item').toggleClass('portfolio-works__item_hide');
			$('.portfolio-works').toggleClass('portfolio-works_filler_on');
		}, 450); 
	}
});