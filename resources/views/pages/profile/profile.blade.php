@extends('appLayout')

@section('title', 'Profile')

@section('content')
    <x-navbar/>
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img class="img-fluid" style="max-width: 100%" src="https://via.placeholder.com/350" alt="">
            </div>
            <div class="offset-md-1 col-md-6 border-start">
                <a href="{{ route('profile.edit', $user->id) }}" class="top-right-position btn btn-primary">Edit Profile</a>
                <ul class="user-data">
                    <li> Name: <span>{{ $user->name }}</span></li>
                    <li>E-mail: <span>{{ $user->email }}</span></li>
                    <li>Age: <span>{{ is_numeric($user->age)?$user->age:'Unknown'}}</span></li>
                    <li>Address: <span>{{ is_string($user->address)?$user->address:'Unknown' }}</span></li>
                    <li>Education: <span>{{ is_string($user->education)?$user->education:'Unknown' }}</span></li>
                    <li class="text-center my-5">
                        <h3 class="border-bottom pb-2">Bio</h3>
                        <span>{{ is_string($user->bio)?$user->bio:'bio is not defined' }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-5">
            <h2 class="user-data border-bottom pb-3 mb-4">The posts were written by MH Shanto</h2>
            <x-posts.post/>
            <x-posts.post/>
            <x-posts.post/>
            <x-posts.post/>
            <x-posts.post/>
        </div>
    </div>
    <x-footer/>
@endsection