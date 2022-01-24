<html>
    <head>
        <title>KKECAPAIAN{{$data->file}}</title>
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
                <td width="100%" class="ttdhead-h1" >REKAPITULASI NILAI KKE2  OPD KOTA CILEGON</td>
            </tr>
           
        </table>
            <table width="100%">
                <tr>
                    <th rowspan="2" width="5%">No</th>
                    <th rowspan="2">TUJUAN</th>
                    <th colspan="2">RENSTRA IPA</th>
                    <th rowspan="2">SARAN</th>
                    <th colspan="2">RENSTRA IPA</th>
                    <th colspan="2">PK IP</th>
                    
                </tr>
                <tr>
                    <th colspan="2">ORIENTSI HASIL</th>
                    <th colspan="2">ORIENTSI HASIL</th>
                    <th colspan="2">ORIENTSI HASIL</th>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td></td>
                    <td width="6%"></td>
                    <td width="6%"></td>
                    <td></td>
                    <td width="6%"></td>
                    <td width="6%"></td>
                    <td width="6%"></td>
                    <td width="6%"></td>
                </tr>
                @foreach(parameter_kkedua_get() as $no=>$param)
                    @if($param->utama==1)
                        <tr>
                            <td style="background:aqua" rowspan="{{count_detail_parameter_kkedua_get($param->id)}}"><b>{{$no+1}}.</b></td>
                            <td style="background:aqua;text-align:left" rowspan="{{count_detail_parameter_kkedua_get($param->id)}}">{{$param->name}}</td>
                            <td style="background:#e3e3b8">{{huruf_kkedua_id($data->id,'11'.detailutama_parameter_kkedua_get($param->id)->id)}}</td>
                            <td style="background:aqua;font-weight:bold;">{{value_kkedua_id($data->id,'11'.detailutama_parameter_kkedua_get($param->id)->id)}}</td>
                            <td style="background:#e3e3b8">{{detailutama_parameter_kkedua_get($param->id)->name}}</td>
                            <td style="background:#e3e3b8">{{huruf_kkedua_id($data->id,'12'.detailutama_parameter_kkedua_get($param->id)->id)}}</td>
                            <td style="background:aqua;font-weight:bold;">{{value_kkedua_id($data->id,'12'.detailutama_parameter_kkedua_get($param->id)->id)}}</td>
                            <td></td>
                            <td></td>
                        </tr>   
                        @foreach(detail_parameter_kkedua_get($param->id) as $no=>$detailparam)
                            <tr>
                                <td style="background:#e3e3b8">{{huruf_kkedua_id($data->id,'11'.$detailparam->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kkedua_id($data->id,'11'.$detailparam->id)}}</td>
                                <td style="background:#e3e3b8;text-align:left">{{$detailparam->name}}</td>
                                <td style="background:#e3e3b8">{{huruf_kkedua_id($data->id,'12'.$detailparam->id)}}</td>
                                <td style="background:aqua;font-weight:bold;">{{value_kkedua_id($data->id,'12'.$detailparam->id)}}</td>
                                <td></td>
                                <td></td>
                            </tr>   
                        @endforeach
                    @else
                        <tr>
                            <td style="background:aqua"><b>{{$no+1}}.</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="background:#e3e3b8;text-align:left">{{$param->name}}</td>
                            <td></td>
                            <td></td>
                            <td style="background:#e3e3b8;font-weight:bold;">{{huruf_kkedua_id($data->id,'13'.$param->id)}}</td>
                            <td style="background:aqua;font-weight:bold;">{{value_kkedua_id($data->id,'13'.$param->id)}}</td>
                        </tr> 
                    @endif
                @endforeach
                        <tr>
                            <td colspan="2" style="background:aqua"><b>Total</b></td>
                            <td></td>
                            <td style="background:#e3e3b8;font-weight:bold">{{rekapan_detail_kkedua_id($data->id,11)}}%</td>
                            <td></td>
                            <td></td>
                            <td style="background:#e3e3b8;font-weight:bold">{{rekapan_detail_kkedua_id($data->id,12)}}%</td>
                            <td></td>
                            <td style="background:#e3e3b8;font-weight:bold">{{rekapan_detail_kkedua_id($data->id,13)}}%</td>
                        </tr>
            </table>
        
    </body>
</html>