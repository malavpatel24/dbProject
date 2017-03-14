

var mysql = require("mysql");

var connection = mysql.createConnection({
   host: 'localhost',
   user: 'root',
   password: 'dreameater',
   database: 'hw2_check'
});
connection.connect();

var query = connection.query("SELECT pname FROM parts", function(err, result) {
   if (err){
      console.error(err);
      return;
   }
   console.log(result);
});
