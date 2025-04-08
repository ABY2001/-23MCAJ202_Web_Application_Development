
// Get DOM elements
const content = document.getElementById('content');
const image = document.getElementById('hoverImage');
const text = document.getElementById('hoverText');

// Store original content
const originalImage = image.src;
const originalText = text.textContent;

// Add mouseover event listener
content.addEventListener('mouseover', function() {
    image.src = 'L2-Empuraan.jpg';
    text.textContent = 'You hovered over me';
});

// Add mouseout event listener to revert back
content.addEventListener('mouseout', function() {
    image.src = originalImage;
    text.textContent = originalText;
});
