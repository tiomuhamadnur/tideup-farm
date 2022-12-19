@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 me-2">
                            {{ $tittle }}
                            <a href="javascript:if(window.print)window.print()"
                                class="btn btn-lg btn-primary ri-printer-line ms-3" type="button" title="Print QR Code"></a>
                        </h4>

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
                @foreach ($kambing as $item)
                    <div class="col-xl-2 col-md-3">
                        <div class="card pt-3">
                            <div class="card-body pb-0">
                                <div class="text-center pt-1 pb-1">
                                    <div class="row">
                                        <img class="me-3" src="data:image/png;base64, {!! base64_encode(
                                            QrCode::format('png')->size(200)->generate($item->qr_code),
                                        ) !!} ">
                                        <br>
                                        <h5 class="mt-1 text-uppercase">{{ $item->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
