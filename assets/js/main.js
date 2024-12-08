// Fungsi untuk menampilkan produk di halaman
function displayProducts() {
    const productGrid = document.getElementById('product-grid');
    products.forEach(product => {
        // Membuat elemen untuk setiap produk
        const productCard = document.createElement('div');
        productCard.classList.add('product-card');
        productCard.innerHTML = `
            <img src="${product.imageUrl}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>Harga: $${product.price.toFixed(3)}</p>
            <a href="${product.link}" target="_blank class="buy-now">Beli Sekarang</a>
        `;
        productGrid.appendChild(productCard);
    });
}

// Menjalankan fungsi untuk menampilkan produk saat halaman dimuat
displayProducts();