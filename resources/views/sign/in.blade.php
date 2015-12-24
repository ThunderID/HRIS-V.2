@extends('layout.full')

@section('content')
	<div class="account-container">
		<div class="content clearfix">
			<form action="#" method="post">
				<h1>Login</h1>		
				<div class="login-fields">
					<br/>
					<!-- <p>Please provide your details</p> -->
					<div class="field">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
					</div> <!-- /field -->
					
					<div class="field">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
					</div> <!-- /password -->
				</div> <!-- /login-fields -->
				
				<div class="login-actions">
					<span class="login-checkbox">
						<a href="#">Reset Password</a>
					</span>
										
					<button class="button btn btn-success btn-large">Sign In</button>
					
				</div> <!-- .actions -->
			</form>
		</div> <!-- /content -->
	</div> <!-- /account-container -->
@stop