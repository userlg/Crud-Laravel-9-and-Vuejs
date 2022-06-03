@extends('layouts.base')

@section('title','CRUD LARAVEL | VUEJS')

@section('content')
<div class="l-font">
    Products
</div>

<div id="app" class="d-block mx-auto col-8 col-md-10 col-sm-10 col-lg-10 bg-light border border-dark rounded my-4">

    <nav class='d-flex col-10 col-sm-6 justify-content-center flex-row gap-3 mx-auto align-items-center mx-auto'>

        <router-link to="/" class="mx-1">
            <h1>List</h1>
        </router-link>

        <router-link to="/create" class="mx-1">
            @csrf
            <h1>Create</h1>
        </router-link>

        <router-link to="/edit" class="mx-1">
            <h1>Edit</h1>
        </router-link>

    </nav>
    <router-view></router-view>
</div>



@endsection