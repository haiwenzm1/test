var fuc = {
    config: {
        htmlStr: '',
        pid: 0
    },
    init: function () {
        this.renderTable();
        this.bindEvent();
    },
    handleData: function (data) {
        if (data) {
            var that = this;

            that.config.htmlStr += '<section class="panel">';
            that.config.htmlStr += '<header class="panel-heading">';
            that.config.htmlStr += '<a href="javascript:;" class="btn btn-link">全选</a> ';
            that.config.htmlStr += '<a href="javascript:;" class="btn btn-link">取消全选</a>';
            that.config.htmlStr += '</header>';
            that.config.htmlStr += '<div class="panel-body">';
            that.config.htmlStr += '<table class="table table-bordered text-center">';
            that.config.htmlStr += '<tr>';
            that.config.htmlStr += '<td><input type="checkbox" name="fullClick"></td>';
            that.config.htmlStr += '<td>ID</td>';
            that.config.htmlStr += '<td>名称</td>';
            that.config.htmlStr += '<td>链接</td>';
            that.config.htmlStr += '<td>描述</td>';
            that.config.htmlStr += '<td>排序</td>';
            that.config.htmlStr += '<td>隐藏</td>';
            that.config.htmlStr += '</tr>';
            for (var i = 0; i < data.length; i++) {
                that.config.htmlStr += '<tr>';
                that.config.htmlStr += '<td><input type="checkbox" name="id" value="' + data[i]['id'] + '"></td>';
                that.config.htmlStr += '<td>' + data[i]['id'] + '</td>';
                if (parseInt(data[i]['is_last'])) {
                    that.config.htmlStr += '<td> ' + data[i]['name'] + '</td>';
                }
                else {
                    that.config.htmlStr += '<td><a href="javascript:;" class="openClick">' + data[i]['name'] + '</a></td>';
                }
                that.config.htmlStr += '<td>' + data[i]['url'] + '</td>';
                that.config.htmlStr += '<td>' + data[i]['description'] + '</td>';
                that.config.htmlStr += '<td>' + data[i]['sort'] + '</td>';
                that.config.htmlStr += '<td>' + ((data[i]['is_hide'] == 1) ? '是' : '否') + '</td>';
                that.config.htmlStr += '</tr>';
            }
            that.config.htmlStr += '</table>';
            that.config.htmlStr += '</div>';
            that.config.htmlStr += '</section>';
            that.config.htmlStr += '<div id="masklayerbg"></div>';
            that.config.htmlStr += '<div id="masklayershow"></div>';
            return that.config.htmlStr;
        }
    },
    addClick: function (e) {
        var that = this;
        var html = '<div class="panel panel-info"><div class="panel-heading"><h3 class="panel-title">增加菜单</h3></div><div class="panel-body"><form class="form-horizontal" id="addForm">';
        html += '<div class="form-group"><label class="col-lg-2 col-sm-2 control-label">分组</label><div class="col-lg-10">';
        html += '<input type="text" class="form-control" placeholder="' + $(e).parent().parent().find('.switchClick').text() + '" readonly>';
        html += '</div></div>';

        html += '<div class="form-group"><label class="col-sm-2 control-label col-lg-2">类别</label><div class="col-lg-10">';
        html += '<label class="checkbox-inline"><input type="radio" name="last" value="1" checked="checked">菜单</label>';
        html += '<label class="checkbox-inline"><input type="radio" name="last" value="0">菜单组</label>';
        html += '</div></div>';

        html += '<div class="form-group"><label class="col-lg-2 col-sm-2 control-label">名称</label><div class="col-lg-10">';
        html += '<input type="text" name="name" vertify="string_1_20" class="form-control" placeholder="20字符以内">';
        html += '</div></div>';

        html += '<div class="form-group"><label class="col-lg-2 col-sm-2 control-label">链接</label><div class="col-lg-10">';
        html += '<input type="text" name="url" vertify="string_1_100" class="form-control" placeholder="100字符以内">';
        html += '</div></div>';

        html += '<div class="form-group"><label class="col-sm-2 control-label">描述</label><div class="col-sm-10">';
        html += '<textarea rows="6" class="form-control" name="description" vertify="string_0_100" placeholder="100字符以内"></textarea>';
        html += '</div></div>';

        html += '<div class="form-group"><label class="col-lg-2 col-sm-2 control-label">排序</label><div class="col-lg-10">';
        html += '<input type="text" name="sort" vertify="int_0_11_n_n" class="form-control" placeholder="11位以内正整数">';
        html += '</div></div>';

        html += '<div class="form-group"><label class="col-sm-2 control-label col-lg-2">是否显示在左侧</label><div class="col-lg-10">';
        html += '<label class="checkbox-inline"><input type="radio" name="hidden" value="0" checked="checked">是</label>';
        html += '<label class="checkbox-inline"><input type="radio" name="hidden" value="1">否</label>';
        html += '</div></div>';

        html += '<div class="form-group">';
        html += '<input type="hidden" class="form-control" name="pid" value="' + $(e).parent().parent().find('[name=id]').val() + '" >';
        html += '</div>';

        html += '<div class="form-group"><div class="col-lg-offset-2 col-lg-1">';
        html += '<a href="javascript:;" class="btn btn-success saveClick" data="addForm">保存</a>';
        html += '</div><div class="col-lg-1">';
        html += '<a href="javascript:;" class="btn btn-primary cancleClick">取消</a>';
        html += '</div></div>';
        html += '</form></div></div>';

        that.showMask(html);
        Vertify('addForm', 0);

        $("[name='last']").change(function () {
            if ($(this).val() == 1) {
                $("[name='url']").attr('vertify', 'string_1_100');
            } else {
                $("[name='url']").attr('vertify', 'string_0_100');
            }
            Vertify('addForm', 0);
        });
    },
    editClick: function (e) {
        var that = this;
        $.ajax({
            type: "post",
            url: "/Admin/Menu/getInfoById.html",
            data: { id: $(e).parent().parent().find('[name=id]').val() },
            cache: false,
            success: function (data) {
                var html = '<div class="panel panel-info"><div class="panel-heading"><h3 class="panel-title">编辑' + ((data.info[0]['is_last'] == 1) ? '菜单' : '菜单组') + '</h3></div><div class="panel-body"><form class="form-horizontal" id="addForm">';
                html += '<div class="form-group"><label class="col-lg-2 col-sm-2 control-label">分组</label><div class="col-lg-10">';
                html += '<input type="text" class="form-control" placeholder="' + data.info[0]['pname'] + '" readonly>';
                html += '</div></div>';

                html += '<div class="form-group"><label class="col-lg-2 col-sm-2 control-label">名称</label><div class="col-lg-10">';
                html += '<input type="text" name="name" vertify="string_1_20" class="form-control" value="' + data.info[0]['name'] + '">';
                html += '</div></div>';

                html += '<div class="form-group"><label class="col-sm-2 control-label">链接</label><div class="col-sm-10">';
                html += '<input type="text" class="form-control" name="url" vertify="' + ((data.info[0]['is_last'] == 1) ? 'string_1_100' : 'string_0_100') + '" value="' + data.info[0]['url'] + '">';
                html += '</div></div>';

                html += '<div class="form-group"><label class="col-sm-2 control-label">描述</label><div class="col-sm-10">';
                html += '<textarea rows="6" class="form-control" name="description" vertify="string_0_500">' + data.info[0]['description'] + '</textarea>';
                html += '</div></div>';

                html += '<div class="form-group"><label class="col-lg-2 col-sm-2 control-label">排序</label><div class="col-lg-10">';
                html += '<input type="text" name="sort" vertify="int_0_11_n_n" class="form-control" value="' + data.info[0]['sort'] + '">';
                html += '</div></div>';

                html += '<div class="form-group"><label class="col-sm-2 control-label col-lg-2">是否显示在左侧</label><div class="col-lg-10">';
                html += '<label class="checkbox-inline"><input name="hide" type="radio" value="1" ' + ((data.info[0]['is_hide'] == 1) ? 'checked="checked"' : '') + '>隐藏</label>';
                html += '<label class="checkbox-inline"><input name="hide" type="radio" value="0" ' + ((data.info[0]['is_hide'] == 0) ? 'checked="checked"' : '') + '>显示</label>';
                html += '</div></div>';

                html += '<div class="form-group"><label class="col-sm-2 control-label col-lg-2">状态</label><div class="col-lg-10">';
                html += '<label class="checkbox-inline"><input name="status" type="radio" value="1" ' + ((data.info[0]['status'] == 1) ? 'checked="checked"' : '') + '>启用</label>';
                html += '<label class="checkbox-inline"><input name="status" type="radio" value="0" ' + ((data.info[0]['status'] == 0) ? 'checked="checked"' : '') + '>禁止</label>';
                html += '</div></div>';

                html += '<div class="form-group">';
                html += '<input type="hidden" class="form-control" name="id" value="' + data.info[0]['id'] + '" >';
                html += '<input type="hidden" class="form-control" name="version" value="' + data.info[0]['version'] + '" >';
                html += '</div>';

                html += '<div class="form-group"><div class="col-lg-offset-2 col-lg-1">';
                html += '<a href="javascript:;" class="btn btn-success updateClick" data="addForm">保存</a>';
                html += '</div><div class="col-lg-1">';
                html += '<a href="javascript:;" class="btn btn-primary cancleClick">取消</a>';
                html += '</div></div>';
                html += '</form></div></div>';

                that.showMask(html);
                Vertify('addForm', 0);
            },
            error: function () {
                alert("网络出错,请重试");
            }
        });
    },
    saveClick: function (e) {
        var that = this;
        $(e).attr('disabled', true);
        if (!Vertify($(e).attr("data"), 1)) {
            $(e).attr('disabled', false);
            return;
        }

        $.ajax({
            type: 'post',
            data: $('#' + $(e).attr('data')).serialize(),
            url: "/Admin/Menu/addInfo.html",
            cache: false,
            success: function (data) {
                $(e).attr('disabled', false);
                alert(data.info);
                if (data.status) {
                    that.hideMask();
                    that.renderTable();
                }
            },
            error: function () {
                alert("网络出错,请重试");
            }
        });
    },
    updateClick: function (e) {
        var that = this;
        $(e).attr('disabled', true);
        if (!Vertify($(e).attr("data"), 1)) {
            $(e).attr('disabled', false);
            return;
        }

        $.ajax({
            type: 'post',
            data: $('#' + $(e).attr('data')).serialize(),
            url: "/Admin/Menu/updateInfoById.html",
            cache: false,
            success: function (data) {
                $(e).attr('disabled', false);
                alert(data.info);
                if (data.status) {
                    that.hideMask(this);
                    that.renderTable();
                }
            },
            error: function () {
                alert("网络出错,请重试");
            }
        });
    },
    deleteClick: function (e) {
        var that = this;
        $(e).attr('disabled', true);
        $.ajax({
            type: 'post',
            data: { id: $(e).parent().find('[name=id]').val(), version: $(e).parent().find('[name=version]').val() },
            url: "{:U('deleteInfoById')}",
            cache: false,
            success: function (data) {
                $(e).attr('disabled', false);
                alert(data.info);
                if (data.status) {
                    that.renderTable();
                }
            },
            error: function () {
                alert("网络出错,请重试");
            }
        });
    },
    statusClick: function (e) {
        var that = this;
        $(e).attr('disabled', true);
        $.ajax({
            type: 'post',
            data: { id: $(e).parent().find('[name=id]').val(), version: $(e).parent().find('[name=version]').val() },
            url: "{:U('updateStatusById')}",
            cache: false,
            success: function (data) {
                $(e).attr('disabled', false);
                alert(data.info);
                if (data.status) {
                    that.renderTable();
                }
            },
            error: function () {
                alert("网络出错,请重试");
            }
        });
    },
    hideMask: function () {
        $('#masklayershow').hide().empty();
        $('#masklayerbg').hide().empty();
    },
    showMask: function (html) {
        $('#masklayerbg').empty().show();
        $('#masklayershow').empty().append(html).show();
    },
    bindEvent: function () {
        var that = this;

        // 选中
        $(document).on('click', '.a_checkbox', function () {
            $(this).find('[type=checkbox]').prop('checked', !$(this).find('[type=checkbox]').prop('checked'));
        });

        // 切换
        $(document).on('click', '.switchClick', function () {
            if ($(this).parent().next('ul').is(":hidden")) {
                $(this).parent().next('ul').show();
            } else {
                $(this).parent().next('ul').hide();
            }
        });

        // 全选
        $(document).on('click', '.fullClick', function () {
            $("#content").find('[type=checkbox]').prop('checked', true);
            $("#content").find('ul').show();
        });

        // 取消全选
        $(document).on('click', '.nofullClick', function () {
            $("#content").find('[type=checkbox]').prop('checked', false);
        });

        // 删除
        $(document).on('click', '.deleteClick', function () {
            if (confirm("确定删除吗")) {
                that.deleteClick(this);
            }
        });

        // 增加
        $(document).on('click', '.addClick', function () {
            that.addClick(this);
        });

        // 编辑
        $(document).on('click', '.editClick', function () {
            that.editClick(this);
        });

        // 保存
        $(document).on('click', '.saveClick', function () {
            that.saveClick(this);
        });

        // 更新
        $(document).on('click', '.updateClick', function () {
            that.updateClick(this);
        });

        // 禁用或启用
        $(document).on('click', '.statusClick', function () {
            that.statusClick(this);
        });

        // 取消事件
        $(document).on('click', '.cancleClick', function () {
            if (confirm("确定取消吗")) {
                that.hideMask();
            }
        });

        // 取消事件
        $(document).on('click', '.openClick', function () {
            that.config.pid = $(this).parent().parent().find("[name='id']").val();
            that.renderTable();
        });

        window.onunload=function (){
            console.log(that.config.pid);
            var ev = e || window.event;//获取event对象 
            ev.preventDefault();
        }
    },
    renderTable: function () {
        var that = this;
        $.ajax({
            type: "post",
            url: "/Admin/Menu/getAllInfoByPid.html",
            data: { pid: that.config.pid },
            cache: false,
            success: function (data) {
                if (data.status) {
                    that.config.htmlStr = '';
                    var html = that.handleData(data.info.info);
                    $('#content').empty().append(html);
                }
            },
            error: function () {
                alert("网络出错,请重试");
            }
        });
    }
}
