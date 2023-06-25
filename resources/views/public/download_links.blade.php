@extends('layout')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Download Links</li>
            </ol>
            <h2>Download Links</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                               
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">John Doe</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Software engineer</p>
                        </td>

                        <td>
                            <button type="button" class="btn btn-danger text-white">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary px-4">
                                <i class="bi bi-download"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Alex Ray</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Consultant</p>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger text-white">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary px-4">
                                <i class="bi bi-download"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Kate Hunington</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Designer</p>
                        </td>

                        <td>
                            <button type="button" class="btn btn-danger text-white">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary px-4">
                                <i class="bi bi-download"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</main>
@endsection