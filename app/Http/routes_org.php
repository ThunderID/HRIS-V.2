<?php

Route::group(['namespace' => 'Org\\'], function()
{
	Route::resource('/org', 		'OrgController',		['names' => ['index' => 'org.index', 'create' => 'org.create', 'store' => 'org.store', 'show' => 'org.show', 'edit' => 'org.edit', 'update' => 'org.update', 'destroy' => 'org.destroy']]);
});
