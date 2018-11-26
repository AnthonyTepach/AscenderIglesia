<div class="col s12 m6">
	<h4>Miembros</h4>
	<canvas id="miembros"></canvas>	
</div>
<div class="col s12 m6">
	<h4>Invitados</h4>
	<canvas id="invitados"></canvas>
</div>

<script>
var ctx = document.getElementById("miembros").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Mujeres", "Hombres"],
        datasets: [{
            label: '# of Votes',
            data: [<?=$totalMM?>,<?=$totalHM?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.3)',
                'rgba(54, 162, 235, 0.3)'
                
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
                
            ],
            borderWidth: 2
        }]
    },
    
});
</script>
<script>
var ctx = document.getElementById("invitados").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Mujeres", "Hombres"],
        datasets: [{
            label: '# of Votes',
            data: [<?=$totalMI?>,<?=$totalHI?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.3)',
                'rgba(54, 162, 235, 0.3)'
                
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
                
            ],
            borderWidth: 2
        }]
    },
    
});
</script>