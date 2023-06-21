@extends('layout')
@section('content')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/">Home</a></li>
        <li>Gallery - Albums</li>
      </ol>
      <h2>Gallery - Albums</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <!-- Gallery -->
      <div class="row">
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
          <h2>Album name</h2>
          <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
            class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />

          
          </div>

        <div class="col-lg-4 mb-4 mb-lg-0">
          <h2>Album name</h2>

          <img
          src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
          class="w-100 shadow-1-strong rounded mb-4"
          alt="Boat on Calm Water"
        />

        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">
          <h2>Album name</h2>

          <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
            class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />
        </div>
      </div>
      <!-- Gallery -->
    </div>
  </section>

</main>
@endsection