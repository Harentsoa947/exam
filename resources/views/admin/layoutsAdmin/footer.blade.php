<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script>
    const voir_plus = document.querySelector('#btnIcon')
    document.querySelector('#btnIcon').addEventListener('click', function(e){
        console.log(this);
        this.style.display = 'none';
    })
    document.querySelector('#voir_moins').addEventListener('click', function(){
        voir_plus.style.display = "block"
    })
</script>
<script>
    const labels = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Call français',
            data: [0, 159, 180, 181, 156, 155, 640, 0, 159, 180, 181, 156, 155, 640],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }, {
            label: 'Call Anglais',
            data: [30, 59, 80, 81, 456, 755, 240, 0, 159, 180, 981, 156, 155, 640],
            fill: false,
            borderColor: 'red',
            tension: 0.1
        }, 
        {
            label: 'Bureautique',
            data: [30, 59, 380, 81, 456, 755, 940, 0, 159, 180, 981, 56, 155, 640],
            fill: false,
            borderColor: 'green',
            tension: 0.1,
            hidden: true
        },
        {
            label: 'Dev web',
            data: [30, 59, 800, 81, 456, 755, 240,20, 159, 180, 91, 156, 155, 640],
            fill: false,
            borderColor: 'blue',
            tension: 0.1,
            hidden: true
        },
        {
            label: 'Python',
            data: [30, 59, 80, 81, 456, 75, 240, 0, 159, 980, 981, 156, 5, 640],
            fill: false,
            borderColor: 'black',
            tension: 0.1,
            hidden: true
        }],
        
    };

    const config = {
        type: 'line',
        data: data,
    };

    const ctx = document.getElementById('monGraphique').getContext('2d');
    new Chart(ctx, config);

    const donut = document.getElementById('donut').getContext('2d')
    const myChart2 = new Chart(donut, {
        type: 'doughnut',
        
        data:{
            labels: [
                'Call Français',
                'Call Anglais',
                'Bureautique',
                'Dev web',
                'Python',
            ],
            datasets: [{
                label: 'Etudiants',
                data: [300, 150, 100, 300, 89],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'red',
                    'yellow'
                ],
                hoverOffset: 4
            }]
        }
    })
</script>