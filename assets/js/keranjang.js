// Inisialisasi total harga awal saat halaman dimuat pertama kali
document.addEventListener('DOMContentLoaded', function() {
    hitungTotalHarga();
});

// Ambil semua input jumlah barang
const quantityInputs = document.querySelectorAll('input[name="stok"]');

// Tambahkan event listener ke setiap input
quantityInputs.forEach(input => {
    input.addEventListener('change', function() {
        // Ambil harga per barang dari data atribut
        const hargaPerBarang = parseFloat(input.dataset.harga);
        
        // Ambil jumlah barang yang diinputkan
        const jumlahBarang = parseInt(input.value);

        // Hitung harga total per barang
        const hargaTotal = hargaPerBarang * jumlahBarang;

        // Update tampilan harga total per barang
        const hargaTotalElement = input.closest('.d-flex').querySelector('.harga_barang');
        hargaTotalElement.textContent = formatRupiah(hargaTotal);

        // Hitung ulang total harga keseluruhan
        hitungTotalHarga();
    });
});

// Fungsi untuk menghitung total harga keseluruhan
function hitungTotalHarga() {
    let totalHarga = 0;

    // Ambil semua input jumlah barang
    const quantityInputs = document.querySelectorAll('input[name="stok"]');

    // Loop melalui setiap input jumlah barang
    quantityInputs.forEach(input => {
        // Ambil harga per barang dari data atribut
        const hargaPerBarang = parseFloat(input.dataset.harga);
        
        // Ambil jumlah barang yang diinputkan
        const jumlahBarang = parseInt(input.value);

        // Hitung harga total per barang
        const hargaTotal = hargaPerBarang * jumlahBarang;

        // Tambahkan harga total per barang ke total harga keseluruhan
        totalHarga += hargaTotal;
    });

    // Tampilkan total harga keseluruhan
    const subtotalElement = document.getElementById('subtotal');
    subtotalElement.textContent = formatRupiah(totalHarga);
}

// Fungsi untuk format angka ke format rupiah
function formatRupiah(angka) {
    let reverse = angka.toString().split('').reverse().join('');
    let ribuan = reverse.match(/\d{1,3}/g);
    let formatted = ribuan.join('.').split('').reverse().join('');
    return 'Rp' + formatted;
}
