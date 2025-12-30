<<<<<<< HEAD

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Landing Page</title>
  <link rel="stylesheet" href="assets/styles/index.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>


  <!-- NAVIGATION -->
  <div id = "navbar" class="row py-2 position-fixed top-0 start-0 vw-100  d-flex justify-content-center p-0">
            <div class="col-8 ">
              <div class="row">
                <div class="col-2 d-flex justify-content-center gap-3 align-items-center">
                  <img src="res/plp.png" alt="asds" style = "width: 50px; height: 50px;" >
                  <h1 class="fw-bold text-white">PLP</h1>
              </div>
              <div class="col-10">
                <div class="row w-100 h-100 d-flex justify-content-end align-items-center">
                    <div class="col-1">
                        <a href="#hero" class="text-white fw-semibold">HOME</a>
                    </div>
                    <div class="col-1">
                        <a href="#about" class="text-white fw-semibold">ABOUT</a>
                    </div>
                    <div class="col-1">
                        <a href="#guide" class="text-white fw-semibold">GUIDE</a>
                    </div>
                    <div class="col-1">
                        <a  href="#" class="text-white fw-semibold toItems">ITEMS</a>
                    </div>
                    <div class="col-1 ">
                        <a href="#contact" class="text-white fw-semibold">CONTACTS</a>
                    </div>
                    <div class="col-1 text-end">
                      <button id="darkModeToggle" class="btn">
                        <span class="icon moon-icon">🌙</span>
                      </button>
                    </div>
                    <div class="col-3 text-center ">
                
                    <a  style = "display: inline-block" class="btn btn-warning rounded-pill fw-semibold py-0 text-dark" id = "openSignin">SIGN IN</a> 
                        <div id = "userDiv" class = "justify-content-center align-items-center gap-3" style = "display: none">
                        <div class="dropdown ">
  <button class="border-0 p-0 m-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <img id = "userIcon"  class = "img-fluid" alt="asds" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" >
  </button>
  <ul class="dropdown-menu" style = "width: 200px" >
    <li><a class="dropdown-item " href="#">View Profile</a></li>

    <li><a id = "toOepnRequestModal"  class="dropdown-item" href="#">My Items</a></li>
    <li><a id = "logoutBtn"  class="dropdown-item" href="#">Log out</a></li>
  </ul>
</div>
                          
                          <p id = "userName" class = "text-white p-0 m-0" >asdasdasdasd</p>
                        </div>
                       
                    </div>
                </div>
            </div>
              </div>
            </div>  
        </div>

    <!-- HERO -->
    <section id="hero" class="mb-5"> 
    <div class="container position-relative h-100">
    
       
        <!-- Main content section -->
        <div class="row h-100 d-flex flex-column justify-content-center align-items-center">
            <div class="col-12 text-center mt-3">
                <h1 class="display-3 text-white">Lost And Found  System</h1>
                <p class="fs-5 text-white">Easily report, search, and claim lost items. Helping people and belongings find their way back.</p>
            </div>
            <div class="col-6 text-center mt-4">
              <button id = "openLostItemForm" class="btn btns fs-6 border-2 border-warning  text-white mx-2 px-4 py-2 bg-transparent rounded-pill">Lost an item</button>
              <button id = "openFoundItemForm"  class="btn btns fs-6 border-2 border-warning  text-white mx-2 px-4 py-2 bg-transparent rounded-pill">Found an item</button>
            </div>
        </div>
    </div>

    <!-- Waves SVG -->
    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink"
      viewBox="0 24 150 28" preserveAspectRatio="none">
      <defs>
        <path id="wave-path"
          d="M-160 44c30 0 58-18 88-18s 58 18 88 18
             58-18 88-18 58 18 88 18 v44h-352z">
        </path>
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" />
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" />
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" />
      </g>
    </svg>
  </section>



  <div  id="landing" >
  <!-- ABOUT -->
   
  <section id="about" class="py-5">
    <div class="container">
      <div class="about-title d-flex align-items-center gap-3">
        <h1 class="m-0 text-secondary fw-light fs-5">ABOUT</h1>
        <hr class="m-0" style="flex-grow: 0.1; height: 2px; background-color: rgb(231, 193, 22); border: none; opacity: 1;">
      </div>
      <h1 class="fs-3 mb-3">THE SYSTEM</h1>
     <div class="row mb-5">
      <div class="col-6 pe-5">
        <p class="text-secondary">
          Our Lost and Found system helps users easily report and find lost items. It connects people by providing details and images, ensuring quick reunions with the rightful owners.
        </p>
        <ul class="text-secondary ps-4">
          <li class="double-check d-flex gap-3"><span class="material-symbols-outlined text-warning">done_all</span>Report lost items with descriptions and images.</li>
          <li class="double-check d-flex gap-3"><span class="material-symbols-outlined text-warning">done_all</span>Categorize found items for easy visibility.</li>
          <li class="double-check d-flex gap-3"><span class="material-symbols-outlined text-warning">done_all</span>Real-time matching based on location and keywords.</li>
          <li class="double-check d-flex gap-3"><span class="material-symbols-outlined text-warning">done_all</span>Admins verify ownership for rightful returns.</li>
          <li class="double-check d-flex gap-3"><span class="material-symbols-outlined text-warning">done_all</span>Notifications alert users on matches and updates.</li>
        </ul>
        
      </div>
      <div class="col-6 ps-5">
        <p class="text-secondary">With a focus on simplicity, security, and trust, our system is built to make reuniting lost items with their owners as smooth and safe as possible.</p>
        <button class = "btn btn-warning px-4 py-2 rounded-pill fw-semibold text-dark"><a href="#hero" class = "text-dark">Read More</a></button>
      </div>
     </div>
    </div>
  </section>


 <!-- FEATURE -->
  <section id="feature" class="mb-5 p-5">
    <div class="container mb-5">
      <h1 class="fs-3 mb-4">THE FEATURES</h1>
      <div class="row gx-4">
        <div class="col-3">
          <div class="bg-white features border shadow fs-5 text-secondary px-4 py-4 d-flex align-items-center gap-3">
            <span class="fs-1 material-symbols-outlined">notifications</span>
            Real-Time Notification
          </div>
        </div>
        <div class="col-3">
          <div class="bg-white features text-secondary border shadow fs-5 px-4 py-4 d-flex align-items-center gap-3">
            <span class="fs-1 material-symbols-outlined">folder_match</span>
            Smart Matching
          </div>
        </div>
        <div class="col-3">
          <div class="bg-white features text-secondary border shadow fs-5 px-4 py-4 d-flex align-items-center gap-3">
            <span class="fs-1 material-symbols-outlined">category</span>
            Item Categorization
          </div>
        </div>
        <div class="col-3">
          <div class="bg-white features text-secondary border shadow fs-5 px-4 py-4 d-flex align-items-center gap-3">
            <span class="fs-1 material-symbols-outlined">dark_mode</span>
            Dark Mode Ready
          </div>
        </div>
      </div>
    </div>
  </section>

      <!-- ITEM -->
  <section id = "item" class = "p-5">
    <div class="container p-3 ">
      <div class="row d-flex justify-content-center">
        <div class="col-6 text-center">
          <button id = "itemBtn" class="toItems btn btns fs-6 border-4 border-warning btn-primary mx-2 mb-3 py-3 px-4 py-2 bg-transparent rounded-pill">Start browsing items now!</button>
          <p class="fs-6 text-white">Your lost item might be just a click away!</p>
        </div>
      </div>
    </div>
  </section>


  <section id = "guide" class = " mb-5 p-4">
    <div class="container">
      <div class="about-title d-flex align-items-center mt-5 gap-3">
        <h1 class="m-0 text-secondary fw-light fs-5">GUIDE</h1>
        <hr class="m-0" style="flex-grow: 0.1; height: 2px; background-color: rgb(231, 193, 22); border: none; opacity: 1;">
      </div>
      <h1 class="fs-3 mb-5 ">ON HOW IT WORKS</h1>
      <p class = "fs-5 text-secondary text-center mb-5">For users who have lost their item.</p>
      <div class="row d-flex justify-content-center">
        <div class="col-6">

           <!-- MANUAL 1 -->

          <div id="carouselExampleCaptions" class="carousel slide mb-5 ">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="res/p1.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="text-dark">First slide label</h5>
                  <p class="text-dark">Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="res/p1.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="text-dark">Second slide label</h5>
                  <p class="text-dark">Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="res/p1.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="text-dark">Third slide label</h5>
                  <p class="text-dark">Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev text-dark" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
              <span class="visually-hidden text-dark">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <p class = "fs-5 text-secondary text-center my-5">For users who have found an item.</p>

          
           <!-- MANUAL 2 -->


          <div id="carouselExampleCaptions2" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="res/p2.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="text-white">First slide label</h5>
                  <p class="text-white">Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="res/p2.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="text-white">Second slide label</h5>
                  <p class="text-white">Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="res/p2.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="text-white">Third slide label</h5>
                  <p class="text-white">Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev text-dark" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- CONTACT -->
  <section id = "contact" class = "my-5 py-5">
    <div class="container">
      <div class="about-title d-flex align-items-center mt-5 gap-3">
        <h1 class="m-0 text-secondary fw-light fs-5">CONTACT</h1>
        <hr class="m-0" style="flex-grow: 0.1; height: 2px; background-color: rgb(231, 193, 22); border: none; opacity: 1;">
      </div>
      <h1 class="fs-3 mb-5 ">FOR SUPPORT OR INQUIRIES</h1>
      <div class="row">
        <div class="col-4">
          <div class="contact-item">
            <div class="row">
              <div class="col-2 d-flex  justify-content-center align-items-center">
                <span class="border shadow bg-white contact-icon material-symbols-outlined">
                  location_on
                </span>
              </div>
              <div class="col-10">
                <p class = "fs-5 p-0 m-0">Address</p>
                <p class = "fs-6 p-0 m-0">12-B Alcalde Jose, Pasig, 1600 Metro Manila</p>
              </div>
            </div>
            <div class="row my-5">
              <div class="col-2 d-flex  justify-content-center align-items-center">
                <span class="border shadow bg-white contact-icon material-symbols-outlined">
                  call
                </span>
              </div>
              <div class="col-10">
                <p class = "fs-5 p-0 m-0">Contact Number</p>
                <p class = "fs-6 p-0 m-0">09267115855</p>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-2 d-flex justify-content-center align-items-center">
                <span class="border shadow bg-white contact-icon material-symbols-outlined">
                  mail
                </span>
              </div>
              <div class="col-10 ">
                <p class = "fs-5 p-0 m-0">Email Address</p>
                <p class = "fs-6 p-0 m-0">group4@gmail.com</p>
              </div>
            </div>
          </div>
          </div>

          <div class="col-8">
            <form id ="contactForm" class="row g-4">
              <div class="col-6">
                <input id = "contactName" class="p-3 border shadow contact-field rounded-0" type = "text" placeholder="Your Name">
              </div>
              <div class="col-6">
                <input id = "contactEmail"  class="p-3 border shadow contact-field rounded-0" type = "text" placeholder="Your Email">
              </div>
              <div class="col-12">
                <input id = "contactSubject"  class="p-3 border shadow contact-field rounded-0" type = "text" placeholder="Subject">
              </div>
              <div class="col-12">
                <textarea id = "contactMessage"  class="p-3 border shadow contact-field rounded-0" placeholder = "Message" id="exampleFormControlTextarea1" rows="6"></textarea>
              </div>
              <div class="col-12 d-flex justify-content-center">
                <button class = "btn px-4 py-2 btn-warning rounded-pill fw-semibold text-dark"><a class = "text-dark">Send Message</a></button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </section>
   <!-- FOOTER -->
   <section id  = "footer">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center flex-column gap-3">
          <h1 class="fw-bold text-white">PLP</h1>
          <p class="fs-6 fst-italic text-white">Because everything lost deserves a way back.</p>
          <div class="footer-icon">
            <i class="fa-brands bg-transparent p-2 border fs-4 rounded-circle border-warning text-warning fa-twitter"></i>
            <i class="fa-brands bg-transparent p-2 border fs-4 rounded-circle border-warning text-warning  fa-facebook"></i>
            <i class="fa-brands bg-transparent p-2 border fs-4 rounded-circle border-warning text-warning  fa-instagram"></i>
            <i class="fa-brands bg-transparent p-2 border fs-4 rounded-circle border-warning text-warning  fa-skype"></i>
            <i class="fa-brands bg-transparent p-2 border fs-4 rounded-circle border-warning text-warning  fa-linkedin"></i>
          </div>
        </div>
      </div>
    </div>
  </section>
 

  
  </div>

    <!-- ITEMS PAGE -->
    <div id="items" class="pt-5"  style = " display: none">
    <div class="container my-5 py-5">
    <h1 id = "lostItemsCount" class="m-3 text-secondary text-center fw-semibold fs-5">101 Lost items posted </h1>



    <div id="item-nav" style=" display: block; ;">

    <div class="row align-items-stretch  g-0">
      
      <!-- Dropdown -->
      <div class="col-2 p-0">
      <div class="dropdown h-100">
  <button class="border text-secondary contact-field rounded-0 m-0 w-100 px-3 py-2 h-100 d-flex justify-content-between align-items-center" 
          type="button" 
          data-bs-toggle="dropdown" 
          aria-expanded="false" 
          id="categoryDropdownBtn">
    <span id="selectedCategory">Select category</span>
    <span class="dropdown-toggle ms-2"></span>
  </button>
  <ul class="dropdown-menu" id="categoryDropdownMenu">
  
  </ul>
</div>

      </div>

      
      

      <!-- Side Input and Empty Column -->
      <div class="col-10 p-0 m-0">
        <div class="row h-100 g-0">
          <div class="col-9 p-0 m-0">
            <input  id = "searchItemNameInput" class="border  text-secondary contact-field rounded-0 h-100 w-100" type="text" placeholder="Search Item Name" aria-label="default input example">
          </div>
         <div class="col-3 p-0 d-flex justify-content-center m-0 align-items-center">
  <input id = "searchItemNameDate" type="date" class="border text-secondary contact-field rounded-0 h-100 w-100">
</div>

        </div>
      </div>

    </div>
    
    <div class = "d-flex justify-content-between" >
    <div class="btn-group my-3" role="group" aria-label="Basic example">
    <button id="lostType" type="button" class="border text-secondary contact-field rounded-0 bg-warning px-3 py-2">Lost</button>
<button id="foundType" type="button" class="border text-secondary contact-field rounded-0 px-3 py-2">Found</button>

    </div>
    
    </div>

    </div>






    <div id = "items-list" >
    <div id = "items-row" class="row gy-3">
    
     
      
      
  
      <div class="col-3">
      <div class="card m-0 p-0 border">
        <img src="/system/res/oppresor.png" style="height: 250px; object-fit: cover; margin-top: 0;" class=" card-img-top p-0 m-0" alt="...">
          <div class="card-body pt-2">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
             <a href="#" class="btn btn-primary">Go somewhere</a>
         </div>
      </div>
      </div>


    </div>



  </div>
</div>


  <section id  = "footer" class = "mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center flex-column gap-3">
          <h1 class="fw-bold text-white">PLP</h1>
          <p class="fs-6 fst-italic text-white">Because everything lost deserves a way back.</p>
          <div class="footer-icon">
            <i class="fa-brands bg-transparent p-2 border fs-4 rounded-circle border-warning text-warning fa-twitter"></i>
            <i class="fa-brands bg-transparent p-2 border fs-4 rounded-circle border-warning text-warning  fa-facebook"></i>
            <i class="fa-brands bg-transparent p-2 border fs-4 rounded-circle border-warning text-warning  fa-instagram"></i>
            <i class="fa-brands bg-transparent p-2 border fs-4 rounded-circle border-warning text-warning  fa-skype"></i>
            <i class="fa-brands bg-transparent p-2 border fs-4 rounded-circle border-warning text-warning  fa-linkedin"></i>
          </div>
        </div>
      </div>
    </div>
  </section>  
</div>






  <!-- SIGN IN MODAL-->

  <div class="modal fade" id="signinModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-secondary">
        <div class="modal-header border-0 bg-light">
          <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id = "signinForm" class="modal-body px-5 pb-5">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 d-flex justify-content-center"> <h1 class="fs-3 text-dark mb-3">SIGN IN</h1></div>
             <p class = "mb-0 p-0">Email</p>
             <input id = "emailSignin" class="form-control mb-3" type="text" required  placeholder="" aria-label=".form-control-sm example">
             <p class = "mb-0 p-0">Password</p>
             <input id = "passwordSignin" class="form-control mb-2" type="password" required placeholder="" aria-label=".form-control-sm example">
             <div class = "d-flex justify-content-between">
              <div class="p-0 ms-3 form-check mb-5">
                <input class="form-check-input" type="checkbox" value="" id="checkChecked" checked>
                <label class="form-check-label" for="checkChecked">
                  Keep me signed in
                </label>
              </div>
              <p>Forgot password</p>
             </div>
            <button type = "submit" class = "btn mb-5 btn-warning text-dark fw-semibold">Sign In</button>
            <p class="mb-0 mt-5 text-center">
              Don't have an account?
              <a href="#" class="link-underline-warning" id = "toSignup">Sign up</a>
            </p>
            
            <hr class = "mt-1 mb-3">
            <p>Or sign in with: </p>
            <div class = "d-flex gap-5">
              <i style = "color: blue" class="fa-brands fs-2 fa-facebook facebookBtn facebookBtnSignin"></i>
              <i  id = "toSigninGoogle" style = "color: #4285F4" class="fa-brands fs-2 fa-google googleBtnSignin"></i>
            </div>
            </div>
          </div>
         
        </form>
       
      </div>
    </div>
  </div>
  
  
  <!-- SIGN UP MODAL-->

  <div class="modal fade" id="signupModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-secondary">
        <div class="modal-header border-0 bg-light">
          <span id = "toSignin" class="material-symbols-outlined">
            arrow_back_ios
            </span>
          <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id = "signupForm" class="modal-body px-5 pb-5">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 d-flex justify-content-center"> <h1 class="fs-3 text-dark mb-3">SIGN UP</h1></div>
             <div class="d-flex gap-3 p-0">
              <div>
                <p class = "mb-0">First Name</p>
                <input id = "firstNameSignup" required class="form-control mb-3" type="text" placeholder="" aria-label=".form-control-sm example">
              </div>
              <div>
                <p class = "mb-0">Last Name</p>
                <input id = "lastNameSignup" required class="form-control mb-3" type="text" placeholder="" aria-label=".form-control-sm example">
              </div>
              
             </div>
             <p class = "mb-0 p-0">Email</p>
             <input id = "emailSignup"  required class="form-control mb-3" type="email" placeholder="" aria-label=".form-control-sm example">

             <p class = "mb-0 ms-0 p-0">Password</p>
             <input  id = "passwordSignup" required class="form-control mb-2" type="password" placeholder="" aria-label=".form-control-sm example">
             
             <p class = "mb-0 ms-0 p-0">Confirm Password</p>
             <input id= "confirmPassword" required class="form-control mb-2" type="password" placeholder="" aria-label=".form-control-sm example">
             
            <button type = "submit"  class = "btn mt-3 mb-5 btn-warning text-dark fw-semibold">Create Account</button>
          
            <hr class = "mt-1 mb-3">
            <p>Or sign up with: </p>
            <div class = "d-flex gap-5">
              <i style = "color: blue" class="fa-brands fs-2 fa-facebook facebookBtn facebookBtnSignup"></i>
              <i  style = "color: #4285F4" class="fa-brands fs-2 fa-google googleBtn googleBtnSignup"></i>
            </div>
            </div>
          </div>
         
        </form>
       
      </div>
    </div>
  </div>
  
  <!-- WARNING MODAL -->
  <div class="modal fade" id="warningModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-secondary">
        <div class="modal-header border-0 bg-light">
          <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="modal-body px-5 ">
          <div class="container-fluid d-flex flex-column align-items-center">
         <h1 class="fs-3 text-dark mb-3">PLEASE SIGN IN FIRST</h1>
          <p class = "text-center">You need to be logged in to perform this action. Kindly log in to continue.</p>
          <div>
            <button id = "openSignin1" class = "btn btn-warning fw-semibold" >Sign In</button>
          </div>
          </div>
         
        </form>
       
      </div>
    </div>
  </div>

<!-- LOST ITEM MODAL -->
<div class="modal fade" id="lostItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body pb-5 px-5">
        <form id = "lostItemForm" >
          <div class="container-fluid">
            <h1 class="fs-3 text-dark mb-3 text-center">POST YOUR LOST ITEM</h1>

            <div id="imgPlaceholder" class="img-placeholder d-flex justify-content-center align-items-center w-100 rounded mb-3"
              style="background-color:rgb(238, 238, 238); height: 200px; background-size: cover; background-position: center;">
              <button style="z-index: 1000" id="uploadBtn" type="button" class="upload-btn m-5 btn btn-warning">Upload Image</button>
            </div>
            <input type="file" id="imgInputLost" accept="image/*" class="img-input" style="display: none;" />

            <p class="text-secondary text-center" style="font-size: 12px;">Uploading an image is optional but recommended for better identification.</p>

            <p class="mb-0 p-0">Item Name</p>
            <input id = "nameLost" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Description</p>
            <input maxLength = "100" id = "descriptionLost" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Location</p>
            <input id = "locationLost" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Category</p>
<select name="categoryLost" id="categoryLost" class="form-select mb-5" required>
  <option value="" disabled selected>Select a category</option>
</select>

            <button type="submit" class="fw-semibold btn btn-warning text-center mx-auto w-100">Post my item</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- FOUND ITEM MODAL -->
<div class="modal fade" id="foundItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body pb-5 px-5">
        <form id = "foundItemForm" >
          <div class="container-fluid">
            <h1 class="fs-3 text-dark mb-3 text-center">POST YOUR FOUND ITEM</h1>

            <div class="img-placeholder d-flex justify-content-center align-items-center p-5 w-100 rounded mb-3" style="background-color:rgb(238, 238, 238); height: 200px; background-size: cover; background-position: center;">
              <button type="button" class="upload-btn m-5 btn btn-warning">Upload Image</button>
            </div>
            <input type="file" id="imgInputFound" accept="image/*" class="img-input" style="display: none;" />

            <p class="text-secondary text-center" style="font-size: 12px;">Uploading an image is optional but recommended for better identification.</p>

            <p class="mb-0 p-0">Item Name</p>
            <input id = "nameFound" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Description</p>
            <input  maxLength = "100" id = "descriptionFound" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Location</p>
            <input  id = "locationFound" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">
            <p class="mb-0 p-0">Category</p>
<select name="categoryFound" id="categoryFound" class="form-select mb-5" required>
  <option value="" disabled selected>Select a category</option>
</select>
            <button type="submit" class="fw-semibold btn btn-warning text-center mx-auto w-100">Post my item</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Item Details Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemModalLabel">Item Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-nowrap" style="gap: 1.5rem; overflow-x: auto;">
        <img
          id="modalItemImage"
          src="/system/res/oppresor.png"
          class="rounded border"
          style="flex-shrink: 0; width: 300px; height: 300px; object-fit: cover;"
          alt="Item image"
        />

        <div class="flex-grow-1" style="min-width: 0;">
          <p class="mb-2"><strong>Name:</strong> <span id="modalItemName" class="text-break"></span></p>
          <p class="mb-2"><strong>Owner:</strong> <span id="modalItemOwner" class="text-break"></span></p>
          <p class="mb-2"><strong>Category:</strong> <span id="modalItemCategory" class="text-break"></span></p>
          <p class="mb-2"><strong>Type:</strong> <span id="modalItemType" class="text-break text-capitalize"></span></p>
          <p class="mb-2"><strong>Location:</strong> <span id="modalItemLocation" class="text-break"></span></p>
          <p class="mb-2">
            <strong>Description:</strong><br>
            <span id="modalItemDescription" class="text-break d-inline-block" style="max-height: 180px; overflow-y: auto;"></span>
          </p>
          <p class="mb-2"><strong>Posted At:</strong> <span id="modalItemPostedAt"></span></p>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- TO  ADMIN MODAL --> 
 <div class="modal fade" id="toAdminModal" aria-hidden="true" aria-labelledby="deleteUserModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-secondary">
            <div class="modal-header border-0 bg-light">
                <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="toAdminForm" class="modal-body px-4 py-3">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 px-0 d-flex justify-content-center">
                            <h1 class="fs-5  mb-3 text-danger">Admin access detected.</h1>
                        </div>

                  
                        <div class="d-flex flex-column justify-content-center align-items-center gap-2 p-0">
                            <p class="mb-2">Switch to the admin interface?</p>
                            
                            <div class="d-flex  gap-3 align-items-center">
                                <button type="button" class="btn btn-secondary  m-0 btn-sm" data-bs-dismiss="modal">Stay Here</button>
                                <button type="submit" id="openAdmin" class="btn m-0 btn-warning btn-sm">Switch</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- TO REQUESTS MODAL --> 
<div class="modal fade" id="openRequestModal" aria-hidden="true" aria-labelledby="openRequestModalLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px;">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-1 py-3">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <!-- Centered Title -->
            <div class="col-12 text-center">
              <h1 class="fs-2 mb-3 text-black">ITEM REQUESTS</h1>
            </div>

            <!-- Centered Pagination -->
            <div class="col-12 d-flex justify-content-center mb-3">
              <nav aria-label="...">
                <ul class="pagination pagination-sm">
                  <li class="page-item active">
                    <a class="page-link p-2 text-dark" href="#" aria-current="page">Waiting For Their Responses</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link p-2 text-dark" href="#">Pending My Review</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link p-2 text-dark" href="#">Accepted Matches</a>
                  </li>
                </ul>
              </nav>
            </div>

            <!-- Panels -->
            <div class="col-12">
              <!-- Their Requests Section -->
              <section id="theirRequests">
                <div class="panels px-0 mx-0 py-2 d-none"></div>
              </section>

              <!-- My Requests Section -->
              <section id="myRequests">
                <div class="panels px-0 mx-0 py-2  d-none"></div>
              </section>

              <!-- Suggested Matches Section -->
              <section id="acceptedMatches">
                <div class="panels px-0 mx-0 py-2  d-none">
                  
                </div>
              </section>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- FOUND ITEM MODAL 2 -->
<div class="modal fade" id="foundItemModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body pb-5 px-5">
        <form id = "foundItemForm2" >
          <div class="container-fluid">
            <h1 class="fs-3 text-dark mb-3 text-center">DETAILS OF PROOF</h1>

            <div class="img-placeholder d-flex justify-content-center align-items-center p-5 w-100 rounded mb-3" style="background-color:rgb(238, 238, 238); height: 200px; background-size: cover; background-position: center;">
              <button type="button" class="upload-btn m-5 btn btn-warning">Upload Image</button>
            </div>
            <input type="file" id="imgInputFound2" accept="image/*" class="img-input" style="display: none;" />

            <p class="text-secondary text-center" style="font-size: 12px;">Uploading an image is optional but recommended for better identification.</p>

            <p class="mb-0 p-0">Item Name</p>
            <input id = "nameFound2" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Description</p>
            <input  maxLength = "100" id = "descriptionFound2" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Location</p>
            <input  id = "locationFound2" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">
            <p class="mb-0 p-0">Category</p>
<select name="categoryFound" id="categoryFound2" class="form-select mb-5" required>
  <option value="" disabled selected>Select a category</option>
</select>
            <button type="submit" class="fw-semibold btn btn-warning text-center mx-auto w-100">Send request</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- LOST ITEM MODAL  2-->
<div class="modal fade" id="lostItemModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body pb-5 px-5">
        <form id = "lostItemForm2" >
          <div class="container-fluid">
            <h1 class="fs-3 text-dark mb-3 text-center">DETAILS OF PROOF</h1>

            <div id="imgPlaceholder" class="img-placeholder d-flex justify-content-center align-items-center w-100 rounded mb-3"
              style="background-color:rgb(238, 238, 238); height: 200px; background-size: cover; background-position: center;">
              <button style="z-index: 1000" id="uploadBtn" type="button" class="upload-btn m-5 btn btn-warning">Upload Image</button>
            </div>
            <input type="file" id="imgInputLost2" accept="image/*" class="img-input" style="display: none;" />

            <p class="text-secondary text-center" style="font-size: 12px;">Uploading an image is optional but recommended for better identification.</p>

            <p class="mb-0 p-0">Item Name</p>
            <input id = "nameLost2" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Description</p>
            <input maxLength = "100" id = "descriptionLost2" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Location</p>
            <input id = "locationLost2" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Category</p>
<select name="categoryLost" id="categoryLost2" class="form-select mb-5" required>
  <option value="" disabled selected>Select a category</option>
</select>

            <button type="submit" class="fw-semibold btn btn-warning text-center mx-auto w-100">Post my item</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script type="module" src="assets/script/index.js"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a963584a34.js" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- ✅ Only this Bootstrap JS is needed (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
=======
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
>>>>>>> 620cb75143d6d5621a8f3cd11823098910f0ca37
</html>