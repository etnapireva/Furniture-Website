<?php 

include 'db.php'; 


$database = new Database();


$query = "SELECT * FROM form_submissions";
$result = $database->conn->query($query);


if ($result->num_rows > 0) {

    $data = array();

    
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    
    echo '<script>';
    echo 'const formData = ' . json_encode($data) . ';';
    echo '</script>';
} else {
    echo '<script>';
    echo 'const formData = [];'; 
    echo '</script>';
}


$database->conn->close();

?>
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
            
        </main>
    </div>
    <div class="card-container">
    </div>
    <script>
const cardContainer = document.querySelector('.card-container');


formData.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));


formData.forEach(data => {
    const card = document.createElement('div');
    card.classList.add('card');

    const id = document.createElement('p');
    id.classList.add('card-id');
    id.textContent = `ID: ${data.id}`;
    card.appendChild(id);

    const name = document.createElement('p');
    name.classList.add('card-name');
    name.textContent = `Name: ${data.name}`;
    card.appendChild(name);

    const phoneNumber = document.createElement('p');
    phoneNumber.classList.add('card-phone-number');
    phoneNumber.textContent = `Phone Number: ${data.numri}`;
    card.appendChild(phoneNumber);

    const email = document.createElement('p');
    email.classList.add('card-email');
    email.textContent = `Email: ${data.email}`;
    card.appendChild(email);

    const message = document.createElement('p');
    message.classList.add('card-message');
    message.textContent = `Message: ${data.message}`;
    card.appendChild(message);

    const dateCreated = document.createElement('p');
    dateCreated.classList.add('card-date-created');
    dateCreated.textContent = `Date Created: ${data.created_at}`;
    card.appendChild(dateCreated);

    cardContainer.appendChild(card);
});
</script>
</body>
</html>
