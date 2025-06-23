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

  <header class="header py-4 text-center text-white">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center">
          <img src="img/logo.png" alt="Logo" class="logo me-2">
          <h4 class="m-0 fw-bold">JOB CIRCLE</h4>
        </div>
      </div>
      <h2 class="mb-4">Find Your Dream Job Here ✦</h2>
      <form class="search-bar d-flex justify-content-center">
        <input type="text" class="form-control w-50 me-2 rounded-pill" placeholder="🔍 Job title or city">
        <button class="btn btn-light rounded-pill px-4">Search</button>
      </form>
    </div>
  </header>

  <main class="py-5">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Recommended Jobs</h3>
        <div>
          <label for="sortSelect" class="me-2">Sort By</label>
          <select id="sortSelect" class="form-select d-inline w-auto">
            <option>Recently Added</option>
            <option>Most Relevant</option>
          </select>
        </div>
      </div>

      <div class="row">
        <?php
          $colors = ['#ecffa4', '#a8f8f2', '#ffb7c5', '#b9f5a8'];
          for ($i = 0; $i < 12; $i++) {
            $color = $colors[$i % count($colors)];
        ?>
        <div class="col-md-3 mb-4">
          <div class="job-card">
            <span class="badge job-type">Type</span>
            <h5 class="fw-semibold mx-4">Job Title</h5>
            <div class="company-box d-flex align-items-center mt-4 px-3 py-2 rounded"
              style="background-color: <?php echo $color; ?>;">
              <div
                class="company-logo me-2 bg-black text-white rounded-circle d-flex justify-content-center align-items-center">
                Logo</div>
              <div>
                <div class="fw-semibold">Company Name</div>
                <small class="text-muted">Location</small>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </main>

  <footer class="footer mt-5 py-4 text-white">
    <div class="container text-center">
      <p class="mb-1">© 2025 Job Circle | All Rights Reserved.</p>
    </div>
  </footer>

</body>

</html>