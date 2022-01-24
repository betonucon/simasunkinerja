<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Lhe;
use App\Penilaian;
use App\Periode;
use App\Kkesatu;
use App\Kkedua;
use App\Kketiga1;
use App\Kketiga2;
use App\Kketiga3;
use App\Parameterkkesatu;
use App\Parameterkkedua;
use App\Parameterkketiga1;
use App\Parameterkketiga2;
use App\Parameterkketiga3;
use App\Penilaiankkesatu;
use App\Penilaiankkedua;
use App\Penilaiankketiga1;
use App\Penilaiankketiga2;
use App\Penilaiankketiga3;
class LheController extends Controller
{
    public function index(request $request){
        
        $menu='LHE (Laporan Hasil Evaluasi)';
        $side='lhe';
        return view('Lhe.index',compact('menu','side'));
    
    }
    public function index_kke1(request $request){
        error_reporting(0);
        $cek=Periode::where('sts',1)->count();
        if($cek>0){
            $data=Periode::where('sts',1)->first();
            $tahun=$data['tahun'];
            $sampai=$data['sampai'];
            
            $menu='KKE1 Capaian';
            $side='lhe';
            return view('Lhe.index_kke1',compact('menu','side','tahun','sampai'));
        }else{
            echo'Tidak ada periode RPJMD yang aktif';
        }
    
    }
    public function index_kke2(request $request){
        error_reporting(0);
        $cek=Periode::where('sts',1)->count();
        if($cek>0){
            $data=Periode::where('sts',1)->first();
            $tahun=$data['tahun'];
            $sampai=$data['sampai'];
            
            $menu='KKE2A TS';
            $side='lhe';
            return view('Lhe.index_kke2',compact('menu','side','tahun','sampai'));
        }else{
            echo'Tidak ada periode RPJMD yang aktif';
        }
    
    }
    public function index_kke31(request $request){
        error_reporting(0);
        $cek=Periode::where('sts',1)->count();
        if($cek>0){
            $data=Periode::where('sts',1)->first();
            $tahun=$data['tahun'];
            $sampai=$data['sampai'];
            
            $menu='KKE3A IT';
            $side='lhe';
            return view('Lhe.index_kke31',compact('menu','side','tahun','sampai'));
        }else{
            echo'Tidak ada periode RPJMD yang aktif';
        }
        
    }
    public function index_kke32(request $request){
        error_reporting(0);
        $cek=Periode::where('sts',1)->count();
        if($cek>0){
            $data=Periode::where('sts',1)->first();
            $tahun=$data['tahun'];
            $sampai=$data['sampai'];
            
            $menu='KKE3A IS';
            $side='lhe';
            return view('Lhe.index_kke32',compact('menu','side','tahun','sampai'));
        }else{
            echo'Tidak ada periode RPJMD yang aktif';
        }
    }
    public function index_kke33(request $request){
        error_reporting(0);
        $cek=Periode::where('sts',1)->count();
        if($cek>0){
            $data=Periode::where('sts',1)->first();
            $tahun=$data['tahun'];
            $sampai=$data['sampai'];
            
            $menu='KKE3A IKU';
            $side='lhe';
            return view('Lhe.index_kke33',compact('menu','side','tahun','sampai'));
        }else{
            echo'Tidak ada periode RPJMD yang aktif';
        }
    
    }

    public function create(request $request){
        
        $menu='Buat LHE';
        $side='lhe';
        return view('Lhe.create',compact('menu','side','tahun'));
    
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
        }if($request->utama==1){
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
                    'tanggal'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Judul laporan',
                    'tanggal_lahir.required'=> 'Isi tanggal laporan',
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
                    $tgl=explode('-',$request->tanggal);
                    $cek=Lhe::where('tahun',$tgl[0])->count();
                    if($cek>0){
                        $data=Lhe::where('tahun',$tgl[0])->orderBy('id','Desc')->firstOrfail();
                        $urutan = substr($data['nomor'],0,3);
                        $urutan++;
                        $nomor=sprintf("%03s", $urutan).'/LHE/ Inspektorat/'.$tgl[0];
                        $nomorfile=sprintf("%03s", $urutan).'LHE-Inspektorat-'.$tgl[0];
                    }else{
                        $nomor=sprintf("%03s", 1).'/LHE/ Inspektorat/'.$tgl[0];
                        $nomorfile=sprintf("%03s", 1).'LHE-Inspektorat-'.$tgl[0];
                    }

                    $save=Lhe::create([
                        'name'=>$request->name,
                        'tanggal'=>$request->tanggal,
                        'tahun'=>$tgl[0],
                        'nomor'=>$nomor,
                        'sts'=>1,
                    ]);

                    echo'ok@'.base64_encode($save['id']);
                    
                }
        
    }

    public function save_kke1_sasaran(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Sasaran',
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
                    
                    if($request->act=='ubah'){
                        $save=Kkesatu::where('id',$request->id)->update([
                            'name'=>$request->name,
                        ]);
    
                        echo'ok';
                    }else{
                        $save=Kkesatu::create([
                            'name'=>$request->name,
                            'note'=>$request->parameter_id,
                            'opd_id'=>$request->opd_id,
                            'ket_sasaran'=>1,
                            
                            'tahun'=>$request->tahun,
                            'sampai'=>$request->sampai,
                            'utama'=>1,
                            'sts'=>1,
                        ]);

                        echo'ok';
                    }
                    
                }
        
    }
    public function save_kke2_sasaran(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                
                ];

                $messages = [
                    'name.required'=> 'Isi Sasaran',
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
                    
                    if($request->act=='ubah'){
                        $save=Kkedua::where('id',$request->id)->update([
                            'name'=>$request->name,
                        ]);
    
                        echo'ok';
                    }else{
                        if (trim($request->ket) == '') {$error[] = '- Pilih Kategori';}
                        if (isset($error)) {echo '<div style="padding:1%">Error: <br />'.implode('<br />', $error).'</div>';} 
                        else{
                            $save=Kkedua::create([
                                'name'=>$request->name,
                                'note'=>$request->parameter_id,
                                'opd_id'=>$request->opd_id,
                                'ket'=>$request->ket,
                                'tahun'=>$request->tahun,
                                'sampai'=>$request->sampai,
                                'utama'=>1,
                                'sts'=>1,
                            ]);
        
                            echo'ok';
                        }
                    }
                    
                    
                }
        
    }
    public function save_kketiga1_sasaran(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Sasaran',
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
                    
                    if($request->act=='ubah'){
                        $save=Kketiga1::where('id',$request->id)->update([
                            'name'=>$request->name,
                        ]);
    
                        echo'ok';
                    }else{
                        $save=Kketiga1::create([
                            'name'=>$request->name,
                            'note'=>$request->parameter_id,
                            'opd_id'=>$request->opd_id,
                            'ket_sasaran'=>1,
                            
                            'tahun'=>$request->tahun,
                            'sampai'=>$request->sampai,
                            'utama'=>1,
                            'sts'=>1,
                        ]);

                        echo'ok';
                    }
                    
                }
        
    }
    public function save_kketiga2_sasaran(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                
                ];

                $messages = [
                    'name.required'=> 'Isi Sasaran',
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
                    
                    if($request->act=='ubah'){
                        $save=Kketiga2::where('id',$request->id)->update([
                            'name'=>$request->name,
                        ]);
    
                        echo'ok';
                    }else{
                        if (trim($request->ket) == '') {$error[] = '- Pilih Kategori';}
                        if (isset($error)) {echo '<div style="padding:1%">Error: <br />'.implode('<br />', $error).'</div>';} 
                        else{
                            $save=Kketiga2::create([
                                'name'=>$request->name,
                                'note'=>$request->parameter_id,
                                'opd_id'=>$request->opd_id,
                                'ket'=>$request->ket,
                                'tahun'=>$request->tahun,
                                'sampai'=>$request->sampai,
                                'utama'=>1,
                                'sts'=>1,
                            ]);
        
                            echo'ok';
                        }
                    }
                    
                    
                }
        
    }
    public function save_kketiga3_sasaran(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Sasaran',
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
                    
                    if($request->act=='ubah'){
                        $save=Kketiga3::where('id',$request->id)->update([
                            'name'=>$request->name,
                        ]);
    
                        echo'ok';
                    }else{
                        $save=Kketiga3::create([
                            'name'=>$request->name,
                            'note'=>$request->parameter_id,
                            'opd_id'=>$request->opd_id,
                            'ket_sasaran'=>1,
                            
                            'tahun'=>$request->tahun,
                            'sampai'=>$request->sampai,
                            'utama'=>1,
                            'sts'=>1,
                        ]);

                        echo'ok';
                    }
                    
                }
        
    }
    
    public function save_kke1(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Judul',
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
                    

                    $save=Kkesatu::create([
                        'name'=>$request->name,
                        'note'=>$request->parameter_id,
                        'utama'=>2,
                        'ket_ik'=>2,
                        'ket_target'=>2,
                        'ket_kinerja'=>2,
                        'ket_data'=>2,
                    ]);

                    if($save){
                        
                        echo'ok';
                    }
                    
                }
        
    }
    public function save_kke2(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Sasaran',
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
                    

                    $save=Kkedua::create([
                        'name'=>$request->name,
                        'note'=>$request->parameter_id,
                        'utama'=>2,
                        'ket_ik'=>2,
                        'ket_target'=>2,
                        'ket_kinerja'=>2,
                        'ket_data'=>2,
                    ]);

                    if($save){
                        
                        echo'ok';
                    }
                    
                }
        
    }
    public function save_kketiga1(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Judul',
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
                    

                    $save=Kketiga1::create([
                        'name'=>$request->name,
                        'note'=>$request->parameter_id,
                        'utama'=>2,
                        'ket_ik'=>2,
                        'ket_target'=>2,
                        'ket_kinerja'=>2,
                        'ket_data'=>2,
                    ]);

                    if($save){
                        
                        echo'ok';
                    }
                    
                }
        
    }
    public function save_kketiga2(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Judul',
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
                    

                    $save=Kketiga2::create([
                        'name'=>$request->name,
                        'note'=>$request->parameter_id,
                        'utama'=>2,
                        'ket_ik'=>2,
                        'ket_target'=>2,
                        'ket_kinerja'=>2,
                        'ket_data'=>2,
                    ]);

                    if($save){
                        
                        echo'ok';
                    }
                    
                }
        
    }
    public function save_kketiga3(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Judul',
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
                    

                    $save=Kketiga3::create([
                        'name'=>$request->name,
                        'note'=>$request->parameter_id,
                        'utama'=>2,
                        'ket_ik'=>2,
                        'ket_target'=>2,
                        'ket_kinerja'=>2,
                        'ket_data'=>2,
                    ]);

                    if($save){
                        
                        echo'ok';
                    }
                    
                }
        
    }
    
    public function hapus_kke1(request $request){
        if($request->act=='sasaran'){
            $hapus=Kkesatu::where('id',$request->id)->delete();
            $detail=Kkesatu::where('note',$request->id)->delete();
            $get=Kkesatu::where('note',$request->id)->get();
            $get  = array_column(
                Kkesatu::where('note',$request->id)
                ->get()
                ->toArray(),'id'
             );
            $penilaian=Penilaiankkesatu::whereIn('penilaian_id',$get)->delete();
            echo'ok';
        }else{
            $detail=Kkesatu::where('id',$request->id)->delete();
            $penilaian=Penilaiankkesatu::where('penilaian_id',$request->id)->delete();
            echo'ok';
        }
    }

    
    

    public function hapus_kke2(request $request){
        if($request->act=='sasaran'){
            $hapus=Kkedua::where('id',$request->id)->delete();
            $detail=Kkedua::where('note',$request->id)->delete();
            $get=Kkedua::where('note',$request->id)->get();
            $get  = array_column(
                Kkedua::where('note',$request->id)
                ->get()
                ->toArray(),'id'
             );
            $penilaian=Penilaiankkedua::whereIn('penilaian_id',$get)->delete();
            echo'ok';
        }else{
            $detail=Kkedua::where('id',$request->id)->delete();
            $penilaian=Penilaiankkedua::where('penilaian_id',$request->id)->delete();
            echo'ok';
        }
    }
    public function save_kke31(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Judul',
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
                    

                    $save=Parameterkketiga1::create([
                        'name'=>$request->name,
                        'note'=>$request->parameter_id,
                        'utama'=>2,
                    ]);

                    if($save){
                        $dataall=Parameterkketiga1::where('utama',2)->where('note',$request->parameter_id)->orderBy('id','Asc')->get();
                        foreach($dataall as $no=>$o){
                            $update=Parameterkketiga1::where('id',$o['id'])->update([
                                'nomor'=>($no+1),
                            ]);
                        }
                        echo'ok';
                    }
                    
                }
        
    }
    
    public function hapus_kke31(request $request){
        if($request->act=='sasaran'){
            $hapus=Kketiga1::where('id',$request->id)->delete();
            $detail=Kketiga1::where('note',$request->id)->delete();
            $get=Kketiga1::where('note',$request->id)->get();
            $get  = array_column(
                Kketiga1::where('note',$request->id)
                ->get()
                ->toArray(),'id'
             );
            $penilaian=Penilaiankketiga1::whereIn('penilaian_id',$get)->delete();
            echo'ok';
        }else{
            $detail=Kketiga1::where('id',$request->id)->delete();
            $penilaian=Penilaiankketiga1::where('penilaian_id',$request->id)->delete();
            echo'ok';
        }
    }
    public function save_kke32(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Judul',
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
                    

                    $save=Parameterkketiga2::create([
                        'name'=>$request->name,
                        'note'=>$request->parameter_id,
                        'utama'=>2,
                    ]);

                    if($save){
                        $dataall=Parameterkketiga2::where('utama',2)->where('note',$request->parameter_id)->orderBy('id','Asc')->get();
                        foreach($dataall as $no=>$o){
                            $update=Parameterkketiga2::where('id',$o['id'])->update([
                                'nomor'=>($no+1),
                            ]);
                        }
                        echo'ok';
                    }
                    
                }
        
    }
    public function update_kke32(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Judul',
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
                    

                    $save=Parameterkketiga2::where('id',$request->id)->update([
                        'name'=>$request->name,
                    ]);

                    if($save){
                        
                        echo'ok';
                    }
                    
                }
        
    }

    public function hapus_kke32(request $request){
        if($request->act=='sasaran'){
            $hapus=Kketiga2::where('id',$request->id)->delete();
            $detail=Kketiga2::where('note',$request->id)->delete();
            $get=Kketiga2::where('note',$request->id)->get();
            $get  = array_column(
                Kketiga2::where('note',$request->id)
                ->get()
                ->toArray(),'id'
             );
            $penilaian=Penilaiankketiga2::whereIn('penilaian_id',$get)->delete();
            echo'ok';
        }else{
            $detail=Kketiga2::where('id',$request->id)->delete();
            $penilaian=Penilaiankketiga2::where('penilaian_id',$request->id)->delete();
            echo'ok';
        }
    }
    public function save_kke33(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Judul',
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
                    

                    $save=Parameterkketiga3::create([
                        'name'=>$request->name,
                        'note'=>$request->parameter_id,
                        'utama'=>2,
                    ]);

                    if($save){
                        $dataall=Parameterkketiga3::where('utama',2)->where('note',$request->parameter_id)->orderBy('id','Asc')->get();
                        foreach($dataall as $no=>$o){
                            $update=Parameterkketiga3::where('id',$o['id'])->update([
                                'nomor'=>($no+1),
                            ]);
                        }
                        echo'ok';
                    }
                    
                }
        
    }
    public function update_kke33(request $request){
        error_reporting(0);
        

                $rules = [
                    'name'=> 'required',
                ];

                $messages = [
                    'name.required'=> 'Isi Judul',
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
                    

                    $save=Parameterkketiga3::where('id',$request->id)->update([
                        'name'=>$request->name,
                    ]);

                    if($save){
                        
                        echo'ok';
                    }
                    
                }
        
    }

    public function hapus_kke33(request $request){
        if($request->act=='sasaran'){
            $hapus=Kketiga3::where('id',$request->id)->delete();
            $detail=Kketiga3::where('note',$request->id)->delete();
            $get=Kketiga3::where('note',$request->id)->get();
            $get  = array_column(
                Kketiga3::where('note',$request->id)
                ->get()
                ->toArray(),'id'
             );
            $penilaian=Penilaiankketiga3::whereIn('penilaian_id',$get)->delete();
            echo'ok';
        }else{
            $detail=Kketiga3::where('id',$request->id)->delete();
            $penilaian=Penilaiankketiga3::where('penilaian_id',$request->id)->delete();
            echo'ok';
        }
    }
    public function hapus(request $request){
        $data=Penilaian::where('id',$request->id)->first();
        if($data['utama']==1){
            $hapus=Penilaian::where('note',$request->id)->delete();
            $hapus2=Penilaian::where('id',$request->id)->delete();
        }else{
            $hapus2=Penilaian::where('id',$request->id)->delete();
        }
    }

    public function save_penilaian(request $request){
        error_reporting(0);
        
            if($request->utama==1){
                    $rules = [
                        'name'=> 'required',
                        'nilai'=> 'required',
                    ];

                    $messages = [
                        'name.required'=> 'Isi nama parameter',
                        'nilai.required'=> 'Isi nilai parameter',
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
                        

                        $save=Penilaian::create([
                            'name'=>$request->name,
                            'detail_parameter_id'=>$request->detail_parameter_id,
                            'nilai'=>$request->nilai,
                            'utama'=>1,
                            'note'=>0,
                        ]);

                        echo'ok';
                        
                    }
            }

            elseif($request->utama==2){
                    $rules = [
                        'name'=> 'required',
                        'note'=> 'required',
                    ];

                    $messages = [
                        'name.required'=> 'Isi nama parameter',
                        'note.required'=> 'Pilih kepala parameter',
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
                        

                        $save=Penilaian::create([
                            'name'=>$request->name,
                            'detail_parameter_id'=>$request->detail_parameter_id,
                            'nilai'=>0,
                            'utama'=>2,
                            'note'=>$request->note,
                        ]);

                        echo'ok';
                        
                    }
            }
            elseif($request->utama==3){
                    $rules = [
                        'name'=> 'required',
                    ];

                    $messages = [
                        'name.required'=> 'Isi nama parameter',
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
                        
                        $cekdetail=Penilaian::where('detail_parameter_id',$request->detail_parameter_id)->where('utama',1)->count();
                        if($cekdetail>0){
                            echo'<div style="padding:1%">Error !<br> -Terdapat kepala parameter</div>';
                        }else{
                            $save=Penilaian::create([
                                'name'=>$request->name,
                                'detail_parameter_id'=>$request->detail_parameter_id,
                                'nilai'=>0,
                                'utama'=>3,
                                'note'=>0,
                            ]);

                            echo'ok';
                        }
                        
                    }
            
            }
            else{
                echo'<div style="padding:1%">Error ! <br>Pilih kategori</div>';
            }
        
    }
}
