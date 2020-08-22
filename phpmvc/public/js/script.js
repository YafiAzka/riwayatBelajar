$(function() {

    $('.tombolTambahData').on('click', function() {
        $('#formModalLable').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form')[0].reset();
    });



    $('.tampilModalUbah').on('click', function() {

        $('#formModalLable').html('Ubah Data Siswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/siswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/siswa/getubah',
            data: {id : id},
            dataType: 'json',
            method: 'post',
            
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nis').val(data.nis);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);    
                
            }
        });

    });


    $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');


        Swal.fire({
            title: 'Kamu serius?',
            text: "Akan menghapus data ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus aja lah!'
            }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
            });
    });







});

