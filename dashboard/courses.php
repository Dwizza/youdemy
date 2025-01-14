<?php include_once 'header.php'; ?>
<div class="bg-white w-full p-4 rounded-lg shadow-md mb-4 overflow-x-auto">
    <h3 class="text-lg font-bold mb-2">Gestion des cours</h3>
    <table class="w-full min-w-[600px]">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-1">Titre</th>
                <th class="p-1">Catégorie</th>
                <th class="p-1">Statut</th>
                <th class="p-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b text-center">
                <td class="p-1">Développement Web</td>
                <td class="p-1">Informatique</td>
                <td class="p-1">Actif</td>
                <td class="p-1">
                    <button class="bg-blue-500 text-white px-2 py-1 rounded text-sm">Modifier</button>
                    <button class="bg-red-500 text-white px-2 py-1 rounded text-sm">Supprimer</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php include_once 'footer.php'; ?>