<?php

Route::group(['namespace' => 'Org\\'], function()
{
	Route::resource('/org/{org_id?}/calendar',	'CalendarController',	['names' => ['index' => 'calendar.index', 'create' => 'calendar.create', 'store' => 'calendar.store', 'show' => 'calendar.show', 'edit' => 'calendar.edit', 'update' => 'calendar.update', 'destroy' => 'calendar.destroy']]);
});
