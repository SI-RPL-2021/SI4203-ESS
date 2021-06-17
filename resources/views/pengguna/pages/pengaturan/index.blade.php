@extends('pengguna.templates.default')
@section('content')
<style>
    input.invalid {
        background-color: #ffdddd;
    }

    .tab {
        display: none;
    }

    .tombol {
        background-color: #4e73df;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        font-family-sans-serif: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        ;
        cursor: pointer;
        border-radius: 7px;
    }

    .tombol:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #4e73df;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    .step.finish {
        background-color: #4e73df;
    }
</style>
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-primary ">Pengaturan</h4>
            </div>
            <div class="card-body">
                <form id="regForm" action="{{ route('pengaturan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="text-align:center;margin-top:20px;margin-bottom:20px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                    <!-- form SIM-->
                    <div class="tab">
                        <h5>SIM</h5>
                        <hr>
                        <div class="form-group">
                            <label for="biaya_pembuatan_sim_a">Biaya Pembuatan SIM A</label>
                            <input type="number" name="biaya_pembuatan_sim_a" class="form-control @error('biaya_pembuatan_sim_a') is-invalid @enderror" value="{{ $item->biaya_pembuatan_sim_a ?? old('biaya_pembuatan_sim_a') }}">
                            @error('biaya_pembuatan_sim_a')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_pembuatan_sim_b">Biaya Pembuatan SIM B</label>
                            <input type="number" name="biaya_pembuatan_sim_b" class="form-control @error('biaya_pembuatan_sim_b') is-invalid @enderror" value="{{ $item->biaya_pembuatan_sim_b ?? old('biaya_pembuatan_sim_b') }}">
                            @error('biaya_pembuatan_sim_b')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_pembuatan_sim_c">Biaya Pembuatan SIM C</label>
                            <input type="number" name="biaya_pembuatan_sim_c" class="form-control @error('biaya_pembuatan_sim_c') is-invalid @enderror" value="{{ $item->biaya_pembuatan_sim_c ?? old('biaya_pembuatan_sim_c') }}">
                            @error('biaya_pembuatan_sim_c')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_perpanjangan_sim_a">Biaya Perpanjangan SIM A</label>
                            <input type="number" name="biaya_perpanjangan_sim_a" class="form-control @error('biaya_perpanjangan_sim_a') is-invalid @enderror" value="{{ $item->biaya_perpanjangan_sim_a ?? old('biaya_perpanjangan_sim_a') }}">
                            @error('biaya_perpanjangan_sim_a')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_perpanjangan_sim_b">Biaya Perpanjangan SIM B</label>
                            <input type="number" name="biaya_perpanjangan_sim_b" class="form-control @error('biaya_perpanjangan_sim_b') is-invalid @enderror" value="{{ $item->biaya_perpanjangan_sim_b ?? old('biaya_perpanjangan_sim_b') }}">
                            @error('biaya_perpanjangan_sim_b')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_perpanjangan_sim_c">Biaya Perpanjangan SIM C</label>
                            <input type="number" name="biaya_perpanjangan_sim_c" class="form-control @error('biaya_perpanjangan_sim_c') is-invalid @enderror" value="{{ $item->biaya_perpanjangan_sim_c ?? old('biaya_perpanjangan_sim_c') }}">
                            @error('biaya_perpanjangan_sim_c')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            @if ($item && $item->persyaratan_kehilangan_sim !== NULL)
                            <div class="col-md-2 align-self-center">
                                <a href="{{ route('pengaturan.download-persyaratan-kehilangan-sim') }}" class="btn btn-success"><i class="fas fa-download"></i> Download</a>
                            </div>
                            <div class="col-md-10">
                                <label for="persyaratan_kehilangan_sim">Persyaratan Kehilangan SIM (format PDF)</label>
                                <input type="file" name="persyaratan_kehilangan_sim" class="form-control @error('persyaratan_kehilangan_sim') is-invalid @enderror" value="{{ $item->persyaratan_kehilangan_sim ?? old('persyaratan_kehilangan_sim') }}">
                                @error('persyaratan_kehilangan_sim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @else
                            <div class="col-md-12">
                                <label for="persyaratan_kehilangan_sim">Persyaratan Kehilangan SIM (format PDF)</label>
                                <input type="file" name="persyaratan_kehilangan_sim" class="form-control @error('persyaratan_kehilangan_sim') is-invalid @enderror" value="{{ $item->persyaratan_kehilangan_sim ?? old('persyaratan_kehilangan_sim') }}">
                                @error('persyaratan_kehilangan_sim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- form stnk -->
                    <div class="tab">
                        <h5>STNK</h5>
                        <hr>
                        <div class="form-group">
                            <label for="biaya_pembuatan_stnk_motor">Biaya Pembuatan STNK Motor</label>
                            <input type="number" name="biaya_pembuatan_stnk_motor" class="form-control @error('biaya_pembuatan_stnk_motor') is-invalid @enderror" value="{{ $item->biaya_pembuatan_stnk_motor ?? old('biaya_pembuatan_stnk_motor') }}">
                            @error('biaya_pembuatan_stnk_motor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_pembuatan_stnk_mobil">Biaya Pembuatan STNK Mobil</label>
                            <input type="number" name="biaya_pembuatan_stnk_mobil" class="form-control @error('biaya_pembuatan_stnk_mobil') is-invalid @enderror" value="{{ $item->biaya_pembuatan_stnk_mobil ?? old('biaya_pembuatan_stnk_mobil') }}">
                            @error('biaya_pembuatan_stnk_mobil')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_perpanjangan_stnk_motor">Biaya Perpanjangan STNK Motor</label>
                            <input type="number" name="biaya_perpanjangan_stnk_motor" class="form-control @error('biaya_perpanjangan_stnk_motor') is-invalid @enderror" value="{{ $item->biaya_perpanjangan_stnk_motor ?? old('biaya_perpanjangan_stnk_motor') }}">
                            @error('biaya_perpanjangan_stnk_motor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_perpanjangan_stnk_mobil">Biaya Perpanjangan STNK Mobil</label>
                            <input type="number" name="biaya_perpanjangan_stnk_mobil" class="form-control @error('biaya_perpanjangan_stnk_mobil') is-invalid @enderror" value="{{ $item->biaya_perpanjangan_stnk_mobil ?? old('biaya_perpanjangan_stnk_mobil') }}">
                            @error('biaya_perpanjangan_stnk_mobil')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            @if ($item && $item->persyaratan_kehilangan_stnk !== NULL)
                            <div class="col-md-2 align-self-center">
                                <a href="{{ route('pengaturan.download-persyaratan-kehilangan-stnk') }}" class="btn btn-success"><i class="fas fa-download"></i> Download</a>
                            </div>
                            <div class="col-md-10">
                                <label for="persyaratan_kehilangan_stnk">Persyaratan Kehilangan STNK (format PDF)</label>
                                <input type="file" name="persyaratan_kehilangan_stnk" class="form-control @error('persyaratan_kehilangan_stnk') is-invalid @enderror" value="{{ $item->persyaratan_kehilangan_stnk ?? old('persyaratan_kehilangan_stnk') }}">
                                @error('persyaratan_kehilangan_stnk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @else
                            <div class="col-md-12">
                                <label for="persyaratan_kehilangan_stnk">Persyaratan Kehilangan STNK (format PDF)</label>
                                <input type="file" name="persyaratan_kehilangan_stnk" class="form-control @error('persyaratan_kehilangan_stnk') is-invalid @enderror" value="{{ $item->persyaratan_kehilangan_stnk ?? old('persyaratan_kehilangan_stnk') }}">
                                @error('persyaratan_kehilangan_stnk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @endif
                        </div>
                    </div>
                    {{-- pajak kendaraan --}}
                    <div class="tab">
                        <h5>Pajak Kendaraan</h5>
                        <hr>
                        <div class="form-group">
                            <label for="biaya_pajak_kendaraan_motor">Biaya Pajak Kendaraan Motor</label>
                            <input type="number" name="biaya_pajak_kendaraan_motor" class="form-control @error('biaya_pajak_kendaraan_motor') is-invalid @enderror" value="{{ $item->biaya_pajak_kendaraan_motor ?? old('biaya_pajak_kendaraan_motor') }}">
                            @error('biaya_pajak_kendaraan_motor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_pajak_kendaraan_mobil">Biaya Pajak Kendaraan Mobil</label>
                            <input type="number" name="biaya_pajak_kendaraan_mobil" class="form-control @error('biaya_pajak_kendaraan_mobil') is-invalid @enderror" value="{{ $item->biaya_pajak_kendaraan_mobil ?? old('biaya_pajak_kendaraan_mobil') }}">
                            @error('biaya_pajak_kendaraan_mobil')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_perpanjangan_pajak_kendaraan_motor">Biaya Perpanjangan Pajak Kendaraan Motor</label>
                            <input type="number" name="biaya_perpanjangan_pajak_kendaraan_motor" class="form-control @error('biaya_perpanjangan_pajak_kendaraan_motor') is-invalid @enderror" value="{{ $item->biaya_perpanjangan_pajak_kendaraan_motor ?? old('biaya_perpanjangan_pajak_kendaraan_motor') }}">
                            @error('biaya_perpanjangan_pajak_kendaraan_motor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya_perpanjangan_pajak_kendaraan_mobil">Biaya Perpanjangan Pajak Kendaraan Mobil</label>
                            <input type="number" name="biaya_perpanjangan_pajak_kendaraan_mobil" class="form-control @error('biaya_perpanjangan_pajak_kendaraan_mobil') is-invalid @enderror" value="{{ $item->biaya_perpanjangan_pajak_kendaraan_mobil ?? old('biaya_perpanjangan_pajak_kendaraan_mobil') }}">
                            @error('biaya_perpanjangan_pajak_kendaraan_mobil')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div style="float:right;margin-top:50px;">
                        <button type="button" class="tombol" id="prevBtn" onclick="nextPrev(-1)"> Kembali </button>
                        <button type="button" class="tombol" id="nextBtn" onclick="nextPrev(1)"> Selanjutnya </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Selesai";
        } else {
            document.getElementById("nextBtn").innerHTML = "Selanjutnya";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        // if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }
    // function validateForm() {
    //     // This function deals with validation of the form fields
    //     var x, y, i, valid = true;
    //     x = document.getElementsByClassName("tab");
    //     y = x[currentTab].getElementsByTagName("input");
    //     // A loop that checks every input field in the current tab:
    //     for (i = 0; i < y.length; i++) {
    //         // If a field is empty...
    //         if (y[i].value == "") {
    //             // add an "invalid" class to the field:
    //             y[i].className += " invalid";
    //             // and set the current valid status to false
    //             valid = false;
    //         }
    //     }
    //     // If the valid status is true, mark the step as finished and valid:
    //     if (valid) {
    //         document.getElementsByClassName("step")[currentTab].className += " finish";
    //     }
    //     return valid; // return the valid status
    // }
    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

@endsection