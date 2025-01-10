@include('admin.header')
<style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
    }

    .header {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .header span {
      font-size: 16px;
      color: #17a2b8;
      margin-left: 10px;
      font-weight: normal;
    }

    .statistics-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .stat-card {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-left: 5px solid transparent;
    }

    .stat-card.green {
      border-left-color: #28a745;
      background-color: #eafbea;
    }

    .stat-card.red {
      border-left-color: #dc3545;
      background-color: #fbeaec;
    }

    .stat-card.orange {
      border-left-color: #ffc107;
      background-color: #fff8e6;
    }

    .stat-card.blue {
      border-left-color: #17a2b8;
      background-color: #eaf6fb;
    }

    .stat-card.purple {
      border-left-color: #6f42c1;
      background-color: #f5e8fa;
    }

    .stat-card .info {
      display: flex;
      flex-direction: column;
    }

    .stat-card .info .value {
      font-size: 32px;
      font-weight: bold;
      margin: 0;
      color: #333;
    }

    .stat-card .info .label {
      font-size: 14px;
      color: #6c757d;
      margin: 5px 0 0 0;
    }

    .stat-card .icon {
      font-size: 36px;
    }

    .dropdown {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 20px;
    }

    .dropdown select {
      padding: 10px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      font-size: 14px;
    }
  </style>
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Delivered orders</p>
                          <h4 class="card-title">1,294</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small">
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Canceled Orders</p>
                          <h4 class="card-title">1303</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small">
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Refunded Orders</p>
                          <h4 class="card-title">$ 1,345</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small">
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Payment Failed</p>
                          <h4 class="card-title">576</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  -->

            <div class="statistics-grid">
      <div class="stat-card green">
        <div class="info">
          <div class="value">46</div>
          <div class="label">Delivered Orders</div>
        </div>
        <div class="icon">
          <img src="assets/img/deliveryman.png">
        </div>
      </div>

      <div class="stat-card red">
        <div class="info">
          <div class="value">11</div>
          <div class="label">Canceled Orders</div>
        </div>
        <div class="icon"><img src="assets/img/cancelled.png"height="50px;"></div>
      </div>

      <div class="stat-card orange">
        <div class="info">
          <div class="value">0</div>
          <div class="label">Refunded Orders</div>
        </div>
        <div class="icon">💵</div>
      </div>

      <div class="stat-card red">
        <div class="info">
          <div class="value">1</div>
          <div class="label">Payment Failed Orders</div>
        </div>
        <div class="icon">💳</div>
      </div>

      <div class="stat-card blue">
        <div class="info">
          <div class="value">78</div>
          <div class="label">Unassigned Orders</div>
        </div>
        <div class="icon">📋</div>
      </div>

      <div class="stat-card purple">
        <div class="info">
          <div class="value">3</div>
          <div class="label">Accepted By Delivery Man</div>
        </div>
        <div class="icon">
          <img src="">
        </div>
      </div>

      <div class="stat-card orange">
        <div class="info">
          <div class="value">5</div>
          <div class="label">Cooking In Restaurant</div>
        </div>
        <div class="icon">🍳</div>
      </div>

      <div class="stat-card yellow">
        <div class="info">
          <div class="value">1</div>
          <div class="label">Picked Up By Delivery Man</div>
        </div>
        <div class="icon">🚚</div>
      </div>
    </div>
  </div>

          </div>
        </div> 
    @include('admin.footer')  