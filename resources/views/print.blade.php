<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    @if ($transactions->document_type == "Certificate of Indigency")
    <div class="row">
        <div class="col-sm-12">

            <div style="width: 100%;">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <img src="{{ asset('images/logo.png') }}" class="img-fluid">
                            <p class="text-center; font-weight:bold">Republic of the Philippines <br> Brgy Old Nongnongan, Don Carlos. <br> Bukidnon. <br> Region X.</p>

                        </center>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <center>
                            <p style="font-weight: bold">{{ date("m-d-Y") }}<br>____________________________________________ <br>Date:</p>
                        </center>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <h4>Certification of Indigency</h4>
                        </center>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                            <p class="text-justify">This is to clarify that <span style="font-weight: bold; color:black">{{ $transactions->name }}</span> of legal age, Filipino and a resident of Purok <span style="font-weight: bold; color:black">{{ $transactions->address }}</span> is in the list of indigent families of Barangay Old Nongnongan, Don Carlos, Bukidnon. </p>
                            <p class="text-justify">This certificatio is issued for <span style="font-weight: bold; color:black">{{ $transactions->purpose }}</span> only to it may serve</p>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <center>
                            @php
                            $kapitan = App\Models\User::where('role', 'Staff-Kapitan')->latest()->first();
                        @endphp
                        <p style="font-weight: bold">{{ $kapitan->complete_name }}<br>______________________________ <br>Punong Barangay</p>

                        </center>

                    </div>
                </div>

            </div>

        </div>
    </div>
    @elseif($transactions->document_type == "Barangay Clearance")
    <h5>Barangay Clearance</h5>

    @elseif($transactions->document_type == "Barangay Certification")
    <h5>Barangay Certification</h5>

    @elseif($transactions->document_type == "Barangay Cert - First-time Job Seeker")
    <h5>Barangay Cert - First-time Job Seeker</h5>

    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
</body>
</html>
