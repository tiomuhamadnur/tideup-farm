@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $tittle }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tide Up Farm</a></li>
                                <li class="breadcrumb-item active">{{ $tittle }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Perhatian!</h5>
                            <hr>
                            <p>
                                Status akun anda adalah masih sebagai <b class="fw-bolder">GUEST</b>.
                                <br>
                                Untuk mendapat informasi lebih lanjut mengenai <b>Tide Up Farm</b> silahkan hubungi akun
                                Whatsapp Customer
                                Service kami di bawah ini.
                                <br>
                                <br>
                                <a href="https://wa.me/081903800023" target="_blank" class="btn btn-success fw-bolder"
                                    title="Muhammad Dani Taufiq"><i class="fab fa-whatsapp"></i> 081903800023</a>
                            </p>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
