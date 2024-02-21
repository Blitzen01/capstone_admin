<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
    include '../assets/script/php_script/dashboard_chart.php';
    
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php"); // Redirect to the index if not logged in
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php' ?>
        <div id="admin-body" class="pt-2">
            <div class="row pt-5">
                <div class="col-lg-3">
                    <?php include '../adminNavigation/sidebar.php'; ?>
                </div>
                <div class="col-lg-9 p-3">
                    <section id="analytics">
                        <?php include '../web_content/analytics.php'; ?>
                    </section>
                    
                    <section id="collection">
                        <?php include '../web_content/collection.php'; ?>
                    </section>
                    
                    <section id="userSatisfaction">
                        <?php include '../web_content/userSatisfaction.php'; ?>
                    </section>
                </div>
            </div>
        </div>



        <script src="../assets/script/script.js"></script>

        <script>
            $(document).ready(function() {
                var satisfactionTable =  $('#satisfactionRating').DataTable({
                    scrollX: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                });
            })

            

            // getting the current month for the admin dashboard / ANALYTICS
            // JavaScript code to get the current month
            var currentDate = new Date();
            var currentMonth = currentDate.toLocaleString('default', { month: 'long' }).toUpperCase();
            
            // Display the current month in the HTML document
            document.getElementById('currentMonth').innerHTML = currentMonth;
            // getting the current month for the admin dashboard / ANALYTICS

            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($labels1); ?>,
                    datasets: [{
                        data: <?php echo json_encode($data1); ?>,
                        borderWidth: 1,
                        backgroundColor: [
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 205, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(175, 192, 192, 1)',
                            'rgba(100, 50, 132, 1)',
                            'rgba(54, 62, 135, 1)',
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgba(175, 192, 192, 1)',
                            'rgba(54, 62, 135, 1)',
                        ]
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            
            const ctxa = document.getElementById('barGraph');

            new Chart(ctxa, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: '# of books',
                        data: <?php echo json_encode($data); ?>,
                        borderWidth: 1,
                        backgroundColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(100, 50, 132, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 205, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                        ]
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    </body>
</html>