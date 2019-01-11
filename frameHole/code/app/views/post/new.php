<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h1>create a new post</h1>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <form action="../post/create" class="" method="post">
                <div class="form-group row">
                    <label class="col-lg-4" for="name">name</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" id="name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4" for="cat">cat</label>
                    <div class="col-lg-8">
                        <select name="cat" id="cat" onchange="changecat(this.value);">
                            <option value="" disabled selected>select</option>
                            <option value="games">games</option>
                            <option value="music">music</option>
                            <option value="movies">movies</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4" for="sub-cat">sub-cat</label>
                    <div class="col-lg-8">
                        <select name="sub-cat" id="sub-cat">
                            <option value="" disabled selected>Select</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn">submit</button>
            </form>
        </div>
        <div class="col-lg-4">
        </div>
    </div>
</div>