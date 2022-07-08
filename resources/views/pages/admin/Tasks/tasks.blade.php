
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
                Add Task
            </button>
            <br><br>


         
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0" data-page-length="50"
                    style="text-align: center">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>User</th>
                      <th>Department</th>
                      <th>process</th>

                      
                  </tr>
              </thead>
              <tbody>
                  

                  <?php $i=0; ?>
                  @foreach($task as $v_task)
                  <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{$v_task->name}}</td>
                                <td>{{$v_task->usr_rltn->name}}</td>
                                <td>{{$v_task->dep_rltn->name}}</td>
                               
                               
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$v_task->id}}"
                                        title="edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$v_task->id}}"
                                        title="delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

          
     <!-- edit task -->
<div class="modal fade" id="edit{{$v_task->id}}" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="font-family: 'Cairo', sans-serif;"  class="modal-title" id="exampleModalLabel">
                    Update tasks Data
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <form action="{{ route('tasks.update', 'test') }}" method="Post" enctype="">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                    <div class="row">

                        <input id="id" type="hidden" name="id" class="form-control"
                                  value="{{$v_task->id}}">
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Name :</label>
                            <input id="Name" type="text" name="name" class="form-control" value="{{$v_task->name}}">
                        </div>
                        
                    </div>

                    <br>

                    <div class=" col">
                                <label for="inputState">user</label>
                                <select class="custom-select mr-sm-2" name="user_id" >
                                <option value="{{$v_task->usr_rltn->id}}"> {{$v_task->usr_rltn->name}} </option>
                                    @foreach($user as $v_user)
                                        <option value="{{$v_user->id}}">{{$v_user->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <br>

                 
                  

                            <div class=" col">
                                <label for="inputState">Department</label>
                                <select class="custom-select mr-sm-2" name="department_id" >
                                <option value="{{$v_task->dep_rltn->id}}"> {{$v_task->dep_rltn->name}} </option>
                                    @foreach($depart as $v_department)
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
              
        

  <!-- delete task -->
  <div class="modal fade" id="delete{{$v_task->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                DELETE task
                                            </h1>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('tasks.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                               
                                                Are You Sure To Delete this task :  {{ $v_task->name }}  

                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $v_task->id }}">

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
                    Add Task
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{route('tasks.store')}}" method="POST" >
                    @csrf
                   
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Name :</label>
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                        
                    </div>

                    <br>

                    <div class=" col">
                                <label for="inputState">user</label>
                                <select class="custom-select mr-sm-2" name="user_id" >
                                    <option selected disabled>Choose a user ...</option>
                                    @foreach($user as $v_user)
                                        <option value="{{$v_user->id}}">{{$v_user->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <br>

                 
                  

                    <div class=" col">
                                <label for="inputState">Department</label>
                                <select class="custom-select mr-sm-2" name="department_id" >
                                    <option selected disabled>Choose a Department ...</option>
                                    @foreach($depart as $v_depart)
                                        <option value="{{$v_depart->id}}">{{$v_depart->name}}</option>
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



