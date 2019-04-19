<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $supplier=DB::table('suppliers')->get();
        return view('admin.supplier.all')->with('supplier',$supplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:suppliers|max:255',
        'phone' => 'required|unique:suppliers|max:255',
        'address' => 'required',
        'photo' => 'required',
        'city' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['type']=$request->type;
        $data['shopname']=$request->shopname;
        $data['account_name']=$request->account_name;
        $data['account_no']=$request->account_no;
        $data['bank_name']=$request->bank_name;
        $data['city']=$request->city;

        $image=$request->file('photo');
        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='admin/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $customer=DB::table('suppliers')
                         ->insert($data);
              if ($customer) {
                 $notification=array(
                 'messege'=>'Successfully Supplier Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('supplier.all')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->route('supplier.all')->with($notification);
             }      
                
            }else{

              return Redirect()->back();
                
            }
        }else{
              return Redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier=DB::table('suppliers')
                ->where('id',$id)
                ->first();
        return view('admin.supplier.view', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier=DB::table('suppliers')->where('id',$id)->first();
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $id = $supplier->id;
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['type']=$request->type;
        $data['shopname']=$request->shopname;
        $data['account_name']=$request->account_name;
        $data['account_no']=$request->account_no;
        $data['bank_name']=$request->bank_name;
        $data['city']=$request->city;
        $image=$request->file('photo');

      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='admin/supplier/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('suppliers')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('suppliers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Supplier Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('supplier.all')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
        $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('suppliers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Supplier Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('supplier.all')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $id = $supplier->id;
        $delete=DB::table('suppliers')
                ->where('id',$id)
                ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('suppliers')
                  ->where('id',$id)
                  ->delete();
        if($dltuser) {
            $notification=array(
            'messege'=>'Successfully Supplier Deleted ',
            'alert-type'=>'success'
            );
            return Redirect()->route('supplier.all')->with($notification);
        }
        else {
          $notification=array(
             'messege'=>'error ',
             'alert-type'=>'success'
              );
             return Redirect()->back()->with($notification);
        }
    }
}
