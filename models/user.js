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
  this.role_id = 1;
}

module.exports.createUser = function(newUser, callback){
	bcrypt.genSalt(10, function(err, salt) {
	    bcrypt.hash(newUser.password, salt, function(err, hash) {
	        newUser.password = hash;
	    });
	});

	//Query to inser user
	var queryString = "INSERT INTO `locBucket`.`User` " +
	"(`id`, `name`, `email`, `password` , `role_id`) " +
	"VALUES (?, ?, ?, ?, ?);";

	//Set up values
	var values = [5, newUser.name, newUser.email, newUser.password, newUser.role_id];

	//Run query
	connection.connect();
	connection.query(queryString, values, function(err, rows, fields) {
	    if (err) throw err;

	    for (var i in rows) {
	        console.log(rows[i]);
	    }
	});
	connection.end();

	callback();
}

module.exports.getUserByUsername = function(username, callback){
	var query = {username: username};
	User.findOne(query, callback);
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
