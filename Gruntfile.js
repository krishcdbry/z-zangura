module.exports = function(grunt) {
	grunt.registerTask('watch', ['watch']);

	grunt.initConfig({
		concat: {
			js: {
				options: {
					separator: ';'
				}
				, src: [
					'static/scripts/*.js'
				]
				, dest: 'static/final/scripts/zangu.js'
			}
			, sass: {
				src: [
					'static/css/*.scss'
				]
				, dest: 'static/final/css/zangu.scss'
			}
		}
		, uglify: {
			options: {
				mangle: true
			}
			, js: {
				files: {
					'static/final/scripts/zangu.min.js': ['static/final/scripts/zangu.js']
				}
			}
		}
		, sass: {
			options: {
				style: 'compressed'
			}
			, style: {
				files: {
					'static/final/css/zangu.min.css': 'static/final/css/zangu.scss'
				}
			}
		}
		, watch: {
			js: {
				files: ['static/scripts/*.js']
				, tasks: ['concat:js', 'uglify:js']
				, options: {
					livereload: true
				}
			}
			, css: {
				files: ['static/css/*.scss']
				, tasks: ['concat:sass', 'sass:style']
				, options: {
					livereload: true
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
};
