module.exports = {
  
  patternlab: {
		command: "touch <%= config.filepaths.local.preview %>/styleguide/html/styleguide.html && php <%= config.filepaths.libs.patternlab %>/builder.php -g"
	},

	patternonly: {
		command: "php <%= config.filepaths.libs.patternlab %>/builder.php -gp"
	}

}