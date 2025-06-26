<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Job Circle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <style>
    .navbar-brand {}

    .glass-navbar {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(20px) saturate(180%);
      -webkit-backdrop-filter: blur(20px) saturate(180%);
      border: 1px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
    }

    body {
      background: linear-gradient(135deg, #bdc3c7 0%, #2c3e50 100%);
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
  </style>
</head>

<body class="bg-light">

  <nav class="navbar sticky-top glass-navbar navbar-dark px-4">
    <div class="container-fluid p-3">
      <div class="d-flex align-items-center">
        <div class="me-2 b-white rounded-circle" style="width: 20px; height: 20px;"></div>
        <span class="navbar-brand mb-0 h1 text-black">JOB CIRCLE - Admin</span>
      </div>
      <div>
        <a href="login.php" class="btn btn-outline-light btn-sm text-black">Log Out</a>
      </div>
    </div>
  </nav>

  <div class="container py-4 shadow-sm d-flex justify-content-center">
    <div class="row d-flex justify-content-center w-100">
      <div class="input-group w-75">
        <input type="text" id="searchBar" class="form-control rounded-start-pill" placeholder=" Search jobs...">
        <button class="btn btn-dark rounded-end-pill">Search</button>
      </div>
    </div>
  </div>

  <div class="container my-5">

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

    <div class="justify-content-between align-items-center mb-3">
      <h3>Recommended Jobs</h3>
      <select class="form-select w-auto">
        <option selected>Recently Added</option>
      </select>
    </div>

    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <div class="bg-white p-3 job-card">
          <p class="text-muted small mb-1">Full-Time</p>
          <h5>Web Developer</h5>
          <div class="company-box mt-2" style="background-color: #e6ffcc;">
            <div class="logo-circle">T</div>
            <div>
              <div>TechCorp</div>
              <div class="text-muted small">Manila</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white p-3 job-card">
          <p class="text-muted small mb-1">Part-Time</p>
          <h5>UI/UX Designer</h5>
          <div class="company-box mt-2" style="background-color: #ccf2ff;">
            <div class="logo-circle">D</div>
            <div>
              <div>Designify</div>
              <div class="text-muted small">Cebu</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white p-3 job-card">
          <p class="text-muted small mb-1">Contract</p>
          <h5>Backend Engineer</h5>
          <div class="company-box mt-2" style="background-color: #ffe0e6;">
            <div class="logo-circle">C</div>
            <div>
              <div>CodeNest</div>
              <div class="text-muted small">Davao</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <h4 class="mb-3">Recent Job Posts</h4>
    <table class="table table-striped align-middle" id="jobTable">
      <thead class="table-dark">
        <tr>
          <th>Job Title</th>
          <th>Company</th>
          <th>Type</th>
          <th>Posted On</th>
          <th>Location</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Frontend Developer</td>
          <td>NextGen</td>
          <td>Full-Time</td>
          <td>June 21</td>
          <td>Quezon City</td>
          <td>
            <div class="btn-group">
              <button class="btn btn-sm btn-primary">View</button>
              <button class="btn btn-sm btn-warning">Edit</button>
              <button class="btn btn-sm btn-danger">Delete</button>
            </div>
          </td>
        </tr>
        <tr>
          <td>System Analyst</td>
          <td>InfoSys</td>
          <td>Contract</td>
          <td>June 19</td>
          <td>Taguig</td>
          <td>
            <div class="btn-group">
              <button class="btn btn-sm btn-primary">View</button>
              <button class="btn btn-sm btn-warning">Edit</button>
              <button class="btn btn-sm btn-danger">Delete</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>
</body>

</html>