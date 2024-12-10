let cartItems = [];
let cartCounter = 0;


function logout() {
    fetch('/logout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
    })
        .then((response) => {
            console.log(response);
            
            if (response.ok) {
                alert('Logout successful');
                localStorage.removeItem('isloggedin');
                window.location.href = '/'; // Redirect to home page
            } else {
                alert('Failed to logout');
            }
        })
        .catch((error) => {
            console.error('Error during logout:', error);
        });
}


function addToCart(title) {
    cartItems.push({ title });
    cartCounter++;
    updateCartCounter();
}

function openCartModal() {
    document.getElementById('cartModal').style.display = 'block';
    document.querySelector('.sticky-cart-btn').style.display = 'none';
    renderCartItems();
}


function openAddModal() {
    document.getElementById('addModal').style.display = 'block';
    document.querySelector('.sticky-add-btn').style.display = 'none';
}


function openUpdateModal(serviceId, serviceName, serviceDescription, serviceImageUrl) {
    // console.log(serviceId, serviceName, serviceDescription, serviceImageUrl);
    
    document.getElementById('updateServiceId').value = serviceId;
    // document.getElementById('serviceName').value = serviceName;
    // document.getElementById('serviceDescription').value = serviceDescription;
    // document.getElementById('serviceImageUrl').value = serviceImageUrl;
    document.getElementById('updateModal').style.display = 'block';
}


function closeCartModal() {
    document.getElementById('cartModal').style.display = 'none';
    document.querySelector('.sticky-cart-btn').style.display = 'flex';
}


function closeAddModal() {
    document.getElementById('addModal').style.display = 'none';
    document.querySelector('.sticky-add-btn').style.display = 'flex';
}


function closeUpdateModal() {
    document.getElementById('updateModal').style.display = 'none';
}

function renderCartItems() {
    const cartItemsContainer = document.getElementById('cartItems');
    cartItemsContainer.innerHTML = '';
    cartItems.forEach((item, index) => {
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <span class="cart-item-title">${item.title}</span>
            <button class="remove-btn" onclick="removeCartItem(${index})">&times;</button>
        `;
        cartItemsContainer.appendChild(cartItem);
    });
    // Show or hide the checkout button based on the number of items
    const checkoutBtn = document.getElementById('checkoutBtn');
    if (cartItems.length > 0) {
        checkoutBtn.style.display = 'block';
    } else {
        checkoutBtn.style.display = 'none';
    }
}

function removeCartItem(index) {
    cartItems.splice(index, 1);
    cartCounter--;
    updateCartCounter();
    renderCartItems();
}

function updateCartCounter() {
    const cartCounterElement = document.getElementById('cartCounter');
    cartCounterElement.innerText = cartCounter;
    if (cartCounter > 0) {
        cartCounterElement.style.display = 'flex';
    } else {
        cartCounterElement.style.display = 'none';
    }
}

// Show the hidden details
function showDetails(id) {
    const detailsSection = document.getElementById(id);
    if (detailsSection) {
      detailsSection.style.display = "block";
    }
  }
  
  // Hide the hidden details
  function hideDetails(id) {
    const detailsSection = document.getElementById(id);
    if (detailsSection) {
      detailsSection.style.display = "none";
    }
  }
  
  // Change the background color of the header
  function changeBackgroundColor(id) {
    const header = document.getElementById(id);
    if (header) {
        if (header.style.backgroundColor === "lightblue") {
            header.style.backgroundColor = "white";
        }
        else {
            header.style.backgroundColor = "lightblue";
        }
    }
  }
  