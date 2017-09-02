
var gulp = require('gulp'), //本地安装gulp所用到的地方
    less = require('gulp-less');
var minify = require('gulp-minify-css');
var htmlmini = require('gulp-minify-html');
var uglify = require('gulp-uglify');  //加载js压缩
var livereload = require('gulp-livereload');
 
//定义一个less任务（自定义任务名称）
gulp.task('less', function () {
    gulp.src('src/css/index.less') //该任务针对的文件
        .pipe(less()) //该任务调用的模块
        .pipe(minify())
        .pipe(gulp.dest('dist/css')); //将会在src/css下生成index.css
});

 gulp.task('htmlmini', function () {
    gulp.src('src/html/*.html')
        .pipe(htmlmini())
        .pipe(gulp.dest('dist/html'));
});
gulp.task('compass', function () {
    gulp.src(['src/js/*.js','!js/*.min.js'])  //获取文件，同时过滤掉.min.js文件
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'));  //输出文件
});
gulp.task('watch', function() {
  livereload.listen(); //要在这里调用listen()方法
  gulp.watch('src/css/*.less', ['less']);  //监听目录下的文件，若文件发生变化，则调用less任务。
  gulp.watch('src/html/*.html', ['htmlmini']);
  gulp.watch('src/js/*.js', ['compass']);
});
gulp.task('default',['less', 'htmlmini','compass','watch']); //定义默认任务 elseTask为其他任务，该示例没有定义elseTask任务