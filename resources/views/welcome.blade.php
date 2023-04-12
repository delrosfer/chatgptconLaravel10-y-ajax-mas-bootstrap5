<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laravel 10 con Chatgpt</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <style>
        *{
            margin: 0;
            padding: 0;
        }
        ::-webkit-scrollbar{
            width: 5px;
        }
        ::-webkit-scrollbar-track{
            background: #3d642d;
        }
        ::-webkit-scrollbar-thumb{
            background: #061128;
        }

    </style>
  <body style="background: #007fff;">
    <div>
        <div class="container-fluid m-0 d-flex p-2">
            <div class="pl-2" style="width: 40px; height: 50px; font-size: 180%;">
                <i class="fa fa-angle-double-right text-white mt-2"></i>
                
            </div>
            <div style="width: 50px; height: 50px;">
                <img src="https://cdn-icons-png.flaticon.com/512/147/147142.png" width="100%" height="100%" style="border-radius: 50px;">
            </div>
            <div class="text-white font-weight-bold ml-2 mt-2">
                MychatBot plusSilver
            </div>
        </div>
        <div style="background: #061128; height: 2px;"></div>
        <div id="content-box" class="container-fluid p-2" style="height: calc(100vh - 130px); overflow-y: scroll;">
            
            
        </div>
        <div class="container-fluid w-100 px-3 py-2 d-flex" style="background: #131f45; height: 62px;">
            <div class="mr-2 pl-2" style="background: gray; width: calc(100% - 45px);border-radius: 5px;">
                <input id="input" class="text-white font-weight-bold" type="text" name="input" style="background: none; width: 100%; height: 100%; border: 0; outline: none;">  
            </div>
            <div id="button-submit" class="text-center" style="background: orangered; height: 100%; width: 50px; border-radius: 50px;">
                <i class="fa fa-paper-plane text-white" aria-hidden="true" style="line-height: 45px;"></i>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $('#button-submit').on('click', function(){
        $value = $('#input').val();
        $('#content-box').append(`
            <div class="mb-2">
                <div class="float-right px-3 py-2" style="width: 270px; background: #4acfee;border-radius: 10px; float: right; font-size: 85%;">
                    `+ $value + `
                </div>
                <div style="clear: both;"></div>
            </div>`);
        

        $.ajax({
            type: 'post',
            url: '{{url('send')}}',
            data: {
                'input': $value
            },
            success: function(data){
                $('#content-box').append(`
            <div class="d-flex mb-2">
                <div class="mr-2" style="width: 45px; height: 45px;">
                    <img src="https://cdn-icons-png.flaticon.com/512/147/147142.png" width="100%" height="100%" style="border-radius: 50px;">
                    
                </div>
                <div class="text-white px-3 py-2" style="width: 270px;background: #13254b; border-radius: 10px; font-size: 85%;">
                    `+data+`
                    
                </div>
            </div>`)
                $value = $('#input').val('');
            }
        })
    })
</script>