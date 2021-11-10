@include('maincss')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

</head>
<body>
    <div class="container">
        <div align="center" >
            <h1>Registration Form</h1>
        </div>
      
      
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
                <form action="{{url('regform')}}" method="post">
                    <div class="form-group">
                        @csrf
                        <label >Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter The Name">
                        @if($errors->has('name'))
                        <div class="text-danger">{{$errors->first('name')}}</div>
                        @endif
                        
                        <label >Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter The Email">
                        @if($errors->has('name'))
                        <div class="text-danger">{{$errors->first('name')}}</div>
                        @endif

                        <label >Phone No</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter The Phone Number">
                        @if($errors->has('name'))
                        <div class="text-danger">{{$errors->first('name')}}</div>
                        @endif
                        <br><br>
                        <span>State</span>
                        <select style="width:200px" name="state" class="statelist">
                            <option value="0" disabled="true" selected="true">Select</option>
                            @foreach($state as $state)
                            <option value="{{$state->id}}">{{$state->state}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <span>City</span>
                        <select style="width:200px" name="city" class="citylist">
                            <option value="0" disabled="true" selected="true">Select</option>
                            
                        </select>
                        <br><br>
                        <input type="submit" class="btn btn-primary">
                        <a href="{{url('/display')}}" class="btn btn-success">List</a>


                    </div>
                </form>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
             <script type="text/javascript">
                $(document).ready(function()
                {
                    $(document).on('change','.statelist',function()
                    {
                        // console.log("its changed");

                        var state_id=$(this).val();
                        // console.log(state_id);
                        
                        var div=$(this).parent();

                        var op=" ";


                        $.ajax({
                            type:'get',
                            url:'{!!URL::to('/select_state')!!}',
                            data:{'id':state_id},
                            success:function(data){
                                // console.log('success');

                                // console.log(data);

                                // console.log(data.length);
                                op+='<option value="0" selected disabled>chose city</option>';
                                for(var i=0;i<data.length;i++){
                                    op+='<option value="'+data[i].id+'">'+data[i].city+'</option>';
                                }
                                div.find('.citylist').html(" ");
                                div.find('.citylist').append(op);
                            },
                            error:function(){

                            }
                        })
                    });

                });
               
            </script>
        
    </div>
    
</body>
</html>