@extends('layouts.committee.app')

@section('title')
    <title>Votez &mdash; Dashboard</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Dashboard" />

            <div class="section-body">
                <x-title title="Dashboard Panitia" lead="Dashboard Informasi voting untuk panitia" />
                {{-- <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Line Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Partisipan yg Melakukan Voting</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart4"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Jumlah Kandidat Setiap Voting</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Quick Count</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
        integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        getData();

        async function getData() {
            const response = await fetch(
                'http://votez.test/committee/api/participant');
            console.log(response);
            const data = await response.json();
            console.log(data);
            length = data.length;
            console.log(length);

            const labels = [];
            const values = [];

            for (i = 0; i < length; i++) {
                labels.push(data[i].have_voted);
                values.push(data[i].total);
            }

            const newLabels = labels.map((val, i) => (i === 1) ? "Tidak Memilih" : "Memilih");

            var ctx = document.getElementById("myChart4").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: values,
                        backgroundColor: [
                            '#63ed7a',
                            '#fc544b',

                        ],
                        label: 'Prosentase Partisipan'
                    }],
                    labels: newLabels,
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                }
            });
        }
    </script>

    <script>
        getData();

        async function getData() {
            const response = await fetch(
                'http://votez.test/committee/api/voting');
            console.log(response);
            const data = await response.json();
            console.log(data);
            length = data.data.length;
            console.log(length);

            labels = [];
            values = [];
            for (i = 0; i < length; i++) {
                labels.push(data.data[i].voting);
                values.push(data.data[i].total_candidate);
            }


            new Chart(document.getElementById("myChart2"), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Jumlah (Pasangan)",
                        backgroundColor: ["#3e95cd",
                            "#8e5ea2",
                        ],
                        data: values
                    }]
                },
            });

        }
    </script>

    <script>
        getData();

        async function getData() {
            const response = await fetch(
                'http://votez.test/committee/api/quick-count');
            console.log(response);
            const data = await response.json();
            console.log(data);
            length = data.data.length;
            console.log(length);

            labels = [];
            values = [];
            for (i = 0; i < length; i++) {
                labels.push(data.data[i].candidate_partner);
                values.push(data.data[i].total);
            }


            new Chart(document.getElementById("myChart1"), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Jumlah (Suara)",
                        backgroundColor: ["#3e95cd",
                            "#8e5ea2",
                        ],
                        data: values
                    }]
                },
            });

        }
    </script>
@endpush()
