<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>StackFood</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"/>
    <link rel="icon" href="public/assets/img/kaiadmin/favicon.ico"type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="assets/img/stackfood.png"
                alt="navbar brand"
                class="navbar-brand"
                height="20"/>
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
            <li class="nav-item active">
       <a href="{{ url('index') }}"class="nav-link"><i class="fas fa-home"></i>
       <p>Dashboard</p>
    </a> 
</li>

              
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <li class="nav-item">
  <a data-bs-toggle="collapse" href="#orderDropdown">
  <i class="fas fa-box"></i>
    <p>Order</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="orderDropdown">
    <ul class="nav nav-collapse">
      <li>
        <a href="{{url('/order_list')}}">
          <span class="sub-item">All</span>
        </a>
      </li>
      <li>
        <a href="{{url('/scheduling')}}">
          <span class="sub-item">Scheduled</span>
        </a>
      </li>
      <li>
        <a href="{{url('/pending')}}">
          <span class="sub-item">Pending</span>
        </a>
      </li>
      <li>
        <a href="{{url('/accepted')}}">
          <span class="sub-item">Accepted</span>
        </a>
      </li>
      <li>
        <a href="{{url('/processing')}}">
          <span class="sub-item">Processing</span>
        </a>
      </li>
      <li>
        <a href="{{url('/food_on_way')}}">
          <span class="sub-item">Food On The Way</span>
        </a>
      </li>
      <li>  
        <a href="{{url('/delivery')}}">
          <span class="sub-item">Delivery</span>
        </a>
      </li>
      <li>
        <a href="{{url('/canceled')}}">
          <span class="sub-item">Canceled</span>
        </a>
      </li>
      <li>
        <a href="{{url('/payment_failed')}}">
          <span class="sub-item">Payment Failed</span>
        </a>
      </li>

      <li>
        <a href="{{url('/refunded')}}">
          <span class="sub-item">Refunded</span>
        </a>
      </li>

      <li>
        <a href="{{url('/din_in')}}">
          <span class="sub-item">Dine IN</span>
        </a>
      </li>

      <li>
        <a href="{{url('/offline_payment')}}">
          <span class="sub-item">Offline Payments</span>
        </a>
      </li>
    </ul>
  </div>
</li>

<li class="nav-item">
  <a href="{{ url('subscription_order') }}">
  <i class="fas fa-table"></i>
    <p>Subscription</p> 
  </a> 
</li>


              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#forms">
                 <i class="fas fa-tools"></i>
                  <p>Dispatch Management</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="forms">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{url('searching_deliveryman')}}">
                        <span class="sub-item">Searching Deliveryman</span>
                      </a>
                    </li>

                    <li>
                      <a href="{{url('ongoing_order')}}">
                        <span class="sub-item">Ongoing Orders</span>
                      </a>
                    </li>

                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables">
                <i class="fas fa-receipt"></i>
                  <p>Order Refunds</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{url('refund_request')}}">
                        <span class="sub-item">New Refund Request</span>
                      </a>
                    </li> 
                  </ul>
                </div>
              </li>

              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Restaurant Management</h4>
                </li>

                <li class="nav-item">
                <a href="{{ url('zone_setup') }}">
                <i class="fas fa-map-marker-alt"></i>
                <p>Zone Setup</p>
               </a>
             </li>

              <li class="nav-item">
                <a  href="{{url('cuisine')}}">
                <i class="fas fa-chart-bar"></i>
                  <p>Cuisine</p> 
                </a> 
              </li> 
    
              <li class="nav-item">
            <a data-bs-toggle="collapse" href="#restaurantMenu">
    <i class="fas fa-store"></i>
    <p>Restaurants</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="restaurantMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="{{url('restaurant_list')}}">
          <span class="sub-item">Restaurant List</span>
        </a>
      </li>
          <li>
          <a href="#">
          <span class="sub-item">New Joining Request</span>
        </a>
      </li> 
    </ul>
  </div>
</li>

              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Food Management</h4>
                </li> 

                <li class="nav-item">
    <a data-bs-toggle="collapse" href="#categoriesMenu" aria-expanded="false" aria-controls="categoriesMenu">
        <i class="fas fa-folder"></i>
        <p>Categories</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="categoriesMenu">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{url('category')}}">
                    <span class="sub-item">Category</span>
                </a>
            </li>
            <li>
                <a href="{{url('sub_category')}}">
                    <span class="sub-item">Sub Category</span>
                </a>
            </li>
        </ul>
    </div>
</li>

             <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables">
                <i class="fas fa-receipt"></i>
                  <p>Addons</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{url('addons_list')}}">
                        <span class="sub-item">List</span>
                      </a>  
                    </li> 
                  </ul>
                </div>
              </li>


    <li class="nav-item">
   <a data-bs-toggle="collapse" href="#foodsDropdown">
    <i class="fas fa-layer-group"></i>
    <p>Foods</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="foodsDropdown">
    <ul class="nav nav-collapse">
      <li>
        <a href="#">
          <span class="sub-item">Add new</span>
        </a>
      </li>
      <li>
        <a href="{{url('food_list')}}">
          <span class="sub-item">List</span>
        </a>
      </li>
      <li>  
        <a href="{{url('review')}}">
          <span class="sub-item">Review</span>
        </a>
      </li>
      <li>
        <a href="">
          <span class="sub-item">Bulk Import</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="sub-item">Bulk Export</span>
        </a>
      </li>
    </ul>
  </div>
</li>
 
               <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Promotions Management</h4>
                </li>

                <li class="nav-item">
    <a data-bs-toggle="collapse" href="#base">
    <i class="fas fa-bullhorn"></i>
    <p>Campaigns</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="base">
    <ul class="nav nav-collapse">
      <li>
        <a href="{{url('campaign_list')}}">
          <span class="sub-item">Basic Campaign</span>
        </a>
      </li>
      <li>
        <a href="{{url('food_campaign')}}">
          <span class="sub-item">Food Campaign</span>
        </a>
      </li>
    </ul>
  </div>
</li>

              <li class="nav-item">
                <a href="{{url('coupon')}}">
                <i class="fas fa-ticket-alt"></i>
                  <p>Coupon</p> 
                </a> 
              </li>

              <li class="nav-item">
                <a href="{{url('cashback')}}">
                <i class="fas fa-money-bill-wave"></i>
                  <p>Cashback</p> 
                </a> 
              </li>

              <li class="nav-item">
                <a href="{{url('benner')}}">
                <i class="fas fa-images"></i>
                  <p>Banners</p> 
                </a> 
              </li>

              <li class="nav-item">
                <a href="">
                <i class="fas fa-ad"></i>
                  <p> Promotional Banners</p> 
                </a> 
              </li> 

              <li class="nav-item">
             <a data-bs-toggle="collapse" href="#base">
         <i class="fas fa-tv"></i>
    <p>Advertisment</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="base">
    <ul class="nav nav-collapse">
      <li>
        <a href="">
          <span class="sub-item">New Advertisement</span>
        </a>
      </li>
     <li>
          <a href="{{url('ads_request')}}">
          <span class="sub-item">Advertisement Request</span>
        </a>
      </li>

      <li>
        <a href="{{url('ads_list')}}">
          <span class="sub-item">List</span>
        </a>
      </li>
    </ul>
</div>
</li>


              <li class="nav-item">
                <a href="{{url('notification')}}">
                <i class="fas fa-bell"></i>
                  <p>Push Notification</p> 
                </a> 
              </li>

              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Help And Support</h4>
              </li>

              <li class="nav-item">
                <a href="{{url('chatting')}}">
                <i class="fas fa-comments"></i>
                  <p>Chattings</p>
                </a> 
              </li>

              <li class="nav-item">
                <a href="{{url('contact_list')}}">
                <i class="fas fa-envelope"></i>
                  <p>Contact Message</p>
                </a> 
              </li>

              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Customer Management</h4>
              </li>

              <li class="nav-item">
                <a href="{{url('customer_list')}}">
                <i class="fas fa-user"></i>
                  <p>Customer</p>
                </a> 
              </li>

              
              <li class="nav-item">
  <a data-bs-toggle="collapse" href="#base">
    <i class="fas fa-wallet"></i>
    <p>Wallet</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="base">
    <ul class="nav nav-collapse">
      <li>
        <a href="{{url('add_fund')}}">
          <span class="sub-item">Add Fund</span>
        </a>
      </li>
      <li>
        <a href="{{url('bonus')}}">
          <span class="sub-item">Bonus</span>
        </a>
      </li>
    </ul>
  </div>
</li>

              
<li class="nav-item">
  <a data-bs-toggle="collapse" href="#loyaltyPointCollapse" aria-expanded="false" aria-controls="loyaltyPointCollapse">
  <i class="fas fa-star"></i> 
    <p>Loyalty Point</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="loyaltyPointCollapse">
    <ul class="nav nav-collapse">
      <li>
        <a href="{{url('report')}}">
          <span class="sub-item">Report</span>
        </a>
      </li>
    </ul> 
  </div>
</li>

             
              <li class="nav-item">
                <a href="{{url('subscribed')}}">
                <i class="fas fa-envelope"></i>
                  <p>Subcribed Mail List</p>
                </a> 
              </li>

              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Customer Management</h4>
              </li>

              <li class="nav-item">
                <a href="{{url('vehicle-list')}}">
                <i class="fas fa-car"></i> 
                  <p>Vehicles Category Setup</p>
                </a> 
              </li>

              <li class="nav-item">
                <a href="{{url('shift')}}">
                <i class="fas fa-clock"></i> 
                  <p>Shift Setup</p>
                </a> 
              </li>
 
              <li class="nav-item">
  <a data-bs-toggle="collapse" href="#deliverymanMenu">
  <i class="fas fa-user"></i>
    <p>Deliveryman</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="deliverymanMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="{{url('join-request')}}">
          <span class="sub-item">New Join Request</span>
        </a>
      </li>
      <li>
        <a href="{{url('add-deliveryman')}}">
          <span class="sub-item">Add New Deliveryman</span>
        </a>
      </li>
      <li>
        <a href="{{url('deliveryman-list')}}">
          <span class="sub-item">Deliveryman List</span>
        </a>
      </li>
      <li>
        <a href="{{url('deliveryman-review')}}">
          <span class="sub-item">Deliveryman Review</span>
        </a>
      </li>
      <li>
        <a href="{{url('deliveryman-bonus')}}">
          <span class="sub-item">Bonus</span>
        </a>
      </li>
      <li>
        <a href="{{url('incentive')}}">
          <span class="sub-item">Incentive Request</span>
        </a>
      </li>
      <li>
        <a href="{{url('incentive-history')}}">
          <span class="sub-item">Incentive History</span>
        </a>
      </li> 
    </ul>
  </div>
</li>

               <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
                </li>
               
                  <li class="nav-item">
                  <a href="">
                  <i class="fas fa-utensils"></i>
                  <p>Resturant Disburseement</p>
                </a> 
               </li>
               
               <li class="nav-item">
                  <a href="">
                  <i class="fas fa-user-shield"></i>
                  <p>Deliveryman Disburseement</p>
                </a> 
               </li>

               
               <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Report Management</h4>
                </li>

                <li class="nav-item">
                  <a href="">
                  <i class="fas fa-file-alt"></i> 
                  <p>Transaction Report</p>
                </a> 
               </li>
               
               <li class="nav-item">
                  <a href="">
                    <i class="fas fa-chart-line"></i>
                  <p>Expense Report</p>
                </a> 
               </li>

               <li class="nav-item">
  <a data-bs-toggle="collapse" href="#deliverymanMenu" aria-expanded="false" aria-controls="deliverymanMenu">
  <i class="fas fa-wallet"></i>
    <p>Disbursement Report</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="deliverymanMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="#">
          <span class="sub-item">Restaurant</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="sub-item">Delivery Man</span>
        </a>
      </li>
    </ul>
  </div>
</li>

<li class="nav-item">
                  <a href="">
                  <i class="fas fa-hamburger"></i>
                  <p>Food Report</p>
                </a> 
               </li>
               
               <li class="nav-item">
  <a data-bs-toggle="collapse" href="#orderReportMenu" aria-expanded="false" aria-controls="orderReportMenu">
    <i class="fas fa-layer-group"></i>
    <p>Order Report</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="orderReportMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="#">
          <span class="sub-item">Regular Order Report</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="sub-item">Campaign Order Report</span>
        </a>
      </li>
    </ul>
  </div>
</li>


<li class="nav-item">
  <a data-bs-toggle="collapse" href="#restaurantReportMenu" aria-expanded="false" aria-controls="restaurantReportMenu">
    <i class="fas fa-layer-group"></i>
    <p>Restaurant Report</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="restaurantReportMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="#">
          <span class="sub-item">Restaurant Report</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="sub-item">Subscription Report</span>
        </a>
      </li>
    </ul>
  </div>
</li>


<li class="nav-item">
  <a data-bs-toggle="collapse" href="#customerReportMenu" aria-expanded="false" aria-controls="customerReportMenu">
    <i class="fas fa-layer-group"></i>
    <p>Customer Report</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="customerReportMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="#">
          <span class="sub-item">Customer Wallet Report</span>
        </a>
      </li> 
    </ul>
  </div>
</li>

                <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Transaction Management</h4>
                </li>

                <li class="nav-item">
                  <a href="{{url('account-trans')}}">
                  <i class="fas fa-layer-group"></i>
                  <p>Collect Cash</p>
                </a> 
               </li>


               <li class="nav-item">
                  <a href="{{url('withdraw_list')}}">
                  <i class="fas fa-layer-group"></i>
                  <p>Restaurant Withdraws</p>
                </a> 
               </li>

               <li class="nav-item">
                  <a href="{{url('provide_delivery_earning')}}">
                  <i class="fas fa-layer-group"></i>
                  <p>Deliveryman Payment</p>
                </a> 
               </li>

               <li class="nav-item">
                  <a href="{{url('withdraw_method')}}">
                  <i class="fas fa-layer-group"></i>
                  <p>Withdraw Method</p>
                </a> 
               </li>

               <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Employee Management</h4>
                </li>

                <li class="nav-item">
                  <a href="{{url('custom_role')}}">
                  <i class="fas fa-layer-group"></i>
                  <p>Employee Rule</p>
                </a> 
               </li>

               <li class="nav-item">
  <a data-bs-toggle="collapse" href="#customerReportMenu" aria-expanded="false" aria-controls="customerReportMenu">
    <i class="fas fa-layer-group"></i>
    <p>Employee</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="customerReportMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="#">
          <span class="sub-item">Add New Employee</span>
        </a>
      </li> 

      <li>
        <a href="#">
          <span class="sub-item">Employee List</span>
        </a>
      </li> 

    </ul>
  </div>
</li>

                <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Business Setting</h4>
                </li>

                <li class="nav-item">
                  <a href="{{url('business_setup')}}">
                  <i class="fas fa-layer-group"></i>
                  <p>Business Setup</p>
                </a> 
               </li>

               <li class="nav-item">
  <a data-bs-toggle="collapse" href="#customerReportMenu" aria-expanded="false" aria-controls="customerReportMenu">
    <i class="fas fa-layer-group"></i>
    <p>Subscription Management</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="customerReportMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="">
          <span class="sub-item">Subscription Package</span>
        </a>
      </li> 

      <li>
        <a href="{{url('subscriber_list')}}">
          <span class="sub-item">Subscriber List</span>
        </a>
      </li>  
    
        <li>
        <a href="{{url('setting')}}">
          <span class="sub-item">Settingsx</span>
        </a>
      </li>  
    </ul>
  </div>
</li>

                 <li class="nav-item">
                  <a href="">
                  <i class="fas fa-layer-group"></i>
                  <p>Email Template</p>
                </a> 
               </li>

               <li class="nav-item">
                  <a href="">
                  <i class="fas fa-layer-group"></i>
                  <p>Theme Settings</p>
                </a> 
               </li>

               <li class="nav-item">
                  <a href="">
                  <i class="fas fa-layer-group"></i>
                  <p>Gallery</p>
                </a> 
               </li>

               <li class="nav-item">
                  <a href="">
                  <i class="fas fa-layer-group"></i>
                  <p>Login Setup</p>
                </a> 
               </li>

               <li class="nav-item">
  <a data-bs-toggle="collapse" href="#customerReportMenu" aria-expanded="false" aria-controls="customerReportMenu">
    <i class="fas fa-layer-group"></i>
    <p>Pages & Social Media </p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="customerReportMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="#">
          <span class="sub-item">Social Media</span>
        </a>
      </li> 

      <li>
        <a href="#">
          <span class="sub-item">Terms And Condition</span>
        </a>
      </li> 

      
      <li>
        <a href="#">
          <span class="sub-item">Privacy Policy</span>
        </a>
      </li> 

      <li>
        <a href="#">
          <span class="sub-item">About Us</span>
        </a>
      </li>  

      <li>
        <a href="#">
          <span class="sub-item">Refund Policy</span>
        </a>
      </li> 

      <li>
        <a href="#">
          <span class="sub-item">Shipping Policy</span>
        </a>
      </li>  

      <li>
        <a href="#">
          <span class="sub-item">Cancellation Policy</span>
        </a>
      </li>  
    </ul>
  </div>
</li>

               <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">System Settings</h4>
                </li>
 
     <li class="nav-item">
     <a data-bs-toggle="collapse" href="#customerReportMenu" aria-expanded="false" aria-controls="customerReportMenu">
     <i class="fas fa-layer-group"></i>
     <p>3rd Party & Configuration</p>
     <span class="caret"></span>
  </a>
  <div class="collapse" id="customerReportMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="#">
          <span class="sub-item">3rd Party</span>
        </a>
      </li>   

      <li>
        <a href="#">
          <span class="sub-item">Firebase Notification</span>
        </a>
      </li> 
 
      <li>
        <a href="#">
          <span class="sub-item">Offline Payment Setup</span>
        </a>
      </li> 

      <li>
        <a href="#">
          <span class="sub-item">Join Us Page Setup</span>
        </a>
      </li>  
    </ul>
  </div>
</li> 

               <li class="nav-item">
                  <a href="">
                  <i class="fas fa-layer-group"></i>
                  <p>App & Web Settings</p>
                </a> 
               </li>

               <li class="nav-item">
                  <a href="">
                  <i class="fas fa-layer-group"></i>
                  <p>Notification Channels</p>
                </a> 
               </li>

               
     <li class="nav-item">
     <a data-bs-toggle="collapse" href="#customerReportMenu" aria-expanded="false" aria-controls="customerReportMenu">
     <i class="fas fa-layer-group"></i>
     <p>Landing Page Settings</p>
     <span class="caret"></span>
  </a>
  <div class="collapse" id="customerReportMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="#">
          <span class="sub-item">Admin Landing Page</span>
        </a>
      </li>   

      <li>
        <a href="#">
          <span class="sub-item">React Landing Page</span>
        </a>
      </li>  
    </ul>
  </div>
</li> 

                 <li class="nav-item">
                  <a href="">
                  <i class="fas fa-layer-group"></i>
                  <p>React Site</p>
                </a> 
               </li>

               <li class="nav-item">
                  <a href="">
                  <i class="fas fa-layer-group"></i>
                  <p>Clean Database</p>
                </a> 
               </li>

               <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">System Addoms</h4>
                </li>

                <li class="nav-item">
                  <a href="">
                  <i class="fas fa-layer-group"></i>
                  <p>System Addons</p>
                </a> 
               </li>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="{{url('/index')}}" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg"alt="navbar brand"class="navbar-brand"height="20"/>
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header --> 
          </div>
          <!-- Navbar Header -->
          <nav  
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"/>
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true">
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="messageDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-envelope"></i>
                  </a>
                  <ul
                    class="dropdown-menu messages-notif-box animated fadeIn"
                    aria-labelledby="messageDropdown">
                    <li>
                      <div
                        class="dropdown-title d-flex justify-content-between align-items-center">
                        Messages
                        <a href="#" class="small">Mark all as read</a>
                      </div>
                    </li>
                    <li>
                      <div class="message-notif-scroll scrollbar-outer">
                        <div class="notif-center">
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/jm_denis.jpg"
                                alt="Img Profile"/>
                            </div>
                            <div class="notif-content">
                              <span class="subject">Jimmy Denis</span>
                              <span class="block"> How are you ? </span>
                              <span class="time">5 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/chadengle.jpg"
                                alt="Img Profile"/>
                            </div>
                              <div class="notif-content">
                              <span class="subject">Chad</span>
                              <span class="block"> Ok, Thanks ! </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/mlane.jpg"
                                alt="Img Profile"/>
                            </div>
                            <div class="notif-content">
                              <span class="subject">Jhon Doe</span>
                              <span class="block">
                                Ready for the meeting today...
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/talha.jpg"
                                alt="Img Profile"/>
                            </div>
                            <div class="notif-content">
                              <span class="subject">Talha</span>
                              <span class="block"> Hi, Apa Kabar ? </span>
                              <span class="time">17 minutes ago</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="notifDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="notification">4</span>
                  </a>
                  <ul
                    class="dropdown-menu notif-box animated fadeIn"
                    aria-labelledby="notifDropdown">
                    <li>
                      <div class="dropdown-title">
                        You have 4 new notification
                      </div>
                    </li>
                    <li>
                      <div class="notif-scroll scrollbar-outer">
                        <div class="notif-center">
                          <a href="#">
                            <div class="notif-icon notif-primary">
                              <i class="fa fa-user-plus"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block"> New user registered </span>
                              <span class="time">5 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-icon notif-success">
                              <i class="fa fa-comment"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block">
                                Rahmad commented on Admin
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/profile2.jpg"
                                alt="Img Profile"/>
                            </div>
                            <div class="notif-content">
                              <span class="block">
                                Reza send messages to you
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-icon notif-danger">
                              <i class="fa fa-heart"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block"> Farrah liked Admin </span>
                              <span class="time">17 minutes ago</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <a class="see-all" href="javascript:void(0);"
                        >See all notifications<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false">
                    <i class="fas fa-layer-group"></i>
                  </a>
                  <div class="dropdown-menu quick-actions animated fadeIn">
                    <div class="quick-actions-header">
                      <span class="title mb-1">Quick Actions</span>
                      <span class="subtitle op-7">Shortcuts</span>
                    </div>
                    <div class="quick-actions-scroll scrollbar-outer">
                      <div class="quick-actions-items">
                        <div class="row m-0">
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div class="avatar-item bg-danger rounded-circle">
                                <i class="far fa-calendar-alt"></i>
                              </div>
                              <span class="text">Calendar</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-warning rounded-circle">
                                <i class="fas fa-map"></i>
                              </div>
                              <span class="text">Maps</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div class="avatar-item bg-info rounded-circle">
                                <i class="fas fa-file-excel"></i>
                              </div>
                              <span class="text">Reports</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-success rounded-circle">
                                <i class="fas fa-envelope"></i>
                              </div>
                              <span class="text">Emails</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-primary rounded-circle">
                                <i class="fas fa-file-invoice-dollar"></i>
                              </div>
                              <span class="text">Invoice</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-secondary rounded-circle">
                                <i class="fas fa-credit-card"></i>
                              </div>
                              <span class="text">Payments</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="assets/img/profile.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold">Hizrian</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="assets/img/profile.jpg"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div> 
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
