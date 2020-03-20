<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\User;



class BookController extends Controller
{

    function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::orderBy('id', 'desc')->paginate(10);

        return response()->json(['data' => $data], 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id) 
    {
        $book = Book::findOrFail($id);
        //return response()->json(['data' => $user], 200);
        return response()->json(['data' => $book], 201);
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

        $data = $request->all();

        $rule = [
            'name' => 'required|string|min:5',
            'description' => 'required',
            'user_id' => 'required',
            'cover' => 'required|image',
            'college_id' => 'required|integer'
        ];

        $validator = Validator::make($data, $rule);     

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        //dd($data['password']);
        // $data['user_id'] = User::all()->random()->id;

        $data['status'] = Book::NOT_AVAILABLE;

        $data['cover'] = $request->cover->store('enginering');

        $CreateBook = Book::create($data);

        return response()->json(['data' => $CreateBook], 201);
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
