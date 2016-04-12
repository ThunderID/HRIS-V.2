<!-- Modal -->
<div id="work_update" class="modal fade padding-top-58" role="dialog">
	 <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="ion-android-close"></i></button>
				<div class="font-18 modal_title text-uppercase"></div>
			</div>
			<div class="modal-body">
				<!-- <p class="danger text-center">Error apa gitu</p> -->
				<form action="{{$modal_route}}" method="POST" class="modal_work_update">
					<input name="id" type="hidden" class="mod_id">
					<input name="person_id" type="hidden" class="modal_personid">

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
								<input name="nik" class="form-control modal_nik" id="employeenik" placeholder="Masukkan nik karyawan">
							</fieldset>
						</div>
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="employeework">Jabatan</label>
								<select name="chart_id" class="select-chart form-control" data-route="{{$modal_route}}" style="width:100%;">
								</select>
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="employeeworkgrade">Kelas Jabatan</label>
								<input name="grade" class="form-control modal_grade" id="employeeworkgrade" placeholder="Masukkan grade karyawan">
							</fieldset>
						</div>
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="employeeworkstatus">Status Kerja</label>
								<input name="status" class="form-control modal_status" id="employeeworkstatus" placeholder="Masukkan status karyawan">
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="employeeworkstart">Tanggal Status Kerja Mulai</label>
								<input name="start" class="form-control modal_start" id="employeeworkstart" placeholder="Masukkan start karyawan">
							</fieldset>
						</div>
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="employeeworkend">Tanggal Status Kerja Berakhir</label>
								<input name="end" class="form-control modal_end" id="employeeworkend" placeholder="Masukkan end karyawan">
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<fieldset class="form-group">
								<label for="employeeworkreason">Alasan Berhenti Bekerja</label>
								<textarea name="employeeworkreason" class="form-control modal_reason" id="employeeworkendreason">
								</textarea>
							</fieldset>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group text-xs-right">
								<button type="button" class="button-gray" tabindex="2" data-dismiss="modal">Batal</button>
								<button type="submit" class="button-blue" tabindex="1">Simpan</button>
							</div>
						</div>
					</div>
				
				</form>
			</div>
		</div>
	</div>
</div>
