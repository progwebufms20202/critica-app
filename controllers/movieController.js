exports.getMovies = (req, res, next) => {
  const movies = []

  res.render('home', {
    movies,
    path: '/',
    pageTitle: 'Home',
  })
}
