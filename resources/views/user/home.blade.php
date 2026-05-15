
@extends('user.layouts.master')

@section('title', 'DibikinInSyifa - Jasa Ilustrasi Custom dari Foto Anda')

@section('content')

{{-- ===================== HERO ===================== --}}
@include('user.layouts.__hero')


{{-- ===================== LAYANAN ===================== --}}
@include('user.layouts.__services')


{{-- ===================== CARA KERJA ===================== --}}
@include('user.layouts.__howitWorks')

{{-- ===================== PORTFOLIO ===================== --}}
@include('user.layouts.__portofolio')

@include('user.layouts.__ilustrator')
{{-- ===================== KEUNGGULAN ===================== --}}
@include('user.layouts.__benefits')
{{-- ===================== TESTIMONI ===================== --}}
@include('user.layouts.__testimoni')


{{-- ===================== CTA ===================== --}}
@include('user.layouts.__callToAction')
<script src="{{ asset('user/js/animation.js') }}"></script>
@endsection
