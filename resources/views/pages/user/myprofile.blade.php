@extends('layouts.base')
@section('content')

                 <!-- Vertical Steps Example -->
                
                 <div class="row">
                            <div class="col-md-12">
                           
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">My Account</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="wizard-vertical">
                                            <h3>Account</h3>
                                            <section>

       <form action="{{route('myprofile.update', 'test')}}" method="POST" >
       {{ method_field('patch') }}
                {{ csrf_field() }}

             
                                            <div class="row">

                        <input id="id" type="hidden" name="id" class="form-control"
                                  value="{{Auth::user()->id }}">
                    </div>
                   

                                                <div class="form-group row">
                                                    <label class="col-lg-2 control-label" for="userName1">User name *</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control required" id="name" name="name" type="text" value="{{Auth::user()->name }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 control-label" for="confirm1">email *</label>
                                                    <div class="col-lg-10">
                                                        <input id="confirm1" name="email" type="text" class="required form-control" value="{{Auth::user()->email}}">
                                                    </div>
                                                </div>

                                                <div class=" form-group row">
                                <label for="col-lg-2 control-label">Department</label>
                                <select class="custom-select mr-sm-2" name="department_id" >
                                <option value="{{Auth::user()->dep_rltn->id}}"> {{Auth::user()->dep_rltn->name}} </option>
                                    @foreach($department as $v_department)
                                        <option value="{{$v_department->id}}">{{$v_department->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        <br>


                                                <div class="form-group row">
                                                    <label class="col-lg-2 control-label" for="password1"> Password *</label>
                                                    <div class="col-lg-10">
                                                        <input id="password1" name="password" type="text" class="required form-control">
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">submit</button>
            </div>

</form>
                                               
                                                
                                            </section>
                                     
                                        
                                           
                                        </div>
                                        <!-- End #wizard-vertical -->
                                    </div>
                                    <!-- End card-body -->
                                </div>
                                <!-- End card -->
                            
                            </div>
                            <!-- end col -->

                        </div>
                       


       
                        @endsection

