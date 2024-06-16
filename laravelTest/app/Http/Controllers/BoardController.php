<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function board(Request $request)
    {
        // 요청 처리 로직 작성
        return view('board_free'); // 예시로 board.blade.php 뷰를 반환
    }
    public function write(Request $request)
    {
        // 요청 처리 로직 작성
        return view('write'); // 예시로 board.blade.php 뷰를 반환
    }
    
    public function index()
    {
        $posts = Post::all();
        return view('board_free', compact('posts'));

        $posts2 = Post::latest()->paginate(10); // 최신순으로 정렬하여 10개씩 페이징 처리
        return view('board_inquiry', compact('posts2'));
    }
   

    public function create(){

    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath
        ]);

        return redirect()->route('board_free');
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function destroy($id){
        
    }


}
