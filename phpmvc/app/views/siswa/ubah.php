
<div class="container">
    <h1><?= $data['judul'] ?></h1>

    <form action="<?= BASEURL ?>/siswa/ubah" method="POST">
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $data['sis']['id']; ?>" >
        <label for="nama">Nama</label>
        <input type="nama" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= $data['sis']['nama']; ?>">
        <label for="nis">NIS</label>
        <input type="number" class="form-control" id="nis" name="nis"    placeholder="NIS" value="<?= $data['sis']['nis']; ?>">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="<?= $data['sis']['email']; ?>">
        <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangakat Lunak</option>
                <option value="Teknik Jaringan Akses">Teknik Jaringan Akses</option>
                <option value="Multimedia">Multimedia</option>
            </select>
        <button type="submit" class="btn btn-primary mt-2">Ubah Data</button>
    </div>


    </form>



</div>