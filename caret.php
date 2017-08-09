<?php
session_start();
require './db.php';
if ($_SESSION['auth']<>1) {
    header('Location: index.php');
    }
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
                                <li><a href="db_proc/test.php">TEST</a></li>
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
                    if($_SESSION['auth']<>1){ ?>
                            <form class="navbar-form navbar-right">
                                <div class="form-group">
                                    <input type="text" placeholder="Email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" class="form-control password" id="pswd">
                                </div>
                                <button type="button" class="btn btn-success signIn">Sign in</button>

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

            <?php
                if($query = $db->query("SELECT * FROM caret;")){?>
                <?php $row = $query->fetch_assoc(); ?>
                <?php if($row == null){?>

                <div class="inner cover">
                    <h1 class="cover-heading">Add products to caret</h1>
                    <p class="lead">You have any products in your caret, please choose something on <a href="index.php">Home page</a>. </p>
                    <p class="lead">
                        <a href="index.php" class="btn btn-lg btn-default">Add products</a>
                    </p>
                </div>

                <?php }else{ ?>
                <div class="row dTable">
                    <table class="table">
                        <thead class="thead-default">
                            <tr>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Count</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody class="tbody tCaret" data-id="1">

                        </tbody>
                    </table>
                </div>
            

                <?php } ?>
                <?php } ?>



                <!-- Site footer -->
                <footer class="footer">
                    <p>&copy; Company 2017</p>
                </footer>

        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">New Product</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="title">Product title</label>
                                <input type="text" class="form-control" id="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input type="number" class="form-control" id="price" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary newproduct">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- /container -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/caret.js"></script>
<!--        <script src="js/main.js"></script>-->
    </body>

    </html>