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
                        <div class="panel-heading"><h3 class="panel-title">View Customer</h3></div>
                        <div class="panel-body">
                           
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                   <p>{{ $customer->name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Email</label>
                                   <p>{{ $customer->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Phone</label>
                                    <p>{{ $customer->phone }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword19">Address</label>
                                    <p>{{ $customer->address }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Shop Name</label>
                                   
                                   @if($customer->shopname == NULL)
                                   NONE
                                   @else
                                    <p>{{ $customer->shopname }}</p>
                                   @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword17">City.</label>
                                    <p>{{ $customer->city }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword41">Account Name</label>
                                    <p>{{ $customer->account_name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Account Number</label>
                                   <p>{{ $customer->account_no }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">Bank Name</label>
                                   <p>{{ $customer->bank_name }}</p>
                                </div>
                                <div class="form-group">
                                    <img style="height: 80px; width: 80px;" src="{{ URL::to($customer->photo) }}" />
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