<div class="col s12 m6">
	<h4>Miembros</h4>
	<canvas id="miembrosE"></canvas>	
</div>
<div class="col s12 m6">
	<h4>Invitados</h4>
	<canvas id="invitadosE"></canvas>
</div>
<script>
var ctx = document.getElementById("miembrosE").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Bebés", "Niños","Adolecentes","Jovenes","Adultos"],
        datasets: [{
            label: 'Cantidad',
            data: [<?=$bebeM?>,<?=$ninoM?>,<?=$adolM?>,<?=$jovenM?>,<?=$adultM?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 191, 0,0.2)',
                'rgba(2, 214, 83,0.2)',
                'rgba(255,0,0,0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 191, 0,1)',
                'rgba(2, 214, 83,1)',
                'rgba(255,0,0,1)'
            ],
            borderWidth: 2
        }]
    },
    
});
</script>
<script>
var ctx = document.getElementById("invitadosE").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
     data: {
        labels: ["Bebés", "Niños","Adolecentes","Jovenes","Adultos"],
        datasets: [{
            label: 'Cantidad',
            data: [<?=$bebeI?>,<?=$ninoI?>,<?=$adolI?>,<?=$jovenI?>,<?=$adultI?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 191, 0,0.2)',
                'rgba(2, 214, 83,0.2)',
                'rgba(255,0,0,0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 191, 0,1)',
                'rgba(2, 214, 83,1)',
                'rgba(255,0,0,1)'
            ],
            borderWidth: 2
        }]
    },
    
});
</script>