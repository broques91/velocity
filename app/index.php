<?php
    header('Access-Control-Allow-Origin: *');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('inc/head.php'); ?>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include('inc/sidebar.php'); ?>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-lg btn-light p-0">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <h1 class="text-center">Velo'city</h1>
                    <button id="btn-info" type="button" class="btn btn-lg btn-light p-0" data-toggle="modal" data-target=".bd-example-modal-xl">
                        <i class="fas fa-info-circle"></i>
                    </button>
                    
                </div>
            </nav>
            
            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="card-deck">
                        <div class="card">
                            <img src="http://via.placeholder.com/250x200" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">Etape 1</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            
                            </div>
                        </div>
                        <div class="card">
                            <img src="http://via.placeholder.com/250x200" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">Etape 2</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            
                            </div>
                        </div>
                        <div class="card">
                            <img src="http://via.placeholder.com/250x200" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">Etape 3</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Landing Content -->
             <section id="logscreen" class="container-fluid h-100 d-flex flex-column">
                <main class="row align-items-center flex-grow-1">
                    <div id="test" class="col-sm-10 col-md-6 col-lg-3 mx-auto">
                        <div class="jumbotron bg-transparent text-center mb-0">
                            <h2 class="mb-3">Velocity</h2>    
                            <hr class="text-border">
                            <!-- LOGIN FORM -->
                            <form id="formLogin" class="my-3" action="api/checkUser.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Login" class="btn btn-block btn-danger ">
                                </div>
                            </form>
                            <small>
                                <span class="font-weight-light">Pas de compte ?</span> 
                                <a class="font-weight-bold" href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter"> S'inscrire</a>
                                <?php include('inc/modules/modals/modal-signup.php'); ?>   
                            </small>
                            <hr class="text-border">
                        </div>                    
                    </div>  
                </main>
                <!-- MAP -->
                <div id="map-container" class="container-fluid p-0">    
                    <div id='map'></div>
                </div>

                <!-- FOOTER -->
                <footer class="mt-auto fixed-bottom p-3 bg-dark">
                    <span class=text-light>Mentions légales<span>
                </footer>
            </section>

        </div>
       
    </div>
    
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-------------------------------- Scripts ------------------------------------>
    <?php include('inc/scripts.php'); ?>
    
</body>
</html>