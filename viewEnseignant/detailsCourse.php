<?php
include_once 'header.php';
include_once '../config/database.php';
if (isset($_GET['course_id']) && isset($_GET['type'])) {
    if ($_GET['type'] == 'pdf') {
        include_once '../classes/pdf.php';
        $pdf = new Pdf();
        $courses = $pdf->displayCourses($_GET['course_id']);
    } else {
        include_once '../classes/video.php';
        $pdf = new Video();
        $courses = $pdf->displayCourses($_GET['course_id']);
    }
    if($_SESSION['role'] == 'student'){
        include_once '../classes/userRepo.php';
        $enroll = new UserRepo();
        $count = $enroll->checkEnrollCourse($_GET['course_id'],$_SESSION['userid']);
        $enroll->enrollCourses($count, $_GET['course_id'], $_SESSION['userid']);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord du Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- En-tête -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Tableau de Bord du Cours</h1>
            <p class="text-gray-600">Suivez votre progression et accédez aux leçons.</p>
        </div>

        <!-- Carte du cours -->
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Image du cours -->
            <img class="w-full h-48 object-cover" src="<?= $courses['thumbnail'] ?>" alt="Image du cours">

            <div class="p-6">
                <!-- Titre du cours -->
                <h2 class="text-2xl font-bold text-gray-800 mb-4"><?= $courses['title'] ?></h2>


                <div class="mb-6">
                    <p class="text-gray-700 font-semibold mb-2">Author name: <span
                            class="text-blue-500"><?= $courses['username'] ?></span></p>
                </div>
                <div class="mb-6">
                    <p class="text-gray-700 font-semibold mb-2">Category : <span
                            class="text-blue-500"><?= $courses['category'] ?></span></p>
                </div>
                <div class="mb-6">
                    <p class="text-gray-700 font-semibold mb-2">Tags : <span
                            class="text-blue-500"><?= $courses['tags'] ?></span></p>
                </div>
                <div class="mb-6">
                    <p class="text-gray-700 font-semibold mb-2">Created at : <span
                            class="text-blue-500"><?= $courses['created_at'] ?></span></p>
                </div>
                <div class="mb-6">
                    <p class="text-gray-700 font-semibold mb-2">Desccription : <span
                            class="text-blue-500"><?= $courses['description'] ?></span></p>
                </div>

                <!-- Liste des leçons -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800">Leçons</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <?php if ($_GET['type'] == 'pdf') { ?>
                            <iframe width="820" height="1000" src="<?= htmlspecialchars($courses['content']) ?>"
                                frameborder="0"></iframe>
                        <?php } else {
                            // Transform YouTube URL if needed
                            $embed_url = strpos($courses['content'], 'watch?v=') !== false ? str_replace('watch?v=', 'embed/', $courses['content']) : $courses['content'];
                            ?>
                            <iframe class="w-full h-96" src="<?= htmlspecialchars($embed_url) ?>" frameborder="0"
                                allow="autoplay; encrypted-media; clipboard-write; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        <?php } ?>

                    </div>
                </div>

                <!-- Bouton pour continuer -->
                <div class="mt-6">
                    <a href="index.php"
                        class="inline-block bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">
                        Retourné à la liste des cours
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php include_once 'footer.php' ?>