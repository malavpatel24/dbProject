# Location Bucket-List!

Woo!

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
