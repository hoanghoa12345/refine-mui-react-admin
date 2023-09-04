<?php
class PaymentBills
{
  public static function list()
  {
    # write query to select all from payment_bills using $conn PDO
    # return json
    # add pagination by query param _end: 10 _start: 0
    $start = Flight::request()->query->_start;
    $end = Flight::request()->query->_end;
    $conn = Flight::db();
    // $sql = "SELECT * FROM payment_bills";

    $sql = "SELECT * FROM payment_bills LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$start, $end]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $key => $value) {
      $sql = "SELECT * FROM payment_details WHERE bill_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$value['id']]);
      $result[$key]['payment_details'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    Flight::json($result);
  }

  public static function create()
  {
    # write query to insert into payment_bills using $conn PDO
    # return json
    $request_data = Flight::request()->data;
    $conn = Flight::db();
    $sql = "INSERT INTO `payment_bills` (`id`, `name`, `description`, `total_payment`, `created_at`, `updated_at`, `cycle`) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP, NULL, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
      $request_data->name,
      $request_data->description,
      $request_data->total_payment,
      $request_data->cycle
    ]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($result);
  }

  public static function get($id)
  {
    # write query to select by $id from payment_bills
    # return json
    $conn = Flight::db();
    $sql = "SELECT * FROM payment_bills WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $sql = "SELECT * FROM payment_details WHERE bill_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$result['id']]);
    $result['payment_details'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($result);
  }

  public static function update($id)
  {
    # write query to update by $id from payment_bills
    # return json
    $request_data = Flight::request()->data;
    $conn = Flight::db();
    $sql = "UPDATE `payment_bills` SET `name`=?, `description`=?, `total_payment`=?, `cycle`=? WHERE `id`=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
      $request_data->name,
      $request_data->description,
      $request_data->total_payment,
      $request_data->cycle,
      $id
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    Flight::json($result);
  }

  public static function delete($id)
  {
    # write query to delete by $id from payment_bills
    # return json
    $conn = Flight::db();
    $sql = "DELETE FROM `payment_bills` WHERE `id`=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    Flight::json($result);
  }
}
