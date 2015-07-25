module.exports = function(grunt) {
	grunt.registerTask('watch', ['watch']);

	grunt.initConfig({
		concat: {
			js: {
				options: {
					separator: ';'
				}
				, src: [
					'assets/scripts/*.js'
				]
				, dest: 'assets/final/scripts/zangu.js'
			}
			, sass: {
				src: [
					'assets/css/*.scss'
				]
				, dest: 'assets/final/css/zangu.scss'
			}
		}
		, uglify: {
			options: {
				mangle: true
			}
			, js: {
				files: {
					'assets/final/scripts/zangu.min.js': ['assets/final/scripts/zangu.js']
				}
			}
		}
		, sass: {
			options: {
				style: 'expanded'
			}
			, style: {
				files: {
					'assets/final/css/zangu.css': 'assets/final/css/zangu.scss'
				}
			}
		}
		, sass: {
			options: {
				style: 'compressed'
			}
			, style: {
				files: {
					'assets/final/css/zangu.min.css': 'assets/final/css/zangu.scss'
				}
			}
		}
		, watch: {
			js: {
				files: ['assets/scripts/*.js']
				, tasks: ['concat:js', 'uglify:js']
			}
			, css: {
				files: ['assets/css/*.scss']
				, tasks: ['concat:sass', 'sass:style']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
};
