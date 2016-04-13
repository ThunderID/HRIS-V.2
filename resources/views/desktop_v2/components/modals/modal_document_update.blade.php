@inject('documents', 'App\API\Connectors\APIEmployee')
<?php
	$documents 			= $documents->getDocumentTemplates();
?>
<!-- Modal -->
<div id="document_update" class="modal fade padding-top-58" role="dialog">
	 <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="ion-android-close"></i></button>
				<a  class="document_back link-blue font-size-13" href="#template"><i class="ion-android-arrow-back"></i></a>&nbsp;
				<span class="font-18 modal_document_secondary_title text-uppercase"></span>
				<span class="font-18 modal_document_title text-uppercase"></span>
			</div>
			<div class="modal-body">
				<!-- <p class="danger text-center">Error apa gitu</p> -->
				@foreach($documents['data']['templates'] as $key => $value)
					<div class="row document_click">
						<div class="col-sm-12 text-xs-center">
							<a class="link-black text-uppercase document_click" data-code="{{$key}}">
								<div class="link-square-white-border-gray">
									{{str_replace('_', ' ', $key)}}
								</div>
							</a>
						</div>
					</div>
					<div class="clearfix document_click">&nbsp;</div>
					<div class="document_form document_{{$key}}_form">
						<form action="{{$modal_route}}" method="POST" class="modal_document_update">
							<input name="id" type="hidden" class="mod_id">
							<input name="person_id" type="hidden" class="modal_personid">
							<input name="documents[code]" type="hidden" class="modal_code">

							<!-- <div class="row">
								<div class="col-sm-12">
									<div class="font-size-14 padding-bottom-15 padding-top-15">
										<strong>Isi {{$key}}</strong>
									</div>
								</div>
							</div> -->
							@foreach($value as $key2 => $value2)
								<div class="row">
									<div class="col-sm-12">
										<fieldset class="form-group">
											<label for="documents{{$value2}}">{{ucwords(str_replace('_', ' ', $value2))}}</label>
											<input name="documents[document][{{$value2}}]" class="form-control modal_documents_{{$value2}}" id="documents{{$value2}}" placeholder="Masukkan {{str_replace('_', ' ', $value2)}}">
										</fieldset>
									</div>
								</div>
							@endforeach

							<div class="row">
								<div class="col-sm-12">
									<div class="form-group text-xs-right">
										<button type="button" class="button-gray document_cancel" data-dismiss="modal">Batal</button>
										<button type="button" class="button-gray document_back" tabindex="2">Batal</button>
										<button type="submit" class="button-blue" tabindex="1">Simpan</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				@endforeach
					
			</div>
		</div>
	</div>
</div>
