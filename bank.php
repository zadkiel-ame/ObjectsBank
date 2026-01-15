<?php
include "includes/header.php";
include "classes/Account.php";
include "classes/Customer.php";

$accounts = [
    new Account("20489446", "Checking", -200),
    new Account("20148896", "Savings", 3800),
    new Account("12345678", "Pension", 15000),
    new Account("20914200", "Allowance", 4700)
];

$customer = new Customer("Ivy", "Stone", $accounts);
?>

<h2>Name: <?php echo $customer->getFullName(); ?> </h2>

<table>
    <tr>
        <th>Account Number</th>
        <th>Account Type</th>
        <th>Balance (₱)</th>
    </tr>

    <?php foreach ($customer->accounts as $account): ?>
        <tr>
            <td><?php echo $account->number; ?></td>
            <td><?php echo $account->type; ?></td>

            <?php if ($account->balance >= 0): ?>
                <td>₱ <?php echo number_format($account->balance, 2); ?></td>
            <?php else: ?>
                <td class="overdrawn">₱<?php echo number_format($account->balance, 2); ?></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

<?php include "includes/footer.php"; ?>