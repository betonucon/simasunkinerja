<html>
    <head>
        <title>KKEIKU{{$data->file}}</title>
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
                font-size:13px;
                font-weight:bold;
                border:solid 1px #000;
                text-align:center;
            }
            td{
                font-size:13px;
                padding-left:5px;
                border:solid 1px #000;
                text-align:center;
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
                <td width="100%" class="ttdhead-h1" >REKAPITULASI NILAI KKE3 IKU OPD KOTA CILEGON</td>
            </tr>
           
        </table>
            <table width="100%">
                <tr>
                    <th rowspan="2" width="3%">No</th>
                    <th rowspan="2" width="20%">TUJUAN</th>
                    <th rowspan="2">INDIKATOR KINERJA TUJUAN</th>
                    <th colspan="8">KRITERIA INDIKATOR KINERJA TERUKUR DALAM DOKUMEN PERENCANAAN</th>
                    
                </tr>
                <tr>
                    <th colspan="2">ORIENTASI HASIL</th>
                    <th colspan="2">RELEVAN</th>
                    <th colspan="2">CUKUP</th>
                    <th colspan="2">UKUR</th>
                </tr>
                <tr>
                    <td width="3%"></td>
                    <td></td>
                    <td></td>
                    <td width="7%"></td>
                    <td width="7%"></td>
                    <td width="7%"></td>
                    <td width="7%"></td>
                    <td width="7%"></td>
                    <td width="7%"></td>
                    <td width="7%"></td>
                    <td width="7%"></td>
                </tr>
                @foreach(parameter_kketiga3_get() as $no=>$param)
                    <tr>
                        <td style="background:aqua" rowspan="{{count_detail_parameter_kketiga3_get($param->id)+1}}">{{$no}} +{{count_detail_parameter_kketiga3_get($param->id)+1}}</td>
                        <td style="background:aqua;text-align:left;" rowspan="{{count_detail_parameter_kketiga3_get($param->id)+1}}">{{$param->name}}</td>
                        <td style="background:#e3e3b8;text-align:left">{{detailutama_parameter_kketiga3_get($param->id)->name}}</td>
                        <td style="background:#e3e3b8">{{huruf_kketiga3_id($data->id,'11'.detailutama_parameter_kketiga3_get($param->id)->id)}}</td>
                        <td style="background:aqua;font-weight:bold;">{{value_kketiga3_id($data->id,'11'.detailutama_parameter_kketiga3_get($param->id)->id)}}</td>
                        <td style="background:#e3e3b8">{{huruf_kketiga3_id($data->id,'12'.detailutama_parameter_kketiga3_get($param->id)->id)}}</td>
                        <td style="background:aqua;font-weight:bold;">{{value_kketiga3_id($data->id,'12'.detailutama_parameter_kketiga3_get($param->id)->id)}}</td>
                        <td style="background:#e3e3b8" rowspan="{{count_detail_parameter_kketiga3_get($param->id)+1}}">{{huruf_kketiga3_id($data->id,'14'.detailutama_parameter_kketiga3_get($param->id)->id)}}</td>
                        <td style="background:aqua;font-weight:bold;" rowspan="{{count_detail_parameter_kketiga3_get($param->id)+1}}">{{value_kketiga3_id($data->id,'13'.detailutama_parameter_kketiga3_get($param->id)->id)}}</td>
                        <td style="background:#e3e3b8">{{huruf_kketiga3_id($data->id,'14'.detailutama_parameter_kketiga3_get($param->id)->id)}}</td>
                        <td style="background:aqua;font-weight:bold;">{{value_kketiga3_id($data->id,'14'.detailutama_parameter_kketiga3_get($param->id)->id)}}</td>
                        
                    </tr>
                            
                        @foreach(detail_parameter_kketiga3_get($param->id) as $no=>$detailparam)
                            <tr>
                                <td style="background:#e3e3b8;text-align:left">{{$detailparam->name}}</td>
                                <td style="background:#e3e3b8">{{huruf_kketiga3_id($data->id,'11'.$detailparam->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga3_id($data->id,'11'.$detailparam->id)}}</td>
                                <td style="background:#e3e3b8">{{huruf_kketiga3_id($data->id,'12'.$detailparam->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga3_id($data->id,'12'.$detailparam->id)}}</td>
                                <td style="background:#e3e3b8">{{huruf_kketiga3_id($data->id,'14'.$detailparam->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga3_id($data->id,'14'.$detailparam->id)}}</td>
                            </tr>   
                        @endforeach
                    
                @endforeach
                <tr>
                    <td style="background:aqua;"></td>
                    <td style="background:aqua;"></td>
                    <td style="background:aqua;"></td>
                    <td style="background:aqua;"></td>
                    <td style="background:aqua;font-weight:bold">{{rekapan_detail_kketiga3_id($data->id,11)}}%</td>
                    <td style="background:aqua;"></td>
                    <td style="background:aqua;font-weight:bold">{{rekapan_detail_kketiga3_id($data->id,12)}}%</td>
                    <td style="background:aqua;"></td>
                    <td style="background:aqua;font-weight:bold">{{rekapan_detail_kketiga3_id($data->id,13)}}%</td>
                    <td style="background:aqua;"></td>
                    <td style="background:aqua;font-weight:bold">{{rekapan_detail_kketiga3_id($data->id,14)}}%</td>
                </tr>
            </table>
        
    </body>
</html>