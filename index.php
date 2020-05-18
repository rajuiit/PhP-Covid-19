
<html>
<head>
<title>Corona Update for BD & World</title>


<?php include('header.php'); ?>

<body>

<div class="container">

<h2> World Summary Covid-19 (Data Source: World Meters)</h2>

      <section class="jumbotron text-center">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Cases</h5>
                          <p class="card-text">
                            <span id="total_cases"></span>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Today's cases: <span id="today_cases"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-danger text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Deaths</h5>
                          <p class="card-text">
                            <span id="total_deaths"></span>
                            <small>
                              (<span id="total_deaths_percent"></span>%)
                            </small>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Today's deaths: <span id="today_deaths"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-dark text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Cases / Million</h5>
                          <p class="card-text">
                            <span id="total_cases_per_million"></span>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Deaths / Million: <span id="total_deaths_per_million"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-success text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Recovered</h5>
                          <p class="card-text">
                            <span id="total_recovered"></span>
                            <small>
                              (<span id="total_recovered_percent"></span>%)
                            </small>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Affected Countries: <span id="total_countries"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-warning text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Active Cases</h5>
                          <p class="card-text">
                            <span id="total_active"></span>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Critical cases: <span id="total_critical"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-secondary text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Tests</h5>
                          <p class="card-text">
                            <span id="total_tests"></span>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Tests per million: <span id="total_tests_per_million"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                  </div>
                  <!-- ./row -->


                </div>
              </section>




<div class="row">
<div class="col-xs-12 col-sm-12 col-lg-12">
<div style="text-align: center">
<div class="mapcontainer" id="mapcontainer" style=" height: 500px"></div>
</div>
</div>
</div>





<script type="text/javascript">
  function loadmap(){

    $.ajax({

url: "https://corona.lmao.ninja/v2/countries",
success: function(data)
{


console.log(data);

var infectedData={};

var countryWiseDeaths={};
var countryWiseCured={};
var countryWiseActive={};
var todaysCase={};
var todaysDeaths={};
var totalTest={};
for (var i = 0; i < data.length;i++) {
  
  var elem=data[i];
  var cases=elem.cases;
  var country=elem.countryInfo.iso2;
 

  infectedData[country]=cases;
  countryWiseDeaths[country]=elem.deaths;
  countryWiseCured[country]=elem.recovered;
  countryWiseActive[country]= elem.active;
  todaysCase[country]= elem.todayCases;
  todaysDeaths[country]=elem.todayDeaths;

  totalTest[country]=elem.tests;
  
}


$('#mapcontainer').vectorMap({
map: 'world_merc',
series: {
regions: [{
values: infectedData,
scale: ['#C8EEFF', '#C70039'],
normalizeFunction: 'polynomial'
}]
},
onRegionTipShow: function(e, el, code){
  var html="";
  html += "<br>Total Cases:" + infectedData[code];
  html += "<br>Total Deaths:" + countryWiseDeaths[code];
  var deathPercent = parseFloat((countryWiseDeaths[code]/infectedData[code])*100).toFixed(2);
  html += "<br>Total Cured:" + countryWiseCured[code];
  html += "<br>Death Rate:" + deathPercent+"%";
  html += "<br>Active Cases:" + countryWiseActive[code];
  html += "<br>Today Cases:" + todaysCase[code];
  html += "<br>Today Deaths:" + todaysDeaths[code];
  html += "<br>Total Tests:" + totalTest[code];
  el.html(el.html()+ html);
}
});
console.log(infectedData);

}


    })


   // $('#mapcontainer').vectorMap({map: 'world_merc'});
  }

  loadmap();

</script>




              <div class="row">
                <div class="col-md-12">

                  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4>Worldwide COVID-19 All Data</h4>
                  </div>

                  <div class="table-responsive">
                    <table id="corona_country_table" class="table table-striped table-bordered table-sm">
                      <thead>
                        <tr>
                          <th class="no-sort">Flag</th>
                          <th>Country</th>
                          <th>Cases</th>
                          <th class="table-info">Today Cases</th>
                          <th>Cases / Million</th>
                          <th>Deaths</th>
                          <th class="table-danger">Today Deaths</th>
                          <th>Deaths / Million</th>
                          <th>Tests</th>
                          <th>Tests / Million</th>
                          <th>Recovered</th>
                          <th>Active</th>
                          <th>Critical</th>
                        </tr>
                      </thead>
                      <tbody id="corona_country_rows">
                      </tbody>
                    </table>
                  </div>
                  <!-- ./table-responsive -->
                </div>
                <!-- ./col-md-12 -->
              </div>





</div>
 <?php include('footer.php');?>

</body></html>



