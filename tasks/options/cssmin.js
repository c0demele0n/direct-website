module.exports = {
  
  target: {
    files: [{
      expand: true,
      cwd: '<%= config.filepaths.local.preview %>/css',
      src: ['*.css'],
      dest: '<%= config.filepaths.local.build %>/css'
    }]
  }
  
}