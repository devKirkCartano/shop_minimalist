<?php
session_start(); // start session with the user who logged in

require_once("connect_db.php"); // include connection to database

$sql = "SELECT * FROM users WHERE email = '" . $_SESSION['email'] . "'"; // query to select the user who logged in
$result = mysqli_query($conn, $sql); // execute the query
$row = mysqli_fetch_assoc($result); // fetch the result, or data in a row

// fetch standard shipping sales
$sql_strd = "SELECT * FROM sales where shipment = 'Standard'";
if ($result_strd = mysqli_query($conn, $sql_strd)) {
  $rowcount_strd = mysqli_num_rows($result_strd);
}

// fetch prio shipping sales
$sql_prio = "SELECT * FROM sales where shipment = 'Priority'";
if ($result_prio = mysqli_query($conn, $sql_prio)) {
  $rowcount_prio = mysqli_num_rows($result_prio);
}

$sql_ovs = "SELECT * FROM sales where shipment = 'Overseas'";
if ($result_ovs = mysqli_query($conn, $sql_ovs)) {
  $rowcount_ovs = mysqli_num_rows($result_ovs);
}

$sql_sale = "SELECT date, total FROM `sales` ORDER BY `sales`.`date` ASC;"; // select date and total from sales table
$sale = mysqli_query($conn, $sql_sale); // execute query
$row_sale = mysqli_fetch_assoc($sale); // fetch the result, or data in a row
$total = $row_sale['total']; // store total in variable
$date = $row_sale['date']; // store date in variable
//     $total = $row_sale['total']; // store total in variable
// if (mysqli_num_rows($sale) > 0) {
// while ($row_sale = mysqli_fetch_assoc($sale)) {
//     $date = $row_sale['date']; // store date in variable
//     $total = $row_sale['total']; // store total in variable
//     echo '<script>alert("' . $date . '")</script>';
//     echo '<script>alert("' . $total . '")</script>';
// }
// }
// if user is logged in, it means that the session variables are set or contain values. Then display the dashboard
if (isset($_SESSION['fname']) && isset($_SESSION['lname']) && isset($_SESSION['email'])) {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Dashboard - Shop Minimalist</title>
        <link rel="icon" type="image/png" sizes="1946x1946" href="assets/img/imported_images/logo-circle.png">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/styles.min.css">
        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

        <!-- Script for pie chart -->
        <script>
            am5.ready(function () {
  // Create root1 element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root1 = am5.Root.new("pie");

  // Set themes
  // https://www.amcharts.com/docs/v5/concepts/themes/
  root1.setThemes([am5themes_Animated.new(root1)]);

  // Create chart
  // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
  // start and end angle must be set both for chart and series
  var chart = root1.container.children.push(
    am5percent.PieChart.new(root1, {
      layout: root1.verticalLayout,
      innerRadius: am5.percent(40),
    })
  );

  // Create series
  // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
  // start and end angle must be set both for chart and series
  var series0 = chart.series.push(
    am5percent.PieSeries.new(root1, {
      valueField: "bottles",
      categoryField: "country",
      alignLabels: false,
    })
  );

  var bgColor = root1.interfaceColors.get("background");

  series0.ticks.template.setAll({ forceHidden: true });
  series0.labels.template.setAll({ forceHidden: true });
  series0.slices.template.setAll({
    stroke: bgColor,
    strokeWidth: 2,
    tooltipText:
      "{category}: {valuePercentTotal.formatNumber('0.00')}% ({value} bottles)",
  });
  series0.slices.template.states.create("hover", { scale: 0.95 });

  var series1 = chart.series.push(
    am5percent.PieSeries.new(root1, {
      valueField: "litres",
      categoryField: "country",
      alignLabels: true,
    })
  );

  series1.slices.template.setAll({
    stroke: bgColor,
    strokeWidth: 2,
    tooltipText:
      "{category}: {valuePercentTotal.formatNumber('0.00')}% ({value} litres)",
  });

  var data = [
    {
      country: "Lithuania",
      litres: 501.9,
      bottles: 1500,
    },
    {
      country: "Czech Republic",
      litres: 301.9,
      bottles: 990,
    },
    {
      country: "Ireland",
      litres: 201.1,
      bottles: 785,
    },
    {
      country: "Germany",
      litres: 165.8,
      bottles: 255,
    },
    {
      country: "Australia",
      litres: 139.9,
      bottles: 452,
    },
    {
      country: "Austria",
      litres: 128.3,
      bottles: 332,
    },
    {
      country: "UK",
      litres: 99,
      bottles: 150,
    },
    {
      country: "Belgium",
      litres: 60,
      bottles: 178,
    },
    {
      country: "The Netherlands",
      litres: 50,
      bottles: 50,
    },
  ];

  // Set data
  // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
  series0.data.setAll(data);
  series1.data.setAll(data);

  // Play initial series animation
  // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
  series0.appear(1000, 100);
  series1.appear(1000, 100);
}); // end am5.ready()

        </script>
<!-- Script for sales chart -->

    <script>
        am5.ready(function () {
  // Create root2 element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root2 = am5.Root.new("sales");

  // Set themes
  // https://www.amcharts.com/docs/v5/concepts/themes/
  root2.setThemes([am5themes_Animated.new(root2)]);

  root2.dateFormatter.setAll({
    dateFormat: "yyyy",
    dateFields: ["valueX"],
  });
<?php
    echo " var data = [";
?>    
<?php
        while ($row_sale = mysqli_fetch_assoc($sale)) {
            $date = $row_sale['date']; // store date in variable
            $total = $row_sale['total']; // store total in variable
            echo "{";
            echo "date: '$date',";
            echo "value: $total,";
            echo "},";
        }
    
        // echo "{";
        // echo 'date: "' .$date . '",';
        // echo "value: 13,";
        // echo "},";
        // echo "{";
        // echo 'date: "2012-07-28",';
        // echo "value: 13,";
        // echo "},";
?>
    // {
    //   date: "2012-07-27",
    //   value: 13,
    // },
    // {
    //   date: "2012-07-27",
    //   value: 14,
    // },
<?php
  echo "];"
?>
  // Create chart
  // https://www.amcharts.com/docs/v5/charts/xy-chart/
  var chart = root2.container.children.push(
    am5xy.XYChart.new(root2, {
      focusable: true,
      panX: true,
      panY: true,
      wheelX: "panX",
      wheelY: "zoomX",
      pinchZoomX: true,
    })
  );

  var easing = am5.ease.linear;

  // Create axes
  // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
  var xAxis = chart.xAxes.push(
    am5xy.DateAxis.new(root2, {
      maxDeviation: 0.1,
      groupData: false,
      baseInterval: {
        timeUnit: "day",
        count: 1,
      },
      renderer: am5xy.AxisRendererX.new(root2, {}),
      tooltip: am5.Tooltip.new(root2, {}),
    })
  );

  var yAxis = chart.yAxes.push(
    am5xy.ValueAxis.new(root2, {
      maxDeviation: 0.2,
      renderer: am5xy.AxisRendererY.new(root2, {}),
    })
  );

  // Add series
  // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
  var series = chart.series.push(
    am5xy.LineSeries.new(root2, {
      minBulletDistance: 10,
      connect: false,
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value",
      valueXField: "date",
      tooltip: am5.Tooltip.new(root2, {
        pointerOrientation: "horizontal",
        labelText: "{valueY}",
      }),
    })
  );

  series.fills.template.setAll({
    fillOpacity: 0.2,
    visible: true,
  });

  series.strokes.template.setAll({
    strokeWidth: 2,
  });

  // Set up data processor to parse string dates
  // https://www.amcharts.com/docs/v5/concepts/data/#Pre_processing_data
  series.data.processor = am5.DataProcessor.new(root2, {
    dateFormat: "yyyy-MM-dd",
    dateFields: ["date"],
  });

  series.data.setAll(data);

  series.bullets.push(function () {
    var circle = am5.Circle.new(root2, {
      radius: 4,
      fill: root2.interfaceColors.get("background"),
      stroke: series.get("fill"),
      strokeWidth: 2,
    });

    return am5.Bullet.new(root2, {
      sprite: circle,
    });
  });

  // Add cursor
  // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
  var cursor = chart.set(
    "cursor",
    am5xy.XYCursor.new(root2, {
      xAxis: xAxis,
      behavior: "none",
    })
  );
  cursor.lineY.set("visible", false);

  // add scrollbar
  chart.set(
    "scrollbarX",
    am5.Scrollbar.new(root2, {
      orientation: "horizontal",
    })
  );

  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  chart.appear(1000, 100);
}); // end am5.ready()

// End sales chart
    </script>
<!-- Start slice chart -->
<script>
  am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("slice");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(am5percent.PieChart.new(root, {
  layout: root.verticalLayout,
  innerRadius: am5.percent(50)
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(am5percent.PieSeries.new(root, {
  valueField: "value",
  categoryField: "category",
  alignLabels: false
}));

series.labels.template.setAll({
  textType: "circular",
  centerX: 0,
  centerY: 0
});


// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([
  { value: <?php echo $rowcount_strd ?>, category: "Standard" },
  { value: <?php echo $rowcount_prio ?>, category: "Priority" },
  { value: <?php echo $rowcount_ovs ?>, category: "Overseas" },
]);


// Create legend
// https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
var legend = chart.children.push(am5.Legend.new(root, {
  centerX: am5.percent(50),
  x: am5.percent(50),
  marginTop: 15,
  marginBottom: 15,
}));

legend.data.setAll(series.dataItems);


// Play initial series animation
// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
series.appear(1000, 100);

}); // end am5.ready()
</script>
    </head>

    <body id="page-top">
        <div id="wrapper">
            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
                id="sidebar-left">
                <div class="container-fluid d-flex flex-column p-0"><a
                        class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                        href="index.php"><img id="logo" class="border rounded-circle"
                            src="assets/img/imported_images/logo-circle.png" />
                        <div class="sidebar-brand-icon rotate-n-15"></div>
                        <div class="sidebar-brand-text mx-3"><span class="fs-6 brand-name icon-color brand-name-text">Shop
                                Minimalist <br />Admin</span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item"><a class="nav-link active icon-color" href="index.php"><i
                                    class="fas fa-tachometer-alt icon-color"></i><span>Dashboard</span></a></li>
                        <li class="nav-item"><a class="nav-link icon-color" href="salesInventory.php"><svg
                                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1em"
                                viewBox="0 0 24 24" width="1em" fill="currentColor" class="icon-color">
                                <rect fill="none" height="24" width="24"></rect>
                                <path
                                    d="M13,10h-2V8h2V10z M13,6h-2V1h2V6z M7,18c-1.1,0-1.99,0.9-1.99,2S5.9,22,7,22s2-0.9,2-2S8.1,18,7,18z M17,18 c-1.1,0-1.99,0.9-1.99,2s0.89,2,1.99,2s2-0.9,2-2S18.1,18,17,18z M8.1,13h7.45c0.75,0,1.41-0.41,1.75-1.03L21,4.96L19.25,4l-3.7,7 H8.53L4.27,2H1v2h2l3.6,7.59l-1.35,2.44C4.52,15.37,5.48,17,7,17h12v-2H7L8.1,13z">
                                </path>
                            </svg><span>Sales</span></a></li>
                        <li class="nav-item"><a class="nav-link icon-color" href="inventory.php"><i
                                class="far fa-list-alt icon-color"></i><span>Inventory List</span></a></li>

                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                            id="sidebarToggle" type="button"></button></div>
                </div>
            </nav>
            <div class="d-flex flex-column main-content" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                                id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                        id="search-bar" placeholder="Search for ..."><button
                                        class="btn btn-primary py-0 icon-color" id="btn-search" type="button"><i
                                            class="fas fa-search"></i></button></div>
                            </form>
                            <ul class="navbar-nav flex-nowrap ms-auto">
                                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><i
                                            class="fas fa-search"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                        aria-labelledby="searchDropdown">
                                        <form class="me-auto navbar-search w-100">
                                            <div class="input-group"><input class="bg-light form-control border-0 small"
                                                    type="text" placeholder="Search for ...">
                                                <div class="input-group-append"><button class="btn btn-primary py-0"
                                                        type="button"><i class="fas fa-search"></i></button></div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                            aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                                class="badge bg-danger badge-counter">3+</span><i
                                                class="fas fa-bell fa-fw icon-color"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                            <h6 class="dropdown-header card-text" id="alert-bg">alerts center</h6><a
                                                class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="me-3">
                                                    <div class="bg-primary icon-circle"><i
                                                            class="fas fa-file-alt text-white"></i></div>
                                                </div>
                                                <div><span class="small text-gray-500">December 12, 2019</span>
                                                    <p>A new monthly report is ready to download!</p>
                                                </div>
                                            </a><a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="me-3">
                                                    <div class="bg-success icon-circle"><i
                                                            class="fas fa-donate text-white"></i></div>
                                                </div>
                                                <div><span class="small text-gray-500">December 7, 2019</span>
                                                    <p>$290.29 has been deposited into your account!</p>
                                                </div>
                                            </a><a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="me-3">
                                                    <div class="bg-warning icon-circle"><i
                                                            class="fas fa-exclamation-triangle text-white"></i></div>
                                                </div>
                                                <div><span class="small text-gray-500">December 2, 2019</span>
                                                    <p>Spending Alert: We've noticed unusually high spending for your
                                                        account.</p>
                                                </div>
                                            </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                                Alerts</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                            aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                                class="badge bg-danger badge-counter">7</span><i
                                                class="fas fa-envelope fa-fw icon-color card-text"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                            <h6 class="dropdown-header card-text">alerts center</h6><a
                                                class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="dropdown-list-image me-3"><img class="rounded-circle"
                                                        src="assets/img/avatars/avatar4.jpeg">
                                                    <div class="bg-success status-indicator"></div>
                                                </div>
                                                <div class="fw-bold">
                                                    <div class="text-truncate"><span>Hi there! I am wondering if you can
                                                            help me with a problem I've been having.</span></div>
                                                    <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                                </div>
                                            </a><a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="dropdown-list-image me-3"><img class="rounded-circle"
                                                        src="assets/img/avatars/avatar2.jpeg">
                                                    <div class="status-indicator"></div>
                                                </div>
                                                <div class="fw-bold">
                                                    <div class="text-truncate"><span>I have the photos that you ordered last
                                                            month!</span></div>
                                                    <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                                </div>
                                            </a><a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="dropdown-list-image me-3"><img class="rounded-circle"
                                                        src="assets/img/avatars/avatar3.jpeg">
                                                    <div class="bg-warning status-indicator"></div>
                                                </div>
                                                <div class="fw-bold">
                                                    <div class="text-truncate"><span>Last month's report looks great, I am
                                                            very happy with the progress so far, keep up the good
                                                            work!</span></div>
                                                    <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                                </div>
                                            </a><a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="dropdown-list-image me-3"><img class="rounded-circle"
                                                        src="assets/img/avatars/avatar5.jpeg">
                                                    <div class="bg-success status-indicator"></div>
                                                </div>
                                                <div class="fw-bold">
                                                    <div class="text-truncate"><span>Am I a good boy? The reason I ask is
                                                            because someone told me that people say this to all dogs, even
                                                            if they aren't good...</span></div>
                                                    <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                                </div>
                                            </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                                Alerts</a>
                                        </div>
                                    </div>
                                    <div class="shadow dropdown-list dropdown-menu dropdown-menu-end"
                                        aria-labelledby="alertsDropdown"></div>
                                </li>
                                <div class="d-none d-sm-block topbar-divider"></div>
                                <li class="nav-item dropdown no-arrow">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                            aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                                class="d-none d-lg-inline me-2 text-gray-600 small title-text"
                                                id="name"><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></span><img
                                                class="border rounded-circle img-profile"
                                                src="assets/img/imported_images/female_profile.svg"></a>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                            <?php
                                            echo "<a class=\"dropdown-item\" href=\"profile.php?id=$row[id]\"><i class=\"fas fa-user fa-sm fa-fw me-2 text-gray-400\"></i> Profile</a>";
                                            ?>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="logout.php"><i
                                                    class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h3 class="text-dark mb-0 title-page-text">Dashboard</h3><a
                                class="btn btn-primary btn-sm d-none d-sm-inline-block gen-report-color" role="button"
                                id="btn-gen-report" href="#"><i
                                    class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-start-primary py-2 dashboard-card">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span
                                                        class="card-text">Earnings (monthly)</span></div>
                                                <div class="text-dark fw-bold h5 mb-0 text-dashboard"><span>$40,000</span>
                                                </div>
                                            </div>
                                            <div class="col-auto"><i
                                                    class="fas fa-calendar fa-2x text-gray-300 icon-color"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-start-success py-2 dashboard-card">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <div class="text-uppercase text-success fw-bold text-xs mb-1 c"><span
                                                        class="card-text">Earnings (annual)</span></div>
                                                <div class="text-dark fw-bold h5 mb-0 text-dashboard"><span>$215,000</span>
                                                </div>
                                            </div>
                                            <div class="col-auto"><i
                                                    class="fas fa-dollar-sign fa-2x text-gray-300 icon-color"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-start-info py-2 dashboard-card">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <div class="text-uppercase text-info fw-bold text-xs mb-1"><span
                                                        class="card-text">Tasks</span></div>
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-auto">
                                                        <div class="text-dark fw-bold h5 mb-0 me-3 text-dashboard">
                                                            <span>50%</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-info" aria-valuenow="50"
                                                                aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                                <span class="visually-hidden">50%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto"><i
                                                    class="fas fa-clipboard-list fa-2x text-gray-300 icon-color"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-start-warning py-2 dashboard-card">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span
                                                        class="card-text">New Arrival | Restock </span></div>
                                                <div class="text-dark fw-bold h5 mb-0 text-dashboard"><span>18</span></div>
                                            </div>
                                            <div class="col-auto"><i
                                                    class="fas fa-comments fa-2x text-gray-300 icon-color"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Start: Chart -->
                        <div class="row">
                            <div class="col-lg-5 col-xl-7">
                                <div class="card shadow mb-4 graph-bg">
                                    <div class="card-header d-flex justify-content-between align-items-center header-graph">
                                        <h6 class="text-primary fw-bold m-0 graph-text">Sales Overview</h6>
                                        <!-- <div class="dropdown no-arrow">
                                            <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                                    class="fas fa-ellipsis-v text-gray-400"></i></button>
                                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                <p class="text-center dropdown-header">dropdown header:</p><a
                                                    class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item"
                                                    href="#">&nbsp;Another action</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                                    href="#">&nbsp;Something else here</a>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="card-body">
                                        <!-- Sales Overview Chart -->
                                        <!-- HTML -->
                                        <div id="pie"></div>
                                        <!-- <div id="chartdiv"></div> -->
                                        <!-- <div class="chart-area"><canvas
                                                data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xl-5">
                                <div class="card shadow mb-4 graph-bg">
                                    <div class="card-header d-flex justify-content-between align-items-center header-graph">
                                        <h6 class="text-primary fw-bold m-0 graph-text">Shipment Sales Overview</h6>
                                        <!-- <div class="dropdown no-arrow">
                                            <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                                    class="fas fa-ellipsis-v text-gray-400"></i></button>
                                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                <p class="text-center dropdown-header">dropdown header:</p><a
                                                    class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item"
                                                    href="#">&nbsp;Another action</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                                    href="#">&nbsp;Something else here</a>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="card-body">
                                        <!-- Sales Overview Chart -->
                                        <!-- HTML -->
                                        <div id="slice"></div>
                                        <!-- <div id="chartdiv"></div> -->
                                        <!-- <div class="chart-area"><canvas
                                                data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-xl-12">
                                <div class="card shadow mb-4 graph-bg">
                                    <div class="card-header d-flex justify-content-between align-items-center header-graph">
                                        <h6 class="text-primary fw-bold m-0 graph-text">Stocks Sources</h6>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div id="sales"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End: Chart -->
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="text-center my-auto copyright"><span class="copyright-text"><a
                                href="https://www.instagram.com/_shopminimalist/" target="_blank"><svg
                                    class="bi bi-instagram socmed-icon" xmlns="http://www.w3.org/2000/svg" width="1em"
                                    height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                    </path>
                                </svg>
                            </a><a href="https://www.facebook.com/shopminimalist" target="_blank"><svg
                                    class="bi bi-facebook socmed-icon" xmlns="http://www.w3.org/2000/svg" width="1em"
                                    height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                    </path>
                                </svg>
                            </a>
                        </span></div>
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span class="copyright-text">Copyright © Shop Minimalist
                                2023</span></div>
                    </div>
                </footer>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <script src="assets/js/script.min.js"></script>
    </body>

    </html>
<?php
} else {
    // user is not logged in, redirect to login page
    header("location:login.php");
}
// Close connection
mysqli_close($conn);
?>


