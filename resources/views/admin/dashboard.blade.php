@extends('admin.layouts.dashboard')

@section('page_heading','Dashboard')

@section('section')

    <!-- /.row -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">26</div>
                                <div>New Comments!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">12</div>
                                <div>New Tasks!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">124</div>
                                <div>New Orders!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div>Support Tickets!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <script>
            window.onload = function() {
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:
                        <?php
                        $monthArray = '[';
                        foreach($revenues as $revenue)
                        {
                            $monthArray = $monthArray . $revenue->month . ',';
                        }
                        $monthArray = substr($monthArray, 0 ,-1);
                        $monthArray = $monthArray . ']';
                        echo $monthArray;
                        ?>
                        ,
                        datasets: [{
                            label: '營業額',
                            data:
                            <?php
                            $revenueArray = '[';
                            foreach($revenues as $revenue)
                            {
                                $revenueArray = $revenueArray . $revenue->revenue . ',';
                            }
                            $revenueArray = substr($revenueArray, 0 ,-1);
                            $revenueArray = $revenueArray . ']';
                            echo $revenueArray;
                            ?>
                            ,
                            backgroundColor: "rgba(255,153,0,1)"
                        },
                            {
                                label: '毛利',
                                data:
                                <?php
                                $profitArray = '[';
                                foreach($revenues as $revenue)
                                {
                                    $profitArray = $profitArray . $revenue->profit . ',';
                                }
                                $profitArray = substr($profitArray, 0 ,-1);
                                $profitArray = $profitArray . ']';
                                echo $profitArray;
                                ?>
                                ,
                                backgroundColor: "rgba(153,255,51,1)"
                            }
                        ]
                    }
                });
            }
        </script>

        <!-- /.row -->
    </div>

    <!-- /.col-sm-12 -->
@endsection