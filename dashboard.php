<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <aside>
         <div class="top">
            <div class="logo">
                <img src="Logo.jpeg">
                <h2>Mobileria<span class="emri">HALITI</span></h2>
                </div>
                <div class="close" id="class-btn">
                    <span class="material-icons-sharp">
                        close</span>
                    </div>
                 </div>

                 <div class="sidebar">
                    <a href="#">
                        <span class="material-icons-sharp">
                             grid_view </span>
                             <h3>Dashboard</h3>
                    </a>
                    <a href="#">
                        <span class="material-icons-sharp">
                             person_outline </span>
                             <h3>Customers</h3>
                             </a>
                    <a href="#">
                        <span class="material-icons-sharp">
                             receipt_long </span>
                             <h3>Orders</h3>
                    </a>
                    <!-- <a href="#">
                        <span class="material-icons-sharp">
                             insights </span>
                             <h3>Analytics</h3>
                    </a> -->
                    <!-- <a href="#">
                        <span class="material-icons-sharp">
                             mail_outline </span>
                             <h3>Messages</h3>
                            
                    </a> -->
                    <a href="#">
                        <span class="material-icons-sharp">
                             inventory </span>
                             <h3>Products</h3>
                    </a>
                    <!-- <a href="#">
                        <span class="material-icons-sharp">
                             report</span>
                             <h3>Reports</h3>
                    </a> -->
                    <!-- <a href="#">
                        <span class="material-icons-sharp">
                             settings</span>
                             <h3>Settings</h3>
                    </a> -->
                    <a href="#">
                        <span class="material-icons-sharp">
                             add</span>
                             <h3>Add Product</h3>
                    </a>
                    <a href="#">
                        <span class="material-icons-sharp">
                             logout</span>
                             <h3>Log Out</h3>
                    </a>

                 </div>
                 </aside>

                 <main>
                    <h1>Dashboard</h1>
                    <div class="date">
                        <input type="date">
                    </div>
                    <div class="insights">
                        <div class="sales">
                            <span class="material-icons-sharp">
                                analytics </span>
                                <div class="middle">
                                    <div class="left">
                                        <h3>Total Sales</h3>
                                        <h1>25.444$</h1>
                                    </div>
                                    <div class="progress">
                                        <svg>
                                            <circle cx='38' cy='38' r='36'> </circle>
                                        </svg>
                                        <div class="number">
                                            <p>81%</p>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-muted">Last 24 Hours</small>
                                <!-- sales -->
                        </div>
                        <div class="expenses">
                            <span class="material-icons-sharp">
                                bar_chart </span>
                                <div class="middle">
                                    <div class="left">
                                        <h3>Total Expenses</h3>
                                        <h1>25.444$</h1>
                                    </div>
                                    <div class="progress">
                                        <svg>
                                            <circle cx='38' cy='38' r='36'> </circle>
                                        </svg>
                                        <div class="number">
                                            <p>81%</p>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <!-- expenses -->
                        <div class="income">
                            <span class="material-icons-sharp">
                                stacked_line_chart </span>
                                <div class="middle">
                                    <div class="left">
                                        <h3>Total Sales</h3>
                                        <h1>25.444$</h1>
                                    </div>
                                    <div class="progress">
                                        <svg>
                                            <circle cx='38' cy='38' r='36'> </circle>
                                        </svg>
                                        <div class="number">
                                            <p>50%</p>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-muted">Last 24 Hours</small>
                        </div>


                    </div>

                <div class="recent-order">
                    <h2>Recent Orders</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Price</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> k101</td>
                                <td>800$</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="produktet.php">Show All Products</a>
                </div>
                 </main>

                 
                 
    </div>

    
    
    
</body>

<?php include 'footer.php'?>

</html>
