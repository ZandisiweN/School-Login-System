 <?php
require "header.php";

?>
<style>
    .styled-table{
        counter-reset: tableCount;
    }
    .counter-cell{
        content: counter(tableCount);
        counter-increment: tableCount;

    }
    input {
        width: 100%;
        height: 100%;
    }
</style>
<table class = "styled-table">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Name</th>
            <th>Points</th>
            <th>English Language</th>
            <th>Social Studies</th>
            <th>Physical Education</th>
            <th>History</th>
            <th>Maths</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td class = "counter-cell"></td>
            <td>contenteditable = 'true'</td>
        </tr>

    </tbody>
</table>

