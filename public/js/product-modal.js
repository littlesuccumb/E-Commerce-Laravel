$(document).ready(function () {
    // Menampilkan modal dan mengatur sumber gambar saat tombol "Detail" diklik
    $('.btn-secondary').on('click', function () {
        var imageUrl = $(this).data('image');
        $('#productImage').attr('src', imageUrl);
        $('#productModal').modal('show');
    });
});
