<?php
class PaymentDetails {
  public static function list() {
    $db = Flight::db();

    $sql = "SELECT * FROM payment_details";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($result);
  }

  public static function get($id) {
    $db = Flight::db();

    $sql = "SELECT * FROM payment_details WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    Flight::json($result);
  }
}