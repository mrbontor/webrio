$(document).ready(function(){
        $('#logText').html('Login');
        $('#logForm').submit(function(e){
            e.preventDefault();
            $('#logText').html('Checking...');
            var url = '<?=base_url(); ?>';
            var user = $('#logForm').serialize();
            var login = function(){
                $.ajax({
                    type: 'POST',
                    url: 'index.php/auth/login',
                    dataType: 'json',
                    data: user,
                    console.log(url);
                    success:function(response){
                        $('#message').html(response.message);
                        $('#logText').html('Login');
                        if(response.error){
                            $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                        }
                        else{
                            $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                            $('#logForm')[0].reset();
                            setTimeout(function(){
                                location.reload();
                            }, 2000);
                        }
                    }
                });
            };
            setTimeout(login, 2000);
        });
 
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    });