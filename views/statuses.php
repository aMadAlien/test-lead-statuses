<?php include('components/layout-up.php'); ?>

    <h1>Lead Statuses</h1>
    
    <div>
        <h2>Filter Leads by Date</h1>

        <form method="get" action="statuses.php">
            <label for="date_from">From Date: </label>
            <input type="date" name="date_from" id="date_from" required>
            
            <label for="date_to">To Date:</label>
            <input type="date" name="date_to" id="date_to" required>
            
            <input type="submit" value="Filter">
        </form>
    </div>
    

    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Status</th>
            <th>FTD</th>
        </tr>

        <?php
            include('./../getstatuses.php');
            foreach ($data as $lead) {
                echo "<tr>";
                echo "<td>" . $lead['id'] . "</td>";
                echo "<td>" . $lead['email'] . "</td>";
                echo "<td>" . $lead['status'] . "</td>";
                echo "<td>" . $lead['ftd'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>

<?php include('components/layout-down.php'); ?>