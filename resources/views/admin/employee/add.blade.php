@extends('layouts.app')

@section('content')

	<div class="content-page">
<!-- Start content -->
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
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add New Employee</h3></div>
                        <div class="panel-body">
                            <form method="POST" action="{{ route('employee.insert') }}" 
                            	enctype="multipart/form-data">
                            	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Experience</label>
                                    <input type="text" class="form-control" name="experience"  placeholder="Experience" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">NID Number</label>
                                    <input type="text" class="form-control" name="nid_no" placeholder="NID Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Salary</label>
                                    <input type="text" class="form-control" name="salary" placeholder="Salary" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Vacation</label>
                                    <input type="text" class="form-control" name="vacation"  placeholder="Vacation" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">City</label>
                                    <input type="text" class="form-control" name="city" placeholder="City" required>
                                </div>
                                 <div class="form-group">
                                 	<img id="image" src="#" />
                                    <label for="exampleInputPassword1">Photo</label>
                                    <input type="file" name="photo" accept="image/*"
                                    class="upload" required onchange="readURL(this);">
                                </div>
                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div> <!-- End row -->


        </div> <!-- container -->
                   
    </div> <!-- content -->


<script type="text/javascript">
	function readURL(input) {
		var reader = new FileReader();
		reader.onload = function(event) {
			$('#image')
				.attr('src', event.target.result)
				.width(80)
				.height(80);
		};
		reader.readAsDataURL(input.files[0]);
	}	
</script>

@endsection