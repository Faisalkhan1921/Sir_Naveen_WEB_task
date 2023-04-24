@extends('admin.admin_main_master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
               <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Add University</h3>
                </div>

                <div class="card-body">
                    <form action="{{route('add.uni')}}" method="Post">
                        @csrf
                        <div class="form-group">
                            <label for="">University Name</label>
                            <input type="text" name="uniname" id="" class="form-control">
                        </div>
    
                        <input type="submit" class="form-control btn btn-primary" value="Add University">
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
                                 <th>University Name</th>
                                <th>Actions</th>
                             </tr>
 
                            </thead>

                            @foreach($data as $data)
                             <tbody>
                                 <tr>
                                     <td>{{$data->id}}</td>
                                     <td>{{$data->campus_name}}</td>
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