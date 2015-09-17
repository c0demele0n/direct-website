module.exports = {
  
  target: {
    files: [{
      expand: true,
      cwd: '<%= config.filepaths.local.preview %>/js',
      src: ['*.js'],
      dest: '<%= config.filepaths.local.build %>/js'
    }]
  }

}