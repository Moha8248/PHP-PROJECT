// scripts.js
document.addEventListener('DOMContentLoaded', () => {
    const cart = [];

    document.querySelectorAll('.product-card button').forEach((button, index) => {
        button.addEventListener('click', () => {
            addToCart(index);
        });
    });

    function addToCart(productIndex) {
        // Add logic to add product to the cart
        alert('Product added to cart!');
    }
});
