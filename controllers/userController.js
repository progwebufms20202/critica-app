exports.login = (req, res, next) => {
  
    res.render('login', {      
      path: '/',
      pageTitle: 'Login',
    })
}

