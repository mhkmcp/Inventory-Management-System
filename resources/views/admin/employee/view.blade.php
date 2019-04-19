@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Echobvel</a></li>
                        <li class="active">IT</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
	           <!-- Basic example -->
	           <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">View Employee</h3></div>
                        <div class="panel-body">
                           
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                   <p>{{ $employee->name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Email</label>
                                   <p>{{ $employee->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Phone</label>
                                    <p>{{ $employee->phone }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword19">Address</label>
                                    <p>{{ $employee->address }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Expeience</label>
                                   <p>{{ $employee->experience }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword17">NID NO.</label>
                                    <p>{{ $employee->nid_no }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword41">Salary</label>
                                    <p>{{ $employee->salary }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Vacation</label>
                                   <p>{{ $employee->vacation }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">City</label>
                                   <p>{{ $employee->city }}</p>
                                </div>
                                <div class="form-group">
                                	<img style="height: 80px; width: 80px;" src="{{ URL::to($employee->photo) }}" />
                                    <label for="exampleInputPassword11">Photo</label>
                                  
                                </div>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>


@endsection