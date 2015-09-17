module.exports = {

  js: {
    src: ['<%= config.filepaths.local.src %>/js/lib/*.js', '<%= config.filepaths.local.src %>/js/custom/**/*.js'],
    dest: '<%= config.filepaths.local.src %>/js/script.js'
  },

  css: {
    src: ['<%= config.filepaths.local.build %>/css/theme.css', '<%= config.filepaths.local.build %>/css/style.css'],
    dest: '<%= config.filepaths.local.build %>/style.css'
  }

}