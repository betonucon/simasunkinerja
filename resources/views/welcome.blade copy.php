@extends('layouts.web')

@push('style')
	<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
	<link href="{{url('assets/assets/plugins/jvectormap-next/jquery-jvectormap.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/nvd3/build/nv.d3.css')}}" rel="stylesheet" />
	
    <style>
        #style-3::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px #fff;
            background-color: #fff;
        }
		body{
			background:#c7cceb !important;
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
		.visi{
			padding:2%;
			background: #b8fdb8;
		}

        

    </style>
@endpush
@section('conten')   
		<div id="content" class="content">
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-6 -->
				<div class="col-lg-12 col-xl-12">
					<marquee style="background: #9ddf36;color: #190e44;">" Selamat datang di aplikasi Inspektorat kota Cilegon - Sistem Informasi Manajemen evaluASi  Akuntabilitas Kinerja ( SIMASUN KINERJA ) " </marquee>
				</div>
				<div class="col-lg-12 col-xl-12">
					<div class="row row-space-10 m-b-20">
						<!-- begin col-4 -->
						<div class="col-lg-9 col-sm-6">
							<div class="widget widget-stats bg-aqua-teal m-b-10">
								<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
								<div class="stats-content">
									<div class="stats-title" style="color:#000;font-weight:bold"></div>
									<img src="{{url('img/walikota33.jpg')}}" width="100%">
									<div class="panel panel-inverse" style="background: #fff;" data-sortable-id="chart-js-5">
										<div class="panel-body" style="color: #221919;font-weight: bold; text-align: center;">
											<h2>VISI & MISI</h2>
										"Terwujudnya Cilegon Baru, Modern dan Bermartabat "<br>
										"Kami bisa mewujudkan poin "modern", yakni dengan mengedepankan teknologi melalui Antara Digital Media lewat layanan informasi publiknya,”
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="widget widget-stats bg-aqua-teal m-b-10">
								<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
								<div class="stats-content">
									<iframe width="100%" height="250" src="https://www.youtube.com/embed/5Zl8xfEdZTg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<div class="stats-title" style="color:#362b2b;font-weight:bold;background: #00f6d4; padding: 1%; text-transform: uppercase;">PROGRAM WASTE TO ENERGY PEMBUATAN DAN PEMANFAATAN BAHAN BAKAR JUMPUTAN PADAT (BBJP) KOTA CILEGON</div>
									
								</div>
								<div class="stats-content">
									<img src="{{url('img/berita1.jpeg')}}" width="100%">
									<div class="stats-title" style="color:#362b2b;font-weight:bold;background: #00f6d4; padding: 1%; text-transform: uppercase;">Pemkot Cilegon Dapat Penghargaan Smart City dari Menteri Kominfo Johnny G Plate</div>
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
					
				<div class="col-xl-12">
					
					<div class="col-xl-12 col-lg-8" style="background:#00bdf6;padding-top:1%;padding-bottom:2px;">
						<!-- begin title -->
						<div class="mb-3 text-grey">
							<select id="tahun" onchange="pilih_tahun(this.value)" class="form-control" style="display:inline;width:40%">
								@for($x=2020;$x<2030;$x++)
									<option value="{{$x}}" @if($tahunini==$x) selected @endif >Laporan Tahun {{$x-1}} - {{$x}}</option>
								@endfor
							</select>
						</div>
									
					</div>
					<!-- end card -->
				</div>
				
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row" id="row-web">
				<!-- begin col-8 -->
				<div class="col-xl-12 col-lg-6">
					<div class="panel panel-inverse" style="background: #fff;" data-sortable-id="chart-js-5">
						<div class="panel-heading">
							<h4 class="panel-title">Dashboard</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
							<div id="nv-bar-chart"></div>
						</div>
						<div class="panel-body">
							<div id="nv-bar-chart2"></div>
						</div>
						<div class="panel-body">
							<div id="nv-bar-chart3"></div>
						</div>
					</div>
				</div>
				<!-- end col-8 -->
				
			</div>
			<!-- end row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-xl-12 col-lg-6">
					<div class="panel panel-inverse" style="background: #fff;" data-sortable-id="chart-js-5">
						<div class="panel-heading">
							<h4 class="panel-title">Dashboard perbandingan dengan tahun sebelumnya</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body p-0">
							<div id="apex-bar-chart"></div>
						</div>
					</div>
				</div>
				<!-- end col-8 -->
				
			</div>
			<!-- end row -->
			
		</div>
       
@endsection
@push('ajax')
	<script src="{{url('assets/assets/plugins/d3/d3.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/nvd3/build/nv.d3.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/apexcharts/dist/apexcharts.min.js')}}"></script>
	
	<script>
		$(document).ready(function() {
            $.ajax({
				type: 'GET',
				url: "{{url('Transaksilhe/detail_opd')}}",
				data: "tahunini={{$tahunini}}&tahunkemaren={{$tahunkemaren}}",
				success: function(msg){
					$("#detail-opd").html(msg);
				}
			}); 
        });

 		function pilih_tahun(a){
            location.assign("{{url('home')}}?tahun="+a);
        }
		/*
		Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
		Version: 4.6.0
		Author: Sean Ngu
		Website: http://www.seantheme.com/color-admin/admin/
		*/

		


		var handleBarChart = function() {
			"use strict";

			var barChartData = [{
				key: 'Cumulative Return',
				values: [
					@foreach(opd1_get(1) as $opd)
							{ 'label' : '{{$opd->name}}', 'value' : {{total_nilai_opd_parameter($opd->id,$tahunini)}}, 'color' : "#40c1c1" }, 
					@endforeach
					
				]
				
			}];

			nv.addGraph(function() {
				var barChart = nv.models.discreteBarChart()
				.x(function(d) { return d.label })
				.y(function(d) { return d.value })
				.showValues(true)
				.duration(250);

				barChart.yAxis.axisLabel("Total Nilai");
				barChart.xAxis.axisLabel('Tingkat Dinas 1');

				d3.select('#nv-bar-chart').append('svg').datum(barChartData).call(barChart);
				nv.utils.windowResize(barChart.update);

				return barChart;
			});
		}
		var handleBarChart2 = function() {
			"use strict";

			var barChartData = [{
				key: 'Cumulative Return',
				values: [
					@foreach(opd1_get(2) as $opd)
							{ 'label' : '{{$opd->name}}', 'value' : {{total_nilai_opd_parameter($opd->id,$tahunini)}}, 'color' : "blue" }, 
					@endforeach
					
				]
				
			}];

			nv.addGraph(function() {
				var barChart = nv.models.discreteBarChart()
				.x(function(d) { return d.label })
				.y(function(d) { return d.value })
				.showValues(true)
				.duration(250);

				barChart.yAxis.axisLabel("Total Nilai");
				barChart.xAxis.axisLabel('Tingkat Dinas 2');

				d3.select('#nv-bar-chart2').append('svg').datum(barChartData).call(barChart);
				nv.utils.windowResize(barChart.update);

				return barChart;
			});
		}
		var handleBarChart3 = function() {
			"use strict";

			var barChartData = [{
				key: 'Cumulative Return',
				values: [
					@foreach(opd1_get(3) as $opd)
							{ 'label' : '{{$opd->name}}', 'value' : {{total_nilai_opd_parameter($opd->id,$tahunini)}}, 'color' : "orange" }, 
					@endforeach
					
				]
				
			}];

			nv.addGraph(function() {
				var barChart = nv.models.discreteBarChart()
				.x(function(d) { return d.label })
				.y(function(d) { return d.value })
				.showValues(true)
				.duration(250);

				barChart.yAxis.axisLabel("Total Nilai");
				barChart.xAxis.axisLabel('Tingkat Kecamatan');

				d3.select('#nv-bar-chart3').append('svg').datum(barChartData).call(barChart);
				nv.utils.windowResize(barChart.update);

				return barChart;
			});
		}




		var ChartNvd3 = function () {
			"use strict";
			return {
				//main function
				init: function () {
					handleBarChart();
					handleBarChart2();
					handleBarChart3();
				}
			};
		}();

		var handleBarChartdetail = function() {
			"use strict";
			
			var options = {
				chart: {
					height: 1500,
					type: 'bar',
				},
				plotOptions: {
					bar: {
						horizontal: true,
						dataLabels: {
							position: 'top',
						},
					}  
				},
				dataLabels: {
					enabled: true,
					offsetX: -6,
					style: {
						fontSize: '10px',
						colors: [COLOR_WHITE]
					}
				},
				colors: [COLOR_ORANGE, "blue"],
				stroke: {
					show: true,
					width: 1,
					colors: [COLOR_WHITE]
				},
				series: [{
					name:{{$tahunini}},
					data: [
						@foreach(opd_get() as $opd)
							{{total_nilai_opd_parameter($opd->id,$tahunini)}},
						@endforeach
					]
					},{
					name:{{$tahunkemaren}},
					data: [
						@foreach(opd_get() as $opd)
							{{total_nilai_opd_parameter($opd->id,$tahunkemaren)}},
						@endforeach
					]
				}],
				xaxis: {
					categories: [
						@foreach(opd_get() as $opd)
							'{{$opd->name}}',
						@endforeach
					],
					axisBorder: {
						show: true,
						color: COLOR_SILVER_TRANSPARENT_5,
						height: 1,
						width: '100%',
						offsetX: 0,
						offsetY: -1
					},
					axisTicks: {
						show: true,
						borderType: 'solid',
						color: "blue",
						height: 6,
						offsetX: 0,
						offsetY: 0
					}
				}
			};
			
			var chart = new ApexCharts(
				document.querySelector('#apex-bar-chart'),
				options
			);

			chart.render();
		};

		var ChartApex = function () {
			"use strict";
			return {
				//main function
				init: function () {
					handleBarChartdetail();
				}
			};
		}();

		$(document).ready(function() {
			ChartNvd3.init();
			ChartApex.init();
		});

	</script>
@endpush