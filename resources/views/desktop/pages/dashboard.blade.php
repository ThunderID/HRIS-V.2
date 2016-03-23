<?php
	// var_dump($page_attributes);
	// var_dump($page_datas);
	// exit;
?>

@extends('desktop.page_templates.dashboard')

@section('content')</br>
</br>
</br>
</br>
</br>
<h2>desktop</h2>

<div class="row">
<div class="col-md-12">
{{$page_datas->paging->render()}}
</div>
</div>
@stop

@section('js')
<script>
Person = function(name) {
    this._name = name;
};
Person.prototype = new EventObject;
Person.prototype.GetName = function() {
    return this._name;
};
Person.prototype.SetName = function(value) {
    this._name = value;
}; 

var myPerson = new Person("John McCain");

// Get the Name currently set
alert(myPerson.GetName());

// Set the Name Property to a different name
myPerson.SetName("Barack Obama");

// Get the Name currently set
alert(myPerson.GetName()); 
</script>
@stop