<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Sub-tables in One Column</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .sub-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .sub-table th, .sub-table td {
            border: 1px solid #ccc;
            padding: 4px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Report Overall</h1>
    <table>
        <thead>
            <tr>
                <th>Main Table Header</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <!-- Container div to hold all three sub-tables -->
                    <div>
                        <table class="sub-table">
                            <!-- Sub-table 1: Minor -->
                            <thead>
                                <tr>
                                    <th colspan="7">Minor</th>
                                </tr>
                                <tr>
                                    <th>Unique Number</th>
                                    <th>Work Order Number</th>
                                    <th>Batch Status</th>
                                    <th>Item Code</th>
                                    <th>Product Type</th>
                                    <th>Batch Number</th>
                                    <th>Completed Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data rows for Minor -->
                                <tr>
                                    <td>123</td>
                                    <td>WO001</td>
                                    <td>Active</td>
                                    <td>IC001</td>
                                    <td>Minor</td>
                                    <td>BN001</td>
                                    <td>2023-06-10</td>
                                </tr>
                                <!-- More rows as needed -->
                            </tbody>
                        </table>

                        <table class="sub-table">
                            <!-- Sub-table 2: Ruah -->
                            <thead>
                                <tr>
                                    <th colspan="7">Ruah</th>
                                </tr>
                                <tr>
                                    <th>Unique Number</th>
                                    <th>Work Order Number</th>
                                    <th>Batch Status</th>
                                    <th>Item Code</th>
                                    <th>Product Type</th>
                                    <th>Batch Number</th>
                                    <th>Completed Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data rows for Ruah -->
                                <tr>
                                    <td>124</td>
                                    <td>WO002</td>
                                    <td>Inactive</td>
                                    <td>IC002</td>
                                    <td>Ruah</td>
                                    <td>BN002</td>
                                    <td>2023-06-11</td>
                                </tr>
                                <!-- More rows as needed -->
                            </tbody>
                        </table>

                        <table class="sub-table">
                            <!-- Sub-table 3: Kemas -->
                            <thead>
                                <tr>
                                    <th colspan="7">Kemas</th>
                                </tr>
                                <tr>
                                    <th>Unique Number</th>
                                    <th>Work Order Number</th>
                                    <th>Batch Status</th>
                                    <th>Item Code</th>
                                    <th>Product Type</th>
                                    <th>Batch Number</th>
                                    <th>Completed Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data rows for Kemas -->
                                <tr>
                                    <td>125</td>
                                    <td>WO003</td>
                                    <td>Pending</td>
                                    <td>IC003</td>
                                    <td>Kemas</td>
                                    <td>BN003</td>
                                    <td>2023-06-12</td>
                                </tr>
                                <!-- More rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
