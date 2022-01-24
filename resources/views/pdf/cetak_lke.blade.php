<html>
    <head>
        <title>LKE{{$data->file}}</title>
        <style>
            .ttdhead-h1{
                text-align:center;
                font-size:20px;
                text-decoration: underline;
                border:solid 1px #fff;
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
            th{
                font-size:12px;
                font-weight:bold;
                border:solid 1px #000;
                text-align:center;
            }
            td{
                font-size:12px;
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
                <tr>
                    <th rowspan="2" width="8%">No</th>
                    <th rowspan="2">KOMPONEN/SUB KOMPONEN</th>
                    <th rowspan="2" width="8%">BOBOT</th>
                    <th colspan="2">SKPD</th>
                    <th rowspan="2" width="15%">KONTROL KERANGKA LOGIS</th>
                </tr>
                <tr>
                    <th width="9%">Y</th>
                    <th width="9%">NILAI</th>
                </tr>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th colspan="2">4</th>
                    <th>5</th>
                </tr>
                @foreach(parameter_get() as $no=>$param)
                    <tr>
                        <td style="background:aqua"><b>{{huruf($no+1)}}.</b></td>
                        <td style="background:aqua;text-align:left;"><b>{{$param->name}} ({{$param->nilai}}%)</b></td>
                        <td style="background:aqua;text-align:center"><b>{{uang($param->nilai)}}</b></td>
                        <td style="background:aqua;text-align:center;font-weight:bold">{{uang((nilai_parameter($data->id,$param->id)/$param->nilai)*100)}}%</td>
                        <td style="background:aqua;text-align:center;font-weight:bold">{{nilai_parameter($data->id,$param->id)}}</td>
                        <td style="background:aqua;text-align:center;font-weight:bold"></td>
                    </tr>
                    @foreach(detail_parameter_get($param->id) as $no=>$detailparam)
                        @if($detailparam->id==1 || $detailparam->id==2)
                            <tr>
                                <td style="background:aqua">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{romawi($no+1)}}.</b></td>
                                <td style="background:aqua;text-align:left;"><b>{{$detailparam->name}} ({{$detailparam->nilai}}%)</b></td>
                                <td  style="text-align:center;background:aqua"><b>{{uang($detailparam->nilai)}}</b></td>
                                <td style="background:aqua;text-align:center;font-weight:bold">{{uang(((nilai_detail_parameter($data->id,$detailparam->id))/$detailparam->nilai)*100)}}%</td>
                                <td style="background:aqua;text-align:center;font-weight:bold">{{uang(nilai_detail_parameter($data->id,$detailparam->id))}}</td>
                                <td style="background:aqua"></td>
                            </tr>
                        @else
                            <tr>
                                <td style="background:aqua">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{romawi($no+1)}}.</b></td>
                                <td style="background:aqua;text-align:left;"><b>{{$detailparam->name}} ({{$detailparam->nilai}}%)</b></td>
                                <td  style="text-align:center;background:aqua"><b>{{uang($detailparam->nilai)}}</b></td>
                                <td style="background:aqua;text-align:center;font-weight:bold">{{nilai_detail_parameter($data->id,$detailparam->id)}}%</td>
                                <td style="background:aqua;text-align:center;font-weight:bold">{{uang((nilai_detail_parameter($data->id,$detailparam->id)*$detailparam->nilai)/100)}}</td>
                                <td style="background:aqua"></td>
                            </tr>
                        @endif
                        @foreach(penilaian_get($detailparam->id) as $pen=>$penilaian)
                            @if($penilaian->utama==1)
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{huruf($pen+1)}}.</b></td>
                                    <td style="background:aqua;text-align:left;"><b>{{$penilaian->name}} ({{$penilaian->nilai}}%)</b></td>
                                    <td style="background:aqua;text-align:center;font-weight:bold"><b>{{uang($penilaian->nilai)}}</b></td>
                                    <td style="background:aqua;text-align:center;font-weight:bold">{{nilai_utama($data->id,$penilaian->id)}}%</td>
                                    <td style="background:aqua;text-align:center;font-weight:bold">{{uang((nilai_utama($data->id,$penilaian->id)*$penilaian->nilai)/100)}}</td>
                                    <td style="background:aqua;text-align:center;font-weight:bold"></td>
                                </tr>
                                @foreach(detail_penilaian_get($penilaian->id) as $dtp=>$detpen)
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{($dtp+1)}}.</td>
                                        <td style="text-align:left;">{{$detpen->name}}</td>
                                        <td>
                                            
                                        </td>
                                        <td style="background:#c2e7c2;text-align:center">{{ value_id($detpen->pilihan,$data->id,$detpen->id) }}</td>
                                        <td style="background:aqua;text-align:center">{!! valpdf_nilai_id($data->id,$detpen->id) !!}</td>
                                        <td style="background: #ffff9f; text-align: center; font-size: 7px !important; font-weight: bold; text-transform: uppercase;">
                                            {{keterangan_nilai_id($data->id,$detpen->id)}}
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            @endif
                            @if($penilaian->utama==3)
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{($pen+1)}}.</td>
                                    <td style="text-align:left;">{{$penilaian->name}}</td>
                                    <td>
                                        
                                    </td>
                                    <td style="background:#c2e7c2;text-align:center">{{ value_id($penilaian->pilihan,$data->id,$penilaian->id) }}</td>
                                    <td style="background:aqua;text-align:center">{!! valpdf_nilai_id($data->id,$penilaian->id) !!}</td>
                                    <td style="background: #ffff9f; text-align: center; font-size: 7px !important; font-weight: bold; text-transform: uppercase;">
                                        {{keterangan_nilai_id($data->id,$penilaian->id)}}
                                    </td>
                                    
                                </tr>
                            @endif
                            
                        @endforeach
                    @endforeach
                @endforeach
                    <tr>
                        <th colspan="2">HASIL EVALUASI AKUNTABILITAS KINERJA (100%)</th>
                        <th>100.00</th>
                        <th>{{(total_nilai_parameter($data->id)/100)*100}}%</th>
                        <th>{{total_nilai_parameter($data->id)}}</th>
                        <th></th>
                    </tr>
            </table>
        
    </body>
</html>