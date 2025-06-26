<?php include("db.php"); ?>
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
  <meta charset="UTF-8">
  <title>Job Circle</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>

<body>

  <header class="header p-3 text-white sticky-top shadow-sm">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
      <div class="d-flex align-items-center mb-2 mb-lg-0">
        <img src="img/logo.png" alt="Logo" class="logo me-2">
        <h4 class="m-0 fw-bold" style="color: #000000;">JOB CIRCLE</h4>
      </div>
      <ul class="nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-black" href="#aboutSection">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="userPage.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-black text-black ms-2" href="admin.php">Admin</a>
        </li>
      </ul>
    </div>
  </header>

  <div class="container mt-4 text-center">
    <h2 class="py-3" style="color: #000000;">Find Your Dream Job Here ✦</h2>
    <form method="POST" class="search-bar d-flex justify-content-center mb-4 flex-wrap gap-2">
      <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" class="form-control w-50 me-2 rounded-pill" placeholder="🔍 Job title or city">
      <button class="btn btn-light rounded-pill px-4" style="background-color: black; color: white;">Search</button>
    </form>

    <div class="container py-5">
      <div class="row">
        <div class="col d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-bold">Recommended Jobs</h3>
          <div>
            <label for="sortSelect" class="me-2">Sort By</label>
            <select id="sortSelect" class="form-select d-inline w-auto">
              <option>Recently Added</option>
              <option>Most Relevant</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <?php
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $boxColor = $colors[$index % count($colors)];
          $index++;
        ?>
          <div class="col-lg-4 col-md-6 col-12 mb-4">
            <a id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark">
              <div class="job-card p-3" style="background-color: #ffffff; border-radius: 12px;">
                <span class="badge job-type bg-white text-dark"><?php echo $row['jobType']; ?></span>
                <h5 class="fw-semibold mx-1 mt-2"><?php echo $row['jobTitle']; ?></h5>
                <div class="company-box d-flex align-items-center mt-4 px-3 py-2 rounded" style="background-color: <?php echo $boxColor; ?>; color: #000000;">
                  <div class="company-logo me-2 bg-black text-white rounded-circle d-flex justify-content-center align-items-center overflow-hidden" style="width: 40px; height: 40px;">
                    <img src="<?php echo $row['logoUrl']; ?>" alt="Logo" class="w-100 h-100 object-fit-cover">
                  </div>
                  <div>
                    <div class="fw-semibold text-black"><?php echo $row['name']; ?></div>
                    <small class="text-black"><?php echo $row['location']; ?></small>
                  </div>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>

        <?php if (mysqli_num_rows($result) === 0) { ?>
          <p class="text-center">No jobs found for "<strong><?php echo htmlspecialchars($search); ?></strong>"</p>
        <?php } ?>
      </div>
    </div>
    </main>

    <section id="aboutSection" class="py-5 d-flex align-items-center">
      <div class="container text-center">
        <h2 class="fw-bold mb-5 display-6">About Job Circle</h2>
        <p class="about-text mb-3">
          Job Circle is a job-hunting platform made especially for individuals in the provinces who dream of
          starting their career journey in Metro Manila.
        </p>
        <p class="about-text mb-3">
          We understand how overwhelming it can be to look for work in a big city — that's why we created an
          easier way for you to find job openings that match your goals, skills, and interests.
        </p>
        <p class="about-text mb-3">
          With just a few clicks, you can browse trusted companies, explore recommended jobs, and directly
          access essential details like location, role type, and application links — all in one place.
        </p>
        <p class="about-text mb-0">
          Whether you're just starting out or making a bold move toward your future, Job Circle is here to guide
          and support your journey. Tara, simulan na natin!
        </p>
      </div>
    </section>

    <footer class="footer mt-5 py-4 text-white bg-dark">
      <div class="container-fluid text-center">
        <p class="mt-1">© 2025 Job Circle | All Rights Reserved.</p>
      </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>