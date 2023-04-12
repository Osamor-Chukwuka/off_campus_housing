<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function addComment(Request $request, $house_id, $landlord_id){
        $form = $request->validate([
            'message' => 'required',
        ]);

        $form['user_id']  = Auth::user()->id;
        $form['landlord_id']  = $landlord_id;
        $form['house_id']  = $house_id;

        Comment::create($form);

        return "Worked o";
    }
}
