<?php

namespace App\Http\Controllers;

use App\Models\RecipeBoards;

class RecommendController extends controller {
    public function getSeason() {
        $result = RecipeBoards::select('recipe_boards.id', 'recipe_boards.title', 'recipe_boards.views', 'recipe_boards.thumbnail', 'recipe_boards.created_at', 'users.u_nickname')
                                ->join('users', 'recipe_boards.user_id', '=', 'users.id')
                                ->whereNotNull('recipe_boards.recommend_at')
                                ->orderBy('recommend_at', 'desc')
                                ->limit(4)
                                ->get();
        
        $responseData = [
            'code' => '0'
            ,'msg' => '계절 추천 레시피 획득 성공'
            ,'data' => $result->toArray()
        ];

        return response()->json($responseData, 200);
    }
}