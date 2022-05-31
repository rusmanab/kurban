<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="lolkittens" />

	<title>New Order</title>
</head>
<body>
<p>New Order From <strong><?php echo $memberProfile->full_name ?></strong> Order Number <strong><?php echo $noorder ?></strong></p>

<table>
    <tr>
        <td>Address</td>
        <td>: <?php echo $memberProfile->address ?></td>
    </tr>
    <tr>
        <td>Contact Number</td>
        <td>: <?php echo $memberProfile->phone_number ?></td>
    </tr>
</table>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Item</th>
            <th>Qty</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1;  foreach($orderDetail as $o){?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $o->options ?></td>
            <td><?php echo $o->qty ?></td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>

<p>You can accept or reject, in your page.</p>

</body>
</html>