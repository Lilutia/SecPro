<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function index(Recipe $recipe)
    {
        $comments = $recipe->comments()->latest()->get();
        return view('comment', compact('recipe', 'comments'));
    }

    public function store(StoreCommentRequest $request, Recipe $recipe): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $recipe->comments()->create($data);

        return back()->with('success', 'Comment posted.');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $user = auth()->user();

        // Kalau belum login (harusnya tidak mungkin karena sudah pakai middleware)
        if (!$user) {
            abort(403, 'Unauthorized.');
        }

        // 1. Cek pemilik komentar
        $isOwner = ($comment->user_id === $user->id);

        // 2. Deteksi admin dengan beberapa kemungkinan
        $isAdmin = false;

        // 2a. Kalau pakai Spatie Roles
        if (method_exists($user, 'hasRole')) {
            $isAdmin = $user->hasRole('admin');
        }

        // 2b. Kalau pakai kolom 'usertype'
        if (!$isAdmin && isset($user->usertype)) {
            $isAdmin = ($user->usertype === 'admin');
        }

        // 2c. Kalau kamu tetap mau superadmin id = 1
        // hapus baris ini kalau nggak mau hardcode
        if (!$isAdmin && $user->id === 1) {
            $isAdmin = true;
        }

        // 3. Final check
        if (!($isOwner || $isAdmin)) {
            abort(403, 'Unauthorized.');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }
}
