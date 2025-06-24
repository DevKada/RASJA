<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Job Circle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .job-card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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

    <!-- Header -->
    <nav class="navbar navbar-dark bg-dark px-4">
      <div class="d-flex align-items-center">
        <div class="me-2 bg-white rounded-circle" style="width: 20px; height: 20px;"></div>
        <span class="navbar-brand mb-0 h1">JOB CIRCLE - Admin</span>
      </div>
      <div>
        <a href="#" class="btn btn-outline-light btn-sm">Continue as Admin</a>
        <a href="#" class="btn btn-outline-light btn-sm">Continue as User</a>
      </div>
    </nav>

    <!-- Search Bar -->
    <div class="bg-white py-4 shadow-sm">
      <div class="container d-flex justify-content-center">
        <div class="input-group w-75">
          <input type="text" id="searchBar" class="form-control rounded-start-pill" placeholder="🔍 Search jobs...">
          <button class="btn btn-dark rounded-end-pill">Search</button>
        </div>
      </div>
    </div>

    <!-- Content -->
    <div class="container my-5">

      <!-- Summary Metrics -->
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

      <!-- Recommended Jobs -->
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Recommended Jobs</h3>
        <select class="form-select w-auto" disabled>
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

      <!-- Job Table with Actions -->
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
                <button class="btn btn-sm btn-primary" onclick="viewJob(this)">View</button>
                <button class="btn btn-sm btn-warning" onclick="editJob(this)">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteJob(this)">Delete</button>
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
                <button class="btn btn-sm btn-primary" onclick="viewJob(this)">View</button>
                <button class="btn btn-sm btn-warning" onclick="editJob(this)">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteJob(this)">Delete</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- View/Edit Modal -->
    <div class="modal fade" id="jobModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Job Info</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form id="modalForm">
              <div class="mb-2">
                <label class="form-label">Job Title</label>
                <input type="text" class="form-control" id="modalTitle">
              </div>
              <div class="mb-2">
                <label class="form-label">Company</label>
                <input type="text" class="form-control" id="modalCompany">
              </div>
              <div class="mb-2">
                <label class="form-label">Type</label>
                <input type="text" class="form-control" id="modalType">
              </div>
              <div class="mb-2">
                <label class="form-label">Posted On</label>
                <input type="text" class="form-control" id="modalPosted">
              </div>
              <div class="mb-2">
                <label class="form-label">Location</label>
                <input type="text" class="form-control" id="modalLocation">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-success" onclick="saveChanges()">Save</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      const modal = new bootstrap.Modal(document.getElementById('jobModal'));
      let selectedRow = null;

      function viewJob(btn) {
        const row = btn.closest('tr');
        populateModal(row);
        disableForm(true);
        modal.show();
      }

      function editJob(btn) {
        const row = btn.closest('tr');
        selectedRow = row;
        populateModal(row);
        disableForm(false);
        modal.show();
      }

      function deleteJob(btn) {
        const row = btn.closest('tr');
        row.remove();
      }

      function populateModal(row) {
        const cells = row.querySelectorAll('td');
        document.getElementById('modalTitle').value = cells[0].innerText;
        document.getElementById('modalCompany').value = cells[1].innerText;
        document.getElementById('modalType').value = cells[2].innerText;
        document.getElementById('modalPosted').value = cells[3].innerText;
        document.getElementById('modalLocation').value = cells[4].innerText;
      }

      function disableForm(disable) {
        ['modalTitle','modalCompany','modalType','modalPosted','modalLocation'].forEach(id => {
          document.getElementById(id).disabled = disable;
        });
        document.querySelector('#jobModal .btn-success').style.display = disable ? 'none' : 'inline-block';
      }

      function saveChanges() {
        if (!selectedRow) return;
        const cells = selectedRow.querySelectorAll('td');
        cells[0].innerText = document.getElementById('modalTitle').value;
        cells[1].innerText = document.getElementById('modalCompany').value;
        cells[2].innerText = document.getElementById('modalType').value;
        cells[3].innerText = document.getElementById('modalPosted').value;
        cells[4].innerText = document.getElementById('modalLocation').value;
        modal.hide();
      }

      document.getElementById('searchBar').addEventListener('input', function () {
        const term = this.value.toLowerCase();
        const rows = document.querySelectorAll('#jobTable tbody tr');
        rows.forEach(row => {
          const match = row.innerText.toLowerCase().includes(term);
          row.style.display = match ? '' : 'none';
        });
      });
    </script>
  </body>
</html>