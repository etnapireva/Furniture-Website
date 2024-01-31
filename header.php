<header>
    <div class="logo-header"> 
        <img src="Logo.jpeg" alt="Mobileria HSM Logo">
    </div>
    <div class="header-content">
        <div class="welcome">
            <h1>Mirëseerdhët në Mobileria HSM</h1>
        </div>
        <div class="mobile-menu-icon" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
        </div>
    </div>
    <nav class="nav-container">
        <div class="labels">
            <a href="main.php">Home</a>
            <a href="produktet.php">Produktet</a>
            <a href="rrethnesh1.php">Rreth nesh</a>
            <a href="kontakti.php">Na kontaktoni</a>
            <?php
          

            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                echo '<a href="dashboard.php">Dashboard</a>';
            }
            ?>
            
            <?php
            

            // e shikon a eshte i kyqur
            if (isset($_SESSION['role'])) {
                echo '<a href="logout.php">Logout</a>';
            } else {
              echo '<a href="login.php">Kyquni</a>';
          }
            ?>
        </div>
    </nav>
</header>
<style>
header {
  color: rgb(71, 50, 50);
  padding: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.logo-header {
  display: flex;
  align-items: center;
}

.logo-header img {
  width: 100px;
  margin-right: 20px;
}

.welcome h1 {
  margin: 0;
  font-size: 24px;
  font-weight: bold;
  text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);
}

nav .labels a {
  color: rgb(5, 5, 27);
  text-decoration: none;
  margin-left: 20px;
  font-weight: bold;
  transition: color 0.3s ease;
}

nav .labels a:hover {
  color: rgb(0, 102, 204);
}


.mobile-menu-icon {
  display: none;
  cursor: pointer;
}

.labels.show-menu {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  background-color: rgba(244, 239, 230, 1); 
  position: absolute;
  top: 100%; 
  left: 0;
  width: 100%;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.labels a {
  margin: 10px 0;
  padding: 10px; 
  width: 100%; 
  box-sizing: border-box;
}

/* dukja responsive */
@media only screen and (max-width: 768px) {
  header {
      display: flex;
      justify-content: center;
      position: relative;
  }

  .welcome {
      display: none;
  }

  .logo-header {
      width: 100%;
      justify-content: space-between;
      padding-right: 20px;
  }

  .labels {
      display: none;
      flex-direction: column;
      align-items: flex-start;
  }

  nav .labels a {
      margin: 0;
      margin-bottom: 10px;
  }

  .mobile-menu-icon {
      display: block;
  }
}

</style>
<script>
    function toggleMobileMenu() {
    const labelsContainer = document.querySelector('.labels');
    labelsContainer.classList.toggle('show-menu');
}

</script>