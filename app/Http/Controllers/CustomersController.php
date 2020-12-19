<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table( "customers")
            ->leftJoin( "shops" , "customers.Shop" , "=", "shops.id")
            ->select("customers.*", "shops.Name as shopName")
            ->paginate(10);
        return view("customers.index")->with( ["customers" => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::all();
        return view("customers.create")->with( [ "shops" => $shops]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request , [
           'firstName'  => 'required',
           'lastName'   => 'required'
        ]);

        $customer = new Customer();
        $customer->FirstName = $request->firstName;
        $customer->LastName  = $request->lastName;
        $customer->Shop      = $request->shop;
        $customer->Company   = 2;
        $customer->Email     = $request->email;
        $customer->Phone     = $request->phone;

        $customer->save();

        return back()->with(["message" => "Customer Added Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = DB::table( "customers")
            ->where("customers.id", $id)
            ->leftJoin( "shops" , "customers.Shop" , "=", "shops.id")
            ->select("customers.*", "shops.Name as shopName")
            ->first();

        return view("customers.show")->with( ["customer" => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = DB::table( "customers")
            ->where("customers.id", $id)
            ->leftJoin( "shops" , "customers.Shop" , "=", "shops.id")
            ->select("customers.*", "shops.Name as shopName", "shops.id as shopID")
            ->first();

        $shops = Shop::all();

        return view("customers.edit")->with(
            [
               "customer" => $customer,
               "shops" => $shops
            ]);
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
        $customer = Customer::find($id);
        $customer->FirstName = $request->firstName;
        $customer->LastName  = $request->lastName;
        $customer->Shop      = $request->shop;
        $customer->Company   = 2;
        $customer->Email     = $request->email;
        $customer->Phone     = $request->phone;

        $customer->save();

        return back()->with(["message" => "Customer Updated Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return back()->with( [ "message" => "Customer Deleted Successfully"]);
    }

}
