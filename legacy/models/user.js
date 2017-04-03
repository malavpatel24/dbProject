var bcrypt = require('bcryptjs');
var mysql = require("mysql");

var connection = mysql.createConnection({
   host: process.env.DB_HOST ,
   user: process.env.DB_USER,
   password: process.env.DB_PASS,
   database: process.env.DB_SCHEMA
});

/*
connection.connect();
var query = connection.query("SELECT pname FROM parts", function(err, result) {
   if (err){
      console.error(err);
      return;
   }
   console.log(result);
});*/

//User class
var User = module.exports = function(values) {
	this.name = values['name'];
  this.email = values['email'];
  this.username = values['username'];
  this.password = values['password'];
  if(typeof values['role_id'] !== 'undefined')
    this.role_id = values['role_id'];
  else
    this.role_id = 1;
}

module.exports.createUser = function(newUser, callback){
	bcrypt.genSalt(10, function(err, salt) {
	    bcrypt.hash(newUser.password, salt, function(err, hash) {
	        newUser.password = hash;
	    });
	});

	//Query to insert user
	var queryString = "INSERT INTO `locBucket`.`users` " +
	"(`name`, `email`, `password` , `role_id`) " +
	"VALUES (?, ?, ?, ?);";

	//Set up values
	var values = [newUser.name, newUser.email, newUser.password, newUser.role_id];

	//Run query
	connection.connect();
	connection.query(queryString, values, function(err, rows, fields) {
	    if (err) throw err;
	});
	connection.end();

	callback();
}

module.exports.getUserByEmail = function(email, callback){
  //Query to find a user
	var queryString = "SELECT * FROM users WHERE email=?";

	//Run query
	connection.connect();
  var result;
	rows = connection.query(queryString, [email], function(err, rows, fields) {
	    if (err) throw err;

      result = rows;
	});

  console.log(result)
	connection.end();
}

module.exports.getUserById = function(id, callback){
	User.findById(id, callback);
}

module.exports.comparePassword = function(candidatePassword, hash, callback){
	bcrypt.compare(candidatePassword, hash, function(err, isMatch) {
    	if(err) throw err;
    	callback(null, isMatch);
	});
}
