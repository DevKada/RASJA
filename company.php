<?php include("db.php"); ?>
<?php
if (!isset($_GET['id'])) {
  die("No company ID provided.");
}

$id = $_GET['id'];
$query = "SELECT * FROM companies WHERE id = ?";
$params = array($id);
$result = executeQuery($query, $params);

if (mysqli_num_rows($result) === 0) {
  die("Company not found.");
}

$company = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $company['name']; ?> - Job Circle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">JOB CIRCLE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="aboutSection">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userPage.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-light ms-2" href="admin.php">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card p-4 shadow">
          <div class="text-center mb-4">
            <img src="<?php echo $company['logoUrl']; ?>" class="rounded-circle" width="100" height="100" alt="Logo">
            <h2 class="mt-3 fw-bold"><?php echo $company['name']; ?></h2>
            <p class="text-muted">Location: <?php echo $company['location']; ?></p>
          </div>
          <div class="mb-3">
            <h5 class="fw-semibold">Job Title:</h5>
            <p><?php echo $company['jobTitle']; ?></p>
          </div>
          <div class="mb-3">
            <h5 class="fw-semibold">Job Type:</h5>
            <p><?php echo $company['jobType']; ?></p>
          </div>
          <div class="mb-3">
            <h5 class="fw-semibold">Website:</h5>
            <p><a href="<?php echo $company['website']; ?>" target="_blank"><?php echo $company['website']; ?></a></p>
          </div>
          <div class="mb-3">
            <h5 class="fw-semibold">Description:</h5>
            <p><?php echo $company['description']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="footer mt-5 py-4 text-white bg-dark">
  <div class="container text-center">
    <p class="mb-1">© 2025 Job Circle | All Rights Reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
