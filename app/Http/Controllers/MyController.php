<?php

namespace App\Http\Controllers;
//==========================================================    USE PART    ===============================
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\clas;
//=========================================================================================================

class MyController extends Controller
{
    //
//==========================================================    Navigation parts    =======================
    public function home(){
        return view('home');
    }

    public function results(){
        return view('results');
    }

    public function student(){
        return view('student');
    }

    public function class(){
        $class = DB::table('clas')->get();  //Get All class table contants from class table(DB)
        return view('class',compact('class'));  //send all class details to class page(class.blad.php)
    }

    public function teacher(){
        return view('teacher');
    }

    public function subject(){
        return view('subject');
    }

    public function result(){
        return view('result');
    }

    public function admin(){
        return view('admin');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
//========================================================================================================

//==========================================================    Database Connections    ==================

    public function addclass(Request $req)
    {
        $cnt = count(DB::table('clas')->get());
        
        $cls = new clas;
        
        $cls->class_name = $req->CName;
        $cls->class_type = $req->CType;
        $cls->class_year = $req->CYear;
        $cls->class_teacher = $req->CTName;

        $cls->save();

        return redirect()->back()->with('msg',"class is saved");
    }

    public function getclass(){
        $cs = DB::table('clas')->get();

        return view('viewclass',compact('cs'));
    }


    public function editclass(Request $req) {
        DB::table('clas')->where('id' , $req->eid)->update([
            'class_name' => $req->ECName,
            'class_type' => $req->ECType,
            'class_year' => $req->ECYear,
            'class_teacher' => $req->ECTName,
            
        ]);

        return redirect()->back()->with('msg',"class is saved");
    }
}
