<html>
    <head>
        <title>SURAT TUGAS</title>
        <style>
            .ttdhead-h1{
                text-align:center;
                font-size:20px;
                text-decoration: underline;
            }
            table{
                border-collapse:collapse;
            }
            .ttdhead-h2{
                text-align:center;
                font-size:15px;
            }
            .th{
                font-size:15px;
                border:solid 1px #000;
                text-align:center;
            }
            .td{
                font-size:15px;
                border:solid 1px #000;
                padding-left:4px;
                
            }
            .tthe{
                font-size:15px;
                font-weight:bold;
                border:solid 1px #000;
                text-align:center;
            }
            .ttde{
                font-size:15px;
                padding-left:5px;
                border:solid 1px #000;
            }
            .ttds{
                font-size:14px;
                padding-left:4px;
            }
            hr{
                margin:10px 0px 10px 0px;
            }
            p{
                margin:2px;
            }
        </style>
    </head>
    <body>
        <table width="100%" style="margin-bottom:2%">
            <tr>
                <td width="100%" class="ttdhead-h1" ><img src="{{public_path('img/ks.png')}}" width="10%" ></td>
            </tr>
            <tr>
                <td width="100%" class="ttdhead-h1" >REKAPITULASI NILAI LKE OPD KOTA CILEGON</td>
            </tr>
           
        </table>
        
        <table width="100%">
            <thead>
                <tr>
                    <th class="tthe"  width="4%">No</th>
                    <th class="tthe" >OPD</th>
                    <th width="14%" class="tthe" >Target</th>
                    <th width="14%"  class="tthe" >Aktual</th>
                    <th width="5%"  class="tthe" >Value</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach(opd_get() as $no=>$o)
                <tr class="odd gradeX">
                    <td class="ttde">{{$no+1}}</td>
                    <td class="ttde">{{$o->name}} ({{$o->keterangan}})</td>
                    <td class="ttde">{{total_nilai_opd_parameter($o->id,$tahun)}}%</td>
                    <td class="ttde">{{total_nilai_evaluasi_opd_parameter($o->id,$tahun)}}%</td>
                    <td class="ttde">{!! ket_total_nilai_evaluasi_opd_parameter($o->id,$tahun) !!}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>