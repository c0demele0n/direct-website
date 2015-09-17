module.exports = {

	options: {
    curly: true,
    eqeqeq: true,
    eqnull: true,
    browser: true,
    globals: {
      jQuery: true
    },
  },
  custom: ['<%= config.filepaths.local.src %>/js/custom/**/*.js']

}