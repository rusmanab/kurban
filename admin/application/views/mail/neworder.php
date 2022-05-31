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
            <th>QTY</th>
            <th>Price</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orderDetail as $o){?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $o->options ?></td>
            <td><?php echo $o->qty ?></td>
            <td><?php echo $o->price ?></td>
            <td><?php echo $o->qty * $o->price ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>


</body>
</html>