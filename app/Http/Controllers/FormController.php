<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Auth;

class FormController extends Controller
{
    public function list(){
        $lists = Form::get();
        if( Auth::check() ){
            return view('list', compact('lists'));
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
        return view('detail', compact('detail', 'show'));
    }
}
