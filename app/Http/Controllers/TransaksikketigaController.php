<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Lhe;
use App\Transaksikketiga1;
use App\Penilaian;
use App\Detailparameter;
use App\Penilaiankketiga1;
use App\Penilaiankketiga2;
use App\Penilaiankketiga3;
class TransaksikketigaController extends Controller
{
    public function index(request $request){
        if(Auth::user()['role_id']==3){
            $menu='Laporan KKE1';
            $side='Transaksilke';
            return view('Transaksikketiga1.index_opd',compact('menu','side'));
        }
        if(Auth::user()['role_id']==2){
            $menu='Laporan KKE1';
            $side='Transaksilke';
            return view('Transaksikketiga1.index',compact('menu','side'));
        }
        
    
    }

    public function create(request $request){
        if(Auth::user()['role_id']==3){
            $menu='Buat KKE1';
            $side='Transaksikketiga1';
            $data=Transaksikketiga1::where('id',base64_decode($request->id))->first();
            return view('Transaksikketiga1.view',compact('menu','side','data'));
        }
        if(Auth::user()['role_id']==2){
            $menu='Buat KKE1';
            $side='Transaksikketiga1';
            $data=Transaksikketiga1::where('id',base64_decode($request->id))->first();
            return view('Transaksikketiga1.create',compact('menu','side','data'));
        }
        
    
    }

    public function save_kketiga1(request $request){
        error_reporting(0);
        
            
                    $rules = [
                        'id'=> 'required',
                    ];

                    $messages = [
                        'id.required'=> 'Pilih id',
                    ];
                    $validator = Validator::make($request->all(), $rules, $messages);
                    $val=$validator->Errors();


                    if ($validator->fails()) {
                        echo'<div style="padding:1%">Error !<br>';
                        foreach(parsing_validator($val) as $value){
                            foreach($value as $isi){
                                echo'-&nbsp;'.$isi.'<br>';
                            }
                        }
                        echo'</div>';
                    }else{
                        
                        $cek=Penilaiankketiga1::where('transaksilhe_id',$request->transaksilhe_id)->where('penilaian_id',$request->id)->where('kategori',$request->kategori)->count();
                        if($cek>0){
                            $save=Penilaiankketiga1::where('transaksilhe_id',$request->transaksilhe_id)->where('penilaian_id',$request->id)->where('kategori',$request->kategori)->update([
                                'nilai'=>nilai_jawaban($request->jawaban_id),
                                'jawaban_id'=>$request->jawaban_id,
                            ]);

                            echo'ok';
                        }else{
                            $save=Penilaiankketiga1::create([
                                'transaksilhe_id'=>$request->transaksilhe_id,
                                'penilaian_id'=>$request->id,
                                'nilai'=>nilai_jawaban($request->jawaban_id),
                                'kategori'=>$request->kategori,
                                'jawaban_id'=>$request->jawaban_id,
                            ]);

                            echo'ok';
                        }
                            
                        
                    }
            
        
    }
    public function save_kketiga2(request $request){
        error_reporting(0);
        
            
                    $rules = [
                        'id'=> 'required',
                    ];

                    $messages = [
                        'id.required'=> 'Pilih id',
                    ];
                    $validator = Validator::make($request->all(), $rules, $messages);
                    $val=$validator->Errors();


                    if ($validator->fails()) {
                        echo'<div style="padding:1%">Error !<br>';
                        foreach(parsing_validator($val) as $value){
                            foreach($value as $isi){
                                echo'-&nbsp;'.$isi.'<br>';
                            }
                        }
                        echo'</div>';
                    }else{
                        
                        $cek=Penilaiankketiga2::where('transaksilhe_id',$request->transaksilhe_id)->where('penilaian_id',$request->id)->where('kategori',$request->kategori)->count();
                        if($cek>0){
                            $save=Penilaiankketiga2::where('transaksilhe_id',$request->transaksilhe_id)->where('penilaian_id',$request->id)->where('kategori',$request->kategori)->update([
                                'nilai'=>nilai_jawaban($request->jawaban_id),
                                'jawaban_id'=>$request->jawaban_id,
                            ]);

                            echo'ok';
                        }else{
                            $save=Penilaiankketiga2::create([
                                'transaksilhe_id'=>$request->transaksilhe_id,
                                'penilaian_id'=>$request->id,
                                'nilai'=>nilai_jawaban($request->jawaban_id),
                                'kategori'=>$request->kategori,
                                'jawaban_id'=>$request->jawaban_id,
                            ]);

                            echo'ok';
                        }
                            
                        
                    }
            
        
    }
    public function save_kketiga3(request $request){
        error_reporting(0);
        
            
                    $rules = [
                        'id'=> 'required',
                    ];

                    $messages = [
                        'id.required'=> 'Pilih id',
                    ];
                    $validator = Validator::make($request->all(), $rules, $messages);
                    $val=$validator->Errors();


                    if ($validator->fails()) {
                        echo'<div style="padding:1%">Error !<br>';
                        foreach(parsing_validator($val) as $value){
                            foreach($value as $isi){
                                echo'-&nbsp;'.$isi.'<br>';
                            }
                        }
                        echo'</div>';
                    }else{
                        
                        $cek=Penilaiankketiga3::where('transaksilhe_id',$request->transaksilhe_id)->where('penilaian_id',$request->id)->where('kategori',$request->kategori)->count();
                        if($cek>0){
                            $save=Penilaiankketiga3::where('transaksilhe_id',$request->transaksilhe_id)->where('penilaian_id',$request->id)->where('kategori',$request->kategori)->update([
                                'nilai'=>nilai_jawaban($request->jawaban_id),
                                'jawaban_id'=>$request->jawaban_id,
                            ]);

                            echo'ok';
                        }else{
                            $save=Penilaiankketiga3::create([
                                'transaksilhe_id'=>$request->transaksilhe_id,
                                'penilaian_id'=>$request->id,
                                'nilai'=>nilai_jawaban($request->jawaban_id),
                                'kategori'=>$request->kategori,
                                'jawaban_id'=>$request->jawaban_id,
                            ]);

                            echo'ok';
                        }
                            
                        
                    }
            
        
    }

    
}
