@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Entry Data</h5>
                        </div>
                        <a href="{{ route('show-detail-wesel') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="tooltip" data-bs-original-title="Detail Ilustration">&nbsp; Show Measurement</a>
                    </div>
                    <br>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="container">
                            <form action="{{ route('wesel-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-0">
                                    <label class="form-label">
                                        Nama Anggota Tim
                                    </label>
                                    <div class="input-group mb-1">
                                        <span class="input-group-text">1.</span>
                                        <select class="form-control" aria-label="Default select example" name="user_id">
                                            <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }}</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-1">
                                        <span class="input-group-text">2.</span>
                                        <select class="form-control" aria-label="Default select example" name="nama_tim_2">
                                            <option value="" disabled selected>Pilih nama anggota</option>
                                            @foreach ($users as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-1">
                                        <span class="input-group-text">3.</span>
                                        <select class="form-control" aria-label="Default select example" name="nama_tim_3">
                                            <option value="" disabled selected>Pilih nama anggota</option>
                                            @foreach ($users as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-1">
                                        <span class="input-group-text">4.</span>
                                        <select class="form-control" aria-label="Default select example" name="nama_tim_4">
                                            <option value="" disabled selected>Pilih nama anggota</option>
                                            @foreach ($users as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">
                                        Nama Line
                                    </label> <br>
                                    <select class="form-control" aria-label="Default select example" name="nama_line" required>
                                        <option value="" selected disabled>Pilih nama line</option>
                                        <option value="UT">Up Track</option>
                                        <option value="DT">Down Track</option>
                                    </select>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">
                                        Nama Stasiun / Area
                                    </label>
                                    <input type="text" class="form-control" name="nama_stasiun" style="text-transform: uppercase" required>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">
                                        Nama Wesel
                                    </label>
                                    <input type="text" class="form-control" name="nama_wesel" style="text-transform: uppercase" required>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">
                                        Tanggal Kerja
                                    </label>
                                    <input type="date" class="form-control" name="tanggal_kerja" required>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">
                                        Foto Kegiatan 1
                                    </label>
                                    <input name="foto_kegiatan_1" for="foto_kegiatan_1" id="foto_kegiatan_1" type="file" class="form-control" required>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">
                                        Foto Kegiatan 2
                                    </label>
                                    <input name="foto_kegiatan_2" for="foto_kegiatan_2" id="foto_kegiatan_2" type="file" class="form-control" required>
                                </div>

                                {{-- <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold bg-warning">Track Gauge</h5>
                                <hr class="mt-0 mb-3"> --}}
                                
                                {{-- <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold bg-success">Cross Level</h5>
                                <hr class="mt-0 mb-3">

                                <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold bg-info">Alignment</h5>
                                <hr class="mt-0 mb-3"> --}}

                                {{-- <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold bg-dark" style="color: white">Longitudinal Level</h5>
                                <hr class="mt-0 mb-3">

                                <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold bg-danger" style="color: white">Back Gauge</h5>
                                <hr class="mt-0 mb-3"> --}}

                                <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold text-center">TRACK GAUGE</h5>
                                <hr class="mt-0 mb-3">

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>1</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_1" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>1</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_1" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>2</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_2" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>2</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_2" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>2'</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_2A" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>2'</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_2A" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>2''</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_2AA" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>2''</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_2AA" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>3</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_3" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>3</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_3" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>3'</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_3A" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>3'</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_3A" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>4</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level (OPTIONAL)" name="CL_4">
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>4'</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge (OPTIONAL)" name="TG_4A">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>4'</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level (OPTIONAL)" name="CL_4A">
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>5</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_5" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>5</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_5" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>5'</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_5A" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>5'</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_5A" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>6'</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge (OPSIONAL)" name="TG_6A">
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>7</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_7" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>7</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_7" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>7'</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_7A" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>7'</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_7A" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>8</b></span>
                                    <input type="text" class="form-control" placeholder="  Back Gauge" name="BG_8" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>8</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_8" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>8'</b></span>
                                    <input type="text" class="form-control" placeholder="  Back Gauge" name="BG_8A" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>8'</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_8A" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>10</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_10" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>10</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_10" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>10'</b></span>
                                    <input type="text" class="form-control" placeholder="  Track Gauge" name="TG_10A" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>10'</b></span>
                                    <input type="text" class="form-control" placeholder="  Cross Level" name="CL_10A" required>
                                </div>

                                <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold text-center">STRING</h5>
                                <hr class="mt-0 mb-3">
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>2</b></span>
                                    <input type="text" class="form-control" placeholder="  Longitudinal Level" name="LL_2" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-info font-weight-bold"><b>2</b></span>
                                    <input type="text" class="form-control" placeholder="  Alignment" name="AL_2" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>5</b></span>
                                    <input type="text" class="form-control" placeholder="  Longitudinal Level" name="LL_5" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-info font-weight-bold"><b>5</b></span>
                                    <input type="text" class="form-control" placeholder="  Alignment" name="AL_5" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>5'</b></span>
                                    <input type="text" class="form-control" placeholder="  Longitudinal Level" name="LL_5A" required>
                                </div>
                                <div class="input-group mb-0">
                                    <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                                    <span class="input-group-text bg-secondary font-weight-bold"><b>1/2</b></span>
                                    <input type="text" class="form-control" placeholder="  Alignment" name="AL_5A_1per2" required>
                                </div>
                                <div class="input-group mb-0">
                                    <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                                    <span class="input-group-text bg-secondary font-weight-bold"><b>1/4</b></span>
                                    <input type="text" class="form-control" placeholder="  Alignment" name="AL_5A_1per4" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                                    <span class="input-group-text bg-secondary font-weight-bold"><b>3/4</b></span>
                                    <input type="text" class="form-control" placeholder="  Alignment" name="AL_5A_3per4" required>
                                </div>
                                <br>

                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>9</b></span>
                                    <input type="text" class="form-control" placeholder="  Longitudinal Level" name="LL_9" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-info font-weight-bold"><b>9</b></span>
                                    <input type="text" class="form-control" placeholder="  Alignment" name="AL_9" required>
                                </div>



                                <input class="mt-5 btn btn-primary" type="submit" name="submit" value="Simpan" data-bs-toggle="tooltip" data-bs-original-title="Save Data Job Wesel">
                                <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection