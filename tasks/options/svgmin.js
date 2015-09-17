module.exports = {
  
	dist: {
		files: [{
    	expand: true,
    	cwd: '<%= config.filepaths.local.preview %>/images',
      src: ['**/*.svg'],
      dest: '<%= config.filepaths.local.preview %>/images'
    }]
	}
  
}