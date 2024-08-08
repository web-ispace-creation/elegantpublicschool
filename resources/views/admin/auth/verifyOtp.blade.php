@extends('admin.layout')

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify OTP') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('admin.verifyOtp')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="otp" class="col-md-4 col-form-label text-md-end">{{ __('Enter OTP') }}</label>
                            <div class="col-md-6">
                                <input id="otp" type="otp" class="form-control shadow-none @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" required autocomplete="otp">                   
                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @error('unknown')
                <div class="mx-5">
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                </div>
                @enderror
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection