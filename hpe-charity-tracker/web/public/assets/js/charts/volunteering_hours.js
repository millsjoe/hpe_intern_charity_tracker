var ctx = document.getElementById("volunteeringChart").getContext("2d");
var staticHours = [42, 55.5, 65, 37.5, 38, 22];
var myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["Greg", "Joe", "Jordan", "Lewis", "Keris", "James"],
    datasets: [
      {
        label: "Hours Volunteered",
        data: staticHours,
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)"
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)"
        ],
        borderWidth: 6
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
            stepSize: 5,
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
