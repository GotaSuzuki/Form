<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Auth;

class FormController extends Controller
{
    public function list(){
        $lists = Form::where('status', 1)->simplePaginate(5);
        $detas = Form::whereNotNull('id')->simplePaginate(5);
        if( Auth::check() ){
            return view('list', compact('lists', 'detas'));
        }else{
            redirect('index');
        }
    }

    public function index(){
        $lists = Form::get();
        return view('index', compact('lists'));
    }

    public function form(){
        return view('form');
    }

    public function create(Request $request){
        Form::create([
            'title' => $request->title,
            'content' => $request->content,
            'email' => $request->email,
        ]);

        return redirect('/');
    }

    public function detail($id){
        $detail = Form::find($id);
        $show = Form::where('id', $id)->first();
        $texts=Form::withTrashed()->get();
        return view('detail', compact('detail', 'show', 'texts'));
    }

    public function delete($id) {
        // $del = Form::find($request->id);
        // $del->delete();
        // Form::table('forms')->where('id', $request->id)->delete();
        // Form::find($id)->delete();
        // return redirect()->to('list');
      }

      public function remove(Request $request){
        Form::table('forms')->where('id', $request->id)->delete();
        return redirect('/');
      }
}
