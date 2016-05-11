<script type="text/javascript">
    $(document).ready(function () {
        $('td.editable-col').on('focusout', function () {
            data = {};
            data['val'] = $(this).text();
            data['id'] = $(this).parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');
            if ($(this).attr('oldVal') === data['val'])
                return false;

            if (confirm('განვაახლოთ მონაცემები ?')) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/chat/dashboard/update_institution",
                    cache: false,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        //$("#loading").hide();
                        if (response.status) {
                            $.Notification.notify('success', 'top center', 'ყურადღება', response.msg);
                            setTimeout(function () {
                                window.location.reload(1);
                            }, 3000);
                        } else {
                            $.Notification.notify('success', 'top center', 'ყურადღება', response.msg);
                            setTimeout(function () {
                                window.location.reload(1);
                            }, 3000);
                        }
                    }
                });
            }
        });
        // delete the entry once we have confirmed that it should be deleted
        $('.delete').click(function () {
            data = {};
            data['id'] = $(this).parent('tr').attr('data-row-id');
            var parent = $(this).closest('tr');
            if (confirm('დარწმუნებული ხართ რომ გინდათ უწყების წაშლა?')) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/chat/dashboard/delete_institution",
                    cache: false,
                    data: data,
                    dataType: "json",
                    beforeSend: function () {
                        parent.animate({'backgroundColor': '#fb6c6c'}, 300);
                    },
                    success: function (response) {

                        //$("#loading").hide();
                        if (response.status) {
                            $.Notification.notify('success', 'top center', 'ყურადღება', response.msg);
                            setTimeout(function () {
                                window.location.reload(1);
                            }, 3000);
                        } else {
                            $.Notification.notify('success', 'top center', 'ყურადღება', response.msg);
                            setTimeout(function () {
                                window.location.reload(1);
                            }, 3000);
                        }
                    }
                });
            }

        });

    });

</script>


<div class="content">
    <div class="container">
        <!-- Start Widget -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">უწყების მართვა</h3></div>
                    <div class="panel-body">
                        <?php echo validation_errors('<div class="col-lg-offset-2 col-lg-9"><div class="alert alert-danger">', '</div></div>'); ?>

                        <div class="form">
                            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action=""
                            ">
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-2">უწყების დასახელება</label>
                                <div class="col-lg-9">
                                    <input class="form-control" id="cname" name="institution_name" type="text"
                                           required="" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-9">
                                    <input type="submit" class="btn btn-primary" type="submit" name="add_institution"
                                           value="შენახვა"/>
                                    <input type="reset" class="btn btn-danger" type="submit" value="გასუფთავება"/>
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-9">
                                <div id="msg" class="alert">

                                </div>
                            </div>
                            </form>

                        </div> <!-- .form -->
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="portlet">
                            <div class="portlet-heading bg-info">
                                <h3 class="portlet-title">
                                    სერვისები
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-success"><i
                                            class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-success" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <table id="employee_grid"
                                           class="table table-condensed table-hover table-striped bootgrid-table"
                                           width="60%" cellspacing="0">
                                        <tbody id="_editable_table">
                                        <?php foreach ($get_institutions as $res) : ?>
                                            <tr data-row-id="<?php echo $res['repo_categories_id']; ?>">
                                                <td class="editable-col" contenteditable="true" col-index='0'
                                                    oldVal="<?php echo $res['category_name']; ?>"><?php echo $res['category_name']; ?></td>
                                                <td class="delete"><a href="#" class="on-default remove-row"
                                                                      data-toggle="tooltip" data-placement="right"
                                                                      title="წაშლა"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="dd" id="nestable_list_3">
                            <ol class="dd-list">
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div> <!-- container -->
</div> <!-- content -->
