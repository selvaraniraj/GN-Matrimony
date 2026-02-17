@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
    @php $routesCheckLists = empty(getRoutesList() === false) ? getRoutesList() : []; @endphp

    @php $roleCheck = getRole(); @endphp
    <h2>Welcome to DashBoard</h2>

    @if (in_array('app.users.list', $routesCheckLists) || in_array('app.roles.list', $routesCheckLists) || in_array('app.routes.list', $routesCheckLists))
    <div class="row grid-space-large">
        <div class="charts_main_title mb-2">Admin Details Chart Section</div>
        <!-- User Stats -->
        <div class="col-sm-3 col-md-6 col-xl-3">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="graph_title">Total Users: {{ $data['users']['total_users'] }}</div>
                    <canvas class="dashboard_chart_output" id="userChart" width="200" height="280"> User Chart</canvas>
                </div>
            </div>
        </div>

        <!-- Role Stats -->
        <div class="col-sm-3 col-md-6 col-xl-3">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="graph_title">Total Roles: {{ $data['roles']['total_roles'] }}</div>
                    <canvas class="dashboard_chart_output" id="roleChart" width="200" height="280"> Role Chart</canvas>
                </div>
            </div>
        </div>

        <!-- Route Stats -->
        <div class="col-sm-3 col-md-6 col-xl-3">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="graph_title">Total Routes: {{ $data['routes']['total_routes'] }}</div>
                    <canvas class="dashboard_chart_output" id="routeChart" width="200" height="280"> Route Chart</canvas>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
@section('scripts')
    @parent
    <script>

        var userData = {!! json_encode($data['users']) !!};
        var roleData = {!! json_encode($data['roles']) !!};
        var routeData = {!! json_encode($data['routes']) !!};

        var bgColors = ['#8789ff', '#03c3ec', '#80ffbf', '#e6e220', '#9966ff', '#ff99cc', '#66cc99', '#ff6666', '#99ccff', '#ffcc99', '#99ff99', '#ffccff', '#ccccff', '#ff9999', '#99ffff']


        Chart.defaults.color = '#000';
        Chart.defaults.borderColor = '#36A2EB';
        Chart.defaults.font.size = 14;

      // User Chart
        var userChart = new Chart(document.getElementById('userChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Users'],
                datasets: [{
                    label: 'Active',
                    data: [userData.active_users],
                    backgroundColor: bgColors[0],
                    barThickness: 25,
                }, {
                    label: 'Inactive',
                    data: [userData.inactive_users],
                    backgroundColor: bgColors[1],
                    barThickness: 25,
                }]
            },
            options: {
                responsive: true
            }
        });

        // Role Chart
        var roleChart = new Chart(document.getElementById('roleChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Roles'],
                datasets: [{
                    label: 'Active',
                    data: [roleData.active_roles],
                    backgroundColor: bgColors[0],
                    barThickness: 25,
                }, {
                    label: 'Inctive',
                    data: [roleData.inactive_roles],
                    backgroundColor: bgColors[1],
                    barThickness: 25,
                }]
            },
            options: {
                responsive: true
            }
        });

        // Route Chart
        var routeChart = new Chart(document.getElementById('routeChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Routes'],
                datasets: [{
                    label: 'Active',
                    data: [routeData.active_routes],
                    backgroundColor: bgColors[0],
                    barThickness: 25,
                }, {
                    label: 'Inctive',
                    data: [routeData.inactive_routes],
                    backgroundColor: bgColors[1],
                    barThickness: 25,
                }]
            },
            options: {
                responsive: true
            }
        });

    </script>
@endsection
