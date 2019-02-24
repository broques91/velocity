

<div class="modal fade" id="signupModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
            </button>
        </div>
        <div class="modal-body">
        <form id="formSignup" class="my-3 text-left" method="post">
                    <!-- First Name / Last Name -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="">Prénom</label>
                            <input type="text" name="firstname" class="form-control" placeholder="First Name" required>        
                        </div>
                        <div class="form-group col-md-6">
                        <label for=""> Nom</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
                            
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                    <label for="">Pseudo</label>
                        <input type="text" required name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <!-- Password -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Mot de passe</label>
                            <input type="password" required name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Confirmation mot de passe</label>
                            <input type="password" required name="passwordconfirm" class="form-control" placeholder="Confirm password" required>
                        </div>
                    
                    </div>
                    <!-- Avatar
                    <div class="custom-file">
                        <input type="file" name="avatar" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose picture</label>
                    </div> -->
                    <!-- <div class="form-group my-2 text-left mb-3">
                        <div class="form-check text-dark">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div> -->
                    <div class="errorMsg"><?php echo $errorMessage; ?></div>
                    <div class="sucessMsg"><?php echo $sucessMessage; ?></div>
                    <hr>
                    <input type="submit" name="signup-submit" value="Créer votre compte" class="btn btn-danger btn-block">
                    
                </form>     
        </div>
        </div>
    </div>
</div>