var webpack = require('webpack')

module.exports = function(env) {
  return {
    entry: "./js/tax-credit.js",
    output: {
      path: __dirname + "/js",
      filename: "tax-credit.min.js"
    },
  }
}