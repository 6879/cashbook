<?php

namespace App\Http\Controllers\ShopInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShopAccountIntormation;
use App\Currencie;
use App\Http\Resources\ShopAccountIntormation as ShopAccountIntormationResource;
use Illuminate\Support\Facades\Auth;

class shopAccountIntormationController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:,admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopAccountIntormationResource::collection(ShopAccountIntormation::orderBy('union_name','ASC')->get());
         return ['data'=>$data];
    }

    public function getAccountInfoById(){
        $shop_id = Auth::user()->id;
        $data = ShopAccountIntormation::where('shopId',$shop_id)->first();
        return ['data' => $data];
    }

    public function getAccountInfoByShopId($id){
        $shop_id = $id;
        $data = ShopAccountIntormation::where('shopId',$shop_id)->first();
        return ['data' => $data];
    }

    public function getMyCurrency(){

        $currency_id = Auth::user()->currencyId;
        $symbol =  Currencie::where('id',$currency_id)->first();
        return ['symbol' => $symbol];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
