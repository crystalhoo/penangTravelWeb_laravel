@extends('layouts.main')

@section('content')
@include('sections.intro')

<main id="main">
  @include('sections.about')
  @include('sections.schedule')
  @include('sections.plan')
  @include('sections.hotels')
  @include('sections.gallery')
  @include('sections.faq')

</main>
@endsection
