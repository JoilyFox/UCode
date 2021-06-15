<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ForumController extends Controller
{
    public function index() {
        $posts = Post::paginate(10);
        $categories = Category::orderBy('title')->get();

        return view('pages.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function getPostsByCategory($slug) {
        $categories = Category::orderBy('title')->get();
        $current_category = Category::where('slug', $slug)->first();

        return view('pages.index', [
            'posts' => $current_category->posts()->paginate(10),
            'categories' => $categories,
            'current_category' => $current_category
        ]);
    }

    public function getPost($slug_category, $slug_post) {
        $post = Post::where('slug', $slug_post)->first();

        return view('pages.show-post', [
            'post' => $post
        ]);
    }

    public function editPost($slug_category, $slug_post) {
        $post = Post::where('slug', $slug_post)->first();
        $category = Category::where('id', $post->category_id)->first();

        if ($post->user_id == Auth::user()->id) {
            return view('pages.edit-post', [
                'post' => $post,
                'category' => $category
            ]);
        } else {
            return redirect()->away('/');
        }
    }

    public function getPostsByAuthUser() {
        $user_id = Auth::user()->id;
        $posts = Post::where('user_id', $user_id)->get();

        return view('pages.private', [
            'posts' => $posts,
        ]);
    }


    public function like(Request $request) {
        $formFields = $request->only(['like', 'dislike']);


    }


}
