<?php 
    include "header.php";
?>

    <h3 align="center">Tambah SPP</h3>
    <form action="proses_tambah_spp.php" method="post">
        
        Angkatan :
        <input type="text" name="angkatan" value="" class="form-control">
        Tahun :
        <input type = "text" name = "tahun" value = "" class = "form-control">
        Nominal :
        <input type = "text" name = "nominal" value = "" class = "form-control"><br>
        <input type="submit" name="simpan" value="Tambah spp" class="btn btn-primary">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>