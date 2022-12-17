<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // $comentarios = [
      //   [
      //     'id' => 1,
      //     'usuario' => 'Usuario1',
      //     'comentario' => 'Algún comentario',
      //     'fecha' => '08/10/2009'
      //   ],
      //   [
      //     'id' => 2,
      //     'usuario' => 'Usuario6',
      //     'comentario' => 'Algún comentario',
      //     'fecha' => '28/03/2012'
      //   ],
      //   [
      //     'id' => 3,
      //     'usuario' => 'Usuario4',
      //     'comentario' => 'Algún comentario',
      //     'fecha' => '05/07/2010'
      //   ]
      // ];

      $comments = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.id', 'comments.body', 'comments.created_at', 'users.name')
        ->get();

      return view('comments', ['comments' => $comments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'body' => 'required'
      ]);

      DB::table('comments')->insertGetId([
        'user_id' => auth()->user()->id,
        'body' => $request->get('body'),
        'created_at' => now()
      ]);

      return redirect('/comments');
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
