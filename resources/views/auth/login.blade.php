@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center fs-2 fw-bold my-5">Login</div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card rounded-0 p-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="text" name="email" class="form-control border-1 rounded-0" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="password" name="password" class="form-control border-1 rounded-0 mt-2" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-check my-2 ml-1">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <button type="submit" class="btn btn-dark rounded-0 bg-theme" style="width: 100%">
                        {{ __('Login') }}
                    </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
