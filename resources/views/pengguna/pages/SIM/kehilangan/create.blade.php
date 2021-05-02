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
                <h4 class="card-title text-primary ">Laporan Kehilangan SIM</h4>
            </div>
            <div class="card-body">
                <form id="regForm" action="{{ route('kehilangan-sim.store') }}" method="post">
                    @csrf
                    <div style="text-align:center;margin-top:20px;margin-bottom:20px;">
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>


                    <!-- form 1 -->

                    <div class="tab">
                        <h5>Formulir Pemohonan SIM</h5>
                        <hr>
                        <div class="form-group">
                            <label for="no_regis">No Registrasi</label>
                            <input type="text" name="no_regis" class="form-control" id="no_regis" value=<?php
                                                                                                        echo rand();
                                                                                                        ?> readonly>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pelayanan">Pelayanan</label>
                            <input type="text" name="jenis_pelayanan" class="form-control" id="jenis_pelayanan" value="Laporan Kehilangan SIM" readonly>
                        </div>
                        <div class="row">
                            <label class="col-form-label col-sm-2 pt-0" for="no_regis">Silahkan Download File Berikut </label>
                        </div>
                        <div class="row col-sm-2 pt-0">
                            <a class="btn btn-primary " href="/download">Download</a>
                        </div>
                    </div>

                    <div class="tab">
                        <h5>Identitas Diri</h5>
                        <hr>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap </label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $sim->nm_lngkp ?? '' }}" @if(auth()->user()->level === 'user') readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="ttl">Tempat, Tanggal Lahir</label>
                            <input type="text" name="ttl" class="form-control" id="ttl">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="{{ $sim->pekerjaan ?? '' }}" @if(auth()->user()->level === 'user') readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="alamat_tinggal">Alamat Tinggal</label>
                            <input type="text" name="alamat_tinggal" class="form-control" id="palamat_tinggal" value="{{ $sim->alamat ?? '' }}" @if(auth()->user()->level === 'user') readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="no_sim">No SIM</label>
                            <input type="text" name="no_sim" class="form-control" id="no_sim">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tgl_awal">Tanggal Berlaku</label>
                                <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tgl_akhir">Tanggal Berakhir</label>
                                <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Silahkan upload file persyaratan</legend>
                            </div>
                            <div class="row col-sm-2 pt-0">
                                <input type="file" name="file" class="custom-file-inpuit" id="file">
                            </div>
                        </fieldset>
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