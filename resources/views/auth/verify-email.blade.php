@extends('frontend.main_master')
@section('islamic')
<!-- /////////////////////////////////////////////////// -->
<div style="text-align: center;">
    <x-jet-authentication-card>
    <x-slot name="logo">

        </x-slot>

        <div style="margin-top:260px;">
        <div ><h3 class="text-danger">Your Email Verification Link</h3></div>
            <!--{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}-->
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600" style="color:green">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div style="margin-top: 20px; color:black" >
                    <x-jet-button type="submit" style="color:black !important">
                        {{ __('Send Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <!--<button style="margin-top: 20px;" type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">-->
                <!--    {{ __('Logout') }}-->
                <!--</button>-->
            </form>
        </div>
    </x-jet-authentication-card>

    </div>
  <!-- //////////////////////////////////////////////////////////// -->
  @endsection