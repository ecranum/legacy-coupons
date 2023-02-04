<?php
    $coupon_id = $_POST['coupon_id'];
    $db = new PDO('sqlite:database1409.db');
    $stmt = $db->prepare('SELECT coupon_info, user_name, date FROM coupons WHERE coupon_id = :coupon_id');
    $stmt->bindParam(':coupon_id', $coupon_id);
    $stmt->execute();
    $result = $stmt->fetch();
    echo json_encode($result);
