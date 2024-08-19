@extends('layouts.main1')

@section('konten')
<div class="w-full h-[85%] px-[5%]">
    <div class="flex flex-col justify-between pb-4 md:flex-row">
        <div class="flex justify-center w-full text-base md:text-lg">
            <div>
                <p class="text-xl font-bold">Data Kelayakan Peralatan Mekanik</p>
            </div>
        </div>
    </div>
    <div class="h-[183rem] md:h-[107rem] lg:h-[55rem] bg-white">
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 grid-rows-2">
            @foreach ($data as $peralatan)
            <div>
                <div class="flex items-center justify-center mt-4 md:mt-6 lg:mt-10">
                    <canvas id="{{ $peralatan['nama'] }}" width="300" height="300"></canvas>
                </div>
                <div class="flex items-center justify-center mt-4">
                    <div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span>Layak: {{ $peralatan['layak'] }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                            <span>Tidak Layak: {{ $peralatan['tidak_layak'] }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                            <span>Belum Diinspeksi: {{ $peralatan['belum_inspeksi'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<script>
    var dataGerinda = @json($data['Gerinda Tangan Listrik']);
    var dataBor = @json($data['Mesin Bor Listrik']);
    var dataLas = @json($data['Travo Las Listrik']);
    var dataBar = @json($data['Mesin Bar Bender']);
    var dataCutter = @json($data['Mesin Bar Cutter']);
    var dataGergaji = @json($data['Gergaji Mesin Lingkaran']);
    var dataJack = @json($data['Mesin JackHammer']);
    document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById(dataBar.nama).getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Layak', 'Tidak Layak', 'Belum Diinspeksi'],
                    datasets: [{
                        label: 'Status Inspeksi',
                        data: [dataBar.layak_persen, dataBar.tidak_persen, dataBar.belum_persen],
                        backgroundColor: [
                            '#3182ce',
                            '#f6ad55',
                            '#e53e3e'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            fontSize: 14,
                            fontColor: '#333',
                            boxWidth: 20
                        }
                    },
                    title: {
                        display: true,
                        text: 'Status Inspeksi Bar Bender'
                    }
                }
            });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById(dataCutter.nama).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Layak', 'Tidak Layak', 'Belum Diinspeksi'],
                datasets: [{
                    label: 'Status Inspeksi',
                    data: [dataCutter.layak_persen, dataCutter.tidak_persen, dataCutter.belum_persen],
                    backgroundColor: [
                        '#3182ce',
                        '#f6ad55',
                        '#e53e3e'
                    ]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'bottom',
                    labels: {
                        fontSize: 14,
                        fontColor: '#333',
                        boxWidth: 20
                    }
                },
                title: {
                    display: true,
                    text: 'Status Inspeksi Bar Cutter'
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById(dataLas.nama).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Layak', 'Tidak Layak', 'Belum Diinspeksi'],
                datasets: [{
                    label: 'Status Inspeksi',
                    data: [dataLas.layak_persen, dataLas.tidak_persen, dataLas.belum_persen],
                    backgroundColor: [
                        '#3182ce',
                        '#f6ad55',
                        '#e53e3e'
                    ]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'bottom',
                    labels: {
                        fontSize: 14,
                        fontColor: '#333',
                        boxWidth: 20
                    }
                },
                title: {
                    display: true,
                    text: 'Status Inspeksi Las Listrik'
                }
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById(dataGerinda.nama).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Layak', 'Tidak Layak', 'Belum Diinspeksi'],
                datasets: [{
                    label: 'Status Inspeksi',
                    data: [dataGerinda.layak_persen, dataGerinda.tidak_persen, dataGerinda.belum_persen],
                    backgroundColor: [
                        '#3182ce',
                        '#f6ad55',
                        '#e53e3e'
                    ]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'bottom',
                    labels: {
                        fontSize: 14,
                        fontColor: '#333',
                        boxWidth: 20
                    }
                },
                title: {
                    display: true,
                    text: 'Status Inspeksi Gerinda Tangan'
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById(dataGergaji.nama).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Layak', 'Tidak Layak', 'Belum Diinspeksi'],
                datasets: [{
                    label: 'Status Inspeksi',
                    data: [dataGergaji.layak_persen, dataGergaji.tidak_persen, dataGergaji.belum_persen],
                    backgroundColor: [
                        '#3182ce',
                        '#f6ad55',
                        '#e53e3e'
                    ]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'bottom',
                    labels: {
                        fontSize: 14,
                        fontColor: '#333',
                        boxWidth: 20
                    }
                },
                title: {
                    display: true,
                    text: 'Status Inspeksi Gergaji Mesin'
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById(dataJack.nama).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Layak', 'Tidak Layak', 'Belum Diinspeksi'],
                datasets: [{
                    label: 'Status Inspeksi',
                    data: [dataJack.layak_persen, dataJack.tidak_persen, dataJack.belum_persen],
                    backgroundColor: [
                        '#3182ce',
                        '#f6ad55',
                        '#e53e3e'
                    ]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'bottom',
                    labels: {
                        fontSize: 14,
                        fontColor: '#333',
                        boxWidth: 20
                    }
                },
                title: {
                    display: true,
                    text: 'Status Inspeksi JackHammer'
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById(dataBor.nama).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Layak', 'Tidak Layak', 'Belum Diinspeksi'],
                datasets: [{
                    label: 'Status Inspeksi',
                    data: [dataBor.layak_persen, dataBor.tidak_persen, dataBor.belum_persen],
                    backgroundColor: [
                        '#3182ce',
                        '#f6ad55',
                        '#e53e3e'
                    ]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'bottom',
                    labels: {
                        fontSize: 14,
                        fontColor: '#333',
                        boxWidth: 20
                    }
                },
                title: {
                    display: true,
                    text: 'Status Inspeksi Bor Tangan'
                }
            }
        });
    });
</script>
@endsection
