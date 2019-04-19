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
            @php
            $date= date("d/m/y");
            $expense=DB::Table('expenses')->where('date',$date)->sum('amount');
            @endphp

            <!-- Start Widget -->
            <div class="row">
	          <div class="col-md-12">
	          	 <h4 style=" color: red; font-size: 30px;" align="center">Total :{{ $expense }} Taka</h4>
	              <div class="panel panel-default">
	                  <div class="panel-heading">
	                      <h3 class="panel-title">Today Expense 

	                      	<a href="{{ route('add.expense') }}" class="btn btn-sm btn-info pull-right">Add New</a>
	                      </h3>
	                  </div>
	                  <div class="panel-body">
	                      <div class="row">
	                          <div class="col-md-12 col-sm-12 col-xs-12">
	                             <table id="datatable" class="table table-striped table-bordered">
	                                  <thead>
	                                      <tr>
	                                          <th>Details</th>
	                                          <th>Amount</th>
	                                          <th>Action</th>
	                                      </tr>
	                                  </thead>
	                                  <tbody>
	                                  	@foreach($today as $row)
	                                      <tr>
	                                          <td>{{ $row->details }}</td>
	                                          <td>{{ $row->amount }}</td>
	                                         <td>
	                                         	<a href="{{ URL::to('/edit-today-expense/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
	                                         </td>
	                                      </tr>
	                                    @endforeach
	                                  </tbody>
	                              </table>
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