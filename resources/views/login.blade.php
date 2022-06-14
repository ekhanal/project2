<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif
        </div>
        <div class="col-md-5">  <h1>Login Form</h1>
            <form action="" class="form-group" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Login</button>
                </div>
            </form>
            <a href="{{url('/register')}}">Register</a>

        </div>
    </div>
</div>