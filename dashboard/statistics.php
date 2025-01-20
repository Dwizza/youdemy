<?php include_once 'header.php'; ?>
<div class="bg-white w-full p-6 rounded-lg shadow-md mb-8">
    <h3 class="text-xl font-bold mb-4">Statistiques détaillées</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-gray-100 p-4 rounded-lg">
            <h4 class="text-lg font-bold">Top 3 enseignants</h4>
            <ul>
                <li>1. John Doe</li>
                <li>2. Jane Doe</li>
                <li>3. Alice Smith</li>
            </ul>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg">
            <h4 class="text-lg font-bold">Cours avec le plus d'étudiants</h4>
            <p class="text-2xl">Développement Web</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg">
            <h4 class="text-lg font-bold">Répartition par catégorie</h4>
            <canvas id="categoryChart" class="w-full h-40 md:h-48"></canvas>
        </div>
    </div>
</div>
<script>
    const categoryChart = document.getElementById('categoryChart').getContext('2d');
    const myChart = new Chart(categoryChart, {
        type: 'pie',
        data: {
            labels: ['Développement web', 'Design', 'Business', 'Marketing'],
            datasets: [{
                data: [2, 0, 1, 3],
                backgroundColor: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444'],
            }]
        },
    });
</script>
<?php include_once 'footer.php'; ?>