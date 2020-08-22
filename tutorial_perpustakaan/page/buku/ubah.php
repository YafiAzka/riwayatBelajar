<?php 
    $id = $_GET['id'];

    $sql = $koneksi ->query("select *from tb_buku where id='$id'");
    $tampil = $sql-> fetch_assoc();
    $tahun2 = $tampil['tahun_terbit'];
    $lokasi = $tampil['lokasi'];
 ?>


<div class="panel panel-default">
                        <div class="panel-heading">
                            Ubah Data Buku
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" name="judul" value="<?php echo $tampil['judul']; ?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input class="form-control" name="pengarang" value="<?php echo $tampil['pengarang']; ?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control" name="penerbit" value="<?php echo $tampil['penerbit']; ?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <select class="form-control" name="tahun" value="<?php echo $tampil['tahun']; ?>">
                                                <?php 
                                                $tahun= date("Y");

                                                for ($i=$tahun-30; $i <=$tahun ; $i++) 
                                                { 
                                                    if ($i==$tahun2){
                                                        echo '<option value="' .$i. '"selected>' .$i. '</option>';
                                                    } else
                                                      {
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                      }
                                                                                                        
                                                }
                                                 ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Isbn</label>
                                            <input class="form-control" name="isbn" value="<?php echo $tampil['isbn']; ?>"  />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah Buku</label>
                                            <input class="form-control" name="jumlah_buku" type="number" value="<?php echo $tampil['jumlah_buku']; ?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <select class="form-control" name="lokasi" value="<?php echo $tampil['lokasi']; ?>">
                                                <option value="rak 1" <?php if ($lokasi=='rak 1') 
                                                {echo "selected";} ?>>Rak 1</option>
                                                <option value="rak 2" <?php if ($lokasi=='rak 1') 
                                                {echo "selected";} ?>>Rak 2</option>
                                                <option value="rak 3" <?php if ($lokasi=='rak 1') 
                                                {echo "selected";} ?>>Rak 3</option>
                                            </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Tanggal Input</label>
                                            <input class="form-control" name="tgl_input" type="date" value="<?php echo $tampil['tidy_get_output(object)']; ?>" />
                                            
                                        </div>

                                        <div>
                                            <input class="btn btn-success" type="submit" name="simpan">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $judul=$_POST['judul'];
                        $pengarang=$_POST['pengarang'];
                        $penerbit=$_POST['penerbit'];
                        $tahun=$_POST['tahun'];
                        $isbn=$_POST['isbn'];
                        $jumlah_buku=$_POST['jumlah_buku'];
                        $lokasi=$_POST['lokasi'];
                        $tgl_input=$_POST['tgl_input'];

                        $simpan=$_POST['simpan'];

                        if ($simpan) {
                            $sql = $koneksi ->query("update tb_buku set judul='$judul' ,pengarang='$pengarang' ,penerbit='$penerbit' ,tahun_terbit='$tahun' ,isbn='$isbn' , jumlah_buku='$jumlah_buku' , lokasi='$lokasi' ,tgl_input='$tgl_input' where id='$id'");

                        if ($sql) {
                            ?>
                            <script type="text/javascript">
                                alert('Data Berhasil diubah');
                                window.location.href="?page=buku";
                            </script>
                            <?php  
                        }
                    }
                    ?>
                    
