<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Psy\debug;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = DB::table('categories')->select('*')->get();
        // Lấy tin nổi bật
        $featuredNews = DB::table('news')->select('*')->paginate(4);
        $query = DB::table('news')->select('*');

        // Lọc theo danh mục nếu có request truyền vào
        if ($request->has('category_id')) {
            $query->where('id_category', $request->category_id);
        }
        // Lọc theo từ khóa 
        if ($request->has('keyword') && !empty($request->keyword)) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'LIKE', "%{$keyword}%")
                  ->orWhere('content', 'LIKE', "%{$keyword}%");
                //   ->orWhere('author', 'LIKE', "%{$keyword}%");
            });
        }
        $news = $query->orderBy('created_at', 'desc')->take(4)->get();
        $popularNews = DB::table('news')->select('*')->orderBy('views', 'desc')->take(4)->get();

        return view('home', compact('news', 'featuredNews', 'categories', 'popularNews'));
    }

    public function detail($id)
    {
        // Câu lệnh này tăng giá trị cột 'views' trong bảng 'news' lên 1 mỗi khi bài viết được truy cập
        DB::table('news')->where('id', $id)->increment('views');
        $news = DB::table('news')->where('id', $id)->first();

        if (!$news) {
            abort(404, 'Bài viết không tồn tại.');
        }
        // Lấy danh mục theo bài viết hiện tại
        $category = DB::table('categories')->where('id', $news->id_category)->first();
        // Lấy toàn bộ danh mục để hiển thị trong sidebar và menu
        $categories = DB::table('categories')->select('*')->get();
    
        // Lấy tin tức liên quan
        $relatedNews = DB::table('news')
            ->where('id_category', $news->id_category)
            ->where('id', '!=', $news->id)
            ->take(4)
            ->get();
    
        // Lấy bình luận của bài viết 
        $comments = DB::table('comments')
            ->where('news_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('news_detail', compact('news', 'category', 'categories', 'relatedNews', 'comments'));
    }

    public function comment(Request $request, $newsId)
{

    if (!session('user')) {
        // Thông báo này sẽ được sử dụng để hiển thị popup đăng nhập trong view
        return redirect()->route('news.detail', $newsId)->with('login_required', true);
    }

    $request->validate([
        'content' => 'required|string',
    ]);

    DB::table('comments')->insert([
        'news_id' => $newsId,
        'user_id' => session('user')['id'],
        'content' => $request->content,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('news.detail', $newsId)->with('success', 'Bình luận đã được gửi!');
}

    public function review()
    {
        $categories = DB::table('categories')->select('*')->get();
        return view('review', compact('categories'));
    }

    public function contact()
    {
        $categories = DB::table('categories')->select('*')->get();
        return view('contact', compact('categories'));
    }

   
}
