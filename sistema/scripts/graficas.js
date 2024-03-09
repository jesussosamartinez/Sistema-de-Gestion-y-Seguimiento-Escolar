$.post("../ajax/seguimientos.php?op=graficaI", function(data, status){
  var data = JSON.parse(data);
    
(async function() {

   const chart = new Chart(
    document.getElementById('indiceAsignaturas'),
    {
      type: 'doughnut',
      data: {
        labels: data.aaData.map(row => row.asignatura),
        datasets: [
          {
            label: 'Reprobados',
            data: data.aaData.map(row => row.na)
          }
        ]
      },
      options: {
        plugins: {
            title: {
                display: true,
                text: 'Seguimiento I'
            }
        }
    }
    });
  
})();

});

$.post("../ajax/seguimientos.php?op=graficaII", function(data, status){
  var data = JSON.parse(data);
(async function() {
  

   const chart = new Chart(
    document.getElementById('indiceAsignaturasII'),
    {
      type: 'doughnut',
      data: {
        labels: data.aaData.map(row => row.asignatura),
        datasets: [
          {
            label: 'Reprobados',
            data: data.aaData.map(row => row.na)
          }
        ]
      },
      options: {
        plugins: {
            title: {
                display: true,
                text: 'Seguimiento II'
            }
        }
    }
    });
})();

});

$.post("../ajax/seguimientos.php?op=graficaIII", function(data, status){
  var data = JSON.parse(data);
(async function() {

   const chart = new Chart(
    document.getElementById('indiceAsignaturasIII'),
    {
      type: 'doughnut',
      data: {
        labels: data.aaData.map(row => row.asignatura),
        datasets: [
          {
            label: 'Reprobados',
            data: data.aaData.map(row => row.na)
          }
        ]
      },
      options: {
        plugins: {
            title: {
                display: true,
                text: 'Seguimiento III'
            }
        }
    }
    }
  );
})();

});

$.post("../ajax/seguimientos.php?op=graficaIV", function(data, status){
  var data = JSON.parse(data);
(async function() {
   const chart = new Chart(
    document.getElementById('indiceAsignaturasIV'),
    {
      type: 'doughnut',
      data: {
        labels: data.aaData.map(row => row.asignatura),
        datasets: [
          {
            label: 'Reprobados',
            data: data.aaData.map(row => row.na)
          }
        ]
      },
      options: {
        plugins: {
            title: {
                display: true,
                text: 'Seguimiento IV'
            }
        }
    }
    }
  );
})();

});
