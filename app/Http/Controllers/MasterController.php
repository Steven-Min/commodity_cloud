<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Category;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * カテゴリー取得
     */
    public function categories() {
        $categories = Category::orderBy('sort', 'asc')->with('subCategories')->get();
        $response = [
            'categories' => $categories,
        ];
        return response()->json($response);
    }
}
