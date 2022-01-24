<html>
    <head>
        <title>KKEIS{{$data->file}}</title>
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
                <td width="100%" class="ttdhead-h1" >REKAPITULASI NILAI KKE3 IS OPD KOTA CILEGON</td>
            </tr>
           
        </table>
            <table width="100%">
                <tr>
                    <th rowspan="2" width="3%">No</th>
                    <th rowspan="2" width="15%">TUJUAN</th>
                    <th rowspan="2">INDIKATOR KINERJA TUJUAN</th>
                    <th colspan="12">KRITERIA INDIKATOR KINERJA TERUKUR DALAM DOKUMEN PERENCANAAN</th>
                    <th colspan="2" rowspan="2">PENGUKURAN</th>
                    
                </tr>
                <tr>
                    <th colspan="2">RENSTRA IP</th>
                    <th colspan="2">PK IP</th>
                    <th colspan="2">MEASURABLE</th>
                    <th colspan="2">ORIENTASI HASIL</th>
                    <th colspan="2">RELEVAN</th>
                    <th colspan="2">CUKUP</th>
                    
                </tr>
                <tr>
                    <td style="background:#00ffff" width="3%"></td>
                    <td style="text-align:left;background:#00ffff"><b>RENSTRA IP</b></td>
                    <td style="background:#00ffff"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                    <td style="background:#00ffff" width="4%"></td>
                </tr>
                @foreach(parameter_kketiga2_get() as $no=>$param)
                    @if($param->id>3)
                        @if($param->id==4)
                        

                            <tr>
                                <td style="background:#00ffff"></td>
                                <td style="text-align:left;background:#00ffff"><b>PK IP</b></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                                <td style="background:#00ffff"></td>
                            </tr>
                        @endif
                            <tr>
                                <td width="3%" rowspan="{{count_detail_parameter_kketiga2_get($param->id)}}">{{ $no+1}}</td>
                                <td style="text-align:left;background:aqua;" rowspan="{{count_detail_parameter_kketiga2_get($param->id)}}">{{$param->name}}</td>
                                <td style="text-align:left;background:#e3e3b8;">{{detailutama_parameter_kketiga2_get($param->id)->name}}</td>
                                <td ></td>
                                <td></td>
                                <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'12'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'12'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'13'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'13'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'14'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'14'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'15'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'15'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td rowspan="{{count_detail_parameter_kketiga2_get($param->id)}}" style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'16'.$param->id)}}</td>
                                <td rowspan="{{count_detail_parameter_kketiga2_get($param->id)}}">{{value_kketiga2_id($data->id,'16'.$param->id)}}</td>
                                <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'17'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'17'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                            </tr>
                                
                            @foreach(detail_parameter_kketiga2_get($param->id) as $no=>$detailparam)
                                <tr>
                                    <td style="text-align:left;background:#e3e3b8;">{{$detailparam->name}}</td>
                                    <td></td>
                                    <td></td>
                                    <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'12'.$detailparam->id)}}</td>
                                    <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'12'.$detailparam->id)}}</td>
                                    <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'13'.$detailparam->id)}}</td>
                                    <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'13'.$detailparam->id)}}</td>
                                    <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'14'.$detailparam->id)}}</td>
                                    <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'14'.$detailparam->id)}}</td>
                                    <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'15'.$detailparam->id)}}</td>
                                    <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'15'.$detailparam->id)}}</td>
                                    <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'17'.$detailparam->id)}}</td>
                                    <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'17'.$detailparam->id)}}</td>
                                </tr>
                            @endforeach
                    @else
                            <tr>
                                <td width="3%" rowspan="{{count_detail_parameter_kketiga2_get($param->id)}}">{{ $no+1}}</td>
                                <td style="text-align:left;background:aqua;" rowspan="{{count_detail_parameter_kketiga2_get($param->id)}}">{{$param->name}}</td>
                                <td style="text-align:left;background:#e3e3b8;">{{detailutama_parameter_kketiga2_get($param->id)->name}}</td>
                                <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'11'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'11'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td></td>
                                <td></td>
                                <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'13'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'13'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'14'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'14'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'15'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'15'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td rowspan="{{count_detail_parameter_kketiga2_get($param->id)}}" style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'16'.$param->id)}}</td>
                                <td rowspan="{{count_detail_parameter_kketiga2_get($param->id)}}">{{value_kketiga2_id($data->id,'16'.$param->id)}}</td>
                                <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'17'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'17'.detailutama_parameter_kketiga2_get($param->id)->id)}}</td>
                            </tr>
                                
                            @foreach(detail_parameter_kketiga2_get($param->id) as $no=>$detailparam)
                                <tr>
                                    <td style="text-align:left;background:#e3e3b8;">{{$detailparam->name}}</td>
                                    <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'11'.$detailparam->id)}}</td>
                                    <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'11'.$detailparam->id)}}</td>
                                    <td></td>
                                    <td></td>
                                    <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'13'.$detailparam->id)}}</td>
                                    <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'13'.$detailparam->id)}}</td>
                                    <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'14'.$detailparam->id)}}</td>
                                    <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'14'.$detailparam->id)}}</td>
                                    <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'15'.$detailparam->id)}}</td>
                                    <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'15'.$detailparam->id)}}</td>
                                    <td style="background:#e3e3b8;font-weight:bold;text-align:center">{{huruf_kketiga2_id($data->id,'17'.$detailparam->id)}}</td>
                                    <td style="background:aqua;font-weight:bold;">{{value_kketiga2_id($data->id,'17'.$detailparam->id)}}</td>
                                </tr>
                            @endforeach

                    @endif
                    
                @endforeach
                    <tr>
                        <td style="background:#00ffff"></td>
                        <td style="text-align:left;background:#00ffff"><b>TOTAL</b></td>
                        <td style="background:#00ffff"></td>
                        <td style="background:#00ffff"></td>
                        <td style="font-weight:bold;background:#00ffff">{{rekapan_detail_kketiga2_id($data->id,11)}}%</td>
                        <td style="background:#00ffff"></td>
                        <td style="font-weight:bold;background:#00ffff">{{rekapan_detail_kketiga2_id($data->id,12)}}%</td>
                        <td style="background:#00ffff"></td>
                        <td style="font-weight:bold;background:#00ffff">{{rekapan_detail_kketiga2_id($data->id,13)}}%</td>
                        <td style="background:#00ffff"></td>
                        <td style="font-weight:bold;background:#00ffff">{{rekapan_detail_kketiga2_id($data->id,14)}}%</td>
                        <td style="background:#00ffff"></td>
                        <td style="font-weight:bold;background:#00ffff">{{rekapan_detail_kketiga2_id($data->id,15)}}%</td>
                        <td style="background:#00ffff"></td>
                        <td style="font-weight:bold;background:#00ffff">{{rekapan_detail_kketiga2_id($data->id,16)}}%</td>
                        <td style="background:#00ffff"></td>
                        <td style="font-weight:bold;background:#00ffff">{{rekapan_detail_kketiga2_id($data->id,17)}}%</td>
                    </tr>
            </table>
        
    </body>
</html>