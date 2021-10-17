<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\About;

class About_C extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $input = $request->all();
        $email = $input['emailA'];
        $pass = $input['passA'];

        if (Auth::attempt(['email' => $email, 'password' => $pass])) {
            $result = [
                'success' => true
            ];
        } else {
            $result = [
                'success' => false
            ];
        }
        return response()->json($result);
    }

    public function dashboard()
    {
        $data['title'] = 'dashboard';
        return view('template/adminLayout', $data);
    }

    public function home()
    {
        $data['home'] = About::all();
        return view('admin/home', $data);
    }

    public function activating(Request $request)
    {
        $input = $request->all();
        $id = $input['id'];
        if ($id != '') {
            $home = About::all();
            foreach ($home as $hm) {
                if ($hm['id'] == $id) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $newH = About::findOrfail($hm['id']);
                $newH->id = $hm['id'];
                $newH->title = $hm['title'];
                $newH->content = $hm['content'];
                $newH->image = $hm['image'];
                $newH->status = $status;
                $newH->created_at = $hm['created_at'];
                $newH->updated_at = date('Y-m-d H:i:s', time());
                $newH->update();
            }
            $result = [
                'success' => true
            ];
        } else {
            $result = [
                'success' => false
            ];
        }
        return response()->json($result);
    }

    public function store(Request $request)
    {
        $home = new About;
        $home->title = $request->title;
        $home->content = $request->content;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $file->move(public_path() . '/img', $file->GetClientOriginalName());
            $home->image = $file->GetClientOriginalName();
        }
        $home->status = 0;
        $home->save();
        return back();
    }

    public function update(Request $request)
    {
        $home = About::findOrfail($request->id_h);
        $home->title = $request->title;
        $home->content = $request->content;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $file->move(public_path() . '/img', $file->GetClientOriginalName());
            $home->image = $file->GetClientOriginalName();
        }
        $home->status = $request->status;
        $home->created_at = $request->created_at;
        $home->updated_at = date('Y-m-d H:i:s', time());
        $home->update();
        return back();
    }

    public function destroy(Request $request)
    {
        $home = About::findOrfail($request->id_h);
        $home->delete();
        return back();
    }
}
