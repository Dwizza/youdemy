<?php include_once 'header.php'; 
        include_once '../classes/userRepo.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $is_active = new UserRepo();
    $is_active->is_active($id);
    header("Location: ../dashboard/usergestion.php");
}
?>
<div class="bg-white w-full p-4 rounded-lg shadow-md mb-4 overflow-x-auto">
    <h3 class="text-lg font-bold mb-2">Gestion des utilisateurs</h3>
    <table class="w-full min-w-[600px]">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-1">Nom</th>
                <th class="p-1">Email</th>
                <th class="p-1">Rôle</th>
                <th class="p-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once '../classes/userRepo.php';
            $users =new UserRepo;
            $users->displayUsers();
            ?>
            
        </tbody>
    </table>
</div>
<?php include_once 'footer.php';?>