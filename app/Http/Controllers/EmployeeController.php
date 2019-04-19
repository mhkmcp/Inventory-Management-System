<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('admin.employee.add');
    }

    public function show()
    {
        $employees = Employee::all();
        return view('admin.employee.all', compact('employees'));
    }

    public function store(Request $request)
    {
    	// return $request;
    	$validatedData = $request->validate([
    		'name' 		=> 'required|max:100',
    		'email' 	=> 'required|unique:employees|max:255',
    		'nid_no' 	=> 'required',
    		'address'	=> 'required|max:255',
    		'phone' 	=> 'required|max:255',
    		'photo'		=> 'required',
    		'salary' 	=> 'required',
    		'vacation' 	=> 'required',
    		'experience'=> 'required',
    		'city' 		=> 'required',
    	]);

    	$data = array();
    	$data['name'] 		= $request->name;
    	$data['email'] 		= $request->email;
    	$data['phone'] 		= $request->phone;
    	$data['address'] 	= $request->address;
    	$data['nid_no'] 	= $request->nid_no;
    	$data['photo'] 		= $request->photo;
    	$data['salary'] 	= $request->salary;
    	$data['experience'] = $request->experience;
    	$data['city'] 		= $request->city;
    	$data['vacation'] 	= $request->vacation;

    	$image=$request->file('photo');

        if ($image) 
        {
            $image_name= str_random(15);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'admin/employee/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            if ($success) {
                $data['photo'] = $image_url;
                $employee = DB::table('employees')
                    		->insert($data);

              	if ($employee) {
	                $notification=array(
		                'messege'=>'Successfully Employee Inserted ',
		                'alert-type'=>'success'
	                );
                	return Redirect()->route('home')->with($notification);                      
             	} else {
              		$notification = array(
	                 	'messege'=>'error ',
	                 	'alert-type'=>'success'
                  	);
                 	return Redirect()->back()->with($notification);
             	}      
                
        	} else {
          		return Redirect()->back();
        	
        	}

    	} else {
    		return Redirect()->back();
    	}
    }


    //view a single employee
    public function ViewEmployee($id)
    {
        $employee = DB::table('employees')
                    ->where('id',$id)
                    ->first();
        return view('admin.employee.view', compact('employee'));     
    }

    //delete a single employee
    public function DeleteEmployee($id)
    {
         $delete = DB::table('employees')
                   ->where('id',$id)
                   ->first();
         $photo = $delete->photo;
         unlink($photo);
         $dltuser = DB::table('employees')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Employee Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
        } 
        else {
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
        }               
    }

//single emplyee data show for edit
    public function EditEmployee($id)
    {
        $edit=DB::table('employees')
             ->where('id',$id)
             ->first();
        return view('admin.employee.edit', compact('edit'));     
    }
//update a single employee
    public function UpdateEmployee(Request $request,$id)
    {
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'nid_no' => 'required|max:255',
        'address' => 'required',
        'phone' => 'required|max:13',
        'salary' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image=$request->photo;

      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/employee/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('employees')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('employees')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Employee Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.employee')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
         $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('employees')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Employee Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.employee')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }
}
