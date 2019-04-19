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
                        <div class="panel-heading"><h3 class="panel-title">Update Expense
                        	
                        </h3> 	
                        </div>
                        

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                      
                        <div class="panel-body">
                            <form role="form" action="{{ url('/update-expense/'.$tdy->id) }}" method="post" >
                            	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Expense details</label>
                                  <textarea class="form-control" rows="4" name="details">
                                  	{{ $tdy->details }}
                                  </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Amont</label>
                                    <input type="text" class="form-control" name="amount" value="{{ $tdy->amount }}" required>
                                </div>
                                <div class="form-group">
                                   <input type="hidden" class="form-control" name="date" value="{{ date("d/m/y") }}">
                                </div>
                                <div class="form-group">
                                   <input type="hidden" class="form-control" name="month" value=" {{ date("F") }}">
                                   <input type="hidden" class="form-control" name="year" value=" {{ date("Y") }}">
                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>


@endsection