$(function () {
    // top bar active
    $('#Analyse').addClass('active');
    // sub manin
    $('#GrapheAnalyse').addClass('active');
    // order date picker
    $("#startDate").datepicker();
    // order date picker
    $("#endDate").datepicker();
});
var ctx = document.getElementById("myChart1").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Janvier", "février", "Mars", "Avril", "Mai", "Juin", "Juillet", "aout", "Sptembre", "Octobre", "Novembre", "Décembre"],
        datasets: [{
            label: 'Les gain par mois',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',

            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
var ctx1 = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx1, {
  type: 'bar',
  data: {
    labels: ['Janvier', 'février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'aout', 'Sptembre', 'Octobre', 'Novembre', 'Décembre'],
    datasets: [{
      label: 'Les dépenses',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
      backgroundColor: "rgba(255,153,0,0.4)"
    }, {
      label: 'Les recettes',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
      backgroundColor: "rgba(75, 192, 192, 0.4)"
    }]
  }
});

function generateStatistic() {
    var startDate=$('#startDate').val();
    var endDate=$('#endDate').val();
    $.ajax({
        url: '../../php_action/getStatisticData.php',
        type: 'post',
        data: {startDate : startDate,endDate : endDate},
        dataType: 'json',
        success:function(response) {
            console.log('salut'+response);
            console.log('salut'+response.Sum(paid));
        }
    })
}

