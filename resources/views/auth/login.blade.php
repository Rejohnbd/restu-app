@extends('layouts.app')

@section('title', 'Login')

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group has-feedback @error('email') has-error @enderror">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email')
        <span class="help-block">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="form-group has-feedback  @error('password') has-error @enderror">
        <input type="password" class="form-control" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
        <span class="help-block">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox"> {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
@endsection