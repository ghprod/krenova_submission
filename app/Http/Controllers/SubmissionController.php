<?php

namespace Krenova\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Krenova\Http\Requests;
use Krenova\Http\Controllers\Controller;
use Krenova\Submission;
use Krenova\User;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Ini index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( !session('user') )
            return redirect('auth/login');

        $userData = session('user');

        return view('submission/new', ['userData' => $userData]);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( !session('user') )
            return redirect('auth/login');

        $validator = Validator::make($request->all(), [
            'my_phone'      => 'required|max:12',
            'creator_name'  => 'required',
            'creator_phone' => 'required|max:12',
            'creator_name'  => 'required',
            'districts'     => 'required',
            'product'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('submission/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            User::where('id', session('user')->id)
                ->update([
                    'phone'     => $request->input('my_phone'),
                    'address'   => $request->input('my_address'),
                ]);

            $submissionData = Submission::firstOrCreate([
                'user_id'   => session('user')->id,
                'name'      => $request->input('creator_name'),
                'phone'     => $request->input('creator_phone'),
                'address'   => $request->input('creator_address'),
                'village'   => $request->input('village'),
                'districts' => $request->input('districts'),
                'product'   => $request->input('product'),
                'spec'      => $request->input('spec'),
                'benefit'   => $request->input('benefit'),
                'full_story'   => $request->input('full_story'),
            ])->save();

            return view('submission/success');
        }
    }
}
