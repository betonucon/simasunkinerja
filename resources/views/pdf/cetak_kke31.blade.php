<html>
    <head>
        <title>KKEIT{{$data->file}}</title>
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
                <td width="100%" class="ttdhead-h1" >REKAPITULASI NILAI KKE3 IT OPD KOTA CILEGON</td>
            </tr>
           
        </table>
            <table width="100%">
                <tr>
                    <th rowspan="2" width="3%">No</th>
                    <th rowspan="2" width="15%">TUJUAN</th>
                    <th rowspan="2">INDIKATOR KINERJA TUJUAN</th>
                    <th rowspan="2" colspan="2">RENSTRA IPA</th>
                    <th colspan="8">KRITERIA INDIKATOR KINERJA TERUKUR DALAM DOKUMEN PERENCANAAN</th>
                    <th colspan="2" rowspan="2">PENGUKURAN</th>
                    
                </tr>
                <tr>
                    <th colspan="2">MEASURABLE</th>
                    <th colspan="2">ORIENTASI HASIL</th>
                    <th colspan="2">RELEVAN</th>
                    <th colspan="2">CUKUP</th>
                    
                </tr>
                <tr>
                    <td width="3%"></td>
                    <td></td>
                    <td></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                </tr>
                @foreach(parameter_kketiga1_get() as $no=>$param)
                    <tr>
                        <td style="background:aqua" rowspan="{{count_detail_parameter_kketiga1_get($param->id)+1}}">{{$no+1}}</td>
                        <td style="text-align:left;background:aqua" rowspan="{{count_detail_parameter_kketiga1_get($param->id)+1}}">{{$param->name}}</td>
                        <td></td>
                        <td>{{huruf_kketiga1_id($data->id,'11'.$param->id)}} </td>
                        
                        <td>{{value_kketiga1_id($data->id,'11'.$param->id)}}</td>
                        <td>{{huruf_kketiga1_id($data->id,'12'.$param->id)}} </td>
                        <td>{{value_kketiga1_id($data->id,'12'.$param->id)}}</td>
                        <td>{{huruf_kketiga1_id($data->id,'13'.$param->id)}} </td>
                        <td>{{value_kketiga1_id($data->id,'13'.$param->id)}}</td>
                        <td>{{huruf_kketiga1_id($data->id,'14'.$param->id)}} </td>
                        <td>{{value_kketiga1_id($data->id,'14'.$param->id)}}</td>
                        <td rowspan="{{count_detail_parameter_kketiga1_get($param->id)+1}}">{{huruf_kketiga1_id($data->id,'15'.$param->id)}} </td>
                        <td rowspan="{{count_detail_parameter_kketiga1_get($param->id)+1}}">{{value_kketiga1_id($data->id,'15'.$param->id)}}</td>
                        <td>{{huruf_kketiga1_id($data->id,'16'.$param->id)}} </td>
                        <td>{{value_kketiga1_id($data->id,'16'.$param->id)}}</td>
                    </tr>
                            
                        @foreach(detail_parameter_kketiga1_get($param->id) as $no=>$detailparam)
                            <tr>
                                <td style="text-align:left;background:#e3e3b8">{{$detailparam->name}}</td>
                                <td style="background:#e3e3b8">{{huruf_kketiga1_id($data->id,'11'.$detailparam->id)}} </td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga1_id($data->id,'11'.$detailparam->id)}}</td>
                                <td style="background:#e3e3b8">{{huruf_kketiga1_id($data->id,'12'.$detailparam->id)}} </td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga1_id($data->id,'12'.$detailparam->id)}}</td>
                                <td style="background:#e3e3b8">{{huruf_kketiga1_id($data->id,'13'.$detailparam->id)}} </td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga1_id($data->id,'13'.$detailparam->id)}}</td>
                                <td style="background:#e3e3b8">{{huruf_kketiga1_id($data->id,'14'.$detailparam->id)}} </td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga1_id($data->id,'14'.$detailparam->id)}}</td>
                                <td style="background:#e3e3b8">{{huruf_kketiga1_id($data->id,'16'.$detailparam->id)}} </td>
                                <td style="background:aqua;font-weight:bold;">{{value_kketiga1_id($data->id,'16'.$detailparam->id)}}</td>
                            </tr>
                        @endforeach
                    
                @endforeach
                        <tr>
                            <td></td> 
                            <td></td> 
                            <td></td> 
                            <td></td> 
                            <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,11)}}%</td> 
                            <td></td> 
                            <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,12)}}%</td> 
                            <td></td> 
                            <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,13)}}%</td> 
                            <td></td> 
                            <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,14)}}%</td> 
                            <td></td> 
                            <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,15)}}%</td> 
                            <td></td> 
                            <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,16)}}%</td>
                        </tr> 
            </table>
        
    </body>
</html>