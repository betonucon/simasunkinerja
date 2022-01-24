<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(request $request){
        
            $menu='Dashboard';
            if($request->tahun==''){
                $tahunini=date('Y');
                $tahunkemaren=(date('Y')-1);
            }else{
                $tahunini=$request->tahun;
                $tahunkemaren=($request->tahun-1);
            }
            $side='lhe';
            return view('welcome',compact('menu','side','tahunini','tahunkemaren'));
        
    }
}
