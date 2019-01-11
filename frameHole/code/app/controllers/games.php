<?php
//include_once "../../core/classes/Paginator.php";
class games{
    private $pn;
    private $limit;

    function __construct()
    {
        $this->limit = 2;
        if(isset($_GET["id"])){
            $this->pn = $_GET["id"];

            $this->lists($this->pn, $this->limit);
        }else{
            $pn = 1;
        }
    }

    function index(){
        //starting crud
        $crud = new Crud();

        //count how many items the database holds
        $sqlPagination = "SELECT COUNT(id) FROM post WHERE category LIKE 'games'";
        $pages = $crud->getData($sqlPagination);

        //get everything
        $sql = "SELECT * FROM post WHERE category LIKE 'games'";
        $result = $crud->getData($sql);

        //items per page
        $limit = 2;

        //set variables on how many pages there are
        $totalRecords = $pages[0];
        $number = (int) implode('', $totalRecords);
        $totalPages = $number / $limit;

        //create array variable and send to view
        $args = array(
            'title' => 'title',
            'id' => 'id',
            'games' => $result,
            'pages' => $totalPages
        );
        views::viewContent('games::index',  $args);
    }

    function lists($pn, $limit){
        //call crud
        $crud = new Crud();

        //calculate where to start from pagenumber * limit
        $start_from = ($pn-1) * $limit;

        //get games, 2 per page
        $sql = "SELECT * from post WHERE category LIKE 'games' LIMIT $start_from, $limit ";
        $result =  $crud->getData($sql);

        //show items on page
        if($result > 0 )
        {
            $row = $result;
            var_dump($row);
        }
    }
}