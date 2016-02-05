<div class="row">
    <div class="col-md-8">

<table class="table table-striped">
    <tbody>
        <tr>    
            <td>Номер заявки</td><td><?php echo $info->id; ?></td>
        </tr>

        <tr>    
            <td>Взнос</td><td><?php echo $info->price; ?><b>$</b></td>
        </tr>
        <tr>
            <td>Создатель</td><td><?php echo $uinfo->user_nicename; ?></td>
        </tr>
        
        <tr>
            <td>
                <b>A</b>
                
            </td>
            <td><b>B</b></td>
        </tr>
        <?php if($isLogin && $info->idUser != get_current_user_id()): ?>
        <tr>
            <td>
                <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
                    <button type="submit" class="btn btn-default">Вступить</button>
	                <input type="hidden" name="join" value="A">
                </form>
            </td>
            <td>
                <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
                    <button type="submit" class="btn btn-default">Вступить</button>
	                <input type="hidden" name="join" value="B">
                </form>
            </td>
        </tr>
        <?php endif; ?>
        
    </tbody>
</table>
</div></div>
