<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Lhe;
use App\Transaksikkedua;
use App\Penilaian;
use App\Detailparameter;
use App\Penilaiankkedua;
class TransaksikkeduaController extends Controller
{
    public function index(request $request){
        if(Auth::user()['role_id']==3){
            $menu='Laporan KKE1';
            $side='Transaksilke';
            return view('Transaksikkedua.index_opd',compact('menu','side'));
        }
        if(Auth::user()['role_id']==2){
            $menu='Laporan KKE1';
            $side='Transaksilke';
            return view('Transaksikkedua.index',compact('menu','side'));
        }
        
    
    }

    public function create(request $request){
        if(Auth::user()['role_id']==3){
            $menu='Buat KKE1';
            $side='Transaksikkedua';
            $data=Transaksikkedua::where('id',base64_decode($request->id))->first();
            return view('Transaksikkedua.view',compact('menu','side','data'));
        }
        if(Auth::user()['role_id']==2){
            $menu='Buat KKE1';
            $side='Transaksikkedua';
            $data=Transaksikkedua::where('id',base64_decode($request->id))->first();
            return view('Transaksikkedua.create',compact('menu','side','data'));
        }
        
    
    }

    public function saran(request $request){
        $data=Penilaiankkedua::where('id',$request->id)->first();
        echo'
            <input type="hidden" name="id" value="'.$data['id'].'">
            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Saran / Rekomendasi</legend>
            <!-- begin form-group -->
            
            <div class="form-group">
                <label>Saran</label>
                <textarea name="saran" rows="6" placeholder="Ketik disini"  class="form-control">'.$data['saran'].'</textarea>
                
            </div>
        ';
    }
    public function tampil_nilai(request $request){
        if($request->utama==2){
            $penilaian=Penilaian::where('detail_parameter_id',$request->id)->where('utama',1)->orderBy('id','asc')->get();
            echo'
                <div class="form-group row m-b-10" >
                    <label class="col-lg-3 text-lg-right col-form-label">Pilih Kepala Parameter</label>
                    <div class="col-lg-9">
                        <select name="note"  placeholder="Ketik.." class="form-control">
                            <option value="">--Pilih</option>';
                                foreach($penilaian as $no=>$o){
                                    echo'<option value="'.$o['id'].'">'.huruf($no+1).' .'.$o['name'].'</option>';
                                }
                            echo'
                        </select>
                    </div>
                </div>
            ';
        }elseif($request->utama==2){
            echo'
                <div class="form-group row m-b-10" >
                    <label class="col-lg-3 text-lg-right col-form-label">Nilai</label>
                    <div class="col-lg-5">
                        <input type="text" name="nilai"  placeholder="Ketik.." class="form-control">
                    </div>
                </div>
            ';
        }else{
            echo'
                
            ';
        }
    }

   
    public function save_kkedua(request $request){
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
                        
                        $cek=Penilaiankkedua::where('transaksilhe_id',$request->transaksilhe_id)->where('penilaian_id',$request->id)->where('kategori',$request->kategori)->count();
                        if($cek>0){
                            $save=Penilaiankkedua::where('transaksilhe_id',$request->transaksilhe_id)->where('penilaian_id',$request->id)->where('kategori',$request->kategori)->update([
                                'nilai'=>nilai_jawaban($request->jawaban_id),
                                'jawaban_id'=>$request->jawaban_id,
                            ]);

                            echo'ok';
                        }else{
                            $save=Penilaiankkedua::create([
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
