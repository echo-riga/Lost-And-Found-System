<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/index.css">
  </head>
  <body>
    <div class="h-100 bg-success">
        <div class="row h-100 d-flex justify-content-center align-items-center">
            
            <!--SIGN IN-->
            <form id = "signinPanel" style = "border: 1px solid rgba(0, 0, 0, 0.1);" class="bg-white col-4 p-5">
                <h1 class = "display-6">Sign In</h1>
                <input class="bg-light form-control my-4 p-3" required type="text" placeholder="Email" aria-label="default input example">
                <input type="password" class="form-control my-4 p-3 bg-light" required placeholder = "Password" aria-describedby="passwordHelpBlock">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">Remember Me</label>
                </div>
                <button type = "submit" class = "btn btn-success w-100 p-3 my-4 ">Log In</button>
                <hr>
                <div class = "text-end">
                    <p class = "d-inline"><a href="#" id = "signupBtn" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Create a new account</a></p>
                    <p class = "d-inline ms-3"><a href="#" id = "forgotpasswordBtn" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Forgot password</a></p>
                </div>
                <p class ="mt-5 mb-4">Or sign in with</p>
                <div class = "googleBtn rounded border border-2 border-danger d-inline-block px-4 mx-3 py-2">
                    <i  class="text-danger fs-5  fa-brands fa-google"></i>
                    <p class = "d-inline ms-2 text-danger">Google</p>
                </div>
                <div class = "facebookBtn border border-2 border-primary d-inline-block px-4 mx-3 py-2">
                    <i  class="text-primary fs-5  fa-brands fa-facebook"></i>
                    <p  class = "d-inline ms-2 text-primary">Facebook</p>
                </div>
            </form>

              <!--SIGN UP-->
            <form id = "signupPanel" style = "border: 1px solid rgba(0, 0, 0, 0.1);" class="d-none bg-white col-4 p-5">
                <h1 class = "display-6 mb-4">Sign Up</h1>
                <div class = "row g-3 ">
                    <div class = "col-6">
                        <input class="form-control bg-light p-3" type="text" required placeholder="First Name" aria-label="default input example">
                    </div>
                    <div class = "col-6">
                        <input class="form-control bg-light p-3" type="text" required placeholder="Last Name" aria-label="default input example">
                    </div>
                    <div class="col-12">
                        <input class="form-control bg-light p-3" type="text" required placeholder="Email" aria-label="default input example">
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control my-4 p-3 bg-light" required placeholder = "Password" aria-describedby="passwordHelpBlock">
                    </div>
                    <div class="col-12">
                        <input class="form-control bg-light p-3" type="text" required placeholder="Confirm Password" aria-label="default input example">    
                    </div>
                    
                </div>
               
                <button id = "signUpBtn" type = "submit" class = "btn btn-success w-100 p-3 my-4 ">Sign Up</button>
                <hr>
                <div class = "text-end">
                    <p class = "d-inline"><a href="#" id = "signinBtn" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Go back</a></p>
                </div>
                <p class ="mt-5 mb-4">Or sign up with</p>
                <div class = "googleBtn rounded border border-2 border-danger d-inline-block px-4 mx-3 py-2">
                    <i  class="text-danger fs-5  fa-brands fa-google"></i>
                    <p class = "d-inline ms-2 text-danger ">Google</p>
                </div>
                <div class = "facebookBtn rounded border border-2 border-primary d-inline-block px-4 mx-3 py-2">
                    <i  class="text-primary fs-5  fa-brands fa-facebook"></i>
                    <p class = "d-inline ms-2 text-primary ">Facebook</p>
                </div>
            </form>

              <!--FORGOT PASSWORD -->
            <div id = "forgotpasswordPanel" style = "border: 1px solid rgba(0, 0, 0, 0.1);" class="d-none bg-white col-4 p-5">
                <h1 class = "display-6">Forgot password</h1>
                <p class = "text-secondary">Provide the email address associated with your account to recover your password.</p>
                <div class=" py-1 alert alert-danger" role="alert">
                    You signed up using Google. Please use Google Sign-In to access your account.
                  </div>
                <input class="bg-light form-control my-4 p-3" type="text" placeholder="Email" aria-label="default input example">
               
                <button class = "btn btn-success w-100 p-3 my-4 ">Next</button>
                
                <hr>
                <div class = "text-end">

                    <p class = "d-inline ms-3"><a href="#" id = "signinBtn1" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Cancel</a></p>
                </div>
             
            </div>

              <!--VERIFICATION OF EMAIL-->
            <div id = "forgotpasswordPanel1" style = "border: 1px solid rgba(0, 0, 0, 0.1);" class="d-none bg-white col-4 p-5">
                <h1 class = "display-6">Email verification</h1>
                <div class=" py-1 alert alert-warning" role="alert">
                    Enter the code we sent on your email.
                </div>
                <div class=" py-1  alert alert-danger" role="alert">
                    Incorrect code.
                </div>
                <div class = "row gx-3">
                    <div class = "col-2 ">
                        <input type="text" maxlength="1" class="text-center fs-3 code-input border border-dark-subtle form-control bg-light p-2 w-100" pattern="\d*" inputmode="numeric">
                    </div>
                    <div class = "col-2 ">
                        <input type="text" maxlength="1" class="text-center fs-3 code-input border border-dark-subtle form-control bg-light p-2 w-100" pattern="\d*" inputmode="numeric">
                    </div>
                    <div class = "col-2 ">
                        <input type="text" maxlength="1" class="text-center fs-3 code-input border border-dark-subtle form-control bg-light p-2 w-100" pattern="\d*" inputmode="numeric">
                    </div>
                    <div class = "col-2 ">
                        <input type="text" maxlength="1" class="text-center fs-3 code-input border border-dark-subtle form-control bg-light p-2 w-100" pattern="\d*" inputmode="numeric">
                    </div>
                    <div class = "col-2 ">
                        <input type="text" maxlength="1" class="text-center fs-3 code-input border border-dark-subtle form-control bg-light p-2 w-100" pattern="\d*" inputmode="numeric">
                    </div>
                    <div class = "col-2 ">
                        <input type="text" maxlength="1" class="text-center fs-3 code-input border border-dark-subtle form-control bg-light p-2 w-100" pattern="\d*" inputmode="numeric">
                    </div>
                </div>
                <button class = "btn btn-success w-100 p-3 my-4 ">Submit</button>
                <hr>
                <div class = "text-end">

                    <p class = "d-inline ms-3"><a href="#" id = "signinBtn2" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Cancel</a></p>
                </div>
            </div>

             <!--CHANGING OF PASSWORD-->
             <div id = "forgotpasswordPanel2" style = "border: 1px solid rgba(0, 0, 0, 0.1);" class="d-none bg-white col-4 p-5">
                <h1 class = "display-6">Reset password</h1>
                
                <input type="password" class="form-control my-4 p-3 bg-light" placeholder = "New password" aria-describedby="passwordHelpBlock">
                <input type="password" class="form-control my-4 p-3 bg-light" placeholder = "Confirm password" aria-describedby="passwordHelpBlock">
                <div class=" py-1  alert alert-danger" role="alert">
                    Passwords do not match.
                </div>
                <button class = "btn btn-success w-100 p-3 my-4 ">Reset password</button>
                <hr>
                <div class = "text-end">

                    <p class = "d-inline ms-3"><a href="#" id = "signinBtn3" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Cancel</a></p>
                </div>
                <div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Your password has been successfully changed.
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                         
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
    


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Done!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
            Your registration has been successfully completed. Please log in to get started.
        </div>
                <div class="modal-footer">
                 <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
              
                </div>
            </div>
        </div>
    </div>
   
    <script type = "module" src = "./assets/js/index.js"></script>
    <script src="https://kit.fontawesome.com/a963584a34.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>