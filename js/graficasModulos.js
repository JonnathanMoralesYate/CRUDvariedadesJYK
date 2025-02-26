//codigo grafica Productos mas Vendidos
const ctx = document.getElementById('myChart').getContext('2d');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Verde'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3, 11],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(0, 200, 0, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(0, 200, 0, 1)'
      ],
      borderWidth: 2
    }]
  },
  options: {
    plugins: {
      legend: {
        labels: {
          color: 'white' // Hace que el texto de la leyenda sea blanco
        }
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          color: 'white'
        },
        grid: {
          color: 'rgba(0, 0, 0, 0.1)'
        }
      },
      x: {
        ticks: {
          color: 'white'
        },
        grid: {
          color: 'rgba(0, 0, 0, 0.1)'
        }
      }
    }
  }
});

//codigo grafica Ventas
const ctx1 = document.getElementById('myChart1').getContext('2d');

new Chart(ctx1, {
  type: 'radar',
  data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Verde'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3, 11],
      backgroundColor: 'rgba(255, 255, 255, 0.2)', // Fondo semi-transparente
      borderColor: 'white', // Bordes blancos
      pointBackgroundColor: 'white', // Puntos blancos
      pointBorderColor: 'black', // Borde de los puntos
      pointRadius: 5, // Tamaño de los puntos
      borderWidth: 2
    }]
  },
  options: {
    plugins: {
      legend: {
        labels: {
          color: 'white' // Color de la leyenda en blanco
        }
      }
    },
    scales: {
      r: {
        angleLines: {
          color: 'rgba(255, 255, 255, 0.3)' // Líneas del radar semi-transparentes
        },
        grid: {
          color: 'rgba(255, 255, 255, 0.2)' // Líneas de la cuadrícula semi-transparentes
        },
        pointLabels: {
          color: 'white', // Etiquetas de los ejes en blanco
          font: {
            size: 14
          }
        },
        ticks: {
          color: 'white', // Valores de los ejes en blanco
          backdropColor: 'transparent', // Sin fondo en los valores
        }
      }
    }
  }
});

//codigo de grafica de entradas y salidas
const ctx2 = document.getElementById('myChart2').getContext('2d');

new Chart(ctx2, {
  type: 'polarArea',
  data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Verde'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3, 11],
      backgroundColor: [
        'rgba(255, 99, 132, 0.6)',  // Rojo
        'rgba(54, 162, 235, 0.6)',  // Azul
        'rgba(255, 206, 86, 0.6)',  // Amarillo
        'rgba(75, 192, 192, 0.6)',  // Verde
        'rgba(153, 102, 255, 0.6)', // Púrpura
        'rgba(255, 159, 64, 0.6)',  // Naranja
        'rgba(0, 200, 0, 0.6)'      // Verde claro
      ],
      borderColor: 'white', // Bordes blancos
      borderWidth: 2
    }]
  },
  options: {
    plugins: {
      legend: {
        labels: {
          color: 'white', // Color de la leyenda en blanco
          font: {
            size: 14
          }
        }
      }
    },
    scales: {
      r: {
        grid: {
          color: 'rgba(255, 255, 255, 0.2)' // Líneas de la cuadrícula semi-transparentes
        },
        angleLines: {
          color: 'rgba(255, 255, 255, 0.3)' // Líneas de los ejes semi-transparentes
        },
        ticks: {
          color: 'white', // Color de los valores numéricos
          backdropColor: 'transparent' // Sin fondo detrás de los valores
        }
      }
    }
  }
});

//codigo de grafica productos de menor stock
const ctx3 = document.getElementById('myChart3').getContext('2d');

new Chart(ctx3, {
  type: 'line',
  data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Verde'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3, 11],
      borderColor: 'white', // Línea blanca
      backgroundColor: 'rgba(255, 255, 255, 0.3)', // Fondo semi-transparente para los puntos
      pointBackgroundColor: 'lightblue', // Puntos con fondo azul claro
      pointBorderColor: 'white', // Bordes de los puntos blancos
      pointRadius: 6, // Tamaño de los puntos
      borderWidth: 2, // Grosor de la línea
      tension: 0.4 // Suaviza la línea
    }]
  },
  options: {
    plugins: {
      legend: {
        labels: {
          color: 'white', // Color de la leyenda en blanco
          font: {
            size: 14
          }
        }
      }
    },
    scales: {
      x: {
        ticks: {
          color: 'white' // Color de las etiquetas en eje X
        },
        grid: {
          color: 'rgba(255, 255, 255, 0.2)' // Líneas de la cuadrícula semi-transparentes
        }
      },
      y: {
        beginAtZero: true,
        ticks: {
          color: 'white' // Color de los valores en eje Y
        },
        grid: {
          color: 'rgba(255, 255, 255, 0.2)' // Líneas de la cuadrícula semi-transparentes
        }
      }
    }
  }
});