module.exports = {
  
  options: {
    cwd: '<%= config.filepaths.local.src %>',
    spawn: false,
    livereload: true
  },
  
  css: {
    files: ['scss/**/*.scss'],
    tasks: ['compass', 'shell:patternlab']
  },
  
  scripts: {
    files: ['js/**/*.js'],
    tasks: ['jshint', 'concat:js', 'shell:patternlab']
  },
  
  images: {
    files: ['images/**/*.<%= config.filetypes.images %>'],
    tasks: ['shell:patternlab']
  },

  fonts: {
    files: ['fonts/**/*.<%= config.filetypes.fonts %>'],
    tasks: ['shell:patternlab']
  },
  
  favicon: {
    files: ['*.ico'],
    tasks: ['shell:patternlab']
  },
  
  patternlab: {
    files: ["_patterns/**/*.json", "_data/*.json"],
    tasks: ["shell:patternlab"]
  },
  
  mustache: {
    files: ["_patterns/**/*.mustache"],
    tasks: ["shell:patternonly"]
  },

}