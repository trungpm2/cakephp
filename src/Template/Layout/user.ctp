<!DOCTYPE html>
<html lang="">
<?php echo $this->Html->css('style'); echo $this->Html->css('jquery.dataTables.min'); echo $this->Html->script('bootstrap-datetimepicker'); ?>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <title>
                        <?= $this->fetch('title') ?>
                    </title>
                    <link rel="stylesheet" type="   " href="">
                    <!-- Bootstrap CSS -->
                    <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet">
                        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                        <!--[if lt IE 9]>
                          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
                          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                        <![endif]-->
                    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
                    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
                    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
                    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    
                    </link>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="<?= $this->Url->build('/user') ?>">
                Home
              </a>
              <a class="navbar-brand" href="<?= $this->Url->build('/admin') ?>">Admin</a>
              <a class="navbar-brand" href="<?= $this->Url->build('/about') ?>">About</a>
              <a class="navbar-brand" href="#">Help</a>
              <p class="navbar-text">Well come to CakePHP demo</p>
              <form class="navbar-form navbar-left">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </form>
            </div>
            <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">TrungND !</a></p>
          </div>
        </nav>
        <div class="container" style="margin-top: 50px">
          <?= $this->fetch('content') ?>
        </div>
        <!-- jQuery -->
        <!-- <script src="//code.jquery.com/jquery.js"> -->
        </script>
        <!-- Bootstrap JavaScript -->
       <!--  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
        </script> -->
    </body>
</html>