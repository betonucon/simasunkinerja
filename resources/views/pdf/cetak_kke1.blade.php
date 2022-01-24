<html>
    <head>
        <title>KKE1{{$data->file}}</title>
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
                <td width="100%" class="ttdhead-h1" >REKAPITULASI NILAI KKE1 Capaian OPD KOTA CILEGON</td>
            </tr>
           
        </table>
            <table width="100%">
                <tr>
                    <th rowspan="2" width="4%">No</th>
                    <th rowspan="2">SASARAN</th>
                    <th rowspan="2" width="15%">INDIKATOR KERJA</th>
                    <th colspan="16">OUTCOME IP</th>
                    
                </tr>
                <tr>
                    <th width="10%" colspan="2">SASARAN TEPAT</th>
                    <th width="10%" colspan="2">IK TEPAT</th>
                    <th width="12%" colspan="4">TARGET TERCAPAI</th>
                    <th width="12%" colspan="4">KINERJA LEBIH BAIK</th>
                    <th width="12%" colspan="4">DATA ANDAL</th>
                </tr>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th colspan="2">4</th>
                    <th colspan="2">5</th>
                    <th colspan="4">6</th>
                    <th colspan="4">7</th>
                    <th colspan="4">8</th>
                </tr>
                <?php
                    $totnilai311=0;
                    $totnilai411=0;
                    $totnilai511=0;
                ?>
                @foreach(parameter_kkesatu_get() as $no=>$param)
                    
                    <tr>
                        <td style="background:aqua" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}"><b>{{$no+1}}.</b></td>
                        <td style="background:aqua" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}">{{$param->name}}</td>
                        <td style="background:aqua">{{detailutama_parameter_kkesatu_get($param->id)->name}}</td>
                        <td style="background:#ecefef;text-align:center;vertical-align:middle  !important" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}" width="4%">
                            {{huruf_kkesatu_id($data->id,'11'.$param->id)}} 
                        </td>
                        <td style="background: #50505257;text-align:center;vertical-align:middle  !important" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}" width="4%">{{value_kkesatu_id($data->id,'11'.$param->id)}}</td>
                        <td style="background:#ecefef;text-align:center" width="4%">
                            {{huruf_kkesatu_id($data->id,'21'.$param->id)}} 
                        </td>
                        <td style="background: #50505257;text-align:center" width="4%">{{value_kkesatu_id($data->id,'21'.$param->id)}}</td>
                        <td style="background:#ecefef;text-align:center" width="4%">
                            {{huruf_kkesatu_id($data->id,'31'.$param->id)}} 
                        </td>
                        <td style="background: #50505257;text-align:center" width="4%">{{value_kkesatu_id($data->id,'31'.$param->id)}}</td>
                            @if(value_kkesatu_id($data->id,'31'.$param->id)=='0')
                                <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                            @elseif(value_kkesatu_id($data->id,'31'.$param->id)=="-")
                                <td style="text-align:center;background:red;font-size:9px;color:#fff" width="4%">SALAH</td>
                            @else
                                <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                            @endif
                        <td style="text-align:center;vertical-align:middle  !important" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}" width="4%"></td>
                        
                        <td style="background:#ecefef;text-align:center" width="4%">
                            {{huruf_kkesatu_id($data->id,'41'.$param->id)}} 
                        </td>
                        <td style="background: #50505257;text-align:center" width="4%">{{value_kkesatu_id($data->id,'41'.$param->id)}}</td>
                            @if(value_kkesatu_id($data->id,'41'.$param->id)=='0')
                                <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                            @elseif(value_kkesatu_id($data->id,'41'.$param->id)=="-")
                                <td style="text-align:center;background:red;font-size:9px;color:#fff" width="4%">SALAH</td>
                            @else
                                <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                            @endif
                        <td style="text-align:center;vertical-align:middle  !important" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}" width="4%"></td>
                        
                        <td style="background:#ecefef;text-align:center" width="4%">
                            {{huruf_kkesatu_id($data->id,'51'.$param->id)}} 
                        </td>
                        <td style="background: #50505257;text-align:center" width="4%">{{value_kkesatu_id($data->id,'51'.$param->id)}}</td>
                            @if(value_kkesatu_id($data->id,'51'.$param->id)=='0')
                                <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                            @elseif(value_kkesatu_id($data->id,'51'.$param->id)=="-")
                                <td style="text-align:center;background:red;font-size:9px;color:#fff" width="4%">SALAH</td>
                            @else
                                <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                            @endif
                        <td style="text-align:center;vertical-align:middle  !important" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}" width="4%"></td>
                        
                        
                    </tr>
                    <?php
                        $nilai311=0;
                        $nilai411=0;
                        $nilai511=0;
                    ?>
                    @foreach(detail_parameter_kkesatu_get($param->id) as $no=>$detailparam)
                        <?php
                            $nilai311+=str_replace('-','0',value_kkesatu_id($data->id,'31'.$param->id))+str_replace('-','0',value_kkesatu_id($data->id,'32'.$detailparam->id));
                            $nilai411+=str_replace('-','0',value_kkesatu_id($data->id,'41'.$param->id))+str_replace('-','0',value_kkesatu_id($data->id,'42'.$detailparam->id));
                            $nilai511+=str_replace('-','0',value_kkesatu_id($data->id,'51'.$param->id))+str_replace('-','0',value_kkesatu_id($data->id,'52'.$detailparam->id));
                        ?>
                        <tr>
                            <td style="background:aqua">{{$detailparam->name}}</td>
                            <td style="background:#ecefef;text-align:center">
                                {{huruf_kkesatu_id($data->id,'22'.$detailparam->id)}} 
                            </td>
                            <td style="background: #50505257;text-align:center" >{{value_kkesatu_id($data->id,'22'.$detailparam->id)}}</td>
                            <td style="background:#ecefef;text-align:center">
                                {{huruf_kkesatu_id($data->id,'32'.$detailparam->id)}} 
                            </td>
                            <td style="background: #50505257;text-align:center" >{{value_kkesatu_id($data->id,'32'.$detailparam->id)}}</td>
                                @if(value_kkesatu_id($data->id,'32'.$detailparam->id)=='0')
                                    <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                                @elseif(value_kkesatu_id($data->id,'32'.$detailparam->id)=="-")
                                    <td style="text-align:center;background:red;font-size:9px;color:#fff" width="4%">SALAH</td>
                                @else
                                    <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                                @endif
                            
                            <td style="background:#ecefef;text-align:center">
                                {{huruf_kkesatu_id($data->id,'42'.$detailparam->id)}} 
                            </td>
                            <td style="background: #50505257;text-align:center" >{{value_kkesatu_id($data->id,'42'.$detailparam->id)}}</td>
                                @if(value_kkesatu_id($data->id,'42'.$detailparam->id)=='0')
                                    <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                                @elseif(value_kkesatu_id($data->id,'42'.$detailparam->id)=="-")
                                    <td style="text-align:center;background:red;font-size:9px;color:#fff" width="4%">SALAH</td>
                                @else
                                    <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                                @endif
                            <td style="background:#ecefef;text-align:center">
                                {{huruf_kkesatu_id($data->id,'52'.$detailparam->id)}} 
                            </td>
                            <td style="background: #50505257;text-align:center" >{{value_kkesatu_id($data->id,'52'.$detailparam->id)}}</td>
                                @if(value_kkesatu_id($data->id,'52'.$detailparam->id)=='0')
                                    <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                                @elseif(value_kkesatu_id($data->id,'52'.$detailparam->id)=="-")
                                    <td style="text-align:center;background:red;font-size:9px;color:#fff" width="4%">SALAH</td>
                                @else
                                    <td style="text-align:center;background:yellow;font-size:9px" width="4%">OK</td>
                                @endif
                        </tr>
                    @endforeach
                    <?php
                        $totnilai311+=($nilai311/2)*100;
                        $totnilai411+=($nilai411/2)*100;
                        $totnilai511+=($nilai511/2)*100;
                    ?>
                    <tr>
                        <td style="background:#fff" ><b></b></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:yellow;text-align:center">{{uang(($nilai311/2)*100)}}%</td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:yellow;text-align:center">{{uang(($nilai411/2)*100)}}%</td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:yellow;text-align:center">{{uang(($nilai511/2)*100)}}%</td>
                    </tr>  
                @endforeach
                    <tr>
                        <td style="background:#fff" ><b></b></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:yellow;text-align:center">{{uang($totnilai311/3)}}%</td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:yellow;text-align:center">{{uang($totnilai411/3)}}%</td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:#fff"></td>
                        <td style="background:yellow;text-align:center">{{uang($totnilai511/3)}}%</td>
                    </tr>  
            </table>

    </body>
</html>