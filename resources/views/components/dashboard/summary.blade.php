<div class="container-fluid">
    <div class="row">

        <!-- Total Visitor Card -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Total Visitor</h5>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-users icon-size text-primary"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold">{{ $allCount['allVisitorCount'] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Campus Card -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Total Campus</h5>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-university icon-size text-success"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold">{{ $allCount['allCampusCount'] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Student Card -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Total Student</h5>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-graduation-cap icon-size text-info"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold">{{ $allCount['allStudentCount'] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Teacher Card -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Total Teacher</h5>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-chalkboard-teacher icon-size text-secondary"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold">{{ $allCount['allTeacherCount'] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Khagrachari Student Card -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Khagrachari Student</h5>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-map-marker-alt icon-size text-warning"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold">{{ $allCount['khagrachariStudentCount'] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Matiranga Student Card -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Matiranga Student</h5>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-map-marker-alt icon-size text-danger"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold">{{ $allCount['matirangaStudentCount'] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Luxmichari Student Card -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Luxmichari Student</h5>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-map-marker-alt icon-size text-primary"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold">{{ $allCount['luxmichariStudentCount'] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fee Type Card -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Fee Type</h5>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-money-bill-alt icon-size text-success"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold">{{ $allCount['feeType'] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graph Card -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-2">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Data Visualization</h5>
                    <canvas id="myChart" width="400" height="100"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .icon-size {
        font-size: 1.5rem;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    @if(session()->has('success'))
    successToast('{{session('success')}}')
    @endif

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Visitors', 'Campuses', 'Students', 'Teachers', 'Fee Types', 'Khagrachari', 'Matiranga', 'Luxmichari'],
            datasets: [{
                label: 'Counts',
                data: [
                    {{ $allCount['allVisitorCount'] ?? 0 }},
                    {{ $allCount['allCampusCount'] ?? 0 }},
                    {{ $allCount['allStudentCount'] ?? 0 }},
                    {{ $allCount['allTeacherCount'] ?? 0 }},
                    {{ $allCount['feeType'] ?? 0 }},
                    {{ $allCount['khagrachariStudentCount'] ?? 0 }},
                    {{ $allCount['matirangaStudentCount'] ?? 0 }},
                    {{ $allCount['luxmichariStudentCount'] ?? 0 }}
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(45, 130, 230, 0.2)',
                    'rgba(100, 200, 100, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(45, 130, 230, 1)',
                    'rgba(100, 200, 100, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
