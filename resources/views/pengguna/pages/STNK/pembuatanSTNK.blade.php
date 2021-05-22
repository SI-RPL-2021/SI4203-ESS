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
                <h4 class="card-title text-primary ">Pembuatan STNK</h4>
            </div>
            <div class="card-body">
                <form id="regForm" action="{{ route('pembuatanSTNK.store') }}" method="post">
                    @csrf
                    <div style="text-align:center;margin-top:20px;margin-bottom:20px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>

                    <!-- form 1 -->

                    <div class="tab">
                        <h5>Formulir Pemohonan STNK</h5>
                        <hr>
<<<<<<< HEAD:resources/views/pengguna/pages/STNK/laporan_kehilangan_stnk.blade.php
                        <div class="form-group">
                            <label for="no_regis"> No Registrasi </label>
                            <input type="text" name="no_regis" class="form-control @error('no_regis') is-invalid @enderror" id="no_regis" value=<?php echo rand();?> readonly>                                                            
                        </div>
                        <div class="form-group">
                            <label for="jenis_pelayanan">Pelayanan</label>
                            <input type="text" name="jenis_pelayanan" class="form-control" id="jenis_pelayanan" value="Laporan Kehilangan STNK" readonly>
                        </div>
                        <div class="row">
                            <label class="col-form-label col-sm-2 pt-0" for="no_regis">Silahkan Download File Berikut </label>
                        </div>
                        <div class="row col-sm-2 pt-0">
                            <a class="btn btn-primary " href="/download">Download</a>
                        </div>
=======
                        <label for="no_regis"> No Registrasi </label>
                        <input type="text" name="no_regis" class="form-control @error('no_regis') is-invalid @enderror" id="no_regis">
>>>>>>> ecae1db3cc81d3bc63ca8ecff43ba62a7676a003:resources/views/pengguna/pages/STNK/pembuatanSTNK.blade.php
                    </div>

                    <!-- form 2 -->

                    <div class="tab">
                        <h5>Identitas Diri</h5>
                        <hr>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" name="merk" class="form-control" id="merk">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" name="type" class="form-control" id="type">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" name="jenis" class="form-control" id="jenis">
                        </div>
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" name="model" class="form-control" id="model">
                        </div>
                        <div class="form-group">
                            <label for="thn_pembuatan">Tahun Pembuatan</label>
                            <input type="text" name="thn_pembuatan" class="form-control" id="thn_pembuatan">
                        </div>
                        <div class="form-group">
                            <label for="silinder">Isi Silinder</label>
                            <input type="text" name="silinder" class="form-control " id="silinder">
                        </div>
                        <div class="form-group">
                            <label for="nmr_rangka">Nomor Rangka / NIK / VIN</label>
                            <input type="text" name="nmr_rangka" class="form-control " id="nmr_rangka">
                        </div>
                        <div class="form-group">
                            <label for="nmr_mesin">Nomor Mesin</label>
                            <input type="text" name="nmr_mesin" class="form-control " id="nmr_mesin">
                        </div>
                        <div class="form-group">
                            <label for="warna_kendaraan">Warna Kendaraan</label>
                            <input type="text" name="warna_kendaraan" class="form-control" id="warna_kendaraan">
                        </div>
                        <div class="form-group">
                            <label for="bahan_bakar">Bahan Bakar</label>
                            <input type="text" name="bahan_bakar" class="form-control" id="bahan_bakar">
                        </div>
                        <div class="form-group">
                            <label for="warna_tnkb">Warna TNKB</label>
                            <input type="text" name="warna_tnkb" class="form-control " id="warna_tnkb">
                        </div>
                        <div class="form-group">
                            <label for="thn_registrasi">Tahun Registrasi</label>
                            <input type="text" name="thn_registrasi" class="form-control " id="thn_registrasi">
                        </div>
                        <div class="form-group">
                            <label for="nmr_urut">Nomor Urut Pendaftaran</label>
                            <input type="text" name=" nmr_urut" class="form-control " id="nmr_urut">
                        </div>
                        
                    </div>


                    <!-- form 3 -->

                    <div class="tab">
                        <div class="form-group">
                            <h5>Dokumen Registrasi Pertama</h5>
                            <hr>
                            <label for="nmr_faktur"> Nomor Faktur </label>
                            <input type="text" name="nmr_faktur" class="form-control " id="nmr_faktur">
                        </div>
                        <div class="form-group">
                            <label for="tgl"> Tanggal </label>
                            <input type="date" class="form-control " name="tgl">
                        </div>
                        <div class="form-group">
                            <label for="apm"> APM / Importir </label>
                            <input type="text" name="apm" class="form-control " id="apm">
                        </div>
                        <div class="form-group">
                            <label for="nmr_pib"> Nomor PIB </label>
                            <input type="text" name="nmr_pib" class="form-control " id="nmr_pib">
                        </div>
                        <div class="form-group">
                            <label for="nmr_sut"> Nomor SUT / SRUT </label>
                            <input type="text" name="nmr_sut" class="form-control " id="nmr_sut">
                        </div>
                        <div class="form-group">
                            <label for="nmr_tanda_pendaftaran"> Nomor Tanda Pendaftaran Tipe </label>
                            <input type="text" name="nmr_tanda_pendaftaran" class="form-control " id="nmr_tanda_pendaftaran">
                        </div>
                    </div>


                    <!-- form 4 -->

                    <div class="tab">
                        <h5>Identitas Pemilik</h5>
                        <hr>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Kepemilikan RANMOR</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kepemilikan" id="pribadi" value="pribadi">
                                        <label class="form-check-label" for="pribadi">
                                            Milik Pribadi
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kepemilikan" id="pemerintah" value="pemerintah">
                                        <label class="form-check-label" for="pemerintah">
                                            Milik Instansi Pemerintah
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="alamat_pemilik"> Alamat Pemilik </label>
                            <input type="text" name="alamat_pemilik" class="form-control " id="alamat_pemilik">
                        </div>
                        <div class="form-group">
                            <label for="kode_pos"> Kode POS </label>
                            <input type="text" name="kode_pos" class="form-control " id="kode_pos">
                        </div>
                        <div class="form-group">
                            <label for="nmr_tlpn"> Nomor Telepon </label>
                            <input type="text" name="nmr_tlpn" class="form-control " id="nmr_tlpn">
                        </div>
                        <div class="form-group">
                            <label for="nmr_ktp"> Nomor KTP </label>
                            <input type="text" name="nmr_ktp" class="form-control " id="nmr_ktp">
                        </div>
                        <div class="form-group">
                            <label for="kitas"> KITAS / KITAP </label>
                            <input type="text" name="kitas" class="form-control " id="kitas">
                        </div>
                    </div>


                    <!-- form 5 -->

                    <div class="tab">
                        <h5>Jenis Permohonan</h5>
                        <hr>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Baru / Pertama</legend>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="baru[]" type="checkbox" id="1" value="hasil_lelang_temuan">
                                        <label class="form-check-label" for="1">Hasil Lelang Temuan Ditjen Bea Cukai / Polri</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="baru[]" type="checkbox" id="2" value="cbu">
                                        <label class="form-check-label" for="2">CBU</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="baru[]" type="checkbox" id="3" value="Kedutaan">
                                        <label class="form-check-label" for="3">Kedutaan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="baru[]" type="checkbox" id="4" value="hasil_lelang_polri">
                                        <label class="form-check-label" for="4">Hasil Lelang Ranmor
                                            Dinas TNI / Polri</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="baru[]" type="checkbox" id="5" value="lembaga_internasional">
                                        <label class="form-check-label" for="5">Lembaga Internasional</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="baru[]" type="checkbox" id="6" value="ckd">
                                        <label class="form-check-label" for="6">CKD</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Perubahan</legend>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="7" value="ganti_nama_pemilik">
                                        <label class="form-check-label" for="7">Ganti Nama Pemilik</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="8" value="pindah_nama_pemilik">
                                        <label class="form-check-label" for="8">Pindah Nama Pemilik</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="9" value="rubah_bentuk">
                                        <label class="form-check-label" for="8">Rubah Bentuk</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="9" value="rubah_warna">
                                        <label class="form-check-label" for="9">Rubah Warna</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="10" value="ganti_mesin">
                                        <label class="form-check-label" for="10">Ganti Mesin</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="11" value="rubah_fungsi">
                                        <label class="form-check-label" for="11">Rubah Fungsi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="12" value="stnk_hilang">
                                        <label class="form-check-label" for="12">STNK Hilang</label>
                                    </div>
                                </div>
                                <div class=" col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="13" value="stnk_rusak">
                                        <label class="form-check-label" for="13">STNK Rusak</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="14" value="hibah">
                                        <label class="form-check-label" for="14">Hibah / Waris</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="15" value="ganti_nomor_regis">
                                        <label class="form-check-label" for="15">Ganti Nomor Registrasi</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="16" value="badan_hukum">
                                        <label class="form-check-label" for="16">Badan Hukum</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan[]" type="checkbox" id="17" value="mutasi">
                                        <label class="form-check-label" for="17">Mutasi Keluar Daerah</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Pendaftaran dengan Persyaratan Khusus</legend>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="persyaratan_khusus[]" type="checkbox" id="18" value="stnk_rahasia">
                                        <label class="form-check-label" for="18">STNK Rahasia</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="persyaratan_khusus[]" type="checkbox" id="19" value="stnk_khusus">
                                        <label class="form-check-label" for="19">STNK Khusus</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="persyaratan_khusus[]" type="checkbox" id="20" value="dinas_tni">
                                        <label class="form-check-label" for="20">Dinas TNI</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="persyaratan_khusus[]" type="checkbox" id="21" value="dinas_polri">
                                        <label class="form-check-label" for="21">Dinas Polri</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="persyaratan_khusus[]" type="checkbox" id="22" value="sipil">
                                        <label class="form-check-label" for="22">Sipil</label>
                                    </div>
                                </div>
                        </fieldset>
                        <hr>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Perpanjangan</legend>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perpanjangan[]" type="checkbox" id="23" value="stnk_rahasia">
                                        <label class="form-check-label" for="23">Pengesahan STNK Tahunan</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perpanjangan[]" type="checkbox" id="24" value="stnk_khusus">
                                        <label class="form-check-label" for="24">Perpanjangan STNK 5 Tahunan</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>


                    <!-- form 6 -->

                    <div class="tab">
                        <h5>Pengunggahan Surat Keterangan Kehilangan</h5>
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