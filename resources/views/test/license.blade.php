<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Name -Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>


</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 offset-2">
            <div class="card" style="background-color:#9CC16D;color:#fff">
                 <h5 class="card-title text-center text-white">Create License</h5>
            <div class="card-body">
                <div id="result">
                  <table class="table table-border" style="background-color:#fff;color:black">
                      <tr>
                          <td>First name</td><td id="firstname"></td>
                      </tr>
                      <tr>
                          <td>Last name</td><td id="lastname"></td>
                      </tr>
                      <tr>
                          <td>Name Of organization</td><td id="organization"></td>
                      </tr>
                       <tr>
                          <td>Street</td><td id="street"></td>
                      </tr>
                       <tr>
                          <td>City</td><td id="city"></td>
                      </tr>
                       <tr>
                          <td>Phone</td><td id="phone"></td>
                      </tr>
                      <tr>
                          <td>Email</td><td id="email"></td>
                      </tr>
                      <tr>
                          <td>License</td><td id="license"></td>
                      </tr>
                  </table>
                </div>
           <form>
            @csrf
            <div class="form-group row">
            <label for="client"class=" col-form-label col-sm-4">Client Id</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="client" name="client" placeholder="Client Id">
            </div>
           </div>
           <div class="form-group row">
            <label for="license_key" class=" col-form-label col-sm-4">License Key</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="license_key" name="license_key">
            </div>
            </div>
            <div class="row">
            <div class="col-sm-8 offset-4">
            <p href="#"class="btn btn-primary w-100">Save</p>
           </div>
            </div>
            <div class="form-group row mt-3">
            <label for="month" class=" col-form-label col-sm-4">License For</label>
            <div class="col-sm-4 offset-4">
            <input type="text" class="form-control" id="month" name="month" pattern="(3|6|9)" title="only enter 3 6 or 9">
            </div>
           
            </div>
            <div class="row">
                <div class="col-sm-3 offset-9">
                <button type="submit" class="btn btn-secondary" id="key_submit">Create key</button>
                
            </div>
            <div class="col-sm-4 offset-8 mt-2">
                <p>Back to<a href="/login" class="text-warning"> Login </a>page</p>
            </div>    
            </div>
           
            </form>
            
        </div>
    </div>
           
        <div class="card second_form" style="background-color:#9CC16D;color:#fff">
          <h5 class="card-title text-center text-white">Enter License Key</h5>
        <div class="card-body">
        <form action="{{url('/update')}}" id="final_submit" method="POST">
                @csrf
            <div class="form-group row">
                <input type="hidden" name="client_id" id="client_id">
                <input type="hidden" name="expire_date" id="expire_date">
                <label for="license_key"class="col-form-label col-sm-4">License Key</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="license_key" name="license_key">  
                </div>
                </div>
               <div class="row">
                <div class="col-sm-8 offset-4">
                <button type="submit" class="btn btn-primary w-100" id="final_submit">Save</button>
                </div>
                <div class="col-sm-4 offset-8 mt-2">
                <p>Back to<a href="/login" class="text-warning"> Login </a>page</p>
                </div> 
                </div>

            </form>
          </div>
        </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
            $('#result').hide();
            $('.second_form').hide();
            //pressing enter
 $('#client').keypress(function(event){
            
           if(event.which==13)
           {   
               event.preventDefault();
              
               let id=$('#client').val();
               
               $.ajax({
                url:'get_info/'+id,
                method:"GET",
                success:function(html)
                {
                    //alert(html.data.firstname);
                    $('#firstname').text(html.data.firstname);
                    $('#lastname').text(html.data.lastname);
                    $('#organization').text(html.data.organization);
                    $('#street').text(html.data.street);
                    $('#city').text(html.data.city);
                    $('#phone').text(html.data.mobile);
                    $('#email').text(html.data.email);
                    $('#license').text("");
                    $('#result').show();
                }
               });
               
           }
         });

//create key button pressed
$('#key_submit').click(function(e){
           let month=$('#month').val();
           let id=$('#client').val();
           e.preventDefault();
           
              $.ajax({
                  url:"get_key/"+id,
                  type:"GET",
                  data:{expire_date:month},
                  success:function(html)
                  {
                    
                    $('#client_id').val(id);
                    $('#expire_date').val(month);
                    $('#license_key').val(html.data);

                    $('.second_form').show();
                  
                  }
              }) 
           
        })
        });
    </script>
    
</body>
</html>