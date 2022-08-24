<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faqs;
use App\Models\Comment;
use App\Models\NewsBlog;
use App\Models\Newsletter;

class GuestPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        switch ($request->input('store_action')) {

            case 'Ask_Us':
                try {
                    $faqs = Faqs::firstOrCreate([
                        'name' => $request->input('name'),
                        'phone' => $request->input('phone'),
                        'email' => $request->input('email'),
                        'message' => $request->input('message'),
                    ]);
                    return redirect(url()->previous())->with('success', 'Question Submitted! Will contact you shortly.');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'Subscribe':
                try {
                    $subs = Newsletter::firstOrCreate([
                        'email' => $request->input('email'),
                    ]);
                    return redirect(url()->previous())->with('success', 'Newsletter Subscription Successfull.');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

        }
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

        $blog = NewsBlog::find($id);
        $tags = explode(',', $blog->tags);
        $comments = Comment::orderBy('id', 'DESC')->where('news_blog_id', $id)->get();
        // return $tags[0];

        $patch = [
            'i' => 1,
            'category' => NewsBlog::select('category')->distinct('category')->get(),
            'blogs' => NewsBlog::orderBy('id', 'DESC')->where('del', 'no')->paginate(10),
            'blog' => $blog,
            'comments' => $comments,
            'tags' => $tags
        ];
        return view('news-single')->with($patch);
        // switch ($request->input('showTry')) {

        //     case 'regMe':
        //         return 'Works Perfect';
        //     break;
        
        // }
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
