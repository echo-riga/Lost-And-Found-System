//UI STUFFS


  const toggle = document.getElementById('darkModeToggle');

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


  
  
   function showSection(sectionId) {

    
    const sections = document.querySelectorAll('section');
    sections.forEach(section => {
      if (section.id !== sectionId) {
        section.classList.add('fade-out');
        setTimeout(() => {
          section.style.display = 'none';
          
          section.classList.remove('fade-out');
      
          
    const sectionToShow = document.getElementById(sectionId);
    if (sectionToShow) {
      sectionToShow.style.display = 'block'; 
      
      sectionToShow.classList.add('fade-in', 'show-section');
    }
        }, 500);
        
      }
    });
    
  

    
    const dropdownButton = document.getElementById('dropdownButton');
    const endpoint = document.getElementById('endpoint');
    switch(sectionId) {
      case 'dashboard':
        fetchCounters();
        dropdownButton.textContent = 'Dashboard';
        endpoint.textContent = "Dashboard";
        break;
      case 'lost-item':
        dropdownButton.textContent = 'Item Management';
        endpoint.textContent = "Item Management > Lost Items";
        break;
      case 'found-item':
        dropdownButton.textContent = 'Item Management';
        endpoint.textContent = "Item Management > Found Items";
        break;
      case 'users':
        dropdownButton.textContent = 'User Management';
        endpoint.textContent = "Manage Users > Users CRUD";
        break;
      case 'categories':
        dropdownButton.textContent = 'Categories';
        endpoint.textContent = "Categories";
        break;
      case 'reviews':
        dropdownButton.textContent = 'Review & Approve Case';
        endpoint.textContent = "Review & Approve Case";
        break;
      case 'history':
            dropdownButton.textContent = 'Audit trails';
        endpoint.textContent = "Audit trails";
        break;
      default:
        dropdownButton.textContent = 'Dashboard';
    }
  }

  // Initially display the dashboard section
  showSection('dashboard');









initializeAdmin();

function initializeAdmin() {
    const isLoggedIn = sessionStorage.getItem('isLoggedIn') === 'true';
    const user = JSON.parse(sessionStorage.getItem('user'));

    if (isLoggedIn && user) {
        // Access and update the name and image
        const adminNameElement = document.getElementById('adminName');
        const adminIconElement = document.getElementById('adminIcon');

        // Set the admin name
        adminNameElement.textContent = user.name || "Guest";  // Default to "Guest" if name is not available

        // Set the admin image (fallback to a default image if no image URL is provided)
        const profileImageUrl = user.img_url || '/system/res/default.png';
       
        adminIconElement.src = profileImageUrl;
    } else {
        console.log("User not logged in or user data not available.");
    }
}


  //BACKEND USERS

  
  //EVENT DELEGATIONS
  // READ
  let createUserModal;
let updateUserModal;
let deleteUserModal;
let createCategoryModal;
let updateCategoryModal;
let deleteCategoryModal;
let updateLostItemModal;
let deleteLostItemModal;
let createLostItemModal;
let updateFoundItemModal;
let deleteFoundItemModal;
let createFoundItemModal;
let configModal;
document.addEventListener('DOMContentLoaded', function() {
  createUserModal = new bootstrap.Modal(document.getElementById('createUserModal'));
  updateUserModal = new bootstrap.Modal(document.getElementById('updateUserModal'));
  deleteUserModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
  updateCategoryModal = new bootstrap.Modal(document.getElementById('updateCategoryModal'));
  deleteCategoryModal = new bootstrap.Modal(document.getElementById('deleteCategoryModal'));
  createCategoryModal = new bootstrap.Modal(document.getElementById('createCategoryModal'));
  updateLostItemModal = new bootstrap.Modal(document.getElementById('updateLostItemModal'));
  deleteLostItemModal = new bootstrap.Modal(document.getElementById('deleteLostItemModal'));
  createLostItemModal = new bootstrap.Modal(document.getElementById('createLostItemModal'));
  updateFoundItemModal = new bootstrap.Modal(document.getElementById('updateFoundItemModal'));
  deleteFoundItemModal = new bootstrap.Modal(document.getElementById('deleteFoundItemModal'));
  createFoundItemModal = new bootstrap.Modal(document.getElementById('createFoundItemModal'));
  configModal = new bootstrap.Modal(document.getElementById('configModal'));

  function isLoggedIn() {
  return sessionStorage.getItem("isLoggedIn") === "true";
}

function isAdmin() {
            const user = JSON.parse(sessionStorage.getItem("user"));
            if (user.role === 'admin'){
              return true;
            }else{
              return false;
            }
}   

if (!isLoggedIn() || !isAdmin()) {
  window.location.href = "index.php"; // Redirect non-admins
}


  });
  document.addEventListener('DOMContentLoaded', () => {
  let usersInputDate = "";
  let usersInputName = "";
  let usersInputRole = "";

  const showUsers = async () => {
    try {
      const response = await fetch('/system/api/readUser.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          name: usersInputName || '',
          role: usersInputRole || '',
          created_at: usersInputDate || ''
        })
      });

      const data = await response.json();

      if (data.success) {
        const tbody = document.getElementById('userBody');
        tbody.innerHTML = '';

        data.data.forEach(user => {
          const tr = document.createElement('tr');
          tr.dataset.userId = user.user_id;

          tr.innerHTML = `
            <td class="p-3 text-secondary">${user.user_id}</td>
            <td class="p-3 text-secondary">
              <div class="d-flex gap-2 align-items-center">
                <img src="${user.img_url || '/system/res/default-user.png'}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                ${user.name}
              </div>
            </td>
            <td class="p-3 text-secondary">${user.email}</td>
            <td class="p-3 text-secondary">${user.password}</td>
            <td class="p-3 text-secondary">${user.auth_method}</td>
            <td class="p-3 text-secondary">${user.role}</td>
            <td class="p-3 text-secondary">${user.created_at}</td>
            <td class="p-3">
              <div class="d-flex gap-2">
                <button class="bg-transparent border-0 toUpdateUser" 
                  data-user-id="${user.user_id}" 
                  data-name="${user.name}" 
                  data-email="${user.email}" 
                  data-password="${user.password}" 
                  data-auth-method="${user.auth_method}" 
                  data-role="${user.role}">
                  <span class="fs-4 text-warning material-symbols-outlined">edit</span>
                </button>
                <button class="bg-transparent border-0 toDeleteUser" 
                  data-user-id="${user.user_id}">
                  <span class="fs-4 text-warning material-symbols-outlined">delete</span>
                </button>
              </div>
            </td>
          `;

          tbody.appendChild(tr);
        });

        tbody.onclick = event => {
          const btn = event.target.closest('button');
          if (!btn) return;

          const userId = btn.dataset.userId;

          if (btn.classList.contains('toUpdateUser')) {
            const { name, email, password, authMethod, role } = {
              name: btn.dataset.name,
              email: btn.dataset.email,
              password: btn.dataset.password,
              authMethod: btn.dataset['authMethod'] || btn.dataset['auth-method'],
              role: btn.dataset.role,
            };
            handleToEditUser(userId, name, email, password, authMethod, role);
          } else if (btn.classList.contains('toDeleteUser')) {
            handleDeleteUser(userId);
          }
        };

      } else {
        console.error('Failed to load users:', data.message);
        document.getElementById('userBody').innerHTML = '';
      }
    } catch (error) {
      console.error('Error fetching users:', error);
    }
  };

  document.getElementById("usersInputDate").addEventListener("change", (e) => {
    usersInputDate = e.target.value;
    showUsers();
  });

  document.getElementById("usersInputName").addEventListener("input", (e) => {
    usersInputName = e.target.value;
    showUsers();
  });

  document.getElementById("usersInputRole").addEventListener("change", (e) => {
    usersInputRole = e.target.value;
    showUsers();
  });

  // Initial load of all users
  showUsers();
});


function handleToEditUser(userId, name, email, password, authMethod, role) {
  document.getElementById('idUpdate').value = userId;
  document.getElementById('firstNameUpdate').value = name.split(' ')[0] || '';
  document.getElementById('lastNameUpdate').value = name.split(' ')[1] || '';
  document.getElementById('emailUpdate').value = email;
  document.getElementById('passwordUpdate').value = password;
  document.getElementById('auth_method_1').value = authMethod;
  document.getElementById('role_1').value = role;
  const modal = document.getElementById('updateUserModal');
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');
  
  imgInput.value = ''; // Clear the file input
  imgPlaceholder.style.backgroundImage = 'none'; // Remove background image
  uploadBtn.style.display = 'block'; // Show button again

  updateUserModal.show(); 
}

  function handleDeleteUser(userId) {
    document.getElementById('idDelete').textContent = userId;
    deleteUserModal.show(); 
  }

  //UPDATE
  document.getElementById("updateUserForm").addEventListener("submit", async function(event) {
    event.preventDefault();  
    document.body.classList.add('loading');
const id = document.getElementById("idUpdate").value;
const firstName = document.getElementById("firstNameUpdate").value;
const lastName = document.getElementById("lastNameUpdate").value;
const email = document.getElementById("emailUpdate").value;
const password = document.getElementById("passwordUpdate").value;
const authMethod = document.getElementById("auth_method_1").value;
const role = document.getElementById("role_1").value;
const imageFile = document.getElementById("imgInputUpdate").files[0]; // New image input

let imageUrl = null;

if (imageFile) {
    const formData = new FormData();
    formData.append('file', imageFile);  // 'file' is the key Cloudinary expects
    formData.append('upload_preset', 'upload1234');  // Use your Cloudinary upload preset

    try {
        const imgResponse = await fetch("https://api.cloudinary.com/v1_1/dgxwpb4b1/image/upload", {
            method: 'POST',
            body: formData
        });

        const imgResult = await imgResponse.json();
        if (imgResult.secure_url) {
            imageUrl = imgResult.secure_url;
            console.log("Image uploaded URL:", imageUrl);  // ✅ Log image URL
        } else {
            alert('Image upload failed. Proceeding without profile image.');
        }
    } catch (error) {
        console.error('Image upload error:', error);
        alert('Error uploading image. Proceeding without profile image.');
    }
}


    const userData = {
        id: id,
        name: `${firstName} ${lastName}`,
        email: email,
        password: password,
        auth_method: authMethod,
        role: role
    };

    if (imageUrl) {
        userData.img_url = imageUrl;
    }

    try {
        const response = await fetch('/system/api/updateUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(userData)
        });

        const result = await response.json();

        if (result.success) {
            alert('User updated successfully!');
        } else {
            alert('Failed to update user: ' + (result.message || 'Unknown error'));
        }
    } catch (error) {
        console.error('Error updating user:', error);
        alert('An error occurred while updating the user.');
    }
    document.body.classList.remove('loading');

    document.getElementById("updateUserForm").reset();
    updateUserModal.hide();
    showUsers(); // refresh the users list
});


//DELETE

// DELETE
document.getElementById("deleteUserForm").addEventListener("submit", async function(event) {
  event.preventDefault();  

  const id = document.getElementById("idDelete").innerText; // Assuming the user ID is displayed in the modal's ID section

  const deleteData = {
      id: id
  };

  try {
      const response = await fetch('/system/api/deleteUser.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
          },
          body: JSON.stringify(deleteData)
      });

      const result = await response.json();

      if (result.success) {
          alert('User deleted successfully!');
      } else {
          alert('Failed to delete user: ' + (result.message || 'Unknown error'));
      }
  } catch (error) {
      console.error('Error deleting user:', error);
      alert('An error occurred while deleting the user.');
  }
  document.getElementById("deleteUserForm").reset();
  deleteUserModal.hide();
  showUsers(); // refresh the users list
});


//CREATE 

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
      btn.style.display = 'none';
    }
  });
});

  document.getElementById('toAddUser').addEventListener('click', function (e) {
    e.preventDefault();
     // For Lost Item Form, reset the image placeholder and button
     
  const modal = document.getElementById('createUserModal');
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');
  
  imgInput.value = ''; // Clear the file input
  imgPlaceholder.style.backgroundImage = 'none'; // Remove background image
  uploadBtn.style.display = 'block'; // Show button again

    createUserModal.show();
  });


  document.getElementById("createUserForm").addEventListener("submit", async function(event) {
    event.preventDefault();
  const firstName = document.getElementById("firstNameCreate").value;
const lastName = document.getElementById("lastNameCreate").value;
const email = document.getElementById("emailCreate").value;
const password = document.getElementById("passwordCreate").value;
const authMethod = document.getElementById("auth_method").value;
const role = document.getElementById("role").value;
const imageFile = document.getElementById("imgInput").files[0];
console.log(imageFile);
let imageUrl = null;
document.body.classList.add('loading');

if (imageFile) {
  const formData = new FormData();
  formData.append('file', imageFile);  // Cloudinary expects 'file' instead of 'image'
  formData.append('upload_preset', 'upload1234');  // Use your Cloudinary upload preset

  try {
    const imgResponse = await fetch("https://api.cloudinary.com/v1_1/dgxwpb4b1/image/upload", {
      method: 'POST',
      body: formData
    });

    const imgResult = await imgResponse.json();
    if (imgResult.secure_url) {
      imageUrl = imgResult.secure_url;
      console.log("Image uploaded URL:", imageUrl); // ✅ Log image URL
    } else {
      alert('Image upload failed. Proceeding without profile image.');
    }
  } catch (error) {
    console.error('Image upload error:', error);
    alert('Error uploading image. Proceeding without profile image.');
  }
}

  
    const userData = {
      name: `${firstName} ${lastName}`,
      email: email,
      password: password,
      auth_method: authMethod,
      role: role
    };
  
    if (imageUrl) {
      userData.img_url = imageUrl;
    }
  
    try {
      const response = await fetch('/system/api/createUser.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(userData)
      });
  
      const result = await response.json();
  
      if (result.success) {
        alert('User created successfully!');
      } else {
        alert('Failed to create user: ' + (result.message || 'Unknown error'));
      }
    } catch (error) {
      console.error('Error creating user:', error);
      alert('An error occurred while creating the user.');
    }
    document.body.classList.remove('loading');

    document.getElementById("createUserForm").reset();
    showUsers();
  });
  

  //BACKEND CATEGORIES

  showCategories();

  //READ AND EVENT DELEGATIONS
  async function showCategories() {
    try {
      const response = await fetch('/system/api/readCategory.php');
      const data = await response.json();
  
      if (data.success) {
        const tbody = document.getElementById('categoryBody');
        tbody.innerHTML = '';
  
        data.data.forEach(category => {
          const tr = document.createElement('tr');
          tr.dataset.categoryId = category.category_id;
  
          tr.innerHTML = `
            <td class="p-3 text-secondary">${category.category_id}</td>
            <td class="p-3 text-secondary">${category.name}</td>
            <td class="p-3 text-secondary">${category.created_at}</td>
            <td class="p-3">
              <div class="d-flex gap-2">
                <button class="bg-transparent border-0 toUpdateCategory" 
                  data-category-id="${category.category_id}" 
                  data-name="${category.name}">
                  <span class="fs-4 text-warning material-symbols-outlined">edit</span>
                </button>
                <button class="bg-transparent border-0 toDeleteCategory" 
                  data-category-id="${category.category_id}">
                  <span class="fs-4 text-warning material-symbols-outlined">delete</span>
                </button>
              </div>
            </td>
          `;
  
          tbody.appendChild(tr);
        });
  
        tbody.onclick = event => {
          const btn = event.target.closest('button');
          if (!btn) return;
  
          const categoryId = btn.dataset.categoryId;
  
          if (btn.classList.contains('toUpdateCategory')) {
            const { name } = {
              name: btn.dataset.name,
            };
            handleToEditCategory(categoryId, name);
          } else if (btn.classList.contains('toDeleteCategory')) {
            handleDeleteCategory(categoryId);
          }
        };
  
      } else {
        const tbody = document.getElementById('categoryBody');
        tbody.innerHTML = '';
        console.error('Failed to load categories:', data.message);
      }
    } catch (error) {
      console.error('Error fetching categories:', error);
    }
  }
  function handleToEditCategory(categoryId, categoryName) {
   
   
    document.getElementById('categoryIdUpdate').value = categoryId;
  document.getElementById('categoryNameUpdate').value = categoryName;
    updateCategoryModal.show();
  }
  function handleDeleteCategory(categoryId) {
    document.getElementById('categoryIdDelete').textContent = categoryId;
    deleteCategoryModal.show();
  }
  
// UPDATE CATEGORY
document.getElementById("updateCategoryForm").addEventListener("submit", async function(event) {
  event.preventDefault();

  const categoryId = document.getElementById("categoryIdUpdate").value;
  const categoryName = document.getElementById("categoryNameUpdate").value;

  const categoryData = {
      category_id: categoryId,
      name: categoryName
  };

  try {
      const response = await fetch('/system/api/updateCategory.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
          },
          body: JSON.stringify(categoryData)
      });

      const result = await response.json();

      if (result.success) {
          alert('Category updated successfully!');
      } else {
          alert('Failed to update category: ' + (result.message || 'Unknown error'));
      }
  } catch (error) {
      console.error('Error updating category:', error);
      alert('An error occurred while updating the category.');
  }

  document.getElementById("updateCategoryForm").reset();
  updateCategoryModal.hide(); // Make sure this modal instance exists
  showCategories(); // Refresh the categories list
});


//DELETE

document.getElementById("deleteCategoryForm").addEventListener("submit", async function (event) {
  event.preventDefault();

  const categoryId = document.getElementById("categoryIdDelete").textContent; // Assuming it's set in the modal

  try {
      const response = await fetch('/system/api/deleteCategory.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify({ id: categoryId })
      });

      const result = await response.json();

      if (result.success) {
          alert("Category deleted successfully.");
          deleteCategoryModal.hide(); // Assuming Bootstrap modal
          showCategories(); // Refresh category list
      } else {
          alert("Failed to delete category: " + (result.message || "Unknown error"));
      }
  } catch (error) {
      console.error("Error deleting category:", error);
      alert("An error occurred while deleting the category.");
  }
});
document.getElementById('toAddCategory').addEventListener('click', function (e) {
  e.preventDefault();
  
  createCategoryModal.show();
});


//ADD CATEGORY
document.getElementById("createCategoryForm").addEventListener("submit", async function(event) {
  event.preventDefault();

  const name = document.getElementById("categoryNameCreate").value;

  const categoryData = {
    name: name
  };

  try {
    const response = await fetch("/system/api/createCategory.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(categoryData)
    });

    const result = await response.json();

    if (result.success) {
      alert("Category created successfully!");
    } else {
      alert("Failed to create category: " + (result.message || "Unknown error"));
    }
  } catch (error) {
    console.error("Error creating category:", error);
    alert("An error occurred while creating the category.");
  }

  document.getElementById("createCategoryForm").reset();
  createCategoryModal.hide(); // Assuming you're using Bootstrap
  showCategories(); // Refresh list function
});















//BACKEND LOST ITEMS



//POPULTTE CATEGORY BOX


populateCategorySelects();
async function populateCategorySelects() {
  try {
    const response = await fetch('/system/api/getCategories.php');
    const data = await response.json();

    if (data.success && Array.isArray(data.categories)) {
      // Get the select elements for the categories
      const lostSelectUpdate = document.getElementById('categoryLostUpdate');
      const foundSelect = document.getElementById('categoryLostAdd');
      const foundSelectUpdate = document.getElementById('categoryFoundUpdate');
      const foundSelectAdd = document.getElementById('categoryFoundAdd');

      // Clear the existing options and add the default option
      lostSelectUpdate.innerHTML = '<option value="" disabled selected>Select a category</option>';
      foundSelect.innerHTML = '<option value="" disabled selected>Select a category</option>';
      foundSelectUpdate.innerHTML = '<option value="" disabled selected>Select a category</option>';
      foundSelectAdd.innerHTML = '<option value="" disabled selected>Select a category</option>';

      // Loop through the categories, skipping the first item
      data.categories.slice(1).forEach(category => { // Skips the first item (index 0)
        const option = document.createElement('option');
        option.value = category.category_id;
        option.textContent = category.name;

        // Append the options to each select element
        lostSelectUpdate.appendChild(option.cloneNode(true));
        foundSelect.appendChild(option.cloneNode(true));
        foundSelectUpdate.appendChild(option.cloneNode(true));
        foundSelectAdd.appendChild(option.cloneNode(true));
      });

    } else {
      console.error('No categories returned.');
    }
  } catch (error) {
    console.error('Error loading categories:', error);
  }
}

//READ AND EVEN DELEGATION

document.addEventListener('DOMContentLoaded', () => {
  let lostItemsInputStatus = "";
  let lostItemsInputName = "";
  let lostItemsInputDate = "";

  document.getElementById("lostItemsInputStatus").addEventListener("change", e => {
    lostItemsInputStatus = e.target.value;
    showLostItems();
  });

  document.getElementById("lostItemsInputName").addEventListener("input", e => {
    lostItemsInputName = e.target.value;
    showLostItems();
  });

  document.getElementById("lostItemsInputDate").addEventListener("change", e => {
    lostItemsInputDate = e.target.value;
    showLostItems();
  });

  async function showLostItems() {
    try {
      const response = await fetch('/system/api/readLostItems.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          status: lostItemsInputStatus || '',
          name: lostItemsInputName || '',
          created_at: lostItemsInputDate || ''
        })
      });

      const data = await response.json();

      if (data.success) {
        const tbody = document.getElementById('lostItemsBody');
        tbody.innerHTML = '';

        data.data.forEach(item => {
          const tr = document.createElement('tr');
          tr.dataset.itemId = item.item_id;

          tr.innerHTML = `
            <th scope="row" class="p-3 text-secondary">${item.item_id}</th>
            <td class="p-3 text-secondary text-nowrap">
              <div class="d-flex gap-2 align-items-start">
                <img src="${item.user_img_url}" 
                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" 
                     alt="">
                ${item.user_name}
              </div>
            </td>
            <td class="p-3 text-secondary">${item.user_email}</td>
            <td class="p-3 text-secondary">${item.category_name}</td>
            <td class="p-3 text-secondary">${item.name}</td>
            <td class="p-3 text-secondary">${item.type}</td>
            <td class="p-3 text-secondary description-cell">${item.description}</td>
            <td class="p-3 text-secondary">${item.location}</td>
            <td class="p-3 text-secondary">${item.is_active}</td>
            <td class="p-3 text-secondary">${item.created_at}</td>
            <td class="p-3 text-secondary">
              <div class="d-flex gap-2">
                <button class="bg-transparent border-0 toUpdateItem" 
                  data-item-id="${item.item_id}"
                  data-user-id="${item.user_id}"
                  data-category-id="${item.category_id}"
                  data-name="${item.name}"
                  data-type="${item.type}"
                  data-description="${item.description}"
                  data-location="${item.location}"
                  data-is-active="${item.is_active}"
                  data-item-img-url="${item.item_img_url}">
                  <span class="fs-4 text-warning material-symbols-outlined">edit</span>
                </button>
                <button class="bg-transparent border-0 toDeleteItem" 
                  data-item-id="${item.item_id}">
                  <span class="fs-4 text-warning material-symbols-outlined">delete</span>
                </button>
              </div>
            </td>
          `;

          tbody.appendChild(tr);
        });

        tbody.onclick = event => {
          const btn = event.target.closest('button');
          if (!btn) return;

          const itemId = btn.dataset.itemId;

          if (btn.classList.contains('toUpdateItem')) {
            const itemData = {
              itemId,
              userId: btn.dataset.userId,
              categoryId: btn.dataset.categoryId,
              name: btn.dataset.name,
              type: btn.dataset.type,
              description: btn.dataset.description,
              location: btn.dataset.location,
              is_active: btn.dataset.isActive,
              img_url: btn.dataset.itemImgUrl
            };
            handleEditLostItem(itemData);
          } else if (btn.classList.contains('toDeleteItem')) {
            handleDeleteLostItem(itemId);
          }
        };

      } else {
        document.getElementById('lostItemsBody').innerHTML = '';
        console.error('Failed to load lost items:', data.message);
      }
    } catch (error) {
      console.error('Error fetching lost items:', error);
    }
  }

  // Initial load
  showLostItems();
});



let hasInitializedImageChange = false;

function handleImageChangeLost(img_url) {
  const imgPlaceholder = document.getElementById('imgPlaceholderLost');
  const imgInput = document.getElementById('imgInputLost');
  const changeImageButton = document.getElementById('changeUpdateLost');

  // Set background image directly if provided
  if (img_url) {
    imgPlaceholder.style.backgroundImage = `url('${img_url}')`;
  }

  // Ensure event listeners are only added once
  if (hasInitializedImageChange) return;
  hasInitializedImageChange = true;

  imgInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        imgPlaceholder.style.backgroundImage = `url(${e.target.result})`;
      };
      reader.readAsDataURL(file);
    }
  });

  changeImageButton.addEventListener('click', () => {
    imgInput.click();
  });
}

function handleEditLostItem(itemData) {
  document.getElementById('idLostUpdate').value = itemData.itemId;
  document.getElementById('nameLostUpdate').value = itemData.name;
  document.getElementById('descriptionLost').value = itemData.description || '';
  document.getElementById('locationLostUpdate').value = itemData.location || '';
  document.getElementById('categoryLostUpdate').value = itemData.categoryId || '';
// Directly set the value from itemData.is_active
document.getElementById('statusLostUpdate').value = itemData.is_active;


  handleImageChangeLost(itemData.img_url); // 🔁 call to set and prepare image handler

  updateLostItemModal.show(); 
}

function handleDeleteLostItem(itemId) {

  document.getElementById('lostItemIdDelete').textContent = itemId;
  deleteLostItemModal.show();
}document.getElementById("lostItemFormUpdate").addEventListener("submit", async function(e) {
  e.preventDefault();

  // Capture values from the form fields
  const item_id = document.getElementById("idLostUpdate").value;
  const name = document.getElementById("nameLostUpdate").value;
  const description = document.getElementById("descriptionLost").value;
  const location = document.getElementById("locationLostUpdate").value;
  const category_id = document.getElementById("categoryLostUpdate").value;

  // Capture the status value (either '1' or '0' based on dropdown selection)
  const status = parseInt(document.getElementById("statusLostUpdate").value, 10);
  console.log("Status:", status);  // Log status value for debugging

  // Optional image URL
  const imgFile = document.getElementById("imgInputLost").files[0];
  let img_url = null;
  document.body.classList.add('loading');

  // Handle image upload if a file is selected
  if (imgFile) {
    const formData = new FormData();
    formData.append('file', imgFile);  // Send file directly (no need for base64)
    formData.append('upload_preset', 'upload1234');  // Use your Cloudinary upload preset

    try {
      const imgResponse = await fetch("https://api.cloudinary.com/v1_1/dgxwpb4b1/image/upload", {
        method: 'POST',
        body: formData
      });

      const imgResult = await imgResponse.json();
      if (imgResult.secure_url) {
        img_url = imgResult.secure_url;  // Only set img_url if image is uploaded
        console.log("Image uploaded URL:", img_url);
      } else {
        alert('Image upload failed. Proceeding without image.');
      }
    } catch (error) {
      console.error('Image upload error:', error);
      alert('Error uploading image. Proceeding without image.');
    }
  }

  // Construct the itemData object including the status and image (only if provided)
  const itemData = {
    item_id,
    name,
    description,
    location,
    category_id,
    status,  // Include the selected status here
    type: "lost" // fixed type
  };

  // If an image URL was successfully obtained, add it to the itemData object
  if (img_url) {
    itemData.img_url = img_url;
  }

  try {
    // Send the request to update the lost item
    const response = await fetch('/system/api/updateLostItem.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(itemData)
    });

    // Log raw response for debugging
    const rawResponse = await response.text();  // Read the response as text
    console.log('Raw response:', rawResponse);  // Log the raw response for debugging

    // Attempt to parse the response as JSON
    let result;
    try {
      result = JSON.parse(rawResponse);  // Parse the raw response into JSON
    } catch (jsonError) {
      console.error('Error parsing JSON response:', jsonError);
      alert('Error parsing the response from the server.');
      document.body.classList.remove('loading');
      return;
    }

    // Check if the response is valid and has the success field
    if (result.success) {
      alert("Item updated successfully!");
      showLostItems(); // Refresh list
      updateLostItemModal.hide();
    } else {
      alert("Update failed: " + result.message);
    }
  } catch (err) {
    console.error("Fetch error:", err);
    alert("An error occurred while updating the item.");
  }

  document.body.classList.remove('loading');
});

//DELETE LOST ITEM

document.getElementById("deleteLostItemForm").addEventListener("submit", async function (event) {
  event.preventDefault();

  const itemId = document.getElementById("lostItemIdDelete").textContent; // Set this in your modal

  try {
    const response = await fetch('/system/api/deleteLostItem.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ id: itemId })
    });

    const result = await response.json();

    if (result.success) {
      alert("Lost item deleted successfully.");
      deleteLostItemModal.hide(); // Bootstrap modal
      showLostItems(); // Refresh the item list
    } else {
      alert("Failed to delete item: " + (result.message || "Unknown error"));
    }
  } catch (error) {
    console.error("Error deleting lost item:", error);
    alert("An error occurred while deleting the lost item.");
  }
  
});

document.getElementById('toAddLostItem').addEventListener('click', function(e) {
  e.preventDefault();
  const modal = document.getElementById('createLostItemModal');
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');
  
  imgInput.value = ''; // Clear the file input
  imgPlaceholder.style.backgroundImage = 'none'; // Remove background image
  uploadBtn.style.display = 'block'; // Show button again


  createLostItemModal.show();
});

//CREAET LOST
document.getElementById("lostItemForm").addEventListener("submit", async function(event) {
event.preventDefault();

const userId = document.getElementById("ownerIdLostAdd").value;
const itemName = document.getElementById("nameLostAdd").value;
const description = document.getElementById("descriptionLostAdd").value;
const location = document.getElementById("locationLostAdd").value;
const categoryId = document.getElementById("categoryLostAdd").value;
const imageFile = document.getElementById("imgInputLostAdd").files[0];

let imageUrl = null;
document.body.classList.add('loading');

if (imageFile) {
  const formData = new FormData();
  formData.append('file', imageFile);
  formData.append('upload_preset', 'upload1234');  // Use your upload preset

  try {
    const imgResponse = await fetch(`https://api.cloudinary.com/v1_1/dgxwpb4b1/image/upload`, {
      method: 'POST',
      body: formData
    });

    const imgResult = await imgResponse.json();
    if (imgResult.secure_url) {
      imageUrl = imgResult.secure_url;
      console.log("Image uploaded URL:", imageUrl);  // Log inside the success block
    } else {
      alert('Image upload failed. Proceeding without item image.');
    }
  } catch (error) {
    console.error('Image upload error:', error);
    alert('Error uploading image. Proceeding without item image.');
  }
}


  const itemData = {
    user_id: userId,
    name: itemName,
    description: description,
    location: location,
    category_id: categoryId
  };

  if (imageUrl) {
    itemData.img_url = imageUrl;
  }

  try {
    const response = await fetch('/system/api/createLostItem2.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(itemData)
    });

    const result = await response.json();

    if (result.success) {
      alert('Lost item created successfully!');
    } else {
      alert('Failed to create lost item: ' + (result.message || 'Unknown error'));
    }
  } catch (error) {
    console.error('Error creating lost item:', error);
    alert('An error occurred while creating the lost item.');
  }
  document.body.classList.remove('loading');

  document.getElementById("lostItemForm").reset();
  document.getElementById("imgPlaceholder").style.backgroundImage = "";
  showLostItems(); // Your function to reload lost items
});













//FOUND ITEMS BACKEND

//read and event delegations



document.addEventListener('DOMContentLoaded', () => {
  let foundItemsInputStatus = "";
  let foundItemsInputName = "";
  let foundItemsInputDate = "";

  document.getElementById("foundItemsInputStatus").addEventListener("change", e => {
    foundItemsInputStatus = e.target.value;
    showFoundItems();
  });

  document.getElementById("foundItemsInputName").addEventListener("input", e => {
    foundItemsInputName = e.target.value;
    showFoundItems();
  });

  document.getElementById("foundItemsInputDate").addEventListener("change", e => {
    foundItemsInputDate = e.target.value;
    showFoundItems();
  });

  async function showFoundItems() {
    try {
      const response = await fetch('/system/api/readFoundItems.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          status: foundItemsInputStatus || '',
          name: foundItemsInputName || '',
          created_at: foundItemsInputDate || ''
        })
      });

      const data = await response.json();

      if (data.success) {
        const tbody = document.getElementById('foundItemsBody');
        tbody.innerHTML = '';

        data.data.forEach(item => {
          const tr = document.createElement('tr');
          tr.dataset.itemId = item.item_id;

          tr.innerHTML = `
            <th scope="row" class="p-3 text-secondary">${item.item_id}</th>
            <td class="p-3 text-secondary text-nowrap">
              <div class="d-flex gap-2 align-items-start">
                <img src="${item.user_img_url}" 
                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" 
                     alt="">
                ${item.user_name}
              </div>
            </td>
            <td class="p-3 text-secondary">${item.user_email}</td>
            <td class="p-3 text-secondary">${item.category_name}</td>
            <td class="p-3 text-secondary">${item.name}</td>
            <td class="p-3 text-secondary">${item.type}</td>
            <td class="p-3 text-secondary description-cell">${item.description}</td>
            <td class="p-3 text-secondary">${item.location}</td>
            <td class="p-3 text-secondary">${item.is_active}</td>
            <td class="p-3 text-secondary">${item.created_at}</td>
            <td class="p-3 text-secondary">
              <div class="d-flex gap-2">
                <button class="bg-transparent border-0 toUpdateFoundItem" 
                  data-item-id="${item.item_id}"
                  data-user-id="${item.user_id}"
                  data-category-id="${item.category_id}"
                  data-name="${item.name}"
                  data-type="${item.type}"
                  data-description="${item.description}"
                  data-location="${item.location}"
                  data-is-active="${item.is_active}"
                  data-item-img-url="${item.item_img_url}">
                  <span class="fs-4 text-warning material-symbols-outlined">edit</span>
                </button>
                <button class="bg-transparent border-0 toDeleteFoundItem" 
                  data-item-id="${item.item_id}">
                  <span class="fs-4 text-warning material-symbols-outlined">delete</span>
                </button>
              </div>
            </td>
          `;

          tbody.appendChild(tr);
        });

        tbody.onclick = event => {
          const btn = event.target.closest('button');
          if (!btn) return;

          const itemId = btn.dataset.itemId;

          if (btn.classList.contains('toUpdateFoundItem')) {
            const itemData = {
              itemId,
              userId: btn.dataset.userId,
              categoryId: btn.dataset.categoryId,
              name: btn.dataset.name,
              type: btn.dataset.type,
              description: btn.dataset.description,
              location: btn.dataset.location,
              is_active: btn.dataset.isActive,
              img_url: btn.dataset.itemImgUrl
            };
            handleEditFoundItem(itemData);
          } else if (btn.classList.contains('toDeleteFoundItem')) {
            handleDeleteFoundItem(itemId);
          }
        };

      } else {
        document.getElementById('foundItemsBody').innerHTML = '';
        console.error('Failed to load found items:', data.message);
      }
    } catch (error) {
      console.error('Error fetching found items:', error);
    }
  }

  // Initial load
  showFoundItems();
});



let hasInitializedImageChange1 = false;

function handleImageChangeFound(img_url) {
  const imgPlaceholder = document.getElementById('imgPlaceholderFound');
  const imgInput = document.getElementById('imgInputFound');
  const changeImageButton = document.getElementById('changeUpdateFound');

  // Set background image directly if provided
  if (img_url) {
    imgPlaceholder.style.backgroundImage = `url('${img_url}')`;
  }

  // Ensure event listeners are only added once
  if (hasInitializedImageChange1) return;
  hasInitializedImageChange1 = true;

  imgInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        imgPlaceholder.style.backgroundImage = `url(${e.target.result})`;
      };
      reader.readAsDataURL(file);
    }
  });

  changeImageButton.addEventListener('click', () => {
    imgInput.click();
  });
}

function handleEditFoundItem(itemData) {
  document.getElementById('idFoundUpdate').value = itemData.itemId;
  document.getElementById('nameFoundUpdate').value = itemData.name;
  document.getElementById('descriptionFound').value = itemData.description || '';
  document.getElementById('locationFoundUpdate').value = itemData.location || '';
  document.getElementById('categoryFoundUpdate').value = itemData.categoryId || '';
document.getElementById('statusFoundUpdate').value = itemData.is_active;

  handleImageChangeFound(itemData.img_url); // 🔁 call to set and prepare image handler

  updateFoundItemModal.show(); 
}

function handleDeleteFoundItem(itemId) {

  document.getElementById('foundItemIdDelete').textContent = itemId;
  deleteFoundItemModal.show();
}



//UPDATE found 

document.getElementById("foundItemFormUpdate").addEventListener("submit", async function(e) {
  e.preventDefault();
const item_id = document.getElementById("idFoundUpdate").value;
const name = document.getElementById("nameFoundUpdate").value;
const description = document.getElementById("descriptionFound").value;
const location = document.getElementById("locationFoundUpdate").value;
const category_id = document.getElementById("categoryFoundUpdate").value;
const status = parseInt(document.getElementById("statusFoundUpdate").value, 10);
// Optional image URL
const imgFile = document.getElementById("imgInputFound").files[0];
let img_url = null;
document.body.classList.add('loading');

if (imgFile) {
  const formData = new FormData();
  formData.append('file', imgFile);  // Send the file directly (no need for base64 encoding)
  formData.append('upload_preset', 'upload1234');  // Replace with your Cloudinary upload preset

  try {
    const imgResponse = await fetch("https://api.cloudinary.com/v1_1/dgxwpb4b1/image/upload", {
      method: 'POST',
      body: formData
    });

    const imgResult = await imgResponse.json();
    if (imgResult.secure_url) {
      img_url = imgResult.secure_url;
      console.log("Image uploaded URL:", img_url);  // ✅ Log the image URL
    } else {
      alert('Image upload failed. Proceeding without image.');
    }
  } catch (error) {
    console.error('Image upload error:', error);
    alert('Error uploading image. Proceeding without image.');
  }
}


  const itemData = {
    item_id,
    name,
    description,
    location,
    category_id,
    img_url,
    status,
    type: "found" // fixed type
  };

  try {
    // Send the request to update the found item
    const response = await fetch('/system/api/updateFoundItem.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(itemData)
    });

    // Log raw response for debugging
    const rawResponse = await response.text();  // Read the response as text
    console.log('Raw response:', rawResponse);  // Log the raw response for debugging

    // Attempt to parse the response as JSON
    const result = JSON.parse(rawResponse);  // Parse the raw response into JSON

    if (result.success) {
      alert("Item updated successfully!");
      showFoundItems(); // Refresh list
      updateFoundItemModal.hide();
    } else {
      alert("Update failed: " + result.message);
    }
  } catch (err) {
    console.error("Fetch error:", err);
    alert("An error occurred while updating the item.");
  }
  document.body.classList.remove('loading');

});


//DELETE FOUND ITEM

document.getElementById("deleteFoundItemForm").addEventListener("submit", async function (event) {
  event.preventDefault();

  const itemId = document.getElementById("foundItemIdDelete").textContent; // Set this in your modal

  try {
    const response = await fetch('/system/api/deleteLostItem.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ id: itemId })
    });

    const result = await response.json();

    if (result.success) {
      alert("Found item deleted successfully.");
      deleteFoundItemModal.hide(); // Bootstrap modal
      showFoundItems(); // Refresh the item list
    } else {
      alert("Failed to delete item: " + (result.message || "Unknown error"));
    }
  } catch (error) {
    console.error("Error deleting found item:", error);
    alert("An error occurred while deleting the found item.");
  }
  
});



document.getElementById('toAddFoundItem').addEventListener('click', function(e) {
  e.preventDefault();
  const modal = document.getElementById('createFoundItemModal');
  const imgInput = modal.querySelector('.img-input');
  const imgPlaceholder = modal.querySelector('.img-placeholder');
  const uploadBtn = modal.querySelector('.upload-btn');
  
  imgInput.value = ''; // Clear the file input
  imgPlaceholder.style.backgroundImage = 'none'; // Remove background image
  uploadBtn.style.display = 'block'; // Show button again


  createFoundItemModal.show();
});

//CREAET FOUND
document.getElementById("foundItemForm").addEventListener("submit", async function(event) {
  event.preventDefault();
const userId = document.getElementById("ownerIdFoundAdd").value;
const itemName = document.getElementById("nameFoundAdd").value;
const description = document.getElementById("descriptionFoundAdd").value;
const location = document.getElementById("locationFoundAdd").value;
const categoryId = document.getElementById("categoryFoundAdd").value;
const imageFile = document.getElementById("imgInputFoundAdd").files[0];

let imageUrl = null;
document.body.classList.add('loading');

if (imageFile) {
  const formData = new FormData();
  formData.append('file', imageFile);  // Send the file directly (no need for base64 encoding)
  formData.append('upload_preset', 'upload1234');  // Replace with your Cloudinary upload preset

  try {
    const imgResponse = await fetch("https://api.cloudinary.com/v1_1/dgxwpb4b1/image/upload", {
      method: 'POST',
      body: formData
    });

    const imgResult = await imgResponse.json();
    if (imgResult.secure_url) {
      imageUrl = imgResult.secure_url;
      console.log("Image uploaded URL:", imageUrl);  // ✅ Log the image URL
    } else {
      alert('Image upload failed. Proceeding without item image.');
    }
  } catch (error) {
    console.error('Image upload error:', error);
    alert('Error uploading image. Proceeding without item image.');
  }
}

  const itemData = {
    user_id: userId,
    name: itemName,
    description: description,
    location: location,
    category_id: categoryId
  };

  if (imageUrl) {
    itemData.img_url = imageUrl;
  }

  try {
    const response = await fetch('/system/api/createFoundItem2.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(itemData)
    });

    const result = await response.json();

    if (result.success) {
      alert('found item created successfully!');
    } else {
      alert('Failed to create found item: ' + (result.message || 'Unknown error'));
    }
  } catch (error) {
    console.error('Error creating found item:', error);
    alert('An error occurred while creating the found item.');
  }
  document.body.classList.remove('loading');

  document.getElementById("foundItemForm").reset();
  document.getElementById("imgPlaceholder").style.backgroundImage = "";
  showFoundItems(); // Your function to reload found items
});
















// DASHBOARD
// DASHBOARD

async function loadItemReport() {
  try {
    const response = await fetch('/system/api/getItemsByDate.php');
    
    // Check if the response status is OK (200-299)
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    // Get the raw response text
    const rawData = await response.text();
    
    // Log the raw response text to inspect it
    console.log('Raw Response:', rawData);

    // Try parsing the raw response as JSON
    const data = JSON.parse(rawData);

    // Check if the data has the required structure
    if (!Array.isArray(data) || data.length === 0) {
      throw new Error('Invalid data format or no data available');
    }

    // Extract labels (dates), lost counts, and found counts
    const labels = data.map(item => item.report_date);
    const lostCounts = data.map(item => item.lost_count);
    const foundCounts = data.map(item => item.found_count);

    // Get the canvas context for the line chart
    const ctx = document.getElementById('itemReport').getContext('2d');
    
    // Create the line chart using Chart.js
    new Chart(ctx, {
      type: 'line',  // Line chart
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Lost Items',
            data: lostCounts,
            backgroundColor: 'rgba(220, 53, 69, 0.2)',  // Light Red for lost items
            borderColor: '#dc3545',  // Dark Red for lost items
            borderWidth: 2,
            fill: true  // Fill the area beneath the line
          },
          {
            label: 'Found Items',
            data: foundCounts,
            backgroundColor: 'rgba(40, 167, 69, 0.2)',  // Light Green for found items
            borderColor: '#28a745',  // Dark Green for found items
            borderWidth: 2,
            fill: true  // Fill the area beneath the line
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top'
          },
          title: {
            display: true,
            text: 'Lost vs Found Items in the Past 7 Days'
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  } catch (err) {
    console.error('Failed to load chart data:', err);
  }
}

loadItemReport();


async function loadUserDate() {
  try {
    const response = await fetch('/system/api/getUsersByDate.php');
    
    // Check if the response is successful
    if (!response.ok) {
      console.error(`Error: ${response.status} - ${response.statusText}`);
      return;
    }

    // Log the raw response text for debugging
    const responseText = await response.text();

    // Try parsing the JSON
    let data;
    try {
      data = JSON.parse(responseText);
    } catch (e) {
      console.error('JSON Parsing Error:', e);
      return;
    }

    if (Array.isArray(data) && data.length > 0) {
      // Map the data to labels (dates) and counts (user count)
      const labels = data.map(item => item.date);  // Access the 'date' field from PHP
      const counts = data.map(item => item.user_count);  // Access the 'user_count' field from PHP

        // Create the chart
        new Chart(document.getElementById('usersDate'), {
          type: 'line',
          data: {
            labels: labels,  // Labels will be the dates
            datasets: [{
              label: 'User Creation Trends Over The Past 7 Days',
              data: counts,  // Data will be the user counts
              borderColor: 'rgba(0, 123, 255, 1)',  // Bootstrap primary color (blue)
              backgroundColor: 'rgba(0, 123, 255, 0.2)', // Light blue with transparency
              fill: true,
              tension: 0  // Slight smoothness for the curve
            }]
          },
          options: {
            responsive: true,
            scales: {
              x: {
                title: { display: true, text: 'Date' }  // X-axis label
              },
              y: {
                title: { display: true, text: 'User Count' },  // Y-axis label
                beginAtZero: true  // Ensure Y-axis starts at zero
              }
            }
          }
        });
    } else {
      console.error('No valid data returned for the chart.');
    }
  } catch (error) {
    console.error('Error loading chart data:', error);
  }
}


// Call the function to load the chart
loadUserDate();

async function loadActivityDate() {
  try {
    const response = await fetch('/system/api/getActivitiesByDate.php');  // Change this URL to your actual PHP script path
    
    // Check if the response is successful
    if (!response.ok) {
      console.error(`Error: ${response.status} - ${response.statusText}`);
      return;
    }

    // Log the raw response text for debugging
    const responseText = await response.text();

    // Try parsing the JSON
    let data;
    try {
      data = JSON.parse(responseText);
    } catch (e) {
      console.error('JSON Parsing Error:', e);
      return;
    }

    if (Array.isArray(data) && data.length > 0) {
      const labels = data.map(item => item.log_date);  // Replace with the correct field name (e.g., 'log_date' from the PHP response)
      const counts = data.map(item => item.log_count);  // Replace with the correct field name (e.g., 'log_count' from the PHP response)

     new Chart(document.getElementById('activitiesDate'), {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: 'Activities Over The Past 7 Days',
      data: counts,
      borderColor: 'rgba(0, 123, 255, 1)',
      backgroundColor: 'rgba(0, 123, 255, 0.2)',
      fill: true,
      tension: 0
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        labels: {
          color: 'rgb(255, 255, 255)' // ✅ Legend text color
        }
      }
    },
    scales: {
      x: {
        title: {
          display: true,
          text: 'Date',
          color: 'rgb(255, 255, 255)' // ✅ X-axis title color
        },
        ticks: {
          color: 'rgb(255, 255, 255)' // ✅ X-axis label (date) color
        },
        grid: {
          color: 'rgba(255, 255, 255, 0.1)' // Optional: grid line color
        }
      },
      y: {
        title: {
          display: true,
          text: 'Log Count',
          color: 'rgb(255, 255, 255)' // ✅ Y-axis title color
        },
        ticks: {
          color: 'rgb(255, 255, 255)' // ✅ Y-axis label color
        },
        grid: {
          color: 'rgba(255, 255, 255, 0.1)' // Optional: grid line color
        },
        beginAtZero: true
      }
    }
  }
});


    } else {
      console.error('No valid data returned for the chart.');
    }
  } catch (error) {
    console.error('Error loading chart data:', error);
  }
}

// Call the function when the page loads or when needed
loadActivityDate();


async function loadItemActive() {
  try {
    const response = await fetch('/system/api/getItemsActive.php');
    
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const rawData = await response.text();
    console.log('Raw Response:', rawData);

    const data = JSON.parse(rawData);

    if (typeof data.active === 'undefined' || typeof data.inactive === 'undefined') {
      throw new Error('Invalid data format: missing "active" or "inactive" fields');
    }

    const ctx = document.getElementById('itemsActive').getContext('2d');

    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Active', 'Inactive'],
        datasets: [{
          data: [data.active, data.inactive],
          backgroundColor: [
            'rgba(0, 200, 83, 0.7)',   // Bright Green
            'rgba(255, 193, 7, 0.8)'   // Vivid Yellow
          ],
          borderColor: ['#00c853', '#ffc107'],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          },
          title: {
            display: true,
            text: 'Distribution of Item Status'
          }
        }
      }
    });
  } catch (err) {
    console.error('Failed to load chart data:', err);
  }
}

loadItemActive();



async function loadTopCategories() {
  try {
    const response = await fetch('/system/api/getTopCategories.php');

    if (!response.ok) {
      console.error(`Error: ${response.status} - ${response.statusText}`);
      return;
    }

    const data = await response.json();

    if (Array.isArray(data) && data.length > 0) {
      const labels = data.map(item => item.category_name);
      const lostCounts = data.map(item => item.lost_count);
      const foundCounts = data.map(item => item.found_count);

      new Chart(document.getElementById('topCategories'), {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [
            {
              label: 'Lost Items',
              data: lostCounts,
              backgroundColor: 'rgba(255, 87, 34, 0.7)', // deep orange
              stack: 'Stack 0'
            },
            {
              label: 'Found Items',
              data: foundCounts,
              backgroundColor: 'rgba(0, 200, 83, 0.7)', // bright green
              stack: 'Stack 0'
            }
          ]
        },
        options: {
          responsive: true,
          plugins: {
            title: {
              display: true,
              text: 'Top Categories by Lost and Found Items'
            },
            legend: {
              position: 'top'
            }
          },
          scales: {
            x: {
              stacked: true,
              title: {
                display: true,
                text: 'Category'
              }
            },
            y: {
              stacked: true,
              beginAtZero: true,
              title: {
                display: true,
                text: 'Item Count'
              }
            }
          }
        }
      });
    } else {
      console.error('No valid data returned for the chart.');
    }
  } catch (error) {
    console.error('Error loading chart data:', error);
  }
}

loadTopCategories();


//BACK END AUDIT
async function showAuditLogs() {
  try {
    // Fetch the audit log data from the API endpoint
    const response = await fetch('/system/api/getAuditLog.php');
    
    // Debugging: Log the raw response as text
    const rawText = await response.text();
    console.log('Raw Response Text:', rawText);

    // Now, parse the response as JSON
    const data = JSON.parse(rawText);

    // Check if the response indicates success
    if (data.success) {
      const tbody = document.getElementById('historyBody'); // Get the table body where the logs will be populated
      tbody.innerHTML = '';  // Clear any existing rows

      // Iterate over each audit log entry
      data.data.forEach((log) => {
        const tr = document.createElement('tr');  // Create a new table row
        tr.dataset.logId = log.log_id;  // Add log_id as a data attribute for easy reference

        tr.innerHTML = `
          <th scope="row" class="p-3 text-secondary">${log.log_id}</th>
          <td class="p-3 text-secondary">${log.table_name}</td>
          <td class="p-3 text-secondary">${log.action}</td>
          <td class="p-3 text-secondary">${log.description}</td>
          <td class="p-3 text-secondary">${log.log_time}</td>
        `;

        tbody.appendChild(tr); // Append the new row to the table body
      });
    } else {
      console.error('Failed to fetch audit logs:', data.message);
    }
  } catch (error) {
    console.error('Error fetching audit logs:', error);
  }
}

showAuditLogs();


async function showRecentAuditLogs() {
  try {
    // Fetch the audit log data from the API endpoint
    const response = await fetch('/system/api/getRecentAuditLog.php');
    
    // Debugging: Log the raw response as text
    const rawText = await response.text();
    console.log('Raw Response Text:', rawText);

    // Now, parse the response as JSON
    const data = JSON.parse(rawText);

    // Check if the response indicates success
    if (data.success) {
      const timeline = document.querySelector('.timeline'); // Get the timeline container
      timeline.innerHTML = ''; // Clear any existing timeline items

      // Iterate over each audit log entry
      data.data.forEach((log) => {
        const div = document.createElement('div');  // Create a new div for each timeline item
        div.classList.add('timeline-item');  // Add the 'timeline-item' class

        div.innerHTML = `
          <p class="text-secondary p-0 m-0">${log.log_time.slice(11, 16)}</p>
          <div class="circle"></div>
          <p class="m-0 p-0">${log.description}</p>
        `;

        timeline.appendChild(div); // Append the new div to the timeline container
      });
    } else {
      console.error('Failed to fetch audit logs:', data.message);
    }
  } catch (error) {
    console.error('Error fetching audit logs:', error);
  }
}

showRecentAuditLogs();

  async function fetchCounters() {
    try {
      // Fetch data from the PHP API
      const response = await fetch('/system/api/getCounters.php'); // Replace with the correct path to your PHP file
      const data = await response.json();

      // Check if data is valid before updating the counters
      if (data) {
        // Update the text content of each counter element
        document.getElementById('lostCounter').textContent = data.lost_items;
        document.getElementById('foundCounter').textContent = data.found_items;
        document.getElementById('userCounter').textContent = data.users_count;
        document.getElementById('categoriesCounter').textContent = data.categories_count;
      }
    } catch (error) {
      // Handle any errors that occur during the fetch
      console.error('Error fetching data:', error);
    }
  }

  fetchCounters();

async function loadMatchStatus() {
  try {
    const response = await fetch('/system/api/getMatchStatusCount.php');
    const data = await response.json();

    const ctx = document.getElementById('matchesStatus').getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Resolved', 'Unresolved', 'Cancelled'],
        datasets: [{
          label: 'Match Status Counts',
          data: [data.resolve, data.unresolve, data.cancelled],
          backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Match Status Distribution',
            font: {
              size: 18
            }
          },
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  } catch (error) {
    console.error("Error loading donut chart:", error);
  }
}

loadMatchStatus();
async function fetchAndRenderLocationBar() {
  try {
    const res = await fetch('/system/api/getTopLocation.php');
    if (!res.ok) throw new Error('Network error');

    const data = await res.json();
    const labels = data.map(d => d.location);
    const counts = data.map(d => d.count);

    const colors = ['#28a745', '#ffc107', '#dc3545', '#17a2b8', '#6f42c1'];
    const ctx = document.getElementById('locationBar').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels,
    datasets: [{
      label: 'Items Count',
      data: counts,
      backgroundColor: colors,
      borderColor: colors,
      borderWidth: 1,
      borderRadius: 4,
    }]
  },
 options: {
  plugins: {
    title: {
      display: true,
      text: 'Top Locations by Item Count',
      font: { size: 18, weight: 'bold' },
      padding: { top: 10, bottom: 30 }
    },
    legend: {
      display: false
    },
    tooltip: { enabled: true }
  },
  scales: {
    y: {
      beginAtZero: true,
      precision: 0,
      title: { display: true, text: 'Item Count' }
    },
    x: {
      title: { display: true, text: 'Location' }
    }
  },
  responsive: true,
  maintainAspectRatio: false,
}

});

  } catch (e) {
    console.error('Error fetching or rendering chart:', e);
  }
}

fetchAndRenderLocationBar();

const dateInput = document.getElementById('reportDate');
const reportTitleDate = document.getElementById('reportDateDisplay');
const reportsBody = document.getElementById('reportsBody');

dateInput.addEventListener('change', async () => {
  const selectedDate = dateInput.value;
  if (!selectedDate) return;

  // Format the date for display (e.g. "May 12, 2025")
  const formattedDate = new Date(selectedDate).toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  });
  reportTitleDate.textContent = formattedDate;

  await loadReportData(selectedDate);
});

async function loadReportData(date) {
  try {
    const response = await fetch('/system/api/getReport.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ date })
    });

    const text = await response.text();
    console.log('Raw Response:', text); // DEBUG output

    let data;
    try {
      data = JSON.parse(text);
    } catch (err) {
      console.error('Failed to parse JSON:', err);
      reportsBody.innerHTML = `<tr><td colspan="10" class="text-danger text-center">Invalid JSON response</td></tr>`;
      return;
    }

    renderReportTable(data);
  } catch (error) {
    console.error('Error fetching report:', error);
    reportsBody.innerHTML = `<tr><td colspan="10" class="text-danger text-center">Fetch failed</td></tr>`;
  }
}

function renderReportTable(data) {
  reportsBody.innerHTML = '';
  if (!Array.isArray(data) || data.length === 0) {
    reportsBody.innerHTML = `<tr><td colspan="10" class="text-center">No records found for selected date.</td></tr>`;
    return;
  }

  data.forEach(item => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${item.item_id}</td>
      <td>${item.owner_name || '-'}</td>
      <td>${item.email || '-'}</td>
      <td>${item.item_name}</td>
      <td>${item.category || '-'}</td>
      <td>${item.type}</td>
      <td>${item.description || ''}</td>
      <td>${item.location || ''}</td>
      <td>${item.created_at}</td>
      <td>${item.status || '-'}</td>
    `;
    reportsBody.appendChild(row);
  });
}


 document.getElementById('exportExcelBtn').addEventListener('click', exportTableToCSV);
    function exportTableToCSV() {
      const rows = document.querySelectorAll('#reportTable tr');
      let csvContent = '';

      rows.forEach(row => {
        const cols = row.querySelectorAll('th, td');
        const rowData = [];
        cols.forEach(col => {
          let data = col.innerText.replace(/"/g, '""');
          if (data.includes(',') || data.includes('"')) {
            data = `"${data}"`;
          }
          rowData.push(data);
        });
        csvContent += rowData.join(',') + '\n';
      });

      const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = `report_${dateInput.value || 'all'}.csv`;
      a.style.display = 'none';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
    }

    // Export to PDF
    document.getElementById('exportPdfBtn').addEventListener('click', exportReportToPDF);
    async function exportReportToPDF() {
      if (typeof html2canvas === 'undefined' || typeof window.jspdf === 'undefined') {
        alert('Please include jsPDF and html2canvas libraries to enable PDF export.');
        return;
      }

      const reportContent = document.getElementById('reportContent');
      const canvas = await html2canvas(reportContent, { scale: 2 });
      const imgData = canvas.toDataURL('image/png');

      const { jsPDF } = window.jspdf;
      const pdf = new jsPDF('p', 'pt', 'a4');
      const pdfWidth = pdf.internal.pageSize.getWidth();
      const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

      pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
      pdf.save(`report_${dateInput.value || 'all'}.pdf`);
    }
    

    //SEARCJES FUNC

 document.addEventListener('DOMContentLoaded', () => {
  async function loadCases() {
    try {
      const res = await fetch('/system/api/readResolveSchedule.php');
      const data = await res.json();

      const tbody = document.getElementById('casesBody');
      tbody.innerHTML = '';

      if (data.success) {
        data.data.forEach(item => {
          const tr = document.createElement('tr');
          tr.innerHTML = `
            <th scope="row" class="p-3 text-secondary">${item.schedule_id}</th>
            <td class="p-3 text-secondary">${item.owner_username}</td>
            <td class="p-3 text-secondary">${item.owner_item_name}</td>
            <td class="p-3 text-secondary">${item.proof_username}</td>
            <td class="p-3 text-secondary">${item.proof_item_name}</td>
            <td class="p-3 text-secondary">${item.meetup_location}</td>
            <td class="p-3 text-secondary">${(item.meetup_time)}</td>
            <td class="p-3 text-secondary text-capitalize">${item.status}</td>
            <td class="p-3 text-secondary">${(item.created_at)}</td>
          `;
          tbody.appendChild(tr);
        });
      } else {
        tbody.innerHTML = `<tr><td colspan="9" class="text-center text-secondary">${data.message}</td></tr>`;
      }
    } catch (err) {
      console.error(err);
      document.getElementById('casesBody').innerHTML = `<tr><td colspan="9" class="text-center text-danger">Failed to load cases.</td></tr>`;
    }
  }
  loadCases();
});


  document.getElementById("configBtn").addEventListener("click", function () {

    configModal.show();
  });

   document.getElementById("saveConfigBtn").addEventListener("click", async () => {
    const location = document.getElementById("configLocation").value;
    const interval = document.getElementById("configInterval").value;

    try {
      const response = await fetch('/system/api/updateSched.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ location, interval })
      });

      const data = await response.json();

      if (data.success) {
        alert("Schedule updated successfully.");
        const configModal = bootstrap.Modal.getInstance(document.getElementById("configModal"));
        configModal.hide();
      } else {
        alert("Failed to update schedule.");
      }

    } catch (error) {
      console.error("Error:", error);
      alert("An error occurred while updating.");
    }
  });