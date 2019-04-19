<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\productsImport;

class ProductController extends Controller
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
        $product=DB::table('products')->get();
        return view('admin.product.all_product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;
         $image=$request->file('product_image');
        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/Products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;
                $product=DB::table('products')
                         ->insert($data);
              if ($product) {
                 $notification=array(
                 'messege'=>'Successfully Product Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = DB::table('products')
             ->join('categories','products.cat_id','categories.id')
             ->join('suppliers','products.sup_id','suppliers.id')
             ->select('categories.cat_name','products.*','suppliers.name')
             ->where('products.id',$id)
             ->first();
        return view('admin.product.view_product', compact('prod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod=DB::Table('products')->where('id',$id)->first();
        return view('admin.product.edit_product', compact('prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;

        $image=$request->file('product_image');

      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Products/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['product_image']=$image_url;
             $img=DB::table('products')->where('id',$id)->first();
             $image_path = $img->product_image;
             $done=unlink($image_path);
          $product=DB::table('products')->where('id',$id)->update($data); 
         if ($product) {
                $notification=array(
                'messege'=>'Product Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('admin.product.all.product')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
        $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['product_image']=$oldphoto;  
          $user=DB::table('products')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Product Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('admin.product.all.product')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=DB::table('products')
                ->where('id',$id)
                ->first();
         $photo=$delete->product_image;
         unlink($photo);
         $dltprod=DB::table('products')
                  ->where('id',$id)
                  ->delete();
         if ($dltprod) {
                 $notification=array(
                 'messege'=>'Successfully Product Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('admin.product.all.product')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
        }     
    }


    //products import and export
    public function ImportProduct()
    {
      return view('admin.product.import_product');
    }

   public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }


     public function import(Request $request) 
    {
        $import=Excel::import(new ProductsImport, $request->file('import_file'));
         if ($import) {
                $notification=array(
                'messege'=>'Product Import Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('admin.product.all.product')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          
    }
}
