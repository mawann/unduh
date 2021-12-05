<?php
/*
Kegunaan   : Mengumumkan nilai hasil ujian yang bisa diunduh siswa.
Programmer : Mawan A. Nugroho.
Tanggal    : 22 Maret 2021.

Catatan:
File pengumuman harus berupa PDF.
Format nama file: nis-password.pdf.
File PDF diletakkan pada folder yang sama dengan script ini.
Bila ada 36 siswa, berarti harus ada 36 file PDF.
NIS dan password harus semuanya angka, tidak boleh ada huruf.
Telah disediakan satu file contoh untuk NIS = 111 dan password = 222.

Penyanggahan:
Dengan menggunakan script ini, anda menyetujui segala konsekuensi
yang akan terjadi, dan tidak akan menuntut pembuat script PHP ini
bila terjadi kerusakan atau kerugian yang diakibatkan secara langsung
ataupun tidak langsung karena script PHP ini. Dengan kata lain:
Bila server anda kena hack, anda dipecat, atau bahkan terjadi perang
Dunia ke tiga, saya tidak bertanggung jawab.
*/

$pesan = "";
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  if (ctype_digit($username) && ctype_digit($password)) {
    $namafile = $username . "-" . $password . ".pdf";
    if (file_exists($namafile)) {
      header("Location: $namafile");
      die();
    };
  };
  $pesan = "Error: NIS atau Kata Sandi tidak cocok.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Mawan A. Nugroho">
<title>Mengunduh Nilai Ujian</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>
.form-unduh {
  width: 340px;
  margin: 50px auto;
  font-size: 15px;
}
.form-unduh form {
  margin-bottom: 15px;
  background: #f7f7f7;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  padding: 30px;
}
.form-unduh h2 {
  margin: 0 0 15px;
}
.form-control, .btn {
  min-height: 40px;
  border-radius: 2px;
}
.btn {        
  font-size: 15px;
  font-weight: bold;
}
body {
  background-color:royalBlue;
}
</style>
</head>
<body>
  <div class="form-unduh">
    <form class="rounded" action="./" method="post">
      <h2 class="text-center">Nilai Ujian</h2>       
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="NIS" required="required">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required="required">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Unduh</button>
      </div>   
    </form>
    <p class="text-center text-warning"><?= $pesan; ?></p>
  </div>
</body>
</html>