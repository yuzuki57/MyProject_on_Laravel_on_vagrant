<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\HashTag;
use Illuminate\View\View;

class TweetController extends Controller
{

    /**ログインしたユーザーしか認可されたURLへアクセスできないようにする。 */
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create', 'store', 'edit', 'update', 'destroy']
        ]);
    }
    /**全件取得のメソッド。主にこれまでのツイートを全表示するために使う 。
     * foreachで全件表示
    */
    public function index(){
        $tweets = Tweet::all();
        return view('tweet.index', [
            'tweets' => $tweets,
        ]);
    }
    /**新規投稿ページへ画面遷移する為のメソッド。ただそれだけ */
    public function create(){
        return view('tweet.create');
    }
    /**入力されたデータをデーターベースへ保存し、直前のページへリダイレクトする新規投稿メソッド
     * セッションデータとフラッシュデータも保持
     */
    public function store(Request $request){
        $this->validate($request, [
            'body'=>['required', 'string', 'max:255'],
            'hash_tags'=>['string', 'max:255']
        ]);
        $tweet = new Tweet;
        $tweet->body = $request->input('body');//入力された文字列をbodyプロパティに代入
        $tweet->user_id = $request->user()->id;//現在のユーザーIDをTweetオブジェクトのuser_idプロパティに代入
        $tweet->save();//Tweetオブジェクトをデータベースに保存

        //Hash_tagの新規保存
        // ex: preg_split('/\s+/', '   tag1 tag2 tag3    tag4  ', -1, PREG_SPLIT_NO_EMPTY)
        //     == ['tag1', 'tag2, 'tag3', 'tag4'];
        $hash_tag_names = preg_split('/\s+/', $request->input('hash_tags'), -1, PREG_SPLIT_NO_EMPTY);
        //ユーザーが入力したタグを配列で受け取る為の空の配列
        $hash_tag_ids = [];
        foreach ($hash_tag_names as $hash_tag_name) {
            /**既存のレコードがあれば何もしない、無ければ新規保存 */
            $hash_tag = HashTag::firstOrCreate([
                'name' => $hash_tag_name,
            ]);
            /**入力されたタグを配列に渡す処理 */
            $hash_tag_ids[] = $hash_tag->id;
        }
        //中間テーブルの新規保存
        $tweet->hashTags()->sync($hash_tag_ids);
        
        //新規保存してリダイレクトした時にメッセージを表示する為のフラッシュデータ
        $request->session()->flash('flash_message', 'ツイートの新規投稿が完了しました！');

        return redirect('/tweets');
    }
    /** 指定されたIDの一行文のレコードを取得し、詳細ページにアクセス*/
    public function show($id){
        $tweet = Tweet::find($id);

        //詳細表示する為のページへアクセス
        return view('tweet.show', [
            'tweet' => $tweet,
        ]);
    }
    /**指定されたidのレコードを編集するためのページへ遷移 */
    public function edit($id){
        $tweet = Tweet::find($id);

        //編集ページへアクセス
        return view('tweet.edit', [
            'tweet' => $tweet,
        ]);
    }
    /**入力されたデータをデータベースへ保存し、直前のページへリダイレクトという点でstoreとほぼ同じ */
    public function update(Request $request, $id){
        $tweet = Tweet::find($id);
        //入力された文字列をプロパティに代入
        $tweet->body = $request->input('body');
        
        $tweet->save();

        //Hash_tagの新規保存
        // ex: preg_split('/\s+/', '   tag1 tag2 tag3    tag4  ', -1, PREG_SPLIT_NO_EMPTY)
        //     == ['tag1', 'tag2, 'tag3', 'tag4'];
        $hash_tag_names = preg_split('/\s+/', $request->input('hash_tags'), -1, PREG_SPLIT_NO_EMPTY);
        //ユーザーが入力したタグを配列で受け取る為の空の配列
        $hash_tag_ids = [];
        foreach ($hash_tag_names as $hash_tag_name) {
            /**既存のレコードがあれば何もしない、無ければ新規保存 */
            $hash_tag = HashTag::firstOrCreate([
                'name' => $hash_tag_name,
            ]);
            /**入力されたタグを配列に渡す処理 */
            $hash_tag_ids[] = $hash_tag->id;
        }
        //中間テーブルの新規保存
        $tweet->hashTags()->sync($hash_tag_ids);
        
        return redirect('/tweets');
    }
    /**指定したレコード1件を削除するメソッド。削除後にトップ画面にリダイレクト */
    public function destroy($id){
        $tweet = Tweet::find($id);
        $tweet->delete();

        return redirect('/tweets');
    }

    public function showByHashTag($id){
        $hash_tag = HashTag::find($id);

        return view('tweet.index', [
            'tweets' => $hash_tag->tweets
        ]);
    }
}
