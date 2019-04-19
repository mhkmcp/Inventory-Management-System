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
	          <div class="col-md-12">
	              <div class="panel panel-default">
	                  <div class="panel-heading">
	                      <h3 class="panel-title">Take Attendence  <a href="{{ route('all.attendence') }}" class="btn btn-sm btn-info pull-right">All Attendence</a></h3>
	                  </div>
	                  <h3 class="text-success" align="center">Today {{ date("d/m/y") }}</h3>
	                  <div class="panel-body">
	                      <div class="row">
	                          <div class="col-md-12 col-sm-12 col-xs-12">
	                             <table {{-- id="datatable" --}} class="table table-striped table-bordered">
	                                  <thead>
	                                      <tr>
	                                          <th>Name</th>
	                                          <th>Photo</th>
	                                          <th>Attendence</th> 
	                                      </tr>
	                                  </thead>

	                           
	                                  <tbody>
	                              <form action="{{ url('/insert-attendence') }}" method="post">
	                                @csrf  	
	                                  	@foreach($employee as $row)
	                                      <tr>
	                                          <td>{{ $row->name }}</td>
	                                          <td><img src="{{ $row->photo }}" style="height: 60px; width: 60px;"></td>
	                                 <input type="hidden" name="user_id[]" value="{{ $row->id }}">  
	                                         <td>
	                                         	<input type="radio" name="attendence[{{ $row->id }}]" value="Present" required=""> Present
	                                         	<input type="radio" name="attendence[{{ $row->id }}]" value="Absence">Absence
	                                         </td>
	                                         <input type="hidden" name="att_date" value="{{ date("d/m/y") }}">
	                                         <input type="hidden" name="att_year" value="{{ date("Y") }}">
	                                          <input type="hidden" name="month" value="{{ date("F") }}">

	                                      </tr>
	                                    @endforeach

	                                 
	                                  </tbody>

	                              </table>
	                              <button type="submit" class="btn btn-success" >Take Attendence</button>
	                               </form>  
	                          </div>
	                      </div>
	                  </div>
	              </div>
	          </div>
            </div>
        </div> <!-- container -->            
    </div> <!-- content -->
</div>


@endsection