@include('maincss')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">

        <h3 align="center">Registration Details</h3>
        <button><a href="{{url('home')}}">Home</a></button>
        <div>
         

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>State</th>
                        <th>City</th>
                    </tr>
                </thead>
               
                <tbody>
                @foreach($data as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->state}}</td>
                        <td>{{$data->city}}</td>

                    </tr>
                    @endforeach
                </tbody>
                
            </table>

        </div>
    


    </div>
</body>
</html>