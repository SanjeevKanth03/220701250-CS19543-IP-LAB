<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover comprehensive solutions to prevent and manage various diseases. Your guide to a healthier life.">
    <meta name="keywords" content="health solutions, disease prevention, treatment options, healthy lifestyle">
    <title>Our Solutions - Recommended Solution For All Disease</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <h1> <a href="index.php">HealHaven</a></h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="solutions.php">Solutions</a>
        </li>
       
      </ul>
    </div>
  </nav>
  

</header>
<!-- <section class="solutions">
<h2>Detailed Solutions</h2>
        <div class="solution-list">
          <form action="" method="GET" class="search-form">
            <input type="text" name="query" placeholder="Enter disease name..." required>
            <button id="sear"  type="submit">Search</button>
        </form>
</section>   -->
<section class="solutions">
<h2>Detailed Solutions</h2>
    <div class="solution-list">
        <form method="post" class="search-form">
            <input type="text" name="search" placeholder="Enter Disease Name..." id="inp" required>
            <button id="sear" type="submit">Search</button>
        </form>
    </div>
</section> 

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";  
        $username = "root";         
        $password = "";              
        $dbname = "remedies";            

        
        $conn = new mysqli($servername, $username, $password, $dbname);

      
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $disease = $conn->real_escape_string($_POST['search']);
        $sql = "SELECT * FROM rem WHERE name='$disease'"; 
        $result = $conn->query($sql);

       
        if ($result && $result->num_rows > 0) {
            echo "<h2>Search Results for '$disease':</h2>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li><strong>Name:</strong> " . htmlspecialchars($row['name']) . "<br>";
                echo "<strong>Remedy:</strong> " . htmlspecialchars($row['remedy']) . "<br>";
                echo "<strong>Doctors:</strong> " . htmlspecialchars($row['doctors']) . "<br>";
                echo "<strong>Video:</strong> <a href='" . htmlspecialchars($row['video']) . "' target='_blank'>Watch here</a>";
                echo "</li><br>";
            }
            echo "</ul>";
        } else {
            echo "<p>No results found for '$disease'.</p>";
        }

        
        $conn->close();
    }
    ?>
    <footer>
        <p>&copy; 2024 Recommended Solution For All Disease</p>
        <div class="social-media">
            <a href="#">Linkedin</a> |
            <a href="#">Twitter</a> |
            <a href="#">Instagram</a>
        </div>
    </footer>
</body>
</html>
