<?php

namespace App\Http\Controllers;
use App\Vendor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class MasterController extends Controller
{
    public function hashmake(request $request){
        // $data=Hash::make($request->text);
        // echo $data;
        for($x=1;$x<4;$x++){
            
                echo'
                if($kategori==21'.$x.'){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;$cek=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->count();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;if($cek>0){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->first();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return uang($data["nilai"]);<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}else{<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return "-";<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                }<br>
                ';
            
        }
        for($x=1;$x<4;$x++){
            
                echo'
                if($kategori==31'.$x.'){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;$cek=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->count();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;if($cek>0){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->first();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return uang($data["nilai"]);<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}else{<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return "-";<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                }<br>
                ';
            
        }
        for($x=1;$x<4;$x++){
            
                echo'
                if($kategori==41'.$x.'){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;$cek=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->count();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;if($cek>0){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->first();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return uang($data["nilai"]);<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}else{<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return "-";<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                }<br>
                ';
            
        }
        for($x=1;$x<4;$x++){
            
                echo'
                if($kategori==51'.$x.'){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;$cek=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->count();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;if($cek>0){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->first();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return uang($data["nilai"]);<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}else{<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return "-";<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                }<br>
                ';
            
        }
        for($x=2;$x<6;$x++){
            
                echo'
                if($kategori=='.$x.'27){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;$cek=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->count();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;if($cek>0){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->first();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return uang($data["nilai"]);<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}else{<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return "-";<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                }<br>
                ';
            
        }
        for($x=2;$x<6;$x++){
            
                echo'
                if($kategori=='.$x.'29){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;$cek=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->count();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;if($cek>0){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->first();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return uang($data["nilai"]);<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}else{<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return "-";<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                }<br>
                ';
            
        }
        for($x=2;$x<6;$x++){
            
                echo'
                if($kategori=='.$x.'210){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;$cek=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->count();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;if($cek>0){<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data=App\Penilaiankkesatu::where("transaksikkesatu_id",$id)->where("kategori",$kategori)->first();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return uang($data["nilai"]);<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}else{<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return "-";<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                }<br>
                ';
            
        }
    }
}
