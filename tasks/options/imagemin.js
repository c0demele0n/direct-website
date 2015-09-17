module.exports = {
  
  dynamic: {
    files: [{
    	expand: true,
    	cwd: '<%= config.filepaths.local.preview %>/images',
      src: ['**/*.<%= config.filetypes.images %>'],
      dest: '<%= config.filepaths.local.preview %>/images'
    }]
  }

}