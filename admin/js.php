<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

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

        $('.nav-link').click(function(){
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });

        // datatable
        $('#table_id').DataTable();
    });

    // undi
    var winner_box = $('.form-custom').val();
    var val = $('.val').val();
    var winner = '';

    function showWinner(){
        console.log('yyee');
        if(val == "0"){
            $('.shake').html('Stop');
            $('.shake').removeClass('btn-warning');
            $('.shake').addClass('btn-danger');

            val = 1;
            shake();
        }else{
            $('.shake').html('Shake');
            $('.shake').removeClass('btn-danger');
            $('.shake').addClass('btn-warning');

            val = 0;
        }
    }

    function shake(){
        // $.getJSON("json/member.json", function(data){
        //     $.each(data, function(key, val){
        //         var id = setInterval(kocok, 10);
        //         function kocok(){
        //             if(val=="0"){
        //                 clearInterval(id);
        //             }else{
        //                 var lucky = key[Math.floor((Math.random()*key.length) + 0)];
        //                 console.log(val.kdmember);
        //             }
        //         }
        //     });
        // });

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
            var member = JSON.parse(this.responseText);
            var id = setInterval(kocok, 10);
            function kocok(){
                if(val == 0){
                    clearInterval(id);
                } else {
                    var lucky = member[Math.floor((Math.random()*member.length) + 0)];
                    $('.form-custom').val(lucky.kdmember + " - " + lucky.nm_member);
                }
            }
            }
        };
        xhttp.open("GET", "json/member.json", true);
        xhttp.send();
    }
</script>