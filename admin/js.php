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
        if(val == "0"){
            $('.shake').html('Stop');
            $('.shake').removeClass('btn-warning');
            $('.shake').addClass('btn-danger');
            $('.shake').addClass('post-member')

            val = 1;
            shake();
        }else{
            // post data pemanang
            postMember();

            $('.shake').html('Shake');
            $('.shake').removeClass('btn-danger');
            $('.shake').addClass('btn-warning');
            $('.shake').removeClass('post-member')

            val = 0;
        }
    }

    function switchHadiah(){
        var id_hadiah = $('#hadiah').val();
        $('.hadiah').val(id_hadiah);
        $('#kdmember').val('');
        $('#form-hadiah').removeClass('show');
        $('#form-hadiah').addClass('hide');
        $('#btn-hadiah').removeClass('hide');
        $('#btn-hadiah').addClass('show');
    }

    function switchBtn(){
        $('#form-hadiah').removeClass('hide');
        $('#form-hadiah').addClass('show');
        $('#btn-hadiah').removeClass('show');
        $('#btn-hadiah').addClass('hide');
    }

    function shake(){
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
                    if(lucky.id_hadiah == 0){
                        $('.form-custom').val(lucky.kdmember + " - " + lucky.nm_member);
                        $('.kdmember').val(lucky.kdmember);
                    }
                }
            }
            }
        };
        xhttp.open("GET", "json/member.json", true);
        xhttp.send();
    }

    function postMember(){
        var data = $('#form-member').serialize();
        $.ajax({
            type: 'POST',
            url : 'proses/update-member.php',
            data: data,
            success: function(data){
                console.log(data);
            }
        });
    }
</script>