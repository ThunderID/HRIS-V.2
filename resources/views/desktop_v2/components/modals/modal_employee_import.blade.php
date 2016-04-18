<!-- Modal -->
<div id="{{$modal_emp_id}}" class="modal fade padding-top-58" role="dialog">
	 <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="ion-android-close"></i></button>
				<div class="font-18 modal_title text-uppercase"></div>
			</div>
			<div class="modal-body">
				<!-- <p class="danger text-center">Error apa gitu</p> -->
				<form action="{{$modal_route}}" method="POST" class="modal_employee_import"  enctype="multipart/form-data">

					<div class="row">
						<div class="col-sm-12">
							<div class="font-size-14 padding-bottom-15 padding-top-15">
								<strong>Import Document</strong>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<fieldset class="form-group">
								<input type="file" name="employee" class="form-control modal_relative_name" id="employeeimport">
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
