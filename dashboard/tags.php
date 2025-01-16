<?php include_once 'header.php'; ?>
    <?php 
    include_once '../classes/tags.php';
    include_once '../classes/category.php';

    // CRUD TAGS

    if(isset($_POST['tag'])){
        $tag = new Tags();
        $tag->addTag($_POST['tags']);
    }
    if(isset($_GET['idTag'])){
        $tag = new Tags();
        $tag->deleteTag($_GET['idTag']);
        header('Location: tags.php');
    }

    // CRUD CATEGORY

    if(isset($_POST['categorys'])){
        $tag = new category();
        $tag->addCategory($_POST['category']);
    }
    if(isset($_POST['modifyCategory'])){
        $category = new category();
        $category->modifyCategory($_POST['inputId'], $_POST['inputField']);
        header('Location: tags.php');
    }
    if(isset($_GET['idCategory'])){
        $category = new category();
        $category->deleteCategory($_GET['idCategory']);
        header('Location: tags.php');
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
            $categorie = new category;
            $categories = $categorie->displayCategories();
            foreach($categories as $category){
                echo "<div class='bg-gray-100 p-4 rounded-lg shadow-md'>";
                echo "<h5 ids=".$category['category_id']." class='font-semibold mb-2'>".$category['name']."</h5>";
                echo "<div class='flex gap-2'>";
                echo "<a onclick='modifier(event)'  class='text-blue-500 hover:underline cursor-pointer'>Modifier</a>";
                echo "<a onclick='supprimer(event)' href='tags.php?idCategory=".$category['category_id']."' class='text-red-500 hover:underline'>Supprimer</a>";
                echo "</div>";
                echo "</div>";
            }
           ?>
        </div>
    </div>
    <div>
        <h5 class="font-semibold mb-2">Ajouter des categories</h5>
        <form class="flex gap-2" method="POST">
            <input type="text" name="category" placeholder="Entrez une categories" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" name="categorys" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter</button>
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
                    echo "<div  class='flex gap-2 fit-content relative'>";
                    echo "<span onmouseover='show(event)'onmouseout='cache(event)' onclick='deleteTag(event)'  ids='".$tag['tag_id']."' class='bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm cursor-pointer'>".$tag['name']."</span>";
                    echo "</div>";
                
                }
                ?>
            </div>
        </div>
      

        <!-- Formulaire d'ajout de Tags -->
        <div>
            <h5 class="font-semibold mb-2">Ajouter des tags</h5>
            <form class="flex gap-2" method="POST">
                <input type="text" name="tags" placeholder="Entrez un tag" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" name="tag" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<!-- form pour modifier les categories -->

<div id="formModify" class="bg-white p-8 w-72 rounded-lg shadow-md fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden">
        <form method="POST" class="w-full flex flex-col items-center gap-4">
            <h1 class="w-full">Modifier categorie</h1>
            <div class="mb-4 w-full">
                <label for="inputId" class="block text-gray-700 text-sm font-bold mb-2">Id</label>
                <input class="w-full border-2 px-1 rounded-lg outline-none" type="text" id="inputId" name="inputId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter something..." readonly>
            </div>
            <div class="mb-4 w-full">
                <label for="inputField" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                <input class="w-full border-2 px-1 rounded-lg outline-none" type="text" id="inputField" name="inputField" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter something...">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" name="modifyCategory" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Modify
                </button>
            </div>
        </form>
    </div>

<!-- form pour modifier les Tags -->

<div id="formModifyTag" class="bg-white p-8 w-72 rounded-lg shadow-md fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden">
        <form method="POST" class="w-full flex flex-col items-center gap-4">
            <h1 class="w-full">Modifier tag</h1>
            <div class="mb-4 w-full">
                <label for="inputIdTag" class="block text-gray-700 text-sm font-bold mb-2">Id</label>
                <input class="w-full border-2 px-1 rounded-lg outline-none" type="text" id="inputIdTag" name="inputIdTag" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter something..." readonly>
            </div>
            <div class="mb-4 w-full">
                <label for="inputTag" class="block text-gray-700 text-sm font-bold mb-2">Tag</label>
                <input class="w-full border-2 px-1 rounded-lg outline-none" type="text" id="inputTag" name="inputTag" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter tag...">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" name="modifyTag" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Modify
                </button>
            </div>
        </form>
    </div>
<?php include_once 'footer.php'; ?>

<script>
    function modifier(e){
        const formModify = document.getElementById('formModify');
        const inputField = document.getElementById('inputField');
        const inputId = document.getElementById('inputId');
        formModify.classList.toggle('hidden');
        const category = e.target.parentElement.parentElement.querySelector('h5');
        const ids = category.getAttribute('ids');
        inputId.value = ids;
        inputField.value = category.textContent;
    }
    function show(e){
        const icon = e.target;
        icon.classList.remove('bg-blue-100');
        icon.classList.toggle('bg-red-300');
    }
    function cache(e){
        const icon = e.target;
        icon.classList.remove('bg-red-300');
        icon.classList.toggle('bg-blue-100');
    }
    function deleteTag(e){
        const id = e.target.getAttribute('ids');
        window.location.href = "tags.php?idTag="+id;
    }

</script>