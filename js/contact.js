const form = document.getElementById('contact-form');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevent default form submission

  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const subject = document.getElementById('subject').value;
  const body = document.getElementById('message').value;

  // Basic validation (can be enhanced)
  if (!name || !email || !subject || !body) {
    alert('Please fill in all required fields.');
    return;
  }

  // Send data using AJAX or fetch to your server-side script
  fetch('/send-email', { // Replace with your server-side script URL
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      name,
      email,
      subject,
      body
    })
  })
  .then(response => {
    if (response.ok) {
      alert('Your message has been sent successfully!');
      form.reset(); // Clear form after successful submission
    } else {
      alert('There was an error sending your message. Please try again later.');
    }
  })
  .catch(error => {
    console.error('Error sending message:', error);
    alert('An unexpected error occurred. Please try again later.');
  });
});