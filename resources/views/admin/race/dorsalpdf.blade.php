
<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

    <body>
    
    <br>
    <br>


        <div class="text-center" style="margin-top: 50px; text-align:center;display:flex; flex-direction:row">
            <h1 >{{$race->name}}</h1>
            <div>
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->generate('http://192.168.1.124:8000/admin/race/stop-timer/'.$race->id.'/'.$user->id)) !!} ">
            </div>
            <h1 >{{$number}}</h1>
        
        </div>
    </body>
</html>
