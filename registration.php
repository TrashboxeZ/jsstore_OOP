<?php
 session_start();
if (!empty($_SESSION['auth'])) {
    header('Location: index.php');
    }
?>
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>JS STORE</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/main.css">
    </head>

    <body>
        <?php 
        var_dump($_SESSION);
        if (empty($_SESSION['auth'])) {

        var_dump($_SESSION);
        }
    ?>
        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="auth-div navbar-right">
                        <?php
                    if(empty($_SESSION['auth'])){ ?>
                            <form class="navbar-form navbar-right">
                                <div class="form-group">
                                    <input type="text" placeholder="Email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" class="form-control password" id="pswd">
                                </div>
                                <button type="button" class="btn btn-success signIn">Sign In</button>
                                <span>or</span>
                                <a class="btn btn-md btn-success" href="registration.php" role="button">Sign Up</a>
                            </form>
                            <?php } else{ ?>
                            <img src="<?php echo $_SESSION['img']; ?>" class='img-square' alt='your photo' width='60' height='60'>
                            <div class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $_SESSION['name']; ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="./caret.php">Корзина<span class="box-label notif"> <?php echo $_SESSION['notif']; ?></span></a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" class="signOut">SignOut</a></li>
                                </ul>
                            </div>

                            <?php } ?>
                    </div>
                    <!--/.nav-collapse -->
                </div>
        </nav>
        <div class="container">
            <div class="jumbotron">
                <h1>Join us!</h1>
                <p class="lead">Complete registration, it will take a few minutes</p>
            </div>

            <div class="row">
                <div class=" col-md-3 col-xl-5 "></div>
                <!--     Registration FORM       -->
                <div class=" col-md-6 col-xl-2 col-sm-12 registration">
                    <form class="">

                        <div class="form-group">
                            <label for="name">Firstname</label>
                            <input type="text" class="form-control" id="name" placeholder="John" required>
                            <span id="passwordHelpInline" class="text-muted">
      This will be your username.
    </span>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" required class="form-control" id="lastname" placeholder="Constantine" required>
                            <span id="passwordHelpInline" class="text-muted"></span>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" placeholder="25" required>
                            <span id="passwordHelpInline" class="text-muted"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="userEmail" placeholder="something@like.this" >
                            <span id="passwordHelpInline" class="text-muted">
     You will occasionally receive account related emails. We promise not to share your email with anyone.
    </span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm password">Confirm Password</label>
                            <input type="password" class="form-control" id="confpswd" placeholder="Repeat password" required>
                        </div>
                        <button type="button" class="btn btn-success regUser">REGISTER</button>  
                        <span id="passwordHelpInline" class="text-muted errorText" hidden>Заполните все поля</span>
                    </form>
                </div>
                <div class=" col-md-6 col-xl-5"></div>
                <!--FORM ENDS-->
            </div>

            <footer class="footer">
                <p>&copy; Company 2017</p>
            </footer>
        </div>
        <!-- /container -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>
