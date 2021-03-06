<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class ManageStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        $term1 = DB::table('payments')->where(['user_id'=>$id,'term'=>'1st'])->sum('amount');
        $term2 = DB::table('payments')->where(['user_id'=>$id,'term'=>'2nd'])->sum('amount');
        $term3 = DB::table('payments')->where(['user_id'=>$id,'term'=>'3rd'])->sum('amount');
        $term4 = DB::table('payments')->where(['user_id'=>$id,'term'=>'4th'])->sum('amount');
        $term5 = DB::table('payments')->where(['user_id'=>$id,'term'=>'5th'])->sum('amount');
        $term6 = DB::table('payments')->where(['user_id'=>$id,'term'=>'6th'])->sum('amount');
        return view('payments.studentpayments')->with(compact('id','term1','term2','term3','term4','term5','term6','section_id'));

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
        $user = User::findOrFail($id);

        if(trim($request->password)==''){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $user->update($input);
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
