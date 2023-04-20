<div class="toolbar toolbar-products row" id="toolbar">
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php $termekekSzama = mysqli_query(
            $conn,
            "SELECT max(id) FROM `modellek`"
        );
        ?>
        <?php //$termekekSzama > "SELECT MAX('id') -> FROM `modellek`"; ?>
        <p class="toolbar-amount" id="toolbar-amount">
            Az oldalon
            <strong>
                <span class="toolbar-number">
                    <?php //echo "$termekekSzama"; ?>
                </span>
            </strong>
            termékből
            <strong>
                <span class="toolbar-number">1</span>
            </strong>
            -
            <strong>
                <span class="toolbar-number">9</span>
            </strong>
            vannak felsorolva!
        </p>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="container">
            <strong class="label pages-label">Jelenleg az</strong>
            <ul class="pagination ">
                <div class="row">
                    <li id="pagekinezet" <?php if ($page_no = 1) ?>>
                        <a href='modellek.php?page_no=1'>
                            <button type="button" class="btn btn-block btn-outline-dark " id="page">
                                <strong class="page">
                                    <span>1.</span>
                                </strong>
                            </button>
                        </a>
                    </li>

                    <li id="pagekinezet">
                        <a href='modellek.php?page_no=2'>
                            <button type="button" class="btn btn-block btn-outline-dark" id="page">
                                <strong class="page">
                                    <span>2.</span>
                                </strong>
                            </button>
                        </a>
                    </li>
                </div>
            </ul>
            <strong class="label pages-label">oldalon tartókodik!</strong>
            <ul class="pagination row">
                <li id="pagekinezet" <?php if ($page_no <= 1) {
                    echo "class='disabled'";
                } ?>>
                    <a <?php if ($page_no > 1) {
                        echo "href='?page_no=1'";
                    } ?>>
                        <button type="button" class="btn btn-block btn-outline-dark " id="page">
                            Első oldal &laquo;&laquo;
                        </button>
                    </a>
                </li>

                <li id="pagekinezet" <?php if ($page_no <= 1) {
                    echo "class='disabled'";
                } ?>>
                    <a <?php if ($page_no > 1) {
                        echo "href='?page_no=$previous_page'";
                    } ?>>
                        <button type="button" class="btn btn-block btn-outline-dark " id="page">
                            ElŐző &laquo;
                        </button>
                    </a>
                </li>

                <li id="pagekinezet" <?php if ($page_no >= $total_no_of_pages) {
                    echo "class='disabled'";
                } ?>>
                    <a <?php if ($page_no < $total_no_of_pages) {
                        echo "href='?page_no=$next_page'";
                    } ?>>
                        <button type="button" class="btn btn-block btn-outline-dark page" id="page">
                            Következő &rsaquo;
                        </button>
                    </a>
                </li>

                <li id="pagekinezet" <?php if ($page_no >= $total_no_of_pages) {
                    echo "class='disabled'";
                } ?>>
                    <a <?php if ($page_no < $total_no_of_pages) {
                        echo "href='?page_no=$total_no_of_pages'";
                    } ?>>
                        <button type="button" class="btn btn-block btn-outline-dark page" id="page">
                            Utolsó oldal &rsaquo; &rsaquo;
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="toolbar-sorter sorter">
            <label class="sorter-label" for="sorter">Rendezés</label>
            <form method="GET action modellek.php">
                <select name="sorter" data-role="sorter" class="sorter-options" onchange="submit()">
                    <option value="position" selected="selected"> Pozíció </option>
                    <option value="name" <?php if (isset($_GET['sorter']) && $_GET['sorter'] == "name")
                        echo "selected"; ?>> Termék neve </option>
                    <option value="price" <?php if (isset($_GET['sorter']) && $_GET['sorter'] == "price")
                        echo "selected"; ?>> Ár </option>
                    <option value="jt" <?php if (isset($_GET['sorter']) && $_GET['sorter'] == "jt")
                        echo "selected"; ?>>
                        Játékok </option>
                </select>
            </form>
            <a title="Csökkenő" href="#" class="action sorter-action sort-asc" data-role="direction-switcher"
                data-value="desc">
                <span>Csökkenő</span>
            </a>
        </div>
    </div>
</div>