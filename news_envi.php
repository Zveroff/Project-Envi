
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <title>Новости Envi</title>
    <link rel="stylesheet" href="./css/news_vuvod.css">
  </head>
  <body>
  <?php include 'menu.php'; ?>
  <?php
    session_start();
    require_once('db.php');
    ?>
    <?php
  $sql = "SELECT * FROM news ORDER BY id DESC";
  $result = $conn->query($sql);
  if ($result && $result->num_rows > 0) {
      echo '<div class="news-container">';
      while($row = $result->fetch_assoc()) {
          echo '<div class="news">';
          echo '<img src="AdminPanel/news_image/' . $row["image"] . '" alt="' . $row["title"] . '" class="news-image">';
          echo '<h2 class="news-title">' . $row["title"] . '</h2>';
          echo '<p class="news-text">' . $row["text"] . '</p>';
          echo '</div>';
      }
      
      echo '</div>';
  } else {
      echo "<p class='error'>Нет доступных новостей.</p>" ;
  }

  $conn->close();
  ?>
</body>
</html>
