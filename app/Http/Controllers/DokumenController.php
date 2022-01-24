<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Periode;
use App\Dokumen;
class DokumenController extends Controller
{
    public function index(request $request){
        
            if($request->tahun==''){
                $tahun=date('Y');
            }else{
                $tahun=$request->tahun;
            }
            $menu='Dokumen RPJMD ';
            $side='master';
            return view('Dokumen.index',compact('menu','side','tahun'));
        
    
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
                    <label class="col-lg-3 text-lg-right col-form-label">Email</label>
                    <div class="col-lg-7">
                        <input type="email" name="email"  placeholder="Ketik.." value="'.$data['email'].'" class="form-control">
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
                                        echo'<option value="'.$opd['id'].'" '; if(cek_opd_ubah($data['username'],$opd['id'])>0){echo'selected';} echo'>'.$opd['name'].' ( '.$opd['lengkap'].' ) '.cek_opd_ubah($data['username'],$opd['id']).'</option>';
                                    }
                                    echo'
                                
                                </optgroup>
                            </select>';
                        }

                        if($data->role_id==3){
                            echo'
                            <select class="select2 form-control" name="opd_id" >
                                <optgroup label="Pilih OPD">';
                                    foreach(opd_get() as $opd){
                                        echo'<option value="'.$opd['id'].'" '; if(cek_opd_ubah($data['username'],$opd['id'])>0){echo'selected';} echo'>'.$opd['name'].' ( '.$opd['lengkap'].' ) '.cek_opd_ubah($data['username'],$opd['id']).'</option>';
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

    public function hapus(request $request){
        $data=Dokumen::where('tahun',$request->tahun)->where('opd_id',$request->opd_id)->delete();
    }
    public function save(request $request){
        error_reporting(0);
        

                $rules = [
                    'file'=> 'required|mimes:pdf',
                    'tahun'=> 'required|numeric',
                    'sampai'=> 'required|numeric',
                ];

                $messages = [
                    'file.required'=> 'Upload dokumen dengan format (pdf)', 
                    'tahun.required'=> 'Dari Tahun berisi angka', 
                    'sampai.required'=> 'Dari Sampai berisi angka', 
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
                    $cek=Periode::count();
                        if($cek>0){
                            $per=Periode::update([
                                'sts'=>2
                            ]);
                            if($per){
                                $periode=Periode::create([
                                    'tahun'=>$request->tahun,
                                    'sampai'=>$request->sampai,
                                    'sts'=>1,
                                ]);
                            }
                        }else{
                            $periode=Periode::create([
                                'tahun'=>$request->tahun,
                                'sampai'=>$request->sampai,
                                'sts'=>1,
                            ]);
                        }
                    
                        $image = $request->file('file');
                        $size = $image->getSize();
                        $imageFileName ='RPJMD'.date('ymdhis').'.'. $image->getClientOriginalExtension();
                        $filePath =$imageFileName;
                        $file = \Storage::disk('public_uploads');
                        if($file->put($filePath, file_get_contents($image))){
                            for($x=$request->tahun;$x<=$request->sampai;$x++){
                                foreach(opd_get() as $opd){
                                    $cek=Dokumen::where('kategori_id',1)->where('opd_id',$opd['id'])->where('tahun',$x)->count();
                                    if($cek>0){
                                        $save=Dokumen::where('kategori_id',1)->where('opd_id',$opd['id'])->where('tahun',$x)->update([
                                            'waktu'=>date('Y-m-d H:i:s'),
                                            'file'=>$filePath,
                                        ]);
                                    }else{
                                        $save=Dokumen::create([
                                            'kategori_id'=>1,
                                            'opd_id'=>$opd['id'],
                                            'tahun'=>$x,
                                            'waktu'=>date('Y-m-d H:i:s'),
                                            'file'=>$filePath,
                                        ]);
                                    }
                                }

                            }
                            echo'ok';
                        }else{

                        }
                        
                    
                        
                    
                }
        
    }

    
}
