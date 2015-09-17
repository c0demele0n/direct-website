module.exports = function(grunt) {

  grunt.registerTask('preview', [
  	
  	// compile scripts and styles
    'compass',
    'jshint',
    'concat:js',

    // trigger rebuild
    'shell:patternlab'
    
  ]);

};