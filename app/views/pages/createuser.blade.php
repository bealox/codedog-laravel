@extends('layouts.simple_default')
@section('meta_title')
	Login
@stop
@section('external')
	{{HTML::script('js/utils.js')}}
	{{HTML::script('https://www.google.com/recaptcha/api.js')}}
	{{HTML::style('css/utils.css')}}
	{{HTML::style('packages/select/select2.css')}}
	{{HTML::script('packages/select/select2.js')}}
@stop


@section('content')
	{{Form::open(array('url' => 'register', 'class' => 'pure-form pure-form-aligned'))}}
<div class="row">
	<div class="col-md-12 col-md-offset-1">
		<h2>New User Form </h2>
	</div>
	<div class="col-md-5 col-md-offset-1">
			<div class="form-group">
				<label> First Name </label>
				{{ Form::text ('first_name',"", array('placeholder' => 'First Name', 'required', 'class' => 'form-control'))}}
			</div>
	</div>
	<div class="col-md-5">
			<div class="form-group">
				<label>Last Name</label>
				{{ Form::text ('last_name',"", array('placeholder' => 'Last Name', 'required', 'class' => 'form-control'))}}
			</div>
	</div>
	<div class="col-md-5 col-md-offset-1">
			<div class="form-group">
				<label> Email address </label>
				{{ Form::text 
				('email', Input::old('email'), 
				array('placeholder' => 'example@domain.com', 'required', 'class' => 'form-control'))}}
			</div>
	</div>
	<div class = "col-md-5">
			<div class="form-group">
				<label class="control-label">Postcode</label>
				<input type="hidden" id="e1" name="postcode" required class="form-control"></input>
			</div>
	</div>
	<div class="col-md-5 col-md-offset-1">
			<div class="form-group">
				<label class="control-label"> Password </label>
				{{ Form::password('password', array('placeholder' => 'Password', 'required', 'class'=> 'form-control')) }}
			</div>
	</div>
	<div class="col-md-5">
			<div class="form-group">
				<label> Password Confirmation</label>
				{{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'required', 'class' => 'form-control')) }}
			</div>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<label>Term And Conditions 
		</label>

		<div class="panel panel-default">
		  <div class="panel-body pre-scrollable">
		1914 translation by H. Rackham

"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"<br/>

Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

e srerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."<br/><br/>
		  </div>
		</div>
		<label class="pure-checkbox">
			<input type="checkbox" required>agree
		</label>

	</div>
	<div class="col-md-5 col-md-offset-1">
		<div class="g-recaptcha" data-sitekey="6Ldc5v4SAAAAALJ_2fquUl_7z13tTugj3oPo-ikb" style="display:inline-block;"></div>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Submit">
	</div>
</div>
			<p>{{Form::hidden('latitude', '',array('id'=>'latitude'))}}</p>
			<p>{{Form::hidden('longitude', '',array('id'=>'longitude'))}}</p>
			<p>{{Form::hidden('postcode_id', '',array('id'=>'postcode_id'))}}</p>
			<p>{{Form::hidden('suburb', '',array('id'=>'suburb'))}}</p>
			<p>{{Form::hidden('state', '',array('id'=>'state'))}}</p>
	{{ Form::close() }}
@stop
