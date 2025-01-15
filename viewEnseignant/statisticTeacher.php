<?php include_once 'header.php';?>
<div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-center mb-8">Statistiques des Cours</h1>

        <!-- Section Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Carte : Nombre d'étudiants inscrits -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-xl font-semibold mb-2">Étudiants Inscrits</h2>
                <p class="text-4xl font-bold text-blue-600">1,250</p>
                <p class="text-gray-500">+50 cette semaine</p>
            </div>

            <!-- Carte : Nombre de cours -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-xl font-semibold mb-2">Nombre de Cours</h2>
                <p class="text-4xl font-bold text-green-600">85</p>
                <p class="text-gray-500">+5 nouveaux cours</p>
            </div>

            <!-- Carte : Taux de complétion -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-xl font-semibold mb-2">Taux de Complétion</h2>
                <p class="text-4xl font-bold text-purple-600">78%</p>
                <p class="text-gray-500">en moyenne</p>
            </div>
        </div>

        <!-- Tableau des cours populaires -->
        <div class="mt-12 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Cours les Plus Populaires</h2>
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b">
                        <th class="py-2">Nom du Cours</th>
                        <th class="py-2">Étudiants Inscrits</th>
                        <th class="py-2">Taux de Complétion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-4">Développement Web</td>
                        <td class="py-4">320</td>
                        <td class="py-4">85%</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4">Design Graphique</td>
                        <td class="py-4">280</td>
                        <td class="py-4">78%</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4">Marketing Digital</td>
                        <td class="py-4">250</td>
                        <td class="py-4">72%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php include_once 'footer.php';?>