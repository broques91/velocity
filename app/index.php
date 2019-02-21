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
            <section id="landing">    
                <div class="jumbotron text-center">
                    <h2 class="display-4">Dur de se garer ? Prenez le vélo !</h2>
                    <p class="lead">Disponible 24h/24 et 7j/7</p>
                    
                    <hr class="my-4">
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter">S'inscrire</a>
                        <p>
                            Déja inscrit ? <button type="button" class="btn btn-lg btn-link p-0" data-toggle="modal" data-target="#loginModal">
                            Connectez-vous
                            </button>
                            <?php include('inc/modules/modals/modal-login.php'); ?>
                        </p>
                        <?php include('inc/modules/modals/modal-signup.php'); ?>
                    </p>
                </div>
            </section>
            
            <!-- Logged Content -->
            <section id="main">
                <div class="container-fluid">
                    <h2 class="text-center">Carte et stations</h2>
                    <p class="text-center text-muted">Choisissez votre station sur la carte pour vérifier les disponibilités et réserver votre vélo.</p>
                    
                    <div id='map'></div>
                        
                    <!-- Modal Booking -->
                    <div class="modal fade" id="modalBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Info station</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                
                <footer class="p-3 bg-dark">
                    <p>mentions légales </p>
                </footer>

            </section>

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