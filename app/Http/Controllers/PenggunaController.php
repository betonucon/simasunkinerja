<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;
use App\Role;
use App\Akses;
class PenggunaController extends Controller
{
    public function index(request $request){
        if(Auth::user()['role_id']==1){
            $menu='Pengguna Sistem ';
            $side='master';
            $role=$request->role;
            return view('Pengguna.index',compact('menu','side','role'));
        }else{
            return view('error');
        }
        
    
    }
    public function index_auditor(request $request){
        
        $menu='Pengguna Sistem ';
        $side='master';
        $role=$request->role;
        return view('Pengguna.index_auditor',compact('menu','side','role'));
    
    }

    public function create(request $request){
        
        $menu='Buat LHE';
        $side='lhe';
        return view('Pengguna.create',compact('menu','side'));
    
    }

    public function ubah(request $request){
        
            $data=User::where('username',$request->username)->first();
            $get=Akses::where('username',$request->username)->get();
            echo'
                <input type="hidden" name="username" value="'.$data['username'].'">
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Nama</label>
                    <div class="col-lg-9">
                        <input type="text" name="name"  placeholder="Ketik.." value="'.$data['name'].'" class="form-control">
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label" >OPD Terkait</label>
                    <div class="col-lg-9">';
                        if($data->role_id==2){
                            echo'
                            <select class="multiple-select2 form-control" name="opd_id[]" multiple="multiple">
                                <optgroup label="Pilih OPD">';
                                    foreach(opd_get() as $opd){
                                        echo'<option value="'.$opd['id'].'" '; if(cek_opd_ubah($data['username'],$opd['id'])>0){echo'selected';} echo'>'.$opd['name'].' ( '.$opd['lengkap'].' ) </option>';
                                    }
                                    echo'
                                
                                </optgroup>
                            </select>';
                        }

                        if($data->role_id==3){
                            echo'
                            <select class="select2 form-control" name="opd_id[]" >
                                <optgroup label="Pilih OPD">';
                                    foreach(opd_get() as $opd){
                                        echo'<option value="'.$opd['id'].'" '; if(cek_opd_ubah($data['username'],$opd['id'])>0){echo'selected';} echo'>'.$opd['name'].' ( '.$opd['lengkap'].' )</option>';
                                    }
                                    echo'
                                
                                </optgroup>
                            </select>';
                        }
                        echo'
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
        echo'ok';
    }
    public function save(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                    'akses'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi nama pengguna',
                    'akses.required'=> 'Pilih akses',
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
                    if($request->akses=='OPD' || $request->akses=='AUD' || $request->akses=='IRB'){
                        if($request->akses=='OPD'){
                            $role=3;
                        }else{
                            $role=2;
                        }
                        $cek=User::where('akses',$request->akses)->count();
                        if($cek>0){
                            $data=User::where('akses',$request->akses)->orderBy('username','Desc')->firstOrfail();
                            $urutan = substr($data['username'],3,3);
                            $urutan++;
                            $nomor=$request->akses.sprintf("%03s", $urutan);
                        }else{
                            $nomor=$request->akses.sprintf("%03s", 1);
                        }
                        $count=count($request->opd_id);  
                        if($count>0){
                            $save=User::create([
                                'name'=>$request->name,
                                'email'=>$nomor.'@gmail.com',
                                'role_id'=>$role,
                                'akses'=>$request->akses,
                                'tahun'=>$tgl[0],
                                'username'=>$nomor,
                                'password'=>Hash::make('admin'),
                                'pass'=>'admin',
                            ]);

                            if($save){
                                for($x=0;$x<$count;$x++){
                                    $opd=Akses::create([
                                        'opd_id'=>$request->opd_id[$x],
                                        'username'=>$nomor,
                                    ]); 
                                }

                                echo'ok';
                            }

                            
                        }else{
                            echo'<div style="padding:1%">Error !<br> Tentukan OPD</div>';
                        }
                    }else{
                            $cekrole=Role::where('singkatan',$request->akses)->first();
                            $role=$cekrole['id'];
                            $cek=User::where('akses',$request->akses)->count();
                            if($cek>0){
                                $data=User::where('akses',$request->akses)->orderBy('username','Desc')->firstOrfail();
                                $urutan = substr($data['username'],3,3);
                                $urutan++;
                                $nomor=$request->akses.sprintf("%03s", $urutan);
                            }else{
                                $nomor=$request->akses.sprintf("%03s", 1);
                            }
                            $save=User::create([
                                'name'=>$request->name,
                                'email'=>$nomor.'@gmail.com',
                                'role_id'=>$role,
                                'akses'=>$request->akses,
                                'tahun'=>$tgl[0],
                                'username'=>$nomor,
                                'password'=>Hash::make('admin'),
                                'pass'=>'admin',
                            ]);
                        
                    }
                        
                    
                }
        
    }

    public function hapus(request $request){
        error_reporting(0);

            $count=count($request->id);  
            if($count>0){
                
                for($x=0;$x<$count;$x++){
                    $data=User::where('username',$request->id[$x])->delete();
                    $akses=Akses::where('username',$request->id[$x])->delete() ;
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
                    $count=count($request->opd_id);  
                    if($count>0){
                        $save=User::where('username',$request->username)->update([
                            'name'=>$request->name,
                        ]);

                        if($save){
                            $del=Akses::where('username',$request->username)->delete();
                            if($del){
                                for($x=0;$x<$count;$x++){
                                    $opd=Akses::create([
                                        'opd_id'=>$request->opd_id[$x],
                                        'username'=>$request->username,
                                    ]); 
                                }

                                echo'ok';
                            }
                        }

                        
                    }else{
                        echo'<div style="padding:1%">Error !<br> Tentukan OPD</div>';
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
