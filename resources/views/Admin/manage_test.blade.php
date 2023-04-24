@extends('admin.admin_main_master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
               <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Add Campus</h3>
                </div>

                <div class="card-body">
                    <form action="{{route('add.test')}}" method="Post">
                        @csrf
                        <div class="form-group">
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


                        <div class="form-group">
                            <h5>Sub -> Campus Select <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="sub_campus_id" id="select" class="form-control">
                                    
                                    <option value="" selected="" disabled="">Select Campus</option>
                                   
                                    
                                </select>
                                
                            </div>
                        </div>

                       


                        <div class="form-group">
                            <label for="">Test Name</label>
                            <input type="text" name="testname" id="" class="form-control">
                        </div>
    
                        <input type="submit" class="form-control btn btn-primary" value="Add Test">
                    </form>
                </div>
               </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Add University</h3>
                    </div>
    
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                             <tr>
                                 <th>id</th>
                                 <th>Campus Name</th>
                                 <th>SubCampus</th>
                                <th>Actions</th>
                             </tr>
 
                            </thead>

                            @foreach($data3 as $data3)
                             <tbody>
                                 <tr>
                                     <td>{{$data3->id}}</td>
                                     <td>{{ $data3['Campus']['campus_name']}}</td>
                                     <td>{{ $data3['SubCampus']['subcamus_name']}}</td>
                                     <td>{{$data3->TestName}}</td>
                                     <td>
                                        <a href="" class="btn btn-info">Update</a>
                                        <a href="" class="btn btn-danger">Delete</a>

                                     </td>
                                   </tr>
                                </tbody>
                             @endforeach
 
                            

                            

                         </table>
                    </div>
                   </div>
        
            </div>
        </div>
    </div>
@endsection