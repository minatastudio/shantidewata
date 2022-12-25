<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <form action="<?php echo "$post_url"; ?>" method="post" enctype="multipart/form-data">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject"><?php echo "$title_admin2 $title_admin1"; ?></span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <?php
                            //delete data
                            if (isset($_POST[delete])) {
                                for ($i = 1; $i <= $_POST['jum_list']; $i++) {
                                    $p_code = $_POST["pcode" . $i];

                                    if ($_POST["checkbox" . "$i"]) {
                                        //echo"$p_code";
                                        $query = mysqli_query($con, "update $tb_category set active = '0' where id = '$p_code'");
                                    }
                                }
                            ?>
                                <div class="alert alert-success "><button class="close" data-close="alert"></button>Data Update successful! </div>
                            <?php
                            }

                            //restore data
                            if (isset($_POST[restore])) {
                                for ($i = 1; $i <= $_POST['jum_list']; $i++) {
                                    $p_code = $_POST["pcode" . $i];

                                    if ($_POST["checkbox" . "$i"]) {
                                        //echo"$p_code";
                                        $query = mysqli_query($con, "update $tb_category set active = '1' where id = '$p_code'");
                                    }
                                }
                            ?>
                                <div class="alert alert-success "><button class="close" data-close="alert"></button>Data Update successful! </div>
                            <?php
                            }
                            ?>
                            <div class="col-md-6 col-xs-6">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary button-default top-btn-table" onclick="window.location.href = 'page.php?pageid=add_category';"> Add New
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6  col-xs-6">
                                <div class="btn-group pull-right">
                                    <button type="submit" class="btn button-default btn-primary red top-btn-table rightmargin10" name="delete">Delete <i class="fa fa-trash"></i></button>
                                    <button type="submit" class="btn button-default btn-primary green top-btn-table" name="restore">Restore <i class="fa fa-refresh"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                </th>
                                <th> Name </th>
                                <th> Status </th>
                                <th> Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $table = mysqli_query($con, "select * from $tb_category order by id DESC, active DESC");
                            while ($data = mysqli_fetch_array($table, MYSQLI_BOTH)) {
                                $i++;
                                $label = label($data[active]);

                            ?>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" name="checkbox<?php echo "$i"; ?>" />
                                        <input type="text" name="pcode<?php echo "$i"; ?>" id="pcode<?php echo "$i"; ?>" value="<?php echo "$data[id]"; ?>" style="display:none;" />
                                    </td>
                                    <td><?php echo ucwords($data[name]); ?></td>
                                    <td>
                                        <?php echo "$label"; ?>
                                    </td>
                                    <td>
                                        <a href="page.php?pageid=edit_category&&id=<?php echo "$data[id]"; ?>"><i class="icon-note"></i> Edit Data</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            <input name="jum_list" type="text" value="<?php echo "$i"; ?>" style="display:none;" />
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>