const button = document.querySelector('button');

function changeColor() {
    // Generate random RGB values
    //math.random values will be less than one
    const red = Math.floor(Math.random() * 256);
    const green = Math.floor(Math.random() * 256);
    const blue = Math.floor(Math.random() * 256);
    
    // Apply the random color to the body background
    document.body.style.backgroundColor = `rgb(${red}, ${green}, ${blue})`;
    // button.style.backgroundColor = `rgb(${red}, ${green}, ${blue})`;
    button.style.color = `rgb(${red}, ${green}, ${blue})`;
}