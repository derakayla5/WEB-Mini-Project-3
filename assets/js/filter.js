// Function to handle filter checkboxes
function filterProducts() {
    const checkboxes = document.querySelectorAll('.filter-checkbox');
    const selectedCategories = [];
    const selectedPrices = [];

    // Collect selected categories and prices
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            if (checkbox.value.includes('-')) {
                selectedPrices.push(checkbox.value);
            } else {
                selectedCategories.push(checkbox.value);
            }
        }
    });

    // Filter products based on selected categories and prices
    const products = document.querySelectorAll('.product-item');
    products.forEach(product => {
        const category = product.getAttribute('data-category');
        const price = parseInt(product.getAttribute('data-price'));

        const categoryMatch = selectedCategories.length === 0 || selectedCategories.includes(category);
        const priceMatch = selectedPrices.length === 0 || selectedPrices.some(range => {
            const [min, max] = range.split('-').map(Number);
            return price >= min && price <= max;
        });

        if (categoryMatch && priceMatch) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}

// Attach event listeners to filter checkboxes
const checkboxes = document.querySelectorAll('.filter-checkbox');
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', filterProducts);
});

// Trigger filter on page load
window.addEventListener('load', filterProducts);
