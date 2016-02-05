<div class="row">
    <div class="col-md-8">

<table class="table table-striped">
 <thead>
    <tr>
        <th>#</th>
        <th>Состав команды</th>
        <th>Взнос</th>
        <th>info</th>
    </tr>
</thead> 
<tbody>
    <?php  foreach($orders as $item):?>
        <tr>    
            <td> <?php echo $item->id; ?></td>
            <td> <?php echo $item->countUsers; ?> x <?php echo $item->countUsers; ?></td>
            <td> <?php echo $item->price; ?> <b>$</b></td>
            <td>   
            <a href="<?php echo get_permalink(ARENA_PAGE_ORDERINFO); ?>&orderid=<?php echo $item->id;?>" class="btn btn-info">info</a>
            </td>
        </tr>
    <?php endforeach;?>
</tbody>
</table>

</div></div>



