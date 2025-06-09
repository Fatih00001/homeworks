<div class="container">
    <div class="row">
        <?php
        $kod = $_GET["kod"];
        $sql = "SELECT * FROM site WHERE si_kod='$kod'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $id = $row["si_id"];
                $data = $row["si_data"];
                echo "
                <div class='col-md-6 col-lg-4 mb-4'>
                    <div class='card h-100 shadow-sm'>
                        <div class='card-body'>
                            <div class='d-flex justify-content-end mb-2'>
                                <a href='index5.php?link=duzenle&kod=$kod&id=$id' class='btn btn-sm btn-outline-secondary me-2'>
                                    <i class='bi bi-pencil'></i>
                                </a>
                                <a href='index5.php?link=sil&kod=$kod&id=$id' class='btn btn-sm btn-outline-danger'>
                                    <i class='bi bi-trash'></i>
                                </a>
                            </div>
                            <p class='card-text'>" . nl2br(htmlspecialchars($data)) . "</p>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<p class='text-muted'>Henüz veri bulunmuyor.</p>";
        }
        ?>
    </div>

</div>