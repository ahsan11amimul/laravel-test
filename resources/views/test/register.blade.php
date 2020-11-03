<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Name -Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 offset-sm-2">
        <div class="card  border-primary my-3">
          <div class="card-body">
            <a href="/" class="card-title text-left text-success">Home</a>
            <h5 class="card-title text-center">Register</h5>

          <form action="{{url('register')}}" method="POST">
            @csrf
            <div class="form-group row">
            <label for="firstname" class="col-form-label col-sm-4">First Name</label> 
            <div class="col-sm-8">
            <input type="text" class="form-control  @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="enter FirstName" value="{{old('firstname')}}"> 
            @error('firstname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            </div>
            <div class="form-group row">
            <label for="lastname" class="col-form-label col-sm-4">Last Name</label>
            <div class="col-sm-8">
            <input type="text" class="form-control  @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="enter LastName" value="{{old('lastname')}}">
             @error('lastname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
            </div>
            <div class="form-group row">
            <label for="organization" class="col-form-label col-sm-4">Organization</label>
            <div class="col-sm-8">
            <input type="text" class="form-control  @error('organization') is-invalid @enderror" id="organization" name="organization" placeholder="enter Organization Name" value="{{old('organization')}}">
             @error('organization')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
            </div>
            <div class="form-group row">
            <label for="city" class="col-form-label col-sm-4">City</label>
            <div class="col-sm-8">
            <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city" name="city" placeholder="enter City" value="{{old('city')}}">
            
           @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror</div>
            </div>
            <div class="form-group row">
            <label for="street" class="col-form-label col-sm-4">Street</label>
            <div class="col-sm-8">
            <input type="text" class="form-control  @error('street') is-invalid @enderror" id="street" name="street" placeholder="enter Street" value="{{old('street')}}">
            @error('street')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
            </div>
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
            <label for="Email" class="col-form-label col-sm-4">Email address</label>
            <div class="col-sm-8">
            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="Email" name="email" placeholder="enter email" value="{{old('email')}}">
             @error('email')
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
            <div class="form-group row">
            <label for="password_confirmation" class="col-form-label col-sm-4">Confirm Password</label>
            <div class="col-sm-8">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
            </div>
            </div>
            <div class="row">
              <div class="col-sm-8 offset-sm-4">
              <button type="submit" class="btn btn-primary w-100">Register</button>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-8 offset-sm-4">
              <a href="/login" class="btn btn-secondary w-100">Allready have account??Login</a>
            </div>
           
            </form>
          </div>
          </div>
        </div>

      </div>
    </div>
    
</body>
</html>