<?php include("db.php"); ?>

<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header("Location: login.php");
  exit();
}

// handle logout
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header("Location: login.php");
  exit();
}
?>

<?php
$search = isset($_POST['search']) ? $_POST['search'] : '';
$sort = isset($_POST['sort']) ? $_POST['sort'] : 'recent';

if (!empty($search)) {
  $query = "SELECT * FROM companies WHERE (jobTitle LIKE ? OR location LIKE ?)";
  $params = array("%$search%", "%$search%");
} else {
  $query = "SELECT * FROM companies WHERE isRecommended = 1 AND location LIKE '%Metro Manila%'";
  $params = array();
}

if ($sort === 'relevant') {
  $query .= " ORDER BY jobTitle ASC";
} else {
  $query .= " ORDER BY id DESC";
}

$result = executeQuery($query, $params);
$colors = ['#ecffa4', '#a8f8f2', '#ffb7c5', '#b9f5a8'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JOB CIRCLE - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #bdc3c7 0%, #2c3e50 100%);
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }

    .glass-navbar {
      backdrop-filter: blur(20px) saturate(180%);
      -webkit-backdrop-filter: blur(20px) saturate(180%);
      border: 1px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
    }

    .job-card {
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .company-box {
      display: flex;
      align-items: center;
      padding: 10px;
      border-radius: 6px;
      font-weight: 500;
    }

    .logo-circle {
      width: 40px;
      height: 40px;
      background-color: black;
      color: white;
      font-size: 0.8rem;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      margin-right: 10px;
    }

    .card.bg-light:hover {
      transform: scale(1.03);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: default
    }

    .card.bg-light {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .job-card {
      border-radius: 10px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
    }

    .job-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      cursor: pointer;
    }
  </style>
</head>

<body>
  <header class="sticky-top">
    <nav class="navbar sticky-top glass-navbar px-4 p-3">
      <div class="d-flex align-items-center">
        <img src="img/logo.png" alt="Logo" class="logo me-2" style="width: 45px; height: 45px;">
        <span class="navbar-brand mb-0 h1 text-black fw-bold" style="color: #000000;">JOB CIRCLE - Admin</span>
      </div>
      <div>
        <a href="?logout=true" class="btn btn-outline-light btn-sm text-white">Log Out</a>
      </div>
    </nav>
  </header>
  </div>

  <!-- Search Bar -->
  <div class="container d-flex justify-content-center py-5">
    <div class="row w-100">
      <div class="col-lg-8 col-md-10 col-12 mx-auto">
        <div class="input-group w-100">
          <input type="text" id="searchBar" class="form-control rounded-start-pill" placeholder="Search jobs...">
          <button class="btn btn-dark rounded-end-pill">Search</button>
        </div>
      </div>
    </div>
  </div>


  <!-- top metric -->
  <section class="container my-5">
    <div class="row text-center mb-5">
      <div class="col-md-3">
        <div class="card bg-light">
          <div class="card-body">
            <h6 class="card-title">Jobs Listed</h6>
            <h4>120</h4>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-light">
          <div class="card-body">
            <h6 class="card-title">Companies</h6>
            <h4>25</h4>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-light">
          <div class="card-body">
            <h6 class="card-title">Categories</h6>
            <h4>12</h4>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-light">
          <div class="card-body">
            <h6 class="card-title">Cities Covered</h6>
            <h4>9</h4>
          </div>
        </div>
      </div>
    </div>

    <!-- RecommendJobs -->
    <div class="container-fluid d-flex justify-content-between align-items-center mb-3">
      <div class="row">
        <div class="col">
          <h3>Recommended Jobs</h3>
        </div>
      </div>
    </div>

    <!-- cards -->
    <div class="row">
      <?php
      $index = 0;
      while ($row = mysqli_fetch_assoc(result: $result)) {
        if ($index >= 3) break;
        $boxColor = $colors[$index % count(value: $colors)];
        $index++;
      ?>
        <div class="col-lg-4 col-md-6 col-12 mb-4 d-flex">
          <a id="<?php echo $row['id']; ?>" class="text-decoration-none text-dark w-100">
            <div class="job-card d-flex flex-column justify-content-between p-3 h-100" style="background-color: #ffffff; border-radius: 12px;">
              <div>
                <div class="d-flex justify-content-start mb-2">
                  <span class="badge job-type bg-white text-dark"><?php echo $row['jobType']; ?></span>
                </div>
                <h5 class="fw-semibold mx-3 text-start"><?php echo $row['jobTitle']; ?></h5>
              </div>
              <div class="company-box d-flex align-items-center mt-4 px-3 py-2 rounded" style="background-color: <?php echo $boxColor; ?>; color: #000000;">
                <div class="company-logo me-2 bg-black text-white rounded-circle d-flex justify-content-center align-items-center overflow-hidden" style="width: 40px; height: 40px;">
                  <img src="<?php echo $row['logoUrl']; ?>" alt="Logo" class="w-100 h-100 object-fit-cover">
                </div>
                <div>
                  <div class="fw-semibold text-black text-start"><?php echo $row['name']; ?></div>
                  <small class="text-black"><?php echo $row['location']; ?></small>
                </div>
              </div>
            </div>
          </a>
        </div>

      <?php } ?>

      <?php if (mysqli_num_rows(result: $result) === 0) { ?>
        <p class="text-center">No jobs found for "<strong><?php echo htmlspecialchars(string: $search); ?></strong>"</p>
      <?php } ?>
    </div>
    </div>

    <!--Table -->
    <!-- php dito -->
    <div class="container-fluid my-3">
      <div class="row">
        <div class="col">
          <h4 class="mb-3">Recent Job Posts</h4>
          <table class="table table-striped align-middle" id="jobTable">
            <thead class="table-dark">
              <tr>
                <th>Job Title</th>
                <th>Company</th>
                <th>Type</th>
                <th>Location</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT name, jobTitle, jobType, location FROM companies ORDER BY name DESC LIMIT 10";
              $result = mysqli_query($conn, $query);

              if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
          <td>{$row['jobTitle']}</td>
          <td>{$row['name']}</td>
          <td>{$row['jobType']}</td>
          <td>{$row['location']}</td>
        </tr>";
                }
              } else {
                echo "<tr><td colspan='4' class='text-center'>No job posts found.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchBar");
        const table = document.getElementById("jobTable");
        const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        searchInput.addEventListener("input", function() {
          const searchTerm = searchInput.value.toLowerCase();

          for (let row of rows) {
            const cells = row.getElementsByTagName("td");
            let matchFound = false;

            for (let cell of cells) {
              if (cell.textContent.toLowerCase().includes(searchTerm)) {
                matchFound = true;
                break;
              }
            }

            row.style.display = matchFound ? "" : "none";
          }
        });
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>