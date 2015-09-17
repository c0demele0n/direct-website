module.exports = {
  
  build: {
    files: [{
	    expand: true,
	    cwd: '<%= config.filepaths.local.preview %>',
    	src: ['images/**', 'fonts/**', 'favicon.ico'],
    	dest: '<%= config.filepaths.local.build %>'
    }],
  },

  styleguide: {
    files: [{
      expand: true,
      cwd: '<%= config.filepaths.local.preview %>',
      src: ['**'],
      dest: '<%= config.filepaths.local.styleguide %>'
    }],
  },

}