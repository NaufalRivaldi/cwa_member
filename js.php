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
</script>