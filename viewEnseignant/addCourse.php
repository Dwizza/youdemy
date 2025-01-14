<?php include_once 'header.php';?>

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8" style="color: #059669;">Ajouter un Nouveau Cours</h1>
        <form class="bg-white p-6 rounded-lg shadow-md">
            <!-- Titre du cours -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Titre du Cours</label>
                <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Entrez le titre du cours" required>
            </div>

            <!-- description du cours du cours (textarea simple) -->
            <div class="mb-4">
                <label for="contenu" class="block text-gray-700 font-bold mb-2">Contenu du cours</label>
                <textarea id="contenu" name="contenu" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Entrez la contenu du cours" required></textarea>
            </div>

            <!-- Contenu du cours (textarea avec TinyMCE) -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Catégorie du cours -->
            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-bold mb-2">Catégorie</label>
                <select id="category" name="category" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="" disabled selected>Sélectionnez une catégorie</option>
                    <option value="web">Développement Web</option>
                    <option value="design">Design</option>
                    <option value="business">Business</option>
                    <option value="marketing">Marketing</option>
                </select>
            </div>

            <!-- Bouton de soumission -->
            <div class="text-center">
                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-[#059669]">
                    Ajouter le Cours
                </button>
            </div>
        </form>
    </div>
</body>
</html>