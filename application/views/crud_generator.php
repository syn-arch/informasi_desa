<?php
// error_reporting(0);
require_once FCPATH . 'harviacode/core/harviacode.php';
require_once FCPATH . 'harviacode/core/helper.php';
require_once FCPATH . 'harviacode/core/process.php';
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="pull-left">
                    <div class="box-title">
                        <h4><?php echo $judul ?></h4>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <form method="POST">

                            <div class="form-group">
                                <label>Select Table - <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Refresh</a></label>
                                <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                                    <option value="">Please Select</option>
                                    <?php
                                    $table_list = $hc->table_list();
                                    $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                                    foreach ($table_list as $table) {
                                        ?>
                                        <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <?php $jenis_tabel = isset($_POST['jenis_tabel']) ? $_POST['jenis_tabel'] : 'reguler_table'; ?>
                                    <div class="col-md-5">
                                        <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                            <label>
                                                <input type="radio" name="jenis_tabel" value="reguler_table" <?php echo $jenis_tabel == 'reguler_table' ? 'checked' : ''; ?>>
                                                Reguler Table
                                            </label>
                                        </div>                            
                                    </div>
                                    <div class="col-md-7">
                                        <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                            <label>
                                                <input type="radio" name="jenis_tabel" value="datatables" <?php echo $jenis_tabel == 'datatables' ? 'checked' : ''; ?>>
                                                Serverside Datatables
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <?php $export_excel = isset($_POST['export_excel']) ? $_POST['export_excel'] : ''; ?>
                                    <label>
                                        <input type="checkbox" name="export_excel" value="1" <?php echo $export_excel == '1' ? 'checked' : '' ?>>
                                        Export Excel
                                    </label>
                                </div>
                            </div>    

                            <div class="form-group">
                                <div class="checkbox">
                                    <?php $export_word = isset($_POST['export_word']) ? $_POST['export_word'] : ''; ?>
                                    <label>
                                        <input type="checkbox" name="export_word" value="1" <?php echo $export_word == '1' ? 'checked' : '' ?>>
                                        Export Word
                                    </label>
                                </div>
                            </div>    

                            <div class="form-group">
                                <label>Custom Controller Name</label>
                                <input type="text" id="controller" name="controller" value="<?php echo isset($_POST['controller']) ? $_POST['controller'] : '' ?>" class="form-control" placeholder="Controller Name" />
                            </div>
                            <div class="form-group">
                                <label>Custom Model Name</label>
                                <input type="text" id="model" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?>" class="form-control" placeholder="Controller Name" />
                            </div>
                            <input type="submit" value="Generate" name="generate" class="btn btn-primary btn-block" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')" />
                        </form>
                    </div>
                    <div class="col-md-9">
                        <?php
                        foreach ($hasil as $h) {
                            echo '<p>' . $h . '</p>';
                        }
                        ?>
                    </div>
                </div>
                <script type="text/javascript">
                    function capitalize(s) {
                        return s && s[0].toUpperCase() + s.slice(1);
                    }

                    function setname() {
                        var table_name = document.getElementById('table_name').value.toLowerCase();
                        if (table_name != '') {
                            document.getElementById('controller').value = capitalize(table_name);
                            document.getElementById('model').value = capitalize(table_name) + '_model';
                        } else {
                            document.getElementById('controller').value = '';
                            document.getElementById('model').value = '';
                        }
                    }
                </script>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>