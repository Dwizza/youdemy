<?php 
session_start();
if( $_SESSION['role'] == '' ){
    header('location: ../viewenseignant/index.php');
}else{
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Votre Site</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fonction pour afficher/masquer la sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('block');
        }
    </script>
</head>
<body class="bg-gray-100">
    <!-- Navbar avec Menu Burger -->
    <nav class="bg-gray-800 text-white p-4 md:hidden">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Panel</h1>
            <button onclick="toggleSidebar()" class="focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar (cachée par défaut sur mobile) -->
        <div id="sidebar" class="bg-gray-800 text-white w-64 min-h-screen p-4 hidden md:block">
            <h1 class="text-2xl font-bold mb-8">Admin Panel</h1>
            <ul>
                <li class="mb-4">
                    <a href="index.php" class="flex items-center hover:bg-gray-700 p-2 rounded">
                        <span class="mr-2">📊</span> Tableau de bord
                    </a>
                </li>
                <li class="mb-4">
                    <a href="usergestion.php" class="flex items-center hover:bg-gray-700 p-2 rounded">
                        <span class="mr-2">👤</span> Gestion des utilisateurs
                    </a>
                </li>
                <li class="mb-4">
                    <a href="courses.php" class="flex items-center hover:bg-gray-700 p-2 rounded">
                        <span class="mr-2">🎓</span> Gestion des cours
                    </a>
                </li>
                <li class="mb-4">
                    <a href="tags.php" class="flex items-center hover:bg-gray-700 p-2 rounded">
                        <span class="mr-2">🏷️</span> Gestion des tags
                    </a>
                </li>
                <li class="mb-4">
                    <a href="statistics.php" class="flex items-center hover:bg-gray-700 p-2 rounded">
                        <span class="mr-2">📈</span> Statistiques
                    </a>
                </li>
                <li class="mb-4">
                    <a href="../viewEnseignant/logout.php?id=<?= $_SESSION['userid']?>" class="flex items-center hover:bg-gray-700 p-2 rounded">
                    <i class="fa-solid fa-right-from-bracket text-red-500 ml-1 mr-2"></i> Log out
                    </a>
                </li>
            </ul>
        </div>
        <?php }?>

    