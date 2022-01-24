<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Lhe;
use PDF;
use App\Transaksilhe;
use App\Penilaian;
use App\Detailparameter;
use App\Penilaianlhe;
use App\Penilaiankkesatu;
use App\Penilaiankkedua;
use App\Penilaiankketiga1;
use App\Penilaiankketiga2;
use App\Dokumen;
use App\Penilaiankketiga3;
class TransaksilheController extends Controller
{
    public function index(request $request){
        if(Auth::user()['role_id']==3){
            // $menu='LKE (Laporan Hasil Evaluasi)';
            // $side='Transaksilke';
            // return view('Transaksilhe.index_opd',compact('menu','side'));
            $cek=Transaksilhe::where('tahun',date('Y'))->where('opd_id',akses_opd())->where('role_id',Auth::user()['role_id'])->count();
            if($cek>0){
                $lhe=Transaksilhe::where('tahun',date('Y'))->where('opd_id',akses_opd())->where('role_id',Auth::user()['role_id'])->first();
                return redirect("Transaksilhe/create?id=".base64_encode($lhe['id']));
            }else{
                $data           =   New Transaksilhe;
                $data->tahun    =   date('Y');
                $data->opd_id   =   akses_opd();
                $data->tanggal   =   date('Y-m-d');
                $data->sts      = 1;
                $data->role_id      = Auth::user()['role_id'];
                $data->save();

                if($data){
                    $audit           =   New Transaksilhe;
                    $audit->tahun    =   date('Y');
                    $audit->opd_id   =   akses_opd();
                    $audit->tanggal   =   date('Y-m-d');
                    $audit->sts      = 1;
                    $audit->role_id      = 2;
                    $audit->save();
                    return redirect("Transaksilhe/create?id=".base64_encode($data['id']));
                }
                
            }
        }
        if(Auth::user()['role_id']==1){
            $menu='LKE (Laporan Hasil Evaluasi)';
            $side='Transaksilke';
            if($request->tahun==''){
                $tahun=date('Y');

            }else{
                $tahun=$request->tahun;
            }
            return view('Transaksilhe.index_admin',compact('menu','side','tahun'));
        }
        if(Auth::user()['role_id']>6){
            $menu='LKE (Laporan Hasil Evaluasi)';
            $side='Transaksilke';
            if($request->tahun==''){
                $tahun=date('Y');

            }else{
                $tahun=$request->tahun;
            }
            return view('Transaksilhe.index_all',compact('menu','side','tahun'));
        }
        if(Auth::user()['role_id']==2){
            $menu='LKE (Laporan Hasil Evaluasi)';
            $side='Transaksilke';
            if($request->tahun==''){
                $tahun=date('Y');

            }else{
                $tahun=$request->tahun;
            }
            return view('Transaksilhe.index',compact('menu','side','tahun'));
        }
        
    
    }
    public function index_rekap(request $request){
        if($request->tahun==''){
            $tahun=date('Y');

        }else{
            $tahun=$request->tahun;
        }
        // if(Auth::user()['role_id']==3){
        //     $menu='Rekapan LKE (Laporan Hasil Evaluasi)';
        //     $side='Transaksilke';
        //     return view('Transaksilhe.index_rekap',compact('menu','side','tahun'));
        // }
        // if(Auth::user()['role_id']==7 || Auth::user()['role_id']==8 || Auth::user()['role_id']==9){
            $menu='Rekapan LKE (Laporan Hasil Evaluasi)';
            $side='Transaksilke';
            return view('Transaksilhe.index_rekapall',compact('menu','side','tahun'));
        // }
        // if(Auth::user()['role_id']==2){
        //     $menu='Rekapan LKE (Laporan Hasil Evaluasi)';
        //     $side='Transaksilke';
        //     return view('Transaksilhe.index_rekap',compact('menu','side','tahun'));
        // }
        
    
    }
    public function index_inspektorat(request $request){
        if($request->tahun==''){
            $tahun=date('Y');

        }else{
            $tahun=$request->tahun;
        }
        $menu='LHE Inspektorat ';
        $side='Transaksilke';
        return view('Transaksilhe.index_inspektorat',compact('menu','side','tahun'));
    }

    public function create(request $request){
        $id=$request->id;
        
        if(Auth::user()['role_id']>6 || Auth::user()['role_id']==1){
            if($request->act=='kke' || $request->act==''){
                $menu='LKE';
                $side='Transaksilke';
                $act='kke';
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                return view('Transaksilhe.view',compact('menu','side','data','id','act'));
            }
            if($request->act=='kke1'){
                $menu='KKE1 Capaian';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                return view('Transaksilhe.view_kke1',compact('menu','side','data','id','act'));
            }
            if($request->act=='kke2'){
                $menu='KKE2 ';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                return view('Transaksilhe.view_kke2',compact('menu','side','data','id','act'));
            }
            if($request->act=='kke31'){
                $menu='KKE3 IT';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                return view('Transaksilhe.view_kke31',compact('menu','side','data','id','act'));
            }
            if($request->act=='kke32'){
                $menu='KKE3 IS';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                return view('Transaksilhe.view_kke32',compact('menu','side','data','id','act'));
            }
            if($request->act=='kke33'){
                $menu='KKE3A IKU';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                return view('Transaksilhe.view_kke33',compact('menu','side','data','id','act'));
            }
            if($request->act=='rekomendasi'){
                $menu='Rekomendasi';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                return view('Transaksilhe.view_rekomendasi',compact('menu','side','data','id','act'));
            }
            
        }
        else{
            
            if($request->act=='kke' || $request->act==''){
                $menu='Buat LKE';
                $side='Transaksilke';
                $act='kke';
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                
                if(Auth::user()['role_id']==3){
                    if($data['sts']==1){
                        return view('Transaksilhe.create',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view',compact('menu','side','data','id','act'));
                    }
                }else{
                    
                    if($data['sts']==2){
                        return view('Transaksilhe.create',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view',compact('menu','side','data','id','act'));
                    }
                
                }
                
                
            }
            if($request->act=='kke1'){
                $menu='Buat KKE1 Capaian';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                
                if(Auth::user()['role_id']==3){
                    if($data['sts']==1){
                        return view('Transaksilhe.create_kke1',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_kke1',compact('menu','side','data','id','act'));
                    }
                }else{
                    
                    if($data['sts']==2){
                        return view('Transaksilhe.create_kke1',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_kke1',compact('menu','side','data','id','act'));
                    }
                
                }
                
                
            }
            if($request->act=='kke2'){
                $menu='Buat KKE2';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                
                if(Auth::user()['role_id']==3){
                    if($data['sts']==1){
                        return view('Transaksilhe.create_kke2',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_kke2',compact('menu','side','data','id','act'));
                    }
                }else{
                    
                    if($data['sts']==2){
                        return view('Transaksilhe.create_kke2',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_kke2',compact('menu','side','data','id','act'));
                    }
                
                }
                
                
            }
            if($request->act=='kke31'){
                $menu='Buat KKE3 IT';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                if(Auth::user()['role_id']==3){
                    if($data['sts']==1){
                        return view('Transaksilhe.create_kke31',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_kke31',compact('menu','side','data','id','act'));
                    }
                }else{
                    
                    if($data['sts']==2){
                        return view('Transaksilhe.create_kke31',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_kke31',compact('menu','side','data','id','act'));
                    }
                
                }
                
                
            }
            if($request->act=='kke32'){
                $menu='Buat KKE3 IS';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                if(Auth::user()['role_id']==3){
                    if($data['sts']==1){
                        return view('Transaksilhe.create_kke32',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_kke32',compact('menu','side','data','id','act'));
                    }
                }else{
                    
                    if($data['sts']==2){
                        return view('Transaksilhe.create_kke32',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_kke32',compact('menu','side','data','id','act'));
                    }
                
                }
                
                
            }
            if($request->act=='kke33'){
                $menu='Buat KKE3A IKU';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                if(Auth::user()['role_id']==3){
                    if($data['sts']==1){
                        return view('Transaksilhe.create_kke33',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_kke33',compact('menu','side','data','id','act'));
                    }
                }else{
                    
                    if($data['sts']==2){
                        return view('Transaksilhe.create_kke33',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_kke33',compact('menu','side','data','id','act'));
                    }
                
                }
                
                
            }
            if($request->act=='rekomendasi'){
                $menu='Buat Rekomendasi';
                $side='Transaksilke';
                $act=$request->act;
                $data=Transaksilhe::where('id',base64_decode($request->id))->first();
                
                if(Auth::user()['role_id']==3){
                    if($data['sts']==1){

                    }else{

                    }
                }else{
                    
                    if($data['sts']==2){
                        return view('Transaksilhe.create_rekomendasi',compact('menu','side','data','id','act'));
                    }else{
                        return view('Transaksilhe.view_rekomendasi',compact('menu','side','data','id','act'));
                    }
                
                }
                
                
            }
        }
        
    
    }

    public function kirim_auditor(request $request){
        $data=Transaksilhe::where('id',$request->id)->first();
        $getdatalhe=Penilaianlhe::where('transaksilhe_id',$request->id)->get();
        $getdatakkesatu=Penilaiankkesatu::where('transaksikkesatu_id',$request->id)->get();
        $getdatakkedua=Penilaiankkedua::where('transaksilhe_id',$request->id)->get();
        $getdatakketiga1=Penilaiankketiga1::where('transaksilhe_id',$request->id)->get();
        $getdatakketiga2=Penilaiankketiga2::where('transaksilhe_id',$request->id)->get();
        $getdatakketiga3=Penilaiankketiga3::where('transaksilhe_id',$request->id)->get();
        $datanew=Transaksilhe::where('opd_id',$data['opd_id'])->where('tahun',$data['tahun'])->where('role_id',2)->first();
        $update=Transaksilhe::where('opd_id',$data['opd_id'])->where('tahun',$data['tahun'])->update([
            'sts'=>2,
        ]);

        foreach($getdatalhe as $getlhe){
            $cek=Penilaianlhe::where('transaksilhe_id',$datanew['id'])->where('penilaian_id',$getlhe['penilaian_id'])->count();
            if($cek>0){
                $save=Penilaianlhe::where('transaksilhe_id',$datanew['id'])->where('penilaian_id',$getlhe['penilaian_id'])->update([
                    'nilai'=>$getlhe['nilai'],
                    'prameter_id'=>$getlhe['prameter_id'],
                    'jawaban_id'=>$getlhe['jawaban_id'],
                    'file'=>$getlhe['file'],
                    'saran'=>$getlhe['saran'],
                ]);

                
            }else{
                $save=Penilaianlhe::create([
                    'transaksilhe_id'=>$datanew['id'],
                    'prameter_id'=>$getlhe['prameter_id'],
                    'file'=>$getlhe['file'],
                    'saran'=>$getlhe['saran'],
                    'detail_prameter_id'=>$getlhe['detail_prameter_id'],
                    'penilaian_id'=>$getlhe['penilaian_id'],
                    'nilai'=>$getlhe['nilai'],
                    'jawaban_id'=>$getlhe['jawaban_id'],
                ]);

                
            }
        }
        foreach($getdatakkesatu as $getlkkesatu){
            $cek=Penilaiankkesatu::where('transaksikkesatu_id',$datanew['id'])->where('kategori',$getlkkesatu['kategori'])->count();
            if($cek>0){
                $save=Penilaiankkesatu::where('transaksikkesatu_id',$datanew['id'])->where('kategori',$getlkkesatu['kategori'])->update([
                    'nilai'=>$getlkkesatu['nilai'],
                    'jawaban_id'=>$getlkkesatu['jawaban_id'],
                    'kat'=>$getlkkesatu['kat'],
                ]);

                
            }else{
                $save=Penilaiankkesatu::create([
                    'transaksikkesatu_id'=>$datanew['id'],
                    'parameter_kkesatu_id'=>$getlkkesatu['parameter_kkesatu_id'],
                    'kategori'=>$getlkkesatu['kategori'],
                    'nilai'=>$getlkkesatu['nilai'],
                    'jawaban_id'=>$getlkkesatu['jawaban_id'],
                    'kat'=>$getlkkesatu['kat'],
                ]);

                
            }
        }
        foreach($getdatakkedua as $getlkkedua){
            $cek=Penilaiankkedua::where('transaksilhe_id',$datanew['id'])->where('kategori',$getlkkedua['kategori'])->count();
            if($cek>0){
                $save=Penilaiankkedua::where('transaksilhe_id',$datanew['id'])->where('kategori',$getlkkedua['kategori'])->update([
                    'nilai'=>$getlkkedua['nilai'],
                    'jawaban_id'=>$getlkkedua['jawaban_id'],
                    'kat'=>$getlkkedua['kat'],
                ]);

                
            }else{
                $save=Penilaiankkedua::create([
                    'transaksilhe_id'=>$datanew['id'],
                    'parameter_kkedua_id'=>$getlkkedua['parameter_kkedua_id'],
                    'kategori'=>$getlkkedua['kategori'],
                    'nilai'=>$getlkkedua['nilai'],
                    'jawaban_id'=>$getlkkedua['jawaban_id'],
                    'kat'=>$getlkkedua['kat'],
                ]);

                
            }
        }
        foreach($getdatakketiga1 as $getlkketiga1){
            $cek=Penilaiankketiga1::where('transaksilhe_id',$datanew['id'])->where('kategori',$getlkketiga1['kategori'])->count();
            if($cek>0){
                $save=Penilaiankketiga1::where('transaksilhe_id',$datanew['id'])->where('kategori',$getlkketiga1['kategori'])->update([
                    'nilai'=>$getlkketiga1['nilai'],
                    'jawaban_id'=>$getlkketiga1['jawaban_id'],
                    'kat'=>$getlkketiga1['kat'],
                ]);

                
            }else{
                $save=Penilaiankketiga1::create([
                    'transaksilhe_id'=>$datanew['id'],
                    'parameter_kketiga1_id'=>$getlkketiga1['parameter_kketiga1_id'],
                    'kategori'=>$getlkketiga1['kategori'],
                    'nilai'=>$getlkketiga1['nilai'],
                    'jawaban_id'=>$getlkketiga1['jawaban_id'],
                    'kat'=>$getlkketiga1['kat'],
                ]);

                
            }
        }
        foreach($getdatakketiga2 as $getlkketiga2){
            $cek=Penilaiankketiga2::where('transaksilhe_id',$datanew['id'])->where('kategori',$getlkketiga2['kategori'])->count();
            if($cek>0){
                $save=Penilaiankketiga2::where('transaksilhe_id',$datanew['id'])->where('kategori',$getlkketiga2['kategori'])->update([
                    'nilai'=>$getlkketiga2['nilai'],
                    'jawaban_id'=>$getlkketiga2['jawaban_id'],
                    'kat'=>$getlkketiga2['kat'],
                ]);

                
            }else{
                $save=Penilaiankketiga2::create([
                    'transaksilhe_id'=>$datanew['id'],
                    'parameter_kketiga2_id'=>$getlkketiga2['parameter_kketiga2_id'],
                    'kategori'=>$getlkketiga2['kategori'],
                    'nilai'=>$getlkketiga2['nilai'],
                    'jawaban_id'=>$getlkketiga2['jawaban_id'],
                    'kat'=>$getlkketiga2['kat'],
                ]);

                
            }
        }
        foreach($getdatakketiga3 as $getlkketiga3){
            $cek=Penilaiankketiga3::where('transaksilhe_id',$datanew['id'])->where('kategori',$getlkketiga3['kategori'])->count();
            if($cek>0){
                $save=Penilaiankketiga3::where('transaksilhe_id',$datanew['id'])->where('kategori',$getlkketiga3['kategori'])->update([
                    'nilai'=>$getlkketiga3['nilai'],
                    'jawaban_id'=>$getlkketiga3['jawaban_id'],
                    'kat'=>$getlkketiga3['kat'],
                ]);

                
            }else{
                $save=Penilaiankketiga3::create([
                    'transaksilhe_id'=>$datanew['id'],
                    'parameter_kketiga3_id'=>$getlkketiga3['parameter_kketiga3_id'],
                    'kategori'=>$getlkketiga3['kategori'],
                    'nilai'=>$getlkketiga3['nilai'],
                    'jawaban_id'=>$getlkketiga3['jawaban_id'],
                    'kat'=>$getlkketiga3['kat'],
                ]);

                
            }
        }
    }
    public function detail_opd(request $request){
        foreach(opd_get() as $opd){
            echo'
                <a href="#" class="widget-list-item">
                    <div class="widget-list-action text-nowrap text-grey-darker">
                        <div class="widget-chart-info-progress">
                            <b>'.$opd['name'].'</b>
                            <span class="pull-right">'.total_nilai_opd_parameter($opd->id,$request->tahunini).'% </span>
                        </div>
                        <div class="progress progress-sm m-b-15">
                            <div class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-green" style="width: '.total_nilai_opd_parameter($opd->id,$request->tahunini).'%"></div>
                        </div>
                    </div>
                </a>
            ';
        }
    }
    public function saran(request $request){
        $data=Penilaianlhe::where('id',$request->id)->first();
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

    public function save(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                    'tahun'=> 'required',
                    'opd_id'=> 'required',
                    'file'=> 'required|mimes:pdf',
                ];
                $messages = [
                    'name.required'=> 'Isi Judul laporan',
                    'tahun_lahir.required'=> 'Isi tahun laporan',
                    'opd_id.required'=> 'Pilih OPD',
                    'file.required'=> 'Upload dokumen dengan format (pdf)', 
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
                    
                    $cek=Transaksilhe::where('tahun',$request->tahun)->count();
                    if($cek>0){
                        $data=Transaksilhe::where('tahun',$request->tahun)->orderBy('id','Desc')->firstOrfail();
                        $urutan = substr($data['nomor'],0,3);
                        $urutan++;
                        $nomor=sprintf("%03s", $urutan).'/LHE/ Inspektorat/'.$request->tahun;
                        $nomorfile=sprintf("%03s", $urutan).'LHE-Inspektorat-'.$request->tahun;
                    }else{
                        $nomor=sprintf("%03s", 1).'/LHE/ Inspektorat/'.$request->tahun;
                        $nomorfile=sprintf("%03s", 1).'LHE-Inspektorat-'.$request->tahun;
                    }
                    $cekdata=Transaksilhe::where('tahun',$request->tahun)->where('opd_id',$request->opd_id)->count();
                    if($cekdata>0){
                        echo'<div style="padding:1%">Error !<br> Laporan di '.$request->tahun.' ini sudah terdaftar</div>';
                    }else{
                        $image = $request->file('file');
                        $size = $image->getSize();
                        $imageFileName =$nomorfile.'.'. $image->getClientOriginalExtension();
                        $filePath =$imageFileName;
                        $file = \Storage::disk('public_uploads');
                        if($file->put($filePath, file_get_contents($image))){
                            $save=Transaksilhe::create([
                                'name'=>$request->name,
                                'opd_id'=>$request->opd_id,
                                'tanggal'=>date('Y-m-d'),
                                'tahun'=>$request->tahun,
                                'nomor'=>$nomor,
                                'file'=>$filePath,
                                'sts'=>1,
                            ]);
                            echo'ok@'.base64_encode($save['id']);
                        }else{
                            echo'<div style="padding:1%">Error !<br> Upload Gagal</div>';
                        }
                    }
                        

                    
                    
                }
        
    }

    public function save_lhe(request $request){
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
                        
                        $cek=Penilaianlhe::where('transaksilhe_id',$request->id)->where('penilaian_id',$request->penilaian_id)->count();
                        $par=Detailparameter::where('id',$request->detail_prameter_id)->first();
                        if($cek>0){
                            $save=Penilaianlhe::where('transaksilhe_id',$request->id)->where('penilaian_id',$request->penilaian_id)->update([
                                'nilai'=>nilai_jawaban($request->jawaban_id),
                                'prameter_id'=>$par['parameter_id'],
                                'jawaban_id'=>$request->jawaban_id,
                            ]);

                            echo'ok';
                        }else{
                            $save=Penilaianlhe::create([
                                'transaksilhe_id'=>$request->id,
                                'prameter_id'=>$par['parameter_id'],
                                'detail_prameter_id'=>$request->detail_prameter_id,
                                'penilaian_id'=>$request->penilaian_id,
                                'nilai'=>nilai_jawaban($request->jawaban_id),
                                'jawaban_id'=>$request->jawaban_id,
                            ]);

                            echo'ok';
                        }
                            
                        
                    }
            
        
    }
    public function proses_buka(request $request){
        error_reporting(0);
        
            
                    $rules = [
                        'sts'=> 'required',
                    ];

                    $messages = [
                        'sts.required'=> 'Pilih Status',
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
                        
                        
                        $save=Transaksilhe::where('opd_id',$request->opd_id)->where('tahun',$request->tahun)->update([
                            'sts'=>$request->sts,
                        ]);

                        echo'ok';
                         
                        
                    }
            
        
    }

    public function save_saran(request $request){
        error_reporting(0);
        
            
                    $rules = [
                        'file'=> 'required|mimes:pdf,jgp,jpeg,png,gif',
                        'tahun'=> 'required',
                        'sampai'=> 'required',
                    ];

                    $messages = [
                        'file.required'=> 'Format file harus pdf atau gambar',
                        'tahun.required'=> 'Tahun mulai',
                        'sampai.required'=> 'Tahun sampai',
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
                        
                        $image = $request->file('file');
                        $size = $image->getSize();
                        $imageFileName =$request->opd_id.$request->kategori_id.'-'.$request->tahun.'sd'.$request->sampai.'.'. $image->getClientOriginalExtension();
                        $filePath =$imageFileName;
                        $file = \Storage::disk('public_uploads');
                        if($file->put($filePath, file_get_contents($image))){
                            for($tahun=$request->tahun;$tahun<=$request->sampai;$tahun++){
                                $cekdok=Dokumen::where('kategori_id',$request->kategori_id)->where('opd_id',$request->opd_id)->where('tahun',$tahun)->count();
                                if($cekdok>0){
                                    $save=Dokumen::where('kategori_id',$request->kategori_id)->where('opd_id',$request->opd_id)->where('tahun',$tahun)->update([
                                        'waktu'=>date('Y-m-d H:i:s'),
                                        'file'=>$filePath,
                                        'target'=>$request->target,
                                    ]);
                                    
                                }else{
                                    $save=Dokumen::create([
                                        'kategori_id'=>$request->kategori_id,
                                        'opd_id'=>$request->opd_id,
                                        'target'=>$request->target,
                                        'tahun'=>$tahun,
                                        'waktu'=>date('Y-m-d H:i:s'),
                                        'file'=>$filePath,
                                    ]);
                                    
                                }

                            }
                            echo'ok';        
                            
                            
                        }else{
                            echo'<div style="padding:1%">Error !<br> Upload Gagal</div>';
                        }

                            
                    }
            
        
    }

    public function cetak_rekap(request $request){
        $data=auditor_get();
        $tahun=$request->tahun;
        $pdf = PDF::loadView('pdf.rekap_lke', compact('data','tahun'));
        $pdf->setPaper('A4', 'Landscape');
        return $pdf->stream();
    }
    public function cetak(request $request){
        $data=Transaksilhe::where('id',$request->id)->first();
        if($request->kat=='LKE'){
            $pdf = PDF::loadView('pdf.cetak_lke', compact('data'));
            $pdf->setPaper('A4', 'Potrait');
            return $pdf->stream('LKE'.$data->file);
        }
        if($request->kat=='KKE1'){
            $pdf = PDF::loadView('pdf.cetak_kke1', compact('data'));
            $pdf->setPaper('A4', 'Landscape');
            return $pdf->stream('KKECAPAIAN'.$data->file);
        }
        if($request->kat=='KKE2'){
            $pdf = PDF::loadView('pdf.cetak_kke2', compact('data'));
            $pdf->setPaper('A4', 'Potrait');
            return $pdf->stream('KKE2'.$data->file);
        }
        if($request->kat=='KKE31'){
            $pdf = PDF::loadView('pdf.cetak_kke31', compact('data'));
            $pdf->setPaper('A4', 'Landscape');
            return $pdf->stream('KKEIT'.$data->file);
        }
        if($request->kat=='KKE32'){
            $pdf = PDF::loadView('pdf.cetak_kke32', compact('data'));
            $pdf->setPaper('A4', 'Landscape');
            return $pdf->stream('KKEIS'.$data->file);
        }
        if($request->kat=='KKE33'){
            $pdf = PDF::loadView('pdf.cetak_kke33', compact('data'));
            $pdf->setPaper('A4', 'Landscape');
            return $pdf->stream('KKEIKU'.$data->file);
        }
        if($request->kat=='REKOMENDASI'){
            $pdf = PDF::loadView('pdf.cetak_rekomendasi', compact('data'));
            $pdf->setPaper('A4', 'Landscape');
            return $pdf->stream('REKOM'.$data->file);
        }
        
        
    }
}
