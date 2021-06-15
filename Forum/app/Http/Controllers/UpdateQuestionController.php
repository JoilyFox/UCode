<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

use function PHPUnit\Framework\isEmpty;

class UpdateQuestionController extends Controller
{
    public function updatePost(Request $request)
    {

        $validateFields = $request->validate([
            'title' => 'required|max:150',
            'content' => 'required|max:5000',
            'categories' => 'required',
        ]);

        function createSlug($str) {
            $finaleStr = preg_replace("/[^a-zA-ZА-Яа-я0-9]/", " ", $str);
            $finaleStr = preg_replace('/\s/', ' ', $finaleStr);
            $finaleStr = trim($finaleStr, ' ');
            $finaleStr = preg_replace('![\s]+!', "-" , $finaleStr);
            return strval($finaleStr);
        }

        function correctCategoryName($str) {
            $finaleStr = mb_strtolower($str);
            return strval($finaleStr);
        }

        $post_id = $request->post_id;
        $title = $request->title;
        $description = $request->content;
        $categories = $request->categories;
        // $user_id = Auth::user()->id;
        $time = Carbon::now()->toDateTimeString();
        $slugPost = createSlug($request->title);


        $DBSelect = DB::select('select title from categories where title = ?', [$categories]);

        if (empty($DBSelect)) {
            $categorySlug = $categories;

            DB::insert('insert into categories (title, slug, created_at, updated_at) values (?, ?, ?, ?)',
            [$categories, $categorySlug, $time, $time]);
        }


        $categoryId = DB::select('select id from categories where title = ?', [$categories])[0]->id;

        // DB::update("update posts set category_id = ?, title = ?, description = ?, slug = ?, updated_at = ? where id = ?", [$categoryId, $title, $description, $slugPost, $time, $post_id]);

        $arr = [];

        $post = Post::all()->where('id', $post_id)->first();
            $arr['category_id'] = $categoryId;
            $arr['title'] = $title;
            $arr['description'] = $description;
            $arr['slug'] = $slugPost;
            $arr['updated_at'] = $time;

        $post->update($arr);


        // DB::insert('insert into posts (user_id, category_id, title, description, slug, likes, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?)', [Auth::user()->id, $categoryId, $title, $description, $slugPost, 0, $time, $time]);

        $categorySlug1 = DB::select('select slug from categories where title = ?', [$categories])[0]->slug;

        return redirect()->away('/category/'.$categorySlug1.'/'.$slugPost)->withErrors([
            'email' => 'An error occurred while saving the user.'
        ]);
    }
}
