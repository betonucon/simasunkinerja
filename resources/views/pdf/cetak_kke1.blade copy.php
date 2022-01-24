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
                <td width="100%" class="ttdhead-h1" >REKAPITULASI NILAI KKE1 Capaian OPD KOTA CILEGON</td>
            </tr>
           
        </table>
            <table width="100%">
                <tr>
                    <th rowspan="2" width="5%">No</th>
                    <th rowspan="2">SASARAN</th>
                    <th rowspan="2" width="15%">INDIKATOR KERJA</th>
                    <th colspan="15">OUTCOME IP</th>
                    
                </tr>
                <tr>
                    <th colspan="3">SASARAN TEPAT</th>
                    <th colspan="3">IK TEPAT</th>
                    <th colspan="3">TARGET TERCAPAI</th>
                    <th colspan="3">KINERJA LEBIH BAIK</th>
                    <th colspan="3">DATA ANDAL</th>
                </tr>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th colspan="3">4</th>
                    <th colspan="3">5</th>
                    <th colspan="3">6</th>
                    <th colspan="3">7</th>
                    <th colspan="3">8</th>
                </tr>
                @foreach(parameter_kkesatu_get() as $no=>$param)
                    <tr>
                        <td style="background:aqua" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}"><b>{{$no+1}}.</b></td>
                        <td style="background:aqua" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}">{{$param->name}}</td>
                        <td style="background:aqua">{{detailutama_parameter_kkesatu_get($param->id)->name}}</td>
                        <td style="text-align:center" width="5%">{{huruf_kkesatu_id($data->id,'11'.$param->id)}}</td>
                        <td style="text-align:center" width="5%">{{value_kkesatu_id($data->id,'11'.$param->id)}}</td>
                        <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'11'.$param->id))}}" >{{keterangan_kkesatu_id($data->id,'11'.$param->id)}}</td>
                        <td style="text-align:center" width="5%">{{huruf_kkesatu_id($data->id,'21'.$param->id)}}</td>
                        <td style="text-align:center" width="5%">{{value_kkesatu_id($data->id,'21'.$param->id)}}</td>
                        <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'21'.$param->id))}}" >{{keterangan_kkesatu_id($data->id,'21'.$param->id)}}</td>
                        <td style="text-align:center" width="5%">{{huruf_kkesatu_id($data->id,'31'.$param->id)}}</td>
                        <td style="text-align:center" width="5%">{{value_kkesatu_id($data->id,'31'.$param->id)}}</td>
                        <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'31'.$param->id))}}" >{{keterangan_kkesatu_id($data->id,'31'.$param->id)}}</td>
                        <td style="text-align:center" width="5%">{{huruf_kkesatu_id($data->id,'41'.$param->id)}}</td>
                        <td style="text-align:center" width="5%">{{value_kkesatu_id($data->id,'41'.$param->id)}}</td>
                        <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'41'.$param->id))}}" >{{keterangan_kkesatu_id($data->id,'41'.$param->id)}}</td>
                        <td style="text-align:center" width="5%">{{huruf_kkesatu_id($data->id,'51'.$param->id)}}</td>
                        <td style="text-align:center" width="5%">{{value_kkesatu_id($data->id,'51'.$param->id)}}</td>
                        <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'51'.$param->id))}}" >{{keterangan_kkesatu_id($data->id,'51'.$param->id)}}</td>
                    </tr>
                    @foreach(detail_parameter_kkesatu_get($param->id) as $no=>$detailparam)
                        <tr>
                            <td style="background:aqua">{{$detailparam->name}}</td>
                            <td style="text-align:center">{{huruf_kkesatu_id($data->id,'12'.$detailparam->id)}}</td>
                            <td style="text-align:center" >{{value_kkesatu_id($data->id,'12'.$detailparam->id)}}</td>
                            <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'12'.$detailparam->id))}}" >{{keterangan_kkesatu_id($data->id,'12'.$detailparam->id)}}</td>
                            <td style="text-align:center">{{huruf_kkesatu_id($data->id,'22'.$detailparam->id)}}</td>
                            <td style="text-align:center" >{{value_kkesatu_id($data->id,'22'.$detailparam->id)}}</td>
                            <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'22'.$detailparam->id))}}" >{{keterangan_kkesatu_id($data->id,'22'.$detailparam->id)}}</td>
                            <td style="text-align:center">{{huruf_kkesatu_id($data->id,'32'.$detailparam->id)}}</td>
                            <td style="text-align:center" >{{value_kkesatu_id($data->id,'32'.$detailparam->id)}}</td>
                            <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'32'.$detailparam->id))}}" >{{keterangan_kkesatu_id($data->id,'32'.$detailparam->id)}}</td>
                            <td style="text-align:center">{{huruf_kkesatu_id($data->id,'42'.$detailparam->id)}}</td>
                            <td style="text-align:center" >{{value_kkesatu_id($data->id,'42'.$detailparam->id)}}</td>
                            <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'42'.$detailparam->id))}}" >{{keterangan_kkesatu_id($data->id,'42'.$detailparam->id)}}</td>
                            <td style="text-align:center">{{huruf_kkesatu_id($data->id,'52'.$detailparam->id)}}</td>
                            <td style="text-align:center" >{{value_kkesatu_id($data->id,'52'.$detailparam->id)}}</td>
                            <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'52'.$detailparam->id))}}" >{{keterangan_kkesatu_id($data->id,'52'.$detailparam->id)}}</td>
                        </tr>
                    @endforeach
                @endforeach
                    <tr>
                        <td style="background:aqua" ><b></b></td>
                        <td style="background:aqua"><b>TOTAL</b></td>
                        <td style="background:aqua"></td>
                        <td style="text-align:center" ></td>
                        <td style="font-weight:bold;background:aqua;text-align:center" >{{rekapan_kkesatu_id($data->id,'11')}}%</td>
                        <td style="text-align:center" ></td>
                        <td style="text-align:center" ></td>
                        <td style="font-weight:bold;background:aqua;text-align:center" >{{rekapan_kkesatu_id($data->id,'21')}}%</td>
                        <td style="text-align:center" ></td>
                        <td style="text-align:center" ></td>
                        <td style="font-weight:bold;background:aqua;text-align:center" >{{rekapan_kkesatu_id($data->id,'31')}}%</td>
                        <td style="text-align:center" ></td>
                        <td style="text-align:center" ></td>
                        <td style="font-weight:bold;background:aqua;text-align:center" >{{rekapan_kkesatu_id($data->id,'41')}}%</td>
                        <td style="text-align:center" ></td>
                        <td style="text-align:center" ></td>
                        <td style="font-weight:bold;background:aqua;text-align:center" >{{rekapan_kkesatu_id($data->id,'51')}}%</td>
                        <td style="text-align:center" ></td>
                        
                    </tr>  
            </table>
        
    </body>
</html>