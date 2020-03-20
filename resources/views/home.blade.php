@extends('layouts.main')

@section('content')
@include('sections.intro')

<main id="main">
  @include('sections.about')

  @inclide('sections.hotels')

  @include('sections.gallery')

  @include('sections.faq')

  @include('sections.contact')


</main>
@endsection