<!DOCTYPE html>
<html lang="en">

<!-- code php -->
<?php
$titleTab = 'Dashboard';
?>

<!-- head -->
<?php include "assets/template/head.php"; ?>

<!-- body -->
<body>
    <!-- Header -->
    <?php include "assets/template/header.php"; ?>

    <!-- Main Content -->
    <div class="container">
        <!-- Sidebar -->
        <?php include "assets/template/sidebar.php"; ?>

        <!-- Content -->
        <main class="content">
            <h2 class="mb-1"><?= $titleTab ?? 'Judul' ?></h2>
            <p class="mb-3">This is the main content area.</p>

            <div class="paragraph-right mt-2">
                <p id="locationFileUrl">location file</p>
            </div>
        </main>

    </div>

    <!-- Footer -->
    <?php include "assets/template/footer.php"; ?>
</body>


<!-- jquery for data table if used -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<!-- code javascript -->
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById("locationFileUrl").innerHTML = 'File location : ' + window.location.pathname;
        let table = new DataTable('#myTable', {
            responsive: true
        });
    });
</script>

</html>