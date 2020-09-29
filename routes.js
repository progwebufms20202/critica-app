const path = require('path')

const express = require('express')

const movie = require('./controllers/movieController')

const router = express.Router()

router.get('/', movie.getMovies)

module.exports = router
