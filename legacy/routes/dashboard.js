var express = require('express');
var router = express.Router();

// Get user dashboard
router.get('/', ensureAuthenticated, function(req, res){
	//Need to get current userid from req

	//Load user

	//Render view
	//res.render('dashboard');
});

// Displays information about all of the users
router.get('/users', ensureAuthenticated, function(req, res){
	//res.render('about');
});

// Displays information about a user
router.post('/users', ensureAuthenticated, function(req, res){
	//res.render('about');
});

// Displays information about all of the users locations they want to visit
router.get('/my-locations', ensureAuthenticated, function(req, res){
	//res.render('about');
});

// Displays information about a location
router.get('/locations', ensureAuthenticated, function(req, res){
	//res.render('about');
});

//Displays more detailed info about a particular location
router.post('/locations', ensureAuthenticated, function(req, res){
	//res.render('about');
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
