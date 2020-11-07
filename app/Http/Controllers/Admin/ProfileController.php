<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //
        public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile; //使える状態に変更
      $form = $request->all();//リクエストすべて取得
      
      unset($form['_token']);
      // データベースに保存する
      $profile->fill($form); //データを整える為fill
      $profile->save();//登録
        return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id); //レコード取得
      if (empty($profile)) {//空だとえらー
        abort(404);    
      }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
      
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        
        unset($profile_form['_token']);
        $profile->fill($profile_form)->save();

        // 以下を追記
        $history = new ProfileHistory;                        
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        return redirect('admin/profile/edit?id=' . $request->id ); //edit?id=[]
    }
}



//保留