<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Location Bucket-List</title>

        <!-- Latest compiled and minified CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <style>
            .carousel-inner > .item > img,
            .carousel-inner > .item > a > img {
                width: 70%;
                margin: auto;
            }

            address {
                display: block;
                font-style: italic;
                text-align: center;
            }

            img {
                width:100%;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo site_url()?>">Location Bucket-List</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo site_url();?>welcome/about")>About</a></li>
                    <li><a href="<?php echo site_url();?>welcome/contact">Contact</a></li>
                </ul>
                <?php if (!$this->session->userdata('USER_NAME')): ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo site_url();?>users/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="<?php echo site_url();?>users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo site_url();?>dashboard"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('USER_NAME') ?></a></li>
                        <li><a href="<?php echo site_url();?>users/logout"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
        <div class="container">
