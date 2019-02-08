var ctx = document.getElementById("yourHours").getContext("2d");
var myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["Greg", "Joe", "Jordan", "Lewis"],
    datasets: [
      {
        label: "Hours Volunteered",
        data: [31, 40, 28, 40],
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)"
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)"
        ],
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
