const path = require('path')

const express = require('express')

const movie = require('./controllers/movieController')

const user = require('./controllers/userController')

const router = express.Router()

router.get('/', movie.getMovies)

router.get('/login', user.login)


module.exports = router
