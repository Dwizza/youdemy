<?php include_once 'header.php';?>

        <!-- Contenu principal -->
        <div class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Tableau de bord</h2>
                <div class="flex items-center">
                    <input type="text" placeholder="Rechercher..." class="px-4 py-2 border rounded-lg mr-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">Rechercher</button>
                </div>
            </div>

            <!-- Validation des comptes enseignants -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h3 class="text-xl font-bold mb-4">Validation des comptes enseignants</h3>
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2">Nom</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once '../classes/userRepo.php';
                        $users = UserRepo::displayPendingUsers();
                        foreach($users as $user){
                            echo "<tr class='border-b text-center'>";
                                echo  "<td class='p-1'>".$user['username']."</td>";
                                echo "<td class='p-1'>".$user['email']."</td>";
                                echo "<td class='p-2 flex justify-center gap-4'>";
                                echo "<a href='../classes/is_active.php?id=".$user['user_id']."&status=activer' class='bg-green-500 text-white px-3 py-2 rounded text-sm cursor-pointer'><b>Valider</b></a>";
                                echo "<a href='../classes/is_active.php?id=".$user['user_id']."&status=delete' class='bg-red-500 text-white px-3 py-2 rounded text-sm cursor-pointer'><b>Supprimer</b></a>";
                                echo "</td></tr>";
                        }

                        ?>
                        <!-- Ajouter plus de lignes ici -->
                    </tbody>
                </table>
            </div>

            <!-- Statistiques -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h3 class="text-xl font-bold mb-4">Statistiques</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="text-lg font-bold">Nombre total de cours</h4>
                        <p class="text-2xl">45</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="text-lg font-bold">Cours avec le plus d'étudiants</h4>
                        <p class="text-2xl">Développement Web</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="text-lg font-bold">Top 3 enseignants</h4>
                        <ul>
                            <li>1. John Doe</li>
                            <li>2. Jane Doe</li>
                            <li>3. Alice Smith</li>
                        </ul>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="text-lg font-bold">Répartition par catégorie</h4>
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour Chart.js -->
    <script>
        const categoryChart = document.getElementById('categoryChart').getContext('2d');
        const myChart = new Chart(categoryChart, {
            type: 'pie',
            data: {
                labels: ['Développement', 'Design', 'Business', 'Marketing'],
                datasets: [{
                    data: [30, 20, 15, 35],
                    backgroundColor: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444'],
                }]
            },
        });
    </script>
    <?php include_once 'footer.php';?>
