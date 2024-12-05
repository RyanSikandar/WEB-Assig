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