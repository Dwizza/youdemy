<?php include_once 'header.php'; ?>
    <?php 
    include_once '../classes/tags.php';
    if(isset($_POST['submit'])){
        $tag = new Tags();
        $tag->addTag($_POST['tag']);
    }
    ?>
<div class="bg-white w-full p-6 rounded-lg shadow-md">
    <h3 class="text-xl font-bold mb-4">Gestion des catégories et tags</h3>

    <!-- Section Catégories -->
    <div class="mb-6">
        <h4 class="text-lg font-semibold mb-2">Catégories</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Liste des catégories -->
           <?php 
           include_once '../classes/category.php';
            $categories = category::displayCategories();
            foreach($categories as $category){
                echo "<div class='bg-gray-100 p-4 rounded-lg shadow-md'>";
                echo "<h5 class='font-semibold mb-2'>".$category['name']."</h5>";
                echo "</div>";
            }
           ?>
        </div>
    </div>
    <div>
            <h5 class="font-semibold mb-2">Ajouter des categories</h5>
            <form class="flex gap-2" method="POST">
                <input type="text" name="category" placeholder="Entrez une categories" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter</button>
            </form>
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
                <?php
                include_once '../classes/tags.php'; 
                $affiche = new Tags();
                $tags = $affiche->displayTags();
                foreach($tags as $tag){
                    echo "<span class='bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm'>".$tag['name']."</span>";
                }
                ?>
            </div>
        </div>

        <!-- Formulaire d'ajout de Tags -->
        <div>
            <h5 class="font-semibold mb-2">Ajouter des tags</h5>
            <form class="flex gap-2" method="POST">
                <input type="text" name="tag" placeholder="Entrez un tag" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter</button>
            </form>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>