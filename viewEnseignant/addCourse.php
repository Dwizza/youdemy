<?php include_once 'header.php';
include_once '../classes/course.php';
include_once '../config/database.php';
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['content'];
    $thumbnail = $_POST['thumbnail'];
    $category = $_POST['category'];
    $teacherId = $_SESSION["userid"];
    if($_POST['fileType'] == 'pdf'){
        $pdfUrl = $_POST['pdfUrl'];
        $course = new Course($title, $description,  $thumbnail, $category, $teacherId, $pdfUrl, 'pdf');
        $tags = $_POST['tags'];
        $course->addCourse($tags);
    }else{
        $videoUrl = $_POST['videoUrl'];
        $course = new Course($title, $description,  $thumbnail, $category, $teacherId, $videoUrl, 'video');
        $tags = $_POST['tags'];
        $course->addCourse($tags);
        
    }
    // $tags = $_POST['tags'];
    // foreach($tags as $tag){
    //     $course->addTag($tag);
    // }
}
?>

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center mb-8" style="color: #059669;">Ajouter un Nouveau Cours</h1>
    <form class="bg-white p-6 rounded-lg shadow-md" method="post">
        <!-- Titre du cours -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Titre du Cours</label>
            <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Entrez le titre du cours" required>
        </div>

        <!-- Description du cours (textarea simple) -->
        <div class="mb-4">
        <label for="title" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea
                    id="content"
                    name="content"
                    rows="4"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Write something..."
                ></textarea>
            </div>

<!-- Sélectionner le type de fichier -->
            <div class="mb-4">
                <label for="fileType" class="block text-gray-700 font-bold mb-2">Type de Fichier</label>
                <select name="fileType" id="fileType" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" onchange="toggleFileInput()">
                    <option value="" selected>Choisir votre type de fichier</option>
                    <option value="pdf">PDF</option>
                    <option value="video">Vidéo</option>
                </select>
            </div>

            <!-- Champ pour l'URL du PDF (affiché par défaut) -->
            <div class="mb-4 hidden" id="pdfInput">
                <label for="pdfUrl" class="block text-gray-700 font-bold mb-2">URL du PDF</label>
                <input type="url" id="pdfUrl" name="pdfUrl" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Entrez l'URL du PDF">
            </div>

            <!-- Champ pour l'URL de la vidéo (caché par défaut) -->
            <div class="mb-4 hidden" id="videoInput">
                <label for="videoUrl" class="block text-gray-700 font-bold mb-2">URL de la Vidéo</label>
                <input type="url" id="videoUrl" name="videoUrl" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Entrez l'URL de la vidéo">
            </div>

<!-- ajouter thumbnail -->

        
        <div class="mb-4" id="thumbnail">
                <label for="thumbnail" class="block text-gray-700 font-bold mb-2">URL du thumbnail</label>
                <input type="url" id="thumbnail" name="thumbnail" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Entrez l'URL du thumbnail">
        </div>

        <!-- Catégorie du cours -->
        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-bold mb-2">Catégorie</label>
            <select id="category" name="category" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <?php 
                include_once '../classes/category.php';
                $categorie = new category;
                $categories = $categorie->displayCategories();
                foreach($categories as $category){
                    echo "<option value='".$category['category_id']."'>".$category['name']."</option>";
                }
                ?>
            </select>
        </div>
        <!-- Tags du cours -->
        <div class="p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Sélectionnez vos tags</h2>
    <div class="flex flex-wrap gap-2">
        <?php
        include_once '../classes/tags.php';
        $tag = new Tags();
        $tags = $tag->displayTags();
        foreach ($tags as $tag) {
            echo '
            <label class="tag-checkbox bg-gray-100 text-gray-700 px-4 py-2 rounded-full border border-gray-200 cursor-pointer hover:bg-green-100 transition-all duration-300 ease-in-out">
                <input type="checkbox" name="tags[]" value="' . $tag['tag_id'] . '" class="hidden peer">
                ' . $tag['name'] . '
            </label>';
        }
        ?>
    </div>
</div>

        <!-- Bouton de soumission -->
        <div class="text-center">
            <button type="submit" name="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-[#059669]">
                Ajouter le Cours
            </button>
        </div>
    </form>
</div>
<script>
    document.getElementById('thumbnail').addEventListener('change', function(event) {
        const file = event.target.files[0]; 
        const previewContainer = document.getElementById('thumbnail-preview');
        const previewImage = document.getElementById('preview-image');

        if (file) {
            const reader = new FileReader(); 

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden'); 
            };

            reader.readAsDataURL(file); 
        } else {
            previewContainer.classList.add('hidden'); 
        }
    });
    function toggleFileInput() {
        const fileType = document.getElementById('fileType').value;
        const pdfInput = document.getElementById('pdfInput');
        const videoInput = document.getElementById('videoInput');

        if (fileType === 'pdf') {
            pdfInput.classList.remove('hidden');
            videoInput.classList.add('hidden');
        } else if (fileType === 'video') {
            pdfInput.classList.add('hidden');
            videoInput.classList.remove('hidden');
        }else{
            pdfInput.classList.add('hidden');
            videoInput.classList.add('hidden');
        }
    }
    document.querySelectorAll('.tag-checkbox input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const label = this.closest('.tag-checkbox');
            if (this.checked) {
                label.classList.add('bg-green-500', 'text-white', 'border-green-500');
                label.classList.remove('bg-gray-100', 'text-gray-700', 'border-gray-200');
            } else {
                label.classList.remove('bg-green-500', 'text-white', 'border-green-500');
                label.classList.add('bg-gray-100', 'text-gray-700', 'border-gray-200');
            }
        });
    });
        

    
</script>
<?php include_once 'footer.php';?>