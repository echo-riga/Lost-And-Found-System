
//USER INTERFACE STUFFSS
function isLoggedIn() {
  return sessionStorage.getItem('isLoggedIn') == 'true';
}

let warningModal ;
let lostItemModal;
let foundItemModal;
let imgUrlTemp;
document.getElementById('toAdminForm').addEventListener('submit', function(event) {
  event.preventDefault();  // Prevent form submission
  window.location.href = "admin.php";  // Redirect to admin.php
});



// Call this function on page load or when needed
 displayLostItemsCount('getLostItemsCount', 'Lost');
 displayLostItemsCount('getFoundItemsCount', 'Found');
async function populateCategorySelects() {
  try {
    const response = await fetch('/system/api/getCategories.php');
    const data = await response.json();

    if (data.success && Array.isArray(data.categories)) {
      const lostSelect = document.getElementById('categoryLost');
      const foundSelect = document.getElementById('categoryFound');
      const foundSelect2 = document.getElementById('categoryFound2');
      const lostSelect2 = document.getElementById('categoryLost2'); // New select

      const defaultOption = '<option value="" disabled selected>Select a category</option>';
      lostSelect.innerHTML = defaultOption;
      foundSelect.innerHTML = defaultOption;
      foundSelect2.innerHTML = defaultOption;
      lostSelect2.innerHTML = defaultOption;

      data.categories.slice(1).forEach(category => {
        const option = document.createElement('option');
        option.value = category.category_id;
        option.textContent = category.name;

        lostSelect.appendChild(option.cloneNode(true));
        foundSelect.appendChild(option.cloneNode(true));
        foundSelect2.appendChild(option.cloneNode(true));
        lostSelect2.appendChild(option); // Final use of the node
      });

      lostSelect.addEventListener('change', () => {
        console.log('Lost category selected ID:', lostSelect.value);
      });

      foundSelect.addEventListener('change', () => {
        console.log('Found category selected ID:', foundSelect.value);
      });

      foundSelect2.addEventListener('change', () => {
        console.log('Found category 2 selected ID:', foundSelect2.value);
      });

      lostSelect2.addEventListener('change', () => {
        console.log('Lost category 2 selected ID:', lostSelect2.value);
      });
    } else {
      console.error('No categories returned.');
    }
  } catch (error) {
    console.error('Error loading categories:', error);
  }
}

populateCategorySelects();



let itemModal; 
let toAdminModal;
let foundItemModal2;
let lostItemModal2;
let openRequestModal;

document.addEventListener('DOMContentLoaded', function(){
  warningModal = new bootstrap.Modal(document.getElementById('warningModal'));
  lostItemModal = new bootstrap.Modal(document.getElementById('lostItemModal'));
  foundItemModal = new bootstrap.Modal(document.getElementById('foundItemModal'));
   itemModal = new bootstrap.Modal(document.getElementById('itemModal'));
    toAdminModal = new bootstrap.Modal(document.getElementById('toAdminModal'));

  foundItemModal2 = new bootstrap.Modal(document.getElementById('foundItemModal2'));
    lostItemModal2 = new bootstrap.Modal(document.getElementById('lostItemModal2'));

     openRequestModal = new bootstrap.Modal(document.getElementById('openRequestModal'));

  const isLoggedIn = sessionStorage.getItem('isLoggedIn') === 'true';
  const user = JSON.parse(sessionStorage.getItem('user'));

  if (isLoggedIn && user) {

initializeAccount() 
      const userRole = user.role;
       if (userRole == 'admin'){
 toAdminModal.show();
       }
  }

const paginationLinks = document.querySelectorAll(".pagination .page-link");

const sections = {
  "Waiting For Their Responses": "myRequests",
  "Pending My Review": "theirRequests",
  "Accepted Matches": "acceptedMatches"
};

// Initial setup: show "myRequests", hide others, set correct active tab
window.addEventListener("load", () => {
  paginationLinks.forEach(link => {
    const isMatch = link.textContent.trim() === "Waiting For Their Responses";
    link.parentElement.classList.toggle("active", isMatch);
  });

  Object.values(sections).forEach(id => {
    const panel = document.querySelector(`#${id} .panels`);
    if (panel) panel.classList.toggle("d-none", id !== "myRequests");
  });

  // Load initial data
  loadMyRequests();
});

// Handle tab switching
paginationLinks.forEach(link => {
  link.addEventListener("click", function (e) {
    e.preventDefault();

    paginationLinks.forEach(l => l.parentElement.classList.remove("active"));
    this.parentElement.classList.add("active");

    const sectionId = sections[this.textContent.trim()];

    Object.values(sections).forEach(id => {
      const panel = document.querySelector(`#${id} .panels`);
      if (panel) panel.classList.toggle("d-none", id !== sectionId);
    });

    // Load relevant data
    if (sectionId === "myRequests") {
      loadMyRequests();
    } else if (sectionId === "theirRequests") {
      loadTheirRequests();
    } else if (sectionId === "acceptedMatches") {
      loadAcceptedMatches(); // If you have this function
    }
  });
});

});

document.querySelectorAll('.upload-btn').forEach((btn, index) => {
  const placeholder = btn.closest('.img-placeholder');
  const input = document.querySelectorAll('.img-input')[index];

  btn.addEventListener('click', () => {
    input.click();
  });

  input.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      const imageUrl = URL.createObjectURL(file);
      placeholder.style.backgroundImage = `url(${imageUrl})`;
       imgUrlTemp = `/system/res/(${imageUrl}`
      btn.style.display = 'none';
    }
  });
});
document.getElementById('openLostItemForm').addEventListener('click', function () {
  if (!isLoggedIn()) {
    warningModal.show();
    return;
  }

  // For Lost Item Form, reset the image placeholder and button
  const modal = document.getElementById('lostItemModal');
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');
  
  imgInput.value = ''; // Clear the file input
  imgPlaceholder.style.backgroundImage = 'none'; // Remove background image
  uploadBtn.style.display = 'block'; // Show button again

  lostItemModal.show();
});

document.getElementById('openFoundItemForm').addEventListener('click', function () {
  if (!isLoggedIn()) {
    warningModal.show();
    return;
  }

  // For Found Item Form, reset the image placeholder and button
  const modal = document.getElementById('foundItemModal');
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');

  imgInput.value = ''; // Clear the file input
  imgPlaceholder.style.backgroundImage = 'none'; // Remove background image
  uploadBtn.style.display = 'block'; // Show button again

  foundItemModal.show();
});


const toggle = document.getElementById('darkModeToggle');
const navbar = document.getElementById('navbar');
   
    toggle.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
      const icon = toggle.querySelector('.icon');
      if (document.body.classList.contains('dark-mode')) {
        icon.classList.remove('moon-icon');
        icon.classList.add('sun-icon');
        icon.textContent = '☀';  
      } else {
        icon.classList.remove('sun-icon');
        icon.classList.add('moon-icon');
        icon.textContent = '🌙';  
      }
    });
    

    window.addEventListener('scroll', () => {

      navbar.classList.toggle('navbar-off', window.scrollY >= 250);
      
    });


const landingSection = document.getElementById('landing');
const itemsSection = document.getElementById('items');

function twoPanelTransition(panel1, panel2, button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();

        // Check if panel2 is already visible, if so, do nothing
        if (panel2.style.display === 'block') {
            return; 
        }

        panel1.classList.add('fadeOut');

        setTimeout(() => {
            // Hide panel1
            panel1.style.display = 'none';
            panel1.classList.remove('fadeOut');

            // Show panel2
            panel2.style.display = 'block';
            panel2.classList.add('fadeIn');

            setTimeout(() => {
                panel2.classList.remove('fadeIn');
            }, 400); 
        }, 400); 
    });
}

// Selecting all buttons with class 'toItems'
const toItemsButtons = document.querySelectorAll('.toItems');

toItemsButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
         fetchAndDisplayItems();
        twoPanelTransition(landingSection, itemsSection, this);
    });
});

const nonItemLinks = document.querySelectorAll('a[href^="#"]:not(.toItems)'); 

nonItemLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); 
         fetchAndDisplayItems();
        twoPanelTransition(itemsSection, landingSection, this); 
    });
});

function scrollToSection() {
    const links = document.querySelectorAll('a[href^="#"]'); 
    
    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); 
            
            const targetId = this.getAttribute('href').substring(1); 
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 50, 
                    behavior: 'smooth' 
                });
            }
        });
    });
}

scrollToSection();

  function switchModal(fromId, toId) {
    const fromModalEl = document.getElementById(fromId);
    const toModalEl = document.getElementById(toId);

    const fromModal = bootstrap.Modal.getInstance(fromModalEl) || new bootstrap.Modal(fromModalEl);
    const toModal = bootstrap.Modal.getInstance(toModalEl) || new bootstrap.Modal(toModalEl);

    fromModal.hide();
    fromModalEl.addEventListener('hidden.bs.modal', () => {
      toModal.show();
    }, { once: true });
  }

  document.getElementById('toSignup').addEventListener('click', function (e) {
    e.preventDefault();
    switchModal('signinModal', 'signupModal');
  });
  document.getElementById('toSignin').addEventListener('click', function (e) {
    e.preventDefault();
    switchModal('signupModal', 'signinModal');
  });
  document.getElementById('openSignin').addEventListener('click', function (e) {
    e.preventDefault();
    new bootstrap.Modal(document.getElementById('signinModal')).show();

  });


document.getElementById('toOepnRequestModal').addEventListener('click', function (e) {
    e.preventDefault();

    openRequestModal.show();
});

// Handle the openSignin1 button click
document.getElementById('openSignin1').addEventListener('click', function (e) {
    e.preventDefault();

    // Hide the warning modal
    warningModal.hide();

    // Show the signin modal
    let signinModal = new bootstrap.Modal(document.getElementById('signinModal'));
    signinModal.show();
});





 

  //GOOGLE FB AUTH STUFFS

  import { signInWithGoogle, signInWithFacebook } from '../../modules/auth.js';
  

  //SIGN UP
  const googleBtns = document.querySelectorAll('.googleBtnSignup');
  const facebookBtns = document.querySelectorAll('.facebookBtnSignup');
  googleBtns.forEach(button => {
    button.addEventListener('click', async function () {
      try {
        const userData = await signInWithGoogle();  
        if (userData) {
          console.log(userData);  
  
          const formData = {
            name: userData.displayName,
            email: userData.email,
            img_url: userData.photoURL  // ✅ Include image URL
          };
          console.log('Form Data:', formData);
          
          const response = await fetch('/system/api/googleSignup.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData)
          });
  
          const result = await response.json();
  
          if (result.success) {
            alert('Account creation successful!');
          } else {
            alert('Account is already registered!');
          }
        } else {
          alert('Google Sign-in failed');
        }
      } catch (error) {
        console.error(error);
        alert('An error occurred during Google signup');
      }
    });
  });
  

  
  facebookBtns.forEach(button => {
    button.addEventListener('click', async function () {
      try {
        const userData = await signInWithFacebook(); // should return user object like { name, email, photoURL }
  
        if (userData) {
          console.log(userData);
  
          const formData = {
            name: userData.name,
            email: userData.email,
            img_url: userData.photoURL
          };
          console.log('Form Data:', formData);
  
          const response = await fetch('/system/api/facebookSignup.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData)
          });
  
          const result = await response.json();
  
          if (result.success) {
            alert('Account creation successful!');
          } else {
            alert('Account is already registered!');
          }
        } else {
          alert('Facebook Sign-in failed');
        }
      } catch (error) {
        console.error(error);
        alert('An error occurred during Facebook signup');
      }
    });
  });
  
  
// SIGN IN
const googleSignInBtns = document.querySelectorAll('.googleBtnSignin');
const facebookSignInBtns = document.querySelectorAll('.facebookBtnSignin');
// Assuming signInWithGoogle() is the function that handles Google sign-in and returns the user data.
googleSignInBtns.forEach(button => {
  button.addEventListener('click', async function () {
    try {
      const userData = await signInWithGoogle();  
      if (userData) {
        console.log(userData);  

        const formData = {
          email: userData.email
        };

        const response = await fetch('/system/api/googleSignin.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(formData)
        });

        // Parse the response once
        const result = await response.json();

        console.log("Parsed result:", result); // Check if the result is what you expect

        if (result.success) {
          sessionStorage.setItem("user", JSON.stringify(result.user));
          sessionStorage.setItem('isLoggedIn', 'true');
          

          alert("Login successful!");

          // Initialize the account with the user's data and set default image if img_url is null
          const profileUrl = result.user.img_url || '/system/res/default.png';
          initializeAccount() ;
        } else {
          alert('Account does not exists!');
        }
      } else {
        alert('Google Sign-in failed');
      }
    } catch (error) {
      console.error("Error during Google Sign-in:", error);
      alert('An error occurred during Google sign-in');
    }
  });
});
facebookSignInBtns.forEach(button => {
  button.addEventListener('click', async function () {
    try {
      const userData = await signInWithFacebook();
      if (userData) {
        console.log(userData);

        const formData = {
          email: userData.email
        };

        const response = await fetch('/system/api/facebookSignin.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(formData)
        });

        const result = await response.json();
        console.log("Parsed result:", result);

        if (result.success) {
          sessionStorage.setItem("user", JSON.stringify(result.user));
          sessionStorage.setItem('isLoggedIn', 'true');

          const profileUrl = result.user.img_url || '/system/res/default.png';
         initializeAccount() ;
          alert("Login successful!");
        } else {
          alert('Account does not exists!');
        }
      } else {
        alert('Facebook Sign-in failed');
      }
    } catch (error) {
      console.error("Error during Facebook Sign-in:", error); 
      alert('An error occurred during Facebook sign-in');
    }
  });
});





// LOCAL AUTH STUFFS

function initializeAccount() {
  const storedUser = sessionStorage.getItem("user");

  if (!storedUser) return;

  const user = JSON.parse(storedUser);
  const profileName = user.name;
  const profileUrl = user.img_url;

  document.getElementById('openSignin').style.display = 'none';
  document.getElementById('userDiv').classList.add('d-flex');

  const userName = document.getElementById('userName');
  const userIcon = document.getElementById('userIcon');

  userName.style.display = 'block';
  userIcon.style.display = 'block';

  userName.textContent = profileName;
  userIcon.src = profileUrl ? profileUrl : '/system/res/default.png';
}

function logOut() {
  
  // Remove the stored user data and set isLoggedIn to false
  sessionStorage.removeItem('user');
  sessionStorage.setItem('isLoggedIn', 'false');

  // Revert the changes made by initializeAccount
  document.getElementById('openSignin').style.display = 'inline-block';
  document.getElementById('userDiv').classList.remove('d-flex');

  const userName = document.getElementById('userName');
  const userIcon = document.getElementById('userIcon');

  userName.style.display = 'none';
  userIcon.style.display = 'none';

  // Optionally reset the content
  userName.textContent = '';
  userIcon.src = '/system/res/default.png';
}
document.getElementById('logoutBtn').addEventListener('click', logOut);


//SIGN IN
 let profileUrl;

document.getElementById('signinForm').addEventListener('submit', async (event) => {
  event.preventDefault();

  const email = document.getElementById('emailSignin').value.trim();
  const password = document.getElementById('passwordSignin').value;

  const requestData = { email, password };

  try {
    const response = await fetch('/system/api/localLogin.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(requestData)
    });

    const result = await response.json();


    if (result.success) {
      sessionStorage.setItem("user", JSON.stringify(result.user));
      sessionStorage.setItem('isLoggedIn', 'true');
      const userRole = result.user.role;
console.log(userRole);  // This will print the role, like 'admin' or 'user'

      alert("Login successful!");

      // Initialize the account with the user's data and set default image if img_url is null
       initializeAccount() 


    } else {
      alert(result.message || "Invalid credentials.");
    }
  } catch (error) {
    console.error("Error:", error);
    alert("Unexpected error occurred.");
  }

  document.getElementById('signinForm').reset();
  
});


//SIGNUP


document.getElementById('signupForm').addEventListener('submit', async (event) => {
  event.preventDefault();

  const firstName = document.getElementById('firstNameSignup').value.trim();
  const lastName = document.getElementById('lastNameSignup').value.trim();
  const email = document.getElementById('emailSignup').value.trim();
  const password = document.getElementById('passwordSignup').value;
  const confirmPassword = document.getElementById('confirmPassword').value;

  const name = `${firstName} ${lastName}`;

  if (password !== confirmPassword) {
    alert("Passwords do not match");
    return;
  }

  const requestData = { name, email, password };

  try {
    const response = await fetch('/system/api/localSignup.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(requestData)
    });

    // Directly parse the JSON response
    const result = await response.json();

    if (result.success) {
      alert("Registration successful!");
    } else {
      alert("Email already registered.");
    }
  } catch (error) {
    console.error("Error:", error);
    alert("Unexpected error occurred.");
  }

  document.getElementById('signupForm').reset();
});


//POSTING OF LOST

document.getElementById("lostItemForm").addEventListener("submit", async function(event) {
  event.preventDefault();

  /// Collect form data
const itemName = document.getElementById("nameLost").value;
const itemDescription = document.getElementById("descriptionLost").value;
const itemLocation = document.getElementById("locationLost").value;
const categoryLost = document.getElementById("categoryLost").value;
const imageFile = document.getElementById("imgInputLost").files[0];

console.log("Image file selected:", imageFile);

// Set a default image URL
let imageUrl = '/system/res/default.png';
document.body.classList.add('loading');

// If an image file is provided, upload it to Cloudinary
if (imageFile) {
  const formData = new FormData();
  formData.append('file', imageFile); // Send the raw file
  formData.append('upload_preset', 'upload1234'); // Replace with your actual upload preset

  try {
    const imgResponse = await fetch("https://api.cloudinary.com/v1_1/dgxwpb4b1/image/upload", {
      method: 'POST',
      body: formData
    });

    const imgResult = await imgResponse.json();
    if (imgResult.secure_url) {
      imageUrl = imgResult.secure_url;
      console.log("Image uploaded URL:", imageUrl);
    } else {
      console.warn('Cloudinary response:', imgResult);
      alert('Image upload failed. Using default image.');
    }
  } catch (error) {
    console.error('Image upload error:', error);
    alert('Error uploading image. Using default image.');
  }
}

  // Retrieve user ID from sessionStorage
  const storedUser = JSON.parse(sessionStorage.getItem("user"));
  const userId = storedUser ? storedUser.user_id : null;
  if (!userId) {
    alert('User ID is not available.');
    return;
  }

  // Prepare item data object
  const itemData = {
    name: itemName,
    description: itemDescription,
    location: itemLocation,
    category: categoryLost,
    img_url: imageUrl,
    user_id: userId
  };

  // Submit item data to backend
  try {
    const response = await fetch('/system/api/createLostItem.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(itemData)
    });

    const responseText = await response.text();
    console.log('Response Text:', responseText);

    let result;
    try {
      result = JSON.parse(responseText);
    } catch (jsonError) {
      console.error('Failed to parse JSON:', jsonError);
      alert('Error: Response is not valid JSON');
      return;
    }

    if (result.success) {
      alert('Lost item posted successfully!');
    } else {
      alert('Failed to post item: ' + (result.message || 'Unknown error'));
    }
  } catch (error) {
    console.error('Error posting item:', error);
    alert('An error occurred while posting the lost item.');
  }

  // Reset the form after submission
  const modal = document.getElementById('lostItemModal');
  document.getElementById("lostItemForm").reset();
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');

  imgInput.value = '';
  imgPlaceholder.style.backgroundImage = 'none';
  uploadBtn.style.display = 'block';
  document.body.classList.remove('loading');

});


//POSTING OF FOUND
document.getElementById("foundItemForm").addEventListener("submit", async function(event) {
  event.preventDefault();
// Collect form data
const itemName = document.getElementById("nameFound").value;
const itemDescription = document.getElementById("descriptionFound").value;
const itemLocation = document.getElementById("locationFound").value;
const categoryFound = document.getElementById("categoryFound").value;
const imageFile = document.getElementById("imgInputFound").files[0];
console.log("Image file selected:", imageFile);

// Set a default image URL
let imageUrl = '/system/res/default.png';
document.body.classList.add('loading');

// If an image file is provided, upload it to Cloudinary
if (imageFile) {
  const formData = new FormData();
  formData.append('file', imageFile); // Attach file directly
  formData.append('upload_preset', 'upload1234'); // Replace with your unsigned preset

  try {
    const imgResponse = await fetch("https://api.cloudinary.com/v1_1/dgxwpb4b1/image/upload", {
      method: 'POST',
      body: formData
    });

    const imgResult = await imgResponse.json();
    if (imgResult.secure_url) {
      imageUrl = imgResult.secure_url;
      console.log("Image uploaded URL:", imageUrl);
    } else {
      console.warn('Cloudinary response:', imgResult);
      alert('Image upload failed. Using default image.');
    }
  } catch (error) {
    console.error('Image upload error:', error);
    alert('Error uploading image. Using default image.');
  }
}


  // Retrieve user ID from sessionStorage
  const storedUser = JSON.parse(sessionStorage.getItem("user"));
  const userId = storedUser ? storedUser.user_id : null;
  if (!userId) {
    alert('User ID is not available.');
    return;
  }

  // Prepare item data object for found item
  const itemData = {
    name: itemName,
    description: itemDescription,
    location: itemLocation,
    category: categoryFound,
    img_url: imageUrl,
    user_id: userId
  };

  // Submit item data to backend for found item
  try {
    const response = await fetch('/system/api/createFoundItem.php', {  // Changed API endpoint for found item
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(itemData)
    });

    const responseText = await response.text();
    console.log('Response Text:', responseText);

    let result;
    try {
      result = JSON.parse(responseText);
    } catch (jsonError) {
      console.error('Failed to parse JSON:', jsonError);
      alert('Error: Response is not valid JSON');
      return;
    }

    if (result.success) {
      alert('Found item posted successfully!');
    } else {
      alert('Failed to post item: ' + (result.message || 'Unknown error'));
    }
  } catch (error) {
    console.error('Error posting item:', error);
    alert('An error occurred while posting the found item.');
  }

  // Reset the form after submission
  const modal = document.getElementById('foundItemModal');
  document.getElementById("foundItemForm").reset();
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');

  imgInput.value = '';
  imgPlaceholder.style.backgroundImage = 'none';
  uploadBtn.style.display = 'block';
  document.body.classList.remove('loading');

});





//BACKEND ITEMS
// Global variables for type and category
let globalType = 'lost';
let globalCategoryId = 1;  // Default category "All" is set to ID 1 (integer)
let globalName = null;
let globalDate = null;
fetchAndDisplayItems();


document.getElementById('searchItemNameInput').addEventListener('input', () => {
  globalName = document.getElementById('searchItemNameInput').value.trim();
  fetchAndDisplayItems();
});

document.getElementById('searchItemNameDate').addEventListener('input', () => {
  globalDate = document.getElementById('searchItemNameDate').value;
  fetchAndDisplayItems();
});
async function fetchAndDisplayItems() {
  try {
    const response = await fetch('/system/api/getItemsByCategoryType.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        type: globalType.trim(),
        category_id: globalCategoryId,
        name: globalName || '',
        date: globalDate || ''  // added globalDate here
      })
    });

    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
    const result = await response.json();
    const itemsRow = document.getElementById('items-row');
    itemsRow.innerHTML = '';

    if (result.success && Array.isArray(result.data)) {
      result.data.forEach(item => {
        const card = document.createElement('div');
        card.className = 'col-md-3 mb-4';
        card.dataset.item = JSON.stringify(item);

        const buttonLabel = item.type === 'lost' ? 'I found this' : 'This is mine';

        card.innerHTML = `
          <div class="card shadow-sm border-0" style="cursor: pointer; width: 300px; height: 450px; display: flex; flex-direction: column;">
            <img src="${item.item_img_url || '/system/res/oppresor.png'}"
                 class="card-img-top"
                 style="width: 100%; height: 200px; object-fit: cover;"
                 alt="Item image">
            <div class="card-body d-flex flex-column justify-content-between" style="flex-grow: 1; overflow: hidden;">
              <h5 class="card-title" style="font-size: 16px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                ${item.name || 'Untitled'}
              </h5>
              <p class="card-text mb-1" style="font-size: 14px;"><strong>Location:</strong> ${item.location || 'Unknown'}</p>
              <p class="card-text" style="font-size: 14px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                ${item.description || 'No description provided.'}
              </p>
              <button class="btn btn-sm bg-warning text-dark fw-semibold w-50 mt-auto action-button" data-item='${JSON.stringify(item)}'>
                ${buttonLabel}
              </button>
            </div>
          </div>
        `;

        card.querySelector('.card').addEventListener('click', (e) => {
          if (e.target.classList.contains('action-button')) return;
          const itemData = JSON.parse(card.dataset.item);
          showItemDetailsModal(itemData);
        });

        card.querySelector('.action-button').addEventListener('click', (e) => {
          e.stopPropagation();
          const itemData = JSON.parse(e.target.dataset.item);
          if (itemData.type === 'lost') {
            handleIFoundThis(itemData);
          } else {
            handleThisIsMine(itemData);
          }
        });

        itemsRow.appendChild(card);
      });
    } else {
      itemsRow.innerHTML = `<div class="col-12"><p class="text-center">No items found.</p></div>`;
    }
  } catch (error) {
    console.error('Error fetching and displaying items:', error);
  }
}


const lostBtn = document.getElementById('lostType');
const foundBtn = document.getElementById('foundType');

async function displayLostItemsCount(url, type) {
  try {
    const response = await fetch(`/system/api/${url}.php`);
    const data = await response.json();

    const countElement = document.getElementById('lostItemsCount');
    countElement.textContent = `${data.count} ${type} items posted`;
  } catch (err) {
    console.error("Failed to load lost items count:", err);
  }
}
lostBtn.addEventListener('click', () => {
  globalType = 'lost';
  lostBtn.classList.add('bg-warning');
  foundBtn.classList.remove('bg-warning');
  displayLostItemsCount('getLostItemsCount', 'Lost');
  fetchAndDisplayItems();
  
});

displayLostItemsCount('getLostItemsCount', 'Lost');
foundBtn.addEventListener('click', () => {
  globalType = 'found';
  foundBtn.classList.add('bg-warning');
  lostBtn.classList.remove('bg-warning');
  displayLostItemsCount('getFoundItemsCount', 'Found');
  fetchAndDisplayItems();
});


async function populateCategoryDropdown() {
  try {
    const response = await fetch('/system/api/getCategories.php');  // Fixed URL to get categories
    const data = await response.json();

    if (data.success && Array.isArray(data.categories)) {
      const menu = document.getElementById('categoryDropdownMenu');
      const label = document.getElementById('selectedCategory');

      // Clear existing menu items
      menu.innerHTML = '';

      // Loop through the categories and populate the dropdown
      data.categories.forEach(category => {
        const item = document.createElement('li');
        item.setAttribute('data-category-id', category.category_id);  // Set category_id for each item
        item.innerHTML = ` 
          <button class="dropdown-item" type="button">
            ${category.name}
          </button>
        `;

        // Add click listener to update the selected category
        const button = item.querySelector('button');
        button.addEventListener('click', e => {
          e.preventDefault();  // Prevent any default button behavior

          // Update the label and globalCategoryId based on the selected category
          label.textContent = category.name;
          label.setAttribute('data-category-id', category.category_id);
          globalCategoryId = category.category_id;
            console.log(category.category_id)
          // Re-render items based on the selected category
          fetchAndDisplayItems();
        });

        menu.appendChild(item);  // Append the new item to the dropdown
      });

    }
  } catch (err) {
    console.error('Category loading failed:', err);
  }
}


// Call this function to load categories when the page loads
populateCategoryDropdown();

let ownerItemId;
// Separate action for "I found this"
function handleIFoundThis(item) {
  if (!isLoggedIn()) {
    warningModal.show();
    return;
  }

  // For Found Item Form, reset the image placeholder and button
  const modal = document.getElementById('foundItemModal2');
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');

  imgInput.value = ''; // Clear the file input
  imgPlaceholder.style.backgroundImage = 'none'; // Remove background image
  uploadBtn.style.display = 'block'; // Show button again
  ownerItemId = item.item_id;
  console.log(item.item_id);
  foundItemModal2.show();
}


document.getElementById("foundItemForm2").addEventListener("submit", async function(event) {
  event.preventDefault();
// Collect form data
const itemName = document.getElementById("nameFound2").value;
const itemDescription = document.getElementById("descriptionFound2").value;
const itemLocation = document.getElementById("locationFound2").value;
const categoryFound = document.getElementById("categoryFound2").value;
const imageFile = document.getElementById("imgInputFound2").files[0];
console.log("Image file selected:", imageFile);

// Set a default image URL
let imageUrl = '/system/res/default.png';
document.body.classList.add('loading');

// If an image file is provided, upload it to Cloudinary
if (imageFile) {
  const formData = new FormData();
  formData.append('file', imageFile); // Attach file directly
  formData.append('upload_preset', 'upload1234'); // Replace with your unsigned preset

  try {
    const imgResponse = await fetch("https://api.cloudinary.com/v1_1/dgxwpb4b1/image/upload", {
      method: 'POST',
      body: formData
    });

    const imgResult = await imgResponse.json();
    if (imgResult.secure_url) {
      imageUrl = imgResult.secure_url;
      console.log("Image uploaded URL:", imageUrl);
    } else {
      console.warn('Cloudinary response:', imgResult);
      alert('Image upload failed. Using default image.');
    }
  } catch (error) {
    console.error('Image upload error:', error);
    alert('Error uploading image. Using default image.');
  }
}


  // Retrieve user ID from sessionStorage
  const storedUser = JSON.parse(sessionStorage.getItem("user"));
  const userId = storedUser ? storedUser.user_id : null;
  if (!userId) {
    alert('User ID is not available.');
    return;
  }

  // Prepare item data object for found item
  const itemData = {
    name: itemName,
    description: itemDescription,
    location: itemLocation,
    category: categoryFound,
    img_url: imageUrl,
    user_id: userId,
    owner_item_id : ownerItemId
  };

  // Submit item data to backend for found item
  try {
    const response = await fetch('/system/api/createIFound.php', {  // Changed API endpoint for found item
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(itemData)
    });

    const responseText = await response.text();
    console.log('Response Text:', responseText);

    let result;
    try {
      result = JSON.parse(responseText);
    } catch (jsonError) {
      console.error('Failed to parse JSON:', jsonError);
      alert('Error: Response is not valid JSON');
      return;
    }

    if (result.success) {
      alert('Found item posted successfully!');
    } else {
      alert('Failed to post item: ' + (result.message || 'Unknown error'));
    }
  } catch (error) {
    console.error('Error posting item:', error);
    alert('An error occurred while posting the found item.');
  }


  // Reset the form after submission
  const modal = document.getElementById('foundItemModal2');
  document.getElementById("foundItemForm2").reset();
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');

  imgInput.value = '';
  imgPlaceholder.style.backgroundImage = 'none';
  uploadBtn.style.display = 'block';
  
  document.body.classList.remove('loading');


});


let ownerItemId2;
// Separate action for "This is mine"
function handleThisIsMine(item) {
  if (!isLoggedIn()) {
    warningModal.show();
    return;
  }

  // For Found Item Form, reset the image placeholder and button
  const modal = document.getElementById('lostItemModal2');
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');

  imgInput.value = ''; // Clear the file input
  imgPlaceholder.style.backgroundImage = 'none'; // Remove background image
  uploadBtn.style.display = 'block'; // Show button again
  ownerItemId2 = item.item_id;
  console.log(item.item_id);
  lostItemModal2.show();
}


document.getElementById("lostItemForm2").addEventListener("submit", async function(event) {
  event.preventDefault();
// Collect form data
const itemName = document.getElementById("nameLost2").value;
const itemDescription = document.getElementById("descriptionLost2").value;
const itemLocation = document.getElementById("locationLost2").value;
const categoryFound = document.getElementById("categoryLost2").value;
const imageFile = document.getElementById("imgInputLost2").files[0];
console.log("Image file selected:", imageFile);

// Set a default image URL
let imageUrl = '/system/res/default.png';
document.body.classList.add('loading');

// If an image file is provided, upload it to Cloudinary
if (imageFile) {
  const formData = new FormData();
  formData.append('file', imageFile); // Attach file directly
  formData.append('upload_preset', 'upload1234'); // Replace with your unsigned preset

  try {
    const imgResponse = await fetch("https://api.cloudinary.com/v1_1/dgxwpb4b1/image/upload", {
      method: 'POST',
      body: formData
    });

    const imgResult = await imgResponse.json();
    if (imgResult.secure_url) {
      imageUrl = imgResult.secure_url;
      console.log("Image uploaded URL:", imageUrl);
    } else {
      console.warn('Cloudinary response:', imgResult);
      alert('Image upload failed. Using default image.');
    }
  } catch (error) {
    console.error('Image upload error:', error);
    alert('Error uploading image. Using default image.');
  }
}


  // Retrieve user ID from sessionStorage
  const storedUser = JSON.parse(sessionStorage.getItem("user"));
  const userId = storedUser ? storedUser.user_id : null;
  if (!userId) {
    alert('User ID is not available.');
    return;
  }

  // Prepare item data object for found item
  const itemData = {
    name: itemName,
    description: itemDescription,
    location: itemLocation,
    category: categoryFound,
    img_url: imageUrl,
    user_id: userId,
    owner_item_id : ownerItemId2
  };

  // Submit item data to backend for found item
  try {
    const response = await fetch('/system/api/createILost.php', {  // Changed API endpoint for found item
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(itemData)
    });

    const responseText = await response.text();
    console.log('Response Text:', responseText);

    let result;
    try {
      result = JSON.parse(responseText);
    } catch (jsonError) {
      console.error('Failed to parse JSON:', jsonError);
      alert('Error: Response is not valid JSON');
      return;
    }

    if (result.success) {
      alert('Found item posted successfully!');
    } else {
      alert('Failed to post item: ' + (result.message || 'Unknown error'));
    }
  } catch (error) {
    console.error('Error posting item:', error);
    alert('An error occurred while posting the found item.');
  }


  // Reset the form after submission
  const modal = document.getElementById('lostItemModal2');
  document.getElementById("lostItemForm2").reset();
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');

  imgInput.value = '';
  imgPlaceholder.style.backgroundImage = 'none';
  uploadBtn.style.display = 'block';
  
  document.body.classList.remove('loading');


});


function showItemDetailsModal(item) {
  document.getElementById('modalItemImage').src = item.item_img_url || '/system/res/oppresor.png';
  document.getElementById('modalItemName').textContent = item.name || 'Untitled';
  document.getElementById('modalItemOwner').textContent = item.user_name || 'Unknown';
  document.getElementById('modalItemCategory').textContent = item.category_name || 'Uncategorized';
  document.getElementById('modalItemType').textContent = item.type || 'Unknown';
  document.getElementById('modalItemLocation').textContent = item.location || 'Unknown';
  document.getElementById('modalItemDescription').textContent = item.description || 'No description provided.';
  document.getElementById('modalItemPostedAt').textContent = item.created_at || 'Unknown';


  itemModal.show();
}





//BACKEND REQUESTS

loadMyRequests();
async function loadMyRequests() {
  try {
    // Retrieve user object from sessionStorage and parse it
    const user = JSON.parse(sessionStorage.getItem("user"));
    
    if (!user || !user.user_id) {
      console.error("User not found in sessionStorage");
      return;
    }

    const userId = user.user_id; // Retrieve user_id from the user object

    const response = await fetch("/system/api/getMyRequest.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ userId })  // send userId to PHP
    });

    const data = await response.json();

    const container = document.querySelector("#myRequests .panels");
    container.classList.remove("d-none");
    container.innerHTML = "";

    if (data.length === 0) {
     container.innerHTML = "<p class = 'text-center' >No pending requests found.</p>";
      return;
    }

    data.forEach(match => {
      const card = document.createElement("div");
      card.className = "match-card p-4 mb-4";
    card.innerHTML = `
  <div class="row">
    <!-- Left Column -->
    <div class="col-6 text-center p-3 border-end border-warning border-2">
      <div class="text-center">
        <h5 class="fw-bold mb-2">Your Item</h5>
        <img src="${match.proof_img}" style="height: 200px;" class="img-fluid" alt="${match.proof_item_name}">
        <h1 class="mt-2 display-6">${match.proof_item_name}</h1>
        <p class="my-2 lead">${match.proof_item_description}</p>
        <p class="my-2 lead fw-semibold">${match.proof_item_location}</p>
      </div>
    </div>

    <!-- Right Column -->
    <div class="col-6 text-dark p-3 border-start border-warning border-2">
      <div class="text-center">
        <h5 class="fw-bold mb-2">${match.owner_username}'s Item</h5>
        <img src="${match.owner_img}" style="height: 200px;" class="img-fluid" alt="${match.owner_item_name}">
        <h1 class="mt-2 display-6">${match.owner_item_name}</h1>
        <p class="my-2 lead">${match.owner_item_description}</p>
        <p class="my-2 lead fw-semibold">${match.owner_item_location}</p>
      </div>
    </div>

    <!-- Centered Alert -->
    <div class="col-12 d-flex justify-content-center">
      ${match.owner_accepted === 0 
        ? `<div class="alert alert-warning mt-4 mb-0 text-center" role="alert">
             waiting for the other user to accept
           </div>` 
        : ''}
    </div>
  </div>
`;



  container.appendChild(card);
});


  } catch (err) {
    console.error("Error fetching requests:", err);
  }
}


function poll(){
  loadTheirRequests();
  loadMyRequests();
  loadAcceptedMatches() 
}

async function loadTheirRequests() {
  try {
    const user = JSON.parse(sessionStorage.getItem("user"));

    if (!user || !user.user_id) {
      console.error("User not found in sessionStorage");
      return;
    }

    const userId = user.user_id;

    const response = await fetch("/system/api/getTheirRequest.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ userId })
    });

    const data = await response.json();
    const container = document.querySelector("#theirRequests .panels");
    container.classList.remove("d-none");
    container.innerHTML = "";

    if (data.length === 0) {
      container.innerHTML = "<p class = 'text-center' >No pending requests found.</p>";
      return;
    }

    data.forEach(match => {
      const card = document.createElement("div");
      card.className = "match-card border p-2 mb-4";
      console.log(match)
      card.innerHTML = `
        <div class="row">
          <!-- Left Column -->
          <div class="col-6 text-dark p-3 border-end border-warning border-2">
            <div class="text-start">
              <h5 class="fw-bold mb-2">Your Item</h5>
              <img src="${match.owner_img}" style="height: 200px;" class="img-fluid" alt="${match.owner_item_name}">
              <h1 class="mt-2 display-6">${match.owner_item_name}</h1>
              <p class="my-2 lead">${match.owner_item_description}</p>
              <p class="my-2 lead fw-semibold">${match.owner_item_location}</p>
            </div>
          </div>

          <!-- Right Column -->
          <div class="col-6 text-dark p-3 border-start border-warning border-2">
            <div class="text-end">
              <h5 class="fw-bold mb-2">${match.proof_username}'s Item</h5>
              <img src="${match.proof_img}" style="height: 200px;" class="img-fluid" alt="${match.proof_item_name}">
              <h1 class="mt-2 display-6">${match.proof_item_name}</h1>
              <p class="my-2 lead">${match.proof_item_description}</p>
              <p class="my-2 lead fw-semibold">${match.proof_item_location}</p>
            </div>
          </div>

          <!-- Centered Accept/Reject -->
          <div class="col-12 d-flex justify-content-center gap-3 mt-3 mb-2">
            <button class="btn btn-success accept-btn" data-match-id="${match.match_id}">Accept</button>
            <button class="btn btn-danger reject-btn" data-match-id="${match.match_id}">Reject</button>
          </div>
        </div>
      `;

      container.appendChild(card);
    });

    // Accept buttons
    document.querySelectorAll(".accept-btn").forEach(button => {
      button.addEventListener("click", async (e) => {
        const matchId = e.target.getAttribute("data-match-id");
        const response = await fetch("/system/api/ownerAcceptRequest.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ matchId, action: "accept" })
        });

        const text = await response.text();
        try {
          const result = JSON.parse(text);
          if (result.success) {
            alert("Request accepted successfully.");
            loadTheirRequests();
          } else {
            alert("Failed to accept the request.");
          }
        } catch (err) {
          console.error("Failed to parse accept response:", err);
        }
      });
    });

    // Reject buttons
    document.querySelectorAll(".reject-btn").forEach(button => {
      button.addEventListener("click", async (e) => {
        const matchId = e.target.getAttribute("data-match-id");
        const response = await fetch("/system/api/ownerRejectRequest.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ matchId, action: "reject" })
        });

        const text = await response.text();
        try {
          const result = JSON.parse(text);
          if (result.success) {
            alert("Request rejected successfully.");
            loadTheirRequests();
          } else {
            alert("Failed to reject the request.");
          }
        } catch (err) {
          console.error("Failed to parse reject response:", err);
        }
      });
    });

  } catch (err) {
    console.error("Error fetching requests:", err);
  }
}

loadTheirRequests();

async function loadAcceptedMatches() {
  try {
    const user = JSON.parse(sessionStorage.getItem("user"));
    if (!user || !user.user_id) {
      console.error("User not found in sessionStorage");
      return;
    }

    const userId = user.user_id;

    const response = await fetch("/system/api/getAcceptedMatches.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ userId })
    });

    const rawText = await response.text();
    console.log("Raw response from PHP:", rawText);

    let data;
    try {
      data = JSON.parse(rawText);
    } catch (err) {
      console.error("Invalid JSON from PHP:", err);
      return;
    }

    const container = document.querySelector("#acceptedMatches .panels");
    container.classList.remove("d-none");
    container.innerHTML = "";

    if (!Array.isArray(data) || data.length === 0) {
      container.innerHTML = "<p class='text-center'>No accepted matches found.</p>";
      return;
    }

    data.forEach(match => {
      const card = document.createElement("div");
      card.className = "match-card border p-2 mb-4";
      card.innerHTML = `
        <div class="row">
          <div class="col-6 text-dark p-3 border-end border-success border-2">
            <div class="text-start">
              <h5 class="fw-bold mb-2">${match.owner_username}'s Item</h5>
              <img src="${match.owner_img}" style="height: 200px;" class="img-fluid" alt="${match.owner_item_name}">
              <h1 class="mt-2 display-6">${match.owner_item_name}</h1>
              <p class="my-2 lead">${match.owner_item_description}</p>
              <p class="my-2 lead fw-semibold">${match.owner_item_location}</p>
            </div>
          </div>

          <div class="col-6 text-dark p-3 border-start border-success border-2">
            <div class="text-end">
              <h5 class="fw-bold mb-2">${match.proof_username}'s Item</h5>
              <img src="${match.proof_img}" style="height: 200px;" class="img-fluid" alt="${match.proof_item_name}">
              <h1 class="mt-2 display-6">${match.proof_item_name}</h1>
              <p class="my-2 lead">${match.proof_item_description}</p>
              <p class="my-2 lead fw-semibold">${match.proof_item_location}</p>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col text-center">
            <div class="bg-light border rounded p-3">
              <h5 class="fw-bold text-success mb-2">Meetup Details</h5>
              <p class="mb-1"><strong>Location:</strong> ${match.meetup_location}</p> 
              <p class="mb-2"><strong>Time:</strong> ${match.meetup_time}</p>
              <button class="btn btn-outline-success mark-claimed-btn" data-schedule-id="${match.schedule_id}">
                Mark as Claimed
              </button>
            </div>
          </div>
        </div>
      `;
      container.appendChild(card);
    });

  } catch (err) {
    console.error("Error fetching accepted matches:", err);
  }
}

function handleMarkAsClaim(scheduleId) {
  if (!scheduleId) return;

  if (confirm("Are you sure you want to mark this match as claimed?")) {
    fetch("/system/api/markAsClaimed.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ scheduleId })
    })
    .then(res => res.json())
    .then(response => {
      if (response.success) {
        alert("Marked as claimed!");
        loadAcceptedMatches();
      } else {
        alert("Failed to mark as claimed.");
      }
    })
    .catch(err => {
      console.error("Error:", err);
    });
  }
}

document.querySelector("#acceptedMatches").addEventListener("click", function (e) {
  if (e.target.classList.contains("mark-claimed-btn")) {
    const scheduleId = e.target.getAttribute("data-schedule-id");
    handleMarkAsClaim(scheduleId);
  }
});

loadAcceptedMatches();





//BACKEND CONTACT


document.getElementById('contactForm').addEventListener('submit', async (e) => {
  e.preventDefault();


  document.body.classList.add('loading');
  const data = {
    name: document.getElementById('contactName').value.trim(),
    email: document.getElementById('contactEmail').value.trim(),
    subject: document.getElementById('contactSubject').value.trim(),
    message: document.getElementById('contactMessage').value.trim(),
  };

  try {
    const response = await fetch('/system/api/email.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
    });

    const raw = await response.text(); // handle non-JSON errors
    let result;

    try {
      result = JSON.parse(raw);
    } catch (e) {
      throw new Error("Invalid JSON response: " + raw);
    }

    if (result.success) {
      alert('Success: ' + result.message);
    } else {
      alert('Failed: ' + result.message);
    }

  
  } catch (error) {
    console.error('Fetch error:', error);
    alert('Fetch error: ' + error.message);
    document.getElementById('response').textContent = 'Fetch error: ' + error.message;
  }
    document.body.classList.remove('loading');
});

