<?php include_once 'header.php';?>

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center mb-8" style="color: #059669;">Ajouter un Nouveau Cours</h1>
    <form class="bg-white p-6 rounded-lg shadow-md">
        <!-- Titre du cours -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Titre du Cours</label>
            <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Entrez le titre du cours" required>
        </div>

        <!-- Description du cours (textarea simple) -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Entrez la description du cours" required></textarea>
        </div>
        <div>
            <select name="" id=""></select>
        </div>
        <div class="mb-4">
            <label for="thumbnail" class="block text-gray-700 font-bold mb-2">Thumbnail du Cours</label>
            <!-- Champ d'upload de fichier stylisé -->
            <div class="flex items-center justify-center w-full">
                <label for="thumbnail" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L7 9m3-3 3 3"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Cliquez pour uploader</span> ou glissez-déposez</p>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG (MAX. 2MB)</p>
                    </div>
                    <input type="file" id="thumbnail" name="thumbnail" class="hidden" accept="image/*" required>
                </label>
            </div>
            <!-- Aperçu de l'image sélectionnée -->
            <div id="thumbnail-preview" class="mt-4 hidden">
                <img id="preview-image" class="w-32 h-32 object-cover rounded-lg border border-gray-200" src="#" alt="Aperçu de la thumbnail">
            </div>
        </div>

        <!-- Catégorie du cours -->
        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-bold mb-2">Catégorie</label>
            <select id="category" name="category" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <?php 
                include_once '../classes/category.php';
                $categories = category::displayCategories();
                foreach($categories as $category){
                    echo "<option value='".$category['id']."'>".$category['name']."</option>";
                }
                ?>
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
<script>
    document.getElementById('thumbnail').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Récupérer le fichier sélectionné
        const previewContainer = document.getElementById('thumbnail-preview');
        const previewImage = document.getElementById('preview-image');

        if (file) {
            const reader = new FileReader(); // Lire le fichier

            reader.onload = function(e) {
                previewImage.src = e.target.result; // Mettre à jour la source de l'image
                previewContainer.classList.remove('hidden'); // Afficher l'aperçu
            };

            reader.readAsDataURL(file); // Convertir le fichier en URL
        } else {
            previewContainer.classList.add('hidden'); // Cacher l'aperçu si aucun fichier n'est sélectionné
        }
    });
</script>
<?php include_once 'footer.php';?>