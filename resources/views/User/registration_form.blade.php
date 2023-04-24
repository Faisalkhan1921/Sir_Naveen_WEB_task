<!doctype html>
<html lang="en">
  <head>
    <title>Admission Portal - MUET</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body
        {
            background: grey;
        }
    </style>
  </head>
  <body>
      <div class="container mt-5 bg-light">
        <div class="row">
            <div class="col-md-12">
                <div class="cards">
                    <div class="card-header">
                        <h1 class="text-danger text-center">
                            Admission Portal of MUET
                            <a href="{{route('user.dashboard')}}" class="float-right btn-success btn-lg">Dashbaord</a>
                        </h1>
                    </div>

                    <div class="card-body mt-5">
                        <form action="{{route('registration.add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4">
                                <label for="" >Student Name</label>
                                <input type="text" name="sname" id="" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label for="" >Father Name</label>
                                    <input type="text" name="fname" id="" class="form-control">
                                    </div>
                                
                                <div class="col-md-4">
                                    <label for="" >Age</label>
                                    <input type="number" name="age" id="" class="form-control">
                                </div>
                            </div>

                            <div class="form-row mt-3">

                                <div class="col-md-4">
                                    <label for="">CNIC <span class="text-danger">*</span></label>
                                    <input type="number" name="cnic" id="" class="form-control">
                                </div>


                                <div class="col-md-4">
                                    <label for="">Phone <span class="text-danger">*</span></label>
                                    <input type="number" name="phone" id="" class="form-control">
                                </div>


                                <div class="col-md-4">
                                    <label for="">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="" class="form-control">
                                </div>



                            </div>

                            <div class="form-row mt-3">

                                

                              <div class="col-md-4">
                                <h5>Uni Select <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="campus_id" id="select" class="form-control">
                                    
                                    <option value="" selected="" disabled="">Select Uni</option>
                                    @foreach($data as $data)
                                    <option value="{{$data->id}}">{{$data->campus_name}}</option>
                                    @endforeach
                                    
                                </select>
                               
                            </div>
                              </div>
                                        
                              <div class="col-md-4">
                                <h5>Campus Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="sub_campus_id" id="select" class="form-control">
                                        
                                        <option value="" selected="" disabled="">Select Campus</option>
                                       
                                        
                                    </select>
                                    
                                </div>
                              </div>

                              <div class="col-md-4">
                                <h5>Test Type <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="test" id="select" class="form-control">
                                        
                                        <option value="" selected="" disabled="">Select Test</option>
                                       
                                        
                                    </select>
                                    
                                </div>
                              </div>

                            </div>


                            <div class="form-row mt-3">
                                <div class="col-md-6">
                                    <label for="">Upload Chalan</label>
                                    <input type="file" name="image" id="" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Date</label>
                                    <input type="date" name="date" id="" class="form-control">
                                </div>
                            </div>

                            <div class="form-row mt-5">
                                <div class="col-md-12">
                                    <input type="submit" value="Register" class="btn btn-success btn-lg text-center form-control">
                                    <a href="{{url('/')}}" class="btn btn-cancel text-center form-control">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    {{-- automatically selecting the campus of university  --}}
<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="campus_id"]').on('change', function(){
        var campus_id = $(this).val();
        if(campus_id) {
            $.ajax({
                url: "{{  url('/campus/sub_campus/ajax') }}/"+campus_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   var d =$('select[name="sub_campus_id"]').empty();
                      $.each(data, function(key, value){
                          $('select[name="sub_campus_id"]').append('<option value="'+ value.id +'">' + value.subcamus_name + '</option>');
                      });
                },
            });
        } else {
            alert('danger');
        }
    });
});
</script>


{{-- automatically selecting test of campus of university  --}}

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="sub_campus_id"]').on('change', function(){
          var sub_campus_id = $(this).val();
          if(sub_campus_id) {
              $.ajax({
                  url: "{{  url('/campus/test/ajax') }}/"+sub_campus_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="test"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="test"]').append('<option value="'+ value.id +'">' + value.TestName + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
  });
  </script>
  
  </body>
</html>