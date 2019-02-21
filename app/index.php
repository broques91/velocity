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
                    <div class="col-sm-10 col-md-6 col-lg-3 mx-auto">
                        <div class="jumbotron bg-transparent text-center mb-0">
                        <h2 class="mb-3">Bienvenue !</h2>    
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
                        
                        <div>
                            <small>
                                <span class="font-weight-light">Pas de compte ?</span> 
                                <a class="font-weight-bold" href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter"> S'inscrire</a> 
                            </small>
                        </div>
                        <?php include('inc/modules/modals/modal-signup.php'); ?>               
                        <hr class="text-border">
                    </div>
                </main>
                <footer class="mt-auto fixed-bottom p-3 bg-dark">
                    <span class=text-light>Mentions légales<span>
                </footer>
            </section>
            
            <!-- MAP -->
            <div id="map-container" class="container-fluid">    
                <div id='map'></div>
            </div>
                        
        </div>
       
    </div>
    
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-------------------------------- Scripts ------------------------------------>
     <!-- jQuery -->
    <script src="dist/assets/js/jquery-3.3.1.min.js"></script>
    <!-- BX Slider -->
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Mapbox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
    <!-- Custom JS -->
    <script src="dist/assets/js/app.min.js"></script>

</body>
</html>