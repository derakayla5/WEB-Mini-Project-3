document.addEventListener("DOMContentLoaded", function() {
  const quantityInput = document.getElementById("stok");
  const subtotalSpan = document.getElementById("subtotal");

  // Fungsi untuk menghitung dan memperbarui subtotal
  function updateSubtotal() {
    const quantity = parseInt(quantityInput.value);
    const hargaPerBarang = parseFloat(quantityInput.getAttribute("data-harga"));

    // Hitung subtotal berdasarkan jumlah barang
    const subtotal = hargaPerBarang * quantity;

    // Tampilkan subtotal yang baru
    subtotalSpan.textContent = "Rp" + formatCurrency(subtotal);
  }

  // Panggil fungsi updateSubtotal() saat nilai jumlah barang berubah
  quantityInput.addEventListener("input", updateSubtotal);

  // Panggil updateSubtotal() saat halaman dimuat untuk menampilkan subtotal awal
  updateSubtotal();

  // Fungsi untuk memformat angka menjadi format mata uang
  function formatCurrency(amount) {
    return amount.toLocaleString('id-ID');
  }
});
                   