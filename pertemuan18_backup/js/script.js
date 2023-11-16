// ambil elemen yang dibutuhkan dengan penulusuran DOM (Document Object Model)
var keyword = document.getElementById('keyword');
var tombol_cari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// trigger
// tambyhakan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){
    // buat object ajax
    var xhr = new XMLHttpRequest();
    // cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if (xhr.readyState==4 && xhr.status==200){
            container.innerHTML =xhr.responseText;
        };
    }
    // eksekusi ajax
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send()
});