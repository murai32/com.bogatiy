var gulp = require('gulp'),
sass = require('gulp-sass'),
minifyCss = require('gulp-minify-css'),
browserSync = require('browser-sync'),
concat = require('gulp-concat'),
uglify = require('gulp-uglifyjs'),
autoprefixer = require('gulp-autoprefixer'),
del =  require('del'),
notify = require('gulp-notify'),
svgmin = require('gulp-svgmin'),
replace = require('gulp-replace');


gulp.task('fonts', function(){
	del.sync(['../fonts/**'], {force: true});
	gulp.src('app/fonts/*.otf')
	.pipe(gulp.dest('../fonts/'))
})

gulp.task('svg', function(){
	gulp.src('app/images/svg/*.svg')
	// .pipe(svgmin())
	//.pipe(replace('id', 'class'))	
	.pipe(gulp.dest('../images/svg/'));
})

gulp.task('images', ['svg'], function(){
	//
	//	!!!! подключить оптимизацаю SVG и ужимку картинок!!
	//
	//del.sync(['../images/**/*', , '!../images'], {force: true});
	gulp.src('app/images/*')
	.pipe(gulp.dest('../images/'))
})


gulp.task('sass', ['fonts', 'images'], function(){

	return gulp.src('app/sass/style.scss')
	.pipe(sass({ 
						includePaths : ['app/sass/'] // доп. костыль что бы работал sass, не уверен что он по прежнему необходим!
					}))
	.on("error", notify.onError({ // отлавливаем ошибку и выводим сообщение о ней в toaster винды
		message: "Error: <%= error.message %>",
		title: "Style",
		sound: true,
		wait: true
	})
	)
	.pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
	// .pipe(minifyCss({
	// 					keepSpecialComments: 1 // минифицирукм CSS с сохранение важных комментов
	// 				}))					
					.pipe(gulp.dest('../')) // сохраняем CSS  в конечный каталог 
					.pipe(browserSync.reload({stream: true}))

})


gulp.task('scripts', function(){

	//собираем библиотеки, ужимаем и инсталируем в тему
	gulp.src([
		'app/libs/jquery/dist/jquery.js',
		'app/libs/js-cookie/src/js.cookie.js',
		])
	.pipe(concat('libs.min.js'))
	.pipe(uglify())
	.on("error", notify.onError({ // отлавливаем ошибку и выводим сообщение о ней в toaster винды
		message: "Error: <%= error.message %>",
		title: "Style",
		sound: true,
		wait: true
	})
	)
	.pipe(gulp.dest('../js/'));

	//ужимаем commonjs и инсталируем в тему
	gulp.src(['app/js/common.js',
		// 'app/libs/js-helpers/fw-form-helpers.js'
		])
	// .pipe(uglify('common.min.js'))
	.pipe(gulp.dest('../js/'))
	.pipe(browserSync.reload({stream: true}));
})


gulp.task('browser-sync', function(){

	browserSync.init({
    //browsersync with a php server
    proxy: "http://bogatiy.dev/",
    notify: false
  });

})

gulp.task('watch', ['browser-sync', 'sass', 'scripts'], function(){
	gulp.watch('app/sass/**/*.scss', ['sass']); // подклюсаем наблюдение за изменениями в SASS файлах и вызываем таск sass в случае необходимости
	gulp.watch('../*.php', browserSync.reload);// наблюдение за PHP файлами темы и перезагрузка
	gulp.watch('app/js/**/*.js', ['scripts']); // подклюсаем наблюдение за изменениями в js файлах и вызываем таск scripts в случае необходимости
	gulp.watch('app/images/**/*', ['images']); // подклюсаем наблюдение за изменениями в папке с картинками 
})

gulp.task('default', ['watch']);// замыкаем выполнение всех заданий на вызов "gulp" 