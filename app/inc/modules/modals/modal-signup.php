<!---------- SignupModal ------------>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSignup" class="my-3" method="post">
                    <!-- First Name / Last Name -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                           
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
                            
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <input type="text" required name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <!-- Password -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="password" required name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group col-md-6">
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
                    <input type="submit" name="signup-submit" value="Sign In" class="btn btn-primary btn-block">
                </form>     
            </div>
        </div>
    </div>
</div>