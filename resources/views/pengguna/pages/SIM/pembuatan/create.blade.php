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


<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Permohonan Pembuatan SIM</h4>
            </div>
            <div class="card-body">
                <form id="regForm" action="{{ route('pembuatan-sim.store') }}" method="post">
                    @csrf
                    <div style="text-align:center;margin-top:20px;margin-bottom:20px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        {{-- <span class="step"></span> --}}

                    </div>

                    <!-- form 1 -->

                    <div class="tab">
                        <h5>Data Permohonan</h5>
                        <hr>
                        @if (auth()->user()->level === 'admin sim')
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Status</label></div>
                            <div class="col-12 col-md-9">
                                <select name="status" id="status" class="form-control">
                                    <option value="0">Ditolak</option>
                                    <option value="2" selected>Proses</option>
                                    <option value="3">Berhasil</option>
                                </select>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="no_regis">No Registrasi</label>
                            <input type="text" name="no_regis" class="form-control" id="no_regis" value=<?php
                                                                                                        echo rand();
                                                                                                        ?> readonly>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pelayanan">Pelayanan</label>
                            <input type="text" name="jenis_pelayanan" class="form-control" id="jenis_pelayanan" value="Pembuatan SIM" readonly>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Golongan SIM</label></div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="radio">
                                        <label for="radio1" class="form-check-label ">
                                            <input type="radio" id="gol_sim" name="gol_sim" value="a" class="form-check-input">A
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio2" class="form-check-label ">
                                            <input type="radio" id="gol_sim" name="gol_sim" value="b" class="form-check-input">B
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio3" class="form-check-label ">
                                            <input type="radio" id="b" name="gol_sim" value="c" class="form-check-input">C
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">POLDA
                                    Kedatangan</label></div>
                            <div class="col-12 col-md-9">
                                <select name="polda_kedatangan" id="polda_kedatangan" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="Jawa Tengah">Jawa Tengah</option>
                                    <option value="Jawa Timur">Jawa Timur</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">SATPAS
                                    Kedatangan</label></div>
                            <div class="col-12 col-md-9">
                                <select name="satpas_kedatangan" id="satpas_kedatangan" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat SATPAS
                                    Kedatangan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="alamat_satpas" name="alamat_satpas" class="form-control"></div>
                        </div>

                    </div>

                    <!-- form 2 -->

                    <div class="tab">
                        <h5>Data Pribadi</h5>
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Kewarganegaraan</label></div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="radio">
                                        <label for="radio1" class="form-check-label ">
                                            <input type="radio" id="radio1" name="kwn" value="WNI" class="form-check-input">WNI
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio2" class="form-check-label ">
                                            <input type="radio" id="radio2" name="kwn" value="WNA" class="form-check-input">WNA
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">NIK/Nomor
                                    KTP</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nik" name="nik" class="form-control"></div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama
                                    Lengkap</label>
                            </div>
                            <div class="col-12 col-md-9"><input type="text" id="nm_lngkp" name="nm_lngkp" class="form-control"></div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tinggi</label>
                            </div>
                            <div class="col-12 col-md-9"><input type="text" id="tinggi" name="tinggi" class="form-control"></div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Golongan
                                    Darah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="gol_darah" id="gol_darah" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">A</option>
                                    <option value="2">AB</option>
                                    <option value="3">B</option>
                                    <option value="3">O</option>
                                </select>
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode
                                    POS</label></div>
                            <div class="col col-sm-4"><input type="text" id="kd_pos" name="kd_pos" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kota</label>
                            </div>
                            <div class="col-12 col-md-9"><input type="text" id="kota" name="kota" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat
                                </label></div>
                            <div class="col-12 col-md-9"><input type="text" id="alamat" name="alamat" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">No.Handphone</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="no_hp" name="no_hp" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Pendidikan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="pendidikan" id="pendidikan" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                    <option value="2">S1</option>
                                    <option value="3">S2</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Pekerjaan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="pekerjaan" id="pekerjaan" class="form-control">
                                    <option value="0">Lain-lain</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="PNS">PNS</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <!-- form 3 -->

                    <div class="tab">
                        <div class="form-group">
                            <h5>Data Keadaan Darurat</h5>
                            <hr>
                            <div class="card-header">
                                <strong>Data Pribadi</strong>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Hubungan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="hubungan" id="hubungan" class="form-control">
                                        <option value="0">Please select</option>
                                        <option value="Suami/Istri">Suami/Istri</option>
                                        <option value="Kerabat">Kerabat</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9"><input type="text" id="nama_KD" name="nama_KD" class="form-control"></div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9"><input type="text" id="alamat_KD" name="alamat_KD" class="form-control"></div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telepon</label>
                            </div>
                            <div class="col-12 col-md-9"><input type="text" id="telepon_KD" name="telepon_KD" class="form-control"></div>
                        </div>


                        <div class="card-header">
                            <strong>Data Validasi</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Ibu
                                        Kandung</label>
                                </div>
                                <div class="col-12 col-md-9"><input type="text" id="nama_ibu_KD" name="nama_ibu_KD" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <strong>Data Sertifikasi</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Sekolah
                                        Mengemudi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="sertif" id="sertif" class="form-control">
                                        <option value="0">Please select</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="tab">
                            <table class="table">
                                <tbody>
                                  <tr>
                                    <td>NIK/Nomor KTP</td>
                                    <td>{{ old('nik') }}</td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>{{ old('nm_lngkp') }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Permohonan</td>
                        <td>Pembuatan SIM</td>
                    </tr>
                    <tr>
                        <td>Golongan SIM</td>
                        <td>{{ old('gol_sim') }}</td>
                    </tr>
                    <tr>
                        <td>POLDA Kedatangan</td>
                        <td>{{ old('polda_kedatangan') }}</td>
                    </tr>
                    <tr>
                        <td>SATPAS Kedatangan</td>
                        <td>{{ old('satpas_kedatangan') }}</td>
                    </tr>
                    <tr>
                        <td>Biaya</td>
                        <td>Rp.120.000</td>
                    </tr>
                    </tbody>
                    </table>
            </div> --}}



            <div style="float:right;margin-top:50px;">
                <button type="button" class="tombol" id="prevBtn" onclick="nextPrev(-1)"> Kembali </button>
                <button type="button" class="tombol" id="nextBtn" onclick="nextPrev(1)"> Selanjutnya </button>
            </div>
            </form>
        </div>
    </div>
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
        if (n == 1 && !validateForm()) return false;
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

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

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