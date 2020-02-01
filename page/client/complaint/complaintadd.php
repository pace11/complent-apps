<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Komplain Klien</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form tambah komplain klien</h4>
                    </div>
                    <div class="card-body">
                        <form action="?page=complaintaddpro" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Deskripsi Komplain<small class="text-danger">*</small></label>
                                        <textarea class="form-control" name="complent" placeholder="masukkan deksripsi komplain ..." autocomplete="off" required></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                        <a href="?page=complaint" class="btn btn-secondary">Batal</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2020 <div class="bullet"></div> Bearlink
    </div>
    <div class="footer-right">
        V 1.0.0
    </div>
</footer>
</div>
</div>
<?php
    include "script.php";
    include "jq.php";
?>
