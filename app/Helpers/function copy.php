<?php

function barcoderider($id,$w,$h){
   $d = new Milon\Barcode\DNS2D();
   $d->setStorPath(__DIR__.'/cache/');
   return $d->getBarcodeHTML($id, 'QRCODE',$w,$h);
}
function name(){
    return 'SIMASUN Kinerja Kota Cilegon';
}
function company(){
    return 'INSPEKTORAT KOTA CILEGON';
}

function parsing_validator($url){
   $content=utf8_encode($url);
   $data = json_decode($content,true);

   return $data;
}

function bulan($bulan)
{
   Switch ($bulan){
      case '01' : $bulan="Januari";
         Break;
      case '02' : $bulan="Februari";
         Break;
      case '03' : $bulan="Maret";
         Break;
      case '04' : $bulan="April";
         Break;
      case '05' : $bulan="Mei";
         Break;
      case '06' : $bulan="Juni";
         Break;
      case '07' : $bulan="Juli";
         Break;
      case '08' : $bulan="Agustus";
         Break;
      case '09' : $bulan="September";
         Break;
      case 10 : $bulan="Oktober";
         Break;
      case 11 : $bulan="November";
         Break;
      case 12 : $bulan="Desember";
         Break;
      }
   return $bulan;
}

function uang($id){
   $data=number_format($id,2);
   return $data;
}

function huruf($bulan)
{
   Switch ($bulan){
      case '1' : $bulan="A";
         Break;
      case '2' : $bulan="B";
         Break;
      case '3' : $bulan="C";
         Break;
      case '4' : $bulan="D";
         Break;
      case '5' : $bulan="E";
         Break;
      case '6' : $bulan="F";
         Break;
      case '7' : $bulan="G";
         Break;
      case '8' : $bulan="H";
         Break;
      case '9' : $bulan="I";
         Break;
      case 10 : $bulan="J";
         Break;
      case 11 : $bulan="K";
         Break;
      case 12 : $bulan="L";
         Break;
      }
   return $bulan;
}

function warna($bulan)
{
   Switch ($bulan){
      case '0' : $bulan="Yellow";
         Break;
      case 1 : $bulan="#F0F8FF";
         Break;
      case 2 : $bulan="#FAEBD7";
         Break;
      case 3 : $bulan="#00FFFF";
         Break;
      case 4 : $bulan="#7FFFD4";
         Break;
      case 5 : $bulan="#F0FFFF";
         Break;
      case 6 : $bulan="#8A2BE2";
         Break;
      case 7 : $bulan="#A52A2A";
         Break;
      case 8 : $bulan="#DEB887";
         Break;
      case 9 : $bulan="#5F9EA0";
         Break;
      case 10 : $bulan="#7FFF00";
         Break;
      case 11 : $bulan="#D2691E";
         Break;
      case 12 : $bulan="#FF7F50";
         Break;
      }
   return $bulan;
}

function hari_ini($tgl){
    $hari=date('D',strtotime($tgl));
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return $hari_ini;
 
}

function romawi($bln){
   switch ($bln){
       case '1': 
           return "I";
           break;
       case '2':
           return "II";
           break;
       case '3':
           return "III";
           break;
       case '4':
           return "IV";
           break;
       case '5':
           return "V";
           break;
       case '6':
           return "VI";
           break;
       case '7':
           return "VII";
           break;
       case '8':
           return "VIII";
           break;
       case '9':
           return "IX";
           break;
       case '10':
           return "X";
           break;
       case '11':
           return "XI";
           break;
       case '12':
           return "XII";
           break;
   }
}

function selisih_jam($tgl1,$tgl2){
    $waktu_awal        =strtotime($tgl1);
    $waktu_akhir    =strtotime($tgl2); 
    $diff    =$waktu_akhir - $waktu_awal;
    $jam    =floor($diff / (60 * 60));
    $menit    =$diff - $jam * (60 * 60);
    $selisih=$jam.'.'.$menit;
    return $selisih;
}

function tgl_indo($id){
    $exp=explode('-',$id);
    $data=$exp[2].' '.bulan($exp[1]).' '.$exp[0];
    return $data;
}

function ubah_bulan($id){
    if($id>9){
       $data=$id;
    }else{
       $data='0'.$id;
    }
    return $data;
 }

function ubah_jam($id){
    return date('H:i',strtotime($id));
}

function array_auditor(){
   $data  = array_column(
      App\Akses::where('username',Auth::user()['username'])
      ->get()
      ->toArray(),'opd_id'
   );
    return $data;
}



function role_get(){
   
    $data=App\Role::whereIn('id',array('2','3','4','5','6'))->orderBy('name','Asc')->get();
    return $data;
}
function opd_get(){
   
    $data=App\Opd::orderBy('name','Asc')->get();
    return $data;
}
function opd1_get($id){
   if($id==1){
      $data=App\Opd::whereBetween('id',['1','14'])->orderBy('name','Asc')->get();
      return $data;
   }
   if($id==2){
      $data=App\Opd::whereBetween('id',['15','28'])->orderBy('name','Asc')->get();
      return $data;
   }
   if($id==3){
      $data=App\Opd::where('lengkap','KECAMATAN')->orderBy('name','Asc')->get();
      return $data;
   }
    
}
function opd_count(){
   
    $data=App\Opd::count();
    return $data;
}

function opd_dokumen_get(){
   if(Auth::user()['role_id']==2){
      $array  = array_column(
         App\Akses::where('username',Auth::user()['username'])
         ->get()
         ->toArray(),'opd_id'
      );
      $data=App\Opd::whereIn('id',$array)->orderBy('name','Asc')->get();
      return $data;
   }else{
      $data=App\Opd::orderBy('name','Asc')->get();
      return $data;
   }
}


function cek_tingkat($nilai){
   if($nilai>80){
      return 'A';
   }elseif($nilai>70){
      return 'B';
   }elseif($nilai>50){
      return 'C';
   }elseif($nilai>0){
      return 'D';
   }else{
      return '-';
   }
}
function auditor_get(){
    $data=App\Transaksilhe::whereIn('opd_id',array_auditor())->orderBy('id','Asc')->get();
    return $data;
}
function atasan_get(){
    $data=App\Transaksilhe::orderBy('tahun','Asc')->get();
    return $data;
}

function auditor_kkesatu_get(){
    $data=App\Transaksikkesatu::orderBy('id','Asc')->get();
    return $data;
}
function akses_opd(){
    $cek=App\Akses::where('username',Auth::user()['username'])->count();
    if($cek>0){
      $data=App\Akses::where('username',Auth::user()['username'])->first();
      return $data['opd_id'];
    }else{
      return '0';
    }
      
}

function jawaban_get($id){
    $data=App\Jawaban::where('sts',$id)->orderBy('id','Asc')->get();
    return $data;
}

function jawaban_id($id,$penilaian_id){
    $cek=App\Penilaianlhe::where('transaksilhe_id',$id)->where('penilaian_id',$penilaian_id)->count();
    if($cek>0){
      $data=App\Penilaianlhe::where('transaksilhe_id',$id)->where('penilaian_id',$penilaian_id)->first();
      return $data['jawaban_id'];
    }else{
       return "";
    }
    
}

function jawaban_kkesatu_id($id,$kategori){
    $cek=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->where('kategori',$kategori)->first();
      return $data['jawaban_id'];
    }else{
       return "";
    }
    
}

function jawaban_kkedua_id($id,$kategori){
    $cek=App\Penilaiankkedua::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankkedua::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      return $data['jawaban_id'];
    }else{
       return "";
    }
    
}

function jawaban_kketiga1_id($id,$kategori){
    $cek=App\Penilaiankketiga1::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankketiga1::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      return $data['jawaban_id'];
    }else{
       return "";
    }
    
}
function jawaban_kketiga2_id($id,$kategori){
    $cek=App\Penilaiankketiga2::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankketiga2::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      return $data['jawaban_id'];
    }else{
       return "";
    }
    
}
function jawaban_kketiga3_id($id,$kategori){
    $cek=App\Penilaiankketiga3::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankketiga3::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      return $data['jawaban_id'];
    }else{
       return "";
    }
    
}

function value_id($id,$penilaian_id){
    $cek=App\Penilaianlhe::where('transaksilhe_id',$id)->where('penilaian_id',$penilaian_id)->count();
    if($cek>0){
      $data=App\Penilaianlhe::where('transaksilhe_id',$id)->where('penilaian_id',$penilaian_id)->first();
      return huruf_jawaban($data['jawaban_id']);
    }else{
       return "-";
    }
    
}
function keterangan_nilai_id($id,$penilaian_id){
   // PERENCANAAN KINERJA
   if($penilaian_id==9){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==10){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==11){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==12){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==13){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==14){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==15){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==16){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==17){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==18){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,11)){
            return "OK";
         }else{
            return "SALAH, Tujuan tidak ada";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==19){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,14)){
            if(nilai_id($id,$penilaian_id)<=nilai_id($id,18)){
               return "OK";
            }else{
               return "SALAH, Lebih tinggi dari nilai Tujuan";
            }
         }else{
            return "SALAH, G25";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==20){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,18)){
            return "OK";
         }else{
            return "SALAH, Sasaran tidak ada";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==21){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==22){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         $pembanding=(nilai_id($id,18)+nilai_id($id,61))/2;
         if(nilai_id($id,$penilaian_id)<=$pembanding){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari nilai rata2 Kualitas RPJMD";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==23){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         $pembanding=(nilai_id($id,18)+nilai_id($id,61))/2;
         if(nilai_id($id,$penilaian_id)<=$pembanding){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari nilai rata2 Kualitas RPJMD";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==24){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==25){
      
         return "";
      
   }
   if($penilaian_id==26){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,25)){
         return "OK";
      }else{
         return "SALAH, Perencanaan kinerja tahunan tidak ada";
      }
   }
   if($penilaian_id==27){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==28){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,26)){
         return "OK";
      }else{
         return "SALAH, PK tidak ada";
      }
   }
   if($penilaian_id==29){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,26)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,28)){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari nilai Sasaran";
         }
      }else{
         return "SALAH, PK tidak ada";
      }
   }
   if($penilaian_id==30){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==31){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==32){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==33){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==34){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==35){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==36){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==37){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==38){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==39){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==40){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==41){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==42){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==43){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==44){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==45){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==46){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==47){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==48){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==49){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==50){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==51){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==52){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==53){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==54){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==55){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==56){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,33)){
            return "OK";
         }else{
            return "SALAH, IKU tidak ada";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==57){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,14)){
            if(nilai_id($id,$penilaian_id)<=nilai_id($id,20)){
               return "OK";
            }else{
               return "SALAH, Lebih tinggi dari nilai Sasaran";
            }
         }else{
            return "SALAH, Sasaran tidak ada";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==58){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,15)){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari IK Sasaran";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==59){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,11) && nilai_id($id,$penilaian_id)<=nilai_id($id,14)){
            if(nilai_id($id,$penilaian_id)<=nilai_id($id,12) && nilai_id($id,$penilaian_id)<=nilai_id($id,15)){
               return "OK";
            }else{
               return "SALAH, IK Tujuan/Sasaran tidak ada";
            }
         }else{
            return "SALAH, Tujuan/Sasaran tidak ada";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==60){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         $pembanding=(nilai_id($id,18)+nilai_id($id,59))/2;
         if(nilai_id($id,$penilaian_id)<=$pembanding){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari nilai rata2 kualitas tujuan/sasaran, program, indikator, dan target";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==61){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         $pembanding=(nilai_id($id,18)+nilai_id($id,59))/2;
         if(nilai_id($id,$penilaian_id)<=$pembanding){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari nilai rata2 kualitas tujuan/sasaran, program, indikator, dan target";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==62){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         $pembanding=(nilai_id($id,18)+nilai_id($id,61))/2;
         if(nilai_id($id,$penilaian_id)<=$pembanding){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari nilai rata2 Kualitas RPJMD";
         }
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==63){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,26)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,33)){
            return "OK";
         }else{
            return "SALAH, PK tidak ada";
         }
      }else{
         return "SALAH, PK tidak ada";
      }
   }
   if($penilaian_id==64){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,26)){
         return "OK";
      }else{
         return "SALAH, PK tidak ada";
      }
   }
   if($penilaian_id==65){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,26)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,29)){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari nilai Sasaran";
         }
      }else{
         return "SALAH, PK tidak ada";
      }
   }
   if($penilaian_id==66){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,26)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,29)){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari nilai Sasaran";
         }
      }else{
         return "SALAH, PK tidak ada";
      }
   }
   if($penilaian_id==67){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,26)){
         if(nilai_id($id,$penilaian_id)<=nilai_id($id,29)){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari nilai Sasaran";
         }
      }else{
         return "SALAH, PK tidak ada";
      }
   }
   if($penilaian_id==68){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,26)){
         $pembanding=(nilai_id($id,28)+nilai_id($id,67))/2;
         if(nilai_id($id,$penilaian_id)<=$pembanding){
            return "OK";
         }else{
            return "SALAH, Lebih tinggi dari nilai rata2 kualitas sasaran, kegiatan, indikator, dan target";
         }
      }else{
         return "SALAH, PK tidak ada";
      }
   }
   if($penilaian_id==69){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==70){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==71){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==72){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==73){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==74){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==75){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==76){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==77){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==78){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==79){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==80){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==81){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==82){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==83){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==84){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==85){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==86){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==87){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==88){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==89){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==90){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==91){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==92){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==93){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==94){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==95){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==96){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==97){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==98){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==99){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==100){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==101){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==102){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==103){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==104){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==105){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==106){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==107){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   if($penilaian_id==108){
      if(nilai_id($id,$penilaian_id)<=nilai_id($id,10)){
         return "OK";
      }else{
         return "SALAH";
      }
   }
   
   
    
}

function value_kkesatu_id($id,$kategori){
    $cek=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->where('kategori',$kategori)->first();
      //  return $data['parameter_kkesatu_id'];
       return uang($data['nilai']);
    }else{
       return "-";
    }
    
}

function value_kkedua_id($id,$kategori){
    $cek=App\Penilaiankkedua::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankkedua::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      //  return $data['parameter_kkesatu_id'];
       return uang($data['nilai']);
    }else{
       return "No";
    }
    
}
function value_kketiga1_id($id,$kategori){
    $cek=App\Penilaiankketiga1::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankketiga1::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      //  return $data['parameter_kkesatu_id'];
       return uang($data['nilai']);
    }else{
       return "No";
    }
    
}
function value_kketiga2_id($id,$kategori){
    $cek=App\Penilaiankketiga2::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankketiga2::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      //  return $data['parameter_kkesatu_id'];
       return uang($data['nilai']);
    }else{
       return "No";
    }
    
}
function value_kketiga3_id($id,$kategori){
    $cek=App\Penilaiankketiga3::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankketiga3::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      //  return $data['parameter_kkesatu_id'];
       return uang($data['nilai']);
    }else{
       return "No";
    }
    
}

function keterangan_kkesatu_id($id,$kategori){
    $cek=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      
       return "OK";
    }else{
       return "SALAH";
    }
    
}

function keterangan_kkedua_id($id,$kategori){
    $cek=App\Penilaiankkedua::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      
       return "OK";
    }else{
       return "SALAH";
    }
    
}
function keterangan_kketiga1_id($id,$kategori){
    $cek=App\Penilaiankketiga1::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      
       return "OK";
    }else{
       return "SALAH";
    }
    
}

function warna_kkesatu($id){
    if($id=='OK'){
      return 'aqua';
    }else{
       return "red";
    }
    
}

function huruf_kkesatu_id($id,$kategori){
    $cek=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->where('kategori',$kategori)->first();
      return huruf_jawaban($data['jawaban_id']);
    }else{
       return "-";
    }
    
}

function huruf_kkedua_id($id,$kategori){
    $cek=App\Penilaiankkedua::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankkedua::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      return huruf_jawaban($data['jawaban_id']);
    }else{
       return "No";
    }
    
}

function huruf_kketiga1_id($id,$kategori){
    $cek=App\Penilaiankketiga1::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankketiga1::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      return huruf_jawaban($data['jawaban_id']);
    }else{
       return "No";
    }
    
}
function huruf_kketiga2_id($id,$kategori){
    $cek=App\Penilaiankketiga2::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankketiga2::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      return huruf_jawaban($data['jawaban_id']);
    }else{
       return "No";
    }
    
}
function huruf_kketiga3_id($id,$kategori){
    $cek=App\Penilaiankketiga3::where('transaksilhe_id',$id)->where('kategori',$kategori)->count();
    if($cek>0){
      $data=App\Penilaiankketiga3::where('transaksilhe_id',$id)->where('kategori',$kategori)->first();
      return huruf_jawaban($data['jawaban_id']);
    }else{
       return "No";
    }
    
}

function rekapan_detail_kkesatu_id($id,$param,$kat){
   $array  = array_column(
      App\Parameterkkesatu::where('id',$param)
      ->orWhere('note',$param)
      ->get()
      ->toArray(),'id'
   );
    $cek=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->whereIn('parameter_kkesatu_id',$array)->whereIn('kat',array($kat,($kat+1)))->count();
    if($cek>0){
      $data=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->whereIn('parameter_kkesatu_id',$array)->whereIn('kat',array($kat,($kat+1)))->sum('nilai');
      return uang(($data/$cek)*100);
    }else{
       return 0;
    }
    
}

function rekapan_detail_kkedua_id($id,$kat){
   
    $cek=App\Penilaiankkedua::where('transaksilhe_id',$id)->where('kat',$kat)->count();
    if($cek>0){
      $data=App\Penilaiankkedua::where('transaksilhe_id',$id)->where('kat',$kat)->sum('nilai');
      return uang(($data/$cek)*100);
    }else{
       return 0;
    }
    
}

function rekapan_detail_kketiga1_id($id,$kat){
   
    $cek=App\Penilaiankketiga1::where('transaksilhe_id',$id)->where('kat',$kat)->count();
    if($cek>0){
      $data=App\Penilaiankketiga1::where('transaksilhe_id',$id)->where('kat',$kat)->sum('nilai');
      return uang(($data/$cek)*100);
    }else{
       return 0;
    }
    
}
function rekapan_detail_kketiga2_id($id,$kat){
   
    $cek=App\Penilaiankketiga2::where('transaksilhe_id',$id)->where('kat',$kat)->count();
    if($cek>0){
      $data=App\Penilaiankketiga2::where('transaksilhe_id',$id)->where('kat',$kat)->sum('nilai');
      return uang(($data/$cek)*100);
    }else{
       return 0;
    }
    
}
function rekapan_detail_kketiga3_id($id,$kat){
   
    $cek=App\Penilaiankketiga3::where('transaksilhe_id',$id)->where('kat',$kat)->count();
    if($cek>0){
      $data=App\Penilaiankketiga3::where('transaksilhe_id',$id)->where('kat',$kat)->sum('nilai');
      return uang(($data/$cek)*100);
    }else{
       return 0;
    }
    
}

function rekapan_kkesatu_id($id,$kat){
   $param=App\Parameterkkesatu::where('utama',1)->orderBy('id','asc')->get();
   $countget=App\Parameterkkesatu::where('utama',1)->orderBy('id','asc')->count();
   $nilai=0;
   foreach($param as $o){
      $array  = array_column(
         App\Parameterkkesatu::where('note',$param)
         ->get()
         ->toArray(),'id'
      );
      $cek=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->whereIn('parameter_kkesatu_id',$array)->whereIn('kat',array($kat,($kat+1)))->count();
      if($cek>0){
         $data=App\Penilaiankkesatu::where('transaksikkesatu_id',$id)->whereIn('parameter_kkesatu_id',$array)->whereIn('kat',array($kat,($kat+1)))->sum('nilai');
         $nilai+=uang(($data/$cek)*100);
      }else{
         $nilai+=0;
      }
   }
   
   return uang($nilai/$countget);
}

function rekapan_kkedua_id($id,$kat){
   $param=App\Parameterkkedua::where('utama',1)->orderBy('id','asc')->get();
   $countget=App\Parameterkkedua::where('utama',1)->orderBy('id','asc')->count();
   $nilai=0;
   foreach($param as $o){
      $array  = array_column(
         App\Parameterkkedua::where('note',$param)
         ->get()
         ->toArray(),'id'
      );
      $cek=App\Penilaiankkedua::where('transaksilhe_id',$id)->whereIn('parameter_kkedua_id',$array)->whereIn('kat',array($kat,($kat+1)))->count();
      if($cek>0){
         $data=App\Penilaiankkedua::where('transaksilhe_id',$id)->whereIn('parameter_kkedua_id',$array)->whereIn('kat',array($kat,($kat+1)))->sum('nilai');
         $nilai+=uang(($data/$cek)*100);
      }else{
         $nilai+=0;
      }
   }
   
   return ($nilai/$countget);
}

function penilaianlhe_id($id,$penilaian_id){
    $cek=App\Penilaianlhe::where('transaksilhe_id',$id)->where('penilaian_id',$penilaian_id)->count();
    if($cek>0){
      $data=App\Penilaianlhe::where('transaksilhe_id',$id)->where('penilaian_id',$penilaian_id)->first();
      return $data['id'];
    }else{
       return "0";
    }
    
}

function saran_id($id,$penilaian_id){
    $cek=App\Penilaianlhe::where('transaksilhe_id',$id)->where('penilaian_id',$penilaian_id)->where('saran',null)->count();
    if($cek>0){
      return "0";
    }else{
       
       $data=App\Penilaianlhe::where('transaksilhe_id',$id)->where('penilaian_id',$penilaian_id)->first();
       return $data['saran'];
    }
    
}

function nilai_id($id,$penilaian_id){
    $cek=App\Penilaianlhe::where('transaksilhe_id',$id)->where('penilaian_id',$penilaian_id)->count();
    if($cek>0){
      $data=App\Penilaianlhe::where('transaksilhe_id',$id)->where('penilaian_id',$penilaian_id)->first();
      return $data['nilai'];
    }else{
       return 0;
    }
    
}

function kategori_get(){
   $data=App\Kategori::orderBy('id','Asc')->get();
   return $data;
}
function dokumen_cek($kategori,$tahun,$opd){
   $data=App\Dokumen::where('opd_id',$opd)->where('kategori_id',$kategori)->where('tahun',$tahun)->count();
   return $data;
}
function dokumen_file($kategori,$tahun,$opd){
   $data=App\Dokumen::where('opd_id',$opd)->where('kategori_id',$kategori)->where('tahun',$tahun)->first();
   return $data['file'];
}
function nilai_jawaban($id){
    $data=App\Jawaban::where('id',$id)->first();
    return $data['nilai'];
}
function isi_rekomendasi($id,$param){
    $data=App\Penilaianrekomendasi::where('transaksilhe_id',$id)->where('parameter_id',$param)->first();
    return $data['rekomendasi'];
}
function cek_rekomendasi($id,$param){
    $data=App\Penilaianrekomendasi::where('transaksilhe_id',$id)->where('parameter_id',$param)->where('rekomendasi','!=',null)->count();
    return $data;
}
function id_rekomendasi($id,$param){
    $data=App\Penilaianrekomendasi::where('transaksilhe_id',$id)->where('parameter_id',$param)->where('rekomendasi','!=',null)->first();
    return $data['id'];
}
function cek_file_rekomendasi($id){
    $data=App\Penilaianrekomendasi::where('id',$id)->where('sts',1)->count();
    return $data;
}
function file_rekomendasi($id){
    $data=App\Penilaianrekomendasi::where('id',$id)->first();
    return $data['file'];
}


function nilai_utama($lhe,$id){
   $array  = array_column(
      App\Penilaian::where('note',$id)
      ->get()
      ->toArray(),'id'
   );
   $count=App\Penilaianlhe::where('transaksilhe_id',$lhe)->whereIn('penilaian_id',$array)->count();
   if($count>0){

      $data=App\Penilaianlhe::where('transaksilhe_id',$lhe)->whereIn('penilaian_id',$array)->sum('nilai');
      $nilai=uang(($data/$count)*100);
      return $nilai;
   }else{
      return 0;
   }
    

   
}

function keterangan_selisih($nilai){
   if($nilai>0){
      return '<font style="color:yellow;font-weight:bold;">Meningkat '.$nilai.' %</font>';
   }else{
      return '<font style="color:red;font-weight:bold;">Menurun '.$nilai.' %</font>';
   }
}
function total_nilai_all_parameter($tahun){
   $total=0;
   foreach(opd_get() as $opd){
      $data=App\Transaksilhe::where('opd_id',$opd->id)->where('tahun',$tahun)->first();
      $nilai=0;
      foreach(parameter_get() as $o){
         $nilai+=nilai_parameter($data['id'],$o['id']);
      }
      $total+=($nilai/100)*100;
   }
   if($total>0){
      return uang($total/opd_count());
   }else{
      return 0;
   }
   
}
function total_nilai_opd_parameter($opd,$tahun){
   $data=App\Transaksilhe::where('opd_id',$opd)->where('tahun',$tahun)->first();
   $nilai=0;
   foreach(parameter_get() as $o){
      $nilai+=nilai_parameter($data['id'],$o['id']);
   }

   return ($nilai/100)*100;
}
function total_nilai_parameter($lhe){
      $nilai=0;
      foreach(parameter_get() as $o){
         $nilai+=nilai_parameter($lhe,$o['id']);
      }

      return $nilai;
}
function nilai_parameter($lhe,$id){
    $det=App\Detailparameter::where('parameter_id',$id)->get();
    if($id==1){
      $nilaiakhir=0;
      foreach($det as $o){
            $xcount=App\Penilaian::where('detail_parameter_id',$o['id'])->where('utama',1)->count();
            $deet=App\Penilaian::where('detail_parameter_id',$o['id'])->where('utama',1)->get();
            $nilai=0;
            foreach($deet as $os){
               $array  = array_column(
                  App\Penilaian::where('note',$os['id'])
                  ->get()
                  ->toArray(),'id'
               );
               $count=App\Penilaianlhe::where('transaksilhe_id',$lhe)->whereIn('penilaian_id',$array)->count();
               if($count>0){
                  $data=App\Penilaianlhe::where('transaksilhe_id',$lhe)->whereIn('penilaian_id',$array)->sum('nilai');
                  $nilai+=uang(((($data/$count)*100)*$os['nilai'])/100);
               }else{
                  $nilai+=0;
               }
               
               
            }
            $nilaiakhir+=$nilai;
      }
      return $nilaiakhir;
    }else{
         $nilai=0;
         foreach($det as $o){
            $count=App\Penilaianlhe::where('transaksilhe_id',$lhe)->where('detail_prameter_id',$id)->count();
            if($count>0){
               $data=App\Penilaianlhe::where('transaksilhe_id',$lhe)->where('detail_prameter_id',$id)->sum('nilai');
               $nilai+=(($data/$count))*$o['nilai'];
            }else{
               $nilai+=0;
            }
            
         }
            
            return uang($nilai);
    }
}

function nilai_detail_parameter($lhe,$id){
   if($id==1 || $id==2){
      $xcount=App\Penilaian::where('detail_parameter_id',$id)->where('utama',1)->count();
      $det=App\Penilaian::where('detail_parameter_id',$id)->where('utama',1)->get();
      $nilai=0;
      foreach($det as $o){
         $array  = array_column(
            App\Penilaian::where('note',$o['id'])
            ->get()
            ->toArray(),'id'
         );
         $count=App\Penilaianlhe::where('transaksilhe_id',$lhe)->whereIn('penilaian_id',$array)->count();
         if($count>0){
            $data=App\Penilaianlhe::where('transaksilhe_id',$lhe)->whereIn('penilaian_id',$array)->sum('nilai');
            $nilai+=uang(((($data/$count)*100)*$o['nilai'])/100);
         }else{
            $nilai+=0;
         }
         
         
      }
      return $nilai;
   }else{
         $count=App\Penilaianlhe::where('transaksilhe_id',$lhe)->where('detail_prameter_id',$id)->count();
         if($count>0){
            $data=App\Penilaianlhe::where('transaksilhe_id',$lhe)->where('detail_prameter_id',$id)->sum('nilai');
            $nilai=uang(($data/$count)*100);
            return $nilai;
         }else{
            return 0;
         }
   }
}

function huruf_jawaban($id){
    $data=App\Jawaban::where('id',$id)->first();
    return $data['name'];
}

function opd_auditor_get(){
   $data=App\Opd::whereIn('id',array_auditor())->orderBy('name','Asc')->get();
   return $data;
}

function cek_opd($id){
    $data=App\Opd::where('id',$id)->first();
    return $data;
}

function user_get(){
    $data=App\User::whereIn('role_id',array('2','3'))->orderBy('akses','Asc')->get();
    return $data;
}
function user_atas_get(){
    $data=App\User::whereIn('role_id',array('7','8','9'))->orderBy('akses','Asc')->get();
    return $data;
}

function rolenya($role){
    $data=App\Role::where('id',$role)->first();
    return $data['name'];
}
function aksesnya($id){
    $data=App\Role::where('singkatan',$id)->first();
    return $data['name'];
}

function singkatan($role){
    $data=App\Role::where('id',$role)->first();
    return $data['singkatan'];
}

function akses_get($username){
    $data=App\Akses::where('username',$username)->get();
    $tampil="";
    foreach($data as $no=>$o){
       $tampil.='<span style="margin-left:2%;margin-bottom:1%" class="btn btn-xs btn-aqua">'.($no+1).'. '.cek_opd($o['opd_id'])['name'].'</span>';
    }
    return $tampil;
}

function cek_opd_ubah($username,$id){
    $data=App\Akses::where('username',$username)->where('opd_id',$id)->count();
    return $data;
}

function parameter_get(){
    $data=App\Parameter::orderBy('id','Asc')->get();
    return $data;
}

function parameter_kkedua_get(){
    $data=App\Parameterkkedua::whereIn('utama',array('1','3'))->orderBy('id','Asc')->get();
    return $data;
}
function parameter_kketiga1_get(){
    $data=App\Parameterkketiga1::whereIn('utama',array('1'))->orderBy('id','Asc')->get();
    return $data;
}
function parameter_kketiga3_get(){
    $data=App\Parameterkketiga3::whereIn('utama',array('1'))->orderBy('id','Asc')->get();
    return $data;
}
function parameter_kketiga2_get(){
    $data=App\Parameterkketiga2::whereIn('utama',array('1'))->orderBy('id','Asc')->get();
    return $data;
}
function count_detail_parameter_kkedua_get($id){
    $data=App\Parameterkkedua::where('note',$id)->count();
    return $data;
}
function count_detail_parameter_kketiga1_get($id){
    $data=App\Parameterkketiga1::where('note',$id)->count();
    return $data;
}
function count_detail_parameter_kketiga3_get($id){
    $data=App\Parameterkketiga3::where('note',$id)->where('nomor','!=',1)->count();
    return $data;
}
function count_detail_parameter_kketiga2_get($id){
    $data=App\Parameterkketiga2::where('note',$id)->count();
    return $data;
}
function detailutama_parameter_kkedua_get($id){
   $data=App\Parameterkkedua::where('note',$id)->where('nomor',1)->first();
   return $data;
}
function detailutama_parameter_kketiga1_get($id){
   $data=App\Parameterkketiga1::where('note',$id)->where('nomor',1)->first();
   return $data;
}
function detailutama_parameter_kketiga2_get($id){
   $data=App\Parameterkketiga2::where('note',$id)->where('nomor',1)->first();
   return $data;
}
function detailutama_parameter_kketiga3_get($id){
   $data=App\Parameterkketiga3::where('note',$id)->where('nomor',1)->first();
   return $data;
}
function parameter_kkesatu_get(){
    $data=App\Parameterkkesatu::where('utama',1)->orderBy('id','Asc')->get();
    return $data;
}
function count_detail_parameter_kkesatu_get($id){
    $data=App\Parameterkkesatu::where('note',$id)->count();
    return $data;
}

function detailutama_parameter_kkesatu_get($id){
    $data=App\Parameterkkesatu::where('note',$id)->where('nomor',1)->first();
    return $data;
}

function master_detail_parameter_kkesatu_get($id){
    $data=App\Parameterkkesatu::where('note',$id)->orderBy('id','Asc')->get();
    return $data;
}
function detail_parameter_kkesatu_get($id){
    $data=App\Parameterkkesatu::where('note',$id)->where('nomor','!=',1)->orderBy('id','Asc')->get();
    return $data;
}
function detail_parameter_kkedua_get($id){
    $data=App\Parameterkkedua::where('note',$id)->where('nomor','!=',1)->orderBy('id','Asc')->get();
    return $data;
}
function master_detail_parameter_kkedua_get($id){
    $data=App\Parameterkkedua::where('note',$id)->orderBy('id','Asc')->get();
    return $data;
}
function detail_parameter_kketiga1_get($id){
    $data=App\Parameterkketiga1::where('note',$id)->orderBy('id','Asc')->get();
    return $data;
}
function master_detail_parameter_kketiga1_get($id){
    $data=App\Parameterkketiga1::where('note',$id)->orderBy('id','Asc')->get();
    return $data;
}
function detail_parameter_kketiga3_get($id){
    $data=App\Parameterkketiga3::where('note',$id)->where('nomor','!=',1)->orderBy('id','Asc')->get();
    return $data;
}
function master_detail_parameter_kketiga3_get($id){
    $data=App\Parameterkketiga3::where('note',$id)->orderBy('id','Asc')->get();
    return $data;
}
function detail_parameter_kketiga2_get($id){
    $data=App\Parameterkketiga2::where('note',$id)->where('nomor','!=',1)->orderBy('id','Asc')->get();
    return $data;
}
function master_detail_parameter_kketiga2_get($id){
    $data=App\Parameterkketiga2::where('note',$id)->orderBy('id','Asc')->get();
    return $data;
}


function detail_parameter_get($id){
    $data=App\Detailparameter::where('parameter_id',$id)->orderBy('nomor','Asc')->get();
    return $data;
}

function penilaian_get($id){
    $data=App\Penilaian::where('detail_parameter_id',$id)->whereIn('utama',array('1','3'))->orderBy('id','Asc')->get();
    return $data;
}

function detail_penilaian_get($id){
    $data=App\Penilaian::where('note',$id)->whereIn('utama',array('2'))->orderBy('id','Asc')->get();
    return $data;
}


?>