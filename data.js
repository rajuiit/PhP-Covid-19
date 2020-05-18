$(document).ready(function(){
  var countries_api_url = "https://corona.lmao.ninja/v2/countries?sort=cases";
  var global_summary_api_url = "https://corona.lmao.ninja/v2/all";
  var country_summary_api_base_url = "https://corona.lmao.ninja/v2/countries/";
  var country_historical_api_base_url = "https://corona.lmao.ninja/v2/historical/";


  var corona_global_data = {};
  var total_countries = 0;
  var total_deaths = 0;
  var total_cases = 0;
  var total_recovered = 0;
  var today_cases = 0;
  var today_deaths = 0;
  var total_active = null;
  var total_critical = null;
  var total_tests = null;
  var total_cases_per_million = null;
  var total_deaths_per_million = null;
  var total_tests_per_million = null;
  var highest_death = 0;
  var highest_death_country = "";
  var countries = [];
  var confirmed_case_color = "#17a2b8";
  var death_case_color = "#dc3545";
  var recovered_case_color = "#28a745";
  var active_case_color = "#ffc107";
  var summary_max_country = 6;
  var worldmap_max_country = 10;
  var default_start_color = [200, 238, 255];
  var default_end_color = [0, 100, 145];
  var confirmed_start_color = [235, 248, 250];
  var confirmed_end_color = [57, 183, 205];
  var death_start_color = [255,229,229];
  var death_end_color = [102, 0, 0];
  var recovered_start_color = [239, 245, 239];
  var recovered_end_color = [56, 94, 15];
  var active_start_color = [255, 251, 230];
  var active_end_color = [139, 117, 0];



  function get_country_flag(country_code){
    return "https://www.countryflags.io/"+country_code+"/shiny/64.png";
  }


  $.getJSON(global_summary_api_url).done(function(data){
    total_countries=data.affectedCountries;
    total_cases=data.cases;
    total_deaths=data.deaths;
    total_recovered=data.recovered;
    total_critical = data.critical;
    total_active = data.active;
    total_tests = data.tests;
    total_cases_per_million = data.casesPerOneMillion;
    total_deaths_per_million = data.deathsPerOneMillion;
    total_tests_per_million = data.testsPerOneMillion;
    today_cases = data.todayCases;
    today_deaths = data.todayDeaths;

    updated_at=new Date(data.updated);
    $("#total_countries").html(total_countries.toLocaleString());
    $("#total_cases").html(total_cases.toLocaleString());
    $("#total_deaths").html(total_deaths.toLocaleString());
    $("#total_recovered").html(total_recovered.toLocaleString());
    $("#total_deaths").html(total_deaths.toLocaleString());
    $("#total_recovered").html(total_recovered.toLocaleString());
    $("#total_active").html(total_active.toLocaleString());
    $("#total_critical").html(total_critical.toLocaleString());
    $("#total_tests").html(total_tests.toLocaleString());
    $("#total_tests_per_million").html(total_tests_per_million.toLocaleString());
    $("#total_cases_per_million").html(total_cases_per_million.toLocaleString());
    $("#total_deaths_per_million").html(total_deaths_per_million.toLocaleString());
    $("#today_cases").html(today_cases.toLocaleString());
    $("#today_deaths").html(today_deaths.toLocaleString());
    $(".updated_at").html(updated_at.toLocaleString());
    total_deaths_percent = (total_deaths/total_cases)*100.0;
    total_recovered_percent = (total_recovered/total_cases)*100.0;
    $("#total_deaths_percent").html(total_deaths_percent.toLocaleString());
    $("#total_recovered_percent").html(total_recovered_percent.toLocaleString());
  });




  $.getJSON(countries_api_url).done(function(data){
    var countries_data = [];
    var chart_labels = [], confirmed_series = [], death_series = [], active_series = [], recovered_series = [];
    var country_counter = 0;


    $.each(data, function(i, item){
      if(item.country == "World"){
        return true;
      }
      corona_global_data[item.countryInfo.iso2] = {
        "country": item.country,
        "cases":item.cases,
        "today_cases":item.todayCases,
        "deaths":item.deaths,
        "today_deaths":item.todayDeaths,
        "recovered":item.recovered,
        "active":item.active,
        "critical":item.critical,
        "tests":item.tests,
        "tests_per_million":item.testsPerOneMillion,
        "cases_per_million":item.casesPerOneMillion,
        "deaths_per_million":item.deathsPerOneMillion
      }

 

    var country_row = "<tr>";
      country_row += "<td>";
      var country_flag = "";
      if(typeof(item.countryInfo.iso2)=="string"){
        countries.push([item.countryInfo.iso2, item.country]);
        if(item.deaths>highest_death){
          highest_death=item.deaths;
          highest_death_country=item.country;
        }
        country_flag = get_country_flag(item.countryInfo.iso2.toLowerCase());
      }
      country_row += "<img class='flag' src='"+country_flag+"' alt='"+item.country+"'/>";
      country_row += "</td>";

      country_row += "<td>";
      var country_url = '<button class="btn btn-outline-dark btn-sm btn-block country_btn" country_code="'+item.countryInfo.iso2+'">'+item.country+'</button>';
      country_row += country_url;
      country_row += "</td>";

      country_row += "<td>";
      country_row += item.cases.toLocaleString();
      country_row += "</td>";

      country_row += "<td class='table-info'>";
      country_row += item.todayCases.toLocaleString();
      country_row += "</td>";

      country_row += "<td>";
      country_row += item.casesPerOneMillion;
      country_row += "</td>";

      country_row += "<td>";
      country_row += item.deaths.toLocaleString();
      country_row += "</td>";

      country_row += "<td class='table-danger'>";
      country_row += item.todayDeaths.toLocaleString();
      country_row += "</td>";

      country_row += "<td>";
      country_row += item.deathsPerOneMillion;
      country_row += "</td>";

      country_row += "<td>";
      country_row += item.tests.toLocaleString();
      country_row += "</td>";

      country_row += "<td>";
      country_row += item.testsPerOneMillion.toLocaleString();
      country_row += "</td>";

      country_row += "<td>";
      country_row += item.recovered.toLocaleString();
      country_row += "</td>";

      country_row += "<td>";
      country_row += item.active.toLocaleString();
      country_row += "</td>";

      country_row += "<td>";
      country_row += item.critical.toLocaleString();
      country_row += "</td>";

      country_row += "</tr>";
      $("#corona_country_rows").append(country_row);
    }); // end loop


     var corona_country_table = $('#corona_country_table').DataTable({"columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
    }]});

    $('#topbar_search').on( 'keydown', function () {
      corona_country_table.search( this.value ).draw();
    });

}); 



}); // end documents

