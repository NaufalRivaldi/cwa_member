<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $('.view-btn').click(function(){
            var data = $('#form-member').serialize();
            $.ajax({
                type: 'POST',
                url : 'view-member.php',
                data: data,
                success: function(data){
                    $('.tampil-data').html(data);
                }
            });
        });
    });
    
    function convertToMin(objek) {
        separator = "-";
        a = objek.value;
        b = a.replace(/[^\d]/g, "");
        c = "";
        panjang = b.length;
        j = 0;
        for (i = panjang; i > 0; i--) {
            j = j + 1;
            if (((j % 4) == 1) && (j != 1)) {
                c = b.substr(i - 1, 1) + separator + c;
            } else {
                c = b.substr(i - 1, 1) + c;
            }
        }
        objek.value = c;
    }

    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>