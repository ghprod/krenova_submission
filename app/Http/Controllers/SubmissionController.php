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
        if(! $userData = session('user') )
            return redirect('auth/login');

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

        $messages = [
            'my_phone.required'         => 'Nomor HP Pengirim Data wajib diisi!',
            'creator_name.required'     => 'Nama Kreator/Inovator wajib diisi!',
            'creator_phone.required'    => 'Nomor HP Kreator/Inovator wajib diisi!',
            'product.required'          => 'Nama/Judul Karya wajib diisi!',
            'image.image'               => 'Format gambar salah!'
        ];

        $validator = Validator::make($request->all(), [
            'my_phone'      => 'required|max:12',
            'creator_name'  => 'required',
            'creator_phone' => 'required|max:12',
            'creator_name'  => 'required',
            'product'       => 'required',
            'image'         => 'image',
            'video'         => 'mimes:mp4,mov,ogg,qt|max:20000'
        ], $messages);

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

            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = strtolower(str_replace(' ', '_', $request->file('image')->getClientOriginalName()));
                $request->file('image')->move(env('UPLOAD_PATH').'images/', $imageName);
            }

            $videoName = null;
            if ($request->hasFile('video')) {
                $videoName = strtolower(str_replace(' ', '_', $request->file('video')->getClientOriginalName()));
                $request->file('video')->move(env('UPLOAD_PATH').'videos/', $videoName);
            }

            $submissionData = Submission::firstOrCreate([
                'user_id'               => session('user')->id,
                'name'                  => $request->input('creator_name'),
                'phone'                 => $request->input('creator_phone'),
                'address'               => $request->input('creator_address'),
                'product'               => $request->input('product'),
                'inspirator'            => $request->input('inspirator'),
                'problem'               => $request->input('problem'),
                'since'                 => $request->input('since'),
                'applied_at'            => $request->input('applied_at'),
                'benefit'               => $request->input('benefit'),
                'obstacles'             => $request->input('obstacles'),
                'support_expectations'  => $request->input('support_expectations'),
                'image'                 => $imageName,
                'image_url'             => $request->input('image_url'),
                'video'                 => $videoName,
                'video_url'             => $request->input('video_url'),
            ])->save();

            return view('submission/success');
        }
    }
}
