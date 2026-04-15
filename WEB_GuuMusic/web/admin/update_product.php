<?php
include '../components/connect.php';

function getProductById($conn, $id)
{
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateProduct($conn, $id, $name, $category, $price, $image, $quantity, $describe)
{
    $sql = "UPDATE products SET name = :name, category = :category, price = :price, image = :image, quantity = :quantity, `describe` = :describe WHERE id = :id";    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindParam(':describe', $describe, PDO::PARAM_STR);

    return $stmt->execute();
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    $product = getProductById($conn, $id);

    if (!$product) {
        echo "Sản phẩm không tồn tại!";
        exit();
    }

    if (isset($_POST['update_product'])) {
        $newName = $_POST['name'];
        $newCategory = $_POST['category'];
        $newPrice = $_POST['price'];
        $newImage = $_POST['image'];
        $newQuantity = $_POST['quantity'];
        $newDescribe = $_POST['describe'];

        if (updateProduct($conn, $id, $newName, $newCategory, $newPrice, $newImage, $newQuantity, $newDescribe)) {
            echo "<script>alert('Cập nhật thành công!'); window.location.href='../admin/products.php';</script>";
        } else {
            echo "Cập nhật thất bại!";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin_style.css">
        <link rel="icon" href="../img/logo2.png">

        <title>Update Product</title>
    </head>
    <style>
        .update_products form {
    margin: 0 auto;
    max-width: 50rem;
    background-color: var(--white);
    border-radius: .5rem;
    box-shadow: var(--box-shadow);
    border: var(--border);
    padding: 2rem;
    text-align: left;
}

.update_products form label {
    display: block;
    margin-bottom: 0.5rem;
    font-size: 1.8rem;
    color: var(--black);
}
.update_products form h3{
    margin-bottom: ;
    text-align: center;
    margin-bottom: 1rem;
    font-size: 2.5rem;
    color: var(--black);
    text-transform: capitalize;
}
.update_products form input,
.update_products form textarea {
    background-color: var(--light-bg);
    border: var(--border);
    width: 100%;
    padding: 1.4rem;
    font-size: 1.8rem;
    color: var(--black);
    border-radius: .5rem;
    margin: 1rem 0;
}

.update_products form textarea {
    resize: vertical;
}

.update_products form input[type="submit"] {
    font-weight: bold;
    background-color: blue;
    color: var(--black);
    font-size: 1.8rem;
    padding: 1.2rem 2rem;
    cursor: pointer;
    border: none;
    border-radius: 0.5rem;
}
.box {
    width: 100%;
    padding: 1.4rem;
    font-size: 1.8rem;
    color: var(--black);
    border-radius: .5rem;
    margin: 1rem 0;
    appearance: none;
    background: url('path-to-arrow-icon.png') no-repeat right center;
    background-size: 1.5rem;
    border: 2px solid !important ;
}

.box option:hover {
    background-color: var(--hover-bg-color);
    color: var(--hover-text-color);
}

.box option:checked {
    background-color: var(--selected-bg-color);
    color: var(--selected-text-color);
}

    </style>
    <body>
        <section class="update_products">
            <form action="" method="post">
                <h3>Cập nhật sản phẩm</h3>
                <label for="name">Tên sản phẩm:</label>
                <input type="text" name="name" value="<?php echo $product['name']; ?>">
                
                <label for="category">Danh mục:</label>
                <select name="category" class="box" required>
                    <option value="" disabled selected>Chọn loại sản phẩm</option>
                    <option value="violin"<?php echo ($product['category'] == 'cajon') ? 'selected' : ''; ?>>violin</option>
                    <option value="guitar"<?php echo ($product['category'] == 'guitar') ? 'selected' : ''; ?>>guitar</option>
                    <option value="piano"<?php echo ($product['category'] == 'piano') ? 'selected' : ''; ?>>piano</option>
                    <option value="cajon"<?php echo ($product['category'] == 'cajon') ? 'selected' : ''; ?>>cajon</option>
                    <option value="drum"<?php echo ($product['category'] == 'drum') ? 'selected' : ''; ?>>drum</option>
                    <option value="effect"<?php echo ($product['category'] == 'effect') ? 'selected' : ''; ?>>effect</option>
                    <option value="amplifier"<?php echo ($product['category'] == 'amplifier') ? 'selected' : ''; ?>>amplifier</option>
                    <option value="mic"<?php echo ($product['category'] == 'mic') ? 'selected' : ''; ?>>mic</option>
                    <option value="organ"<?php echo ($product['category'] == 'organ') ? 'selected' : ''; ?>>organ</option>
                    <option value="saxophone"<?php echo ($product['category'] == 'saxophone') ? 'selected' : ''; ?>>saxophone </option>
                    <option value="ukulele"<?php echo ($product['category'] == 'ukulele') ? 'selected' : ''; ?>>ukulele</option>
                    <option value="khac"<?php echo ($product['category'] == 'khac') ? 'selected' : ''; ?>>Phụ kiện</option>
                </select>
                
                <label for="price">Giá:</label>
                <input type="number" name="price" value="<?php echo $product['price']; ?>">
                
                <label for="image">Link ảnh:</label>
                <input type="text" name="image" value="<?php echo $product['image']; ?>">
                
                <label for="quantity">Số lượng:</label>
                <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>">
                
                <label for="describe">Mô tả:</label>
                <textarea name="describe"><?php echo $product['describe']; ?></textarea>
                
                <input type="submit" value="Update" name="update_product" class="btn">
            </form>
        </section>
    </body>
    </html>
    <?php
} else {
    echo "ID không hợp lệ!";
}
?>
