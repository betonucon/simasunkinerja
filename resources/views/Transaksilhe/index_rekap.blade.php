@extends('layouts.web')

@push('style')
    <style>
        #style-3::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px #fff;
            background-color: #fff;
        }

        #style-3::-webkit-scrollbar
        {
            width: 3px;
            background-color: #F5F5F5;
        }

        #style-3::-webkit-scrollbar-thumb
        {
            background-color: #fff;
        }

    </style>
@endpush
@section('conten')   
        
        <div id="content" class="content">
			<h1 class="page-header">{{$menu}} <small>{{name()}}</small></h1>
            
            <div class="col-xl-12 ui-sortable">
                <div class="panel panel-inverse" data-sortable-id="ui-general-1">
						<!-- begin panel-heading -->
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">&nbsp;</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
						<!-- end panel-heading -->
						<!-- begin panel-body -->
					<div class="panel-body">
                        <div class="form-grup" style="margin-bottom:2%;background:aqua">
                            <label>Pilih Tahun</label>
                            <select class="form-control" style="width:20%;display:inline" onchange="pilih_tahunnya(this.value)">
                            @for($thn=2020;$thn<2030;$thn++)
                                <option value="{{$thn}}" @if($thn==$tahun) selected @endif>{{$thn}}</option>
                            @endfor
                            </select>
                           
                        </div>
                        <h1 class="page-header">
                            <span class="btn btn-xs btn-blue" onclick="cetak_rekap()"><i class="fas fa-print"></i> Cetak</span>
                        </h1>
                        <table class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th width="4%">No</th>
                                    <th class="text-nowrap">OPD</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(auditor_get($tahun) as $no=>$o)
                                <tr class="odd gradeX">
                                    <td class="f-s-600 text-inverse">{{$no+1}}</td>
                                    <td>{{$o->opd['name']}} ({{$o->opd['keterangan']}})</td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                    
                    <div class="modal fade" id="modal-file" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" style="max-width:90%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="labelfile"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                                </div>
                                <div class="modal-body">
                                   
                                        <div id="tampil-file"></div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Tutup</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
                @include('layouts.modal')
            </div>
        </div>
@endsection
@push('ajax')

    <script>
        $(document).ready(function() {
            $('#tanggal').datepicker({
                format: 'yyyy-mm-dd',
            });
        });
        function pilih_tahunnya(a){
            location.assign("{{url('Transaksilherekap')}}?tahun="+a); 
        }
        function tambah(){
            $('#modal-tambah').modal('show');
        }
        function cetak_rekap(){
            $('#labelfile').html("Rekapan LHE ");
            $('#tampil-file').html("<iframe src='{{url('Transaksilherekap/cetak')}}' width='100%' height='600px'></iframe>");
            $('#modal-file').modal('show');
        }
        function penilaian(a){
            location.assign("{{url('Transaksilhe/create')}}?id="+a); 
        }

        function simpan_data(){
            var form=document.getElementById('tambah-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Transaksilhe')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        var tex=msg.split('@');
                        if(tex[0]=='ok'){
                            location.assign("{{url('Transaksilhe/create')}}?id="+tex[1]); 
                        }else{
                            document.getElementById("loadnya").style.width = "0px";
							$('#modal-notifikasi').modal('show');
							document.getElementById("notifikasi").style.width = "100%";
							$('#notifikasi').html(msg);
                        }
                        
                        
                    }
                });

        } 
	
    </script>

@endpush