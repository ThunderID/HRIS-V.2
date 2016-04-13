<!-- Modal -->
<div id="relative_update" class="modal fade padding-top-58" role="dialog">
	 <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="ion-android-close"></i></button>
				<div class="font-18 modal_title text-uppercase"></div>
			</div>
			<div class="modal-body">
				<!-- <p class="danger text-center">Error apa gitu</p> -->
				<form action="{{$modal_route}}" method="POST" class="modal_relative_update">
					<input name="id" type="hidden" class="mod_id">
					<input name="person_id" type="hidden" class="modal_personid">
					<input name="relative_id" type="hidden" class="modal_relativeid">

					<div class="row">
						<div class="col-sm-12">
							<div class="font-size-14 padding-bottom-15 padding-top-15">
								<strong>Profil</strong>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<fieldset class="form-group">
								<label for="relativename">Nama</label>
								<input name="relative[name]" class="form-control modal_relative_name" id="relativename" placeholder="Masukkan nama">
							</fieldset>
						</div>
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="relativeplaceofbirth">Tempat Lahir</label>
								<input name="relative[place_of_birth]" class="form-control modal_relative_place_of_birth" id="relativeplaceofbirth" placeholder="Masukkan tempat lahir">
							</fieldset>
						</div>
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="relativedateofbirth">Tanggal Lahir</label>
								<input name="relative[date_of_birth]" class="form-control modal_relative_date_of_birth" id="relativedateofbirth" placeholder="Masukkan tanggal lahir">
							</fieldset>
						</div>
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="relativegender">Jenis Kelamin</label>
								<select name="relative[gender]" class="form-control modal_relative_gender" id="relativegender">
									<option value="male">
										Pria
									</option>
									<option value="female">
										Wanita
									</option>
								</select>
							</fieldset>
						</div>
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="relativerelationship">Hubungan</label>
								<input name="relationship" class="form-control modal_relationship" id="relativerelationship" placeholder="Masukkan hubungan">
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="font-size-14 padding-bottom-15 padding-top-15">
								<strong>Kontak</strong>
							</div>
						</div>
						<div class="col-sm-12">
							<fieldset class="form-group">
								<label for="relativephone">Telepon</label>
								<input name="relative[phone]" class="form-control modal_relative_phone" id="relativephone" placeholder="Masukkan nomor telepon">
							</fieldset>
						</div>
						<div class="col-sm-12">
							<fieldset class="form-group">
								<label for="relativeemail">Email</label>
								<input name="relative[email]" class="form-control modal_relative_email" id="relativeemail" placeholder="Masukkan email">
								<small class="text-muted">Email harus unik</small>
							</fieldset>
						</div>
						<div class="col-sm-12">
							<fieldset class="form-group">
								<label for="relativeaddress">Alamat</label>
								<textarea name="relative[address]" class="form-control modal_relative_address" id="relativeaddress" placeholder="Masukkan alamat">
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
