<div class="row">
	<div class="col-sm-12 padding-right-30">
		<div class="padding-top-15 font-size-18 padding-bottom-10">Profil </div>
		<div class="slim-scroll">
			<div class="row">
				<div class="col-xs-6">
					<div class="card">
						<div class="card-header background-dark-blue font-white">
							Sisa Cuti
						</div>
						<div class="card-block background-blue">
							<blockquote class="card-blockquote">
								<div class="font-size-18 font-red"><i><small>-</small></i></div>
							</blockquote>
						</div>
					</div>
				</div>	
				<div class="col-xs-6">
					<div class="card">
						<div class="card-header background-dark-blue font-white">
							Kelas Jabatan
						</div>
						<div class="card-block background-blue">
							<blockquote class="card-blockquote">
								<div class="font-size-18 font-white">@number($page_datas->datas['employee']['newest_grade'])</div>
							</blockquote>
						</div>
					</div>
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-6">
					<div class="card">
						<div class="card-header background-dark-blue font-white">
							Time Loss Rate
						</div>
						<div class="card-block background-blue">
							<blockquote class="card-blockquote">
								<div class="font-size-18 font-red"><i><small>-</small></i></div>
							</blockquote>
						</div>
					</div>
				</div>	
				<div class="col-xs-6">
					<div class="card">
						<div class="card-header background-dark-blue font-white">
							Masa Bekerja
						</div>
						<div class="card-block background-blue">
							<blockquote class="card-blockquote">
								<div class="font-size-18 font-white">@number(Carbon\Carbon::parse($page_datas->datas['employee']['work_period'][0])->diffInMonths(Carbon\Carbon::parse($page_datas->datas['employee']['work_period'][1]))) Bulan</div>
							</blockquote>
						</div>
					</div>
				</div>	
			</div>

			<div class="row">
				<div class="col-xs-12">
					<h6 class="font-dark-blue padding-bottom-10 padding-top-15">Profil Karyawan</h6>
				</div>
				<div class="col-xs-6">
					<label>Jenis Kelamin :</label>
					<p>{{$page_datas->datas['employee']['gender']}}</p>
					<label>Umur :</label>
					<p>{{Carbon\Carbon::parse($page_datas->datas['employee']['date_of_birth'])->diffInYears(Carbon\Carbon::now())}} Tahun</p>
					<label>TTL :</label>
					<p>{{$page_datas->datas['employee']['place_of_birth']}} , {{Carbon\Carbon::parse($page_datas->datas['employee']['date_of_birth'])->format('d M Y')}}</p>
				</div>
				<div class="col-xs-6">
					<label>Status Perkawinan :</label>
					<p>{{$page_datas->datas['employee']['current_marital_status']}}</p>
					<label>Alamat :</label>
					<p>{{$page_datas->datas['employee']['address']}}</p>
				</div>
			</div>
		</div>
	</div>
</div>