@extends('layouts.app')
	<form action="/upload/file" method="POST" enctype="multipart/form-data">
		<input type="file" name="file"></input>
		<input type="submit">submit</input>
	</form>