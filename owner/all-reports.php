<!DOCTYPE html>
<html lang="en">
<?php
    require_once 'includes/owner-header-sidebar.php';
?>
<head>
    <Title>All Reports</Title>
</head>
    <!-- Main Content Area -->
    <body>
    <div class="main-content">
        <div class="row">
            <div class="col-md-9 offset-md-3 mt-4">
                <!-- Welcome Section -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h2 class="mb-0">All Reports</h2>
                    </div>
                </div>

                <!-- Overview Cards and Reports -->
                <div class="row">
                    <!-- Total Income Chart -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Income</h5>
                                <canvas id="totalIncomeChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Earning This Month Chart -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Earning This Month</h5>
                                <canvas id="earningThisMonthChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Rental Frequency Pie Chart -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rental Frequency</h5>
                                <canvas id="rentalFrequencyChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Maintenance & Issues Table -->
                    <div class="col-md-8 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Maintenance & Issues</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Gadget</th>
                                            <th>Issue Reported</th>
                                            <th>Date Reported</th>
                                            <th>Status</th>
                                            <th>Action Taken</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>iPhone 12</td>
                                            <td>Battery draining quickly</td>
                                            <td>Oct 1, 2024</td>
                                            <td>In Progress</td>
                                            <td>Sent for maintenance</td>
                                            <td>Awaiting response</td>
                                        </tr>
                                        <tr>
                                            <td>GoPro Hero 9</td>
                                            <td>Lens crack</td>
                                            <td>Sep 28, 2024</td>
                                            <td>Resolved</td>
                                            <td>Replaced lens</td>
                                            <td>Ready for use</td>
                                        </tr>
                                        <tr>
                                            <td>MacBook Pro</td>
                                            <td>Charging port not working</td>
                                            <td>Sep 25, 2024</td>
                                            <td>Pending</td>
                                            <td>Not yet addressed</td>
                                            <td>Parts on order</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Transaction History Table -->
                    <div class="col-md-8 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Transaction History</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Gadget</th>
                                            <th>Renter</th>
                                            <th>Rental Amount</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2024-10-01</td>
                                            <td>Laptop X1</td>
                                            <td>John Doe</td>
                                            <td>₱7,500</td>
                                            <td>Completed</td>
                                        </tr>
                                        <tr>
                                            <td>2024-10-02</td>
                                            <td>Camera Canon M5</td>
                                            <td>Jane Smith</td>
                                            <td>₱2,000</td>
                                            <td>Pending</td>
                                        </tr>
                                        <tr>
                                            <td>2024-10-03</td>
                                            <td>iPhone 13 Pro</td>
                                            <td>Mike Johnson</td>
                                            <td>₱3,500</td>
                                            <td>Failed</td>
                                        </tr>
                                        <tr>
                                            <td>2024-10-04</td>
                                            <td>Laptop HP Elite</td>
                                            <td>Alice Cooper</td>
                                            <td>₱8,000</td>
                                            <td>Completed</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Gadgets Availability & Ratings -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Gadgets Availability & Ratings</h5>
                                <p>Available: <strong>5 gadgets</strong></p>
                                <p>Rented: <strong>3 gadgets</strong></p>
                                <p>In Maintenance: <strong>2 gadgets</strong></p>
                                <p>Camera: <span class="text-warning">⭐⭐⭐⭐⭐ (4.5 average rating)</span></p>
                                <p>Laptops: <span class="text-warning">⭐⭐⭐⭐⭐ (3.2 average rating)</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Commission Deducted Section -->
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Commission Deducted</h5>
                                <p>Total Commission Deducted: <strong>₱5,000</strong></p>
                                <p>Commission Rate: <strong>10%</strong></p>
                                <p>Earnings Before Deduction: <strong>₱15,000</strong></p>
                                <p>Net Earnings After Deduction: <strong>₱14,500</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Render Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Total Income Chart
        const totalIncomeCtx = document.getElementById('totalIncomeChart').getContext('2d');
        new Chart(totalIncomeCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Total Income',
                    data: [5000, 7000, 8000, 12000, 15000, 14000, 16000, 18000, 17000, 19000, 20000, 22000],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false
                }]
            },
            options: {
                responsive: true
            }
        });

        // Earning This Month Chart
        const earningThisMonthCtx = document.getElementById('earningThisMonthChart').getContext('2d');
        new Chart(earningThisMonthCtx, {
            type: 'bar',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Earnings',
                    data: [3000, 5000, 4000, 6000],
                    backgroundColor: 'rgba(153, 102, 255, 0.6)'
                }]
            },
            options: {
                responsive: true
            }
        });

        // Rental Frequency Pie Chart
        const rentalFrequencyCtx = document.getElementById('rentalFrequencyChart').getContext('2d');
        new Chart(rentalFrequencyCtx, {
            type: 'pie',
            data: {
                labels: ['Laptops', 'Cameras', 'iPhones'],
                datasets: [{
                    label: 'Rental Frequency',
                    data: [45, 30, 25],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>
