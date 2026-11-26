<?php

require_once __DIR__ . '/../../Config/DBConnection.php';

class InsertBookModel
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnection();
        $this->conn = $db->getConnection();
    }

 
    private function getCategoryId($categoryName)
    {
        $stmt = $this->conn->prepare("SELECT categoryid FROM bookcategory WHERE category = ?");
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stmt->close();
            return (int)$row['categoryid'];
        }

        $stmt->close();

        $insertStmt = $this->conn->prepare("INSERT INTO bookcategory (category) VALUES (?)");
        if (!$insertStmt) {
            return null;
        }

        $insertStmt->bind_param("s", $categoryName);
        if (!$insertStmt->execute()) {
            $insertStmt->close();
            return null;
        }

        $insertStmt->close();

        $selectStmt = $this->conn->prepare("SELECT categoryid FROM bookcategory WHERE category = ?");
        $selectStmt->bind_param("s", $categoryName);
        $selectStmt->execute();
        $selectResult = $selectStmt->get_result();
        $newRow = $selectResult->fetch_assoc();
        $selectStmt->close();

        return $newRow ? (int)$newRow['categoryid'] : null;
    }

   
    public function insertBook($bookname, $isbn, $category, $author, $imgData, $bookprice, $description, $bookquantity)
{
    $categoryid = $this->getCategoryId($category);

    if ($categoryid === null) {
        return false;
    }

   
    $check = $this->conn->prepare("SELECT * FROM book WHERE isbn = ?");
    $check->bind_param("s", $isbn);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $check->close();
        return 'duplicate';
    }
    $check->close();

    try {
        $stmt = $this->conn->prepare(
            "INSERT INTO book (bookname, isbn, categoryid, author, coverimg, bookprice, description, bookquantity)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->bind_param("ssissdsi",
            $bookname,
            $isbn,
            $categoryid,
            $author,
            $imgData,
            $bookprice,
            $description,
            $bookquantity
        );

        $stmt->execute();
        $stmt->close();
        return true;

    } catch (mysqli_sql_exception $e) {
        if (str_contains($e->getMessage(), 'Duplicate entry')) {
            return 'duplicate';
        }
        return false;
    }
}
}
