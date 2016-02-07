<?php
function get_products_by_type($media_type) {
	global $db;
	$query = '
		SELECT *
		FROM product';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':media_type', $media_type);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		display_db_error($error_message);
	}
}

function get_product($product_id) {
    global $db;
	$query = '
		SELECT *
		FROM product
		WHERE product_id = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_product($media_type, $price, $description, $size, $stock_available, $category) {
	global $db;
	// WORK ON THIS ONCE DAVID GETS YOU TABLES and SPROCS
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, description, listPrice,
                  discountPercent, dateAdded)
              VALUES
                 (:category_id, :code, :name, :description, :price,
                  :discount_percent, NOW())';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':discount_percent', $discount_percent);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $product_id = $db->lastInsertId();
        return $product_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_product($product_id, $media_type, $price, $description, $size, $stock_available, $category, $inactive) {
    global $db;
	// WORK ON THIS ONCE DAVID GETS YOU TABLES AND SPROCS
    $query = '
        UPDATE Products
        SET productName = :name,
            productCode = :code,
            description = :desc,
            listPrice = :price,
            discountPercent = :discount,
            categoryID = :category_id
        WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':desc', $desc);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':discount', $discount);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM product WHERE product_id = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>