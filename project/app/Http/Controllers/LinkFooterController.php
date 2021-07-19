<?php

namespace App\Http\Controllers;

use App\Models\InforFooter;
use Illuminate\Http\Request;

class LinkFooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('footer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // Validation
//        $data = $request->validate([
//            'title' => 'required|string',
//            'content' => 'required|string',
//        ]);
//
//        // Tạo một bài viết mới
//        $post = new Post();
//        $post->title = $data['title'];
//        $post->content = $data['content'];
//        $post->save();


        $linkFooter = new InforFooter();
        $linkFooter -> text =  $request->text;
        $linkFooter -> address =  $request->address;
        $linkFooter -> phone =  $request->phone;
        $linkFooter -> email =  $request->email;
        $linkFooter -> linkFacebook =  $request->linkFacebook;
        $linkFooter -> linkInstargam =  $request->linkInstargam;
        $linkFooter -> linkTwitter =  $request->linkTwitter;
        $linkFooter -> linkGoogle =  $request->linkGoogle;
//        $linkFooter -> linkFacebook =  $request->linkFacebook;

        $linkFooter->save();


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
