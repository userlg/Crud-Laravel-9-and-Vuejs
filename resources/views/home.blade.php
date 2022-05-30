@extends('layouts.base')

@section('content')

<div id="app">

<nav>

<router-link to="/" class="my-5"><h1>Products</h1></router-link>

<router-link to="/edit" class="my-5"><h1>Edit</h1></router-link>

</nav>

</div>

<router-view></router-view>

@endsection
