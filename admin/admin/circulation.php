<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
    
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
        <title>Circulation</title>

        <link rel="stylesheet" href="../assets/style/style.css">
        
    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            
        </div>

        <div id="admin-body" class="pt-2">
            <div class="row">
                <div class="col-lg-3">
                    <?php include '../adminNavigation/sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <section id="bookReservation" class="">
                        <?php include '../web_content/bookReservation.php'; ?>
                    </section>
                    
                    <section id="bookBorrowed">
                        <?php include '../web_content/bookBorrowed.php'; ?>
                    </section>
                    
                    <section id="bookTransaction">
                        <?php include '../web_content/bookTransaction.php'; ?>
                    </section>
                </div>
            </div>
        </div>

        <script src="../assets/script/script.js"></script>

        <script>
            $(document).ready(function() {
                // Perform initial search based on URL parameter
                searchBasedOnName();

                // Listen for changes in the URL
                $(window).on('popstate', function() {
                    // Perform search when the URL changes
                    searchBasedOnName();
                });
            });

            // Function to get URL parameter by name
            function getUrlParameter(url, name) {
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            }

            // Function to perform search based on name parameter in URL
            function searchBasedOnName() {
                var url = window.location.href;
                var name = getUrlParameter(url, 'name');

                console.log("Name parameter:", name); // Check if the name parameter is retrieved correctly

                // Initialize DataTable if it's not already initialized and name parameter is null
                if (name === null) {
                    if (!$.fn.DataTable.isDataTable('#bookReserveTable')) {
                        $('#bookReserveTable').DataTable({
                            scrollX: true
                        });
                    }
                } else {
                    // Check if DataTable is already initialized
                    var table = $('#bookReserveTable').DataTable();
                    if (table) {
                        // Perform search if DataTable is already initialized
                        console.log("Datatable instance:", table); // Check if the DataTable instance is retrieved
                        table.search(name).draw();
                        console.log("Search performed for:", name); // Log that the search is performed
                    }
                }
            }


            // loading datatable | handle circulation
            $(document).ready(function () {
                // DataTable initialization for bookReserveTable
                // DataTable initialization for bookBorrowedTable
                var dataTableBorrowed = $('#bookBorrowedTable').DataTable({
                    scrollX: true
                });

                // DataTable initialization for bookBorrowedTable
                var dataTableBorrowed = $('#bookTransactionTable').DataTable({
                    scrollX: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                });

                // Handle the click event on the "Accept" button
                $('.accept_request').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var callNo = $(this).data('callno');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');

                    // Set data in the modal
                    $('#process_modalId').text(id);
                    $('#process_modalLibraryId').text(libraryId);
                    $('#process_modalName').text(name);
                    $('#process_modalCourse').text(course);
                    $('#process_modalEmail').text(email);
                    $('#process_modalAccessNo').text(accessNo);
                    $('#process_modalTittle').text(title);
                    $('#process_modalCallNo').text(callNo);
                    $('#process_modalPickUpDate').text(pickupDate);
                    $('#process_modalReturnDate').text(returnDate);

                    // Show the modal
                    $('#process_reservation').modal('show');

                    // Handle the 'Pick Up' button click
                    $('#process_reservation .btn-success').click(function () {
                        // Construct the URL with query parameters
                        var redirectUrl = '../render/bookCirculation/process_reservation.php' +
                            '?id=' + encodeURIComponent(id) +
                            '&libraryId=' + encodeURIComponent(libraryId) +
                            '&name=' + encodeURIComponent(name) +
                            '&course=' + encodeURIComponent(course) +
                            '&email=' + encodeURIComponent(email) +
                            '&accessNo=' + encodeURIComponent(accessNo) +
                            '&title=' + encodeURIComponent(title) +
                            '&callno=' + encodeURIComponent(callNo) +
                            '&pickupDate=' + encodeURIComponent(pickupDate) +
                            '&returnDate=' + encodeURIComponent(returnDate);

                        // Redirect to the new page
                        window.location.href = redirectUrl;
                    });
                });

                // Handle the click event on the "Decline" button
                $('.decline_request').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var callNo = $(this).data('callno');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');

                    // Set data in the modal
                    $('#deny_modalId').text(id);
                    $('#deny_modalLibraryId').text(libraryId);
                    $('#deny_modalName').text(name);
                    $('#deny_modalCourse').text(course);
                    $('#deny_modalEmail').text(email);
                    $('#deny_modalAccessNo').text(accessNo);
                    $('#deny_modalTittle').text(title);
                    $('#deny_modalCallNo').text(callNo);
                    $('#deny_modalPickUpDate').text(pickupDate);
                    $('#deny_modalReturnDate').text(returnDate);

                    // Show the modal
                    $('#deny_reservation').modal('show');

                    // Handle the 'Decline' button click
                    $('#deny_reservation .btn-danger').click(function () {
                        // Get selected option from the dropdown
                        var selectedOption =  $('#declineOption').val();

                        // Validate if a valid option is selected
                        if (selectedOption !== 'default') {
                            // Construct the URL with query parameters
                            var redirectUrl = '../render/bookCirculation/deny_reservation.php' +
                                '?id=' + encodeURIComponent(id) +
                                '&libraryId=' + encodeURIComponent(libraryId) +
                                '&name=' + encodeURIComponent(name) +
                                '&course=' + encodeURIComponent(course) +
                                '&email=' + encodeURIComponent(email) +
                                '&accessNo=' + encodeURIComponent(accessNo) +
                                '&title=' + encodeURIComponent(title) +
                                '&callno=' + encodeURIComponent(callNo) +
                                '&pickupDate=' + encodeURIComponent(pickupDate) +
                                '&returnDate=' + encodeURIComponent(returnDate) +
                                '&selectedOption=' + encodeURIComponent("Declined, " + selectedOption);

                            // Redirect to the new page
                            window.location.href = redirectUrl;
                        } else {
                            // Handle the case when no option is selected
                            alert('Please select a decline option.');
                        }
                    });
                });

                // Handle the 'Return' button click
                $('.book_return').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var callNo = $(this).data('callno');
                    var pickupDate = $(this).data('pickup');
                    var dueDate = $(this).data('due');
                    var returnDate = $(this).data('return');
                    var fine = $(this).data('fine');

                    // Set data in the modal
                    $('#return_modalId').text(id);
                    $('#return_modalLibraryId').text(libraryId);
                    $('#return_modalName').text(name);
                    $('#return_modalCourse').text(course);
                    $('#return_modalEmail').text(email);
                    $('#return_modalAccessNo').text(accessNo);
                    $('#return_modalTittle').text(title);
                    $('#return_modalCallNo').text(callNo);
                    $('#return_modalPickUpDate').text(pickupDate);
                    $('#return_modalDueDate').text(dueDate);
                    $('#return_modalReturnDate').text(returnDate);
                    $('#return_modalfine').text(fine);

                    // Show the modal
                    $('#book_return').modal('show');

                    // Handle the 'Damage' button click
                    $('#book_return .btn-success').click(function () {
                        // Construct the URL with query parameters
                        var redirectUrl = '../render/bookCirculation/book_return.php' +
                            '?id=' + encodeURIComponent(id) +
                            '&libraryId=' + encodeURIComponent(libraryId) +
                            '&name=' + encodeURIComponent(name) +
                            '&course=' + encodeURIComponent(course) +
                            '&email=' + encodeURIComponent(email) +
                            '&accessNo=' + encodeURIComponent(accessNo) +
                            '&title=' + encodeURIComponent(title) +
                            '&callno=' + encodeURIComponent(callNo) +
                            '&pickupDate=' + encodeURIComponent(pickupDate) +
                            '&dueDate=' + encodeURIComponent(dueDate) +
                            '&returnDate=' + encodeURIComponent(returnDate) +
                            '&fine='+ encodeURIComponent(fine);

                        // Redirect to the new page
                        window.location.href = redirectUrl;
                    });
                });

                // Handle the click event on the "Damage" button
                $('.book_damage').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var callNo = $(this).data('callno');
                    var pickupDate = $(this).data('pickup');
                    var dueDate = $(this).data('due');
                    var returnDate = $(this).data('return');
                    var fine = $(this).data('fine');
                    
                    // Set data in the modal
                    $('#damage_modalId').text(id);
                    $('#damage_modalLibraryId').text(libraryId);
                    $('#damage_modalName').text(name);
                    $('#damage_modalCourse').text(course);
                    $('#damage_modalEmail').text(email);
                    $('#damage_modalAccessNo').text(accessNo);
                    $('#damage_modalTittle').text(title);
                    $('#damage_modalCallNo').text(callNo);
                    $('#damage_modalPickUpDate').text(pickupDate);
                    $('#damage_modalDueDate').text(dueDate);
                    $('#damage_modalReturnDate').text(returnDate);
                    $('#damage_modalfine').text(fine);

                    // Show the modal
                    $('#book_damage').modal('show');

                    // Handle the 'Damage' button click
                    $('#book_damage .btn-danger').click(function () {
                        // Construct the URL with query parameters
                        var redirectUrl = '../render/bookCirculation/book_damage.php' +
                            '?id=' + encodeURIComponent(id) +
                            '&libraryId=' + encodeURIComponent(libraryId) +
                            '&name=' + encodeURIComponent(name) +
                            '&course=' + encodeURIComponent(course) +
                            '&email=' + encodeURIComponent(email) +
                            '&accessNo=' + encodeURIComponent(accessNo) +
                            '&title=' + encodeURIComponent(title) +
                            '&callno=' + encodeURIComponent(callNo) +
                            '&pickupDate=' + encodeURIComponent(pickupDate) +
                            '&dueDate=' + encodeURIComponent(dueDate) +
                            '&returnDate=' + encodeURIComponent(returnDate) +
                            '&fine='+ encodeURIComponent(fine);

                        // Redirect to the new page
                        window.location.href = redirectUrl;
                    });
                });

                // Handle the click event on the "missing" button
                $('.book_missing').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var callNo = $(this).data('callno');
                    var pickupDate = $(this).data('pickup');
                    var dueDate = $(this).data('due');
                    var returnDate = $(this).data('return');
                    var fine = $(this).data('fine');
                    
                    // Set data in the modal
                    $('#missing_modalId').text(id);
                    $('#missing_modalLibraryId').text(libraryId);
                    $('#missing_modalName').text(name);
                    $('#missing_modalCourse').text(course);
                    $('#missing_modalEmail').text(email);
                    $('#missing_modalAccessNo').text(accessNo);
                    $('#missing_modalTittle').text(title);
                    $('#missing_modalCallNo').text(callNo);
                    $('#missing_modalPickUpDate').text(pickupDate);
                    $('#missing_modalDueDate').text(dueDate);
                    $('#missing_modalReturnDate').text(returnDate);
                    $('#missing_modalfine').text(fine);

                    // Show the modal
                    $('#book_missing').modal('show');

                    // Handle the 'Missing' button click
                    $('#book_missing .btn-warning').click(function () {
                        // Construct the URL with query parameters
                        var redirectUrl = '../render/bookCirculation/book_missing.php' +
                            '?id=' + encodeURIComponent(id) +
                            '&libraryId=' + encodeURIComponent(libraryId) +
                            '&name=' + encodeURIComponent(name) +
                            '&course=' + encodeURIComponent(course) +
                            '&email=' + encodeURIComponent(email) +
                            '&accessNo=' + encodeURIComponent(accessNo) +
                            '&title=' + encodeURIComponent(title) +
                            '&callno=' + encodeURIComponent(callNo) +
                            '&pickupDate=' + encodeURIComponent(pickupDate) +
                            '&dueDate=' + encodeURIComponent(dueDate) +
                            '&returnDate=' + encodeURIComponent(returnDate) +
                            '&fine='+ encodeURIComponent(fine);

                        // Redirect to the new page
                        window.location.href = redirectUrl;
                    });
                });
            });
            // loading datatable | handle circulation
        </script>
    </body>
</html>