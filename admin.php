<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/styles/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <!-- Fixed Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-white position-fixed top-0 left-0 w-100">
    <div class="container">
      <div class="row w-100">
        <div class="col-4 p-3 d-flex align-items-center gap-3">
          <span class="text-secondary material-symbols-outlined">segment</span>
          <div class="dropdown">
            <button id="dropdownButton" class="fw-semibold btn dropdown-toggle text-secondary bg-transparent border-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dashboard
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" onclick="showSection('dashboard')">Dashboard</a></li>
              <li class="dropdown-submenu dropdown-hover">
                <a class="dropdown-item" href="#">Item Management</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#" onclick="showSection('lost-item')">Lost Items</a></li>
                  <li><a class="dropdown-item" href="#" onclick="showSection('found-item')">Found Items</a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="#" onclick="showSection('users')">User Management</a></li>
              <li><a class="dropdown-item" href="#" onclick="showSection('categories')">Categories</a></li>
              <li><a class="dropdown-item" href="#" onclick="showSection('reviews')">Cases</a></li>
               <li><a class="dropdown-item" href="#" onclick="showSection('history')">Audit Trail</a></li>
            </ul>
          </div>
        </div>
        
        <div class="col-4 p-1 d-flex justify-content-center align-items-center ">
          <img src="res/plp.png" alt="Logo" style="width: 50px; height: 50px;">
        </div>
        
        <div class="col-4 p-3  d-flex align-items-center justify-content-end gap-3">
          <button id="darkModeToggle" class="btn">
            <span class="icon moon-icon">🌙</span>
          </button>

          <p class="text-secondary m-0">Hi, <span id = "adminName" class="text-dark fw-semibold"></span></p>
        <img id = "adminIcon" src = "" alt="asds" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" >
          <p class="text-secondary m-0">Admin</p>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container mt-5 pt-5">
    <div class="row py-4 ">
      <div class="d-flex gap-3">
        <p class="fw-semibold">Admin Interface</p>
        <span class="icon text-secondary material-symbols-outlined">dashboard</span>
        <p id = "endpoint" class = "text-secondary" >Dasboard > Default dashboard</p>
      </div>
      
      <div class="col-9 p-3  ">



      <section id="dashboard">

  <div class="row gx-5">
    <div class="col-6   pe-4 px-0 ">
     <div style="position: relative; height: 350px; width: 100%;"> <!-- Make it full width and height -->
          <canvas id="activitiesDate" style="background-color:rgb(48, 67, 85);  padding: 10px;"></canvas>

          </div>


          <div class="row g-4 pt-4">
  <!-- Lost Items Card -->
  <div class="col-md-6 col-12">
    <div class="card text-white bg-gradient p-3  bg-danger shadow-sm h-100 border-0">
      <div class="card-body d-flex align-items-center justify-content-between p-4">
        <div>
          <h2 id = "lostCounter" class="fw-bold mb-0">80</h2>
          <p class="mb-0">Lost Items</p>
        </div>
        <div class="ms-3">
          <i class="fas fa-exclamation-triangle fa-3x"></i> <!-- Font Awesome Icon for Lost Items -->
        </div>
      </div>
    </div>
  </div>

  <!-- Found Items Card -->
  <div class="col-md-6 col-12">
    <div class="card text-white bg-gradient p-3 bg-success shadow-sm h-100 border-0">
      <div class="card-body d-flex align-items-center justify-content-between p-4">
        <div>
          <h2 id = "foundCounter" class="fw-bold mb-0">45</h2>
          <p class="mb-0">Found Items</p>
        </div>
        <div class="ms-3">
          <i class="fas fa-check-circle fa-3x"></i> <!-- Font Awesome Icon for Found Items -->
        </div>
      </div>
    </div>
  </div>

  <!-- Users Card -->
  <div class="col-md-6 col-12">
    <div class="card text-white bg-gradient p-3  bg-info shadow-sm h-100 border-0">
      <div class="card-body d-flex align-items-center justify-content-between p-4">
        <div>
          <h2 id = "userCounter" class="fw-bold mb-0">120</h2>
          <p class="mb-0">Users</p>
        </div>
        <div class="ms-3">
          <i class="fas fa-users fa-3x"></i> <!-- Font Awesome Icon for Users -->
        </div>
      </div>
    </div>
  </div>

  <!-- Categories Card -->
  <div class="col-md-6 col-12">
    <div class="card text-white bg-gradient p-3  bg-warning shadow-sm h-100 border-0">
      <div class="card-body d-flex align-items-center justify-content-between p-4">
        <div>
          <h2 id = "categoriesCounter" class="fw-bold mb-0">15</h2>
          <p class="mb-0">Categories</p>
        </div>
        <div class="ms-3">
          <i class="fas fa-tags fa-3x"></i> <!-- Font Awesome Icon for Categories -->
        </div>
      </div>
    </div>
  </div>
</div>





    </div>
    <div class="col-6 ps-4">



      <div class="row">
        <div class="col-12 panels bg-white">

          <div style="position: relative; height: 350px; width: 100%;"> <!-- Make it full width and height -->
            <canvas id="itemReport"></canvas>
          </div>
        </div>

        <div class="col-12 panels mt-4  bg-white">
          <div class = "d-flex p-3 justify-content-center w-100"style="position: relative; height: 350px; width: 100%;">
          <canvas id="matchesStatus"></canvas>
          </div>
        </div>


      </div>



    </div>
    <div style = "width: 99%" class="col-12 panels bg-white  mt-5" >

    <div class = "d-flex justify-content-center w-100"  style="position: relative; height: 550px; width: 100%;"> <!-- Make it full width and height -->
    <canvas id="topCategories"></canvas>

          </div>
  
    </div>

<div class="row m-0 mt-5 px-3">
  <!-- Location Bar Chart -->
  <div class="col-lg-4 col-md-6 col-12 panels p-0 m-0 bg-white">
    <div style="position: relative; height: 350px; width: 100%;">
      <canvas id="locationBar"></canvas>
    </div>
  </div>

  <!-- Items Active Pie Chart -->
  <div class="col-lg-4 col-md-6 col-12 panels p-0 m-0 bg-white ">
    <div class = "d-flex justify-content-center" style="position: relative; height: 350px; width: 100%;">
      <canvas id="itemsActive"></canvas>
    </div>
  </div>

  <!-- Users Date Line Chart -->
  <div class="col-lg-4 col-12 panels p-0 m-0 bg-white">
    <div class = "d-flex align-items-center "style="position: relative; height: 350px; width: 100%;">
      <canvas id="usersDate"></canvas>
    </div>
  </div>
</div>

  </div>


  

  <!-- Report Controls -->
  <div class="text-center mt-3">
    <label for="reportDate" class="form-label d-block mb-2">Generate Report for:</label>
    <input type="date" id="reportDate" class="form-control d-inline-block w-auto mx-2 mb-3 exclude-from-pdf" />
  </div>

  <!-- Export Buttons -->
  <div class="text-center mb-4 exclude-from-pdf">
    <button class="btn btn-success mx-2" id="exportExcelBtn">Generate Report as Excel / CSV</button>
    <button class="btn btn-danger mx-2" id="exportPdfBtn">Generate Report as PDF</button>
  </div>

  <!-- Generated Report -->
  <div id="reportContent" class=" panels bg-white p-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 id="reportTitle" class="mb-0">
        Generated Report for: <span id="reportDateDisplay">[Select Date]</span>
      </h3>
    </div>

    <div class="mb-3">
      <small class="text-muted">
        <strong class = "explanation d-block" >Status Explanation:</strong> 
        <span class="text-success">Active</span> <span class = "explanation">- Currently posted item</span><br />
        <span class="text-secondary">Inactive</span> <span class = "explanation "> - Resolved, claimed, or proof item </span>
      </small>
    </div>

    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered" id="reportTable">
          <thead>
            <tr>
              <th>Item ID</th>
              <th>Owner Name</th>
              <th>Email</th>
              <th>Item Name</th>
              <th>Category</th>
              <th>Type</th>
              <th>Description</th>
              <th>Location</th>
              <th>Posted At</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="reportsBody">
            <!-- Dynamic rows inserted here via JS -->
          </tbody>
        </table>
      </div>
    </div>

  </div>


</section>

        <section id="lost-item">

        <div class = "panels rounded p-3 shadow bg-white">
          <div class = "d-flex w-100 justify-content-between">
              <p class = "fw-semibold" >Lost Items </p>
              <button id = "toAddLostItem" class="bg-transparent border-0">
                <span  class="fs-4 text-warning material-symbols-outlined ">
                  add
                </span>
              </button>
            </div>
            <div class="row">
              <div class="col-2  p-2">
                 
              <select id="lostItemsInputStatus" class="form-select h-100 w-100 rounded-0 contact-field">
  <option value="">All</option>
  <option value="1">Active</option>
  <option value="0">Inactive</option>
</select>

              </div>
                <div class="col-8  p-2">
                   <input  id = "lostItemsInputName" class="border  text-secondary contact-field rounded-0 h-100 w-100" type="text" placeholder="Search Item Name" aria-label="default input example">

                </div>
                  <div class="col-2  p-2">

                  <input id = "lostItemsInputDate" type="date" class="border text-secondary contact-field rounded-0 h-100 w-100">
                  
                  </div>
            </div>

            <div style = "height: 70vh; overflow-y: auto" class = "scrollable">
           
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="p-3 text-secondary">#</th>
                  <th scope="col" class="p-3 text-secondary">Owner</th>
                  <th scope="col" class="p-3 text-secondary">Email</th>
                  <th scope="col" class="p-3 text-secondary">Category</th>
                  <th scope="col" class="p-3 text-secondary">Item name</th>
                  <th scope="col" class="p-3 text-secondary">Type</th>
                  <th scope="col" class="p-3 text-secondary">Description</th>
                  <th scope="col" class="p-3 text-secondary">Location</th>
                  <th scope="col" class="p-3 text-secondary">Status</th>
                  <th scope="col" class="p-3 text-secondary">Created At</th>
                  <th scope="col" class="p-3 text-secondary">Action</th>
                </tr>
              </thead>
              <tbody id = "lostItemsBody" >
             
              </tbody>
            </table>
            
            
            
          </div>
          </div>
          

        </section>
        <section id="found-item">
        <div class = "panels rounded p-3 shadow bg-white">
          <div class = "d-flex w-100 justify-content-between">
              <p class = "fw-semibold" >Found Items </p>
              <button id = "toAddFoundItem"   class="bg-transparent border-0">
                <span  class="fs-4 text-warning material-symbols-outlined ">
                  add
                </span>
              </button>
            </div>
            <div class="row">
              <div class="col-2  p-2">
                     <select id="foundItemsInputStatus" class="form-select h-100 w-100 rounded-0 contact-field">
  <option value="">All</option>
  <option value="1">Active</option>
  <option value="0">Inactive</option>
</select>


              </div>
                <div class="col-8  p-2">
                   <input  id = "foundItemsInputName" class="border  text-secondary contact-field rounded-0 h-100 w-100" type="text" placeholder="Search Item Name" aria-label="default input example">

                </div>
                  <div class="col-2  p-2">

                  <input id = "foundItemsInputDate" type="date" class="border text-secondary contact-field rounded-0 h-100 w-100">
                  
                  </div>
            </div>
            <div style = "height: 70vh; overflow-y: auto" class = "scrollable">
           
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="p-3 text-secondary">#</th>
                  <th scope="col" class="p-3 text-secondary">Owner</th>
                  <th scope="col" class="p-3 text-secondary">Email</th>
                  <th scope="col" class="p-3 text-secondary">Category</th>
                  <th scope="col" class="p-3 text-secondary">Item name</th>
                  <th scope="col" class="p-3 text-secondary">Type</th>
                  <th scope="col" class="p-3 text-secondary">Description</th>
                  <th scope="col" class="p-3 text-secondary">Location</th>
                  <th scope="col" class="p-3 text-secondary">Created At</th>
                   <th scope="col" class="p-3 text-secondary">Status</th>
                  <th scope="col" class="p-3 text-secondary">Action</th>
                </tr>
              </thead>
              <tbody id = "foundItemsBody" >
             
              </tbody>
            </table>
            
            
            
          </div>
          </div>
          
        </section>
        <section id="users">
          <div class = "panels rounded p-3 shadow bg-white">
          <div class = "d-flex w-100 justify-content-between">
              <p class = "fw-semibold" >Users</p>
              <button id = "toAddUser" class="bg-transparent border-0">
                <span  class="fs-4 text-warning material-symbols-outlined ">
                  add
                </span>
              </button>
            </div>
            <div class="row">
              <div class="col-2  p-2">
                <select id="usersInputRole" class="form-select h-100 w-100 rounded-0 contact-field">
  <option value="">All</option>
  <option value="user">User</option>
  <option value="admin">Admin</option>
</select>


              </div>
                <div class="col-8  p-2">
                   <input  id = "usersInputName" class="border  text-secondary contact-field rounded-0 h-100 w-100" type="text" placeholder="Search Name" aria-label="default input example">

                </div>
                  <div class="col-2  p-2">

                  <input id = "usersInputDate" type="date" class="border text-secondary contact-field rounded-0 h-100 w-100">
                  
                  </div>
            </div>

            <div style = "height: 70vh; overflow-y: auto" class = "scrollable">
           
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="p-3 text-secondary">#</th>
                  <th scope="col" class="p-3 text-secondary">Name</th>
                  <th scope="col" class="p-3 text-secondary">Email</th>
                  <th scope="col" class="p-3 text-secondary">Password</th>
                  <th scope="col" class="p-3 text-secondary">Authentication method</th>
                  <th scope="col" class="p-3 text-secondary">Role</th>
                  <th scope="col" class="p-3 text-secondary">Created At</th>
                  
                  <th scope="col" class="p-3 text-secondary">Action</th>
                </tr>
              </thead>
              <tbody id = "userBody" >
              
              </tbody>
            </table>
            
            
            
          </div>
          </div>
          
         
          
          
        </section>


        <section id="categories">
        <div class = "panels rounded p-3 shadow bg-white">
          <div class = "d-flex w-100 justify-content-between">
              <p class = "fw-semibold" >Categories </p>
              <button id = "toAddCategory" class="bg-transparent border-0">
                <span  class="fs-4 text-warning material-symbols-outlined ">
                  add
                </span>
              </button>
            </div>
            <div style = "height: 70vh; overflow-y: auto" class = "scrollable">
           
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="p-3 text-secondary">#</th>
                  <th scope="col" class="p-3 text-secondary">Name</th>
          
                  <th scope="col" class="p-3 text-secondary">Created At</th>
                  <th scope="col" class="p-3 text-secondary">Action</th>
                </tr>
              </thead>
              <tbody id = "categoryBody" >
              
              </tbody>
            </table>
            
            
            
          </div>
          </div>
          
         
          
          
        </section>
        <section id="reviews">
          <div class = "panels rounded p-3 shadow bg-white">
          <div class = "d-flex w-100 justify-content-start">
              <p class = "fw-semibold" >Cases</p>
             
            </div>
            <div style = "height: 70vh; overflow-y: auto" class = "scrollable">
           
            <table class="table">
             <thead>
  <tr>
    <th scope="col" class="p-3 text-secondary">#</th>
    <th scope="col" class="p-3 text-secondary">Owner Username</th>
    <th scope="col" class="p-3 text-secondary">Owner Item Name</th>
    <th scope="col" class="p-3 text-secondary">Proof Username</th>
    <th scope="col" class="p-3 text-secondary">Proof Item Name</th>
    <th scope="col" class="p-3 text-secondary">Meetup Location</th>
    <th scope="col" class="p-3 text-secondary">Meetup Date</th>
    <th scope="col" class="p-3 text-secondary">Status</th>
    <th scope="col" class="p-3 text-secondary">Created At</th>
  </tr>
</thead>

              <tbody id = "casesBody" >
             
              </tbody>
            </table>
            
            
            
          </div>
          </div>
        </section>


           <section id="history">
          <div class = "panels rounded p-3 shadow bg-white">
          <div class = "d-flex w-100 justify-content-start">
              <p class = "fw-semibold" >System Activity History</p>
             
            </div>
            <div style = "height: 70vh; overflow-y: auto" class = "scrollable">
           
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="p-3 text-secondary">#</th>
                  <th scope="col" class="p-3 text-secondary">Table</th>
                  <th scope="col" class="p-3 text-secondary">Action</th>
                  <th scope="col" class="p-3 text-secondary">Description</th>
                  <th scope="col" class="p-3 text-secondary">Date</th>
                 
                </tr>
              </thead>
              <tbody id = "historyBody" >
             
              </tbody>
            </table>
            
            
            
          </div>
          </div>
        </section>


      </div>
      <div class="col-3 p-3 ">
          <div class="activities panels shadow  bg-white p-3">
          <p class = "fw-semibold" >Recent activities</p>
          
          <div class="timeline">
            <div class="timeline-item">
                <p class = "text-secondary p-0 m-0" >16:00</p>
                <div class="circle"></div>
                <p class = "  m-0 p-0" >User posted an item in the lost page</p>
           
            </div>
            <div class="timeline-item">
            <p class = "text-secondary p-0 m-0" >16:00</p>
                <div class="circle"></div>
                <p class = " m-0 p-0" >User posted an item in the lost page</p>
           
            </div>
            <div class="timeline-item">
            <p class = "text-secondary p-0 m-0" >16:00</p>
                <div class="circle"></div>
                <p class = "  m-0 p-0" >User posted an item in the lost page</p>
           
           
            </div>
            <div class="timeline-item">
            <p class = "text-secondary p-0 m-0" >16:00</p>
                <div class="circle"></div>
                <p class = "  m-0 p-0" >User posted an item in the lost page</p>
           
            </div>
        </div>

           
          </div>
          <div class="col-12 mt-5  panels bg-white position-relative">
  <div class="position-relative" style="height: 300px; width: 100%;">
    <img src="res/asda.jpg" id = "coverPhoto" alt="Image" style="height: 100%; width: 100%; object-fit: cover;">
    
    <!-- Dark overlay -->
    <div style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
    
    <!-- Centered button -->
    <button 
      class="btn btn-warning  position-absolute top-50 start-50 translate-middle"
      style="opacity: 0.9;" id = "changeCoverBtn" >
      Change
    </button>
  </div>
</div>

<div class="text-center my-5">
  <button id = "configBtn"  class="btn btn-warning text-dark py-2 px-3">
    <i class="fas fa-gear me-2"></i> Change Schedule Config
  </button>
</div>
      </div>

    
      
    </div>
  </main>



  

  <!-- CREATE USER MODAL-->
  <div class="modal fade mt-3 " id="createUserModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-secondary">
            <div class="modal-header border-0 bg-light">
                <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createUserForm" class="modal-body px-5 pb-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 px-0 d-flex justify-content-start"> 
                            <h1 class="fs-3 text-dark mb-3">CUSTOM USER CREATION</h1>
                        </div>
                        <div id="imgPlaceholder" class="img-placeholder d-flex justify-content-center align-items-center w-100 rounded mb-3"
              style="background-color:rgb(238, 238, 238); height: 200px; background-size: cover; background-position: center;">
              <button style="z-index: 1000" id="uploadBtn" type="button" class="upload-btn m-5 btn btn-warning">Upload Image</button>
            </div>
            <p class="text-secondary text-center" style="font-size: 12px;">Uploading an image for profile icon is optional.</p>
            <input type="file" id="imgInput" accept="image/*" class="img-input" style="display: none;" />
                        <div class="d-flex gap-3 p-0">
                            <div>
                                <p class="mb-0">First Name</p>
                                <input id="firstNameCreate" required class="form-control mb-3" type="text"  aria-label=".form-control-sm example">
                            </div>
                            <div>
                                <p class="mb-0">Last Name</p>
                                <input id="lastNameCreate" required class="form-control mb-3" type="text"  aria-label=".form-control-sm example">
                            </div>
                        </div>
                        <p class="mb-0 p-0">Email</p>
                        <input id="emailCreate" required class="form-control mb-3" type="email"  aria-label=".form-control-sm example">
                        
                        <p class="mb-0 ms-0 p-0">Password</p>
                        <input id="passwordCreate" required class="form-control mb-2" type="password"  aria-label=".form-control-sm example">
                        
                        <!-- Authentication Method Dropdown -->
                        <div class="mb-3 p-0">
                            <label for="auth_method" class="form-label">Choose an Authentication Method</label>
                            <select name="auth_method" id="auth_method" class="form-select" required>
                                <option value="" disabled selected>Select an authentication method</option>
                                <option value="local">local</option>
                                <option value="facebook">facebook</option>
                                <option value="google">google</option>
                            </select>
                        
                        </div>

                        <!-- Role Selection Dropdown -->
                        <div class="mb-3 p-0">
                            <label for="role" class="form-label">Select Role</label>
                            <select name="role" id="role" class="form-select" required>
                                <option value="" disabled selected>Select a role</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                    
                        </div>

                        <button type="submit" id="createAccountBtn" class="btn mt-3 mb-5 btn-warning text-dark fw-semibold">Create Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- UPDATE USER MODAL-->
<div class="modal fade mt-5" id="updateUserModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-secondary">
            <div class="modal-header border-0 bg-light">
                <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateUserForm" class="modal-body px-5 py-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 px-0 d-flex justify-content-start"> 
                            <h1 class="fs-3 text-dark mt-0 p-0 mb-3">UPDATE USER DETAILS</h1>
                        </div>
                        <p class="mb-0 p-0">ID</p>
                        <input id="idUpdate" readonly  class="form-control mb-3" type="number" placeholder="ID" aria-label=".form-control-sm example">
                        <div id="imgPlaceholder" class="img-placeholder d-flex justify-content-center align-items-center w-100 rounded mb-3"
              style="background-color:rgb(238, 238, 238); height: 100px; background-size: cover; background-position: center;">
              <button style="z-index: 1000" id="uploadBtn1" type="button" class="upload-btn m-5 btn btn-warning">Upload Image</button>
            </div>
            <p class="text-secondary text-center" style="font-size: 12px;">Uploading an image for profile icon is optional.</p>
            <input type="file" id="imgInputUpdate" accept="image/*" class="img-input" style="display: none;" />

                        <div class="d-flex gap-3 p-0">
                            <div>
                                <p class="mb-0">First Name</p>
                                <input id="firstNameUpdate" required class="form-control mb-3" type="text" placeholder="First Name" aria-label=".form-control-sm example">
                            </div>
                            <div>
                                <p class="mb-0">Last Name</p>
                                <input id="lastNameUpdate" required class="form-control mb-3" type="text" placeholder="Last Name" aria-label=".form-control-sm example">
                            </div>
                        </div>
                        <p class="mb-0 p-0">Email</p>
                        <input id="emailUpdate" required class="form-control mb-3" type="email" placeholder="Email" aria-label=".form-control-sm example">
                        
                        <p class="mb-0 ms-0 p-0">Password</p>
                        <input id="passwordUpdate" class="form-control mb-2" required type="password" placeholder="Leave blank to keep the current password" aria-label=".form-control-sm example">
                        
                        <!-- Authentication Method Dropdown -->
                        <div class="mb-3 p-0">
                            <label for="auth_method" class="form-label">Authentication Method</label>
                            <select name="auth_method" id="auth_method_1" class="form-select" required>
                                <option value="" disabled>Select an authentication method</option>
                                <option value="local">Local</option>
                                <option value="facebook">Facebook</option>
                                <option value="google">Google</option>
                            </select>
                        </div>

                        <!-- Role Selection Dropdown -->
                        <div class="mb-3 p-0">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role_1" class="form-select" required>
                                <option value="" disabled>Select a role</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <button type="submit" id="updateAccountBtn" class="btn mt-3 mb-5 btn-warning text-dark fw-semibold">Update Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- DELETE USER MODAL --> 
 <div class="modal fade" id="deleteUserModal" aria-hidden="true" aria-labelledby="deleteUserModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-secondary">
            <div class="modal-header border-0 bg-light">
                <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteUserForm" class="modal-body px-4 py-3">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 px-0 d-flex justify-content-center">
                            <h1 class="fs-5 text-dark mb-3">Delete User Confirmation</h1>
                        </div>

                  
                        <div class="d-flex flex-column justify-content-center align-items-center gap-2 p-0">
                            <p class="mb-2">Are you sure you want to delete user ID: <span id="idDelete">?</span></p>
                            
                            <div class="d-flex  gap-3 align-items-center">
                                <button type="button" class="btn btn-secondary m-0 btn-sm" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" id="confirmDeleteBtn" class="btn m-0 btn-warning btn-sm">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- UPDATE CATEGORY MODAL -->
<div class="modal fade mt-5" id="updateCategoryModal" aria-hidden="true" aria-labelledby="updateCategoryLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateCategoryForm" class="modal-body px-5 py-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 px-0 d-flex justify-content-start"> 
              <h1 class="fs-3 text-dark mt-0 p-0 mb-3">UPDATE CATEGORY</h1>
            </div>

            <p class="mb-0">Category ID</p>
            <input id="categoryIdUpdate" readonly class="form-control mb-3" type="number" placeholder="ID">

            <p class="mb-0">Category Name</p>
            <input id="categoryNameUpdate" required class="form-control mb-3" type="text" placeholder="Category Name">

            <button type="submit" id="updateCategoryBtn" class="btn mt-3 mb-5 btn-warning text-dark fw-semibold">Update Category</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- DELETE CATEGORY MODAL --> 
<div class="modal fade" id="deleteCategoryModal" aria-hidden="true" aria-labelledby="deleteCategoryModalLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="deleteCategoryForm" class="modal-body px-4 py-3">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12 px-0 d-flex justify-content-center">
              <h1 class="fs-5 text-dark mb-3">Delete Category Confirmation</h1>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center gap-2 p-0">
              <p class="mb-2">Are you sure you want to delete category ID: <span id="categoryIdDelete">?</span></p>
              
              <div class="d-flex gap-3 align-items-center">
                <button type="button" class="btn btn-secondary m-0 btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" id="confirmDeleteCategoryBtn" class="btn m-0 btn-warning btn-sm">Delete</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- CREATE CATEGORY MODAL -->
<div class="modal fade mt-3" id="createCategoryModal" aria-hidden="true" aria-labelledby="createCategoryModalLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="createCategoryForm" class="modal-body px-5 pb-2">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 px-0 d-flex justify-content-start">
              <h1 class="fs-3 text-dark mb-3">CREATE NEW CATEGORY</h1>
            </div>

            <p class="mb-0">Category Name</p>
            <input id="categoryNameCreate" required class="form-control mb-3" type="text" placeholder="Enter category name" aria-label="Category Name">

            <button type="submit" id="createCategoryBtn" class="btn mt-3 mb-5 btn-warning text-dark fw-semibold">Create Category</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- UPDATE LOST ITEM MODAL -->
<div class="modal fade my-5" id="updateLostItemModal" tabindex="-1" aria-labelledby="updateLostItemModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body pb-5 px-5">
        <form id="lostItemFormUpdate">
          <div class="container-fluid">
            <h1 class="fs-3 text-dark mb-4 text-center">UPDATE LOST ITEM</h1>

            <div class="row">
              <!-- Left: Image Section -->
              <div class="col-md-5 d-flex flex-column align-items-center mb-4 mb-md-0">
                <div id="imgPlaceholderLost" class="w-100 rounded mb-3"
                  style="background-color:rgb(238, 238, 238); height: 250px; background-size: cover; background-position: center;">
                </div>
                <button id="changeUpdateLost" type="button" class="btn btn-warning">Change Image</button>
                <input type="file" id="imgInputLost" accept="image/*" style="display: none;" />
              </div>

              <!-- Right: Form Fields -->
              <div class="col-md-7">
                <div class="mb-3">
                  <label class="form-label mb-0">ID</label>
                  <input id="idLostUpdate" readonly class="form-control" type="number" placeholder="ID">
                </div>

                <div class="mb-3">
                  <label class="form-label mb-0">Item Name</label>
                  <input id="nameLostUpdate" class="form-control" type="text" required>
                </div>

                <div class="mb-3">
                  <label class="form-label mb-0">Description</label>
                  <input maxLength="100" id="descriptionLost" class="form-control" type="text" required>
                </div>

                <div class="mb-3">
                  <label class="form-label mb-0">Location</label>
                  <input id="locationLostUpdate" class="form-control" type="text" required>
                </div>

                <div class="mb-3">
                  <label for="statusLostUpdate" class="form-label mb-0">Status</label>
                  <select name="role" id="statusLostUpdate" class="form-select" required>
                    <option value="" disabled selected>Select status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>

                <div class="mb-4">
                  <label class="form-label mb-0">Category</label>
                  <select name="categoryLost" id="categoryLostUpdate" class="form-select" required>
                    <option value="" disabled selected>Select a category</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="d-grid">
              <button type="submit" class="fw-semibold btn btn-warning">Update Item</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- DELETE LOST ITEM -->
<div class="modal fade" id="deleteLostItemModal" aria-hidden="true" aria-labelledby="deleteLostItemModalLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <h5 class="modal-title d-none" id="deleteLostItemModalLabel">Delete Lost Item</h5>
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="deleteLostItemForm" class="modal-body px-4 py-3">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12 px-0 d-flex justify-content-center">
              <h1 class="fs-5 text-dark mb-3">Delete Lost Item Confirmation</h1>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center gap-2 p-0">
              <p class="mb-2">
                Are you sure you want to delete lost item ID: 
                <span id="lostItemIdDelete" class="fw-bold text-danger">?</span>
              </p>
              
              <div class="d-flex gap-3 align-items-center">
                <button type="button" class="btn btn-secondary m-0 btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" id="confirmDeleteLostItemBtn" class="btn btn-warning m-0 btn-sm">Delete</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


  <!-- CREATE LOST ITEM -->
  <div class="modal fade" id="createLostItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog mt-5  modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body pb-4 px-5">
        <form id = "lostItemForm" >
          <div class="container-fluid">
            <h1 class="fs-5 text-dark mb-3 text-center">CUSTOM LOST ITEM CREATION</h1>

            <div id="imgPlaceholder" class="img-placeholder d-flex justify-content-center align-items-center w-100 rounded mb-3"
              style="background-color:rgb(238, 238, 238); height: 200px; background-size: cover; background-position: center;">
              <button style="z-index: 1000" id="uploadBtn3" type="button" class="upload-btn m-5 btn btn-warning">Upload Image</button>
            </div>
            <input type="file" id="imgInputLostAdd" accept="image/*" class="img-input" style="display: none;" />

            <p class="text-secondary text-center" style="font-size: 12px;">Uploading an image is optional but recommended for better identification.</p>
            <p class="mb-0 p-0">Owner ID</p>
            <input id = "ownerIdLostAdd" class="form-control mb-3" type="number" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Item Name</p>
            <input id = "nameLostAdd" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Description</p>
            <input maxLength = "100" id = "descriptionLostAdd" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Location</p>
            <input id = "locationLostAdd" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Category</p>
<select name="categoryLost" id="categoryLostAdd" class="form-select mb-5" required>
  <option value="" disabled selected>Select a category</option>
</select>

            <button type="submit" class="fw-semibold btn btn-warning text-center mx-auto w-100">Add lost item</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- UPDATE FOUND ITEM MODAL -->
<div class="modal fade my-5" id="updateFoundItemModal" tabindex="-1" aria-labelledby="updateFoundItemModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body pb-5 px-5">
        <form id="foundItemFormUpdate">
          <div class="container-fluid">
            <h1 class="fs-3 text-dark mb-4 text-center">UPDATE FOUND ITEM</h1>

            <div class="row">
              <!-- Left: Image -->
              <div class="col-md-5 d-flex flex-column align-items-center mb-4 mb-md-0">
                <div id="imgPlaceholderFound" class="w-100 rounded mb-3"
                  style="background-color:rgb(238, 238, 238); height: 250px; background-size: cover; background-position: center;">
                </div>
                <button id="changeUpdateFound" type="button" class="btn btn-warning">Change Image</button>
                <input type="file" id="imgInputFound" accept="image/*" style="display: none;" />
              </div>

              <!-- Right: Fields -->
              <div class="col-md-7">
                <div class="mb-3">
                  <label class="form-label mb-0">ID</label>
                  <input id="idFoundUpdate" readonly class="form-control" type="number" placeholder="ID">
                </div>

                <div class="mb-3">
                  <label class="form-label mb-0">Item Name</label>
                  <input id="nameFoundUpdate" class="form-control" type="text" required>
                </div>

                <div class="mb-3">
                  <label class="form-label mb-0">Description</label>
                  <input maxLength="100" id="descriptionFound" class="form-control" type="text" required>
                </div>

                <div class="mb-3">
                  <label class="form-label mb-0">Location</label>
                  <input id="locationFoundUpdate" class="form-control" type="text" required>
                </div>

                <div class="mb-3">
                  <label for="statusFoundUpdate" class="form-label mb-0">Status</label>
                  <select name="role" id="statusFoundUpdate" class="form-select" required>
                    <option value="" disabled selected>Select status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>

                <div class="mb-4">
                  <label class="form-label mb-0">Category</label>
                  <select name="categoryFound" id="categoryFoundUpdate" class="form-select" required>
                    <option value="" disabled selected>Select a category</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="d-grid">
              <button type="submit" class="fw-semibold btn btn-warning">Update Item</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- DELETE FOUND ITEM -->
<div class="modal fade" id="deleteFoundItemModal" aria-hidden="true" aria-labelledby="deleteFoundItemModalLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <h5 class="modal-title d-none" id="deleteFoundItemModalLabel">Delete Found Item</h5>
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="deleteFoundItemForm" class="modal-body px-4 py-3">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12 px-0 d-flex justify-content-center">
              <h1 class="fs-5 text-dark mb-3">Delete Found Item Confirmation</h1>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center gap-2 p-0">
              <p class="mb-2">
                Are you sure you want to delete found item ID: 
                <span id="foundItemIdDelete" class="fw-bold text-danger">?</span>
              </p>
              
              <div class="d-flex gap-3 align-items-center">
                <button type="button" class="btn btn-secondary m-0 btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" id="confirmDeleteFoundItemBtn" class="btn btn-warning m-0 btn-sm">Delete</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



  <!-- CREATE FOUND ITEM -->
  <div class="modal fade" id="createFoundItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog mt-5  modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body pb-4 px-5">
        <form id = "foundItemForm" >
          <div class="container-fluid">
            <h1 class="fs-5 text-dark mb-3 text-center">CUSTOM FOUND ITEM CREATION</h1>

            <div id="imgPlaceholder" class="img-placeholder d-flex justify-content-center align-items-center w-100 rounded mb-3"
              style="background-color:rgb(238, 238, 238); height: 200px; background-size: cover; background-position: center;">
              <button style="z-index: 1000" id="uploadBtn4" type="button" class="upload-btn m-5 btn btn-warning">Upload Image</button>
            </div>
            <input type="file" id="imgInputFoundAdd" accept="image/*" class="img-input" style="display: none;" />

            <p class="text-secondary text-center" style="font-size: 12px;">Uploading an image is optional but recommended for better identification.</p>
            <p class="mb-0 p-0">Owner ID</p>
            <input id = "ownerIdFoundAdd" class="form-control mb-3" type="number" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Item Name</p>
            <input id = "nameFoundAdd" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Description</p>
            <input maxLength = "100" id = "descriptionFoundAdd" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Location</p>
            <input id = "locationFoundAdd" class="form-control mb-3" type="text" required placeholder="" aria-label=".form-control-sm example">

            <p class="mb-0 p-0">Category</p>
<select name="categoryFound" id="categoryFoundAdd" class="form-select mb-5" required>
  <option value="" disabled selected>Select a category</option>
</select>

            <button type="submit" class="fw-semibold btn btn-warning text-center mx-auto w-100">Add found item</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





<!-- CONFIG MODAL -->
<div class="modal fade" id="configModal" aria-hidden="true" aria-labelledby="configModalLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-secondary">
      <div class="modal-header border-0 bg-light">
        <h5 class="modal-title text-dark" id="configModalLabel">Update Schedule Config</h5>
        <button type="button" class="btn-close custom-color" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateConfigForm" class="modal-body px-4 py-3">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12 px-0 d-flex justify-content-center">
              <h1 class="fs-5 text-dark mb-3">Change Config Settings</h1>
            </div>

            <div class="mb-3">
              <label for="configLocation" class="form-label text-dark">Location</label>
              <input type="text" class="form-control" id="configLocation" name="config_location" required>
            </div>

            <div class="mb-3">
         <label for="configInterval" class="form-label text-dark">Interval (in hours)</label>

              <input type="number" class="form-control" id="configInterval" name="config_interval" min="1" required>
            </div>

            <div class="d-flex gap-3 justify-content-center align-items-center mt-3">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" id="saveConfigBtn" class="btn btn-warning btn-sm">Save Changes</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <script src="https://kit.fontawesome.com/a963584a34.js" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  <script src="assets/script/admin.js"></script>
</body>
</html>
