const header = document.querySelector('.main-header');
const changeStyleButton = document.querySelector('#change-style');
const resetStyleButton = document.querySelector('#reset-style');
const sloganText = document.querySelector('.slogan');

// Hide the reset button initially
resetStyleButton.style.display = 'none';

// Add event listener for "Change Text Style" button
changeStyleButton.addEventListener('click', () => {
    // Change the font family of the header
    header.style.fontFamily = '"Courier New", monospace';
    sloganText.style.color = 'yellow';
    sloganText.style.fontWeight = '900';
    // Hide "Change Text Style" button and show "Reset Text Style" button
    changeStyleButton.style.display = 'none';
    resetStyleButton.style.display = 'inline-block';
});

// Add event listener for "Reset Text Style" button
resetStyleButton.addEventListener('click', () => {
    // Reset the font family of the header
    header.style.fontFamily = '"Open Sans", sans-serif';
    sloganText.style.color = 'white';
    sloganText.style.fontWeight = '600';

    // Hide "Reset Text Style" button and show "Change Text Style" button
    resetStyleButton.style.display = 'none';
    changeStyleButton.style.display = 'inline-block';
});

// Form Validation
const form = document.querySelector('form');
const nameInput = document.querySelector('#name');
const emailInput = document.querySelector('#email');
const phoneInput = document.querySelector('#phone');
const messageInput = document.querySelector('#message');

// Add an event listener for form submission
form.addEventListener('submit', (e) => {
    e.preventDefault(); // Prevent form submission
    let isValid = true;

    // Clear any previous error messages
    document.querySelectorAll('.error-message').forEach(el => el.remove());

    // Validate Name
    if (nameInput.value.trim() === '') {
        isValid = false;
        showError(nameInput, 'Name cannot be empty');
    }

    // Validate Email
    if (!validateEmail(emailInput.value)) {
        isValid = false;
        showError(emailInput, 'Enter a valid email address');
    }

    // Validate Phone
    if (!validatePakistaniPhone(phoneInput.value)) {
        isValid = false;
        showError(phoneInput, 'Phone number must be in the format XXX-XXXXXXX');
    }

    // Validate Expectations
    if (messageInput.value.trim() === '') {
        isValid = false;
        showError(messageInput, 'Expectations field cannot be empty');
    }

    // If all validations pass, show a success message
    if (isValid) {
        alert('Form submitted successfully!');
        form.reset(); // Reset the form
    }
});

// Function to show error messages
function showError(input, message) {
    const error = document.createElement('span');
    error.classList.add('error-message');
    error.style.color = 'red';
    error.style.fontSize = '0.9rem';
    error.textContent = message;
    input.parentElement.appendChild(error);
}

// Function to validate email format
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Function to validate Pakistani phone number format
function validatePakistaniPhone(phone) {
    const phoneRegex = /^[0-9]{3}-[0-9]{7}$/;
    return phoneRegex.test(phone);
}


const loginButton = document.querySelector('#login-button');
const signupButton = document.querySelector('#signup-button');
const modal = document.querySelector('.modal');
const signupForm = document.querySelector('#signup-form');
signupForm.style.display = 'none'; // Hide the signup form initially

const loginForm = document.querySelector('#login-form');
loginForm.style.display = 'none'; // Hide the signup form initially

if (localStorage.getItem('isloggedin')) {
    modal.style.display = "none";
}


// Function to show the signup form
function showSignupForm() {
    loginButton.style.display = 'none'; // Hide login button
    signupButton.style.display = 'none'; // Hide signup button
    signupForm.style.display = 'block'; // Show the signup form
}


// Function to show the signup form
function showLoginForm() {
    loginButton.style.display = 'none'; // Hide login button
    signupButton.style.display = 'none'; // Hide signup button
    loginForm.style.display = 'block'; // Show the signup form
}

// Attach event listener for Signup button
signupButton.addEventListener('click', showSignupForm);

// Handle Signup form submission
signupForm.addEventListener('submit', async (e) => {
    e.preventDefault(); // Prevent default form submission behavior

    const email = document.querySelector('#signup-email').value.trim();
    const password = document.querySelector('#signup-password').value.trim();

    // Form validation
    if (!email || !password) {
        alert('Please provide both email and password.');
        return;
    }

    try {
        // Send a POST request to the /register endpoint
        const response = await fetch('/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, // Ensure CSRF token is included
            },
            body: JSON.stringify({ email, password }),
        });

        if (response.ok) {
            const result = await response.json();
            alert(`Signup successful! Welcome, ${result.user.email}`);
            modal.style.display = 'none'; // Hide the modal
            localStorage.setItem('isloggedin', true);
        } else {
            const errorData = await response.json();
            alert(`Signup failed: ${errorData.message || 'Unknown error occurred.'}`);
        }
    } catch (error) {
        alert(`An error occurred: ${error.message}`);
    }
});

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


// Handle Login form submission
loginForm.addEventListener('submit', async (e) => {
    e.preventDefault(); // Prevent default form submission behavior

    const email = document.querySelector('#login-form #signup-email').value.trim();
    const password = document.querySelector('#login-form #signup-password').value.trim();

    // Form validation
    if (!email || !password) {
        alert('Please provide both email and password.');
        return;
    }

    try {
        // Send a POST request to the /login endpoint
        const response = await fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, // Ensure CSRF token is included
            },
            body: JSON.stringify({ email, password }),

        });

        if (response.ok) {
            const result = await response.json();
            alert(`Login successful! Welcome back, ${result.user.email}`);
            modal.style.display = 'none'; // Hide the modal
            localStorage.setItem('isloggedin', true);

        } else {
            const errorData = await response.json();
            alert(`Login failed: ${errorData.message || 'Unknown error occurred.'}`);
        }
    } catch (error) {
        alert(`An error occurred: ${error.message}`);
    }
});
