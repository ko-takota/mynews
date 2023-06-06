<?php   //管理画面で使用した NewsController.php とまったく同じファイル名ですが、ディレクトリ階層が異なる点に注意してください(投稿者が投稿した記事の一覧ページを作成しています)

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追記
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
       // dd($request);
        $posts = News::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}