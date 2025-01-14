<?php include_once 'header.php'; ?>
<div class="bg-white w-full p-6 rounded-lg shadow-md">
    <h3 class="text-xl font-bold mb-4">Gestion des catégories et tags</h3>

    <!-- Section Catégories -->
    <div class="mb-6">
        <h4 class="text-lg font-semibold mb-2">Catégories</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Carte Catégorie 1 -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h5 class="font-bold text-gray-700">Informatique</h5>
                <p class="text-sm text-gray-500">12 cours</p>
                <div class="mt-2">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Modifier</button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded text-sm ml-2">Supprimer</button>
                </div>
            </div>

            <!-- Carte Catégorie 2 -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h5 class="font-bold text-gray-700">Design</h5>
                <p class="text-sm text-gray-500">8 cours</p>
                <div class="mt-2">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Modifier</button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded text-sm ml-2">Supprimer</button>
                </div>
            </div>

            <!-- Carte Catégorie 3 -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h5 class="font-bold text-gray-700">Business</h5>
                <p class="text-sm text-gray-500">5 cours</p>
                <div class="mt-2">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Modifier</button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded text-sm ml-2">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Tags -->
    <div>
        <h4 class="text-lg font-semibold mb-2">Tags</h4>
        <div class="mb-4">
            <!-- Liste des Tags -->
            <div class="flex flex-wrap gap-2">
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">HTML</span>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">CSS</span>
                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">JavaScript</span>
                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">React</span>
            </div>
        </div>

        <!-- Formulaire d'ajout de Tags -->
        <div>
            <h5 class="font-semibold mb-2">Ajouter des tags</h5>
            <form class="flex gap-2">
                <input type="text" placeholder="Entrez un tag" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter</button>
            </form>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>