@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-speedometer2"></i> Admin Dashboard</h2>
            <div class="text-muted">{{ now()->format('l, F j, Y') }}</div>
        </div>


        {{-- Secondary Stats --}}
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Members</h6>
                                <h3 class="mb-0">{{ number_format($stats['total_members']) }}</h3>
                            </div>
                            <div class="fs-1 text-primary">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Districts</h6>
                                <h3 class="mb-0">{{ $totalDistricts }}</h3>
                            </div>
                            <div class="fs-1" style="color: var(--saffron-yellow);">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Clans</h6>
                                <h3 class="mb-0">{{ $registeredClans }}</h3>
                            </div>
                            <div class="fs-1" style="color: var(--navy-blue);">
                                <i class="bi bi-diagram-3-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Towns</h6>
                                <h3 class="mb-0">{{ number_format($registeredTowns) }}</h3>
                                <small class="subtitle">Total</small>
                            </div>
                            <div class="fs-1 text-secondary">
                                <i class="bi bi-building"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Charts Row 1 --}}
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-pie-chart"></i> Gender Distribution</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="genderChart" height="250"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-bar-chart"></i> Age Groups</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="ageChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Charts Row 2 --}}
        <div class="row g-4 mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-graph-up"></i> Members by District</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="districtChart" height="150"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-hand-thumbs-up"></i> Volunteer Stats</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Willing to Volunteer</span>
                                <strong>{{ number_format($volunteerStats['willing_to_volunteer']) }}</strong>
                            </div>
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar"
                                    style="width: {{ ($volunteerStats['willing_to_volunteer'] / max($stats['total_members'], 1)) * 100 }}%; background-color: var(--saffron-yellow); color: var(--navy-blue);">
                                    {{ number_format(($volunteerStats['willing_to_volunteer'] / max($stats['total_members'], 1)) * 100, 1) }}%
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="d-flex justify-content-between mb-1">
                                <span>Willing to Lead</span>
                                <strong>{{ number_format($volunteerStats['willing_to_lead']) }}</strong>
                            </div>
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar bg-success"
                                    style="width: {{ ($volunteerStats['willing_to_lead'] / max($stats['total_members'], 1)) * 100 }}%;">
                                    {{ number_format(($volunteerStats['willing_to_lead'] / max($stats['total_members'], 1)) * 100, 1) }}%
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <span><i class="fab fa-whatsapp text-success"></i> WhatsApp Users</span>
                            <strong>{{ $whatsappCount }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Monthly Trend --}}
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-calendar-week"></i> Registration Trend (Last 12 Months)</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="trendChart" height="180"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-graph-up"></i> Members by Clan</h5>
                        <small class="text-muted">Six Clans Distribution</small>
                    </div>
                    <div class="card-body">
                        <canvas id="clanLineChart" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Region Chart - Towns -->
        <div class="col-xl-12 col-lg-8 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #0A1F44;">Total Members per Towns in Lofa Electoral District #5</h6>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <canvas id="townsColumnChart" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Gender Chart
            const genderCtx = document.getElementById('genderChart');
            new Chart(genderCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($genderData->pluck('gender')->map(fn($g) => ucfirst($g))) !!},
                    datasets: [{
                        data: {!! json_encode($genderData->pluck('count')) !!},
                        backgroundColor: ['#001F3F','#FFB300', '#6c757d']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Age Chart
            const ageCtx = document.getElementById('ageChart');
            new Chart(ageCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode(array_keys($ageGroups)) !!},
                    datasets: [{
                        label: 'Members',
                        data: {!! json_encode(array_values($ageGroups)) !!},
                        backgroundColor: '#FFB300'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // District Chart
            const districtCtx = document.getElementById('districtChart');
            new Chart(districtCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($districtData->pluck('name')) !!},
                    datasets: [{
                        label: 'Members',
                        data: {!! json_encode($districtData->pluck('count')) !!},
                        backgroundColor: '#001F3F'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Trend Chart
            const trendCtx = document.getElementById('trendChart');
            new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($monthlyRegistrations->pluck('month')->reverse()) !!},
                    datasets: [{
                        label: 'Registrations',
                        data: {!! json_encode($monthlyRegistrations->pluck('count')->reverse()) !!},
                        borderColor: '#FFB300',
                        backgroundColor: 'rgba(255, 179, 0, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });


            // --- Towns Column Chart ---
            const townsCtx = document.getElementById('townsColumnChart').getContext('2d');

            // Prepare simple colors (optional: can use same color or a palette)
            const colorPalette = ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#FFA000'];
            let colors = [];
            const townCount = {!! $towns->count() !!};
            for (let i = 0; i < townCount; i++) {
                colors.push(colorPalette[i % colorPalette.length]);
            }

            // Only town names
            const townLabels = {!! json_encode($towns->pluck('name')->values()) !!};
            const townMembers = {!! json_encode($towns->pluck('members_count')->values()) !!};

            new Chart(townsCtx, {
                type: 'bar',
                data: {
                    labels: townLabels,
                    datasets: [{
                        label: 'Members per Town',
                        data: townMembers,
                        backgroundColor: colors,
                        borderColor: '#2c9faf',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        },
                        y: {
                            ticks: {
                                autoSkip: false,
                                maxRotation: 0,
                                minRotation: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.raw + ' members';
                                }
                            }
                        }
                    }
                }
            });

            // --- Clan Line Chart ---
            const clanCtx = document.getElementById('clanLineChart').getContext('2d');
            new Chart(clanCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($clans->pluck('name')) !!},
                    datasets: [{
                        label: 'Members per Clan',
                        data: {!! json_encode($clans->pluck('members_count')) !!},
                        borderColor: '#4e73df',
                        backgroundColor: 'rgba(78, 115, 223, 0.05)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 5,
                        pointBackgroundColor: '#4e73df',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
