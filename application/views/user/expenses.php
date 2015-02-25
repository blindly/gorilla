<h3 class="text-center"><?= $category ?></h3>"; ?>

<table class='table table-striped'>
    <tr>
        <th>Amount</th>
        <th>Merchant</th>
        <th>Location</th>
        <th>Timestamp</th>
    </tr>
    
    <? foreach( $expenses->result_array() as $expense ) :?>
        <tr>
            <td><?= $expense->amount ?></td>
            <td><?= $expense->merchant ?></td>
            <td><?= $expense->location ?></td>
            <td><?= $expense->timestamp ?></td>
        </tr>
    <?php endforeach; ?>
</table>