@extends('layouts.app')

@section('content')
<div class="card border-light mb-3" style="">
    <div class="card-body d-flex justify-content-center">
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="mb-3">
                @if(session()->has('status'))
                    {{session('status')}}
                @endif
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" value ="{{old('email')}}" aria-describedby="emailHelp">
              @error('email')
              <div class="text-danger">
                  {{$message}}
              </div>                
            @enderror
            </div>
           
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" value ="{{old('password')}}" id="exampleInputPassword1">
              @error('password')
              <div class="text-danger">
                  {{$message}}
              </div>                
            @enderror
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection
