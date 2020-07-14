<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Full Slider - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="../css/full-slider.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
<header class="white-bg-header">
        <div class="top-header_part">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="left-header-centre">
                            <div class="logo-center">
                               <a href="../front-100-home-page.html"><img src="../images/logo.png"></a>
                            </div>
                            <div class="logo-text-centre">
                                <p>Partner Centre</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 text-right">
                        <div class="right-partner-header">
                            <ul>
                                <li><strong>BIGW Store</strong></li>
                                <li><a href="partner-centre-login.html" class="">Log out</a></li>
                            </ul>
                            <div class="vendor-name-header">
                                Baulkham Hills, 2153 NSW, Australia
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


 <section class="yellow-thin">
    </section><section class="vertical-thin-menu">
        <div class="container">
            <div class="row">
                <div class="my-account-vertical">
                    <ul class="vertical-menu">
                        <li><a href="dashboard.html" class="active">Home</a></li>
                        <li><a href="#."> Profile <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="#.">Business Profile</a></li>
                                <li><a href="#.">Setting</a></li>
                                <li><a href="#.">User</a></li>
                            </ul>
                        </li>
                        <li><a href="#."> Orders <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="dashboard-past-transaction.html">Past transactions</a></li>
                                <li><a href="dashboard-order.html">Current Orders</a></li>
                                <li><a href="dashboard-refund-cancellation.html">Refunds and Cancellations </a></li>
                            </ul>
                        </li>
                        <li><a href="#."> Reporting <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="dashboard-sale-revenue.html">Sale Revenue</a></li>
                                <li><a href="dashboard-review.html">Reviews</a></li>
                            </ul>
                        </li>
                        <li><a href="#."> Inventory <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="dashboard-product.html">Inventory</a></li>
                                <li><a href="dashboard-bulk-upload.html">Bulk Upload</a></li>
                                <li><a href="dashboard-add-inventory.html">Product Upload</a></li>
                            </ul>
                        </li>
                        <li><a href="#."> Business Support <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="dashboard-business-help.html">Business Help</a></li>
                            </ul>
                        </li>
                        <li><a href="#."> Marketing <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="dashboard-sponsered.html">Sponsored Bidding</a></li>
                                <li><a href="dashboard-promotion.html">Promotions</a></li>
                                <li><a href="#.">Site Banners</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="content-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <h3>Invetory</h3>
                    </div>
                    <div class="col-sm-6">
                        <a href="dashboard-add-inventory.html" class="btn blue">Add Invetory</a>
                        <a href="dashboard-bulk-upload.html" class="btn btn-primary">Bulk Upload</a>
                    </div>
                </div>
                <div class="row inventory-search" style="margin-top: 30px;">
                    <div class="col-sm-2 form-group">
                        <select class="form-control">
                            <option>Select Category</option>
                            <option>Category 1</option>
                            <option>Category 2</option>
                            <option>Category 3</option>
                            <option>Category 4</option>
                            <option>Category 5</option>
                        </select>
                    </div>
                    <div class="col-sm-2 form-group" style="padding-left: 0;">
                        <input type="Search" class="form-control events-timing" placeholder="Product Title">
                    </div>
                    <div class="col-sm-2 form-group" style="padding: 0;">
                        <input type="Search" class="form-control events-timing" placeholder="Product ID">
                    </div>
                    <div class="col-sm-2 form-group">
                        <input type="Search" class="form-control events-timing" placeholder="SKU">
                    </div>
                    <div class="col-sm-4 form-group" style="padding: 0;">
                        <input type="submit" class="btn btn-defualt" value="Search">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 order-sm-2">
                        <div class="float-sm-right" style="margin-top:10px;">
                            <a><i class="fa fa-download" aria-hidden="true">  Export</i></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
                <div class="my-address">
                    <div class="edit-account">
                        <table id="example" class="display table">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2323</td>
                                    <td><img src="../images/table-pro.jpg" style="width:12%;"></td>
                                    <td>DC TONIK Sneakers</td>
                                    <td>1234</td>
                                    <td>$10</td>
                                    <td>5</td>
                                    <td>Enable</td>
                                    <td><a href="dashboard-edit-inventory.html"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2323</td>
                                    <td><img src="../images/table-pro.jpg" style="width:12%;"></td>
                                    <td>DC TONIK Sneakers</td>
                                    <td>1234</td>
                                    <td>$10</td>
                                    <td>5</td>
                                    <td>Enable</td>
                                    <td><a href="dashboard-edit-inventory.html"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2323</td>
                                    <td><img src="../images/table-pro.jpg" style="width:12%;"></td>
                                    <td>DC TONIK Sneakers</td>
                                    <td>1234</td>
                                    <td>$10</td>
                                    <td>5</td>
                                    <td>Enable</td>
                                    <td><a href="dashboard-edit-inventory.html"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2323</td>
                                    <td><img src="../images/table-pro.jpg" style="width:12%;"></td>
                                    <td>DC TONIK Sneakers</td>
                                    <td>1234</td>
                                    <td>$10</td>
                                    <td>5</td>
                                    <td>Enable</td>
                                    <td><a href="dashboard-edit-inventory.html"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="clearfix"></div>
    <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="../images/footer-logo.png">
                        <ul>
                            <li>
                                <a href="#"><img src="../images/map.jpg"> <span>Mailing Address - Suite 524, 29 Smith Street <br> &nbsp&nbsp&nbsp&nbsp Parramatta NSW 2150</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../images/phone.jpg"> <span>+61404468909</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../images/mail.jpg"> <span>info@ikozy.com.au</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4>CUSTOMER CARE</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul>
                                    <li><a href="../user-251-login-page.html">My Account</a></li>
                                    <li><a href="../front-order-tracking.html">Order Tracking</a></li>
                                    <!-- <li><a href="#">Wish List</a></li> -->
                                    <li><a href="../front-help-center.html">Customer Service</a></li>
                                    <li><a href="../front-refund-policy.html">Return / Exchange</a></li>
                                    <li><a href="partner-centre-list-your-business.html">Become A Partner Retailer</a></li>
                                    <li><a href="../front-faq.html">Faq</a></li>
                                    
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul>
                                    <li><a href="../front-100-home-page.html">Home</a></li>
                                    <li><a href="../front-blog-posts-list.html">Blog</a></li>
                                    <li><a href="../front-about-us.html">About Us</a></li>
                                    <li><a href="../front-help-center.html">Contact Us</a></li>
                                    <li><a href="../front-privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="../front-help-center.html">Help Center</a></li>
                                    <li><a href="../front-terms-and-condition.html">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </footer>
    <div class="footer-strip">
        <div class="container">
            <p>copyright &copy; 2018 <span class="social">
                <a href="#"><img src="../images/fb.png" /></a>
                <a href="#"><img src="../images/Logos-Pinterest-Copyrighted-icon copy.png" /></a> 
                <a href="#"><img src="../images/insta.png" /></a> 
                <a href="#"><img src="../images/twitter.png" /></a> 
                </span>
                <span class="pull-right bottom-icon">
                <i class="fa fa-cc-visa"></i>
                <i class="fa fa-cc-mastercard"></i> 
                <i class="fa fa-cc-paypal"></i> 
                <i class="fa fa-cc-amex"></i>
                <img src="../images/download.png">
                <img src="../images/Untitled-1.png">
                </span></p>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "paging": true,
            "ordering": true,
            "info": false
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#qty_input').prop('disabled', true);
        $('#plus-btn').click(function() {
            $('#qty_input').val(parseInt($('#qty_input').val()) + 1);
        });
        $('#minus-btn').click(function() {
            $('#qty_input').val(parseInt($('#qty_input').val()) - 1);
            if ($('#qty_input').val() == 0) {
                $('#qty_input').val(1);
            }
        });
    });

    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('fa-plus fa-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
</body>

</html>