
<html>
<head>
<title>Corona Update for Bangladesh</title>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<script type="text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>



  <script src="data.js"></script>

  <script src="https://awesome-table.com/AwesomeTableInclude.js"></script>

<link rel="stylesheet" type="text/css" href="jquery-jvectormap-2.0.5.css">
  <script src="jquery-jvectormap-2.0.5.min.js"></script>
    <script src="world.js"></script>
       <script>
      document.addEventListener("contextmenu", function(e){
        e.preventDefault();
      }, false);
    </script>


  <style type="text/css">
  .hide-embed {
    position: relative;
    width: 100%;
    min-height: 40px;
    background-color: #fff;
    bottom: 40px;
     }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    
</head>
<body>


<div class="container">

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
  <a class="navbar-brand" href="#">COVID-19</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="worldmapindex.php" tabindex="-1" aria-disabled="true">World</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="index_final.php">Bangladesh<span class="sr-only">(current)</span></a>
      </li>
    <!--   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->


      <li class="nav-item">
        <a class="nav-link" href="bdanalysis.php" tabindex="-1" aria-disabled="true">BD Analysis</a>
      </li>    


      <li class="nav-item">
        <a class="nav-link" href="analysis.php" tabindex="-1" aria-disabled="true">World Analysis</a>
      </li>

    </ul>
   
  </div>
</nav>



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
  <footer class="footer fixed-bottom py-1 bg-light border-top shadow-sm small">
      <div class="container-fluid">
        <div class="float-md-left">
          <b>Sponsor: <a href="https://proconf.org" target="_blank"> PROCONF</a></b></h2> 
          <small class="text-muted">
            Updated at: <span class="updated_at"></span>
          </small>
        </div>
        <div class="float-md-right">
          Developed by
          <a target="_blank" href="https://sites.google.com/view/mdmahfujurrahman" title="Md. Mahfujur Rahman">Md. Mahfujur Rahman</a>
          
        </div>
      </div>
    </footer>

</body></html>



