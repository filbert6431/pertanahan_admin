<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form action="/tampilan" method="POST">
@csrf
Inputan id dokumen : <input type="text" name="dokumen_id" id="dokumen_id" required> <br>
Inputan ID persil  : <input type="text" name="persil_id" id="persil_id" required> <br>
Inputan Jenis Dokum: <input type="text" name="jenis_dokumen" id="jenis_dokumen" required> <br>
Inputan nomor HP   : <input type="text" name="nomor" id="nomor" required> <br>
Inputan keterangan : <input type="text" name="keterangan" id="keterangan" required> <br>
 <button type="submit">Kirim Data</button> </form>


</body>
</html>
