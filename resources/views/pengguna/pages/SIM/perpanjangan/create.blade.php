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
                <h4 class="card-title text-primary ">Perpanjangan SIM</h4>
            </div>
            <div class="card-body">
                <form id="regForm" action="{{ route('perpanjangan-sim.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="text-align:center;margin-top:20px;margin-bottom:20px;">
                        <span class="step"></span>
                    </div>


                    <!-- form 1 -->


                    <div class="tab">
                        <h5>Identitas Diri</h5>
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="sim_id" class=" form-control-label">Pilih Nama SIM</label></div>
                            <div class="col-12 col-md-9">
                                <select name="sim_id" id="sim_id" class="form-control">
                                    <option value="" selected>--Pilih SIM--</option>
                                    @foreach ($data as $sim)
                                    <option value="{{ $sim->id }}">{{ $sim->nm_lngkp . ' - ' . $sim->no_sim . ' - ' . $sim->gol_sim }}</option>
                                    @endforeach
                                </select>
                            </div>
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