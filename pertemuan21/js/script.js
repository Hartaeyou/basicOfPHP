$(document).ready(function() {
    $('#keyword').on('keyup', function() {
        // munculkan loading
        $(".loadingBang").show();

        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val())
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            $("#container").html(data);
            $(".loadingBang").hide();
        })
    })
});