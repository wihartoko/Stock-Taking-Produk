const productForm = document.getElementById('productForm');
const productTableBody = document.querySelector('#productTable tbody');

productForm.addEventListener('submit', function (event) {
    event.preventDefault();

    // Ambil nilai input
    const productName = document.getElementById('productName').value;
    const productQty = document.getElementById('productQty').value;
    const productPrice = document.getElementById('productPrice').value;

    // Hitung total nilai produk
    const totalValue = productQty * productPrice;

    // Tambahkan data produk ke tabel
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${productName}</td>
        <td>${productQty}</td>
        <td>${productPrice}</td>
        <td>${totalValue}</td>
    `;
    productTableBody.appendChild(row);

    // Reset form setelah submit
    productForm.reset();
});