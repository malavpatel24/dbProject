var express = require('express');
var router = express.Router();

// Get Homepage
router.get('/', function(req, res){
	res.render('index', {layout: false});
});

// Get About Page
router.get('/about', function(req, res){
	res.render('about');
});

//If user is logged in, continues request. Else, redirects to login.
function ensureAuthenticated(req, res, next){
	if(req.isAuthenticated()){
		return next();
	} else {
		//req.flash('error_msg','You are not logged in');
		res.redirect('/users/login');
	}
}

module.exports = router;
