<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;
use App\Opd;
use App\Akses;
class OpdController extends Controller
{
    public function index(request $request){
        
        $menu='Daftar OPD ';
        $side='master';
        $role=$request->role;
        return view('Opd.index',compact('menu','side','role'));
    
    }
    public function index_auditor(request $request){
        
        $menu='Pengguna Sistem ';
        $side='master';
        $role=$request->role;
        return view('Opd.index_auditor',compact('menu','side','role'));
    
    }

    public function create(request $request){
        
        $menu='Buat LHE';
        $side='lhe';
        return view('Opd.create',compact('menu','side'));
    
    }

    public function ubah(request $request){
        
            $data=Opd::where('id',$request->id)->first();
            echo'
                <input type="hidden" name="id" value="'.$data['id'].'">
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Kode OPD</label>
                    <div class="col-lg-4">
                        <input type="text" disabled  placeholder="Ketik.." value="'.$data['kode'].'" class="form-control">
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Singkatan</label>
                    <div class="col-lg-5">
                        <input type="text" name="name"  placeholder="Ketik.." value="'.$data['name'].'" class="form-control">
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Nama OPD</label>
                    <div class="col-lg-9">
                        <input type="text" name="keterangan"  placeholder="Ketik.." value="'.$data['keterangan'].'" class="form-control">
                    </div>
                </div>
                
            ';

            echo'
                <script>
                    $(document).ready(function() {
                        $(".multiple-select2").select2();
                    });
                </script>
            ';
       
    }
    public function ubah_atas(request $request){
        
            $data=User::where('username',$request->username)->first();
            echo'
                <input type="hidden" name="username" value="'.$data['username'].'">
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Nama</label>
                    <div class="col-lg-9">
                        <input type="text" name="name"  placeholder="Ketik.." value="'.$data['name'].'" class="form-control">
                    </div>
                </div>
                
            ';

            echo'
                <script>
                    $(document).ready(function() {
                        $(".multiple-select2").select2();
                    });
                </script>
            ';
       
    }

    public function ubahpassword(request $request){
        $save=User::where('username',Auth::user()['username'])->update([
            'pass'=>$request->password,
            'password'=>Hash::make($request->password),
            'sts_pass'=>1,
        ]);
    }
    public function save(request $request){
        error_reporting(0);
        

                $rules = [
                    'kode'=> 'required',
                    'name'=> 'required',
                    'keterangan'=> 'required',
                ];

                $messages = [
                    'kode.required'=> 'Isi kode OPD',
                    'name.required'=> 'Isi nama singkatan',
                    'keterangan.required'=> 'Isi Nama OPD',
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
                    
                        $save=Opd::create([
                            'name'=>$request->name,
                            'kode'=>$request->kode,
                            'keterangan'=>$request->keterangan,
                            'lengkap'=>$request->name,
                        ]);

                        if($save){
                           
                            echo'ok';
                        }

                   
                    
                }
        
    }

    public function hapus(request $request){
        error_reporting(0);

            $count=count($request->id);  
            if($count>0){
                
                for($x=0;$x<$count;$x++){
                    $data=Opd::where('id',$request->id[$x])->delete();
                }

                echo'ok';
                    

                
            }else{
                echo'<div style="padding:1%">Error !<br> Tentukan data yang akan dihapus</div>';
            }
    }
    public function reset_password(request $request){
        error_reporting(0);

            $count=count($request->id);  
            if($count>0){
                
                for($x=0;$x<$count;$x++){
                    $data=User::where('username',$request->id[$x])->update([
                        'password'=>Hash::make('admin'),
                        'sts_pass'=>null,
                        'pass'=>'admin',
                    ]);
                }

                echo'ok';
                    

                
            }else{
                echo'<div style="padding:1%">Error !<br> Tentukan data yang akan dihapus</div>';
            }
    }

    public function save_ubah(request $request){
        error_reporting(0);
            $rules = [
                'name'=> 'required',
                'keterangan'=> 'required',
            ];

            $messages = [
                'name.required'=> 'Isi nama singkatan',
                'keterangan.required'=> 'Isi Nama OPD',
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
                
                    $save=Opd::where('id',$request->id)->update([
                        'name'=>$request->name,
                        'keterangan'=>$request->keterangan,
                        'lengkap'=>$request->name,
                    ]);

                    if($save){
                    
                        echo'ok';
                    }

            
                
            }
    }

    public function save_ubah_atas(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi nama pengguna',
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
                    
                        $save=User::where('username',$request->username)->update([
                            'name'=>$request->name,
                        ]);

                        if($save){
                            
                             echo'ok';
                            
                        }
 
                    
                }
        
    }

   
}
