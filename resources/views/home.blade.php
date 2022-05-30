@extends('layouts.base')

@section('content')

<div id="app" class="d-block mx-auto col-8 bg-light border border-dark rounded my-4">

    <nav class='d-flex col-10 justify-content-center flex-row gap-3'>

        <router-link to="/" class="my-5 mx-1">
            <h1>Products</h1>
        </router-link>

        <router-link to="/create" class="my-5 mx-1">
            <h1>Create</h1>
        </router-link>

        <router-link to="/edit" class="my-5 mx-1">
            <h1>Edit</h1>
        </router-link>

    </nav>

</div>

<router-view></router-view>

@endsection