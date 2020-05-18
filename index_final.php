
<html>
<head>
<title>Corona Update for Bangladesh</title>
<?php include('header.php'); ?>
<body>


<div class="container">


<!-- <div class="row">

<div class="col-xs-12 col-sm-12 col-lg-12" style="display: flex; flex-direction: column;">
<div style="text-align: center">
<div data-type="AwesomeTableView" data-filters="" data-viewID="-M5Jdg2PsV02VVkpZ9EZ"></div>
</div>
</div>
</div> -->



<h2>COVID-19: Summary of Bangladesh (DATA SOURCE: IEDCR, DGHS) <a href="index.php" target="_blank">See World Summary</a></h2> 

<?Php
require "config.php";// Database connection

 

$result = mysqli_query($connection,"SELECT max(total_affected) as total FROM corona_final");
$row1 = mysqli_fetch_array($result);


$result1 = mysqli_query($connection,"SELECT max(total_deaths) as total1 FROM corona_final");
$deaths = mysqli_fetch_array($result1);

$result2 = mysqli_query($connection,"SELECT max(total_recovered) as total2 FROM corona_final");
$recover = mysqli_fetch_array($result2);


$result3 = mysqli_query($connection,"SELECT max(total_qua) as total3 FROM quarantine_final");
$qua = mysqli_fetch_array($result3);



$result4 = mysqli_query($connection,"SELECT max(total_relea_qua) as total4 FROM quarantine_final");
$qua_release = mysqli_fetch_array($result4);



$result5 = mysqli_query($connection,"SELECT max(total_iso) as total5 FROM quarantine_final");
$iso = mysqli_fetch_array($result5);


$result6 = mysqli_query($connection,"SELECT max(total_releas_iso) as total6 FROM quarantine_final");
$iso_relea = mysqli_fetch_array($result6);



$male = mysqli_query($connection,"SELECT max(male) as male FROM corona_final");
$male_result = mysqli_fetch_array($male);


$female = mysqli_query($connection,"SELECT max(female) as female FROM corona_final");
$female_result = mysqli_fetch_array($female);

$test = mysqli_query($connection,"SELECT max(total_test) as test FROM corona_final");
$test_result = mysqli_fetch_array($test);
  ?>


              <section class="jumbotron text-center">

                <div class="container-fluid">
                  <div class="row">

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-primary text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Cases</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo $row1["total"]; ?> </span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Today's cases: 
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-danger text-white shadow-lg rounded h-100">

                        <div class="card-body">
                          <h5 class="card-title">Total Deaths</h5>
                          <p class="card-text">
                         <span class="btn btn-secondary"> <?php echo $deaths["total1"]; ?> </span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Today's deaths: <span id="today_deaths"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-success text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Recovered</h5>
                          <p class="card-text">
                          <span class="btn btn-secondary"> <?php echo $recover["total2"]; ?> </span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Affected Countries: <span id="total_countries"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>


                     <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Active Cases</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo ($row1["total"]-($deaths["total1"]+$recover["total2"])); ?></span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Deaths / Million: <span id="total_deaths_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>


                 <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-dark text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Closed Cases</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo (($deaths["total1"]+$recover["total2"])); ?></span>
                          </p>
                        </div>
                       <!-- <div class="card-footer">
                          <small>
                            Deaths / Million: <span id="total_deaths_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-warning text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Tests</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo $test_result["test"]; ?></span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Tests per million: <span id="total_tests_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                  </div>
                  <!-- ./row -->



                  <div class="row">

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Male</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo $male_result["male"]; ?></span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Today's cases: 
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">

                        <div class="card-body">
                          <h5 class="card-title">Total Female</h5>
                          <p class="card-text">
                         <span class="btn btn-secondary"><?php echo $female_result["female"]; ?></span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Today's deaths: <span id="today_deaths"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Quarantine</h5>
                          <p class="card-text">
                          <span class="btn btn-secondary"><?php echo $qua["total3"]; ?> </span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Affected Countries: <span id="total_countries"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>


                     <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Recovered Quarantine</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo $qua_release ["total4"]; ?></span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Deaths / Million: <span id="total_deaths_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>


                 <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Isolation</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo $iso["total5"]; ?></span>
                          </p>
                        </div>
                       <!-- <div class="card-footer">
                          <small>
                            Deaths / Million: <span id="total_deaths_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Recovered Isolation</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo $iso_relea["total6"]; ?></span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Tests per million: <span id="total_tests_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                  </div>
                  <!-- ./row -->

                </div>
              </section>




<div class="row">

<div class="col-xs-12 col-sm-12 col-lg-12" style="display: flex; flex-direction: column;">
<div style="text-align: center">

<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1q20JpbG3_FP-MjCRiBlmzIOgdbgx_mSV&z=7" width="640" height="600"></iframe>

</div>

</div>

</div>






<!-- 
<div class="row">
<div class="col-xs-12 col-sm-12 col-lg-12">
<div style="text-align: center">
<iframe src="https://ourworldindata.org/grapher/total-cases-covid-19?tab=map"  width="640" height="500px"></iframe>

</div>
</div>
</div>


<div class="row">
<div class="col-xs-12 col-sm-12 col-lg-12">
<div style="text-align: center">
<iframe src="https://ourworldindata.org/grapher/total-deaths-covid-19?country=ITA+ESP+USA" width="640" style="height:500px; border: 0px none;"></iframe>

</div>
</div>
</div> 
-->





</div>
  <?php include('footer.php');?>

</body></html>







