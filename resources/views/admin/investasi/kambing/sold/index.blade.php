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
                            <div class="float-end">

                            </div>
                            <h6 class="card-title-desc">{{ $tittle . ' milik:' }}
                                <p class="fw-bolder mt-1">{{ auth()->user()->name }}</p>
                            </h6>

                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Tgl. Beli</th>
                                        <th>Tgl. Jual</th>
                                        <th>Bobot Beli (kg)</th>
                                        <th>Bobot Jual (kg)</th>
                                        <th>Harga Beli (Rp)</th>
                                        <th>Harga Jual (Rp)</th>
                                        <th>Foto Beli</th>
                                        <th>Foto Jual</th>
                                        <th>Kwitansi Beli</th>
                                        <th>Kwitansi Jual</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($kambing_sold as $item)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <b>{{ $item->name }}</b>
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge badge-lg @if ($item->status == 'ongoing') bg-success @else bg-danger @endif font-weight-bold">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->tgl_beli ?? '-' }}
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->tgl_jual ?? '-' }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->bobot_beli }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->bobot_jual }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->harga_beli }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->harga_jual }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <img class="img-thumbnail"
                                                    @if ($item->foto_beli != null) src="{{ asset('storage/' . $item->foto_beli) }}" @else src="{{ asset('storage/photo-kambing-beli/default/default.png') }}" @endif
                                                    style="height:50px">
                                            </td>
                                            <td class="text-center">
                                                <img class="img-thumbnail"
                                                    @if ($item->foto_jual != null) src="{{ asset('storage/' . $item->foto_jual) }}" @else src="{{ asset('storage/photo-kambing-beli/default/default.png') }}" @endif
                                                    style="height:50px">
                                            </td>
                                            <td class="text-center">
                                                <img class="img-thumbnail"
                                                    @if ($item->kwitansi_beli != null) src="{{ asset('storage/' . $item->kwitansi_beli) }}" @else src="{{ asset('storage/photo-kambing-beli/default/default.png') }}" @endif
                                                    style="height:50px">
                                            </td>
                                            <td class="text-center">
                                                <img class="img-thumbnail"
                                                    @if ($item->kwitansi_jual != null) src="{{ asset('storage/' . $item->kwitansi_jual) }}" @else src="{{ asset('storage/photo-kambing-beli/default/default.png') }}" @endif
                                                    style="height:50px">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
    </div>
@endsection
