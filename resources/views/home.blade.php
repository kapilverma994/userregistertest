@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show custom"   role="alert">
    {{Session::get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Hobbies</th>
      <th>Created At</th>
      <th >
          Action
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>
          <img src="{{ asset('public/image/'.Auth::user()->image) }}" alt="" class="img-thumbnail">
      </td>
      <td>{{Auth::user()->name}}</td>
      <td>{{Auth::user()->email}}</td>
      <td>{{Auth::user()->hobby}}</td>
      <td>{{Auth::user()->created_at->diffforhumans()}}</td>
  
  <td>
    <a class="btn btn-warning" href="{{route('user.edit',Auth::user()->id)}}" style="display:inline">Edit</a>
     
       <form action="{{route('user.delete',Auth::user()->id )}}" method="post" style="display:inline">
            @csrf
            @method('delete')
          
        </form>
         
      </td>
  
    
    </tr>
 
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
