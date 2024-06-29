'use strict';

import gulp from 'gulp';
import pug from 'gulp-pug';
// import sass from 'gulp-sass';
import uglify from 'gulp-uglify';
import babel from 'gulp-babel';
import browserSync from 'browser-sync';
import concat from 'gulp-concat';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);
import autoprefixer from 'gulp-autoprefixer';
import rtlcss from 'gulp-rtlcss';
import rename from 'gulp-rename';
import webp from 'gulp-webp';
import imagemin from 'gulp-imagemin';
import imageminMozjpeg from 'imagemin-mozjpeg';
import imageminPngquant from 'imagemin-pngquant';
import imageminSvgo from 'imagemin-svgo';
import svgo from 'gulp-svgo';
import webpack from 'webpack-stream';
import webpackConfig from './webpack.config.js';
import svgmin from 'gulp-svgmin'
import filter from 'gulp-filter'
import sourcemaps from 'gulp-sourcemaps'; // добавляем sourcemaps


gulp.task('optimize-images', () => {
    return gulp.src(['src/img/**/*.{jpg,jpeg,png}', '!src/img/**/*.svg']) // Exclude SVG files
        .pipe(imagemin([
            imageminMozjpeg({ quality: 75, progressive: true }),
            imageminPngquant({ quality: [0.6, 0.8] }),
            imageminSvgo()
        ]))
        .pipe(gulp.dest('dist/i'));
});



gulp.task('convert-webp', () => {
    return gulp.src('src/img/**/*.{jpg,jpeg,png}')
        .pipe(webp())
        .pipe(gulp.dest('dist/img'));
});


gulp.task('browser-sync', function () {
	browserSync({
		server: {
			baseDir: 'dist'
		},
		notify: false,
		// online: false, // Work offline without internet connection
		// tunnel: true, tunnel: 'projectname', // Demonstration page: http://projectname.localtunnel.me
	})
});

function bsReload(done) {
	browserSync.reload();
	done();
};

gulp.task("pug", () => 
    gulp.src("src/pages/**/*.pug")
        .pipe(pug({
            pretty: '	',
            basedir: 'src'
        }))
        .pipe(gulp.dest('./dist/'))
        .pipe(browserSync.reload({
            stream: true
        }))
);




gulp.task('copy-img', function () {
	return gulp.src('src/img/**/*')
		.pipe(gulp.dest('dist/img'))
		.pipe(browserSync.reload({
			stream: true
		}));
});


gulp.task('images', () => {
	return gulp.src('src/img/**/*')
	  .pipe(filter('**/*.svg'))
	  .pipe(svgmin()) // Now svgmin should be available
	  .pipe(gulp.dest('dist/img'));
  });


gulp.task('copy-fonts', function () {
	return gulp.src('src/fonts/*')
		.pipe(gulp.dest('dist/fonts'))
		.pipe(browserSync.reload({
			stream: true
		}));
});

// gulp.task("sass", function () {
// 	return gulp.src('src/*.scss')
// 		.pipe(sass().on('error', sass.logError))
// 		.pipe(sass({
// 			outputStyle: 'compressed'
// 		}))
// 		.pipe(gulp.dest('./dist/css'))
// 		.pipe(browserSync.reload({
// 			stream: true
// 		}))
// });
gulp.task("sass", function () {
	return gulp.src('src/*.scss')
	  .pipe(sourcemaps.init()) // Initialize source maps
	  .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError)) // Compile Sass with error handling
	  .pipe(
		autoprefixer({
		  cascade: true, // Apply prefixes in cascading order
		  overrideBrowserslist: [
			'last 15 versions', // Target the last 15 versions of all browsers
			'> 1%', // Target browsers with over 1% global usage
			'ie 8', // Target Internet Explorer 8
			'ie 7', // Target Internet Explorer 7
			'iOS > 7.1', // Target specific iOS versions (e.g., iOS 8, iOS 9)
		  ],
		  // Add specific Safari browser compatibility rules
		  safari: {
			add: true, // Add necessary prefixes
			remove: false, // Don't remove existing prefixes
			browsers: ['last 2 versions'], // Target the last 2 versions of Safari
		  },
		})
	  )
	  .pipe(sourcemaps.write('./maps')) // Write source maps to a separate folder
	  .pipe(gulp.dest('./dist/css')) // Save compiled CSS to the destination folder
	  .pipe(browserSync.reload({ stream: true })); // Reload browser with changes
  });
  


gulp.task("rtl", function () {
	return gulp.src('src/*.scss')
	.pipe(sass().on('error', sass.logError))
	.pipe(rtlcss()) // Convert to RTL.
	.pipe(rename({ suffix: '-rtl' })) // Append "-rtl" to the filename.
	.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
	.pipe(gulp.dest('./dist/css'));
	
});

// function buildStyles() {
// 	return gulp.src('src/*.scss')
// 	  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
// 	  .pipe(gulp.dest('./dist/css'))
// 	  .pipe(browserSync.reload({
// 	  	stream: true
// 	  }))
// };

gulp.task("babel", function () {
	return gulp.src("src/components/**/*.js")
		.pipe(concat("main.js"))
		.pipe(babel({
			presets: ['@babel/env']
			// minified: true

		}))
		.pipe(uglify())
		.pipe(gulp.dest('./dist/js'))
		.pipe(browserSync.reload({
			stream: true
		}))
});
gulp.task("babel-vendor", function () {
	return gulp.src("src/js/**/*.js")
	 // .pipe(concat("vendors.js"))
	  .pipe(babel({
		presets: ['@babel/env'],
		sourceType: 'unambiguous', // добавьте эту опцию
	  }))
	  .pipe(uglify())
	  .pipe(gulp.dest('./dist/js'))
	  .pipe(browserSync.reload({
		stream: true
	  }));
  });
  gulp.task("webpack-bundle", function () {
	return gulp.src(['src/js/bundle.js', 'src/js/vendors.js'])
	  .pipe(webpack(webpackConfig))
	  .pipe(gulp.dest('dist/js'))
	  .pipe(browserSync.reload({
		stream: true
	  }));
  });
  
gulp.task("watch", function () {
	gulp.watch("src/**/*.pug", gulp.parallel('pug'));
	gulp.watch("src/**/*.svg", gulp.parallel('pug'));
	gulp.watch("src/**/*.scss", gulp.parallel('sass'));
	gulp.watch("src/**/*.js", gulp.parallel('babel'));
	gulp.watch("src/**/*.js", gulp.parallel('babel-vendor'));
	gulp.watch("src/reactComponents/*.jsx", gulp.parallel('webpack-bundle')); // Отслеживание изменений в файлах JSX
	gulp.watch("src/img/**/*.*", gulp.series('copy-img', 'pug'));
	gulp.watch("src/fonts/*.*", gulp.series('copy-fonts', 'pug'));
    gulp.watch("src/js/bundle.js", gulp.parallel('webpack-bundle'));
});
gulp.task("build", gulp.parallel("pug", "sass", "rtl", "babel", "babel-vendor", "webpack-bundle", "copy-fonts", "optimize-images", "convert-webp", "images"));
gulp.task("default", gulp.parallel("build", "browser-sync", "watch"));
