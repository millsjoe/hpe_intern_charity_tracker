var ctx = document.getElementById("totalHours").getContext("2d");
var myChart = new Chart(ctx, {
  type: "pie",
  data: {
    labels: ["Completed", "Left to Complete"],
    datasets: [
      {
        label: "Hours Volunteered",
        data: [360, 270],
        backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(54, 162, 235, 0.2)"],
        borderColor: ["rgba(255,99,132,1)", "rgba(54, 162, 235, 1)"],
        borderWidth: 4
      }
    ]
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            fontColor: "white",
            fontSize: 18,
            stepSize: 1,
            beginAtZero: true
          }
        }
      ],
      xAxes: [
        {
          ticks: {
            fontColor: "white",
            fontSize: 14,
            stepSize: 1,
            beginAtZero: true
          }
        }
      ]
    },
    legend: {
      display: false,
      labels: {
        usePointStyle: true
      },
      labels: {
        fontColor: "white",
        fontSize: 18
      },
      padding: 10
    }
  }
});
