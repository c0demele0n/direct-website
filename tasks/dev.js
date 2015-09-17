module.exports = function(grunt) {

  grunt.registerTask('dev', [
  	
  	// prepare preview
  	'preview',

  	// development setup
  	'connect',
  	'watch'

  ]);

};