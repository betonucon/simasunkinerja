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
                         <div class="form-grup" style="margin-bottom:2%">
                            <label>Pilih Tahun</label>
                            <select class="form-control" style="width:20%;display:inline" onchange="pilih_tahunnya(this.value)">
                            @for($thn=2020;$thn<2030;$thn++)
                                <option value="{{$thn}}" @if($thn==$tahun) selected @endif>{{$thn}}</option>
                            @endfor
                            </select>
                           
                        </div>
                        <table id="myTable" class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th width="4%">No</th>
                                    <th width="7%">OPD</th>
                                    <th width="11%">Evaluator</th>
                                    <th >Nama OPD</th>
                                    <th  width="5%">Act</th>
                                    <th  width="5%">Tahun</th>
                                    <th  width="5%">Target</th>
                                    <th  width="5%">Aktual</th>
                                    <th  width="5%">LKE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(opd_get() as $no=>$o)
                                <tr class="odd gradeX">
                                    <td class="f-s-600 text-inverse">{{$no+1}}</td>
                                    @if(lhe_id_opd($o->id,$tahun)>0)
                                    <td><span class="btn btn-green btn-xs" onclick="penilaian(`{{base64_encode(lhe_id_opd($o->id,$tahun))}}`)"><i class="fa fa-search"></i> OPD</span></td>
                                    @else
                                    <td></td>
                                    @endif
                                    @if(lhe_id($o->id,$tahun)>0)
                                    <td><span class="btn btn-green btn-xs" onclick="penilaian(`{{base64_encode(lhe_id($o->id,$tahun))}}`)"><i class="fa fa-search"></i> Evaluator</span></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{$o->name}} ({{$o->keterangan}})</td>
                                    <td>{!! tombol_proses($o->id,$tahun) !!}</td>
                                    <td>{{$tahun}}</td>
                                    <td>{{((total_nilai_parameter(lhe_id_opd($o->id,$tahun))/100)*100)}}%</td>
                                    <td>{{((total_nilai_parameter(lhe_id($o->id,$tahun))/100)*100)}}%</td>
                                    <td>{{kalkulasi((total_nilai_parameter(lhe_id($o->id,$tahun))/100)*100)}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-tambah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Proses</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                   
                                        <form id="tambah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Transaksilhe/proses_buka')}}" method="post" enctype="multipart/form-data">
							                @csrf
                                            <input type="text" name="opd_id" id="opd_id_proses">
                                            <input type="text" name="tahun" id="tahun_proses">
                                            <div class="form-grup">
                                                <label>Pilih Status</label>
                                                <select name="sts" class="form-control">
                                                    <option value="">Pilih Status</option>
                                                    <option value="1">Buka Semua Proses</option>
                                                    <option value="2">Buka Proses Evaluator</option>
                                                    <option value="3">Tutup Semua Proses</option>
                                                </select>
                                            </div>
                                        </form>
									
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Batalkan</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="simpan_data()">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-file" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-besar">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="labelfile"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
        $('#myTable').DataTable( {
			responsive: false,
			paging: true,
			info: true,
			ordering:false,
			lengthChange: false,
		} );
        function proses_buka(opd,tahun){
            $('#opd_id_proses').val(opd);
            $('#tahun_proses').val(tahun);
            $('#modal-tambah').modal('show');
        }

        function pilih_tahunnya(a){
            location.assign("{{url('Transaksilhe')}}?tahun="+a); 
        }
        function penilaian(a){
            location.assign("{{url('Transaksilhe/create')}}?id="+a); 
        }
        function lihat_data(file,label){
            $('#labelfile').html("Dokumen LHE "+label);
            $('#tampil-file').html("<iframe src='{{url('dokumen')}}/"+file+"' width='100%' height='600px'></iframe>");
            $('#modal-file').modal('show');
        }

        function simpan_data(){
            var form=document.getElementById('tambah-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Transaksilhe/proses_buka')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        if(msg=='ok'){
                            location.reload(); 
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