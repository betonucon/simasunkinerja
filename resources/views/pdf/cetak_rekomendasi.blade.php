<html>
    <head>
        <title>REKOM{{$data->file}}</title>
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
                font-size:15px;
                font-weight:bold;
                border:solid 1px #000;
                text-align:center;
            }
            td{
                font-size:15px;
                padding-left:5px;
                border:solid 1px #fff;
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
                <td width="100%" class="ttdhead-h1" >REKOMENDASI OPD KOTA CILEGON</td>
            </tr>
           
        </table>
            <table width="100%">
            
            <tbody class="files">
                @foreach(parameter_get() as $param)
                <tr data-id="empty">
                    <td class="text-left text-muted p-t-30 p-b-30" style="padding-left: 4% !important;">
                        <div class="form-group" >
                            <label style="font-weight:bold;font-size:1vw">{{$param->name}} ({{$param->nilai}}%)</label>
                            <textarea disabled placeholder="Ketik disini......" id="rekomendasi{{$param->id}}" class="textarea from-control">{!!isi_rekomendasi($data->id,$param->id)!!}</textarea>
                            
                        </div>
                    </td>
                   
                </tr>
                @endforeach
            </table>
        
    </body>
</html>