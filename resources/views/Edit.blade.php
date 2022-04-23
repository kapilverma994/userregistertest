@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' User Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

  
           <form method="POST" action="{{ route('user.update',$data->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  name="name" value="{{ $data->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{ $data->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


              

               <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Image</label>

                            <div class="col-md-6">
                                <input id="password" type="file" class="form-control " name="image"  >

                                @error('image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
       <img src="{{ asset('public/image/'.Auth::user()->image) }}" alt="" class="img-thumbnail">
                        
                        </div>
            
               <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Hobbies</label>

                            <div class="col-md-6 mt-2 d-flex justify-content-around">
                                    <label><input type="checkbox" name="hobby[]" value="Dance"  {{in_array("Dance",explode(',',$data->hobby))?'checked':''}} > Dance</label>
                                <label><input type="checkbox" name="hobby[]" value="Yoga"  {{in_array("Yoga",explode(',',$data->hobby))?'checked':''}}> Yoga</label>
                                <label><input type="checkbox" name="hobby[]" value="Cooking"  {{in_array("Cooking",explode(',',$data->hobby))?'checked':''}}> Cooking</label>
                                <label><input type="checkbox" name="hobby[]" value="Blogging"  {{in_array("Blogging",explode(',',$data->hobby))?'checked':''}}> Blogging</label>
                                

                                @error('hobby')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
