const fs = require('fs')
const path = require('path')

module.exports = class Post {
  constructor(t) {
    this.title = t
  }

  save() {
    getMovies((movies) => {})
  }

  static fetchAll(cb) {
    // getMovies(cb)
  }
}
