<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Name -Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 offset-sm-2">
        <div class="card  border-primary my-3">
           @if (session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Congrats !</strong> {{session('success')}}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div>
           @endif
          <div class="card-body">
            <a href="/" class="card-title text-left text-success">Home</a>
            <a href="/license" class="card-title  text-warning">Create License</a>
            <h5 class="card-title text-center">Login</h5>
           @if (session('error'))
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong>Woops !</strong> {{session('error')}}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div>
           @endif
          <form action="{{url('login')}}" method="POST">
            @csrf
            
            <div class="form-group row">
            <label for="mobile" class="col-form-label col-sm-4">Mobile Number</label>
            <div class="col-sm-8">
            <input type="text" class="form-control  @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="enter Mobile number" value="{{old('mobile')}}">
             @error('mobile')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
            </div>

            <div class="form-group row">
            <label for="password" class="col-form-label col-sm-4">Password</label>
            <div class="col-sm-8">
            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password">
             @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
           </div>

            <div class="row">
              <div class="col-sm-8 offset-sm-4">
              <button type="submit" class="btn btn-primary w-100">Login</button>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-8 offset-sm-4">
              <a href="/register" class="btn btn-secondary w-100">Do not have account??Register</a>
            </div>
            </div>
           
            </form>
          </div>
          </div>
        </div>

      </div>
    </div>
    
</body>
</html>