<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Cricket Players</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #3498db;
            color: white;
            cursor: pointer;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .controls {
            text-align: center;
            margin: 10px 0;
        }
        .controls button {
            padding: 8px 16px;
            margin: 0 5px;
            background-color: #2ecc71;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        .controls button:hover {
            background-color: #27ae60;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            table {
                width: 100%;
                font-size: 14px;
            }
            th, td {
                padding: 8px;
            }
            .controls button {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Indian Cricket Players</h2>

        <!-- <div class="controls">
            <button onclick="sortAscending()">Sort A-Z</button>
            <button onclick="sortDescending()">Sort Z-A</button>
        </div> -->

        <table>
            <tr>
                <th>Sr. No</th>
                <th>Player Name</th>
            </tr>

            <?php
            //  Creating an array of Indian Cricket Players
            $players = array("Virat Kohli", "Rohit Sharma", "MS Dhoni", "Sachin Tendulkar", "Kapil Dev", 
                             "Rahul Dravid", "Sourav Ganguly", "Yuvraj Singh", "Jasprit Bumrah", "Hardik Pandya");

            // Function to display the table
            function displayTable($players) {
                global $sr_no;
                $sr_no = 1;
                foreach ($players as $player) {
                    echo "<tr>
                            <td>$sr_no</td>
                            <td>$player</td>
                          </tr>";
                    $sr_no++;
                }
            }

            // F    unction to display array data in table
            displayTable($players);

          
            ?>
        </table>
    </div>

</body>
</html>