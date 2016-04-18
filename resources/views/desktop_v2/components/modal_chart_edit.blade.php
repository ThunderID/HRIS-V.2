<!-- Modal -->
<div id="chart_edit" class="modal fade  padding-top-58" role="dialog">
	 <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="ion-android-close"></i></button>
				<div class="font-18 modal_title text-uppercase"></div>
			</div>
			<div class="modal-body">
				<!-- <p class="danger text-center">Error apa gitu</p> -->
				<form action="{{$modal_route}}" method="PATCH" class="modal2">
					<input name="id" type="hidden" class="mod_id">
					<input name="chart_id" type="hidden" class="modal_chart_id">

					<fieldset class="form-group">
						<label for="parent">Atasan</label>
						<input name="parent" readonly="true" class="form-control modal_parent">
					</fieldset>

					 <fieldset class="form-group">
						<label for="name">Jabatan</label>
						<input name="name" class="form-control modal_name">
					</fieldset>
				
					<fieldset class="form-group">
						<label for="department">Department</label>
						<input name="department" class="form-control modal_department">
					</fieldset>

					</br>
					<div class="form-group text-xs-right">
						<button type="button" class="button-gray" tabindex="2" data-dismiss="modal">Batal</button>
						<button type="submit" class="button-blue" tabindex="1">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
