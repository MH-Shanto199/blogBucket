@extends('appLayout')

@section('title', 'BlockBucket')

@section('content')
    <x-navbar/>

        <div class="container my-5">
            <div class="row">
                <x-posts.post/>
                <x-posts.post/>
                <x-posts.post/>
                <x-posts.post/>
                <x-posts.post/>
                <x-posts.post/>
                <x-posts.post/>
                <x-posts.post/>
                <x-posts.post/>
            </div>
        </div>

    <x-footer/>
@endsection