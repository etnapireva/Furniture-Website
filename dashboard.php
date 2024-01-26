<?php include 'db.php';?>
<?php if (isset($_GET['action']) && $_GET['action'] === 'fetch_messages') {
    $sql = "SELECT * FROM messages ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);

    $messages = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($messages);
    exit; // Stop further execution
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="Logo.jpeg" alt="Company Logo">
                <h2>Mobileria Haliti</h2>
            </div>
        </header>

        <aside>
            <div class="sidebar">
                <a href="#" class="active">Dashboard</a>
                <a href="produktet.php">Products</a>
            </div>
        </aside>
<hr>


        <main>
            
            <h1>Mesazhet</h1>
            <!-- Add your main content here -->
        </main>
    </div>
    <div class="card-container">
    </div>
    <script src="scripts.js"></script>
</body>
</html>
