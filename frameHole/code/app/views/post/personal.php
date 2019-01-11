<script type="text/javascript" src="../code/app/views/inc/js/deletePost.js"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h1>personal posts</h1>
            <button type="button" id="result" >1</button>

            <input id="search" type="text">
            <select name="cat" id="category" onchange="changecat(this.value);">
                <option value="" disabled selected>select</option>
                <option value="games">games</option>
                <option value="music">music</option>
                <option value="movies">movies</option>
            </select>
            <br>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" id="personalPostTable">
                <thead>
                <tr>
                    <th>post name</th>
                    <th>category</th>
                    <th>sub-cat</th>
                    <th>description</th>
                    <th>interact</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php
                foreach($args['posts']  as $k => $v){ ?>
                    <tr>
                        <td data-cel="<?= $v['postName'] ?>" id="TDpostName">
                            <?php echo $v['postName'] ?>
                        </td>
                        <td data-cel="<?= $v['category'] ?>" id="TDpostCategory">
                            <?php echo $v['category'] ?>
                        </td>
                        <td data-cel="<?= $v['subCat'] ?>" id="TDpostSubCat">
                            <?php echo $v['subCat'] ?>
                        </td>
                        <td data-cel="<?= $v['description'] ?>" id="TDpostDescription">
                            <?php echo $v['description'] ?>
                        </td>
                        <td>
                            <?php echo  "<input type='button' class='delete' value='delete'>" ?>
                        </td>
                    </tr>
                    <?php

                }
                ?>
                </tbody>
            </table>
            <table>

            </table>
            <ul><li class="websockets">websockets</li><li class="setclasses">setclasses</li></ul>
        </div>
    </div>
</div>

<button id="connect" class="btn" value="connect" type="button">connect</button>
<h2>WebSocket Test</h2>

<div id="output"></div>