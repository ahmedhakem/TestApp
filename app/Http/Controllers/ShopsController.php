<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shop;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopsController extends Controller
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
        //get list of all shops in db
        $shops = Shop::paginate(10);
        return view('shops.index')->with(['shops' => $shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("shops.create");
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
           'shopName'   => 'required',
           'logo'       => 'required|image|dimensions:min_width=100,min_height=100'
        ]);

        $shop = new Shop();
        $shop->Name = $request->shopName;
        $shop->Email = $request->email;
        $shop->website = $request->website;

        //if the form has logo image
        if ($request->has( 'logo')){
            $logo = $request->file('logo');
            $fileName = time() . '.' .$logo->getClientOriginalExtension();
            Storage::disk('public')->put( $fileName , file_get_contents( $logo->getRealPath())); //upload image to storage path

            $shop->Logo = $fileName;
        }
        $shop->save(); // saving data to shop table in DB

        return back()->with( [ "message" => "Shop Added Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        return view("shops.show")->with( ['shop' => $shop]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
        return view("shops.edit")->with(["shop" => $shop]);
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
        $shop = Shop::find($id);
        $shop->Name = $request->shopName;
        $shop->Email = $request->email;
        $shop->website = $request->website;

        //if the form has logo image
        if ($request->has( 'logo')) {

            $logoPath = Storage::disk('public')->path($shop->Logo);
            unlink( $logoPath); //delete old image to decrease the disk's usage load on server

            $logo     = $request->file( 'logo' );
            $fileName = time() . '.' . $logo->getClientOriginalExtension();
            Storage::disk( 'public' )->put( $fileName , file_get_contents( $logo->getRealPath() ) ); //upload image to storage path

            $shop->Logo = $fileName;
        }
        $shop->save(); // saving data to shop table in DB

        return back()->with( [ "message" => "Shop Updated Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        //first delete all customers related to this shop
        $shopCustomers = Customer::where("Shop", "=", $shop->id)->get();
        if($shopCustomers)
        {
            foreach ($shopCustomers as $customer)
            {
                $customer->delete();
            }
        }

        //second getting the shop image and delete it from server
        $logoPath = Storage::disk('public')->path($shop->Logo);
        unlink( $logoPath);

        //third delete the shop
        $shop->delete();

        return back()->with( [ "message" => "Shop Deleted Successfully"]);
    }
}
