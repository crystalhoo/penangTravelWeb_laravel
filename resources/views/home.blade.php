@extends('layouts.main')

@section('content')
@include('sections.intro')

<main id="main">
  @include('sections.about')
  @include('sections.gallery')
  @include('sections.faq')

</main>
@endsection
