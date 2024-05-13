<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = '0';
        if($request->has('type')) {
            $type = $request->type;
        }
        // 게시글 조회
        $resultBoardList = Board::where('type', $type)
                                ->orderBy('created_at', 'DESC')
                                ->get();
        
        return view('boardIndex')
                    ->with('data', $resultBoardList);
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
        // var_dump($request->all());
        // $request->file('file')->store('img', 'public');
        // TODO : 파일 업로드 처리
        $insertData = $request->only('title', 'content', 'type');
        // $resultInsert = Board::create($request->only('title', 'conetnt', 'type'));
        $insertData['user_id'] = Auth::id();
        $insertData['img'] = '/img/kuromi.png'; // TODO: 나중에 수정

        Board::create($insertData);

        return redirect()->route('board.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Log::debug('board.store Start');
        // 게시글 정보 획득
        $resultBoardInfo = Board::find($id);

        Log::debug('board info get');
        $responseData = $resultBoardInfo->getOriginal();
        $responseData['auth_id'] = Auth::id();
        Log::debug('json', $responseData);
        return response()->json($responseData);
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
