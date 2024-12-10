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