# Location Bucket-List!

This was a group project consisting of three members: Kevin Dennis, Chris Salgado, and Malavkumar
Patel.

Our enterprise management system will be a web application that allows users to follow,
track and/or lookup ideal bucket list places to go. The purpose of this application is to allow
users to create and find exciting things to add to their bucket list, and provide a convenient,
easy-to-use environment to track them.
The website applications database will consist of 8 schemas with multiple relations
between each table. In total, our user table will relate to 3 other tables and the location table will
relate to 5 other tables, with user and location having primary keys relatable to their respective
tables.

Our application is developed using the CodeIgniter Framework, and Bootstrap styling
template. CodeIgniter is designed and used with PHP, and works with the Apache Server, with
Mod_Rewrite enabled, to allow functionality to be separated into Controllers, Models, and
Views.




# Setting up the database

To help test the website, you can find a creation script for the database in the assets folder. Along with the creation script, there is a seeder, that will create several records in the database useful for testing the application. To run this, simply open or copy them into the mysql workbench or connection, and execute them.

Note that if you already have a Schema named locBucket, this script may not execute correctly.

# Setting up CodeIgniter

Installing CodeIgniter is designed to be easy,
and only two files need to be edited to move it's location.

After placing CodeIgniter in your webroot, simply navigate to the application/config folder and edit the config.php and database.php

Inside config.php, if mod_rewrite is NOT enabled on your server, on line 39 you should change

    $config['index_page'] = '';

to

    $config['index_page'] = 'index.php/';

You may also set the url of the site by changing the base_url on line 26. If this is blank, CodeIgniter will attempt to figure it out.

    $config['base_url'] = 'http://path/to/project';

Inside database.php, you may enter the information specific to your database. Our project is designed to work with a MySql database. Simply change the code in

    $db['default'] = array(
      'dsn'	=> '',
      'hostname' => 'localhost',
      'username' => 'bucket_user',
      'password' => 'bucket',
      'database' => 'locBucket',
      ...

Once this is done, you'll want to ensure the proper permissions are set by running

    sudo chmod -R 0755 path/to/project/folder

The permissions may be more finely tuned, but this will ensure that it works for testing purposes.
