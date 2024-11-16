<?php
// products.php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $products = json_decode(file_get_contents('products.json'), true);

    if ($action === 'add') {
        $name = $_POST['name'];
        $price = (float)$_POST['price'];
        $products[] = ['name' => $name, 'price' => $price];
    } elseif ($action === 'remove') {
        $name = $_POST['name'];
        $products = array_filter($products, fn($p) => $p['name'] !== $name);
    }
    file_put_contents('products.json', json_encode($products));
    echo json_encode(['success' => true]);
}
