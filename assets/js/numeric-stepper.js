document.addEventListener("DOMContentLoaded", function() {
  const quantityInput = document.getElementById("stok");
  const subtotalSpan = document.getElementById("subtotal");
  const btnMinus = document.getElementById("btn-minus");
  const btnPlus = document.getElementById("btn-plus");

  const hargaPerBarang = parseFloat(quantityInput.getAttribute("data-harga"));

  // Fungsi untuk menghitung dan memperbarui subtotal
  function updateSubtotal() {
    const quantity = parseInt(quantityInput.value);

    // Hitung subtotal berdasarkan jumlah barang
    const subtotal = hargaPerBarang * quantity;

    // Tampilkan subtotal yang baru
    subtotalSpan.textContent = "Rp" + formatCurrency(subtotal);
  }

  // Panggil fungsi updateSubtotal() saat nilai jumlah barang berubah
  quantityInput.addEventListener("input", updateSubtotal);

  // Panggil updateSubtotal() saat halaman dimuat untuk menampilkan subtotal awal
  updateSubtotal();

  // Event listener untuk tombol -
  btnMinus.addEventListener("click", function () {
    decreaseQuantity();
    updateSubtotal(); // Memanggil fungsi updateSubtotal setiap kali tombol - ditekan
  });

  // Event listener untuk tombol +
  btnPlus.addEventListener("click", function () {
    increaseQuantity();
    updateSubtotal(); // Memanggil fungsi updateSubtotal setiap kali tombol + ditekan
  });

  // Fungsi untuk mengurangi jumlah barang
  function decreaseQuantity() {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
      quantityInput.value = currentValue - 1;
    }
  }

  // Fungsi untuk menambah jumlah barang
  function increaseQuantity() {
    let currentValue = parseInt(quantityInput.value);
    let maxValue = parseInt(quantityInput.getAttribute("max"));
    if (currentValue < maxValue) {
      quantityInput.value = currentValue + 1;
    }
  }

  // Fungsi untuk memformat angka menjadi format mata uang
  function formatCurrency(amount) {
    return amount.toLocaleString('id-ID');
  }
});
