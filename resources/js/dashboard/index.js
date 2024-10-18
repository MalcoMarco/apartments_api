import Chart from 'chart.js/auto';
/*const data = [
  { year: 2010, count: 10 },
  { year: 2011, count: 20 },
  { year: 2012, count: 15 },
  { year: 2013, count: 25 },
  { year: 2014, count: 22 },
  { year: 2015, count: 30 },
  { year: 2016, count: 28 },
];
const config =
{
  type: 'bar',
  options: {
    animation: false,
    plugins: {
      legend: {
        display: false
      },
      tooltip: {
        enabled: false
      }
    }
  },
  data: {
    labels: data.map(row => row.year),
    datasets: [
      {
        label: 'Acquisitions by year',
        data: data.map(row => row.count)
      }
    ]
  }
}*/

const data = {
    labels: [
      'Red',
      'Blue',
      'Yellow'
    ],
    datasets: [{
        label: 'My First Dataset',
        data: [300, 50, 100],
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
    }]
};
const config = {
    type: 'doughnut',
    data: data,
  };

//new Chart( document.getElementById('acquisitions'),config );
new Chart( document.getElementById('G1'),window.G1 );