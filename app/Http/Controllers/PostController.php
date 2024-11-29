<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index() {
        $posts =  Post::orderBy("id", "desc")->paginate(10);
        return view("post.index", compact("posts"));
    }

    public function create() {
        return view("post.create");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        Post::create([
            "title"  =>  $request->title,
            "body" => $request->body
        ]);

        return back()->with("success", "Post has been created");
    }

    public function uploadMedia(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $path = storage_path('app/public/tmp/uploads');
            $fileName = $request->file('upload')->move($path, $fileName)->getFilename();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/tmp/uploads/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
        return false;
    }
}
