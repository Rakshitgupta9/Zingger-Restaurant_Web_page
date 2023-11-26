// Function to toggle dark theme
function toggleDarkTheme() {
    document.body.classList.toggle('dark-theme');
    const isDarkTheme = document.body.classList.contains('dark-theme');
    localStorage.setItem('dark-theme', isDarkTheme);
}

// Check for the dark theme state in local storage
const isDarkTheme = JSON.parse(localStorage.getItem('dark-theme'));
if (isDarkTheme) {
    document.body.classList.add('dark-theme');
}

const themeToggle = document.getElementById('theme-toggle');
themeToggle.addEventListener('click', toggleDarkTheme);

// Rest of your code for page navigation
function index() {
    location.replace("index.html")
}

function menu() {
    location.replace("menu.html")
}

function table() {
    location.replace("table.html")
}

function gallery() {
    location.replace("gallery.html")
}

function about() {
    location.replace("about.html")
}


const addToCartButtons = document.querySelectorAll("button[id$='Button']");
    let totalPrice = 0;

    addToCartButtons.forEach(button => {
        button.addEventListener("click", () => {
            const itemName = button.id.replace("Button", "");
            const priceElement = document.getElementById(`${itemName}Price`);
            const itemPrice = parseInt(priceElement.textContent.replace(" ₹", ""));

            // Check if the current count is within the limit (0 to 5)
            const countElement = document.getElementById(`${itemName}Count`);
            const currentCount = parseInt(countElement.textContent);
            if (currentCount + 1 >= 0 && currentCount + 1 <= 5) {
                countElement.textContent = currentCount + 1;
                countElement.hidden = currentCount + 1 === 0;
                totalPrice += itemPrice;
                updateTotalPrice();
            }
        });
    });

    function updateTotalPrice() {
        const totalPriceElement = document.getElementById("totalPrice");
        totalPriceElement.textContent = totalPrice;
    }

    function adjustCount(itemName, increment) {
        const countElement = document.getElementById(`${itemName}Count`);
        const currentCount = parseInt(countElement.textContent);

        if (currentCount + increment >= 0 && currentCount + increment <= 5) {
            countElement.textContent = currentCount + increment;
            countElement.hidden = currentCount + increment === 0;
            const priceElement = document.getElementById(`${itemName}Price`);
            const itemPrice = parseInt(priceElement.textContent.replace(" ₹", ""));
            totalPrice += (itemPrice * increment);
            updateTotalPrice();
        }
    }