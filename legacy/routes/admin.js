var express = require('express');
var router = express.Router();

//Displays the admin "dashboard"
router.get('/', ensureAuthenticated, function(req, res){
	//res.render('index');
});

//Shows information about each location for admins
router.get('/locations', ensureAuthenticated, function(req, res){
	res.render('about');
});

//Displays detailed information about a location for admin, and allows
// admin to edit
router.post('/locations', ensureAuthenticated, function(req, res){
	res.render('about');
});

//Shows the page for creating a location
router.get('/create-location', ensureAuthenticated, function(req, res){
	res.render('about');
});

//Creates a location using admin submitted data
router.post('/create-location', ensureAuthenticated, function(req, res){
	res.render('about');
});

//Shows the page for deleteing locations
router.get('/delete-location', ensureAuthenticated, function(req, res){
	res.render('about');
});

//Deletes a location admin specified
router.post('/delete-location', ensureAuthenticated, function(req, res){
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
