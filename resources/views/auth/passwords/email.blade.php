@extends('layouts.main')
@section('nav')
    @include('partials.nav')
@endsection
@section('content')
<div class="flex flex-wrap items-center py-32 px-4 py-32 md:px-0">
    <div class="w-full max-w-md md:mx-auto">
        <div class="rounded shadow">
            <div class="font-base text-base bg-brand text-white p-3 rounded-t">
                {{ __('Reset Password') }}
            </div>
            <div class="bg-white p-3 rounded-b">
                @if (session('status'))
                    <div class="bg-green-lightest border border-brand-light text-brand-dark text-sm px-4 py-3 rounded mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="flex items-stretch mb-3">
                        <label for="email" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">{{ __('E-Mail') }}</label>
                        <div class="flex flex-col w-3/4">
                            <input id="email" type="email" class="flex-grow h-8 px-2 border rounded {{ $errors->has('email') ? 'border-red-dark' : 'border-grey-light' }}" name="email" value="{{ old('email') }}" required autofocus>
                            {!! $errors->first('email', '<span class="text-danger text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-3/4 ml-auto">
                            <button type="submit" class="bg-brand text-grey-lighter hover:text-white text-sm font-semibold py-2 px-4 rounded mr-3">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
