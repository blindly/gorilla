<table class='table table-striped'>
    <tr>
        <th>Price</th>
        <th>Store / Website</th>
        <th>City</th>
        <th>Date</th>
    </tr>
    
    <? foreach( $expenses->result_array() as $expense ) :?>
        <tr>
            <td><?= $expense->amount ?></td>
            <td><?= $expense->merchant ?></td>
            <td><?= $expense->location ?></td>
            <td><?= $expense->datestamp ?></td>
        </tr>
    <?php endforeach; ?>
</table>