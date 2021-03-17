@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.report.title') }}
                </div>
                <div class="panel-body">

                    <div class="col-md-12 col-xs-12">
                        <form class="form-inline" action="" method="POST">
                          <div class="form-group">
                            <label for="date">Year</label>
                            <select class="form-control" name="select_year" id="select_year">
                              
                                <option value="2021">2021</option>
                             
                            </select>
                          </div>
                          <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                      </div>
              
                      <br /> <br />
                    
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Total - Report</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="chart">
                            <canvas id="canvas" height="280" width="600"></canvas>
                          </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var year = <?php echo $year; ?>;
    var user = <?php echo $user; ?>;
    var barChartData = {
        labels: year,
        datasets: [{
            label: 'Order',
            backgroundColor: "blue",
            data: user
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Yearly User Joined'
                }
            }
        });
    };
</script>
@endsection



