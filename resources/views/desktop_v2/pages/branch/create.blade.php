@extends('desktop_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Branch Index -->
<div class="row">
	<div class="col-md-3">
		@include('desktop_v2.components.grand_search_box', ['search_name' => 'q', 'search_placeholder' => 'Cari Cabang', 'background_search_box' => 'background-light-blue', 'font_search_box' => 'font-dark-blue'])
		<div class="background-white slim-scroll">
			<!-- Content -->
			<div class="row">
				@forelse($page_datas->datas['branches'] as $key => $dt)

				<div class="col-sm-12">
					@include('desktop_v2.components.card_plain', ['card_content' => $dt])
				</div>
				
				@empty
					<div class="col-md-12 col-sm-12">
						<p class="background-white padding-15">Tidak ada data cabang</p>
					</div>
				@endforelse
			</div>
			<!-- End of Content -->			
		</div>
	</div>
	<div class="col-md-9 margin-left-negative-10">
		<div class="row background-shade-blue text-xs-right">
			@include('desktop_v2.components.secondary_navbar', ['action_create_id' => $page_datas->datas['branch']['id'], 'action_store_route' => route('branch.store', ['org_id' => $page_datas->datas['id']]), 
			'action_update_route' => route('branch.update', ['org_id' => $page_datas->datas['id'], 'branch' => $page_datas->datas['branch']['id']]),
			'action_redirect_route' => route('branch.index', ['org_id' => $page_datas->datas['id']])
			])
		</div>
		<div class="row background-white">
			<div class="col-sm-12 padding-15">
				<div class="font-size-25 padding-bottom-15">
					{{(($page_datas->datas['branch']['id']!='') ? $page_datas->datas['branch']['name'] : 'Tambah Kantor Baru')}}
				</div>
				@include('desktop_v2.components.alert_box')
				 <fieldset class="form-group">
					<label for="branchname">Nama Kantor</label>
					<input name="name" value="{{$page_datas->datas['branch']['name']}}" class="form-control" id="branchname" placeholder="Masukkan nama kantor">
				</fieldset>
				<fieldset class="form-group">
					<label for="branchphone">Telepon</label>
					<input name="phone" value="{{$page_datas->datas['branch']['phone']}}" class="form-control" id="branchphone" placeholder="Masukkan telepon kantor">
				</fieldset>
				<fieldset class="form-group">
					<label for="branchmail">Email</label>
					<input name="mail" value="{{$page_datas->datas['branch']['email']}}" class="form-control" id="branchmail" placeholder="Masukkan email kantor">
					<small class="text-muted">Email harus unik</small>
				</fieldset>
				<fieldset class="form-group">
					<label for="branchaddress">Alamat</label>
					<textarea name="address" class="form-control" id="branchaddress" placeholder="Masukkan alamat kantor cabang">
						{{$page_datas->datas['branch']['address']}}
					</textarea>
				</fieldset>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>

<!-- End of Branch Index -->
@stop

@section('js')
	<script type="text/javascript">
		hris_slimscroll.init();
	</script>
@stop