<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductsController extends Controller
{
    //Middleware that allows only AUTHENTICATED admins to access this page
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(3);
        return view('admin.product.index')->withPro($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Requests the image from the form
        $formInput[]=$request->imageName;

        //Server-side validation
        $this->validate($request, [
                'name'    => 'required|min:5|max:15',
                'email' => '',
                'description' => '',
                'phone' => 'required|min:10|max:15',
                'age'      => 'required|integer',
                'imageName'=>'image|mimes:png,jpg,jpeg,gif|max:100'
        ]);

        //Request image
        $image=$request->imageName;

        if($image){
            //Extract the name
            $fileName = $image->getClientOriginalName();
            //Move to the storage folder
            $image->move('images/uploads',$fileName);
            // $formInput['image']=$fileN;
            $formInput['image']=$fileName;
        }

        //Stores in the database
        $product = new Product;

        $product->name = $request->name;
        $product->email = $request->email;
        $product->description = $request->description;
        $product->imageName = $fileName;
        $product->age = $request->age;
        $product->phone = $request->phone;
        //var_dump($product);
        //die();

        $product->save();

        Session::flash('success', 'Contact &nbsp;'.$request->name.'&nbsp;was successfully added');

        //redirect to another page
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find a specific contact in the database
        $pro = Product::find($id);

        //Return to view together with the variable
        return view('admin.product.edit')->withProd($pro);
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
         //Validate the data
        $pro= Product::find($id);

        //Requests the image from the form
        $formInput[]=$request->imageName;

        $this->validate($request, array(
            'email' => '',
            'description' => '',
            'phone' => 'required|min:10|max:15',
            'age'      => 'required|integer',
            'imageName'=>'image|mimes:png,jpg,jpeg,gif|max:100'
        ));

        //Request image
        $image=$request->imageName;

        if($image){
            //Extract the name
            $fileName = $image->getClientOriginalName();
            //Move to the storage folder
            $image->move('images/uploads',$fileName);
            // $formInput['image']=$fileN;
            $formInput['image']=$fileName;
        }   

         //Save the data to the database
         $pro= Product::find($id);

         $pro->email = $request->input('email');
         $pro->description = $request->input('description');
         $pro->phone = $request->input('phone');
         $pro->age = $request->input('age');
         $pro->imageName = $fileName;

         $pro->save();

         //Set the flash data with success message
        Session::flash('success', 'Contact &nbsp;'.$request->name.'&nbsp;was successfully updated');

         //Redirect with flash data to posts.show
        return redirect()->route('product.index');
    }

    //Fetch the product from dtabase depending on its id
    public function delete($id){
        $product = Product::find($id);
        return view('admin.product.delete')->withPro($product);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //finds the post we want to delete from our database and stores in a variable called post
        $pro = Product::find($id);

        //next is deleting the post using delete method from eloquent
        $pro->delete();

        Session::flash('success', 'The contact was successfully deleted');

        //Redirects to posts.index page
        return redirect()->route('product.index');
    }
}
