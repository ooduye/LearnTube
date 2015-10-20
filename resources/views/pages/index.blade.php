@extends('layouts.master')

@section('content')
<h1>Learning Management App for Human Beings</h1>

<p>The promise of LearnTube is simple. Learn different technologies on one screen without having to filter by team or users. Finally, learning management system built just for human beings. Very Intuitve, Slick and crafted with the power of Laravel</p>

<p><img src="{{ asset('images/learn.png') }}" /></p>

<a class="btn btn-large btn-info" href="#">Sign Up</a>

<p class="login">Already signed up? <a class="btn btn-large btn-info" href="#">Login</a></p>
@stop