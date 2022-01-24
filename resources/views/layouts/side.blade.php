				<ul class="nav">
                    <li class="nav-header">Navigation</li>
					<li class="lilinya">
                        <a href="{{url('/home')}}">
                            <i class="fas fa-home"></i>
                            <span>Home</span> 
                        </a>
                    </li>
					@if(Auth::user()->role_id==1)
                        
                        <li class="has-sub lilinya">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fa fa-cog"></i>
                                <span>Master </span>
                            </a>
                            <ul class="sub-menu" style="display: @if($side=='master') block @endif;">
                                <li>
                                    <a href="{{url('Pengguna')}}">User Akses</a>
                                </li>
                                <li>
                                    <a href="{{url('Opd')}}">OPD</a>
                                </li>
                            </ul>
                        </li>	
                        <!-- <li class="lilinya">
                            <a href="{{url('Lhe')}}">
                                <i class="fas fa-suitcase"></i>
                                <span>Komponen LKE</span> 
                            </a>
                        </li>
                        <li class="lilinya">
                            <a href="{{url('Kke1')}}">
                                <i class="fas fa-suitcase"></i>
                                <span>Komponen KKE1</span> 
                            </a>
                        </li>
                        <li class="lilinya">
                            <a href="{{url('Kke2')}}">
                                <i class="fas fa-suitcase"></i>
                                <span>Komponen KKE2</span> 
                            </a>
                        </li>
                        <li class="lilinya">
                            <a href="{{url('Kke31')}}">
                                <i class="fas fa-suitcase"></i>
                                <span>Komponen KKE3 IT</span> 
                            </a>
                        </li>
                        <li class="lilinya">
                            <a href="{{url('Kke32')}}">
                                <i class="fas fa-suitcase"></i>
                                <span>Komponen KKE3 IS</span> 
                            </a>
                        </li>
                        <li class="lilinya">
                            <a href="{{url('Kke33')}}">
                                <i class="fas fa-suitcase"></i>
                                <span>Komponen KKE3 IKU</span> 
                            </a>
                        </li> -->
                        <li class="has-sub lilinya">
                            <a href="{{url('Transaksilhe')}}">
                                <i class="fa fa-clipboard"></i>
                                <span>Draf LKE </span>
                            </a>
                        </li>
                        <li class="has-sub lilinya">
                            <a href="{{url('Transaksilherekap')}}">
                                <i class="fa fa-archive"></i>
                                <span>Rekapitulasi Nilai </span>
                            </a>
                        </li>
                        <li class="has-sub lilinya">
                            <a href="{{url('Transaksilhe/inspektorat')}}">
                                <i class="fa fa-clone"></i>
                                <span>LHE Inspektorat </span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->role_id==2)
                        <li class="has-sub lilinya">
                            <a href="{{url('Transaksilhe')}}">
                                <i class="fa fa-clipboard"></i>
                                <span>Draf LKE </span>
                            </a>
                        </li>	
                        
                        <li class="has-sub lilinya">
                            <a href="{{url('Transaksilherekap')}}">
                                <i class="fa fa-archive"></i>
                                <span>Rekapitulasi Nilai </span>
                            </a>
                        </li>
                        <li class="has-sub lilinya">
                            <a href="{{url('Transaksilhe/inspektorat')}}">
                                <i class="fa fa-clone"></i>
                                <span>LHE Inspektorat </span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->role_id>6)
                        <li class="has-sub lilinya">
                            <a href="{{url('Transaksilhe')}}">
                                <i class="fa fa-clipboard"></i>
                                <span>Draf LKE </span>
                            </a>
                        </li>	
                        
                        <li class="has-sub lilinya">
                            <a href="{{url('Transaksilherekap')}}">
                                <i class="fa fa-archive"></i>
                                <span>Rekapitulasi Nilai </span>
                            </a>
                        </li>
                        <li class="has-sub lilinya">
                            <a href="{{url('Transaksilhe/inspektorat')}}">
                                <i class="fa fa-clone"></i>
                                <span>LHE Inspektorat </span>
                            </a>
                        </li>	
                    @endif

                    @if(Auth::user()->role_id==3)
                        <li class="has-sub lilinya">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fa fa-cog"></i>
                                <span>Penyusunan KKE </span>
                            </a>
                            <ul class="sub-menu" style="display: @if($side=='master') block @endif;">
                                <li>
                                    <a href="{{url('Kke1')}}">KKE1 Capaian</a>
                                </li>
                                <li>
                                    <a href="{{url('Kke2')}}">KKE2A TS</a>
                                </li>
                                <li>
                                    <a href="{{url('Kke31')}}">KKE3A IT</a>
                                </li>
                                <li>
                                    <a href="{{url('Kke32')}}">KKE3A IS</a>
                                </li>
                                <li>
                                    <a href="{{url('Kke33')}}">KKE3A IKU</a>
                                </li>
                            </ul>
                        </li>	
                        <li class="has-sub lilinya">
                            <a href="{{url('Transaksilhe')}}">
                                <i class="fa fa-clipboard"></i>
                                <span>Draf LKE </span>
                            </a>
                        </li>	
                        @if(akses_opd()==21)
                        <li class="has-sub lilinya">
                            <a href="{{url('Dokumennya')}}">
                                <i class="fa fa-clipboard"></i>
                                <span>Dokumen RPJMD </span>
                            </a>
                        </li>
                        @endif
                    @endif
				
					
					
					
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
			</ul>