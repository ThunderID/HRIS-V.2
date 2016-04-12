<div class="row">
	<div class="col-sm-12">
		<div class="font-size-14 padding-bottom-15 padding-top-15">
			<strong>Penempatan</strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<fieldset class="form-group">
			<label for="employeenik">NIK</label>
			<input name="works[0][nik]" value="{{$page_datas->datas['employee']['nik']}}" class="form-control" id="employeenik" placeholder="Masukkan nik karyawan">
		</fieldset>
	</div>
	<div class="col-sm-6">
		<fieldset class="form-group">
			<label for="employeework">Jabatan</label>
				<select name="works[0][chart_id]" class="select-chart form-control" data-route="{{route('ajax.organisation.charts', ['id' => $page_datas->datas['id']])}}"></select>
		</fieldset>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<fieldset class="form-group">
			<label for="employeeworkgrade">Kelas Jabatan</label>
			<input name="works[0][grade]" value="{{$page_datas->datas['employee']['newest_grade']}}" class="form-control" id="employeeworkgrade" placeholder="Masukkan grade karyawan">
		</fieldset>
	</div>
	<div class="col-sm-6">
		<fieldset class="form-group">
			<label for="employeeworkstatus">Status Kerja</label>
			<input name="works[0][status]" value="{{$page_datas->datas['employee']['newest_work_status']}}" class="form-control" id="employeeworkstatus" placeholder="Masukkan status kerja karyawan">
		</fieldset>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<fieldset class="form-group">
			<label for="employeeworkstart">Tanggal Status Kerja Mulai</label>
			<input name="works[0][start]" value="{{$page_datas->datas['employee']['newest_work_start']}}" class="form-control" id="employeeworkstart" placeholder="Masukkan tanggal mulai status kerja karyawan">
		</fieldset>
	</div>
	<div class="col-sm-6">
		<fieldset class="form-group">
			<label for="employeeworkend">Tanggal Status Kerja Berakhir</label>
			<input name="works[0][end]" value="{{$page_datas->datas['employee']['newest_work_end']}}" class="form-control" id="employeeworkend" placeholder="Masukkan tanggal mulai status kerja karyawan">
		</fieldset>
	</div>
</div>