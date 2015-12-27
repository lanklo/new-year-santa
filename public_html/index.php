<?php
require_once("../classes/code.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>С наступающим Новым годом!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <script type="text/javascript">
        var members = [];
    <?php foreach ($members as $key => $member) { ?>
        members[<?= $member[id] ?>] = {
            name: "<?= $member['name'] ?>",
            last_name: "<?= $member['last_name'] ?>",
            photo: "<?= $member['photo'] ?>"
        };
    <? } ?>
    </script>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Happy New Year!</h1>
            <!-- <h3>Free Bootstrap Themes &amp; Templates</h3> -->
            <br>
            <a href="#about" class="btn btn-dark btn-lg">Выбрать Санту</a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Выбери себя из списка</h2>
                    <p class="lead">Выбирай свое имя</p>

                    <div class="col-md-12">
                        <form method="post  " name="choose_yourself">
                            <div class="form-group">
                                <select name="members" class="form-control">
                                    <option value="0">..</option>
                                    <?php foreach ($members as $key => $member) { ?>
                                        <option value="<?= $member['id'] ?>" <? if (isset($_COOKIE['member_id']) && $_COOKIE['member_id'] == $member['is']) { ?>selected="selected"<? } ?>>
                                            <?= $member['name'] ?> <?= $member['last_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input name="choose-me" type="submit" value="Это Я!" class="btn btn-lg btn-dark">
                            </div>
                        </form>
                        
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Нажми на кнопку</h2>
                    <hr class="small">
                    <div class="row">
                        <input class="btn btn-lg btn-light" type="submit" name="get-santa" value="Выбрать Санту">
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <!-- Callout -->
        <aside class="callout" style="margin-top:20px">
            <div class="text-vertical-center">
            </div>
        </aside>
    </section>

    

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h1>Ваш выбор</h1>
                    <h2 class="santa-name"></h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img style="max-height:300px" class="santa-photo img-portfolio img-responsive" src="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
               
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.cookie.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
