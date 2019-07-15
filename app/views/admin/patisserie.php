<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="panel panel-default">
        <div class="panel-heading">
            Patisserie
        </div>
        <div class="panel-body">

            <a data-toggle="modal" data-target="#myModalfilea" class="btn btn-primary btn-xs">Ajouter</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>#</td>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody >
                    <?php foreach(\App\Table\Patisserie::getAll()as $patisserie ): ?>
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                <img  class="image-fixer img-responsive img-rounded" style=" height: 240px !important;width:240px !important;" src="<?= 'img/patisserie/'.$patisserie->image ;?>">
                            </td>
                            <td>
                                <form role="form" method="post">
                                    <div class="form-group has-success">
                                        <input type="submit" name="" value="delete" class="btn btn-danger btn-xs">
                                        <input type="hidden" name="delete" value="<?= $patisserie->id;?>">
                                        <input type="hidden" name="imgg" value="<?= $patisserie->image;?>">
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <?php

                        if($_SERVER['REQUEST_METHOD']=='POST'):

                            if(isset($_POST['delete']) && !is_null($_POST['delete']) && !is_null($_POST['imgg'])) {

                                \App\Table\Patisserie::delete($_POST['delete'],$_POST['imgg']);

                                \App\App::getInstance()->load();
                            }

                        endif;

                        ?>
                    <?php endforeach;?>

                    <div class="modal fade" id="myModalfilea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Patisserie</h4>
                                </div>
                                <div class="modal-footer">

                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group has-success">
                                            <!--<label class="control-label" for="inputSuccess">Input with success</label>-->
                                            <input type="file" name="file" class="form-control">
                                            <select name="type">
                                                <option name="tous" value="tous"> tous</option>
                                                <option name="maroc" value="maroc"> maroc</option>
                                                <option name="autre" value="autre"> autre</option>
                                            </select>
                                        </div>
                                        <input type="submit" value="Ajouter" class="btn btn-primary btn-xs">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                    if($_SERVER['REQUEST_METHOD']=='POST'):

                        if(isset($_POST['type']) && !is_null($_POST['type'])) {


                            \App\Table\Patisserie::addPatisserie($_FILES['file'],$_POST['type']);

                            \App\App::getInstance()->load();

                        }

                    endif;

                    ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>