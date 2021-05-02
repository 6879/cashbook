<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AdminEntry;
use App\AdminMenuTitleName;
use App\AdminType;
use Carbon\Carbon;
use App\User;
use Auth;
class AdminEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminEntry = AdminEntry::orderBy('adminId','desc')->paginate(20);
        return  ['adminEntry' => $adminEntry];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
          'name' => 'required',
          'email' => 'required|email',
          'phone' => 'required|numeric',
          'password' => 'required|min:5',
          'address' => 'required',
      ],
      [
        'name.required' => 'Enter Your Name',
        'email.required' => 'Enter Your Email',
        'phone.required' => 'Enter Your Phone Number',
        'password.required' => 'Enter Your password',
        'address.required' => 'Enter Your Address',
      ]);


    if (User::where('email',$request->email)->exists()) {
        return ['changeeMail' => 'The email has already been taken'];
    }
    else {
         if (AdminEntry::where('phone',$request->phone)->exists()){
             return ['changePhone'=>'Change Your Admin Phone Number'];
          }
          else if (AdminEntry::where('email',$request->email)->exists()){
             return ['changeeMail' => 'The email has already been taken'];
          }
         else {
            $adminEntryId = AdminEntry::insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'userId' => $request->userId,
                'password' => $request->password,
                'address' => $request->address,
                'createBy' => Auth::user()->id,
                'role' => 2,
                'created_at' => Carbon::now(),
            ]);
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'adminId' => $adminEntryId,
                'adminAccessId' => $request->userId,
                'password' => bcrypt($request->password),
                'address' => $request->address,
                'createBy' => Auth::user()->id,
                'role' => 2,
                'created_at' => Carbon::now(),
            ]);
        }
      }
   }


    public function adminEntryUserId()
    {
        $mainuserId = AdminEntry::all()->count();
        $incrementUserId = $mainuserId + 1;
        return ['incrementUserId' => $incrementUserId];
    }



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
        $data = AdminEntry::where('adminId',$id)->first();
        return ['data'=>$data];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adminId)
    {
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'phone' => 'required|numeric',
          'password' => 'required|min:5',
          'address' => 'required',
      ],
      [
        'name.required' => 'Enter Your Name',
        'email.required' => 'Enter Your Email',
        'phone.required' => 'Enter Your Phone Number',
        'password.required' => 'Enter Your password',
        'address.required' => 'Enter Your Address',
      ]);

        if (AdminEntry::where('email',$request->email)->where('adminId','!=',$adminId)->exists()) {
            return ['changeEmail' => "Change Admin Email Address"];
        }
        elseif (AdminEntry::where('phone',$request->phone)->where('adminId','!=',$adminId)->exists()) {
            return ['changePhone' => "Change Admin Phone Number"];
        }
        else {
            AdminEntry::where('adminId',$adminId)->update([
              'name' => $request->name,
              'email' => $request->email,
              'phone' => $request->phone,
              'address' => $request->address,
              'updateBy' => Auth::user()->id,
              'created_at' => Carbon::now(),
            ]);
            User::where('adminId', $adminId)->update([
              'name' => $request->name,
              'email' => $request->email,
              'phone' => $request->phone,
              'address' => $request->address,
              'updateBy' => Auth::user()->id,
            ]);
        }
    }


    public function destroy($adminId)
    {
         AdminEntry::where('adminId',$adminId)->delete();
         User::where('adminId',$adminId)->delete();
    }
}
