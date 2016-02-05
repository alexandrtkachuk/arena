<div class="row">
    <div class="col-md-8">
<p class="bg-danger"><b>
<?php 
    if(1 == $error)
    {
        echo  ARENA_ERROR;
    }

?>
</b></p>

<p class="bg-success"><b>
    <?php
        if($success)
        {
            echo ARENA_SUCSSES_REGISTRATION_ORDER; 
        }
    ?>

</b></p>


<form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post" class="form-inline">

<div class="form-group">
	    <label for="f-counts">Количество участников в команде:</label>
	    <input type="number" class="form-control" name="count" min="1" max="5" id="f-counts"  value="1">
    </div>

    <div class="form-group">
    <label for="f-sum">Сумма с каждого участника:</label>
        <div class="input-group">
            
            <div class="input-group-addon">$</div>
	        <input type="number" class="form-control" name="sum" min="0.01"  id="f-sum"  step="0.01" value="1">
        </div>    
    </div>


<button type="submit" class="btn btn-default">Создать заявку</button>

	<input type="hidden" name="createorder" value="1">
    
    </form>

   </div>
</div>

