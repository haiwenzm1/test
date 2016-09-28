var fuc = {
    init: function () {
        this.bindEvent();
    },
     
    addClick: function (e) {
        var that = this;
       

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
    } 
}
