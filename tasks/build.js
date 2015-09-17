module.exports = function(grunt) {

  grunt.registerTask('build', [

  	// compile sources
  	'preview',

    // optimize images
    'svgmin',
  	'imagemin',

    // optimize styles and scripts
    'cssmin',
    'uglify',

    // optimize and publish assets
    'copy:build',
  	'concat:css',

    // create styleguide
    'clean:styleguide',
    'copy:styleguide'

  ]);

};