@extends('layouts.admin')
@section('meta_title')
	Dog Post	
@stop
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">User Detail 
	<a href="{{URL::route('change_password')}}" class="btn-link pull-right" title="Edit"><i class="fa fa-pencil fa-fw"></i>Change Password</a>
    </h3>
  </div>
	<div class="panel-body">
		<h4>
			<img src="{{Auth::user()->thumbnail_url}}" class="img-rounded">
			<span class="text-primary">{{Auth::user()->fullName()}}</span>
		</h4>
	</div>
	<table class="table">
		<thead width="100px">
			<td><strong>Email/User Name</strong></td>
			<td>{{Auth::user()->email}}</td>
		</thead>
		<tr>
			<th><strong>Password</strong></th>
			<td>✱✱✱✱✱✱✱✱✱✱✱✱✱✱<td>
		</tr>
	</table>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
	<a href="{{URL::route('change_address')}}" class="btn-link pull-right" title="Edit"><i class="fa fa-pencil fa-fw"></i>Edit Detail</a>
	Contact Detail
    </h3>
  </div>
  <div class="panel-body">
   <address> 
	<table class="table">
		<thead>
			<td width="200px"><strong>Address</strong></td>
			<td>{{Auth::user()->metadata->address}}</td>
		</thead>
		<tr>
			<th><strong>Suburb</strong></th>
			<td>{{Auth::user()->metadata->suburb}}</td>
		</tr>
		<tr>
			<th><strong>State</strong></th>
			<td>{{Auth::user()->metadata->state}}</td>
		</tr>
		<tr>
			<th><strong>Postcode</strong></th>
			<td>{{Auth::user()->metadata->postcode}}</td>
		</tr>
		<tr>
			<th><strong>Phone</strong></th>
			<td>{{Auth::user()->metadata->phone_no}}</td>
		</tr>
		<tr>
			<th><strong>Show detail in your posts</strong></th>
			<td>{{ (1 == Auth::user()->metadata->show_details) ? 'true' : 'false'}}</td>
		</tr>
	</table>
   </address>
  </div>
</div>
@stop

