function cekform() {
  // buat variabel untuk menampung inputan
  nama = document.getElementById("nama");
  olahraga = document.getElementById("olahraga");

  // cek apakah inputan kosong atau tidak
  if (nama.value == "") {
    alert("Nama tidak boleh kosong");
    nama.focus();
    return false;
  } else if (nama.value.length <= 3) {
    alert("Nama minimal 3 karakter");
    nama.focus();
    return false;
  } else if (olahraga.value == "") {
    alert("Olahraga belum dipilih");
    olahraga.focus();
    return false;
  } else {
    alert("Terima kasih telah mengisi form");
    return true;
  }
}
