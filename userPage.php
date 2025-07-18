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
    <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">
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
          <a class="btn btn-outline-black text-black ms-2" href="#">Profile</a>
        </li>
      </ul>
    </div>
  </header>

  <div class="container mt-4 text-center">
    <div class="row">
      <div class="col-12">
        <h2 class="py-3" style="color: #000000;">Find Your Dream Job Here ✦</h2>
        <form method="POST" class="search-bar d-flex justify-content-center mb-4 flex-wrap gap-2">
          <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>"
            class="form-control w-50 me-2 rounded-pill" placeholder="🔍 Job title or city">
          <button class="btn btn-light rounded-pill px-4" style="background-color: black; color: white;">Search</button>
        </form>
      </div>
    </div>

    <div class="container my-4 py-3">
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

      <div class="container-fluid">
        <div class="row">
          <?php
          $index = 0;
          while ($row = mysqli_fetch_assoc(result: $result)) {
            if ($index >= 15) break;
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
    </div>

    <section id="aboutSection" class=" my-5 d-flex align-items-center">
      <div class="container mb-5 text-center">
        <div class="row">
          <div class="col">
            <h2 class="fw-bold mt-5 mb-3 display-6">About Job Circle</h2>
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
            <p class="about-text mb-5">
              Whether you're just starting out or making a bold move toward your future, Job Circle is here to guide
              and support your journey. Tara, simulan na natin!
            </p>
          </div>
        </div>
      </div>
    </section>
  </div>

  <footer>
    <div class="container-fluid p-5 mt-5 text-center text-white bg-dark">
      <div class="row">
        <div class="col">
          <p class="text mt-3">© 2025 Job Circle | All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>