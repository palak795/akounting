<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <title>Laravel Full Text Search Tutorial</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">    
    </head>

   <body>
    <div class="container">
        <h1>Laravel Full Text Search Tutorial</h1>
      <form method="GET" id="Clear" action="{{route('mail.search')}}">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <p id="demo"></p>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary">Search</button>
                    <a class="btn btn-secondary" id="reset" href="#">Reset</a>
                </div>
                <div class="col-md-6">
                </div>  
            </div>
        </form>
   <br/>
      <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>city</th>
                <th>state</th>
                <th>zip</th>
                <th>Name on Card</th>
                <th>credit Card</th>

            </tr>

                @foreach($cruds as $user)

                {{-- @dump($user->first_name) --}}
                @dd($cruds);
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->state }}</td>
                    <td>{{ $user->zip }}</td>
                    <td>{{ $user->cardname }}</td>
                    <td>{{ $user->cardnumber }}</td>
                </tr>

                @endforeach
            {{-- <tr>
                <td colspan="3" class="text-danger">Result not found.</td>
            </tr> --}}
 

            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>city</th>
                <th>state</th>
                <th>zip</th>
                <th>Name on Card</th>
                <th>credit Card</th>

            </tr>


        </table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>


<script>

   document.getElementById("reset").addEventListener("click", function(event){
      event.preventDefault();
      window.location.href = "http://localhost/contact_form/public/index.php/mail-search";
    });

</script>


    </div>
</body>
</html>