module.exports = {
  
  options: {
    basePath: '<%= config.filepaths.local.src %>',
    importPath: [
      '<%= config.filepaths.libs.bower %>/foundation/scss/',
      '<%= config.filepaths.libs.bower %>/components-font-awesome/scss/',
      '<%= config.filepaths.libs.bower %>/owl.carousel/src/scss/'
    ]
  },

  dist: {
    options: {
      sassDir: 'scss',
      cssDir: 'css'
    }
  }

}