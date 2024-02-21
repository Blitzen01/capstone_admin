<?php
  // Assuming you have a database connection established

  // Get the current date
  $currentDate = date("Y-m-d");

  // Prepare and execute the query
  $query = "SELECT COUNT(*) AS reservationCount FROM bookreserve WHERE pickupDate = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$currentDate]);

  // Fetch the result
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $reservationCount = $result['reservationCount'];
?>

<nav class="navbar navbar-expand-lg bg-light fixed-top border-bottom">
  <div class="container-fluid">
    <img id="header_logo" src="../assets/image/cvsu_library.png" alt="" srcset="">
    <button type="button" id="notificationButton" class="btn ms-auto">
      <i class="fa-solid fa-bell fa-lg ms-auto"></i>
      <?php if ($reservationCount != 0): ?>
          <span class="badge text-bg-danger fs-smallest rounded-circle"><?php echo $reservationCount; ?></span>
      <?php endif; ?>
    </button>

    <div id="toggle"></div>
  </div>
</nav>

<?php include '../web_content/modals.php'; ?>

<div id="notificationContainer" class="bg-light text-dark">
    <?php
    $currentDate = date("Y-m-d");

    // Prepare and execute the query
    $query = "SELECT * FROM bookreserve WHERE pickupDate = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$currentDate]);

    // Fetch all rows
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any reservations for the current date
    if ($reservations) {
        // Loop through each reservation and echo the data
        foreach ($reservations as $reservation) {
            ?>
            <a class="nav-link" href="../admin/circulation.php#bookreserve?name=<?php echo urlencode($reservation['name']); ?>">
              <div class="px-2">
                  <div class="col">
                      <div class="row">
                          <p>
                            <strong><?php echo $reservation['name'];?><br></strong>
                            <span class="fs-small"><?php echo "Book Title: <strong>" . $reservation['bookTitle'] . "</strong> <br>";?></span>
                            <span class="fs-smallest">Pick Up Date: <strong><?php echo $reservation['pickupDate'];?></strong></span>
                          </p>
                      </div>
                  </div>
              </div>
          </a>

            <?php
        }
    } else {
        echo "There are no reservations for the current date.";
    }
    ?>
</div>
