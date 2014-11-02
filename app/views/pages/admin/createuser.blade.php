<!doctype html>
<html>
<head>
	<title>breeder creation page</title>
</head>
<body>
	{{Form::open(array('url' => 'createuser'))}}
		<h1>User Form</h1>
		
		<p>
			{{ $errors -> first('email')}}
			{{ $errors -> first('password')}}
			{{ $errors -> first('first_name')}}
			{{ $errors -> first('last_name')}}
		</p>
		<p>
			{{ Form::label('first_name', 'First Name')}}
			{{ Form::text ('first_name')}}
		</p>
		<p>
			{{ Form::label('last_name', 'Last Name')}}
			{{ Form::text ('last_name')}}
		</p>
		<p>
			{{ Form::label('email', 'Email Address') }}
			{{ Form::text 
			('email', Input::old('email'), 
			array('placeholder' => 'example@domain.com'))}}
		</p>
		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>
		<p>
			{{ Form::label('type', 'Breeder type') }}
			{{ Form::select('type', array('Dog'=> 'Dog', 'Cat' => 'Cat'), 'Dog')}}
		</p>
		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}

</body>
</html>
