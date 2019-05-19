<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserProfileController extends Controller
{
    public function show($id){
        $user = User::find($id);

        return view('user_profile.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        return view('user_profile.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //エラーチェック
        $this->validate($request, [
            'introduction' => ['string', 'max:255'],
            'birthday' => ['required', 'date'] ,
            'avater_filename' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpg,png,jpeg'
            ]
        ]);
        
        //IDでレコードを一意に特定し、一件抽出
        $user = User::find($id);
        //参照先ののテーブルを代入
        $user_profile = $user->userProfile;
        //受け取ったリクエストデータを対応するテーブルカラムへ保存
        $user_profile->introduction = $request->input('introduction');
        $user_profile->birthday = $request->input('birthday');

        /**画像ファイルをシンボリックリンクを作ったディレクトリへ保存 。
         * その後、ファイル名をDBへ保存
        */
        $filename = $request->avater_filename->store('public/avatar');
        $user_profile->avater_filename = basename($filename);
        $user_profile->save();
        
        return redirect()
            ->route('tweets.index');
    }

}
