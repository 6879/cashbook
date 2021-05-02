<?php

namespace App\Http\Controllers;
use App\AdminType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;


class AdminTypeNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminTypeName = AdminType::orderBy('adminTypeId','asc')->paginate(15);
        return  ['adminTypeName' => $adminTypeName];
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
          $this->validate($request, [
              'adminTypeName' => 'required',
          ],
          [
            'adminTypeName.required' => "Enter Admin Type Name",
          ]);


        if (AdminType::where('adminTypeName',$request->adminTypeName)->exists()){
            return ['changeTypeName'=>'Change Your Admin Type Name'];
        }
        else{
            AdminType::insert([
                'adminTypeName' => $request->adminTypeName,
                'createBy' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }

    }


    public function show($id)
    {
        $data = AdminType::where('adminTypeId',$id)->first()->adminTypeStatus;

        if($data == 1){
            AdminType::where('adminTypeId',$id)->update([
                'adminTypeStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            AdminType::where('adminTypeId',$id)->update([
                'adminTypeStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $data = AdminType::where('adminTypeId',$id)->first();
        return ['data'=>$data];
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
        $this->validate($request, [
            'adminTypeName' => 'required',
        ],
        [
          'adminTypeName.required' => "Enter Admin Type Name",
        ]);

        AdminType::where('adminTypeId',$id)->update([
            'adminTypeName' => $request->adminTypeName,
            'updateBy'=>  Auth::user()->id,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AdminType::where('adminTypeId',$id);
        $data->delete();
    }
}
