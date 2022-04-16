@extends('appLayout')

@section('title', 'Edit Profile')

@section('content')
    <x-navbar/>
    <div class="container">
        <div class="row my-5">
            <div class="m-auto col-md-10">
                <div class="card">
                    @extends('layouts.notify')
                    <h3 class="border-bottom p-4">Edit Your Profile</h3>
                    <div class="card-body">
                        <form action="{{ route('profile.update', $user->id ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center mb-5">
                                    <img class="img-fluid" id="previw" src="https://via.placeholder.com/350" alt="">
                                    <button type="button" class="btn btn-primary w-75 mt-4" id="btn">Select Picture</button>
                                    <input type="file" name="image" id="image" class="invisible">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input 
                                            type="text" 
                                            class="form-control"
                                            placeholder="Your Name"
                                            name="name"
                                            value="{{ $user->name }}"
                                            required
                                        >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input 
                                            type="email" 
                                            class="form-control"
                                            placeholder="Your Email"
                                            name="email"
                                            value="{{ $user->email }}"
                                            required
                                        >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input 
                                            type="number"
                                            class="form-control"
                                            min="18"
                                            step="1"
                                            name="age"
                                            value="{{ $user->age }}"
                                            required
                                        >
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input 
                                            type="text" 
                                            class="form-control"
                                            placeholder="Your Address"
                                            name="address"
                                            value="{{ $user->address }}"
                                            required
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="education" class="form-label">Education</label>
                                        <input 
                                            type="text" 
                                            class="form-control"
                                            name="education"
                                            placeholder="Your Education"
                                            value="{{ $user->education }}"
                                            required
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea name="bio" class="form-control" required >{{ $user->bio }}</textarea>
                            </div>
                            <div class="offset-md-8 col-md-4 text-end">
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('btn').addEventListener("click", function callInputFile() {
            document.getElementById('image').click();
        });
        var uploaded_image = "";
        document.getElementById('image').addEventListener("change", function () {
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                uploaded_image = reader.result;
                document.getElementById('previw').src = uploaded_image;
            })
            reader.readAsDataURL(this.files[0])
        })

    </script>
@endsection