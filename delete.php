<?php
    if (array_key_exists('coupon_id', $_POST)) {
        $coupon_id = $_POST['coupon_id'];
        $db = new PDO('sqlite:database1409.db');
        $stmt = $db->prepare('DELETE FROM coupons WHERE coupon_id = :coupon_id');
        $stmt->bindParam(':coupon_id', $coupon_id);
        $stmt->execute();
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
?>
