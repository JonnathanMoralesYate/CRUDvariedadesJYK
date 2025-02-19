const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'verde'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3, 11],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });


  const ctx1 = document.getElementById('myChart1');

  new Chart(ctx1, {
    type: 'radar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'verde'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3, 11],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });


  const ctx2 = document.getElementById('myChart2');

  new Chart(ctx2, {
    type: 'polarArea',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'verde'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3, 11],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });


  const ctx3 = document.getElementById('myChart3');

  new Chart(ctx3, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'verde'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3, 11],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });