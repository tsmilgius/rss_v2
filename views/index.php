<?php
if(!isset($_SESSION)){
    session_start();
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="static/img/rss_favicon.ico">
    <title>RSS reader</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
     integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="static/css/style.css" rel="stylesheet">
    <script src="static/js/jquery-3.1.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>

</head>

    <body >
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">RSS reader</a>
                </div>
                <div class="navbar-collapse collapse">
                    <?php if(!isset($_SESSION['user_session'])): ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a data-toggle="modal" href="index.php#login-modal">
                            <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-user" aria-hidden="true">
                            </span>Login</button></a>
                        </li>
                    </ul>
                    <div class="container" id="anonymous-visits">
                        <p>HI Incognito, your last visit was: <?= Helpers:: timeToDisplay($incognitoVisits['duration'])?> ago</p>
                        <p><?=$incognitoVisits['visits']?></p>
                    </div>

                <?php else: ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="controller/logout.php">
                            <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-off" aria-hidden="true">
                            </span>Logout</button></a>
                        </li>
                    </ul>
                    <div class="container" id="user-greeting">
                        <p>HI <?=$_SESSION['username']?> !</p>
                        <p></p>
                    </div>

                <?php endif; ?>


                </div>
            </div>
        </nav>
        <!-- not sure about this. ask.. -->
        <?php
        require_once('views/login-modal.php');
        require_once('views/register-modal.php');
        ?>

    </header>
    <?php if(!isset($_SESSION['user_session'])):
        require_once('views/empty_page.php');
    else:
        ?>



        <div class="container">
            <?php
            require_once('views/panel.php');
            ?>

            <div class="row">
                <div class="class col-lg-8" id="content">
                    <?php
                    require_once('views/rsscontent.php');
                    ?>
                </div>
                <div class="class col-lg-4">

                    <?php
                    require_once('views/stats.php');
                    ?>
                </div>
            </div>
        </div>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">&copy; 2017 Tomas Smilgius</p>
        </div>
    </footer>
    <script src="static/js/scripts.js"></script>
    </body>
</html>

<?php
endif;
 ?>
