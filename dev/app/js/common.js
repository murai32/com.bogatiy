$( document ).ready(function() {

	/*Обработчик фильтра категорий портфолийных работ*/

	if (Cookies.get('scrollTop')){
		$(document)[0].body.scrollTop = Cookies.get('scrollTop');
	}

	if ($('.portfolio-filter__categories').length == 1 ){
		$('.portfolio-filter__categories').on('change',  function(e){

			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			
			//Тут неплохо бы отправить данные о скроле и названии предыдущей страницы

			Cookies.set('scrollTop', scrollTop, {
				expires: 10/86400 // жизнь куки 10 секунд
			})
			$(this).submit();
		})
	}



});