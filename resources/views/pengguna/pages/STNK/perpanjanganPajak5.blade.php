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
                <h4 class="card-title text-primary ">Formulir Pemohonan Perpanjangan Pajak</h4>
            </div>
            <div class="card-body">
                <form id="regForm" action="{{ route('limatahun.store') }}" method="post">
                    @csrf
                    <div style="text-align:center;margin-top:20px;margin-bottom:20px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>

                    <!-- form 1 -->

                    <div class="tab">
                        <h5>Diisi oleh pemohon</h5>
                        <hr>
                        <div class="form-group">
                            <b><label>I. Jenis</label></br></b>
                            <label for="jenis_surat">Jenis Surat</label>
                            <input type="text" name="jenis_surat" class="form-control" id="jenis_surat">
                        </div>
                        <div class="form-group">
                            <b><label for="type">Jenis Permohonan</label>
                            <input type="text" name="jenis_permohonan" class="form-control" id="jenis_permohonan">
                        </div>
                        <div class="form-group">
                            <label>II. Identitas Pemilik</label></br></b>
                            <label for="status">Status Pemilik Kendaraan bermotor</label>
                            <input type="text" name="status" class="form-control" id="status">
                        </div>
                    </br>
                        <h5>Diisi Bila Kendaraan Bermotor Milik Pribadi</h5>
                        <hr>
                        <div class="form-group">
                            <label for="nm_lngkp">Nama Lengkap Pemilik</label>
                            <input type="text" name="nm_lngkp" class="form-control" id="nm_lngkp">
                        </div>
                        <div class="form-group">
                            <label for="kebangsaan">Kebangsaan Pemilik</label>
                            <input type="text" name="kebangsaan" class="form-control" id="kebangsaan">
                        </div>
                    </br>
                        <h5>Khusus Untuk Barang Asing</h5>
                        <hr>
                        <div class="form-group">
                            <label for="asal">Negara Asal</label>
                            <input type="text" name="asal" class="form-control " id="asal">
                        </div>
                        <div class="form-group">
                            <label for="pass">Tanggal dan nomor Paspor</label>
                            <input type="text" name="pass" class="form-control " id="pass">
                        </div>
                        <div class="form-group">
                            <label for="kims">Tanggal dan Nomor KIMS</label>
                            <input type="text" name="kims" class="form-control " id="kims">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Pemilik</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                        </div>
                    </div>


                    <!-- form 2 -->

                    <div class="tab">
                        <div class="form-group">
                            <h5>Diisi Bila Kendaraan Bermotor Bukan Milik Pribadi</h5>
                            <hr>
                            <label for="hukum"> Nama Badan Hukum/Resmi </label>
                            <input type="text" name="hukum" class="form-control " id="hukum">
                        </div>
                        <div class="form-group">
                            <label for="alamat_hukum"> Alamat Badan Hukum/Resmi </label>
                            <input type="alamat_hukum" class="form-control " name="alamat_hukum">
                        </div>
                        <div class="form-group">
                            <label for="akte"> Tanggal dan Nomor Akte Pendirian </label>
                            <input type="text" name="akte" class="form-control " id="akte">
                        </div>
                        <div class="form-group">
                            <label for="kuasa"> Nama Pemegang Yang Dikuasakan </label>
                            <input type="text" name="kuasa" class="form-control " id="kuasa">
                        </div>
                        <div class="form-group">
                            <label for="alamat_kuasa"> Alamat Pemegang Yang Dikuasakan </label>
                            <input type="text" name="alamat_kuasa" class="form-control " id="alamat_kuasa">
                        </div>
                        <div class="form-group">
                            <label for="npwp"> NPWP </label>
                            <input type="text" name="npwp" class="form-control " id="npwp">
                        </div>
                        <div class="form-group">
                            <label for="ke"> Pemilik ke -  </label>
                            <input type="text" name="ke" class="form-control " id="ke">
                        </div>
                        <div class="form-group">
                            <b><label for="ke"> IV. Identifikasi Kendaraan</label></b></br>
                            <label for="ke">Jenis / Model</label>
                            <input type="text" name="ke" class="form-control " id="ke">
                        </div>
                        <div class="form-group">
                            <label for="fungsi"> Fungsi  </label>
                            <input type="text" name="fungsi" class="form-control " id="fungsi">
                        </div>
                        <div class="form-group">
                            <label for="bahan_bakar"> Bahan Bakar  </label>
                            <input type="text" name="bahan_bakar" class="form-control " id="bahan_bakar">
                        </div>
                        <div class="form-group">
                            <label for="negara_asal">Negara Asal Pembuatan Kendaraan</label>
                            <input type="text" name="negara_asal" class="form-control " id="negara_asal">
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk / Type</label>
                            <input type="text" name="merk" class="form-control " id="merk">
                        </div>
                        <div class="form-group">
                            <label for="thn_pembuatan">Tahun Pembuatan</label>
                            <input type="text" name="thn_pembuatan" class="form-control " id="thn_pembuatan">
                        </div>
                    </div>


                    <!-- form 3 -->

                    <div class="tab">
                        <div class="form-group">
                            <label for="hukum">Isi Silinder / CC / HP</label>
                            <input type="text" name="Silinder" class="form-control " id="Silinder">
                        </div>
                        <div class="form-group">
                            <label for="no_rangka">Nomor Rangka / NIK</label>
                            <input type="text" class="form-control " name="no_rangka">
                        </div>
                        <div class="form-group">
                            <label for="no_mesin">Nomor Mesin</label>
                            <input type="text" name="no_mesin" class="form-control " id="no_mesin">
                        </div>
                        <div class="form-group">
                            <label for="mesintype">Type Mesin</label>
                            <input type="text" name="mesintype" class="form-control " id="mesintype">
                        </div>
                        <div class="form-group">
                            <label for="warna">Warna Kendaraan</label>
                            <input type="text" name="warna" class="form-control " id="warna">
                        </div>
                        <div class="form-group">
                            <label for="Kemudi">Kemudi</label>
                            <input type="text" name="Kemudi" class="form-control " id="Kemudi">
                        </div>
                        <div class="form-group">
                            <label for="Sumbu">Jumlah Sumbu / As</label>
                            <input type="text" name="Sumbu" class="form-control " id="Sumbu">
                        </div>
                        <div class="form-group">
                            <label for="ke">Jumlah Ban / Roda</label>
                            <input type="text" name="ke" class="form-control " id="ke">
                        </div>
                        <div class="form-group">
                            <label for="TNKB"> Warna Dasar TNKB  </label>
                            <input type="text" name="TNKB" class="form-control " id="TNKB">
                        </div>
                        <div class="form-group">
                            <label for="jml_pintu">Jumlah Pintu</label>
                            <input type="text" name="jml_pintu" class="form-control " id="jml_pintu">
                        </div>
                        <div class="form-group">
                            <label for="penumpang">Jumlah Penumpang</label>
                            <input type="text" name="penumpang" class="form-control " id="penumpang">
                        </div>
                        <div class="form-group">
                            <label for="merk">Nomor BPKB</label>
                            <input type="text" name="merk" class="form-control " id="merk">
                        </div>
                        <div class="form-group">
                            <label for="bpkb">Nomor Register BPKB</label>
                            <input type="text" name="bpkb" class="form-control " id="bpkb">
                        </div>
                        <div class="form-group">
                            <label for="import">Cara Import</label>
                            <input type="text" name="import" class="form-control " id="import">
                        </div>
                    </div>


                    <!-- form 4 -->
                    <div class="tab">
                        <hr>
                        <div class="form-group">
                            <label for="no_regis"> No Registrasi </label>
                            <input type="text" name="no_regis" class="form-control @error('no_regis') is-invalid @enderror" id="no_regis" value=<?php echo rand();?>>                                                                                                              ?> readonly>
                        </div>
                        {{-- <div class="form-group">
                            <label for="no_regis"> Nama </label>
                            <input type="text" name="no_regis" class="form-control @error('nama') is-invalid @enderror" id="nama" value=<?php echo nama?>>                                                                                                           ?> readonly>
                        </div> --}}
                        <div class="form-group">
                            <label for="jenis_pelayanan">Pelayanan</label>
                            <input type="text" name="jenis_pelayanan" class="form-control" id="jenis_pelayanan" value="Perpanjangan Pajak 1 Tahun" readonly>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">Pengambilan</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="baru[]" type="checkbox" id="2" value="Satpas">
                                <label class="form-check-label" for="2">Diambil di kantor Satpas</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="baru[]" type="checkbox" id="3" value="kurir">
                                <label class="form-check-label" for="3">Pengiriman via kurir</label>
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">Metode Pembayaran</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="baru[]" type="checkbox" id="2" value="bank">
                                <label class="form-check-label" for="2">Transfer Bank</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="baru[]" type="checkbox" id="3" value="pos">
                                <label class="form-check-label" for="3">Kantor POS</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="baru[]" type="checkbox" id="3" value="retail">
                                <label class="form-check-label" for="3">Toko retail (Indomaret/Alfamart)</label>
                            </div>
                        </div>
                    </div>



                    <!-- form 6 -->
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