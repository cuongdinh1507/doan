@extends("admin.admindb")
@section("content")
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Overview</li>
</ol>
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-newspaper"></i>
        </div>
        <div class="mr-5 postToday"></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.projectInfo') !!}">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-dark o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-users"></i>
        </div>
        <div class="mr-5 totalUser"></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.users') !!}">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-newspaper"></i>
        </div>
        <div class="mr-5 totalPost"></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.projectInfo') !!}">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-file-upload"></i>
        </div>
        <div class="mr-5 totalFileUploaded"></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.projectDD') !!}">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
</div>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Week Statistics</li>
</ol>
<div class="col-lg-10 mx-auto">
  <canvas id="myChart" class="w-100 mx-auto" height="400px"></canvas> 
</div>
<script>

</script>
<script>
  var countArr = [];
  count = (arr,value) => {
    var array = [];
    $.map(arr, (v)=>{
      if ( v == value )
        array.push(v);
    });
    return array.length;
  }
  $.get("{!! route('admin.weekPost') !!}", data =>{
    $.map(data, v => {
      var dt = new Date(v.created_at);
      countArr.push(dt.getDay());
    });
  }).then(()=>{
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', "Sunday"],
            datasets: [{
                label:  "Total Post",
                data: [5,2,5,2,4,6,7],
                // data: [count(countArr,1), count(countArr,2), count(countArr,3), count(countArr,4), count(countArr,5), count(countArr,6), count(countArr,0)],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          title: {
            display: true,
            text: "Total post on this week",
            fontSize: 25,
          },
          legend: {
            display: false,
            position: "right",
          },
          scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
          }
        }
    });
  });
</script>
@endsection