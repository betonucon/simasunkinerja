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
use App\Penilaianrekomendasi;
class TransaksikrekomendasiController extends Controller
{
    public function upload(request $request){
        error_reporting(0);
        

        $rules = [
            'file'=> 'required|mimes:pdf',
        ];
        $messages = [
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
            
                $image = $request->file('file');
                $size = $image->getSize();
                $imageFileName =$request->namafile.$request->rekomendasi_id.date('ymdhis').'.'. $image->getClientOriginalExtension();
                $filePath =$imageFileName;
                $file = \Storage::disk('public_uploads');
                if($file->put($filePath, file_get_contents($image))){
                    $save=Penilaianrekomendasi::where('id',$request->rekomendasi_id)->update([
                        'file'=>$filePath,
                        'sts'=>1,
                    ]);
                    echo'ok';
                }else{
                    echo'<div style="padding:1%">Error !<br> Upload Gagal</div>';
                }
        }
    }

    public function save(request $request){
        error_reporting(0);
        foreach(parameter_get() as $o){
            $cek=Penilaianrekomendasi::where('transaksilhe_id',$request->id)->where('parameter_id',$o['id'])->count();
            if($cek>0){
                $data=Penilaianrekomendasi::where('transaksilhe_id',$request->id)->where('parameter_id',$o['id'])->update([
                    'rekomendasi'=>$request->rekomendasi[$o['id']],
                ]);
            }else{
                $data=Penilaianrekomendasi::create([
                    'transaksilhe_id'=>$request->id,
                    'parameter_id'=>$o['id'],
                    'rekomendasi'=>$request->rekomendasi[$o['id']],
                ]);

            }
        }
        echo'ok';
            
                    
    }
}
