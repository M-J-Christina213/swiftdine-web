<?php 
session_start();
include '../../config/db.php';

$session_id = session_id();

$stmt = $conn->prepare("
    SELECT m.id, m.name, m.price, c.quantity
    FROM cart c
    JOIN menus m ON c.menu_id = m.id
    WHERE c.session_id = ?
");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;
$items = [];

while ($row = $result->fetch_assoc()) {
    $row['subtotal'] = $row['quantity'] * $row['price'];
    $items[] = $row;
    $total += $row['subtotal'];
}

if (empty($items)) {
    echo '<p class="text-gray-500">Your cart is empty.</p>';
    exit;
}
?>

<ul class="divide-y divide-gray-200 mb-4 max-h-96 overflow-y-auto">
    <?php foreach ($items as $item): ?>
    <li class="py-2 flex justify-between items-center">
        <div>
            <p class="font-semibold"><?= htmlspecialchars($item['name']) ?></p>
            <p class="text-sm text-gray-600">Qty: <?= $item['quantity'] ?></p>
        </div>
        <div class="flex items-center gap-2">
            <p class="font-semibold">LKR <?= number_format($item['subtotal'], 2) ?></p>
            <button onclick="ajaxCart('remove', <?= $item['id'] ?>)" class="text-red-500 hover:text-red-700" title="Remove item">
                &times;
            </button>
        </div>
    </li>
    <?php endforeach; ?>
</ul>

<div class="border-t border-gray-300 pt-4 flex justify-between font-bold text-lg">
    <span>Total:</span>
    <span>LKR <?= number_format($total, 2) ?></span>
</div>

<a href="checkout.php" class="block mt-6 w-full text-center bg-green-600 text-white py-3 rounded hover:bg-green-700 transition">
    Proceed to Checkout
</a>

<script>
function ajaxCart(action, menu_id, quantity=1) {
    const formData = new FormData();
    formData.append('action', action);
    formData.append('menu_id', menu_id);
    formData.append('quantity', quantity);

    fetch('cart_actions.php', { method: 'POST', body: formData })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            fetch('cart_summary.php')
            .then(res => res.text())
            .then(html => {
                document.getElementById('cart-summary').innerHTML = html;
            });
        } else {
            alert(data.message || 'Failed to update cart');
        }
    });
}
</script>
