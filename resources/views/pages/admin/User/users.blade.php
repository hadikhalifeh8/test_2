
@extends('layouts.base')
@section('content')



                    
            
                
           
           
              
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<br>

          <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                Add User
            </button>
            <br><br>


         
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0" data-page-length="50"
                    style="text-align: center">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>process</th>
                      
                  </tr>
              </thead>
              <tbody>
                  

                  <?php $i=0; ?>
                  @foreach($users as $v_users)
                  <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{$v_users->name}}</td>
                                <td>{{$v_users->email}}</td>
                               
                               
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$v_users->id}}"
                                        title="edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$v_users->id}}"
                                        title="delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

          
              
        
              <!-- edit user -->
<div class="modal fade" id="edit{{$v_users->id}}" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="font-family: 'Cairo', sans-serif;"  class="modal-title" id="exampleModalLabel">
                    Update User Data
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <form action="{{ route('users.update', 'test') }}" method="Post" enctype="">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                    <div class="row">

                        <input id="id" type="hidden" name="id" class="form-control"
                                  value="{{$v_users->id}}">
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                               User Name :</label>
                            <input id="Name" type="text" name="name" class="form-control" value="{{$v_users->name}}">
                        </div>
                        
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                              User Email :</label>
                            <input id="Name" type="text" name="email" class="form-control" value="{{$v_users->email}}">
                        </div>
                        
                    </div>

                    <br>
                   

                    <div class=" col">
                                <label for="inputState">Department</label>
                                <select class="custom-select mr-sm-2" name="department_id" >
                                <option value="{{$v_users->dep_rltn->id}}"> {{$v_users->dep_rltn->name}} </option>
                                    @foreach($department as $v_department)
                                        <option value="{{$v_department->id}}">{{$v_department->name}}</option>
                                        @endforeach
                                </select>
                            </div>

                   
                    
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>

        </div>
    </div>
</div>


  <!-- delete user -->
  <div class="modal fade" id="delete{{$v_users->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                DELETE User
                                            </h1>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('users.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                               
                                                Are You Sure To Delete this user :  {{ $v_users->name }}  

                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $v_users->id }}">

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



 



  


                  
    @endforeach
              
           </table>
          </div>
          </div>
        </div>   
      </div>
  

      


          <!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add User
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{route('users.store')}}" method="POST" >
                    @csrf
                   
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                               User Name :</label>
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                        
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                              User Email :</label>
                            <input id="Name" type="text" name="email" class="form-control">
                        </div>
                        
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                              Password :</label>
                            <input id="Name" type="text" name="password" class="form-control">
                        </div>
                        
                    </div>
                    <br>

                    <div class=" col">
                                <label for="inputState">Department</label>
                                <select class="custom-select mr-sm-2" name="department_id" >
                                    <option selected disabled>Choose a Department ...</option>
                                    @foreach($department as $v_department)
                                        <option value="{{$v_department->id}}">{{$v_department->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                   

                    <br><br>
                    
                   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">submit</button>
            </div>
            </form>

        </div>
    </div>
</div>

        

@endsection



